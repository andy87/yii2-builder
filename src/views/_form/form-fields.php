<?php

use yii\web\View;
use andy87\yii2\builder\components\models\forms\GenerateFieldForm;
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

    <table class="table fieldFormsWrapper"
        data-template=".fieldFormTemplate"
        data-container=".fieldFormsContainer"
        data-table-id="<?=$generateTableForm->id?>"
        <?= ($generateTableForm->id == $generateTableForm::NEW) ? 'id="fieldsTableTemplate"' : ''?>
    >
        <thead>
            <tr>
                <th class="<?=$tdStyle?>" style="width: 15%;">name</th>
                <th class="<?=$tdStyle?>" style="width: 19%;">comment</th>
                <th class="<?=$tdStyle?>" style="width: 10%;">type</th>
                <th class="<?=$tdStyle?>" style="width: 7%;">length</th>
                <th class="<?=$tdStyle?>" style="width: 14%">default</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">notNull</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">unique</th>
                <th class="<?=$tdStyle?>" style="width: 6%;" title="foreignKey">fk</th>
                <th class="<?=$tdStyle?>" style="width: 6%;">
                    <button class="btn btn-sm btn-success btn-svg" type="button" onclick="app.builder.addFormField()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                            <g id="Edit / Add_Plus_Circle">
                                <path id="Vector" d="M8 12H12M12 12H16M12 12V16M12 12V8M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
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
                    <button class="btn btn-sm btn-danger tableRemoveRow btn-svg" type="submit" onclick="app.builder.tableRemoveRow()">
                        <svg width="800px" height="800px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -360.000000)" fill="#000000">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z" id="delete-[#1487]">

                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </button>
                    <span class="drag-button btn-svg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="none">
                            <path d="M5 10H19M14 19L12 21L10 19M14 5L12 3L10 5M5 14H19" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
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
                                <button class="btn btn-sm btn-danger tableRemoveRow btn-svg" type="submit" onclick="app.builder.tableRemoveRow()">
                                    <svg width="800px" height="800px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Dribbble-Light-Preview" transform="translate(-179.000000, -360.000000)" fill="#000000">
                                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                                    <path d="M130.35,216 L132.45,216 L132.45,208 L130.35,208 L130.35,216 Z M134.55,216 L136.65,216 L136.65,208 L134.55,208 L134.55,216 Z M128.25,218 L138.75,218 L138.75,206 L128.25,206 L128.25,218 Z M130.35,204 L136.65,204 L136.65,202 L130.35,202 L130.35,204 Z M138.75,204 L138.75,200 L128.25,200 L128.25,204 L123,204 L123,206 L126.15,206 L126.15,220 L140.85,220 L140.85,206 L144,206 L144,204 L138.75,204 Z" id="delete-[#1487]">

                                                    </path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
