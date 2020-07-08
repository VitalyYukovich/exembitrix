<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arResult['MIN_PRICE'] = $arResult['MAX_PRICE'] = current(current($arResult['arNews'])['arProduct'])['PROPERTY_PRICE_VALUE']; //минимальная и максимальная цена равна цене первого товара в списке
foreach($arResult['arNews'] as $news){
	foreach($news['arProduct'] as $product){
		if($arResult['MIN_PRICE']  > $product['PROPERTY_PRICE_VALUE'])
			$arResult['MIN_PRICE']  = $product['PROPERTY_PRICE_VALUE'];
		if($arResult['MAX_PRICE'] < $product['PROPERTY_PRICE_VALUE'])
			$arResult['MAX_PRICE'] = $product['PROPERTY_PRICE_VALUE'];
	}
}
$this->__component->SetResultCacheKeys(['MIN_PRICE', 'MAX_PRICE']);