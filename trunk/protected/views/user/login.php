<?php
/**
 * prihlasovanie pouzivatela
 * @author  Vladimir Jurenka
 */
$this->pageTitle = "Prihlásenie do systému";
echo '<h2>' . $this->pageTitle . '</h2>';

?>

<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'login-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'username'); ?>
        <?php echo $form->textField($model, 'username'); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
        <?php echo $form->passwordField($model, 'password'); ?>
        <?php echo $form->error($model, 'password'); ?>
    </div>

    <div class="row rememberMe">
        <?php echo $form->checkBox($model, 'rememberMe', array('style' => 'float: left;
                margin-right: 5px;
                margin-top: 5px;'));
        ?>
        <?php echo $form->label($model, 'rememberMe'); ?>
        <?php echo $form->error($model, 'rememberMe'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Prihlásiť'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->