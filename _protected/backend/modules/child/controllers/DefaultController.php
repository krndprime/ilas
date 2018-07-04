<?php

namespace backend\modules\child\controllers;

use yii\web\Controller;

/**
 * Default controller for the `child` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
