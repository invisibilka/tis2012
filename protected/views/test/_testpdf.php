<?php echo "<p><h1>". $model->name."</h1></p>";

 foreach ($model->tests_tasks as $task) {
     echo "<br/> <div>";
        echo  "<b>".$task->task_index . '.)';
        echo $task->task->name;
        echo " </b> <br />";
        echo  $task->task->html;
    echo "</p><br/>

</div>" ;}
?>

