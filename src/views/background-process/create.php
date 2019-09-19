<?php

use codexten\yii\web\widgets\CreatePage;


/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Create Background Process');
?>
<?php $page = CreatePage::begin() ?>

<?php $page->beginContent('form') ?>

<?= $this->render('_form', ['model' => $model]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>