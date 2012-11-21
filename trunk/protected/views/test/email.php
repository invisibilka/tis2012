<?php
/**
 * Odosle ulohu studentom
 *@author  Katka, V.Jurenka
 */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'TestEmailForm',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'subject'); ?>
        <?php echo $form->textField($model,'subject'); ?>
        <?php echo $form->error($model,'subject'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'body'); ?>
        <?php echo $form->textArea($model,'body'); ?>
        <?php echo $form->error($model,'body'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'test_id'); ?>
        <?php  echo $form->dropDownList($model, 'test_id', CHtml::listData(Tests::model()->findAll('user_id =:user_id', array(':user_id' => Yii::app()->user->id)), 'id', 'name'), array('prompt' => Yii::t('site', 'Please select a test')));
         ?>
        <?php echo $form->error($model,'test_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'list_id'); ?>
        <?php  echo $form->dropDownList($model, 'list_id', CHtml::listData(StudentLists::model()->findAll('user_id =:user_id', array(':user_id' => Yii::app()->user->id)), 'id', 'name'), array('prompt' => Yii::t('site', 'Please select a test')));
        ?>
        <?php echo $form->error($model,'list_id'); ?>
    </div>

    <div class="row">

    </div>

   <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->