/* filters */
$('body').on('change', '.w_sidebar input', function () {
    var checked = $('.w_sidebar input:checked'),
            data = '';
    checked.each(function () {
        data += this.value + ',';
    });
    if (data) {
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function () {
                $('.preloader').fadeIn(300, function () {
                    $('.product-one').hide();
                });
            },
            success: function (res) {
                $('.preloader').delay(500).fadeOut('slow', function () {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, '');
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                alert('Ошибка!');
            }
        });
    } else {
        window.location = location.pathname;
    }
});
/*search*/
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    // hint: false,
    highlight: true
}, {
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function (ev, suggestion) {
    // console.log(suggestion);
    window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
});
/*search*/
/*cart*/
$('body').on('click', '.add-to-cart-link', function (event) {
    event.preventDefault();
    const id = $(this).data('id');
    const qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    const mod = $('.available select').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
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

$('#cart .modal-body').on('click', '.del-item', function () {
    const id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка!');
        }
    });
});

function showCart(cart) {
    if ($.trim(cart) == '<h3>Корзина пуста</h3>') {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    } else {
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $("#cart .modal-body").html(cart);
    $('#cart').modal();
    if ($('.cart-sum').text()) {
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    } else {
        $('.simpleCart_total').text('Корзина пуста');
    }
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже.');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Ошибка! Попробуйте позже.');
        }
    });
}
/*cart*/
/*****/
$('#currency').change(function () {
    window.location = 'currency/change?curr=' + $(this).val();
});
//при клике на ссылку выводим все просмотренные товары
//JS
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
//jQuery
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
/*****/
/*calendar*/
if ($('div').is("#calendar")) {
    $.ajax({
        url: '/news/view',
        type: 'GET',
        success: function (res) {
            var data = JSON.parse(res);
            $("#calendar").eventCalendar({
                jsonData: data,
//    eventsjson: '../eventCalendar.json',
                jsonDateFormat: 'human',
                dateFormat: "YYYY/MM/DD",
//    openEventInNewWindow: true,
                locales: {
                    locale: "ru",
                    txt_noEvents: "Нет новостей",
                    txt_SpecificEvents_prev: "",
                    txt_SpecificEvents_after: "новости:",
                    txt_NextEvents: "Новости сегодня:",
                    txt_GoToEventUrl: "Смотреть новость",
                    showDescription: true,
                    moment: {
                        "months": ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
                            "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                        "monthsShort": ["Янв", "Фев", "Мар", "Апр", "Май", "Июн",
                            "Июл", "Aвг", "Сен", "Окт", "Ноя", "Дек"],
                        "weekdays": ["Воскресенье", "Понедельние", "Вторник", "Среда",
                            "Четверг", "Пятница", "Суббота"],
                        "weekdaysShort": ["Вс", "Пн", "Вт", "Ср",
                            "Чт", "Пт", "Сб"],
                        "weekdaysMin": ["Вс", "Пн", "Вт", "Ср",
                            "Чт", "Пт", "Сб"]
                    }
                }
            });
        },
        error: function () {
            alert('Ошибка! Попробуйте позже.');
        }
    });
}
/*calendar*/

