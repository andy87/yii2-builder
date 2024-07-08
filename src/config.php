<?php

use andy87\yii2\builder\components\{
    helpers\Library,
    models\settings\FileSettings
};

return [

    Library::COMMON_MODEL_SOURCES => new FileSettings( '/common/modelSource.php' ),
    Library::COMMON_MODEL_ITEM => new FileSettings( '/common/model.php' ),
    Library::COMMON_REPOSITORY => new FileSettings( '/common/repository.php' ),
    Library::COMMON_SERVICE => new FileSettings( '/common/service.php' ),

    Library::CONSOLE_MODEL => new FileSettings('/console/model/item.php' ),
    Library::CONSOLE_MODEL_FORM => new FileSettings('/console/model/form.php' ),
    Library::CONSOLE_REPOSITORY => new FileSettings('/console/repository.php' ),
    Library::CONSOLE_SERVICE => new FileSettings('/console/service.php' ),
    Library::CONSOLE_MIGRATE => new FileSettings('/console/migration.php' ),

    Library::FRONTEND_MODEL => new FileSettings( '/frontend/models/item.php' ),
    Library::FRONTEND_MODEL_FORM => new FileSettings( '/frontend/models/form.php' ),
    Library::FRONTEND_MODEL_SEARCH => new FileSettings( '/frontend/models/search.php' ),
    Library::FRONTEND_REPOSITORY => new FileSettings( '/frontend/repository.php' ),
    Library::FRONTEND_SERVICE => new FileSettings( '/frontend/service.php' ),
    Library::FRONTEND_CONTROLLER => new FileSettings( '/frontend/controller.php' ),
    Library::FRONTEND_TPL_LIST => new FileSettings( '/frontend/tpl/list.php' ),
    Library::FRONTEND_TPL_VIEW => new FileSettings( '/frontend/tpl/view.php' ),
    Library::FRONTEND_RESOURCES_LIST => new FileSettings( '/frontend/resources/list.php' ),
    Library::FRONTEND_RESOURCES_VIEW => new FileSettings( '/frontend/resources/view.php' ),

    Library::BACKEND_MODEL => new FileSettings('/frontend/models/item.php'),
    Library::BACKEND_MODEL_FORM => new FileSettings('/frontend/models/form.php'),
    Library::BACKEND_MODEL_SEARCH => new FileSettings('/frontend/models/search.php'),
    Library::BACKEND_REPOSITORY => new FileSettings('/frontend/repository.php'),
    Library::BACKEND_SERVICE => new FileSettings('/frontend/service.php'),
    Library::BACKEND_CONTROLLER => new FileSettings('/frontend/controller.php'),
    Library::BACKEND_TPL_LIST => new FileSettings('/frontend/tpl/list.php'),
    Library::BACKEND_TPL_VIEW => new FileSettings('/frontend/tpl/view.php'),
    Library::BACKEND_TPL_CREATE => new FileSettings('/frontend/tpl/create.php'),
    Library::BACKEND_TPL_UPDATE => new FileSettings('/frontend/tpl/update.php'),
    Library::BACKEND_TPL_FORM => new FileSettings('/frontend/tpl/form.php'),
    Library::BACKEND_RESOURCES_LIST => new FileSettings('/frontend/resources/list.php'),
    Library::BACKEND_RESOURCES_VIEW => new FileSettings('/frontend/resources/view.php'),
    Library::BACKEND_RESOURCES_CREATE => new FileSettings('/frontend/resources/create.php'),
    Library::BACKEND_RESOURCES_UPDATE => new FileSettings('/frontend/resources/update.php'),
    Library::BACKEND_RESOURCES_FORM => new FileSettings('/frontend/resources/form.php'),
];