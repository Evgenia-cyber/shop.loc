/*cart*/
$('body').on('click', '.add-to-cart-link', function (event) {
    event.preventDefault();
    const id = $(this).data('id');
    const qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    const mod = $('.available select').val();
    $.ajax({
                url: '/cart/add',
                data: {id: id, qty: qty, mod: mod },
                type: 'GET',
                success: function (res) {
                    showCart(res);
                },
                error: function () {
                    alert('Ошибка! Попробуйте позже.');
                }
            });
//    console.log(id,qty,mod);
});

function showCart(cart) {
    console.log(cart);
};
/*cart*/
$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
});
//при клике на ссылку выводим все просмотренные товары
//const allRecentlyViewedLink = document.getElementById('all_recently_viewed');
//const allRecentlyViewedDiv = document.querySelector('.all-recently-viewed');
//allRecentlyViewedLink.onclick = () => {
//    if (allRecentlyViewedDiv.style.display === 'none') {
//        allRecentlyViewedDiv.style.display = 'block';
//        allRecentlyViewedLink.textContent = 'Скрыть все просмотренные товары';
//    } else {
//        allRecentlyViewedDiv.style.display = 'none';
//        allRecentlyViewedLink.textContent = 'Показать все просмотренные товары';
//    }
//};
$('#allRecentlyViewedLink').click(function () {
    if ($('.all-recently-viewed').css('display') === 'none') {
        $('.all-recently-viewed').css("display", "block");
        $('#allRecentlyViewedLink').text('Скрыть все просмотренные товары');
    } else {
        $('.all-recently-viewed').css("display", "none");
        $('#allRecentlyViewedLink').text('Показать все просмотренные товары');
    }
});

$('.available select').on('change', function () {
    var modId = $(this).val(),
            color = $(this).find('option').filter(':selected').data('title'),
            price = $(this).find('option').filter(':selected').data('price'),
            basePrice = $('#base-price').data('base');
//    console.log(modId, color, price);
    if (price) {
        $('#base-price').text(symbolLeft + price + symbolRight);
    } else {
        $('#base-price').text(symbolLeft + basePrice + symbolRight);
    }

})

