<?php

class ProductCest
{

    public function testUnauthorized(ApiTester $I)
    {
        $I->sendPOST('/');
        $I->seeResponseCodeIs(401);
        $I->seeResponseContains('Your request was made with invalid credentials.');
    }

    public function testPagination(ApiTester $I)
    {
        $I->amHttpAuthenticated('demo', 'demo');
        $I->sendPOST('?q=title&sort=-d&page=3');
        $I->seeResponseCodeIs(200);

        $I->seeHttpHeaderOnce('X-Pagination-Page-Count');
        $I->seeHttpHeaderOnce('X-Pagination-Current-Page');

        $I->seeResponseIsJson();
    }

    public function testInvalidFilters(ApiTester $I)
    {
        $I->amHttpAuthenticated('demo', 'demo');
        $I->sendPOST('?q=title&filter=brands:puma;discount:5');
        $I->seeResponseCodeIs(500);

        $I->seeResponseContains('has no attribute named');
    }

}
