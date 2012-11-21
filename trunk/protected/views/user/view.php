<?php
/**
 * Zobrazuje profil pouzivatela
 * @author  Vladimir Jurenka
 */
$this->pageTitle = $model->full_name;
echo '<h2>' . CHtml::encode($model->full_name) . '</h2>';
?>
<div class="">
    
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
