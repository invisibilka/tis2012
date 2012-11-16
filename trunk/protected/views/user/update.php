<div class="form">
    <?php
    /**
     *@author  Vladimir Jurenka
     */


    $form = $this->beginWidget('CActiveForm', array('id' => 'Users')); ?>

    <div class="row">
        <?php echo $form->label($model, 'full_name'); ?>
        <?php echo $form->textField($model, 'full_name') ?>
        <?php echo $form->error($model, 'full_name') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email') ?>
        <?php echo $form->error($model, 'email') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'email'); ?>
        <?php echo $form->textField($model, 'email') ?>
        <?php echo $form->error($model, 'email') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'new_password'); ?>
        <?php echo $form->passwordField($model, 'new_password') ?>
        <?php echo $form->error($model, 'new_password') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'new_password2'); ?>
        <?php echo $form->passwordField($model, 'new_password2') ?>
        <?php echo $form->error($model, 'new_password2') ?>
    </div>

    <?php if (false && Users::model()->findByPk(Yii::app()->user->id)->permissions) { ?>
    <div class="row">
        <?php echo $form->label($model, 'permissions'); ?>
        <?php echo $form->checkBox($model, 'permissions'); ?>

    </div>
    <?php }  ?>
    <div class="row submit">
        <?php echo CHtml::submitButton('Uložiť'); ?>
    </div>

    <?php

    $this->endWidget(); ?>
</div>

