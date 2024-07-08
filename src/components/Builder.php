<?php

namespace andy87\yii2\builder\components;

use andy87\yii2\builder\components\models\collections\CollectionGenerateTableForm;
use andy87\yii2\builder\components\models\collections\CollectionGenerateTableSettings;
use andy87\yii2\builder\components\models\settings\FileSettings;
use andy87\yii2\builder\components\models\settings\GenerateFileSetting;
use Exception;
use Yii;
use yii\gii\Generator;
use andy87\yii2\builder\components\services\{ CacheService, FormService, AccordionService };


/**
 * Class Builder
 *
 * @package andy87\yii2\architect\components
 */
class Builder extends Generator
{
    /** @var string ID on module list */
    public const ID = 'builder';

    public const HINT = 'Yii2 Builder - расширение для модуля Gii в фреймворке Yii2 упрощающее генерацию файлов';


    /** @var string Path on root directory */
    public const SRC = '@vendor/andy87/yii2-builder/src';

    /** @var string Path with view directory */
    public const VIEWS = self::SRC . '/views';

    private const CACHE_EXT = 'json';



    /**
     * @var FormService[]|CacheService[]|AccordionService[]
     */
    public static array $instances = [];



    /**
     * @var ?string Path with cache directory
     */
    public ?string $pathCache = null;

    /**
     * @var FileSettings[] Collection settings for custom generation
     */
    public array $extension = [];

    /**
     * @var string Path with templates
     */
    public string $dirWithTemplates = self::SRC . '/templates';


    /**
     * @var GenerateFileSetting[]
     */
    public array $listGenerateFileSetting = [];


    /**
     * @var CollectionGenerateTableSettings
     */
    public CollectionGenerateTableSettings $collectionGenerateTableSettings;

    /**
     * @var CollectionGenerateTableForm
     */
    public CollectionGenerateTableForm $collectionGenerateTableForm;


    /**
     * Initialization
     *
     * @return void
     *
     * @throws Exception
     */
    public function init(): void
    {
        parent::init();

        $this->setupServices();

        $this->updateConfig();

        $this->run();
    }

    /**
     * @return void
     */
    private function setupServices(): void
    {
        self::$instances[CacheService::class] = new CacheService($this->pathCache, self::CACHE_EXT);

        self::$instances[FormService::class] = new FormService(self::$instances[CacheService::class]);

        self::$instances[AccordionService::class] = new AccordionService(self::VIEWS);
    }


    /**
     * Get path to view
     *
     * @return string
     */
    public function formView(): string
    {
        return self::VIEWS . '/display.php';
    }

    /**
     * Return ext `name`
     *
     * @return string
     */
    public function getName(): string
    {
        return ucfirst(self::ID);
    }

    /**
     * Return ext `description`
     *
     * @return string
     */
    public function getDescription(): string
    {
        return self::HINT;
    }

    /**
     * ????
     *
     * @return string
     */
    public function generate(): string
    {
        return 'Hello, world!';
    }

    /**
     * @return void
     *
     * @throws Exception
     */
    public function run(): void
    {
        $formService = FormService::getInstance();

        $formService->requestHandler($this);

        $this->collectionGenerateTableSettings = $formService->getCollectionGenerateTableSettings();

        $this->collectionGenerateTableForm = $formService->getCollectionGenerateTableForm($this);
    }

    /**
     * @return void
     */
    private function updateConfig(): void
    {
        if (empty($this->listGenerateFileSetting))
        {
            $this->listGenerateFileSetting = require Yii::getAlias(self::SRC . '/config.php');

            foreach ($this->extension as $key => $config)
            {
                $this->listGenerateFileSetting[$key] = $config;
            }
        }
    }
}