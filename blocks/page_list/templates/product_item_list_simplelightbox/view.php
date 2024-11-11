<?php
defined('C5_EXECUTE') or die("Access Denied.");
$th = Core::make('helper/text');
$c = Page::getCurrentPage();
$dh = Core::make('helper/date'); /* @var $dh \Concrete\Core\Localization\Service\Date */
?>

<?php if ( $c->isEditMode() && $controller->isBlockEmpty()) { ?>
    <div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.')?></div>
<?php } else { ?>

<script>
(function() {

	$(function() {
		var byRow = $('body').hasClass('');
		$('.product-item-list').each(function() {
			$(this).children('.gateaux-item').matchHeight({
				byRow: byRow
			});
		});
	});

})();
</script>
<script>
	$(function(){
		var $gallery = $('.gallery a').simpleLightbox({
			captionsData: 'alt',
			showCounter: false,
			//loop: false
		});
	});
</script>

<div class="product-item-list clearfix">

    <?php

    $includeEntryText = false;
    if ($includeName || $includeDescription || $useButtonForLink) {
        $includeEntryText = true;
    }

    foreach ($pages as $page):

		// Prepare data for each page being listed...
        //$buttonClasses = 'ccm-block-page-list-read-more';
        //$entryClasses = 'ccm-block-page-list-page-entry';
		$title = $th->entities($page->getCollectionName());
		$url = ($page->getCollectionPointerExternalLink() != '') ? $page->getCollectionPointerExternalLink() : $nh->getLinkToCollection($page);
		$target = ($page->getCollectionPointerExternalLink() != '' && $page->openCollectionPointerExternalLinkInNewWindow()) ? '_blank' : $page->getAttribute('nav_target');
		$target = empty($target) ? '_self' : $target;
		$description = $page->getCollectionDescription();
		$description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
		$description = $th->entities($description);
        $thumbnail = false;
        if ($displayThumbnail) {
            $thumbnail = $page->getAttribute('thumbnail');
        }
        if (is_object($thumbnail) && $includeEntryText) {
            $entryClasses = 'ccm-block-page-list-page-entry-horizontal';
        }

        $date = $dh->formatDateTime($page->getCollectionDatePublic(), true);


		//Other useful page data...


		//$last_edited_by = $page->getVersionObject()->getVersionAuthorUserName();

		//$original_author = Page::getByID($page->getCollectionID(), 1)->getVersionObject()->getVersionAuthorUserName();

		/* CUSTOM ATTRIBUTE EXAMPLES:
		 * $example_value = $page->getAttribute('example_attribute_handle');
		 *
		 * HOW TO USE IMAGE ATTRIBUTES:
		 * 1) Uncomment the "$ih = Loader::helper('image');" line up top.
		 * 2) Put in some code here like the following 2 lines:
		 *      $img = $page->getAttribute('example_image_attribute_handle');
		 *      $thumb = $ih->getThumbnail($img, 64, 9999, false);
		 *    (Replace "64" with max width, "9999" with max height. The "9999" effectively means "no maximum size" for that particular dimension.)
		 *    (Change the last argument from false to true if you want thumbnails cropped.)
		 * 3) Output the image tag below like this:
		 *		<img src="<?php echo $thumb->src ?>" width="<?php echo $thumb->width ?>" height="<?php echo $thumb->height ?>" alt="" />
		 *
		 * ~OR~ IF YOU DO NOT WANT IMAGES TO BE RESIZED:
		 * 1) Put in some code here like the following 2 lines:
		 * 	    $img_src = $img->getRelativePath();
		 *      $img_width = $img->getAttribute('width');
		 *      $img_height = $img->getAttribute('height');
		 * 2) Output the image tag below like this:
		 * 	    <img src="<?php echo $img_src ?>" width="<?php echo $img_width ?>" height="<?php echo $img_height ?>" alt="" />
		 */

		/* End data preparation. */

		/* The HTML from here through "endforeach" is repeated for every item in the list... */

		$productPrice = $page->getAttribute('product_price');
	?>

		<div class="gateaux-item item-grid gallery">
			<?php if (is_object($thumbnail)): ?>
				<?php $img_src = $thumbnail->getRelativePath(); ?>
				<a href="<?php echo $img_src ?>" title="<?php echo $title; ?>">
		            <div class="ccm-block-page-list-page-entry-thumbnail">
		                <img src="<?php echo $img_src ?>" class="img-responsive" alt="<?php echo $title; ?>" />
		            </div>
					<h3 class="product-title"><?php echo $title; ?></h3>
					<p class="product-price"><?php echo $productPrice; ?></p>
					<p><?php if ($includeDescription){ echo $description; } ?></p>
				</a>
			<?php else: ?>
				<div class="gallery-card">
					<h3 class="product-title"><?php echo $title; ?></h3>
					<p class="product-price"><?php echo $productPrice; ?></p>
					<p><?php if ($includeDescription){ echo $description; } ?></p>
				</div>
			<?php endif; ?>
		</div>

	<?php endforeach; ?>

    <?php if (count($pages) == 0): ?>
	<div class="ccm-block-page-list-no-pages"><?php echo h($noResultsMessage)?></div>
    <?php endif;?>

</div>


<?php if ($showPagination): ?>
    <?php //echo $pagination;?>
    <?php
    $pagination = $list->getPagination();
    if ($pagination->getTotalPages() > 1) {
        $options = array(
            'prev_message' => t('Previous'),
            'next_message' => t('Next'),
            'css_container_class' => 'pl-pagination pagination',
        );
        echo $pagination->renderDefaultView($options);
    }
    ?>
<?php endif; ?>

<?php } ?>
