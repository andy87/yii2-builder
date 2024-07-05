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