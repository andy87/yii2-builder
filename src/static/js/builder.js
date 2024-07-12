let app = {

    typeField : {
        STRING : 'string',
        FOREIGN_KEY : 'foreignKey',
        INTEGER : 'integer',
        FLOAT : 'float',
        DATE : 'date',
        DATE_TIME : 'dateTime',
        TEXT : 'text',
        BOOL : 'bool',
        JSON : 'json',
    },

    mapping : {},

    init: function ()
    {
        this.mapping = {
            json : this.typeField.JSON,
            date : this.typeField.DATE,
            datetime : this.typeField.DATE_TIME,
            integer : this.typeField.INTEGER,
            float : this.typeField.FLOAT,
            bool : this.typeField.BOOL,
            text : this.typeField.TEXT,

            area : this.typeField.INTEGER,
            index : this.typeField.INTEGER,
            grade : this.typeField.INTEGER,
            sequence : this.typeField.INTEGER,
            position : this.typeField.INTEGER,
            round : this.typeField.INTEGER,
            batch : this.typeField.INTEGER,
            cycle : this.typeField.INTEGER,
            interval : this.typeField.INTEGER,
            limit : this.typeField.INTEGER,
            age : this.typeField.INTEGER,
            cost : this.typeField.INTEGER,
            count : this.typeField.INTEGER,
            sum : this.typeField.INTEGER,
            quantity : this.typeField.INTEGER,
            priority : this.typeField.INTEGER,
            weight : this.typeField.INTEGER,
            discount : this.typeField.INTEGER,
            amount : this.typeField.INTEGER,
            rate : this.typeField.INTEGER,
            rating : this.typeField.INTEGER,
            total : this.typeField.INTEGER,
            score : this.typeField.INTEGER,
            level : this.typeField.INTEGER,
            height : this.typeField.INTEGER,
            length : this.typeField.INTEGER,
            volume : this.typeField.INTEGER,
            depth : this.typeField.INTEGER,
            speed : this.typeField.INTEGER,
            duration : this.typeField.INTEGER,
            years : this.typeField.INTEGER,
            months : this.typeField.INTEGER,
            days : this.typeField.INTEGER,
            hours : this.typeField.INTEGER,
            minutes : this.typeField.INTEGER,
            seconds : this.typeField.INTEGER,
            step : this.typeField.INTEGER,
            distance : this.typeField.INTEGER,
            temperature : this.typeField.INTEGER,

            price : this.typeField.FLOAT,
            old_price : this.typeField.FLOAT,
            new_price : this.typeField.FLOAT,
            latitude : this.typeField.FLOAT,
            lat : this.typeField.FLOAT,
            longitude : this.typeField.FLOAT,
            lon : this.typeField.FLOAT,

            birthday : this.typeField.DATE,

            content : this.typeField.TEXT,
            html : this.typeField.TEXT,
            data : this.typeField.TEXT,
        }


        setTimeout(function (){
            $( ".fieldFormsContainer" ).sortable({
                connectWith: ".fieldFormsContainer"
            }).disableSelection();

        }, 2000);
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

            template.querySelectorAll(`INPUT[${dataName}],SELECT[${dataName}]`).forEach(function (element)
            {
                let attrName = element.getAttribute(`${dataName}`);

                attrName = attrName.replace('[listFieldForm][0]', `[listFieldForm][${name}]`);
                element.setAttribute('name', attrName);
                element.removeAttribute(`${dataName}`);

                if (element.classList.contains('input_name')) {
                    element.value = name;
                    element.dataset.name = name;

                    element.addEventListener('change', function ()
                    {
                        let newName = element.value;
                        let oldName = element.dataset.name;

                        element.dataset.name = newName;

                        let inputs = document.querySelectorAll(`[name^="TableInfoForm[listFieldForm][${oldName}]"]`);

                        inputs.forEach(function (input) {
                            let newElementName = input.getAttribute('name').replace(oldName, newName);

                            input.setAttribute('name', newElementName);
                        });
                    });
                }
            });

            template.removeAttribute('style');

            wrapper.appendChild(template);


            let type = app.mapping[name] ?? null;
            if (type === null )
            {
                if ( name.indexOf('date_') === 0 ) type = app.typeField.DATE;
                if ( name.indexOf('datetime_') === 0 ) type = app.typeField.DATE_TIME;
                if ( name.indexOf('date_time_') === 0 ) type = app.typeField.DATE_TIME;
                if ( name.indexOf('is_') === 0 ) type = app.typeField.BOOL;
                if ( name.indexOf('json_') === 0 ) type = app.typeField.JSON;
                if ( name.indexOf('_id') !== -1 ) type = app.typeField.FOREIGN_KEY;
            }

            template
                .querySelectorAll('input, select')
                .forEach(function (element)
                {
                    let attrName = element.getAttribute('name');

                    let isComment = attrName.indexOf('comment') !== -1;

                    if ( isComment ) {
                        element.focus();

                        if ( type === app.typeField.FOREIGN_KEY ) {
                            element.value = `ID `;
                        }
                        if (type === app.typeField.DATE)
                        {
                            element.value = 'Дата '
                        }
                        if (type === app.typeField.DATE_TIME)
                        {
                            element.value = 'Дата и время '
                        }
                        if (type === app.typeField.BOOL)
                        {
                            element.value = 'Метка '
                        }
                    }

                    if (element.type === 'checkbox')
                    {
                        if (type === app.typeField.FOREIGN_KEY)
                        {
                            if ( attrName.indexOf(`[${app.typeField.FOREIGN_KEY}]`) !== -1 ){
                                element.checked = true;
                            }
                        }
                    }

                    let selector = null;

                    if (attrName.indexOf('[type]') !== -1 )
                    {
                        switch (type)
                        {
                            case app.typeField.FLOAT:
                                selector = app.typeField.FLOAT;
                                break;

                            case app.typeField.INTEGER:
                                selector = app.typeField.INTEGER;
                                break;

                            case app.typeField.DATE:
                                selector = app.typeField.DATE;
                                break;

                            case app.typeField.DATE_TIME:
                                selector = app.typeField.DATE_TIME;
                                break;

                            case app.typeField.BOOL:
                                selector = app.typeField.BOOL;
                                break;

                            case app.typeField.TEXT:
                                selector = app.typeField.TEXT;
                                break;

                            case app.typeField.JSON:
                                selector = app.typeField.JSON;
                                break;

                            case app.typeField.FOREIGN_KEY:
                                selector = app.typeField.INTEGER;

                                let lengthSelector = `TableInfoForm[listFieldForm][${name}][length]`;
                                let input = document.getElementsByName(lengthSelector);
                                if (input.length) input[0].value = 8;
                                break;
                        }

                        if (selector) {
                            let optionSelector = `[value="${selector}"]`;

                            let option = element.querySelector(optionSelector);

                            option.setAttribute('selected', 'selected');
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

app.init();