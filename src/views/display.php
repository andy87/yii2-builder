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

echo $this->render('_form/form', [
    'tableForm' => $generator->tableForm
]);

echo '<hr>';

//фвв ё
echo Accordion::widget([
    'items' => $generator->getAccordionItems()
]);

echo '<br>';

?>

<style data-template="<?= __FILE__ ?>">
    #builder-generator > .row,
    #builder-generator > .row > #form-fields {
        display: block;
        width: 100%;
        max-width: 100%;
    }
</style>

<script>
    let app = {
        builder : {
            tableAddForm: function ()
            {
                let name = prompt('name');
                let table = event.target.closest('.fieldFormsWrapper');
                let tableId = table.getAttribute('data-table-id');
                let wrapper = table.querySelector(table.getAttribute('data-container'));
                let template = table.querySelector(table.getAttribute('data-template')).cloneNode(true);

                let dataName = 'data-name';

                template.querySelectorAll(`[${dataName}]`).forEach(function (element) {
                    console.log('element before', element);
                    let attrName = element.getAttribute(`${dataName}`);
                    attrName = attrName.replace('[collectionFieldForm][0]', `[collectionFieldForm][${name}]`);
                    attrName = attrName.replace('[0][collectionFieldForm]', `[${tableId}][collectionFieldForm]`);
                    element.setAttribute('name', attrName);
                    element.removeAttribute(`${dataName}`);
                    if (element.hasAttribute('readonly')) {
                        element.value = name;
                    }
                    console.log('element after', element);
                });
                template.removeAttribute('style');

                wrapper.appendChild(template);
            },
            tableRemoveRow() {
                let row = event.target.closest('tr');
                row.remove();
            }
        }
    };
</script>