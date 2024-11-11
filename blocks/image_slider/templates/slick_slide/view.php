<?php defined('C5_EXECUTE') or die("Access Denied.");
$navigationTypeText = ($navigationType == 0) ? 'arrows' : 'pages';
$c = Page::getCurrentPage();
if ($c->isEditMode()) : ?>
    <div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : '' ?><?php echo isset($height) ? "height: $height;" : '' ?>">
        <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.')?></div>
    </div>
<?php else : ?>

<script>
$(function() {
	$('.slick-image-slider-inner').fadeIn(800);

    $('.center-item').slick({
    	lazyLoad: 'ondemand',
		infinite: true,
		dots: true,
		slidesToShow: 1,
		centerMode: true,
		centerPadding: '70px',
		autoplay: true,
		responsive: [{
			breakpoint: 480,
			settings: {
				centerMode: false,
			}
		}]
	});
});
</script>

<div class="slick-image-slider-container slick-block-image-slider-<?php echo $navigationTypeText?>" >
    <div class="slick-image-slider">
        <div class="slick-image-slider-inner">

        <?php if(count($rows) > 0) : ?>
        <ul class="slider center-item" id="slick-image-slider-<?php echo $bID ?>">
            <?php foreach($rows as $row) : ?>
                <li>
                <?php if($row['linkURL']) { ?>
                    <a href="<?php echo $row['linkURL'] ?>" class="mega-link-overlay"></a>
                <?php } ?>
                <?php
                $f = File::getByID($row['fID'])
                ?>
                <?php if(is_object($f)) {
                    $tag = Core::make('html/image', array($f, false))->getTag();
                    if($row['title']) {
                    	$tag->alt($row['title']);
                    }else{
                    	$tag->alt("slide");
                    }
                    print $tag; ?>
                <?php } ?>
                <?php if($row['title']) { ?>
                <div class="slick-image-slider-text">
                    <h2 class="slick-image-slider-title"><?php echo $row['title'] ?></h2>
                    <?php echo $row['description'] ?>
                </div>
                <?php } ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php else : ?>
        <div class="slick-image-slider-placeholder">
            <p><?php echo t('No Slides Entered.'); ?></p>
        </div>
        <?php endif; ?>
        </div>

    </div>
</div>
<?php endif; ?>
