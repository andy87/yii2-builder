<?php

use yii\web\View;
use yii\bootstrap5\Accordion;
use andy87\yii2\builder\components\{ Builder, assets\BuilderAsset, services\AccordionService };

/**
 * @var View $this
 * @var Builder $generator
 */

BuilderAsset::register($this);

$blankGenerateTableForm = $generator->collectionGenerateTableForm->generateTableForm;

echo $this->render('_form/form', [
    'generateTableForm' => $blankGenerateTableForm
]);

echo '<hr>';

echo Accordion::widget([
    'items' => AccordionService::getInstance()->getAccordionItems($generator->collectionGenerateTableForm)
]);

echo '<br>';

if (count($generator->collectionGenerateTableForm->listGenerateTableForm)) : ?>
    <div class="col-12" style="text-align: right">

        <?= $blankGenerateTableForm->constructActionButton('Сохранить', [
            'type' => 'submit',
            'class' => 'btn btn-success',
            'value' => $blankGenerateTableForm::ACTION_ADD,
        ])?>
    </div>
<?php endif; ?>
