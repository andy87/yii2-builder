<?php

use yii\web\View;
use andy87\yii2\builder\models\forms\TableForm;

/**
 * @var View $this
 * @var TableForm $tableForm
 */

?>

<div class="row" data-template="<?= __FILE__ ?>">

    <table class="table collectionFiles">
        <thead>
            <th>
                <input type="checkbox" name="checkAll" checked/>
            </th>
            <th>Фильтр генерации файлов<br><small><i>Выделяются файлы - которые будут сгенерированы</i></small></th>
        </thead>
        <tbody>
            <?php if (count($tableForm->listFileForm) ): ?>
                <?php foreach ($tableForm->listFileForm as $file_id => $fileForm): ?>
                    <tr>
                        <td>
                            <?= $fileForm->checkbox($file_id, false, true )?>
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