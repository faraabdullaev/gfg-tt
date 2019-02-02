<?php

namespace app\api\modules\v1\models;


use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Created by PhpStorm.
 * User: VX15
 * Date: 02.02.2019
 * Time: 15:20
 */
class ProductSearch extends \app\models\Product
{

    public function rules()
    {
        return [
            [['price'], 'number', 'min' => 0.0],
            [['stock'], 'integer', 'min' => 0],
            [['title'], 'string', 'max' => 255],
            [['brand'], 'each', 'rule' => ['string', 'max' => 100]],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'brand' => $this->brand,
            'price' => $this->price,
            'stock' => $this->stock,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
