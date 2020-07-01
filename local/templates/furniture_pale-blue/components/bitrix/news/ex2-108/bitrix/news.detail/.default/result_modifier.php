<?if($arParams['ID_IBLOCK_FOR_CANONICAL']){
	$arFilter = array('IBLOCK_ID'=>$arParams['ID_IBLOCK_FOR_CANONICAL'],'PROPERTY_NEWS' => $arResult['ID']);
	$arSelect = array('ID','IBLOCK_ID','NAME','PROPERTY_NEWS');
	$result = CIBlockElement::GetList(array(),$arFilter,false,false,$arSelect);
	if($resultFetch = $result->Fetch()){
		$arResult['ID_IBLOCK_FOR_CANONICAL'] = $resultFetch;
	}
	$this->__component->SetResultCacheKeys(array('ID_IBLOCK_FOR_CANONICAL'));
}
?>