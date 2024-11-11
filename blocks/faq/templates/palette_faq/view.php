<?php  defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
?>

<div class="palette-faq">
<?php if (count($rows) > 0) : ?>
	<?php foreach ($rows as $row) : ?>
<dl class="palette-faq-contents panel panel-default">
	<dt class="panel-heading">
        <h4 class="panel-title"><?php echo $row['linkTitle'] ?></h4>
	</dt>
	<dd class="palette-faq-block-entries panel-collapse collapse"<?php if ($c->isEditMode()): ?> style="display: block !important;"<?php  endif; ?>>
		<?php echo $row['description'] ?>
	</dd>
</dl>
	<?php endforeach; ?>
<?php  else: ?>
	<div class="ccm-faq-block-links">
		<p><?php echo t('No Faq Entries Entered.'); ?></p>
	</div>
<?php endif; ?>
</div>

