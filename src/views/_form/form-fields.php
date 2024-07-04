<?php

use yii\web\View;
use andy87\yii2\builder\components\models\TableForm;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

?>

<div class="row">

    <?= __FILE__ ?>
    <table class="table">
        <thead>
            <th>Название поля</th>
            <th>Комментарий</th>
            <th>тип поля (string, integer, text, date, datetime, time, boolean, float)</th>
            <th>длина поля</th>
            <th>значение по умолчанию</th>
            <th>required</th>
            <th>foreignKey</th>
        </thead>
        <tbody>
            <?php if ($tableForm->collectionFieldForm): ?>
                <?php foreach ($tableForm->collectionFieldForm as $fieldForm): ?>

                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
