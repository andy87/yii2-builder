<?php

use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\helpers\Params;
use andy87\yii2\builder\helpers\Library;
use andy87\yii2\builder\helpers\Naming;

return [
    Library::COMMON_MODELS_SOURCES => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Sources.php',
        Params::FILE_LOCATION => '@common/models/sources/',
        Params::TEMPLATE => Builder::TEMPLATES . '/common/modelSource.php',
    ],
    Library::COMMON_MODELS_ITEM => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}.php',
        Params::FILE_LOCATION => '@common/models/sources/',
        Params::TEMPLATE => Builder::TEMPLATES . '/common/model.php',
    ],
    Library::COMMON_REPOSITORY => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Repository.php',
        Params::FILE_LOCATION => '@common/repositories/',
        Params::TEMPLATE => Builder::TEMPLATES . '/common/repository.php',
    ],
    Library::COMMON_SERVICE => [+
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Service.php',
        Params::FILE_LOCATION => '@common/services/',
        Params::TEMPLATE => Builder::TEMPLATES . '/common/service.php',
    ],


    Library::CONSOLE_MODELS => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}.php',
        Params::FILE_LOCATION => '@console/models/items/',
        Params::TEMPLATE => Builder::TEMPLATES . '/console/model.php',
    ],
    Library::CONSOLE_REPOSITORY => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Repository.php',
        Params::FILE_LOCATION => '@console/repositories/',
        Params::TEMPLATE => Builder::TEMPLATES . '/console/repository.php',
    ],
    Library::CONSOLE_SERVICE => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Service.php',
        Params::FILE_LOCATION => '@console/services/',
        Params::TEMPLATE => Builder::TEMPLATES . '/console/service.php',
    ],


    Library::FRONTEND_MODELS => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}.php',
        Params::FILE_LOCATION => '@frontend/models/items/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/model.php',
    ],
    Library::FRONTEND_REPOSITORY => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Repository.php',
        Params::FILE_LOCATION => '@frontend/repositories/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/repository.php',
    ],
    Library::FRONTEND_SERVICE => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Service.php',
        Params::FILE_LOCATION => '@frontend/services/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/service.php',
    ],
    Library::FRONTEND_CONTROLLER => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Controller.php',
        Params::FILE_LOCATION => '@frontend/controllers/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/controller.php',
    ],
    Library::FRONTEND_TPL_LIST => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-list.php',
        Params::FILE_LOCATION => '@frontend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/list.php',
    ],
    Library::FRONTEND_TPL_VIEW => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-view.php',
        Params::FILE_LOCATION => '@frontend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/view.php',
    ],
    Library::FRONTEND_RESOURCES_LIST => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-list.js',
        Params::FILE_LOCATION => '@frontend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/list.php',
    ],
    Library::FRONTEND_RESOURCES_VIEW => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-view.js',
        Params::FILE_LOCATION => '@frontend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/view.php',
    ],


    Library::BACKEND_MODELS => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}.php',
        Params::FILE_LOCATION => '@backend/models/items/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/model.php',
    ],
    Library::BACKEND_REPOSITORY => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Repository.php',
        Params::FILE_LOCATION => '@backend/repositories/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/repository.php',
    ],
    Library::BACKEND_SERVICE => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Service.php',
        Params::FILE_LOCATION => '@backend/services/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/service.php',
    ],
    Library::BACKEND_CONTROLLER => [
        Params::NAMING => '{{' . Naming::PASCAL_CASE . '}}Controller.php',
        Params::FILE_LOCATION => '@backend/controllers/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/controller.php',
    ],
    Library::BACKEND_TPL_LIST => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-list.php',
        Params::FILE_LOCATION => '@backend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/list.php',
    ],
    Library::BACKEND_TPL_VIEW => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-view.php',
        Params::FILE_LOCATION => '@backend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/view.php',
    ],
    Library::BACKEND_TPL_CREATE => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-create.php',
        Params::FILE_LOCATION => '@backend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/create.php',
    ],
    Library::BACKEND_TPL_UPDATE => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-update.php',
        Params::FILE_LOCATION => '@backend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/update.php',
    ],

    Library::BACKEND_TPL_FORM => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-form.php',
        Params::FILE_LOCATION => '@backend/views/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/tpl/form.php',
    ],
    Library::BACKEND_RESOURCES_LIST => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-list.js',
        Params::FILE_LOCATION => '@backend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/list.php',
    ],
    Library::BACKEND_RESOURCES_VIEW => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-view.js',
        Params::FILE_LOCATION => '@backend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/view.php',
    ],
    Library::BACKEND_RESOURCES_CREATE => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-create.js',
        Params::FILE_LOCATION => '@backend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/create.php',
    ],
    Library::BACKEND_RESOURCES_UPDATE => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-update.js',
        Params::FILE_LOCATION => '@backend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/update.php',
    ],
    Library::BACKEND_RESOURCES_FORM => [
        Params::NAMING => '{{' . Naming::KEBAB_CASE . '}}-form.js',
        Params::FILE_LOCATION => '@backend/resources/{{' . Naming::KEBAB_CASE . '}}/',
        Params::TEMPLATE => Builder::TEMPLATES . '/frontend/resources/form.php',
    ],
];