<?php

use SilverStripe\Forms\CheckboxField;
use SilverStripe\UserForms\Model\EditableFormField;

if (!class_exists(EditableFormField::class)) {
    return;
}
/**
 * EditableCheckbox
 *
 * A user modifiable checkbox on a UserDefinedForm
 *
 * @package userforms
 */

class GPDREditableCheckbox extends EditableFormField
{
    private static $singular_name = 'Datenschutz Feld';

    private static $plural_name = 'Datenschutz Felder';

    protected $jsEventHandler = 'click';

    private static $db = [
        'CheckedDefault' => 'Boolean' // from CustomSettings
    ];

    private static $table_name = 'EditableDatenschutzCheckbox';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->replaceField('Default', CheckboxField::create(
            "CheckedDefault",
            _t('SilverStripe\\UserForms\\Model\\EditableFormField.CHECKEDBYDEFAULT', 'Checked by Default?')
        ));

        return $fields;
    }

    public function getFormField()
    {
        $field = CheckboxField::create($this->Name, $this->Title ?: false, $this->CheckedDefault)
            ->setFieldHolderTemplate("GDPRFieldHolder")
            ->setTemplate("GDPRCheckboxField");

        $this->doUpdateFormField($field);

        return $field;
    }

    public function getValueFromData($data)
    {
        $value = (isset($data[$this->Name])) ? $data[$this->Name] : false;

        return ($value)
            ? _t('SilverStripe\\UserForms\\Model\\EditableFormField.YES', 'Yes')
            : _t('SilverStripe\\UserForms\\Model\\EditableFormField.NO', 'No');
    }

    public function isCheckBoxField()
    {
        return true;
    }
}
