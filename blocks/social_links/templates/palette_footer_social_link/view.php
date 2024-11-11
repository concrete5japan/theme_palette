<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<div id="ccm-block-social-links<?php echo $bID?>" class="ccm-block-social-links palette-social">
    <ul class="list-inline">
    <?php foreach($links as $link) {
        $service = $link->getServiceObject();
        ?>
        <li class="icon-effect icon-effect-ring"><a target="_blank" href="<?php echo h($link->getURL()); ?>" class="social-icon"><?php echo $service->getServiceIconHTML(); ?></a></li>
    <?php } ?>
    </ul>
</div>