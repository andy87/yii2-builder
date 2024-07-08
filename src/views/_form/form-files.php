<?php

use yii\web\View;
use andy87\yii2\builder\components\models\forms\GenerateTableForm;

/**
 * @var View $this
 * @var GenerateTableForm $generateTableForm
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
            <?php if (count($generateTableForm->listGenerateFileForm) ): ?>
                <?php foreach ($generateTableForm->listGenerateFileForm as $file_id => $generateFileForm): ?>
                    <tr>
                        <td>
                            <?= $generateFileForm->checkbox($generateFileForm, $generateTableForm->id)?>
                        </td>
                        <td>
                            <?= $generateFileForm->path ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>