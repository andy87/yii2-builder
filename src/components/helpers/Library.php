<?php

namespace andy87\yii2\builder\components\helpers;

/**
 * Class Library
 *
 * @package andy87\yii2\builder\helpers
 */
abstract class Library
{
    public const COMMON_MODEL_SOURCES = '@common/models/sources/{{PascalCase}}Source';
    public const COMMON_MODEL_ITEM = '@common/models/sources/{{PascalCase}}';
    public const COMMON_REPOSITORY = '@common/repositories/{{PascalCase}}Repository';
    public const COMMON_SERVICE = '@common/services/{{PascalCase}}Service';



    public const CONSOLE_MODEL = '@console/models/items/{{PascalCase}}';
    public const CONSOLE_MODEL_FORM = '@console/models/forms/{{PascalCase}}';
    public const CONSOLE_REPOSITORY = '@console/repositories/{{PascalCase}}Repository';
    public const CONSOLE_SERVICE = '@console/services/{{PascalCase}}Service';
    public const CONSOLE_MIGRATE = '@console/migration/m_ymd_his__create_table__{{snake_case}}';



    public const BACKEND_MODEL = '@backend/models/items/{{PascalCase}}';
        public const BACKEND_MODEL_FORM = '@backend/models/forms/{{PascalCase}}Form';
        public const BACKEND_MODEL_SEARCH = '@backend/models/search/{{PascalCase}}Search';
    public const BACKEND_REPOSITORY = '@backend/repositories/{{PascalCase}}Repository';
    public const BACKEND_SERVICE = '@backend/services/{{PascalCase}}Service';
    public const BACKEND_CONTROLLER = '@backend/controllers/{{PascalCase}}Controller';
    public const BACKEND_TPL_LIST = '@backend/tpl/{{kebab-case}}-list';
        public const BACKEND_TPL_VIEW = '@backend/tpl/{{kebab-case}}-view';
        public const BACKEND_TPL_CREATE = '@backend/tpl/{{kebab-case}}-create';
        public const BACKEND_TPL_UPDATE = '@backend/tpl/{{kebab-case}}-update';
        public const BACKEND_TPL_FORM = '@backend/tpl/{{kebab-case}}-form';
    public const BACKEND_RESOURCES_LIST = '@backend/resources/{{PascalCase}}ListResource';
        public const BACKEND_RESOURCES_VIEW = '@backend/resources/{{PascalCase}}ViewResource';
        public const BACKEND_RESOURCES_CREATE = '@backend/resources/{{PascalCase}}CreateResource';
        public const BACKEND_RESOURCES_UPDATE = '@backend/resources/{{PascalCase}}UpdateResource';
        public const BACKEND_RESOURCES_FORM = '@backend/resources/{{PascalCase}}FormResource';



    public const FRONTEND_MODEL = '@frontend/models/{{PascalCase}}';
        public const FRONTEND_MODEL_SEARCH = '@frontend/models/{{PascalCase}}Search';
        public const FRONTEND_MODEL_FORM = '@frontend/models/{{PascalCase}}Form';
    public const FRONTEND_REPOSITORY = '@frontend/repositories/{{PascalCase}}Repository';
    public const FRONTEND_SERVICE = '@frontend/services/{{PascalCase}}Service';
    public const FRONTEND_CONTROLLER = '@frontend/controllers/{{PascalCase}}Controller';
    public const FRONTEND_TPL_LIST = '@frontend/tpl/{{kebab-case}}-list';
        public const FRONTEND_TPL_VIEW = '@frontend/tpl/{{kebab-case}}-view';
    public const FRONTEND_RESOURCES_LIST = '@frontend/resources/{{PascalCase}}ListResource';
        public const FRONTEND_RESOURCES_VIEW = '@frontend/resources/{{PascalCase}}ViewResource';
}