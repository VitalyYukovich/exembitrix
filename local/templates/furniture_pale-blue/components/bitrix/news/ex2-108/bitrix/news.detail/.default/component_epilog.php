<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if(isset($arParams['ID_IBLOCK_FOR_CANONICAL'])){
      $APPLICATION->SetPageProperty("canonical", $arResult['ID_IBLOCK_FOR_CANONICAL']['NAME']);
}
?>