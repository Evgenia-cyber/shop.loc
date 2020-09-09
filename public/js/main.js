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
if ($('.all-recently-viewed').css('display') === 'none'){
$('.all-recently-viewed').css("display", "block");
        $('#allRecentlyViewedLink').text('Скрыть все просмотренные товары');
} else {
$('.all-recently-viewed').css("display", "none");
        $('#allRecentlyViewedLink').text('Показать все просмотренные товары');
}
});

