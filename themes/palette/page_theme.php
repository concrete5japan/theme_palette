<?php
namespace Concrete\Package\ThemePalette\Theme\Palette;

class PageTheme extends \Concrete\Core\Page\Theme\Theme {

	public function registerAssets() {
        //$this->providesAsset('javascript', 'bootstrap/*');
		$this->providesAsset('css', 'bootstrap/*');
		$this->providesAsset('css', 'blocks/form');
		$this->providesAsset('css', 'core/frontend/*');
		$this->requireAsset('css', 'font-awesome');
		$this->requireAsset('javascript', 'jquery');
		$this->requireAsset('javascript', 'bootstrap/tooltip');
		$this->requireAsset('css', 'bootstrap/tooltip');
		$this->requireAsset('javascript', 'picturefill');
	}

    protected $pThemeGridFrameworkHandle = 'bootstrap3';

	public function getThemeName() {
	  return t('Palette');
	}

	public function getThemeDescription() {
	  return t('Simple and Cute, Shop&#39;s theme with Theme Customizer. support for products, blogs (announcement), layouts and more.');
	}

    public function getThemeBlockClasses()
    {
		return array(
            'content' => array(
            	'side-nav-title'
            ),
            'image' => array(
                'image-border',
                'image-centering',
                'image-full',
                'sidebar-image-border'
            ),
            'autonav' => array(
                'nav-right'
            ),
            'google_map' => array(
                'image-border',
                'sidebar-image-border'
            ),
            'image_slider' => array(
            	'carousel-item-container',
            	'carousel-item-arrow-box'
            ),
            'social_links' => array(
            	'block-sidebar-wrapped'
            ),
            'share_this_page' => array(
            	'block-sidebar-wrapped'
            ),
            'page_title' => array(
            	'heading-white',
            	'heading-white-wide',
            	'heading-colored',
            	'heading-colored-wide',
            	'list-title',
            	'heading-white-arrow-box',
            	'heading-colored-arrow-box',
            	'crosshead',
            	'subhead'
            ),
            'testimonial' => array(
            	'testimonial-bio',
            	'bio-border',
            	'image-circle'
            ),
            'horizontal_rule' => array(
            	'grey',
            	'colored'
            ),
            'palette_heading_option' => array(
            	'heading-white-arrow-box',
            	'heading-colored-arrow-box'
            ),
            'faq' => array(
            	'all-answer-expanding',
            	'first-answer-expanding'
            ),
            'file' => array(
            	'align-center',
            	'download-default',
            	'download-primary',
            	'download-success',
            	'download-large'
            ),
        );
    }

    public function getThemeAreaClasses()
    {
        return array(
            'Page Footer' => array(
            	'area-content-accent',
            	'area-content-white'
            )
        );
    }

    public function getThemeDefaultBlockTemplates()
    {
        return array(
            'search' => 'palette_search',
            'breadcrumb' => 'palette_bread_crumbs'
        );

    }

    public function getThemeResponsiveImageMap()
    {
        return array(
            'large' => '900px',
            'medium' => '768px',
            'small' => '0'
        );
    }

    public function getThemeEditorClasses()
    {
        return array(
            array(
            	'title' => t('Heading Colored Wide'),
            	'menuClass' => 'heading-colored-wide',
            	'spanClass' => 'heading-colored-wide'
            ),
            array(
            	'title' => t('Title Thin'),
            	'menuClass' => 'title-thin',
            	'spanClass' => 'title-thin',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Caps'),
            	'menuClass' => 'title-caps',
            	'spanClass' => 'title-caps',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Caps Bold'),
            	'menuClass' => 'title-caps-bold',
            	'spanClass' => 'title-caps-bold',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Line'),
            	'menuClass' => 'heading-line',
            	'spanClass' => 'heading-line',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Crosshead'),
            	'menuClass' => 'crosshead',
            	'spanClass' => 'crosshead',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Subhead'),
            	'menuClass' => 'subhead',
            	'spanClass' => 'subhead',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Title Serif'),
            	'menuClass' => 'title-serif',
            	'spanClass' => 'title-serif',
            	'forceBlock' => 1
            ),
            array(
            	'title' => t('Palette Logo Type'),
            	'menuClass' => 'palette-logo-type',
            	'spanClass' => 'palette-logo-type',
            	'forceBlock' => 1
            ),
            array('title' => t('Standard Button'), 'menuClass' => '', 'spanClass' => 'btn btn-default', 'forceBlock' => '-1'),
            array('title' => t('Success Button'), 'menuClass' => '', 'spanClass' => 'btn btn-success', 'forceBlock' => '-1'),
            array('title' => t('Primary Button'), 'menuClass' => '', 'spanClass' => 'btn btn-primary', 'forceBlock' => '-1'),
            array('title' => t('Large Button'), 'menuClass' => '', 'spanClass' => 'btn btn-large', 'forceBlock' => '-1'),
        );
    }

}
