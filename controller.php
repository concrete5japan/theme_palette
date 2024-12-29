<?php

namespace Concrete\Package\ThemePalette;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Block\BlockType\Set as BlockTypeSet;
use Concrete\Core\Express\Controller\Manager;
use Concrete\Core\Package\Package;
use Concrete\Core\Page\Theme\Theme as PageTheme;
use ThemePalette\Express\Controller\FormController;
use Doctrine\ORM\EntityManagerInterface;

defined('C5_EXECUTE') or die('Access Denied.');

class Controller extends Package
{

    protected $pkgHandle = 'theme_palette';
    protected $appVersionRequired = '9.0.0';
    protected $pkgVersion = '3.0.0';
    protected $pkgAllowsFullContentSwap = true;

    protected $pkgAutoloaderRegistries = [
        'src' => '\ThemePalette',
    ];

    public function getPackageDescription()
    {
        return t("A simple style Shop's theme based on the Bootstrap framework.");
    }

    public function getPackageName()
    {
        return t('Palette');
    }

    public function install()
    {
        $pkg = parent::install();
        BlockTypeSet::add('theme_palette', 'Palette', $pkg);
        BlockType::installBlockTypeFromPackage('palette_heading_option', $pkg);
        BlockType::installBlockTypeFromPackage('palette_horizontal_rule', $pkg);
        PageTheme::add('palette', $pkg);

        /** @var EntityManagerInterface $em */
        $em = $this->app->make(EntityManagerInterface::class);
        $small = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'small']);

        if (!is_object($small)) {
            $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
            $type->setName('Small');
            $type->setHandle('small');
            $type->setWidth(740);
            $type->save();
        }
        $medium = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'medium']);

        if (!is_object($medium)) {
            $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
            $type->setName('Medium');
            $type->setHandle('medium');
            $type->setWidth(940);
            $type->save();
        }
        $large = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'large']);

        if (!is_object($large)) {
            $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
            $type->setName('Large');
            $type->setHandle('large');
            $type->setWidth(1140);
            $type->save();
        }
    }

    public function on_start()
    {
        /** @var Manager $manager */
        $manager = $this->app->make(Manager::class);
        $manager->setStandardController(FormController::class);
    }
}
