<?php

use codexten\yii\process\models\BackgroundProcess;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model BackgroundProcess */
?>

<div class="row">
    <div class="col-md-6">

        <?php $form = ActiveForm::begin() ?>

        <?= $form->field($model, 'name') ?>

        <!--        --><? //= $form->field($model, 'comment') ?>

        <?= $form->field($model, 'run_command') ?>

        <div class="form-group">

            <?= Html::submitButton(
                $model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'),
                ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>

        </div>

        <?php ActiveForm::end() ?>

    </div>
</div>