<?php

use andy87\yii2\builder\components\models\FileForm;
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
                <input type="checkbox" name="checkAll" checked/>
            </th>
            <th>Фильтр генерации файлов<br><small><i>Выделяются файлы - которые будут сгенерированы</i></small></th>
        </thead>
        <tbody>
            <?php if ($tableForm->collectionFileForm ): ?>
                <?php if (count($tableForm->collectionFileForm->fileForms) ): ?>
                    <?php foreach ($tableForm->collectionFileForm->fileForms as $file_id => $fileForm):
                        if ( !isset($fileForm->path) || !$fileForm->path ){
                            echo '<pre>';
                            print_r(['$fileForm' => $fileForm->attributes]);
                            echo '</pre>';
                            exit();
                        }
                        ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="CollectionTableForm[tableForms][0][<?=TableForm::ATTR_FILES?>][<?=$file_id?>][<?=FileForm::ATTR_GENERATE?>]" value="<?= (int) $fileForm->generate ?>" checked/>
                            </td>
                            <td>
                                <?= $fileForm->path ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>