<?php
/**Zmeni udaje pouzivatela
 * @author  Vladimir Jurenka
 */

$this->pageTitle = "Používateľ - Úprava profilu";
?>
<div class="form">

	<h2>Úprava profilu</h2>

    <?php
    $form = $this->beginWidget('CActiveForm', array('id' => 'Users')); ?>

    <h3>Všeobecné informácie</h3>
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
        <?php echo $form->label($model, 'about'); ?>
        <?php echo $form->textArea($model, 'about') ?>
        <?php echo $form->error($model, 'about') ?>
    </div>

    <h3>Prihlasovacie údaje</h3>
    <div class="row">
        <?php echo $form->label($model, 'username'); ?>
        <?php echo $form->textField($model, 'username') ?>
        <?php echo $form->error($model, 'username') ?>
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

    <?php if (Users::model()->findByPk(Yii::app()->user->id)->permissions) { ?>
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


