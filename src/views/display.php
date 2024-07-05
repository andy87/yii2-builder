<?php

use yii\web\View;
use yii\bootstrap5\Accordion;
use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\assets\BuilderAsset;

/**
 * @var View $this
 * @var Builder $generator
 */

BuilderAsset::register($this);

echo $this->render('_form/form', [
    'tableForm' => $generator->tableForm
]);

echo '<hr>';

//фвв ё
echo Accordion::widget([
    'items' => $generator->accordionService->getAccordionItems($generator->collectionTableForm)
]);

echo '<br>';

?>