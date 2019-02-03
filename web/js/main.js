jQuery.fn.serializeObject = function () {
    var results = {},
        arr = this.serializeArray();
    for (var i = 0, len = arr.length; i < len; i++) {
        obj = arr[i];
        //Check if results have a property with given name
        if (results.hasOwnProperty(obj.name)) {
            //Check if given object is an array
            if (!results[obj.name].push) {
                results[obj.name] = [results[obj.name]];
            }
            results[obj.name].push(obj.value || '');
        } else {
            results[obj.name] = obj.value || '';
        }
    }
    return results;
};

$(function () {

    $(document).on('submit', '#search-form', function (event) {
        event.preventDefault();

        var data = $(this).serializeObject();

        var apiUrl = '/v1/products?';
        var queryParams = [];
        var filterParams = [];
        var basicHeader = 'Basic ' + data['ProductSearchForm[basicAccessToken]'];

        if (data['ProductSearchForm[title]'])
            queryParams.push('q=' + data['ProductSearchForm[title]']);
        if (data['ProductSearchForm[page]'])
            queryParams.push('page=' + data['ProductSearchForm[page]']);
        if (data['ProductSearchForm[sortBy]'])
            queryParams.push('sort=' + data['ProductSearchForm[sortBy]'].filter(function(item){ return !!item;}));

        if (data['ProductSearchForm[brand][]'])
            filterParams.push('brand:' + data['ProductSearchForm[brand][]'].join(','));
        if (data['ProductSearchForm[price]'])
            filterParams.push('price:' + data['ProductSearchForm[price]']);
        if (data['ProductSearchForm[stock]'])
            filterParams.push('stock:' + data['ProductSearchForm[stock]']);

        if (filterParams.length)
            queryParams.push('filter=' + filterParams.join(';'));

        apiUrl += queryParams.join('&');
        $.ajax({
            method: 'GET',
            url: apiUrl,
            headers: {
                'Authorization': basicHeader
            },
            success: function (data, textStatus, jqXHR) {
                var resultContainer = $('#results');

                resultContainer.find('#url').html(apiUrl);
                resultContainer.find('#status').html(jqXHR.statusText);
                resultContainer.find('#code').html(jqXHR.status);
                resultContainer.find('#count').html(jqXHR.getResponseHeader('X-Pagination-Page-Count'));
                resultContainer.find('#current').html(jqXHR.getResponseHeader('X-Pagination-Current-Page'));
                resultContainer.find('#total').html(jqXHR.getResponseHeader('X-Pagination-Total-Count'));

                resultContainer.find('pre').html(JSON.stringify(data, undefined, 2));

                resultContainer.show(300);
            }
        });
    });
});
