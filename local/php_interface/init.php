<?

AddEventHandler("main", "OnBeforeProlog", array("MyHandlers", "MyOnBeforePrologHandler"));

class MyHandlers{
	function MyOnBeforePrologHandler(){
		global $APPLICATION;
		if(CModule::IncludeModule('iblock')){
			$result = CIBlockElement::GetList(array(), array('IBLOCK_ID'=>6, 'NAME' => $APPLICATION->getCurDir()), false, false, array('ID', 'NAME', 'PROPERTY_TITLE', 'PROPERTY_DESCRIPTION'));
			while($item = $result->Fetch()){
				$APPLICATION->SetPageProperty('title', $item['PROPERTY_TITLE_VALUE']);
				$APPLICATION->SetPageProperty('description', $item['PROPERTY_DESCRIPTION_VALUE']);
			}
		}
	}
}