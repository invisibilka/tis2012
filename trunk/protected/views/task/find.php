<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); 
                   
              
    echo $form->errorSummary($model); 
 

       echo $form->label($model,'Vyhľadávanie');
        echo $form->textField($model,'html'); 
               
       echo CHtml::submitButton('Hľadať'); 

 
$this->endWidget(); ?>
</div><!-- form -->
