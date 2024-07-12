<?php

namespace andy87\yii2\builder;

use andy87\yii2\builder\models\forms\FileFilterSettingsForm;
use Yii;
use Exception;
use yii\gii\Generator;
use andy87\yii2\builder\resources\BuilderResources;
use andy87\yii2\builder\components\interfaces\ActionsInterface;
use andy87\yii2\builder\models\settings\{ TableSetting, GenerateFileSettings };

/**
 * Class Builder
 *
 * @package andy87\yii2\architect\components
 */
class Builder extends Generator implements ActionsInterface
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
     * @var ?string Path with cache directory
     */
    public ?string $pathCache = null;

    /**
     * @var GenerateFileSettings[] Collection settings for custom generation
     */
    public array $extension = [];

    /**
     * @var string Path with templates
     */
    public string $dirWithTemplates = self::SRC . '/templates';


    /**
     * @var GenerateFileSettings[]
     */
    public array $configGenerateFile = [];

    /**
     * @var BuilderResources
     */
    public BuilderResources $builderResources;


    /** @var TableSetting[]  */
    public array $listTableInfoSettings = [];


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

        $this->updateConfig();

        $this->setupResources();
    }


    /**
     * @return void
     */
    private function updateConfig(): void
    {
        if (empty($this->configGenerateFile))
        {
            $this->configGenerateFile = require Yii::getAlias(self::SRC . '/config.php');

            foreach ($this->extension as $key => $config)
            {
                $this->configGenerateFile[$key] = $config;
            }
        }
    }

    /**
     * @return void
     *
     * @throws Exception
     */
    public function setupResources(): void
    {
        $builderResources = new BuilderResources();

        $this->builderResources = $builderResources;
        $this->builderResources->collectionTableInfo->newTableInfoForm->listFileForm = $this->getListFileFilterSettingsForm();

        //$formService = new FormService(new CacheService());

        //$formService->requestHandler($this);

        //$this->listTableInfoSettings = $formService->getCollectionGenerateTableSettings();

        //$this->builderResources->collectionGenerateTableForm = $formService->getCollectionGenerateTableForm($this);
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
     * @return FileFilterSettingsForm[]
     */
    private function getListFileFilterSettingsForm(): array
    {
        $listFileFilterSettingsForm = [];

        foreach ($this->configGenerateFile as $key => $config)
        {
            $fileFilterSettingsForm = new FileFilterSettingsForm();
            $fileFilterSettingsForm->id = $key;
            $fileFilterSettingsForm->path = $key;
            $fileFilterSettingsForm->generate = true;

            $listFileFilterSettingsForm[$key] = $fileFilterSettingsForm;
        }

        return $listFileFilterSettingsForm;
    }
}