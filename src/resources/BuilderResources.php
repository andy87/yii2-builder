<?php

namespace andy87\yii2\builder\resources;

use andy87\yii2\builder\models\collections\CollectionTableInfo;

/**
 * Class BuilderResources
 *
 * @package andy87\yii2\builder\components\resources
 */
class BuilderResources
{
    /**
     * @var CollectionTableInfo
     */
    public CollectionTableInfo $collectionTableInfo;



    /**
     * BuilderResources constructor.
     */
    public function __construct()
    {
        $this->collectionTableInfo = new CollectionTableInfo();
    }
}