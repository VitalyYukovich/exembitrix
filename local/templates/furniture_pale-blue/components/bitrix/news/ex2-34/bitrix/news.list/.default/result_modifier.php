<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($arParams["SHOW_SPECIALDATE"] == "Y")
{
	$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM");
	$arFilter = Array("IBLOCK_ID"=>$arParams["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" =>  $arResult["ELEMENTS"][0]);
	$dbresult = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	$arResult["ITEMS_DATE_NOW"] = "";
	while($result = $dbresult->GetNext())
	{
		$arResult["ITEMS_DATE_NOW"] = $result["DATE_ACTIVE_FROM"];
	}
	$this->getComponent()->SetResultCacheKeys(array("ITEMS_DATE_NOW"));
}
?>

