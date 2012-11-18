<?php
/**
 * @author Marek Oravec
 */

?>

<div class="form">
    <?php
    $form = $this->beginWidget(
    'CActiveForm',
        array(
            'id' => 'StudentLists',
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
    ?>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name') ?>
        <?php echo $form->error($model, 'name') ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, '_file'); ?>
        <?php echo $form->fileField($model, '_file') ?>
        <?php echo $form->error($model, '_file') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Uložiť'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>

<?php if($model->id){
    $student = new Students();
    $student->list_id = $model->id;
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $student->search(),
        'id' => 'studentList',
        'columns' => array(
            array(
                'name' => 'name',
                'value' => '$data->name',
            )
        )
    ));

} ?>
