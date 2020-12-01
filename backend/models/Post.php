<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property string $text
 * @property int $date_create
 * @property int $status
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }
    
    public function behaviors() {
        return [
            [
                'class' => \common\components\behaviors\ManyHasManyBehavior::className(),
                'relations' => [
                    'tags' => 'tag_list',
                ],
            ],
        ];
    }

    public function getTags() {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
                        ->viaTable('post_has_tag', ['post_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['alias'], 'required'],
            [['text'], 'string'],
            [['date_create', 'status'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['tag_list'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'alias' => 'Alias',
            'text' => 'Text',
            'date_create' => 'Date Create',
            'status' => 'Status',
        ];
    }
}
