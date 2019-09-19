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
        if ($this->findOne($id)->run()) {
            return $this->redirect('index');
        }
    }

    public function actionRestart($id)
    {
        $this->findOne($id)->restart();

        return $this->redirect('index');

    }

    public function actionStop($id)
    {
        $this->findOne($id)->stop();

        return $this->redirect('index');

    }

}
