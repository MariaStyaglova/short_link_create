const isGoodUrl = urlString => {
    // объект регулярного выражения
    const urlPattern = new RegExp('^(https?:\\/\\/)?'   + // проверка протокола
    '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'  + // проверка имени домена
    '((\\d{1,3}\\.){3}\\d{1,3}))'                       + // проверка ip адреса (версия 4, не 6)
    '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'                   + // проверка порта и пути
    '(\\?[;&a-z\\d%_.~+=-]*)?'                          + // проверка параметров запроса
    '(\\#[-a-z\\d_]*)?$','i');                            // проверка хэша

    // сама проверка
    return !!urlPattern.test(urlString);
}


// Функция копирования данных из поля
function copyUrl(el) {
    var $tmp = $("<input>");
    $("body").append($tmp);
    $tmp.val($(el).text()).select();
    document.execCommand("copy");
    $tmp.remove();
}    

$(document).ready(function(){
	$('.smv-shortener__form .smv-shortener__url__content').keyup(function() {
        var empty = false;
        $('.smv-shortener__form .smv-shortener__url__content').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });
        if (empty) {
            $('.smv-shortener__btn_cut').attr('disabled', 'disabled');
			$('.smv-shortener__alert').css("display","none");
        } else {
            $('.smv-shortener__btn_cut').removeAttr('disabled');
        }
    });

	$(".smv-shortener__btn_copy").on("click", function() {
		copyUrl("#url-short");
		$(".smv-shortener__alert").fadeIn("slow").html("Ссылка скопирована");
	});

	$(document).on('submit','.smv-shortener__form', function(e) {
		e.preventDefault();
		let error = true;
		let urlLong =$(".smv-shortener__url__content").val();
		if(isGoodUrl(urlLong)){
			error = false;
		}
		if (!error) { 
			let form_data = new FormData(this);
			$.ajax({ 
				url: '/request.php', 
				dataType: 'text', 
				cache: false, 
				contentType: false, 
				processData: false, 
				data: form_data, 
				type: 'POST', 

			success: function (data) {
				let urlShortHref=$(".smv-shortener__link").attr("href");
				$(".smv-shortener__link").html(data).attr("href", urlShortHref+data);
				$('.smv-shortener__btn_copy').removeAttr('disabled');
				$(".smv-shortener__alert").css("display","none");
			} 
			});
		} else {
			$(".smv-shortener__link").html("");
			$(".smv-shortener__alert").fadeIn("slow").html("Введен некорректный URL");
			$('.smv-shortener__btn_copy').attr('disabled', 'disabled');
		}
	});
})