<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\models\settings\GenerateTableSetting;
use Exception;
use Yii;
use andy87\yii2\builder\components\models\TableForm;

/**
 * Class CacheService
 *
 * @package andy87\yii2\builder\components\services
 */
class CacheService
{
    private const DEFAULT_DIR = 'cache-yii2-builder';

    private string $pathCache;

    /**
     * @param string|null $pathCache
     *
     * @param string $extension
     */
    public function __construct(?string $pathCache, private string $extension)
    {
        $this->setupPathDir($pathCache);
    }

    /**
     * @return CacheService
     *
     * @throws Exception
     */
    public static function getInstance(): CacheService
    {
        if ( isset(Builder::$instances[static::class]) ) {
            return Builder::$instances[static::class];
        }

        throw new Exception('Error: ' . static::class . ' not found in Builder::$instances');
    }

    /**
     * @param string|null $pathCache
     * @return void
     */
    private function setupPathDir(?string $pathCache): void
    {
        $this->pathCache = ( $pathCache )
            ? Yii::getAlias($pathCache)
            : Yii::$app->getRuntimePath() . '/' .self::DEFAULT_DIR;

        $this->createDirIfNotExists($this->pathCache);
    }

    /**
     * @param string $dir
     *
     * @return void
     */
    private function createDirIfNotExists(string $dir ): void
    {
        if (is_dir($dir)) return;

        mkdir($dir, 0777, true);
    }


    /**
     * Return cache collection TableForm
     *
     * @return GenerateTableSetting[]
     */
    public function getCollectionGenerateTableSettings(): array
    {
        $files = glob($this->pathCache . '/*.' . $this->extension );

        $collectionGenerateTableSettings = [];

        foreach ($files as $path)
        {
            if (in_array($path,['.','..']) ) continue;

            if ( is_file($path) )
            {
                $content = file_get_contents($path);

                /** @var GenerateTableSetting $generateTableForm */
                $generateTableSettings = unserialize($content);

                $collectionGenerateTableSettings[$generateTableSettings->] = unserialize($content);
            }
        }

        return $collectionGenerateTableSettings;
    }

    /**
     * @param string $fileName
     *
     * @return string
     */
    public function filePath( string $fileName): string
    {
        return $this->pathCache . "/$fileName." . $this->extension;
    }


    /**
     * @param TableForm $tableForm
     *
     * @return void
     */
    private function addTableForm(TableForm $tableForm): void
    {
        $tableForm->id = $tableForm->tableName;

        $path = $this->cacheFilePath($tableForm->tableName);

        $content = serialize($tableForm);

        (bool) file_put_contents($path, $content);
    }

    /**
     * @param TableForm $tableForm
     *
     * @return void
     */
    private function updateCTableForm(TableForm $tableForm): void
    {
        $this->removeTableForm($tableForm->tableName);

        $this->addTableForm($tableForm);
    }

    /**
     * @param string $name
     *
     * @return void
     */
    private function removeTableForm(string $name): void
    {
        $path = $this->cacheFilePath($name);

        if ( file_exists($path) ) unlink($path);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    private function cacheFilePath( string $name ): string
    {
        return $this->pathCache . "/$name." . $this->extension;
    }

}