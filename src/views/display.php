<?php

use yii\web\{ View, YiiAsset };
use yii\bootstrap5\Accordion;
use yii\bootstrap5\BootstrapAsset;
use andy87\yii2\builder\components\Builder;

/**
 * @var View $this
 * @var Builder $generator
 */

YiiAsset::register($this);
BootstrapAsset::register($this);

echo $this->render('form', [
    'tableForm' => $generator->tableForm
]);

echo '<hr>';

//фвв ё
echo Accordion::widget([
    'items' => $generator->getAccordionItems()
]);

echo '<br>';