<?php
/**
 * Zobrazi formmular pre odoslanie pozvanky na zadany email.
 * @author Milos Blascak
 */

$this->pageTitle = "Pozvat noveho pouzivatela";

$this->breadcrumbs= array(
       'Odoslať pozvánku'
);
    echo $message;
?>
<div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id' => 'Invitations')); ?>

        <?php echo $form->errorSummary($model, 'Chyba:'); ?>

        <div class="row">
            <?php echo $form->label($model,'email'); ?>
            <?php echo $form->textField($model,'email') ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Odoslať'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->