//CKEDITOR.replace('editor1');
$('#editor1').ckeditor();
$('.delete').click(function () {
    var res = confirm('Подтвердите действие');
    if (!res)
        return false;
});
$('.sidebar-menu a').each(function () {
    var location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    var link = this.href;
    if (link == location) {
        $(this).parent().addClass('active');
        $(this).closest('.treeview').addClass('active');
    }
});
$('#reset-filter').click(function () {
    $('#filter input[type=radio]').prop('checked', false);
    return false;
});
$(".select2").select2({
    placeholder: "Начните ввод наименования товара",
    minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminpath + "/product/related-product",
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            return {
                results: data.items,
            };
        },
    },
});
/**************************************/
if ($('div').is('#single')) {
    var buttonSingle = $("#single"),
            buttonMulti = $("#multi"),
            file;
}
if ($('div').is('#news-img')) {
    var buttonNewsImg = $("#news-img"),
            file;
}
if ($('div').is('#slide-img')) {
    var buttonSlideImg = $("#slide-img"),
            file;
}
if (buttonSingle) {
    ajaxUploadImg(buttonSingle);
}
if (buttonMulti) {
    ajaxUploadImg(buttonMulti);
}
if (buttonNewsImg) {
    ajaxUploadImg(buttonNewsImg);
}
if (buttonSlideImg) {
    ajaxUploadImg(buttonSlideImg);
}
function ajaxUploadImg(button) {
    return new AjaxUpload(button, {
        action: adminpath + button.data('url') + "?upload=1",
        data: {name: button.data('name')},
        name: button.data('name'),
        onSubmit: function (file, ext) {
            if (!(ext && /^(jpg|png|jpeg|gif)$/i.test(ext))) {
                alert('Ошибка! Разрешены только изображения');
                return false;
            }
            button.closest('.file-upload').find('.overlay').css({'display': 'block'});
        },
        onComplete: function (file, response) {
            setTimeout(function () {
                button.closest('.file-upload').find('.overlay').css({'display': 'none'});
                response = JSON.parse(response);
                $('.' + button.data('name')).append('<img src="/images/' + response.file + '" style="max-height: 150px;">');
            }, 1000);
        }
    });
}

///****************************************/
$('#btn_for_modification').on("click", function () {
    $(this).before(
            '\
<div class="modif">\
<div class="form-group">\
<input type="text" name="modification_title[]" required class="form-control modification_title" placeholder="Модификации товара">\
<div class="help-block with-errors mod"></div>\
</div>\
<div class="form-group form-group-price">\
<input type="text" name="modification_price[]" value="" class="form-control modification_price" placeholder="Цена модификации товара" pattern="^[0-9.]{1,}$" data-error="Допускаются цифры и десятичная точка">\
<div class="help-block with-errors mod"></div>\
</div>\
</div>\
'
            );
    $('form').validator('update');
});

$('#submit').on("click", function () {
    $('form').validator('update');
});
/**************************************/
$('.del-item').on('click', onClickDeleteItem);
$('.del-single-img').on('click', onClickDeleteSingleImg);
$('.del-news-img').on('click', onClickDeleteNewsImg);
$('.del-slide-img').on('click', onClickDeleteSlideImg);
function onClickDeleteItem() {
    deleteItem('/product/delete-gallery',$(this));// передаем контекст
}
function onClickDeleteSingleImg() {
    deleteItem('/product/delete-single-img',$(this));// передаем контекст
}
function onClickDeleteNewsImg() {
    deleteItem('/news/delete-news-img',$(this));// передаем контекст
}
function onClickDeleteSlideImg() {
    deleteItem('/slides/delete-slide-img',$(this));// передаем контекст
}

function deleteItem(url, $this) {
    var res = confirm("Подтвердите действие");
    if (!res) {
        return false;
    }
    var id = $this.data('id');// используем контекст
    var src = $this.data('src');
    $.ajax({
        url: adminpath + url,
        type: 'POST',
        data: {id: id, src: src},
        beforeSend: function () {
            $this.closest('.file-upload').find(".overlay").css({'display': 'block'});
        },
        success: function (res) {
            setTimeout(function () {
                $this.closest('.file-upload').find('.overlay').css({'display': 'none'});
                if (res == 1) {
                    $this.fadeOut();
                }
            }, 1000);
        },
        error: function () {
            setTimeout(function () {
                $this.closest('.file-upload').find('.overlay').css({'display': 'none'});
                alert("Ошибка!");
            }, 1000);
        }
    });
}
/*********************************/
$('#add_form').on('submit', function () {
    if (!isNumeric($('#category_id').val())) {
        alert("Выберите категорию/группу!");
        return false;
    }
});
function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}
/*********************************/