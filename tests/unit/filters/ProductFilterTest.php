<?php namespace filters;

use app\api\modules\v1\filters\ProductFilter;
use app\api\modules\v1\models\ProductSearch;

class ProductFilterTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $searchModel;

    protected function _before()
    {
        $this->searchModel = new ProductSearch();
    }

    public function testInvalidateFilters()
    {
        $filter = new ProductFilter($this->searchModel, ['filter' => '']);
        expect($filter->getQueryParams())->hasntKey('ProductSearch');
    }

    public function testValidateQuery()
    {
        $params = [
            'q' => 'searching title',
            'filter' => 'brand:puma,  adidas     ,nike;price:20',
            'page' => 2,
            'sort' => '-id',
        ];
        $query = (new ProductFilter($this->searchModel, $params))->getQueryParams();

        expect($query)->hasKey('page');
        expect($query)->hasKey('sort');

        expect($query['ProductSearch'])->hasKey('title');
        expect($query['ProductSearch'])->hasKey('brand');
        expect($query['ProductSearch'])->hasKey('price');

        expect($query['ProductSearch']['brand'])->contains('adidas');
    }
}