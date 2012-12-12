<?php
/**
 * Zobrazuje formular a rich text editor na upravu uloh.
 * @author Eva Libantova
 */

Yii::app()->clientScript->registerPackage('jquery.ui');
Yii::app()->clientScript->registerPackage('fancybox');
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl() .
        '/jui/css/base/jquery-ui.css'
);

Yii::app()->clientScript->registerPackage('tiny_mce');
$config['img_path'] = '/tis/uploads';
echo $_SERVER['DOCUMENT_ROOT'].$config['img_path'];
?>


<?php
if($model->id == ''){
   /* $this->breadcrumbs=array(
        'Správa úloh' => Yii::app()->request->baseUrl . '/task',
        'Moje úlohy'=>array('my'),
        'Vytvoriť novú úlohu'
    );*/
    $this->pageTitle = "Vytvoriť novú úlohu";
} else {
/*$this->breadcrumbs=array(
    'Moje úlohy'=>array('my'),
    $model->name=>array('view', 'id'=>$model->id),
    'Upraviť'
);*/
    $this->pageTitle = $model->name . " - Upraviť";
}

echo '<h2>' . $this->pageTitle . '</h2>';
?>
    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array('id' => 'Tasks')); ?>

        <?php echo $form->hiddenField($model, 'user_id', array('value' => Yii::app()->user->id)); ?>

        <?php echo $form->errorSummary($model, 'Prosím opravte nasledovné:'); ?>

        <div class="row">
            <?php echo $form->label($model,'name'); ?>
            <?php echo $form->textField($model,'name') ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'html'); ?>
            <div style="float:left">
                <?php echo $form->textArea($model, 'html', array(
                'class' => 'name tinymce',
                'rows' => "25",
                //'cols'=>"80"
            )); ?>
            </div>
            <div class="clear"></div>
        </div>

        <div class="row">
            <?php echo $form->label($model,'is_public'); ?>
            <?php echo $form->checkBox($model,'is_public'); ?>
        </div>

        <div class="row">
            <?php echo $form->label($model,'keyword'); ?>
            <?php echo $form->textField($model,'keyword'); ?>
        </div>

        <div class="row submit">
            <?php echo CHtml::submitButton('Uložiť'); ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->


<script type="text/javascript">
    $().ready(function () {
        $('textarea.tinymce').tinymce({
            // General options
            theme:"advanced",
            relative_urls : false,
//            plugins:"autolink,lists,style,layer,table,save,iespell,inlinepopups,insertdatetime,preview,searchreplace,contextmenu,paste,directionality",
            plugins : "jbimages, autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",


            theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,jbimages,image,|,insertdate,inserttime,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,|,sub,sup,|,charmap,emotions,|,fullscreen",
            //theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            height:"600",
            width: "680",
            language : "sk"

        });
    });
</script>
