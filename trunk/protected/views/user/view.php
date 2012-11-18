<?php
/**
 * @author  Vladimir Jurenka
 */
?>
<div class="">
    <h2><?php echo $model->full_name;?></h2>
    <br/>

    <h3>Kontakt</h3>

    <p>
        <?php echo $model->email; ?>
    </p>
    <br/>

    <h3>O mne</h3>

    <p>
        <?php echo $model->about;?>
    </p>
</div>
