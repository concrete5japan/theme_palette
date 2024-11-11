<?php
namespace Concrete\Package\ThemePalette;

//use Concrete\Core\Page\Theme\Theme;
use Package;
use BlockType;
use SinglePage;
use PageTheme;
use BlockTypeSet;
use Loader;
use FileImporter;

defined('C5_EXECUTE') or die(_('Access Denied.'));

if (!function_exists('compat_is_version_8')) {
    function compat_is_version_8() {
        return interface_exists('\Concrete\Core\Export\ExportableInterface');
    }
}

class Controller extends Package
{

	protected $pkgHandle = 'theme_palette';
	protected $appVersionRequired = '5.7.3';
	protected $pkgVersion = '2.0.7';
	protected $pkgAllowsFullContentSwap = true;

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
    	BlockTypeSet::add('theme_palette','Palette', $pkg);
        BlockType::installBlockTypeFromPackage('palette_heading_option', $pkg);
        BlockType::installBlockTypeFromPackage('palette_horizontal_rule', $pkg);
		PageTheme::add('palette', $pkg);

		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$small = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'small']);

		}
		else {
			$small = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('small');
		}
		if (!is_object($small)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Small');
			$type->setHandle('small');
			$type->setWidth(740);
			$type->save();
		}
		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$medium = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'medium']);

		}
		else {
			$medium = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('medium');
		}
		if (!is_object($medium)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Medium');
			$type->setHandle('medium');
			$type->setWidth(940);
			$type->save();
		}
		if ( compat_is_version_8() ) {
			$em = \ORM::entityManager();
			$large = $em->getRepository('\Concrete\Core\Entity\File\Image\Thumbnail\Type\Type')->findOneBy(['ftTypeHandle' => 'large']);

		}
		else {
			$large = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('large');
		}
		if (!is_object($large)) {
			if ( compat_is_version_8() ) {
			    $type = new \Concrete\Core\Entity\File\Image\Thumbnail\Type\Type();
			}
			else {
			    $type = new \Concrete\Core\File\Image\Thumbnail\Type\Type();
			}
			$type->setName('Large');
			$type->setHandle('large');
			$type->setWidth(1140);
			$type->save();
		}
	}

}
?>