let app = {
    builder : {
        addFormField: function ()
        {
            let name = prompt('name');
            let table = event.target.closest('.fieldFormsWrapper');
            let tableId = table.getAttribute('data-table-id');
            let wrapper = table.querySelector(table.getAttribute('data-container'));
            let template = table.querySelector(table.getAttribute('data-template')).cloneNode(true);

            let dataName = 'data-name';

            template.querySelectorAll(`[${dataName}]`).forEach(function (element)
            {
                let attrName = element.getAttribute(`${dataName}`);

                attrName = attrName.replace('GenerateFieldForm[0]', `GenerateFieldForm[0][${name}]`);
                element.setAttribute('name', attrName);
                element.removeAttribute(`${dataName}`);
                if (element.hasAttribute('readonly')) {
                    element.value = name;
                }
            });

            template.removeAttribute('style');

            wrapper.appendChild(template);

            template
                .querySelectorAll('input')
                .forEach(function (element)
                {
                    let attrName = element.getAttribute('name');

                    if ( attrName && attrName.indexOf('comment') !== -1 ) {
                        element.focus();
                    }
                });
        },

        tableRemoveRow() {
            let row = event.target.closest('tr');
            row.remove();
        }
    }
};