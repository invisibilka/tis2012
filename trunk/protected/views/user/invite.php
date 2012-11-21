<?php
/**
 * Zobrazi formmular pre odoslanie pozvanky na zadany email.
 * @author Milos Blascak
 */

$this->pageTitle = "Pozvať nového používateľa";
    echo $message;

?>
<div id="invite-form">

<h2>Pozvať nového používateľa</h2>

<p>Nikto sa bez pozvánky nedostane do systému. Pre pridanie nového používateľa stačí vyplniť pole s <strong>emailovou adresou</strong>, ktorú vaša <strong>kolegyňa/kolega</strong> používa.</p>

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