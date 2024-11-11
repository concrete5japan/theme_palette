<?php
namespace Concrete\Package\ThemePalette\Block\PaletteHeadingOption;
defined("C5_EXECUTE") or die("Access Denied.");
use Concrete\Core\Block\BlockController;
use Core;
use Loader;
use \File;
use Page;

class Controller extends BlockController
{
    public $helpers = array (
  0 => 'form',
);
    public $btFieldsRequired = array (
);
    protected $btExportFileColumns = array (
  0 => 'HeadingImage',
);
    protected $btTable = 'btPaletteHeadingOption';
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
        return t("Displays a heading with style options.");
    }

    public function getBlockTypeName()
    {
        return t("Palette Heading Option");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->HeadingText;
        $content[] = $this->HeadingDescription;
        return implode(" ", $content);
    }

    public function view()
    {
        $db = \Database::get();

        if ($this->HeadingImage) {
            $f = \File::getByID($this->HeadingImage);
            if (is_object($f)) {
                $this->set("HeadingImage", $f);
            }
            else {
                $this->set("HeadingImage", false);
            }
        }
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
        if (in_array("HeadingText", $this->btFieldsRequired) && trim($args["HeadingText"]) == "") {
            $e->add(t("The %s field is required.", "Heading Text"));
        }
        if(in_array("HeadingImage",$this->btFieldsRequired) && (trim($args["HeadingImage"]) == "" || !is_object(\File::getByID($args["HeadingImage"])))){
            $e->add(t("The %s field is required.", "Heading Image"));
        }
        if(in_array("Formatting",$this->btFieldsRequired)){
            if(!in_array($args["Formatting"], array("h1", "h2", "h3", "h4", "h5", "h6"))){
                $e->add(t("The %s field has an invalid value.", "Formatting"));
            }
        }
        if(in_array("StyleOption",$this->btFieldsRequired)){
            if(!in_array($args["StyleOption"], array("heading-colored", "heading-colored-wide", "heading-white", "heading-white-wide"))){
                $e->add(t("The %s field has an invalid value.", "Style Option"));
            }
        }
        if(in_array("HeadingDescription",$this->btFieldsRequired) && trim($args["HeadingDescription"]) == ""){
            $e->add(t("The %s field is required.", "Heading Description"));
        }
        return $e;
    }


}