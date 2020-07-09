<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оценка производительности");
?>
<p>Cамая ресурсоемкая страница  - <a href ='/products/index.php'>/products/index.php</a>, среднее время загрузки этой страницы составляет - 4.56 сек.</p>
<p>Компонент который выполняет больше всего запросов: catalog.section, количество запросов - 9.</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>