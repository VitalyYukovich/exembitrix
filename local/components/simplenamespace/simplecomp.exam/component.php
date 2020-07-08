<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $CACHE_MANAGER;
define("IBLOCK_ID", 3);

if($this->startResultCache(false, array($USER->GetGroups()))){
	if(CModule::includeModule('iblock')){

		$CACHE_MANAGER->RegisterTag('iblock_id_' . IBLOCK_ID);

		$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_CLASSIFIER'], 'CHECK_PERMISSIONS' => 'Y','ACTIVE' => 'Y');
		$arSelect = array('ID', 'NAME');
		$resultClassifier = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		while($element = $resultClassifier->GetNextElement()){
			$fieldsElement=$element->GetFields();
			$arClassifier[$fieldsElement['ID']] = $fieldsElement;
		}
		$arIdClassifier = array_column($arClassifier, 'ID');

		$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_PRODUCT'], 'CHECK_PERMISSIONS' => 'Y','ACTIVE' => 'Y', 'PROPERTY_'.$arParams['CODE_PROPERTY'] => $arIdClassifier);
		$arSelect = array('ID', 'IBLOCK_SECTION_ID', 'NAME', 'PROPERTY_MATERIAL', 'PROPERTY_ARTNUMBER', 'PROPERTY_PRICE');
		$resultProduct = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
		while($element = $resultProduct->GetNextElement()){
			$fieldsElement=$element->GetFields();
			$prop = CIBlockElement::GetProperty($arParams['IBLOCK_ID_PRODUCT'], $fieldsElement['ID'], Array("sort"=>"asc"), Array("CODE"=>$arParams['CODE_PROPERTY']));
			$fieldsElement['PROPERTY_PRODUCER'] = array();
			while ($item = $prop->GetNext())
		    {
		        $fieldsElement['PROPERTY_PRODUCER'][] = $item['VALUE'];
		    }
			$arProduct[$fieldsElement['ID']] = $fieldsElement;
		}

		foreach ($arClassifier as $key => $classifier) {
			$arClassifier[$key] = array('ID' => $classifier['ID'], 'NAME' => $classifier['NAME'], 'PRODUCT' => array());
			foreach ($arProduct as $product) {
				if(in_array($classifier['ID'], $product['PROPERTY_PRODUCER'])){
					$arClassifier[$key]['PRODUCT'][$product['ID']] = $product;
				}
			}
		}
		$arResult['arClassifier'] = $arClassifier;
		$arResult['countClassifier'] = count($arClassifier);

		$this->IncludeComponentTemplate();
	}
}
$APPLICATION->SetTitle('Разделов: '. $arResult['countClassifier']);
?>