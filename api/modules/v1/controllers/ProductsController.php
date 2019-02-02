<?php

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\ProductSearch;
use Yii;
use yii\filters\Cors;
use yii\rest\Controller;

class ProductsController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $dataProvider;
    }
}
