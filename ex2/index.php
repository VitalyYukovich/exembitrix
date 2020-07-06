<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Экзамен2");
?><?$APPLICATION->IncludeComponent(
	"simplenamespace:simplecomp.exam", 
	".default", 
	array(
		"CACHE_TIME" => "10000000",
		"CACHE_TYPE" => "A",
		"CODE_USER_PROPERTY" => "UF_NEWS_LINK",
		"IBLOCK_ID_NEWS" => "1",
		"IBLOCK_ID_PRODUCT" => "2",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?><br>
Text here....<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>