<?php
namespace Concrete\Package\ThemePalette\Block\PaletteHorizontalRule;
defined("C5_EXECUTE") or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;
use Loader;

class Controller extends BlockController
{
    public $helpers = array (
  0 => 'form',
);
    public $btFieldsRequired = array (
);
    protected $btExportFileColumns = array (
);
    protected $btTable = 'btPaletteHorizontalRule';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 500;
    protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = true;
    protected $btCacheBlockOutputOnPost = true;
    protected $btCacheBlockOutputForRegisteredUsers = true;
    protected $btCacheBlockOutputLifetime = 0;
    protected $btDefaultSet = 'theme_palette';

    public function getBlockTypeDescription()
    {
        return t("Displays the Horizontal Rule with style options.");
    }

    public function getBlockTypeName()
    {
        return t("Palette Horizontal Rule");
    }

    public function add()
    {
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function edit()
    {
        $this->set('btFieldsRequired', $this->btFieldsRequired);
    }

    public function validate($args)
    {
        $e = Core::make("helper/validation/error");
        if(in_array("SelectColors",$this->btFieldsRequired)){
            if(!in_array($args["SelectColors"], array("monochrome", "colored"))){
                $e->add(t("The %s field has an invalid value.", "Select colors"));
            }
        }
        if(in_array("SelectWidth",$this->btFieldsRequired)){
            if(!in_array($args["SelectWidth"], array("narrow", "wide"))){
                $e->add(t("The %s field has an invalid value.", "Select width"));
            }
        }
        return $e;
    }


}