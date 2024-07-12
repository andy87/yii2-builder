<?php

use andy87\yii2\builder\components\helpers\Library;
use andy87\yii2\builder\models\settings\GenerateFileSettings;

return [

    Library::COMMON_MODEL_SOURCES => new GenerateFileSettings( '/common/modelSource.php' ),
    Library::COMMON_MODEL_ITEM => new GenerateFileSettings( '/common/model.php' ),
    Library::COMMON_REPOSITORY => new GenerateFileSettings( '/common/repository.php' ),
    Library::COMMON_SERVICE => new GenerateFileSettings( '/common/service.php' ),

    Library::CONSOLE_MODEL => new GenerateFileSettings('/console/model/item.php' ),
    Library::CONSOLE_MODEL_FORM => new GenerateFileSettings('/console/model/form.php' ),
    Library::CONSOLE_REPOSITORY => new GenerateFileSettings('/console/repository.php' ),
    Library::CONSOLE_SERVICE => new GenerateFileSettings('/console/service.php' ),
    Library::CONSOLE_MIGRATE => new GenerateFileSettings('/console/migration.php' ),

    Library::FRONTEND_MODEL => new GenerateFileSettings( '/frontend/models/item.php' ),
    Library::FRONTEND_MODEL_FORM => new GenerateFileSettings( '/frontend/models/form.php' ),
    Library::FRONTEND_MODEL_SEARCH => new GenerateFileSettings( '/frontend/models/search.php' ),
    Library::FRONTEND_REPOSITORY => new GenerateFileSettings( '/frontend/repository.php' ),
    Library::FRONTEND_SERVICE => new GenerateFileSettings( '/frontend/service.php' ),
    Library::FRONTEND_CONTROLLER => new GenerateFileSettings( '/frontend/controller.php' ),
    Library::FRONTEND_TPL_LIST => new GenerateFileSettings( '/frontend/tpl/list.php' ),
    Library::FRONTEND_TPL_VIEW => new GenerateFileSettings( '/frontend/tpl/view.php' ),
    Library::FRONTEND_RESOURCES_LIST => new GenerateFileSettings( '/frontend/resources/list.php' ),
    Library::FRONTEND_RESOURCES_VIEW => new GenerateFileSettings( '/frontend/resources/view.php' ),

    Library::BACKEND_MODEL => new GenerateFileSettings('/frontend/models/item.php'),
    Library::BACKEND_MODEL_FORM => new GenerateFileSettings('/frontend/models/form.php'),
    Library::BACKEND_MODEL_SEARCH => new GenerateFileSettings('/frontend/models/search.php'),
    Library::BACKEND_REPOSITORY => new GenerateFileSettings('/frontend/repository.php'),
    Library::BACKEND_SERVICE => new GenerateFileSettings('/frontend/service.php'),
    Library::BACKEND_CONTROLLER => new GenerateFileSettings('/frontend/controller.php'),
    Library::BACKEND_TPL_LIST => new GenerateFileSettings('/frontend/tpl/list.php'),
    Library::BACKEND_TPL_VIEW => new GenerateFileSettings('/frontend/tpl/view.php'),
    Library::BACKEND_TPL_CREATE => new GenerateFileSettings('/frontend/tpl/create.php'),
    Library::BACKEND_TPL_UPDATE => new GenerateFileSettings('/frontend/tpl/update.php'),
    Library::BACKEND_TPL_FORM => new GenerateFileSettings('/frontend/tpl/form.php'),
    Library::BACKEND_RESOURCES_LIST => new GenerateFileSettings('/frontend/resources/list.php'),
    Library::BACKEND_RESOURCES_VIEW => new GenerateFileSettings('/frontend/resources/view.php'),
    Library::BACKEND_RESOURCES_CREATE => new GenerateFileSettings('/frontend/resources/create.php'),
    Library::BACKEND_RESOURCES_UPDATE => new GenerateFileSettings('/frontend/resources/update.php'),
    Library::BACKEND_RESOURCES_FORM => new GenerateFileSettings('/frontend/resources/form.php'),
];