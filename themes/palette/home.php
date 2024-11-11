<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header_home.php');
?>

		<?php
			$a = new Area('Image Slider');
			if ($a->getTotalBlocksInArea($c) > 0) {}
			$a->setBlockWrapperStart('<div class="slider-image">',true);
			$a->setBlockWrapperEnd('</div>');
			$a->setBlockLimit(1);
			$a->display($c);
		?>

		<!--  Main Contents -->
		<div class="main-container">
			<?php
			$a = new Area('Page Header');
			//$a->enableGridContainer();
			$a->display($c);
			?>
			<main role="main" class="main">
				<article>
					<?php
					$a = new Area('Main');
					$a->enableGridContainer();
					$a->display($c);
					?>
				</article>
			</main>
			<?php
			$a = new Area('Page Footer');
			$a->enableGridContainer();
			$a->display($c);
			?>
		</div><!-- // Main Container -->

<?php  $this->inc('inc/footer.php'); ?>
