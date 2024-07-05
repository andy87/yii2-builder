<?php

use andy87\yii2\builder\components\{
    helpers\Library,
    helpers\NameCase,
    models\FileSettings
};

return [

    Library::COMMON_MODEL_SOURCES => new FileSettings(
        NameCase::PASCAL . 'Sources.php',
        '@common/models/sources/',
        '/common/modelSource.php'
    ),
    Library::COMMON_MODEL_ITEM => new FileSettings(
        NameCase::PASCAL . '.php',
        '@common/models/sources/',
        '/common/model.php'
    ),
    Library::COMMON_REPOSITORY => new FileSettings(
        NameCase::PASCAL . 'Repository.php',
        '@common/repositories/',
        '/common/repository.php'
    ),
    Library::COMMON_SERVICE => new FileSettings(
        NameCase::PASCAL . 'Service.php',
        '@common/services/',
        '/common/service.php'
    ),
    Library::CONSOLE_MODEL => new FileSettings(
        NameCase::PASCAL . '.php',
        '@console/models/items/',
        '/console/model/item.php'
    ),
    Library::CONSOLE_MODEL_FORM => new FileSettings(
        NameCase::PASCAL . 'Form.php',
        '@console/models/forms/',
        '/console/model/form.php'
    ),
    Library::CONSOLE_REPOSITORY => new FileSettings(
        NameCase::PASCAL . 'Repository.php',
        '@console/repositories/',
        '/console/repository.php'
    ),
    Library::CONSOLE_SERVICE => new FileSettings(
        NameCase::PASCAL . 'Service.php',
        '@console/services/',
        '/console/service.php'
    ),
    Library::CONSOLE_MIGRATE => new FileSettings(
        'm_date_time__create_table__' . NameCase::SNAKE . '.php',
        '@console/migration/',
        '/console/migration.php'
    ),
    Library::FRONTEND_MODEL => new FileSettings(
        NameCase::PASCAL . '.php',
        '@frontend/models/items/',
        '/frontend/models/item.php'
    ),
    Library::FRONTEND_MODEL_FORM => new FileSettings(
        NameCase::PASCAL . 'Form.php',
        '@frontend/models/forms/',
        '/frontend/models/form.php'
    ),
    Library::FRONTEND_MODEL_SEARCH => new FileSettings(
        NameCase::PASCAL . 'Search.php',
        '@frontend/models/search/',
        '/frontend/models/search.php'
    ),
    Library::FRONTEND_REPOSITORY => new FileSettings(
        NameCase::PASCAL . 'Repository.php',
        '@frontend/repositories/',
        '/frontend/repository.php'
    ),
    Library::FRONTEND_SERVICE => new FileSettings(
        NameCase::PASCAL . 'Service.php',
        '@frontend/services/',
        '/frontend/service.php'
    ),
    Library::FRONTEND_CONTROLLER => new FileSettings(
        NameCase::PASCAL . 'Controller.php',
        '@frontend/controllers/',
        '/frontend/controller.php'
    ),
    Library::FRONTEND_TPL_LIST => new FileSettings(
        NameCase::KEBAB . '-list.php',
        '@frontend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/list.php'
    ),
    Library::FRONTEND_TPL_VIEW => new FileSettings(
        NameCase::KEBAB . '-view.php',
        '@frontend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/view.php'
    ),
    Library::FRONTEND_RESOURCES_LIST => new FileSettings(
        NameCase::KEBAB . '-list.js',
        '@frontend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/list.php'
    ),
    Library::FRONTEND_RESOURCES_VIEW => new FileSettings(
        NameCase::KEBAB . '-view.js',
        '@frontend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/view.php'
    ),

    Library::BACKEND_MODEL => new FileSettings(
        NameCase::PASCAL . '.php',
        '@backend/models/items/',
        '/frontend/models/item.php'
    ),
    Library::BACKEND_MODEL_FORM => new FileSettings(
        NameCase::PASCAL . 'Form.php',
        '@backend/models/forms/',
        '/frontend/models/form.php'
    ),
    Library::BACKEND_MODEL_SEARCH => new FileSettings(
        NameCase::PASCAL . 'Search.php',
        '@backend/models/search/',
        '/frontend/models/search.php'
    ),
    Library::BACKEND_REPOSITORY => new FileSettings(
        NameCase::PASCAL . 'Repository.php',
        '@backend/repositories/',
        '/frontend/repository.php'
    ),
    Library::BACKEND_SERVICE => new FileSettings(
        NameCase::PASCAL . 'Service.php',
        '@backend/services/',
        '/frontend/service.php'
    ),
    Library::BACKEND_CONTROLLER => new FileSettings(
        NameCase::PASCAL . 'Controller.php',
        '@backend/controllers/',
        '/frontend/controller.php'
    ),
    Library::BACKEND_TPL_LIST => new FileSettings(
        NameCase::KEBAB . '-list.php',
        '@backend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/list.php'
    ),
    Library::BACKEND_TPL_VIEW => new FileSettings(
        NameCase::KEBAB . '-view.php',
        '@backend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/view.php'
    ),
    Library::BACKEND_TPL_CREATE => new FileSettings(
        NameCase::KEBAB . '-create.php',
        '@backend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/create.php'
    ),
    Library::BACKEND_TPL_UPDATE => new FileSettings(
        NameCase::KEBAB . '-update.php',
        '@backend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/update.php'
    ),
    Library::BACKEND_TPL_FORM => new FileSettings(
        NameCase::KEBAB . '-form.php',
        '@backend/views/' . NameCase::KEBAB . '/',
        '/frontend/tpl/form.php'
    ),
    Library::BACKEND_RESOURCES_LIST => new FileSettings(
        NameCase::KEBAB . '-list.js',
        '@backend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/list.php'
    ),
    Library::BACKEND_RESOURCES_VIEW => new FileSettings(
        NameCase::KEBAB . '-view.js',
        '@backend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/view.php'
    ),
    Library::BACKEND_RESOURCES_CREATE => new FileSettings(
        NameCase::KEBAB . '-create.js',
        '@backend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/create.php'
    ),
    Library::BACKEND_RESOURCES_UPDATE => new FileSettings(
        NameCase::KEBAB . '-update.js',
        '@backend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/update.php'
    ),
    Library::BACKEND_RESOURCES_FORM => new FileSettings(
        NameCase::KEBAB . '-form.js',
        '@backend/resources/' . NameCase::KEBAB . '/',
        '/frontend/resources/form.php'
    ),

];