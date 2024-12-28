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
    $('.carousel-item').slick({
	    lazyLoad: 'ondemand',
	    infinite: true,
	    dots: true,
	    slidesToShow: 3,
	    slidesToScroll: 1,
	    //centerMode: true,
	    //centerPadding: '70px',
	    autoplay: true,
	    responsive: [{
	      breakpoint: 770,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	      }
	    },{
	      breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      }
	    ]
	});
});
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

<div class="slick-image-slider-container slick-block-image-slider-<?php echo $navigationTypeText?>" >
    <div class="slick-image-slider">
        <div class="slick-image-slider-inner">

	        <?php if(count($rows) > 0) : ?>
	        <ul class="slider carousel-item gallery" id="slick-image-slider-<?php echo $bID ?>">
	            <?php foreach($rows as $row) : ?>
	                <li>
		                <figure class="effect<?php if($row['title']) { echo (' fade-effect'); } ?>">

		                <?php
		                $f = File::getByID($row['fID'])
		                ?>

		                <?php if(is_object($f)) {
                            $tag = Core::make('html/image', ['f' => $f])->getTag();
                        $tag->setAttribute("width", $f->getAttribute('width'));
                        $tag->setAttribute("height", $f->getAttribute('height'));
                            ?>
                            <?php if ($row['linkURL']) {
                                ?>
                                <a href="<?php echo $row['linkURL']; ?>" class="mega-link-overlay"></a>
                                <?php
                            } ?>

							<?php if ($row['title']) {
                                $tag->alt(h($row['title']));
                            } else {
                                $tag->alt("slide");
                            }
		                    print $tag; ?>
		                <?php } ?>
						<?php if($row['title']) { ?>
			                <figcaption>
			                	<h2><?php echo $row['title'] ?></h2>
								<div class="effect-description lightbox">
									<?php echo $row['description'] ?>
								</div>
			                </figcaption>
						<?php } ?>
			                </a>
		                </figure>
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
