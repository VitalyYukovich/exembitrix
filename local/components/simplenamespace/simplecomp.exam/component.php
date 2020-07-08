<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$IdCurrentUser = $USER->GetID();
if($this->startResultCache(false, array($IdCurrentUser))){
	//Проверяем авторизацию
	if($USER->IsAuthorized()){

		//Выборка элементов из иб указанного в параметрах (новостей)
		$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_NEWS'], 'ACTIVE'=>'Y');
		$arSelect = array('ID', 'NAME');
		$result = CIBlockElement::GetList(array(), $arFilter, false, false, array());
		while($item = $result->GetNextElement()){
			$element = $item->GetFields();
			$arNews[$element['ID']] = $element;
			$arNews[$element['ID']]['PROPERTIES'] = $item->GetProperties();
		}

		//Выборка пользователей у которых значение пользовательского поля, равно значению этого поля у текущего пользователя
		global $USER_FIELD_MANAGER;
		$valueUserField = $USER_FIELD_MANAGER->GetUserFields('USER', $IdCurrentUser)[$arParams['CODE_USER_FIELD_TYPE_AUTHOR']]['VALUE'];


		$filter = array($arParams['CODE_USER_FIELD_TYPE_AUTHOR'] => $valueUserField);
		$resultUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
		while($user = $resultUsers->fetch()){
			$users[$user['ID']] = $user;
		}

		//формирование массива пользователей и соответствующих им новостей
		$arResult['users'] = array();
		foreach($users as $user){
			if($IdCurrentUser != $user['ID']){
				$arResult['users'][$user['ID']] = array('ID' => $user['ID'], 'LOGIN'=> $user['LOGIN'], 'NEWS' => array());
				foreach($arNews as $news){
					if(in_array($IdCurrentUser, $news['PROPERTIES'][$arParams['CODE_PROPETRY_AUTHOR']]['VALUE'])){
						continue;
					}
					foreach($news['PROPERTIES'][$arParams['CODE_PROPETRY_AUTHOR']]['VALUE'] as $value)
						if($value ==  $user['ID']){
							$arResult['users'][$user['ID']]['NEWS'][$news['ID']] = array('ID' => $news['ID'], 'NAME' => $news['NAME'], 'DATE_ACTIVE_FROM' => $news['DATE_ACTIVE_FROM']);
							break;
						}
				}
			}
		}


		//Вычисление количества уникальных новостей, которые будут выведены на страницу
		$columnNews = array_column($arResult['users'], 'NEWS');
		$rowNews = array();
		foreach($columnNews as $news){
			$rowNews = array_merge($rowNews, $news);
		}

		$columnIdNews = array_column($rowNews, 'ID');
		$uniqueIdNews = array_unique($columnIdNews);
		$countUniqueNews = count($uniqueIdNews);
	}
$this->IncludeComponentTemplate();
}

$count = isset($countUniqueNews)?$countUniqueNews:0;
$APPLICATION->SetTitle('Новостей '. $count);

?>