<?php

namespace app\api\modules\v1;

/**
 * api module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\api\modules\v1\controllers';
    public $defaultRoute = 'products';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::$app->user->enableSession = false;
    }
}
