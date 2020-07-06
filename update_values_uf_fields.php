<?
require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php";

global $USER_FIELD_MANAGER;
$USER_FIELD_MANAGER->Update('IBLOCK_2_SECTION',1,array('UF_NEWS_LINK' => array(1,3)));
$USER_FIELD_MANAGER->Update('IBLOCK_2_SECTION',2,array('UF_NEWS_LINK' => array(1,2)));
$USER_FIELD_MANAGER->Update('IBLOCK_2_SECTION',3,array('UF_NEWS_LINK' => array(2,3)));
$USER_FIELD_MANAGER->Update('IBLOCK_2_SECTION',4,array('UF_NEWS_LINK' => array(1,3)));


$aUserField = $USER_FIELD_MANAGER->GetUserFields('IBLOCK_2_SECTION',2); // array
echo '<pre>';
print_r($aUserField);
echo '</pre>';


require $_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_after.php";
?>