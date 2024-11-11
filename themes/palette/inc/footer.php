<?php  defined('C5_EXECUTE') or die("Access Denied.");
if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}
?>

		<!-- Footer -->
		<div class="footer-container">
			<footer role="contentinfo">
				<div class="container">
					<div class="row">
						<div class="social-button">
							<nav>
								<?php
								$a = new GlobalArea('Footer Social');
								$a->display();
								?>
							</nav>
						</div>
					</div>
				</div><!-- //Social Button -->
				<div class="container">
					<div class="row">
						<!-- Footer Navigation -->
						<div class="footer-nav col-md-6">
							<?php
							$a = new GlobalArea('Footer Navigation');
							$a->display();
							?>
						</div><!-- //Footer Navigation -->
						<!-- Social Button -->
						<div class="copyright col-md-6">
							<?php
							$a = new GlobalArea('Footer Copyright');
							$a->display();
							?>
						</div>
					</div>
				</div>
				<?php if ( compat_is_version_8() ): ?>
				<span id="ccm-account-menu-container"></span>
				<?php endif; ?>
			</footer>
			<div id="scroll-page-top">
				<a href="#container" class="top"><i class="fa fa-angle-up" aria-hidden="true"></i><span><?php echo t('Back to Top')?></span></a>
			</div>
		</div><!-- //Footer -->

    	</div>

		<?php Loader::element('footer_required'); ?>

		<script src="<?php echo $this->getThemePath(); ?>/js/main.js"></script>

	</body>
</html>