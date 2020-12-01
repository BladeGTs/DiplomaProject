<?php 
namespace common\components\behaviors;
 
use Yii;
use yii\db\ActiveRecord;
use yii\base\ErrorException;
use yii\helpers\ArrayHelper;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ManyHasManyBehavior
 *
 * @author Дмитрий
 */
    class ManyHasManyBehavior extends \yii\base\Behavior
{
    /**
     * List of relations.
     * @var array
     */
    public $relations = [];
 
    /**
     * List values of relation attributes.
     * @var array
     */
    private $_values = [];
 
    /**
     * Events list
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_AFTER_INSERT => 'changeRelations',
            ActiveRecord::EVENT_AFTER_UPDATE => 'changeRelations',
            ActiveRecord::EVENT_BEFORE_DELETE => 'changeRelations',
        ];
    }
 
    /**
     * Save all dirty (changed) relation values ($this->_values) to the database
     * @param $event
     * @throws ErrorException
     * @throws \yii\db\Exception
     */
    public function changeRelations($event)
    {       
        if (is_array($ownerPk = $this->owner->getPrimaryKey())) {
            throw new ErrorException("Такое поведение не поддерживает составные первичные ключи");
        }
 
        // Save relations data
        foreach ($this->relations as $relationName => $attributeName) {
 
            $relation = $this->owner->getRelation($relationName);
            $relationModel = new $relation->modelClass();
 
            if (!empty($relation->via) && $relation->multiple) {

                list($junctionTable) = array_values($relation->via->from);

                list($ownerColumn) = array_keys($relation->via->link);

                list($relationPrimaryColumn) = array_keys($relation->link);

                list($junctionColumn) = array_values($relation->link);
 
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    
                    if (!empty($this->_values[$attributeName])) {  
                        $oldValues = ArrayHelper::getColumn(ArrayHelper::toArray($this->owner->$relationName), $relationPrimaryColumn);
                        $newValues = $this->_values[$attributeName]; 
                    
 
                        $insert = [];
                        foreach ($newValues as $newValue) {
                            if (!in_array($newValue, $oldValues)) {
                                $insert[] = [$newValue, $ownerPk];
                            }
                        }
                            
                        if (count($insert)) {
                            Yii::$app->db->createCommand()
                                ->batchInsert($junctionTable, [$junctionColumn, $ownerColumn], $insert)
                                ->execute();
                        }
 
                      Yii::$app->db->createCommand()
                            ->delete($junctionTable, $ownerColumn.'="'.$ownerPk.'" AND '.$junctionColumn.' NOT IN ('.implode(',',$newValues).')')
                            ->execute();                        
                    } else {                        
                        Yii::$app->db->createCommand()
                            ->delete($junctionTable, $ownerColumn.'='.$ownerPk)
                            ->execute();
                    }
                     
                    $transaction->commit();
                    
                } catch (\yii\db\Exception $ex) {
                    $transaction->rollback();
                    throw $ex;
                }
               
            } else {
                throw new ErrorException('Тип связи не поддерживается.');
            }
        }
    }    
 
    /**
     * Returns a value indicating whether a property can be read.
     * We return true if it is one of our properties and pass the
     * params on to the parent class otherwise.
     * TODO: Make it honor $checkVars ??
     *
     * @param string $name the property name
     * @param boolean $checkVars whether to treat member variables as properties
     * @return boolean whether the property can be read
     * @see canSetProperty()
     */
    public function canGetProperty($name, $checkVars = true)
    {
        return in_array($name, $this->relations) ?
            true : parent::canGetProperty($name, $checkVars);
    }
 
    /**
     * Returns a value indicating whether a property can be set.
     * We return true if it is one of our properties and pass the
     * params on to the parent class otherwise.
     * TODO: Make it honor $checkVars and $checkBehaviors ??
     *
     * @param string $name the property name
     * @param boolean $checkVars whether to treat member variables as properties
     * @param boolean $checkBehaviors whether to treat behaviors' properties as properties of this component
     * @return boolean whether the property can be written
     * @see canGetProperty()
     */
    public function canSetProperty($name, $checkVars = true, $checkBehaviors = true)
    {
        return in_array($name, $this->relations) ?
            true : parent::canSetProperty($name, $checkVars, $checkBehaviors);
    }
 
    /**
     * Returns the value of an object property.
     * Get it from our local temporary variable if we have it,
     * get if from DB otherwise.
     *
     * @param string $name the property name
     * @return mixed the property value
     * @see __set()
     */
    public function __get($name)
    {
        if (isset($this->_values[$name])) {
            return $this->_values[$name];
        } else {
            $relation = $this->owner->getRelation(array_search($name, $this->relations));
            $relationModel = new $relation->modelClass();
            return $relation->select($relationModel->getPrimaryKey())->column();
        }
    }
 
    /**
     * Sets the value of a component property. The data is passed
     *
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     * @see __get()
     */
    public function __set($name, $value)
    {
        $this->_values[$name] = $value;
    }
}
