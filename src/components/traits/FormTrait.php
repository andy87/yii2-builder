<?php

namespace andy87\yii2\builder\components\traits;

use yii\bootstrap5\Html;
use andy87\yii2\builder\models\forms\TableForm;
use andy87\yii2\builder\models\collections\CollectionTableInfo;

/**
 * Trait FormTrait
 *
 * @package andy87\yii2\builder\components\traits
 */
trait FormTrait
{
    /**
     * @param array $optionList
     * @param ?string $selected
     * @param bool $dataName
     *
     * @return string
     */
    public function select(array $optionList, ?string $selected, bool $dataName = false ): string
    {
        [$nameValue, $options] = $this->getElementAttributes('form-control form-control-sm select_type', self::ATTR_TYPE, $dataName);

        $html = Html::beginTag('select', $options);

        foreach ($optionList as $key => $name )
        {
            $options['value'] = $key;
            $options['selected'] = ( $selected && $selected == $key );

            if( $nameValue ) $options['name'] = $nameValue;

            $html .= Html::tag('option', $name, $options);
        }

        $html .= Html::endTag('select');

        return $html;
    }

    /**
     * @param string $type
     * @param string $attr
     * @param bool $dataName
     * @param ?string $id
     *
     * @return string
     */
    public function input( string $type, string $attr, bool $dataName = false ): string
    {
        [$nameValue, $options, $value] = $this->getElementAttributes("form-control form-control-sm input_$attr", $attr, $dataName);

        return Html::input($type, $nameValue, $value, $options );
    }

    /**
     * @param string $attr
     * @param bool $dataName
     * @param ?bool $checked
     *
     * @return string
     */
    public function checkbox( string $attr, bool $dataName = false, ?bool $checked = null): string
    {
        [$nameValue, $options, $value] = $this->getElementAttributes('input-group-text checkbox_$attr', $attr, $dataName);

        if ($checked) $value = true;

        return Html::checkbox($nameValue, $value, $options );
    }

    /**
     * @param string $class
     * @param string $attr
     * @param bool $dataName
     *
     * @return array
     */
    public function getElementAttributes(string $class, string $attr, bool $dataName): array
    {
        $options = ['class' => $class ];

        $nameValue = $this->getNameValue($attr);

        if ( $dataName )
        {
            $options['data-name'] = $nameValue;
            $nameValue = null;
        }

        $value = $this->{$attr} ?? null;

        return [$nameValue, $options, $value];
    }

    /**
     * @param string $attr
     *
     * @return string
     */
    public function getNameValue( string $attr ): string
    {
        $nameValue = ($this->index === TableForm::NEW )
            ? $this->naming[CollectionTableInfo::ATTR_NEW_TABLE_INFO_FORM]
            : $this->naming[CollectionTableInfo::ATTR_LIST_TABLE_INFO_FORMS];

        return sprintf($nameValue, $this->index, $attr);
    }
}