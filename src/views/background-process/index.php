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
        'pid',
        'comment',
        'run_command',
        'status',
        [
            'class' => 'yii\grid\ActionColumn',
            'options' => ['style' => 'width: 5%'],
            'template' => '{run} {update} {delete}',
            'buttons' => [
                'run' => function ($url, $model, $key) {
                    /* @var $model BackgroundProcess */
                    if ($model->canRun()) {
                        return Html::a('<i class="fa fa-play"></i>',
                            ['/process/background-process/run', 'id' => $model->id]);
                    }

                    return false;
                },
            ],
        ],
    ],
]); ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
