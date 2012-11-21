<?php
/**
 * Zobrazuje profil pouzivatela
 * @author  Vladimir Jurenka
 */
$this->pageTitle = CHtml::encode($model->full_name) . " profil";
?>
<div class="">
    <h2><?php echo CHtml::encode($model->full_name);?></h2>
    <br/>

    <h3>Kontakt</h3>

    <p>
        <?php echo $model->email; ?>
    </p>
    <br/>

    <h3>O mne</h3>

    <p>
        <?php echo CHtml::encode($model->about);?>
    </p>
</div>
