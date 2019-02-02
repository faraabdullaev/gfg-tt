<?php

namespace app\api\modules\v1\filters;

use app\api\modules\v1\models\ProductSearch;
use yii\base\InvalidArgumentException;


/**
 * Created by PhpStorm.
 * User: VX15
 * Date: 02.02.2019
 * Time: 15:32
 */
class ProductFilter
{
    const FILTER_DELIMITER = ';';

    private $model;
    private $modelClass;
    private $queryParams;

    public function __construct(ProductSearch $model, array $queryParams)
    {
        $this->model = $model;
        $this->modelClass = array_reverse(explode('\\', get_class($model)))[0];

        $this->clarifyParams($queryParams);
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    private function clarifyParams(array $queryParams)
    {
        $this->queryParams = [];

        if (isset($queryParams['q']))
            $this->addModelParam('title', $queryParams['q']);

        if (isset($queryParams['filter']) && $queryParams['filter'])
            $this->addFilteredParams($queryParams['filter']);

        if (isset($queryParams['page']))
            $this->queryParams['page'] = (int)$queryParams['page'];

        if (isset($queryParams['sort']))
            $this->queryParams['sort'] = (int)$queryParams['sort'];
    }

    private function addModelParam(string $attr, $value)
    {
        if (!$this->model->hasAttribute($attr))
            throw new InvalidArgumentException("{$this->modelClass} has no attribute named \"{$attr}\".");

        $this->queryParams[$this->modelClass][$attr] = $value;
    }

    private function addFilteredParams(string $params)
    {
        foreach (explode(self::FILTER_DELIMITER, $params) as $filter) {
            $filter = explode(':', $filter);
            $attr = $filter[0];
            $value = $filter[1];

            if ($attr === 'brand') {
                $this->addModelParam($attr, array_map('trim', explode(',', $value)));
                continue;
            }

            $this->addModelParam($attr, $value);
        }
    }

}