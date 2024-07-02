<?php

namespace andy87\yii2\builder\helpers;

/**
 * Class Library
 *
 * @package andy87\yii2\builder\helpers
 */
abstract class Library
{
    public const COMMON_MODELS_SOURCES = 0;
    public const COMMON_MODELS_ITEM = 1;
    public const COMMON_REPOSITORY = 2;
    public const COMMON_SERVICE = 3;

    public const CONSOLE_MODELS = 11;
    public const CONSOLE_REPOSITORY = 12;
    public const CONSOLE_SERVICE = 13;

    public const BACKEND_MODELS = 21;
    public const BACKEND_REPOSITORY = 22;
    public const BACKEND_SERVICE = 23;
    public const BACKEND_CONTROLLER = 24;
    public const BACKEND_TPL_LIST = 30;
    public const BACKEND_TPL_VIEW = 31;
    public const BACKEND_TPL_CREATE = 32;
    public const BACKEND_TPL_UPDATE = 33;
    public const BACKEND_TPL_FORM = 34;
    public const BACKEND_RESOURCES_LIST = 41;
    public const BACKEND_RESOURCES_VIEW = 42;
    public const BACKEND_RESOURCES_CREATE = 43;
    public const BACKEND_RESOURCES_UPDATE = 44;
    public const BACKEND_RESOURCES_FORM = 45;

    public const FRONTEND_MODELS = 51;
    public const FRONTEND_REPOSITORY = 52;
    public const FRONTEND_SERVICE = 53;
    public const FRONTEND_CONTROLLER = 54;
    public const FRONTEND_TPL_LIST = 60;
    public const FRONTEND_TPL_VIEW = 61;
    public const FRONTEND_RESOURCES_LIST = 71;
    public const FRONTEND_RESOURCES_VIEW = 72;
}