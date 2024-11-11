<?php  defined('C5_EXECUTE') or die("Access Denied.");
if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}
$as = new GlobalArea('Header Extra');
$blocks = $as->getTotalBlocksInArea();
$displayThirdColumn = $blocks > 0 || $c->isEditMode();
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="<?php  echo Localization::activeLanguage()?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php  echo Localization::activeLanguage()?>"> <!--<![endif]-->
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <?php Loader::element('header_required', array('pageTitle' => $pageTitle));?>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php  echo $view->getThemePath()?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php  echo $view->getThemePath()?>/css/bootstrap.css">
        <!-- <link rel='stylesheet' href='//fonts.googleapis.com/css?family=Federo|Julius+Sans+One|Prosto+One|Kaushan+Script'> -->

		<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/css/normalize.min.css">
		<?php echo $html->css($view->getStyleSheet('main.less')); ?>

        <script src="<?php  echo $view->getThemePath()?>/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

	<body class="<?php echo $c->getCollectionHandle(); ?><?php if ( !compat_is_version_8() ): ?><?php $u = new User(); if (Config::get('concrete.user.profiles_enabled') && $u->isRegistered()) { echo ' add-account-menu'; } ?><?php endif; ?>">
    	<div class="<?php echo $c->getPageWrapperClass()?><?php if ($c->isEditMode()): ?> edit-mode<?php endif ?>">
        <!--[if lt IE 8]>
            <p class="browserupgrade"><?php  echo t('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.')?></p>
        <![endif]-->
        <a class="skip-link screen-reader-text<?php if (User::isLoggedIn()) { echo ' login'; } ?>" href="#main-content"><?php  echo t('Skip to content') ?></a>

		<!-- Header -->
		<div class="header-container">
            <header class="header-content" role="banner">
                <div class="container">
					<div class="row">
						<!-- <div id="slide-menu"><a class="global-open" href="#nav">Menu</a></div> -->
						<div class="header-logo col-xs-4 col-sm-2 col-md-2">
							<?php
							$a = new GlobalArea('Header Site Title');
							$a->display();
							?>
						</div>
						<!-- Global Navigation -->
						<div class="global-nav <?php if ($displayThirdColumn) { ?>col-sm-7 col-md-8 col-lg-8<?php } else { ?>col-sm-10 col-md-10 col-lg-10<?php } ?>">
							<?php
							$a = new GlobalArea('Header Navigation');
							$a->display();
							?>
						</div><!-- //Global Navigation -->
						<?php if ($displayThirdColumn) { ?>
						<div class="header-extra-container col-sm-3 col-md-2 col-lg-2"><?php $as->display(); ?></div>
						<?php } ?>
					</div>
				</div>
			</header>
		</div>
