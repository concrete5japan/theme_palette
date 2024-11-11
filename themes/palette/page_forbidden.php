<?php
defined('C5_EXECUTE') or die("Access Denied.");
$this->inc('inc/header.php');
?>

		<div class="main-container">
			<main role="main">
				<div class="container">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="forbidden jumbo">
								<h1><?php  echo t('403 Error')?></h1>
								<p><?php  echo t('You are not allowed to access this page.')?></p>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>

<?php  $this->inc('inc/footer.php'); ?>
