<?php
/**
 *@author Milos Blascak
 */

/*
$this->breadcrumbs=array(
    'Študenti',
    $model->name=>array('view', 'id'=>$model->id),
    'Upraviť'
);*/
$this->pageTitle = "Študent";
?>
<div class="form">
    <?php
    $form=$this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'Students',
        )
    );
    ?>

    <?php echo $form->errorSummary($model, 'Prosím opravte nasledovné:'); ?>

    <div class="row">
        <?php echo $form->label($model,'name'); ?>
        <?php echo $form->textField($model,'name') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model,'email'); ?>
        <?php echo $form->textField($model,'email') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Uložiť'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
