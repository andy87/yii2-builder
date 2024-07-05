<?php declare(strict_types=1);

namespace andy87\yii2\builder\components\services;

use Yii;
use andy87\yii2\builder\components\models\TableForm;
use andy87\yii2\builder\components\models\collections\CollectionTableForm;

/**
 * Class AccordionService
 *
 * @package andy87\yii2\builder\components\services
 */
class AccordionService
{
    public function __construct(private string $view){}

    /**
     * @param CollectionTableForm $collectionTableForm
     *
     * @return array
     */
    public function getAccordionItems(CollectionTableForm $collectionTableForm): array
    {
        $accordionItems = [];

        foreach ( $collectionTableForm->tableForms as $fileName => $tableForm )
        {
            $accordionItems[] = [
                'label' => $fileName,
                'content' => $this->renderAccordionItem($tableForm),
            ];
        }

        return $accordionItems;
    }

    /**
     * @param TableForm $tableForm
     *
     * @return string
     */
    private function renderAccordionItem(TableForm $tableForm): string
    {
        $templatePath = Yii::getAlias($this->view) . '/accordion-item.php';

        return Yii::$app->view->renderFile( $templatePath, [ 'tableForm' => $tableForm ]);
    }
}