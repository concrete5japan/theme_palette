<?php defined("C5_EXECUTE") or die("Access Denied."); ?>

<?php switch($Formatting){
case "h1":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H1"
    $Heading = "h1";
    break;
case "h2":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H2"
    $Heading = "h2";
    break;
case "h3":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H3"
    $Heading = "h3";
    break;
case "h4":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H4"
    $Heading = "h4";
    break;
case "h5":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H5"
    $Heading = "h5";
    break;
case "h6":
    // ENTER MARKUP HERE FOR FIELD "Formatting" : CHOICE "H6"
    $Heading = "h6";
    break;
default:
	$Heading = "p";
} ?>

<?php switch($StyleOption){
case "heading-colored":
    // ENTER MARKUP HERE FOR FIELD "Style Option" : CHOICE "Heading Colored"
    $Decoration = "palette-heading colored";
    break;
case "heading-colored-wide":
    // ENTER MARKUP HERE FOR FIELD "Style Option" : CHOICE "Heading Colored Wide"
    $Decoration = "palette-heading colored wide";
    break;
case "heading-white":
    // ENTER MARKUP HERE FOR FIELD "Style Option" : CHOICE "Heading White"
    $Decoration = "palette-heading";
    break;
case "heading-white-wide":
    // ENTER MARKUP HERE FOR FIELD "Style Option" : CHOICE "Heading White Wide"
    $Decoration = "palette-heading wide";
    break;
default:
	$Decoration = "none";
} ?>

<?php if (isset($HeadingDescription) && trim($HeadingDescription) != ""): ?>

<div class="palette-heading-description">
	<div class="<?php if ($HeadingImage) : ?><?php echo('heading-image'); ?><?php else : ?><?php echo($Decoration); ?><?php endif; ?>">
		<?php if ($HeadingImage) : ?>
		    <<?php echo($Heading); ?>><img src="<?php echo $HeadingImage->getURL(); ?>" alt="<?php echo $HeadingImage->getTitle(); ?>"/></<?php echo($Heading); ?>>
		<?php else : ?>
			<?php if (isset($HeadingText) && trim($HeadingText) != "") : ?>
				<<?php echo($Heading); ?>><?php echo h($HeadingText); ?></<?php echo($Heading); ?>>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<div class="description-container">
	    <div class="centered"><p><?php echo h($HeadingDescription); ?></p></div>
	</div>
</div>

<?php else : ?>

	<?php if ($HeadingImage) : ?>
		<<?php echo($Heading); ?> class="<?php echo($Decoration); ?><?php if ($HeadingImage) : ?> <?php echo('heading-image-title'); ?><?php else : ?><?php endif; ?>"><img src="<?php echo $HeadingImage->getURL(); ?>" alt="<?php echo $HeadingImage->getTitle(); ?>"/></<?php echo($Heading); ?>>
	<?php else : ?>
		<?php if (isset($HeadingText) && trim($HeadingText) != "") : ?>
			<<?php echo($Heading); ?> class="<?php echo($Decoration); ?>"><?php echo h($HeadingText); ?></<?php echo($Heading); ?>>
		<?php endif; ?>
	<?php endif; ?>

<?php endif; ?>






