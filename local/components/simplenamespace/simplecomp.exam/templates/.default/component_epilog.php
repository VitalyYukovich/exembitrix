<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$contentPrices = 	'<div style="color:red; margin: 34px 15px 35px 15px">
						Минимальная цена: ' . $arResult['MIN_PRICE']  .
						'<br>Максимальная  цена: ' . $arResult['MAX_PRICE'] .
					'</div>';
$APPLICATION->AddViewContent('contentPrices', $contentPrices);

?>