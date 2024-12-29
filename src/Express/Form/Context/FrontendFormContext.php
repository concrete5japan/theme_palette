<?php

namespace ThemePalette\Express\Form\Context;

use Concrete\Core\Express\Form\Context\FrontendFormContext as CoreFrontendFormContext;

class FrontendFormContext extends CoreFrontendFormContext
{
    public function getAttributeContext()
    {
        return new \ThemePalette\Attribute\Context\FrontendFormContext();
    }
}