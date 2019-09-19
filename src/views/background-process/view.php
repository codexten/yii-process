<?php

use codexten\yii\web\widgets\Page;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model codexten\yii\process\models\BackgroundProcess */

$this->title = $model->name;
?>

<?php $page = Page::begin([
    'title' => $this->title,
]) ?>

<?php $page->beginContent('content') ?>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'pid',
        'comment',
        'run_command',
        'status',
    ],
]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
