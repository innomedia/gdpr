<?php
use SilverStripe\Core\Extension;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\SiteConfig\SiteConfig;
class GDPRFormPageExtension extends Extension
{
    // Add $this->extend('updateFormWithGDPRFields', $fields,$requirements);
    // To Form after all Fields have been added
    public function updateFormWithGDPRFields($fields,$requirements)
    {
        $siteconfig = SiteConfig::get()->first();
        if($siteconfig->FormularDatenschutztext != "")
        {
            $fields->push($GDPRField = CheckboxField::create(
                'DataProtection',
                'DataProtection'
            ));
            if($siteconfig->ExtraCSS != "")
            {
                $GDPRField->addExtraClass($siteconfig->ExtraCSS);
            }
            $GDPRField->setTemplate("GDPRCheckboxField");
            $GDPRField->setFieldHolderTemplate("GDPRFieldHolder");
            $requirements->addRequiredField("DataProtection");
        }
    }
}
