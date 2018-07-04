<?php

namespace backend\modules\bi\controllers;

class BiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionView()
    {
        return $this->render('view');
    }

}
