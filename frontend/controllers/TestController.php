<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Test;
use Faker\Factory;
class TestController extends Controller
{
    public function actionGenerate() {
/*
 * @var $faker Faker\Generator
 */ 
        $format = 'Y-m-d';
        
        ini_set('max_execution_time', 900);
        $faker = Factory::create();
        for($j=0; $j<100; $j++)
        {
            $employees = [];
            for($i = 0; $i<10; $i++)
            {
                $providers[] = [$faker->name,$faker->email,$faker->text(200),$faker->regexify('[A-Za-z0-9_]{5,15}'),Yii::$app->security->generateRandomString(),Yii::$app->security->generateRandomString(),$time=time(),$time];
            }
            Yii::$app
                    ->db
                    ->createCommand()
                    ->batchInsert('user', ['username','email','about','nickname','auth_key','password_hash','created_at','updated_at'],$providers)
                    ->execute();
            unset($providers);
        }
        die('stop');
//        for($i = 1; $i<=100; $i++)
//        {
//        $faker = Factory::create();
//        $newsItem = new News();
//        
//        $newsItem->title = $faker->text(35);
//        $newsItem->content = $faker->text(rand(1000,2000));
//        $newsItem->status = rand(0, 1);
//        $newsItem->save();
//        }
    }

    public function actionView($id){
        $item = Test::getItem($id);
        
        return $this->render('view',[
            'item' => $item
        ]);
    }

    public function  actionIndex()
    {
        $max = Yii::$app -> params['maxNewInList'];

        $list = Test::getNewsList($max);
        return $this->render('index',[
            'list' =>$list,
        ]);
    }
}


