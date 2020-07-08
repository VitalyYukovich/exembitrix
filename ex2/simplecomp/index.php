<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplenamespace:simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "36000",
		"CACHE_TYPE" => "A",
		"CODE_USER_PROPERTY" => "UF_NEWS_LINK",
		"IBLOCK_ID_NEWS" => "1",
		"IBLOCK_ID_PRODUCT" => "2"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>