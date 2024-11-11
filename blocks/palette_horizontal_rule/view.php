<?php defined("C5_EXECUTE") or die("Access Denied."); ?>

<?php switch($SelectColors){
case "monochrome":
    // ENTER MARKUP HERE FOR FIELD "Select colors" : CHOICE "Monochrome"
    $Colors = "monochrome";
    break;
case "colored":
    // ENTER MARKUP HERE FOR FIELD "Select colors" : CHOICE "Colored"
    $Colors = "colored";
    break;
default:
	$Colors = "default";
} ?>

<?php switch($SelectWidth){
case "narrow":
    // ENTER MARKUP HERE FOR FIELD "Select width" : CHOICE "Narrow"
    $Width = "narrow";
    break;
case "wide":
    // ENTER MARKUP HERE FOR FIELD "Select width" : CHOICE "Wide"
    $Width = "wide";
    break;
default:
	$Width = "dot";
} ?>

<hr class="<?php echo($Colors); ?> <?php echo($Width); ?>">