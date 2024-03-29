<?php
/**
 * Odosle ulohu studentom
 *@author  Katka, V.Jurenka
 */

$this->pageTitle = "Odoslať email";
echo '<h2>' . $this->pageTitle . '</h2>';
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'TestEmailForm',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <?php echo $form->errorSummary($model , 'Prosím opravte nasledovné:'); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'subject'); ?>
        <?php echo $form->textField($model,'subject'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'body'); ?>
        <?php echo $form->textArea($model,'body'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'test_id'); ?>
        <?php  echo $form->dropDownList($model, 'test_id', CHtml::listData(Tests::model()->findAll('user_id =:user_id', array(':user_id' => Yii::app()->user->id)), 'id', 'name'));
         ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'list_id'); ?>
        <?php  echo $form->dropDownList($model, 'list_id', CHtml::listData(StudentLists::model()->findAll('user_id =:user_id', array(':user_id' => Yii::app()->user->id)), 'id', 'name'), array('prompt' => Yii::t('site', 'Prosím vyberte zoznam študentov')));
        ?>
    </div>

    <div class="row">

    </div>

   <div class="row buttons">
        <?php echo CHtml::submitButton('Odoslať'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->