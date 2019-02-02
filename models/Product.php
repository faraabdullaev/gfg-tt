<?php

namespace app\models;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $brand
 * @property double $price
 * @property int $stock
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'brand'], 'required'],
            [['price'], 'number', 'min' => 0.0],
            [['stock'], 'integer', 'min' => 0],
            [['title'], 'string', 'max' => 255],
            [['brand'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'brand' => 'Brand',
            'price' => 'Price',
            'stock' => 'Stock',
        ];
    }
}
