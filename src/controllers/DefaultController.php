<?php
/**
 * Created by PhpStorm.
 * User: jomon
 * Date: 22/3/19
 * Time: 9:05 PM
 */

namespace codexten\yii\process\controllers;


use codexten\yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}