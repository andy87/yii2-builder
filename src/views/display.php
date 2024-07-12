<?php

use yii\web\View;
use yii\bootstrap5\Accordion;
use andy87\yii2\builder\{Builder,
    assets\BuilderAsset,
    components\interfaces\ActionsInterface,
    models\forms\TableForm,
    services\AccordionService};

/**
 * @var View $this
 * @var Builder $generator
 */

BuilderAsset::register($this);

$builderResources = $generator->builderResources;

$blankGenerateTableForm = $builderResources->collectionTableInfo->newTableInfoForm;

echo $this->render('_form/form', [
    'tableForm' => $blankGenerateTableForm
]);

echo '<hr>';

try {
    echo Accordion::widget([
        'items' => AccordionService::getInstance()->getAccordionItems($builderResources->collectionTableInfo->listTableInfoForms)
    ]);

} catch (Throwable $e) {

    echo $e->getMessage();
}

echo '<br>';

if (count($builderResources->collectionTableInfo->listTableInfoForms)) : ?>
    <div class="col-12" style="text-align: right">

        <?= $blankGenerateTableForm->constructActionButton('Сохранить', [
            'type' => 'submit',
            'class' => 'btn btn-success',
            'value' => ActionsInterface::ACTION_ADD,
        ])?>
    </div>
<?php endif; ?>
