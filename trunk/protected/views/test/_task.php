<?php
/**
 * riadok v tabulke uloh v teste
 * @author V.Jurenka
 */
?>
<tr class="task_item">
    <td class="checkbox"><?php echo CHtml::checkBox('task_'.$model->id); ?></td>
    <td class="task_index"><?php echo $index; ?></td>
    <td class="task_name"><?php echo $model->name; ?></td>
    <td class="task_up_down">
        <?php
            echo CHtml::link('<img class="move_arrow" src="'.Yii::app()->baseUrl."/images/up.png".'" alt="vyššie"/>','javascript:move('.$index.', 0)');
        ?>
                &nbsp;
        <?php
             echo CHtml::link('<img class="move_arrow" src="'.Yii::app()->baseUrl."/images/down.png".'" alt="nižšie"/>','javascript:move('.$index.', 1)');
        ?>
    </td>
</tr>