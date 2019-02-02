<?php

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\filters\ProductFilter;
use app\api\modules\v1\models\ProductSearch;
use app\models\User;
use Yii;
use yii\filters\auth\HttpBasicAuth;
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
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
            'auth' => function ($username, $password) {
                return User::findOne($username, $password);
            }
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $filter = new ProductFilter($searchModel, Yii::$app->request->queryParams);

        $dataProvider = $searchModel->search($filter->getQueryParams());

        return $dataProvider;
    }
}
