<?php

use codexten\yii\web\widgets\UpdatePage;

/* @var $this yii\web\View */
/* @var $model codexten\yii\process\models\BackgroundProcess */

$this->title = Yii::t('app', 'Update Background Process: ' . $model->name, [
    'nameAttribute' => '' . $model->name,
]);
?>
<?php $page = UpdatePage::begin() ?>

<?php $page->beginContent('form') ?>

<?= $this->render('_form', ['model' => $model]) ?>

<?php $page->endContent() ?>

<?php $page->end() ?>
