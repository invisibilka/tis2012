<?php
/**
 *@author Eva Libantova
 */

$this->breadcrumbs=array(
    'Úlohy'=>array('find'),
    $model->name=>array('view', 'id'=>$model->id),
    'Upraviť'
);
?>
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id' => 'Tasks')); ?>

        <?php echo $form->errorSummary($model); ?>

        <div class="row">
            <?php echo $form->label($model,'name'); ?>
            <?php echo $form->textField($model,'name') ?>
        </div>

        <div class="row">
            <?php echo $form->label($model,'html'); ?>
            <?php echo $form->textArea($model,'html',array('rows' => 12, 'cols' => 50)) ?>
        </div>

        <div class="row rememberMe">
            <?php echo $form->checkBox($model,'is_public'); ?>
            <?php echo $form->label($model,'is_public'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Uložiť'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->



