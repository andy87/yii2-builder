<?php


use yii\web\View;
use andy87\yii2\builder\components\models\forms\GenerateTableForm;

/**
 * @var View $this
 * @var GenerateTableForm $generateTableForm
 */

$generateModelForm = $generateTableForm->generateModelForm;

?>

<div class="form" data-template="<?= __FILE__ ?>">
    <div class="row">
        <?php if ( $generateTableForm->id === $generateTableForm::NEW ): ?>
            <div class="col-5">
                <div class="form-group">
                    <label class="control-label">
                        <?= $generateTableForm->getAttributeLabel($generateTableForm::ATTR_TABLE_NAME) ?>
                        <?= $generateTableForm->constructInput('text', $generateTableForm::ATTR_TABLE_NAME) ?>
                    </label>
                </div>
            </div>
        <?php else: ?>
            <?= $generateTableForm->constructInput('hidden', $generateTableForm::ATTR_TABLE_NAME) ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$generateModelForm->getAttributeLabel($generateModelForm::ATTR_SINGULAR)?>
                    <?= $generateModelForm->constructInput('text', $generateModelForm::ATTR_SINGULAR) ?>
                </label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$generateModelForm->getAttributeLabel($generateModelForm::ATTR_PLURAL)?>
                    <?= $generateModelForm->constructInput('text', $generateModelForm::ATTR_PLURAL) ?>
                </label>
            </div>
        </div>
    </div>

    <?= $this->render('form-fields', [ 'generateTableForm' => $generateTableForm ]); ?>

    <?= $this->render('form-files', [ 'generateTableForm' => $generateTableForm ]); ?>

    <div class="row">
        <?php if ( $generateTableForm->id === $generateTableForm::NEW ): ?>
            <div class="col-12" style="text-align: right">

                <?= $generateTableForm->constructActionButton('Добавить', [
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => $generateTableForm::ACTION_ADD,
                    'data-confirm' => "Требуется подтверждение"
                ])?>

            </div>

        <?php else: ?>

            <div class="col-12" style="text-align: right">

                <?= $generateTableForm->constructActionButton('Добавить', [
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'value' => $generateTableForm::ACTION_DELETE,
                    'data-confirm' => "Вы уверены, что хотите добавить таблицу `$generateTableForm->tableName`?"
                ])?>

            </div>
        <?php endif; ?>
    </div>

</div>