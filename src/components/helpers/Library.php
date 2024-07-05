<?php

namespace andy87\yii2\builder\components\helpers;

/**
 * Class Library
 *
 * @package andy87\yii2\builder\helpers
 */
abstract class Library
{
    /** @var int common/models/sources/{{PascalCase}}Source */
    public const COMMON_MODEL_SOURCES = 0;
    /** @var int common/models/sources/{{PascalCase}} */
    public const COMMON_MODEL_ITEM = 1;
    /** @var int common/repositories/{{PascalCase}}Repository */
    public const COMMON_REPOSITORY = 2;
    /** @var int common/services/{{PascalCase}}Service */
    public const COMMON_SERVICE = 3;

    /** @var int console/models/items/{{PascalCase}} */
    public const CONSOLE_MODEL = 11;
    /** @var int console/models/items/{{PascalCase}} */
    public const CONSOLE_MODEL_FORM = 12;
    /** @var int console/repositories/{{PascalCase}}Repository */
    public const CONSOLE_REPOSITORY = 13;
    /** @var int console/services/{{PascalCase}}Service */
    public const CONSOLE_SERVICE = 14;
    /** @var int console/migration/m_date_time__create_table__{{snake_case}} */
    public const CONSOLE_MIGRATE = 15;

    /** @var int backend/models/items/{{PascalCase}} */
    public const BACKEND_MODEL = 21;
    /** @var int backend/models/forms/{{PascalCase}}Form */
    public const BACKEND_MODEL_FORM = 22;
    /** @var int backend/models/search/{{PascalCase}}Search */
    public const BACKEND_MODEL_SEARCH = 23;
    /** @var int backend/repositories/{{PascalCase}}Repository */
    public const BACKEND_REPOSITORY = 24;
    /** @var int backend/services/{{PascalCase}}Service */
    public const BACKEND_SERVICE = 25;
    /** @var int backend/controllers/{{PascalCase}}Controller */
    public const BACKEND_CONTROLLER = 26;
    /** @var int backend/tpl/{{kebab-case}}-list */
    public const BACKEND_TPL_LIST = 30;
    /** @var int backend/tpl/{{kebab-case}}-iew */
    public const BACKEND_TPL_VIEW = 31;
    /** @var int backend/tpl/{{kebab-case}}-create */
    public const BACKEND_TPL_CREATE = 32;
    /** @var int backend/tpl/{{kebab-case}}-update */
    public const BACKEND_TPL_UPDATE = 33;
    /** @var int backend/tpl/{{kebab-case}}-form */
    public const BACKEND_TPL_FORM = 34;
    /** @var int backend/resources/{{PascalCase}}Resource */
    public const BACKEND_RESOURCES_LIST = 41;
    /** @var int backend/resources/{{PascalCase}}Resource */
    public const BACKEND_RESOURCES_VIEW = 42;
    /** @var int backend/resources/{{PascalCase}}Resource */
    public const BACKEND_RESOURCES_CREATE = 43;
    /** @var int backend/resources/{{PascalCase}}Resource */
    public const BACKEND_RESOURCES_UPDATE = 44;
    /** @var int backend/resources/{{PascalCase}}Resource */
    public const BACKEND_RESOURCES_FORM = 45;

    /** @var int frontend/models/{{PascalCase}} */
    public const FRONTEND_MODEL = 51;

    /** @var int frontend/models/{{PascalCase}}Search */
    public const FRONTEND_MODEL_SEARCH = 52;

    /** @var int frontend/models/{{PascalCase}}Form */
    public const FRONTEND_MODEL_FORM = 53;
    /** @var int frontend/repositories/{{PascalCase}}Repository */
    public const FRONTEND_REPOSITORY = 54;
    /** @var int frontend/services/{{PascalCase}}Service */
    public const FRONTEND_SERVICE = 55;
    /** @var int frontend/controllers/{{PascalCase}}Controller */
    public const FRONTEND_CONTROLLER = 56;
    /** @var int frontend/tpl/{{kebab-case}}-list */
    public const FRONTEND_TPL_LIST = 60;
    /** @var int frontend/tpl/{{kebab-case}}-view */
    public const FRONTEND_TPL_VIEW = 61;
    /** @var int frontend/resources/{{PascalCase}}Resource */
    public const FRONTEND_RESOURCES_LIST = 71;
    /** @var int frontend/resources/{{PascalCase}}Resource */
    public const FRONTEND_RESOURCES_VIEW = 72;
}