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
            <th>
                <input type="checkbox" name="checkAll"/>
            </th>
            <th>Path</th>
        </thead>
        <tbody>
            <?php foreach ($tableForm->collectionFileForm->groups as $fileForm): ?>
                <tr>
                    <td>
                        <input type="checkbox" name="files[]" value="<?= $fileForm->id ?>"/>
                    </td>
                    <td>
                        <?= $fileForm->path ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.querySelector('input[name="checkAll"]').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="files[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
</script>