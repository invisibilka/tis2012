<?php
/**
 * prihlasovanie pouzivatela
 *@author  Vladimir Jurenka
 */
$this->pageTitle = "Prihlásenie do systému";
?>

<h2>Prihlásenie do systému</h2>

<div class="form login">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Prihlasit'); ?>
	</div>
    
    <p class="note">Polia označené <span class="required">*</span> sú povinné</p>

<?php $this->endWidget(); ?>
</div><!-- form -->

<div id="info">
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget orci massa. Duis venenatis justo quis diam bibendum vulputate. Phasellus sit amet dui vitae massa mattis ultricies. Sed ante felis, viverra nec ultricies placerat, eleifend volutpat tellus. Quisque vel felis id neque tristique egestas. Morbi eu lectus mi, eu lacinia dui. Mauris dapibus nisl vitae erat mattis imperdiet. Nulla facilisi. Nullam nec suscipit augue. Sed eget massa eget magna aliquet rhoncus nec vel tellus. Nulla cursus dapibus nisi, a fringilla sem tincidunt sit amet. Sed auctor rutrum risus, ac venenatis nulla imperdiet non. Nam posuere, ipsum sit amet dictum viverra, justo justo cursus nunc, eget mattis tortor dolor non dolor. Vestibulum lobortis venenatis odio vitae malesuada.</p>
</div>