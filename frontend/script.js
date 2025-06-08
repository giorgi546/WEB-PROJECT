$(document).ready(function(){
    $('#shopBtn').click(function(){
        alert("Welcome to ShopEase shopping experience!");
    });

    // Load products dynamically if the container exists
    function renderProducts(list) {
        var container = $('#productList');
        list.forEach(function(p){
            var card = $('<div class="product-card"></div>');
            card.append('<img src="' + p.image + '" alt="' + p.name + '">');
            card.append('<h3>' + p.name + '</h3>');
            card.append('<p>$' + p.price + '</p>');
            container.append(card);
        });
    }

    if ($('#productList').length) {
        $.getJSON('../api/products.php')
            .done(function(data){
                renderProducts(data);
            })
            .fail(function(){
                // Fallback demo data
                var demo = [
                    {name:'Sample Product 1', price:'9.99', image:'https://via.placeholder.com/150'},
                    {name:'Sample Product 2', price:'19.99', image:'https://via.placeholder.com/150'},
                    {name:'Sample Product 3', price:'29.99', image:'https://via.placeholder.com/150'},
                    {name:'Sample Product 4', price:'39.99', image:'https://via.placeholder.com/150'},
                    {name:'Sample Product 5', price:'49.99', image:'https://via.placeholder.com/150'},
                    {name:'Sample Product 6', price:'59.99', image:'https://via.placeholder.com/150'}
                ];
                renderProducts(demo);
            });
    }
});
