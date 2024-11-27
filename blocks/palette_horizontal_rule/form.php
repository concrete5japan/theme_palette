<?php  defined("C5_EXECUTE") or die("Access Denied.");

$SelectColors = '';
$SelectWidth = '';
?>

<div class="form-group">
    <?php  echo $form->label("SelectColors", t("Select colors")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('SelectColors', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  $options = array(
        '' => '-- なし --',
        'monochrome' => 'Monochrome',
        'colored' => 'Colored'
    ); ?>
    <?php echo $form->select("SelectColors", $options, $SelectColors); ?>
</div>

<div class="form-group">
    <?php  echo $form->label("SelectWidth", t("Select width")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('SelectWidth', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  $options = array(
        '' => '-- なし --',
        'narrow' => 'Narrow',
        'wide' => 'Wide'
    ); ?>
    <?php echo $form->select("SelectWidth", $options, $SelectWidth); ?>
</div>