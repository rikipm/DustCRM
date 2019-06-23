<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'new_password')->passwordInput(['maxlength' => true, 'value' => '']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'status')->checkbox() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'locale')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'theme')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'logged_at')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'created_at')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true, 'disabled' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
