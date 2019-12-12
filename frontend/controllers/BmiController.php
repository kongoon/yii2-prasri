<?php
namespace frontend\controllers;

use frontend\models\BmiForm;
use yii\web\Controller;
use Yii;

class BmiController extends Controller
{
    public function actionIndex()
    {
        $model = new BmiForm();
        $bmi = null;
        if($model->load(Yii::$app->request->post())){
            $bmi = $model->weight / ($model->height * $model->height);
        }
        return $this->render('index', [
            'model' => $model,
            'bmi' => $bmi
        ]);
    }
    public function actionTest()
    {
        
    }

}