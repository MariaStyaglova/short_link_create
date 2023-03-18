# short_link_create
Генератор коротких URL

Загружаем архив с Github и распаковываем в нужную директорию на ПК. 
Заходим в PhpMyAdmin, создаем пользователя и базу данных для работы. Кодировка utf8mb4_general_ci.
Выполняем настройки в папке config.
В файле connect.php меняем значения свойств host,userName,password,dbName на свои, где
$host - хост
$userName - имя пользователя базы данных
$password - пароль пользователя
$dbName - имя базы данных.
Возвращаемся в PhpMyAdmin и в базе данных создаем таблицу "urls" с тремя полями:
id тим int, ставим галочку AUTO_INCREMENT имя индекса PRIMARY
url тип text
short тип varchar длинна 10
Сохраняем.
Если хотите изменить названия таблицы и полей, то для дальнейшей работы необходимо перейти в папку config файл request.php и заменить свойства на свои:
private $tableName = "urls";
private $url = "url";
private $short = "short";
Загружаем файлы модуля в корневую папку вашего проекта.
Модуль написан локально, использовался Openserver. Настройки Apache_2.4-PHP_7.2-7.4
PHP 7.4 MySQL-8.0
