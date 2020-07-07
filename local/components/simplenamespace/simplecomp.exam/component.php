<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(CModule::includeModule('iblock')){
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_NEWS'], 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME', 'ACTIVE_FROM');
	$resultNews = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($element = $resultNews->GetNextElement()){
		$fieldsElement=$element->GetFields();

		$arButtons = CIBlock::GetPanelButtons(
            $fieldsElement["IBLOCK_ID"],
            $fieldsElement["ID"],
            0,
            array("SECTION_BUTTONS"=>false, "SESSID"=>false)
        );
		$arItem["ADD_LINK"] = $arButtons["edit"]["add_element"]["ACTION_URL"];
        $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
        $fieldsElement["LINKS"] = $arItem;

		$arNews[$fieldsElement['ID']] = $fieldsElement;
	}

	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_PRODUCT'], 'ACTIVE' => 'Y');
	$arSelect = array('ID', 'NAME', 'IBLOCK_SECTION_ID', 'PROPERTY_MATERIAL', 'PROPERTY_ARTNUMBER', 'PROPERTY_PRICE');
	$resultProduct = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
	while($element = $resultProduct->GetNextElement()){
		$fieldsElement=$element->GetFields();
		$arProduct[$fieldsElement['ID']] = $fieldsElement;
	}
	global $USER_FIELD_MANAGER;
	$code = $arParams['CODE_USER_PROPERTY'];
	$resultSectionProduct = CIBlockSection::GetList(array(), array(), false, array('ID', 'NAME'));
	while($section = $resultSectionProduct->GetNext()){
		$arSection[$section['ID']] = $section;
		$arSection[$section['ID']][$code] = $USER_FIELD_MANAGER->GetUserFields('IBLOCK_'.$arParams['IBLOCK_ID_PRODUCT'].'_SECTION',$section['ID'])[$code]['VALUE'];
	}
	$countProduct = count($arProduct);
	//Привяжем товары к новостям
	foreach($arNews as $key => $news){
		$arNews[$key]['arProduct'] = array();
		foreach($arSection as $section){
			if(in_array($news['ID'], $section[$code])){
				$arNews[$key]['arSectionProduct'][] = $section;
				foreach($arProduct as $product){
					if($product['IBLOCK_SECTION_ID'] == $section['ID']){
						$arNews[$key]['arProduct'][] = $product;
					}
				}
			}
		}
	}
	$arResult['arNews'] = $arNews;
	$this->IncludeComponentTemplate();
}
$APPLICATION->SetTitle('В каталоге товаров представлено товаров: '. $countProduct);
?>