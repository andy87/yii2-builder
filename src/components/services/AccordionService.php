<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use Yii;
use Exception;
use andy87\yii2\builder\components\Builder;
use andy87\yii2\builder\components\models\collections\CollectionGenerateTableForm;
use andy87\yii2\builder\components\models\forms\GenerateTableForm;

/**
 * Class AccordionService
 *
 * @package andy87\yii2\builder\components\services
 */
class AccordionService
{
    public function __construct(private string $view){}

    /**
     * @return AccordionService
     *
     * @throws Exception
     */
    public static function getInstance(): AccordionService
    {
        if ( isset(Builder::$instances[static::class]) ) {
            return Builder::$instances[static::class];
        }

        throw new Exception('Error: ' . static::class . ' not found in Builder::$instances');
    }

    /**
     * @param CollectionGenerateTableForm $collectionGenerateTableForm
     *
     * @return array
     */
    public function getAccordionItems(CollectionGenerateTableForm $collectionGenerateTableForm): array
    {
        $accordionItems = [];

        foreach ( $collectionGenerateTableForm->listGenerateTableForm as $tableName => $generateTableForm )
        {
            $accordionItems[] = [
                'label' => $tableName,
                'content' => $this->renderAccordionItem($generateTableForm),
            ];
        }

        return $accordionItems;
    }

    /**
     * @param GenerateTableForm $generateTableForm
     *
     * @return string
     */
    private function renderAccordionItem(GenerateTableForm $generateTableForm): string
    {
        $templatePath = Yii::getAlias($this->view) . '/accordion-item.php';

        return Yii::$app->view->renderFile( $templatePath, [ 'generateTableForm' => $generateTableForm ]);
    }
}