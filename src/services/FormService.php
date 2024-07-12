<?php declare(strict_types=1);

namespace andy87\yii2\builder\services;

use andy87\yii2\builder\Builder;
use andy87\yii2\builder\models\forms\ModelInfoForm;
use Yii;
use Exception;
use andy87\yii2\builder\models\forms\TableForm;
use andy87\yii2\builder\models\forms\FileFilterSettingsForm;
use andy87\yii2\builder\models\settings\FileFilterSettings;
use andy87\yii2\builder\models\collections\CollectionTableInfo;


/**
 * Class FormService
 *
 * @package andy87\yii2\components\services
 */
class FormService
{
    public function __construct(private CacheService $cacheService) {}

    /**
     *
     * @return FormService
     * @throws Exception
     */
    public static function getInstance(): FormService
    {
        if ( isset(Builder::$instances[static::class]) ) {
            return Builder::$instances[static::class];
        }

        throw new Exception('Error: ' . static::class . ' not found in Builder::$instances');
    }

    /**
     * @param Builder $builder
     * -
     * @return void
     */
    public function requestHandler(Builder $builder): void
    {
        $request = Yii::$app->request;

        if ( $request->isPost )
        {
            $post = $request->post();
            print_r([
                '$post' => $post
            ]);
            exit();
        }
    }
}