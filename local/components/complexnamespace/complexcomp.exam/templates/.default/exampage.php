<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//Значения переменных:
foreach (range(1,2) as $num)
	echo $arResult['ALIASES']['PARAM' . $num] . ' = ' . $arResult['VARIABLES']['PARAM'  . $num] . '<br>';
?>