<?php
/**
 * Edituje test
 * @author  Katka, V.Jurenka
 */

Yii::app()->getClientScript()->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl() .
        '/jui/css/base/jquery-ui.css'
);
Yii::app()->clientScript->registerCSSFile(Yii::app()->request->baseUrl . '/css/starrating.css');

$this->pageTitle = "Písomka";
echo '<h2>' . $this->pageTitle . '</h2>';
?>



<div id="dialog" style="zoom : 40%"></div>

<div class="form">
    <div class="row">
        <?php echo CHtml::label('Názov testu', 'name'); ?>
        <?php echo CHtml::textField('name', $model->name, array('class'=> 'long', 'onBlur' => 'saveName();', 'onChange' => 'saveName();')); ?>
    </div>


    <table id="tasksTable">
        <thead>
        <tr>
            <th></th>
            <th>Poradie</th>
            <th>Názov</th>
            <th>Presunúť</th>
        </tr>
        </thead>
        <tbody id="tasks">
        <?php
        foreach ($model->tests_tasks as $r_task) {
            $_task = $r_task->task;
            $this->renderPartial('_task', array('index' => $r_task->task_index, 'model' => $_task));
        }
        ?>
        </tbody>
    </table>

    <div id="testControls">
        <div><a href="javascript:addToTest();" class="testControllers"><img src="<?php echo Yii::app()->baseUrl."/images/up.png"?>" alt="&lt;&lt;pridať do testu&lt;&lt;" /> Pridať úlohu do testu</a></div>
        <div><a href="javascript:removeFromTest();" class="testControllers"><img src="<?php echo Yii::app()->baseUrl."/images/down.png"?>" alt="&gt;&gt;odobrať z testu&gt;&gt;" /> Odobrať úlohu z testu</a></div>
        <div class="clearfix"></div>
    </div>

    <div id="taskPool">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider' => $task->search(),
            'id' => 'Tasks',
            'filter' => $task,
            'summaryText' => 'Záznam {start} až {end} z {count} výsledkov',
            'columns' => array(
                array(
                    'type' => 'raw',
                    'value' => 'CHtml::checkBox("pool_".$data->id)'
                ),
                array(
                    'type' => 'raw',
                    'name' => 'name',
                    'value' => 'CHtml::Link($data->name, Yii::app()->createUrl(\'task/view/id/\' . $data->id), array("target"=>"_blank"))'
                ),
                array(
                    'name' => 'keyword',
                    'value' => '$data->keywordsList',
                ),
                array(
                    'name' => 'rating',
                    'type' => 'raw',
                    'value' => "CHtml::tag('ul', array('class' => 'star-rating' ), " .
                        'CHtml::tag(\'li\',
                        array(\'class\' => \'current-rating\', \'id\' => \'current-rating\' . $data->id, \'style\' => \'width: \' . $data->rating*25 . \'px\'), \'Currently \' . round($data->rating,1) . \'/5 Stars.\' , true)  ' .
                        ", true)"
                ),
                array(
                    'type' => 'raw',
                    'name' => 'username',
                    'value' => '$data->user ? CHtml::link( $data->user->full_name , Yii::app()->createUrl("user/view/", array("id"=>$data->user_id))): "Neznámy autor"'
                )
            ), 
			'cssFile' =>false)); ?>
    </div>

    <div class="clearfix"></div>

    <button onclick="preview();">Náhľad</button>
</div>

<script type="text/javascript">

    $('#dialog').dialog({ modal:true, autoOpen:false, width:335, resizable:false});

    function preview() {
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::app()->baseUrl . '/test/preview/'; ?>",
            data:{ id: <?php echo $model->id; ?> }
        }).done(function (msg) {
                $('#dialog').html(msg);
                $('#dialog').dialog('open');
            });
    }

    function refreshLeft() {
        $.ajax({
            type:"GET",
            url:"<?php echo Yii::app()->baseUrl . '/test/ajaxTasks/'; ?>",
            data:{ id: <?php echo $model->id; ?> }
        }).done(function (msg) {
                $('#tasks').html(msg);
            });
    }


    function addToTest() {
        var boxes = $("#taskPool input:checkbox:checked");
        var ids = [];
        $.each(boxes, function (key, value) {
            ids.push($(value).attr('id').substr(5));
        });
        $.ajax({
            type:"POST",
            url:"<?php echo Yii::app()->baseUrl . '/test/ajaxAddToTest/'; ?>",
            data:{ id: <?php echo $model->id; ?> , tasks:ids}
        }).done(function (msg) {
                $('#taskPool input:checkbox').removeAttr('checked');
                refreshLeft();
                $.fn.yiiGridView.update("Tasks");
            });
    }

    function removeFromTest() {
        var boxes = $("#tasks input:checkbox:checked");
        var ids = [];
        $.each(boxes, function (key, value) {
            ids.push($(value).attr('id').substr(5));
        });
        $.ajax({
            type:"POST",
            url:"<?php echo Yii::app()->baseUrl . '/test/ajaxRemoveFromTest/'; ?>",
            data:{ id: <?php echo $model->id; ?> , tasks:ids}
        }).done(function (msg) {
                $('#tasks input:checkbox').removeAttr('checked');
                refreshLeft();
                $.fn.yiiGridView.update("Tasks");
            });
    }

    function move(index, dir) {
        $.ajax({
            type:"POST",
            url:"<?php echo Yii::app()->baseUrl . '/test/ajaxMove/'; ?>",
            data:{ id: <?php echo $model->id; ?> , index:index, dir:dir}
        }).done(function (msg) {
                refreshLeft();
            });
    }

    function saveName(){
        $.ajax({
            type:"POST",
            url:"<?php echo Yii::app()->baseUrl . '/test/ajaxRename/'; ?>",
            data:{ id: <?php echo $model->id; ?> , name :$('#name').val()}
        }).done(function (msg) {
            });
    }


</script>