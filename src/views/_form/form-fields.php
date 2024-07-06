<?php

use andy87\yii2\builder\components\models\collections\CollectionFieldForm;
use andy87\yii2\builder\components\models\FieldForm;
use yii\web\View;
use andy87\yii2\builder\components\models\TableForm;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

$tdStyle = 'pl-0 pr-0 pt-1 pb-1 ';

?>

<div class="row " data-template="<?= __FILE__ ?>">

    <table class="table fieldFormsWrapper" data-template=".fieldFormTemplate" data-container=".fieldFormsContainer" data-table-id="<?=$tableForm->id?>" >
        <thead>
            <tr>
                <th class="<?=$tdStyle?>" style="width: 15%;">name</th>
                <th class="<?=$tdStyle?>" style="width: 20%;">comment</th>
                <th class="<?=$tdStyle?>" style="width: 8%;">type</th>
                <th class="<?=$tdStyle?>" style="width: 7%;">length</th>
                <th class="<?=$tdStyle?>" style="width: 15%">default</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">notNull</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">unique</th>
                <th class="<?=$tdStyle?>" style="width: 6%;" title="foreignKey">fk</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">
                    <button class="btn btn-sm btn-success" style="width: 28px" type="button" onclick="app.builder.addFormField()">
                        +
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="fieldFormsContainer">
            <tr class="fieldFormTemplate" style="display: none">
                <td class="<?=$tdStyle?>">
                    <input class="form-control form-control-sm" type="text" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_NAME )?>" readonly>
                </td>
                <td class="<?=$tdStyle?>">
                    <input class="form-control form-control-sm" type="text" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_COMMENT )?>">
                </td>
                <td class="<?=$tdStyle?>">

                    <select class="form-control form-control-sm" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_TYPE )?>">
                        <?php foreach ( FieldForm::TYPE_LIST as $key => $name ): ?>
                            <option value="<?=$key?>"><?=$name?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="<?=$tdStyle?>">
                    <input class="form-control form-control-sm"  type="number" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_LENGTH )?>">
                </td>
                <td class="<?=$tdStyle?>">
                    <input class="form-control form-control-sm"  type="text" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_DEFAULT )?>">

                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <input class="input-group-text" type="checkbox" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_NOT_NULL )?>">
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <input class="input-group-text" type="checkbox" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_UNIQUE )?>">
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <input class="input-group-text" type="checkbox" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_FOREIGN_KEY )?>">
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <button class="btn btn-sm btn-danger" style="width: 28px" type="submit" onclick="app.builder.tableRemoveRow()" data-name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_ACTION)?>" value="<?=FieldForm::ACTION_REMOVE ?>">
                        -
                    </button>
                </td>
            </tr>
            <?php if ($tableForm->collectionFieldForm): ?>
                <?php foreach ($tableForm->collectionFieldForm->fieldForms as $index => $fieldForm): ?>
                    <tr>
                        <td class="<?=$tdStyle?>">
                            <input class="form-control form-control-sm" type="text" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_NAME, $fieldForm )?>" value="<?=$fieldForm->name?>" readonly>
                        </td>
                        <td class="<?=$tdStyle?>">
                            <input class="form-control form-control-sm" type="text" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_COMMENT, $fieldForm )?>" value="<?=$fieldForm->comment?>">
                        </td>
                        <td class="<?=$tdStyle?>">
                            <select class="form-control form-control-sm" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_TYPE, $fieldForm )?>">
                                <?php foreach ( FieldForm::TYPE_LIST as $key => $name ): ?>
                                    <option value="<?=$key?>" data-defaut="255" <?=( $fieldForm->type == $key ) ? 'selected' : '' ?>><?=$name?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td class="<?=$tdStyle?>">
                            <input class="form-control form-control-sm"  type="text" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_LENGTH, $fieldForm )?>" value="<?=$fieldForm->length?>">
                        </td>
                        <td class="<?=$tdStyle?>">
                            <input class="form-control form-control-sm"  type="text" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_DEFAULT, $fieldForm )?>" value="<?=$fieldForm->default?>">
                        </td>
                        <td class="<?=$tdStyle?>">
                            <span class="input-group-text">
                                <input class="input-group-text" type="checkbox" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_NOT_NULL, $fieldForm )?>" <?=( $fieldForm->notNull) ? 'checked' : '' ?>>
                            </span>
                        </td>
                        <td class="<?=$tdStyle?>">
                            <span class="input-group-text">
                                <input class="input-group-text" type="checkbox" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_UNIQUE, $fieldForm )?>" <?=( $fieldForm->unique) ? 'checked' : '' ?>>
                            </span>
                        </td>
                        <td class="<?=$tdStyle?>">
                            <span class="input-group-text">
                                <input class="input-group-text" type="checkbox" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_FOREIGN_KEY, $fieldForm )?>" <?=( $fieldForm->foreignKey) ? 'checked' : '' ?>>
                            </span>
                        </td>
                        <td class="<?=$tdStyle?>">
                            <button class="btn btn-sm btn-danger" style="width: 28px" type="submit" onclick="app.builder.tableRemoveRow()" name="<?=CollectionFieldForm::attrName($tableForm, FieldForm::ATTR_ACTION, $fieldForm )?>" value="<?=FieldForm::ACTION_REMOVE ?>">
                                -
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
