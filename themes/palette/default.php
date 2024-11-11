<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php');
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
