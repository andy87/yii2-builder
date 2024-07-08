<?php

use andy87\yii2\builder\components\models\forms\GenerateFieldForm;
use yii\web\View;
use andy87\yii2\builder\components\models\forms\GenerateTableForm;

/**
 * @var View $this
 * @var GenerateTableForm $generateTableForm
 */

$generateFieldForm = $generateTableForm->generateFieldForm;
$listGenerateFieldForm = $generateTableForm->listGenerateFieldForm;


$tdStyle = 'pl-0 pr-0 pt-1 pb-1 ';

?>

<div class="row " data-template="<?= __FILE__ ?>">

    <table class="table fieldFormsWrapper" data-template=".fieldFormTemplate" data-container=".fieldFormsContainer" data-table-id="<?=$generateTableForm->id?>" >
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
                    <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_NAME, 'data-name', 'readonly' )?>
                </td>
                <td class="<?=$tdStyle?>">
                    <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_COMMENT, 'data-name' )?>
                </td>
                <td class="<?=$tdStyle?>">
                    <select class="form-control form-control-sm" <?=$generateFieldForm->attrName(GenerateFieldForm::ATTR_TYPE, 'data-name', false )?>>
                        <?php foreach ( GenerateFieldForm::TYPE_LIST as $key => $name ): ?>
                            <option value="<?=$key?>"><?=$name?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="<?=$tdStyle?>">
                    <?= $generateFieldForm->input('number', GenerateFieldForm::ATTR_LENGTH, 'data-name' )?>
                </td>
                <td class="<?=$tdStyle?>">
                    <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_DEFAULT, 'data-name' )?>
                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_NOT_NULL, 'data-name' )?>
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_UNIQUE, 'data-name' )?>
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <span class="input-group-text">
                        <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_FOREIGN_KEY, 'data-name' )?>
                    </span>
                </td>
                <td class="<?=$tdStyle?>">
                    <button class="btn btn-sm btn-danger tableRemoveRow" type="submit" onclick="app.builder.tableRemoveRow()">
                        -
                    </button>
                </td>
            </tr>
            <?php if ($generateTableForm->listGenerateFieldForm): ?>
                <?php if (count($generateTableForm->listGenerateFieldForm)): ?>
                    <?php foreach ($generateTableForm->listGenerateFieldForm as $generateFieldForm): ?>
                        <tr>
                            <td class="<?=$tdStyle?>">
                                <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_NAME, 'name', 'readonly' )?>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_COMMENT )?>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <select class="form-control form-control-sm" <?=$generateFieldForm->attrName(GenerateFieldForm::ATTR_TYPE, 'name', false )?>>
                                    <?php foreach ( GenerateFieldForm::TYPE_LIST as $key => $name ): ?>
                                        <option value="<?=$key?>" data-defaut="255" <?=( $generateFieldForm->type == $key ) ? 'selected' : '' ?>><?=$name?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_LENGTH )?>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <?= $generateFieldForm->input('text', GenerateFieldForm::ATTR_DEFAULT )?>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <span class="input-group-text">
                                    <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_NOT_NULL )?>
                                </span>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <span class="input-group-text">
                                    <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_UNIQUE )?>
                                </span>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <span class="input-group-text">
                                    <?= $generateFieldForm->checkbox(GenerateFieldForm::ATTR_FOREIGN_KEY )?>
                                </span>
                            </td>
                            <td class="<?=$tdStyle?>">
                                <button class="btn btn-sm btn-danger tableRemoveRow" type="submit" onclick="app.builder.tableRemoveRow()">
                                    -
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
