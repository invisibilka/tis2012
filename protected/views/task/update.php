<?php
$this->breadcrumbs=array(
    'Úlohy', 'Upraviť úlohu č.' . $model->id,
);
?>
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id' => 'Tasks')); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->label($model,'Názov úlohy'); ?>
            <?php echo $form->textField($model,'name') ?>
        </div>

        <div class="row">
            <?php echo $form->label($model,'Text úlohy'); ?>
            <?php echo $form->textArea($model,'html',array('rows' => 12, 'cols' => 50)) ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'is_public'); ?>
            <?php echo $form->label($model,'Verejná (zobrazuje&nbsp;sa&nbsp;ostatným&nbsp;učiteľom)'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Uložiť'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->



