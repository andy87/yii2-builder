<?php


use yii\web\View;
use andy87\yii2\builder\models\forms\TableForm;
use andy87\yii2\builder\components\interfaces\ActionsInterface;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

$modelInfoForm = $tableForm->modelInfoForm;

?>

<div class="form" data-template="<?= __FILE__ ?>">
    <div class="row">
        <?php if ( $tableForm->index === $tableForm::NEW ): ?>
            <div class="col-5">
                <div class="form-group">
                    <label class="control-label">
                        <?= $tableForm->getAttributeLabel($tableForm::ATTR_TABLE_NAME) ?>
                        <?= $tableForm->input('text', $tableForm::ATTR_TABLE_NAME) ?>
                    </label>
                </div>
            </div>
        <?php else: ?>
            <?= $tableForm->constructInput('hidden', $tableForm::ATTR_TABLE_NAME) ?>
        <?php endif; ?>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$modelInfoForm->getAttributeLabel($modelInfoForm::ATTR_SINGULAR)?>
                    <?= $modelInfoForm->input('text', $modelInfoForm::ATTR_SINGULAR) ?>
                </label>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label class="control-label">
                    <?=$modelInfoForm->getAttributeLabel($modelInfoForm::ATTR_PLURAL)?>
                    <?= $modelInfoForm->input('text', $modelInfoForm::ATTR_PLURAL) ?>
                </label>
            </div>
        </div>
    </div>

    <?= $this->render('form-fields', [ 'tableForm' => $tableForm ]); ?>

    <?= $this->render('form-files', [ 'tableForm' => $tableForm ]); ?>

    <div class="row">
        <?php if ( $tableForm->index === $tableForm::NEW ): ?>
            <div class="col-12" style="text-align: right">

                <?= $tableForm->constructActionButton('Добавить', [
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => ActionsInterface::ACTION_ADD,
                    'data-confirm' => "Требуется подтверждение"
                ])?>

            </div>

        <?php else: ?>

            <div class="col-12" style="text-align: right">

                <?= $tableForm->constructActionButton('Добавить', [
                    'type' => 'submit',
                    'class' => 'btn btn-danger',
                    'value' => ActionsInterface::ACTION_DELETE,
                    'data-confirm' => "Вы уверены, что хотите добавить таблицу `$tableForm->tableName`?"
                ])?>

            </div>
        <?php endif; ?>
    </div>

</div>