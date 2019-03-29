<?php

namespace codexten\yii\process\controllers;

use Yii;
use codexten\yii\process\models\BackgroundProcess;
use codexten\yii\web\CrudController;

/**
 * BackgroundProcessController implements the CRUD actions for BackgroundProcess model.
 *
 * @method BackgroundProcess findOne($id)
 */
class BackgroundProcessController extends CrudController
{
    public $modelClass = BackgroundProcess::class;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();

        return $actions;
    }

    public function actionRun($id)
    {
        return $this->findOne($id)->run();
    }

}
