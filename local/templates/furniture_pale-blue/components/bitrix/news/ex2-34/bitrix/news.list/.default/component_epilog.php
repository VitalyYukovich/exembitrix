<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if($arParams["SHOW_SPECIALDATE"] == "Y")
{
	$APPLICATION->SetPageProperty("specialdate", $arResult["ITEMS_DATE_NOW"]);
}
?>