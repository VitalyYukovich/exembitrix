<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplenamespace:simplecomp.exam",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CODE_PROPETRY_AUTHOR" => "AUTHOR",
		"CODE_USER_FIELD_TYPE_AUTHOR" => "UF_AUTHOR_TYPE",
		"IBLOCK_ID_NEWS" => "1"
	)
);?><br>
Text here....<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>