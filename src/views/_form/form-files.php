<?php

use yii\web\View;
use andy87\yii2\builder\components\models\TableForm;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

?>

<div class="row" data-template="<?= __FILE__ ?>">

    <table class="table collectionFiles">
        <thead>
            <th>
                <input type="checkbox" name="checkAll"/>
            </th>
            <th>Фильтр генерации файлов<br><small><i>Выделяются те файлы -  которые не надо генерировать</i></small></th>
        </thead>
        <tbody>
            <?php if ($tableForm->collectionFileForm): ?>
                <?php foreach ($tableForm->collectionFileForm->fileForms as $file_id => $fileForm): ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="CollectionTableForm[tableForms][0][collectionFileForm][<?=$file_id?>][skip]" value="<?= $file_id ?>"/>
                        </td>
                        <td>
                            <?= $fileForm->path ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>