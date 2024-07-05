<?php


use yii\web\View;
use andy87\yii2\builder\components\models\TableForm;
use andy87\yii2\builder\components\models\collections\CollectionTableForm;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

$naming = [
    $tableForm::ATTR_NAME => CollectionTableForm::attrName($tableForm, $tableForm::ATTR_NAME),
    $tableForm::ATTR_SINGLE => CollectionTableForm::attrName($tableForm, $tableForm::ATTR_SINGLE),
    $tableForm::ATTR_PLURAL => CollectionTableForm::attrName($tableForm, $tableForm::ATTR_PLURAL),
    $tableForm::ATTR_ACTION => CollectionTableForm::attrName($tableForm, $tableForm::ATTR_ACTION),
];

?>

<div class="form" data-template="<?= __FILE__ ?>">
    <div class="row">
        <?php if ( $tableForm->id === $tableForm::NEW ): ?>
            <div class="col-5">
                <div class="form-group">
                    <label class="control-label">
                        <?=$tableForm->getAttributeLabel($tableForm::ATTR_NAME)?>
                        <input class="form-control" type="text" name="<?= $naming[$tableForm::ATTR_NAME]?>" value="<?=$tableForm?->{$tableForm::ATTR_NAME} ?? ''?>">
                    </label>
                </div>
            </div>
        <?php else: ?>
            <input class="form-control" type="hidden" name="<?= $naming[$tableForm::ATTR_NAME]?>" value="<?=$tableForm?->{$tableForm::ATTR_NAME} ?? ''?>">
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$tableForm->getAttributeLabel($tableForm::ATTR_SINGLE)?>
                    <input class="form-control" type="text" name="<?= $naming[$tableForm::ATTR_SINGLE]?>" value="<?=$tableForm?->{$tableForm::ATTR_SINGLE} ?? ''?>">
                </label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$tableForm->getAttributeLabel($tableForm::ATTR_PLURAL)?>
                    <input class="form-control" type="text" name="<?= $naming[$tableForm::ATTR_PLURAL]?>" value="<?=$tableForm?->{$tableForm::ATTR_PLURAL} ?? ''?>">
                </label>
            </div>
        </div>
    </div>

    <?= $this->render('form-fields', [ 'tableForm' => $tableForm ]); ?>

    <?= $this->render('form-files', [ 'tableForm' => $tableForm ]); ?>

    <div class="row">
        <?php if ( $tableForm->id === $tableForm::NEW ): ?>
            <div class="col-12">

                <button type="submit" class="btn btn-success" name="<?= $naming[$tableForm::ATTR_ACTION]?>" value="<?=$tableForm::ACTION_ADD?>">Добавить</button>
            </div>
        <?php else: ?>
            <div class="col-12" style="text-align: right">

                <button type="submit" class="btn btn-danger"
                        name="<?= $naming[$tableForm::ATTR_ACTION]?>"
                        value="<?=$tableForm::ACTION_REMOVE?>"
                        data-confirm='Вы уверены, что хотите удалить <?= $tableForm->tableName?> ?'
                >Удалить</button>
                <button type="submit" class="btn btn-success" name="<?= $naming[$tableForm::ATTR_ACTION]?>" value="<?=$tableForm::ACTION_UPDATE?>">Сохранить</button>

            </div>
        <?php endif; ?>
    </div>

</div>