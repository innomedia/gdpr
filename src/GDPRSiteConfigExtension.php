<?php
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class GDPRSiteConfigExtension extends DataExtension
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
