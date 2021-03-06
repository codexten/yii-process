<?php

use codexten\yii\web\widgets\IndexPage;
use yii\grid\GridView;
use codexten\yii\process\models\BackgroundProcess;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Background Processes');
?>

<?php $page = IndexPage::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('main-actions') ?>

<?= $page->renderButton('create', '/process/background-process/create', ['class' => ['btn-success']]) ?>

<?php $page->endContent() ?>

<?php $page->beginContent('table') ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        [
            'attribute' => 'pid',
            'value' => function ($model) {
                /* @var $model BackgroundProcess */

                return $model->isRunning() ? $model->pid : '';
            },
        ],
        'comment',
        'run_command',
        'status',
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'template' => '{run} {restart} {stop} {update} {delete}',
            'buttons' => [
                'run' => function ($url, $model, $key) {
                    /* @var $model BackgroundProcess */
                    if ($model->canRun()) {
                        return Html::a('<i class="fa fa-play"></i>',
                            ['/process/background-process/run', 'id' => $model->id]);
                    }

                    return false;
                },
                'restart' => function ($url, $model, $key) {
                    /* @var $model BackgroundProcess */
                    if ($model->canRestart()) {
                        return Html::a('<i class="fa fa-repeat"></i>',
                            ['/process/background-process/restart', 'id' => $model->id]);
                    }

                    return false;
                },
                'stop' => function ($url, $model, $key) {
                    /* @var $model BackgroundProcess */
                    if ($model->canStop()) {
                        return Html::a('<i class="fa fa-stop"></i>',
                            ['/process/background-process/stop', 'id' => $model->id]);
                    }

                    return false;
                },
            ],
        ],
    ],
]); ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
