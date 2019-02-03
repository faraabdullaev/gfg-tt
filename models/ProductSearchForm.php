<?php

namespace app\models;

use yii\base\Model;

class ProductSearchForm extends Model
{
    const SORT_BY_FIELDS = [
        'id', '-id',
        'title', '-title',
        'brand', '-brand',
        'price', '-price',
        'stock', '-stock'
    ];

    public $id;
    public $title;
    public $brand;
    public $price;
    public $stock;
    public $sortBy;
    public $page;
    public $basicAccessToken;

    public function rules()
    {
        return [
            [['basicAccessToken'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['stock', 'id'], 'integer', 'min' => 0],
            [['page'], 'integer', 'min' => 1],
            [['price'], 'number', 'min' => 0.0],
            [['brand'], 'each', 'rule' => ['string', 'max' => 100]],
            [['sortBy'], 'in', 'range' => self::SORT_BY_FIELDS],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Product',
            'brand' => 'Brand',
            'stock' => 'Stock',
            'price' => 'Price',
            'page' => 'Page',
            'sortBy' => 'Sort By',
        ];
    }

    public function getSortByFields()
    {
        return array_reduce(self::SORT_BY_FIELDS, function ($arr, $item) {
            if ('-' === $item[0])
                $value = substr($item, 1) . ' DESC';
            else
                $value = $item . ' ASC';
            $arr[$item] = ucfirst($value);
            return $arr;
        }, []);
    }
}
