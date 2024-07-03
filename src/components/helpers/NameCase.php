<?php

namespace andy87\yii2\builder\components\helpers;

/**
 * Class `NameCase`
 *
 * @package andy87\yii2\builder\helpers
 */
abstract class NameCase
{
    public const PASCAL = '{{PascalCase}}';

    public const SNAKE = '{{snake_case}}';

    public const CAMEL = '{{camelCase}}';

    public const KEBAB = '{{kebab-case}}';

    public const UPPER_SNAKE = '{{UPPER_SNAKE}}';
    public const LOWER = '{{lowercase}}';
    public const UPPER = '{{UPPER}}';
    public const CAPITALIZE = self::UPPER;
}