<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplenamespace:simplecomp.exam",
	".default",
	array(
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"CODE_PROPERTY" => "PRODUCER",
		"IBLOCK_ID_CLASSIFIER" => "7",
		"IBLOCK_ID_PRODUCT" => "2",
		"TEMPLATE_LINK_DETAIL" => "catalog_exam/#SECTION_ID#/#ELEMENT_CODE#"
	)
);?><br>
Text&nbsp;here....<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>