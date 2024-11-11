<?php  defined("C5_EXECUTE") or die("Access Denied."); ?>

<div class="form-group">
    <?php  echo $form->label("HeadingText", t("Heading Text")); ?>
    <?php  echo isset($btFieldsRequired) && in_array('HeadingText', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null; ?>
    <?php  echo $form->text("HeadingText", $HeadingText, array (
  'maxlength' => '255',
  'placeholder' => NULL,
)); ?>
</div>

<?php  $al = Core::make("helper/concrete/asset_library"); ?>
<div class="form-group">
    <?php
    if ($HeadingImage > 0) {
        $HeadingImage_o = File::getByID($HeadingImage);
        if ($HeadingImage_o->isError()) {
            unset($HeadingImage_o);
        }
    } ?>
    <?php  echo $form->label("HeadingImage", t("Heading Image")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('HeadingImage', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  echo $al->file("ccm-b-file-HeadingImage", "HeadingImage", t("Choose File"), $HeadingImage_o); ?>
</div>

<div class="form-group">
    <?php  echo $form->label("Formatting", t("Formatting")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('Formatting', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  $options = array(
        '' => '-- なし --',
        'h1' => 'H1',
        'h2' => 'H2',
        'h3' => 'H3',
        'h4' => 'H4',
        'h5' => 'H5',
        'h6' => 'H6'
    ); ?>
    <?php  echo $form->select("Formatting", $options, $Formatting); ?>
</div>

<div class="form-group">
    <?php  echo $form->label("StyleOption", t("Style Option")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('StyleOption', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  $options = array(
        '' => '-- なし --',
        'heading-colored' => 'Heading Colored',
        'heading-colored-wide' => 'Heading Colored Wide',
        'heading-white' => 'Heading White',
        'heading-white-wide' => 'Heading White Wide'
    ); ?>
    <?php  echo $form->select("StyleOption", $options, $StyleOption); ?>
</div>

<div class="form-group">
    <?php  echo $form->label("HeadingDescription", t("Heading Description")); ?>
    <?php  echo (isset($btFieldsRequired) && in_array('HeadingDescription', $btFieldsRequired) ? '<small class="required">' . t('Required') . '</small>' : null); ?>
    <?php  print $form->textarea("HeadingDescription", $HeadingDescription, array (
  'rows' => 5,
)); ?>
</div>