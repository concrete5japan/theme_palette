<?php

namespace ThemePalette\Attribute\Context;

use Concrete\Core\Attribute\Context\FrontendFormContext as BaseFrontendFormContext;
use Concrete\Core\Filesystem\TemplateLocator;

class FrontendFormContext extends BaseFrontendFormContext
{
    public function __construct()
    {
        parent::__construct();
        $this->preferTemplateIfAvailable('palette', 'theme_palette');
    }

    public function setLocation(TemplateLocator $locator)
    {
        $locator->setTemplate(['palette', 'theme_palette']);
        return $locator;
    }
}
