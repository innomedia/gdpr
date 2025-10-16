<?php
use SilverStripe\Forms\FieldList;
use SilverStripe\Core\Extension;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class GDPRSiteConfigExtension extends Extension
{
    /**
     * Database fields
     * @var array
     */
    private static $db = array(
        'FormularDatenschutztext' => 'HTMLText',
        'ExtraCSS'  =>'Text'
    );
    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $owner = $this->owner;
        $fields->addFieldToTab(
            'Root.FormularDatenschutz',
            HtmlEditorField::create(
                'FormularDatenschutztext',
                'Formular Datenschutz Text'
            )
        );
        $fields->addFieldToTab(
            'Root.FormularDatenschutz',
            TextField::create(
                'ExtraCSS',
                'CSS'
            )
        );
        return $fields;
    }
}
