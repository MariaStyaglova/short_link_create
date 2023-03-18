<?include "redirect.php";?>
<!DOCTYPE html>
<html lang="ru" class="html">
    <head>
        <title>Сервис коротких ссылок</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
        <script src="libs/jquery.min.js"></script>
        <script src="js/script.js"></script>
    </head>
    <body class="bg-beige">
        <div class="smv-main_wrapper container">
            <div class="smv-main_container">
                <div class="smv-main">
                    <h1 class="smv-main__title">Сервис коротких ссылок</h1>
                    <p class="smv-main__text">Откажитесь от длинных URL-адресов. Копируйте короткие ссылки и отправляйте их своим клиентам</p>
                </div>
                <a href="/" class="btn btn-primary">Сбросить параметры</a>
                <div class="smv-shortener">
                    <form action="" method="POST" class="smv-shortener__form">
                        <div class="smv-shortener__url_wrapper">
                            <div class="smv-shortener__url smv-shortener__url_long">
                                <input class="smv-shortener__url__content" type="text" id="url" name="url" placeholder="Введите ссылку для сокращения" >
                            </div>
                            <button class="smv-shortener__btn smv-shortener__btn_cut" type="submit" disabled>
                                Сократить
                            </button>
                        </div>
                    </form>
                    <div class="smv-shortener__url_wrapper smv-shortener__url_short">
                        <p>Короткая ссылка:</p>
                        <a href="<?=$_SERVER['REQUEST_SCHEME']."://"?>" class="smv-shortener__link" id="url-short"></a>
                        <button class="smv-shortener__btn smv-shortener__btn_copy" disabled>Скопировать</button>
                        <p class="smv-shortener__alert">Ссылка скопирована</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>