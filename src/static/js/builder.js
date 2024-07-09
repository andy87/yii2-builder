let app = {

    typeField : {
        FOREIGN_KEY : 'foreignKey',
        INTEGER : 'integer',
        DATE : 'date',
        DATE_TIME : 'dateTime',
    },

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

                attrName = attrName.replace('GenerateFieldForm[0]', `GenerateFieldForm[${name}]`);
                element.setAttribute('name', attrName);
                element.removeAttribute(`${dataName}`);
                if (element.hasAttribute('readonly')) {
                    element.value = name;
                }
            });

            template.removeAttribute('style');

            wrapper.appendChild(template);

            let type = null;

            template
                .querySelectorAll('input')
                .forEach(function (element)
                {
                    let attrName = element.getAttribute('name');

                    if ( attrName )
                    {
                        if ( attrName.indexOf('comment') !== -1 ) {
                            element.focus();

                            if ( name.indexOf('_id') !== -1 ) {
                                element.value = 'ID '

                                type = app.typeField.FOREIGN_KEY;
                            }
                        }

                        if ( name.indexOf('date_') !== -1 ) type = app.typeField.DATE;

                        if ( name.indexOf('datetime_') !== -1 ) type = app.typeField.DATE_TIME;

                        let selector;

                        switch (type)
                        {
                            case app.typeField.FOREIGN_KEY:
                                if ( attrName.indexOf('foreignKey') !== -1  ) element.checked = true;

                            case app.typeField.INTEGER:
                                selector = `[name="GenerateFieldForm[${name}][type]"] option[value=integer]`;
                                document
                                    .querySelector(selector)
                                    .setAttribute('selected', 'selected');
                                break;

                            case app.typeField.DATE:
                                selector = `[name="GenerateFieldForm[${name}][type]"] option[value=date]`;
                                document
                                    .querySelector(selector)
                                    .setAttribute('selected', 'selected');

                                element.value = 'date_';
                                break;

                            case app.typeField.DATE_TIME:
                                selector = `[name="GenerateFieldForm[${name}][type]"] option[value=dateTime]`;
                                document
                                    .querySelector(selector)
                                    .setAttribute('selected', 'selected');

                                element.value = 'datetime_';
                        }
                    }

                });
        },

        tableRemoveRow() {
            let row = event.target.closest('tr');
            row.remove();
        }
    }
};