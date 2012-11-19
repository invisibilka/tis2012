
<p>

<h1><?php $model->name;  ?> </h1>
</p>
<br/>
<div>
    <b> <?php foreach ($model->tests_tasks as $task) {
        echo  $task->task_index . '.)';
        echo $task->task->name;
    } ?> </b>

    <p> <?php foreach ($model->tests_tasks as $task) {
        echo  $task->task->html;
    }?> </p>
</div>
<br/>
