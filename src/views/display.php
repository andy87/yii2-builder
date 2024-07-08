<?php

use andy87\yii2\builder\components\services\AccordionService;
use yii\web\View;
use yii\bootstrap5\Accordion;
use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\assets\BuilderAsset;

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

//фвв ё
echo Accordion::widget([
    'items' => AccordionService::getInstance()->getAccordionItems($generator->collectionGenerateTableForm)
]);

echo '<br>';

?>