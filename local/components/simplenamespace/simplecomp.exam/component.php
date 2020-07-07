<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

function pr($var){
	echo '<pre>';
	print_r($var);
	echo '</pre>';
}
if($USER->IsAuthorized()){
	$arFilter = array('IBLOCK_ID' => $arParams['IBLOCK_ID_NEWS'], 'ACTIVE'=>'Y');
	$arSelect = array('ID', 'NAME');
	$result = CIBlockElement::GetList(array(), $arFilter, false, false, array());
	while($item = $result->GetNextElement()){
		$element = $item->GetFields();
		$arNews[$element['ID']] = $element;
		$arNews[$element['ID']]['PROPERTIES'] = $item->GetProperties();
	}


	$IdCurrentUser = $USER->GetID();
	global $USER_FIELD_MANAGER;
	$valueUserField = $USER_FIELD_MANAGER->GetUserFields('USER', $IdCurrentUser)[$arParams['CODE_USER_FIELD_TYPE_AUTHOR']]['VALUE'];


	$filter = array($arParams['CODE_USER_FIELD_TYPE_AUTHOR'] => $valueUserField);
	$resultUsers = CUser::GetList(($by = "NAME"), ($order = "desc"), $filter);
	while($user = $resultUsers->fetch()){
		$users[$user['ID']] = $user;
	}


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
		$columnNews = array_column($arResult['users'], 'NEWS');
		$rowNews = array();
		foreach($columnNews as $news){
			$rowNews = array_merge($rowNews, $news);
		}

		$columnIdNews = array_column($rowNews, 'ID');
		$uniqueIdNews = array_unique($columnIdNews);
		$countUniqueNews = count($uniqueIdNews);
	}
}

$count = isset($countUniqueNews)?$countUniqueNews:0;
$APPLICATION->SetTitle('Новостей '. $count);
$this->IncludeComponentTemplate();

?>