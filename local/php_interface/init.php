<?
define("IBLOCK_ID", 2);
define("SHOW_COUNTER", 2);

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyHandler", "OnBeforeIBlockElementUpdateHandler"));

class MyHandler
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arParams)
    {
        if(($arParams["ACTIVE"] == "N") && ($arParams["IBLOCK_ID"] == IBLOCK_ID)){
            $r = CIBlockElement::GetByID($arParams['ID']);
            if($res = $r -> Fetch()){
                $show_counter = $res['SHOW_COUNTER'];
            }
            if($show_counter > SHOW_COUNTER){
                global $APPLICATION;
                $APPLICATION->throwException('Товар невозможно деактивировать, у него [' . $show_counter . ']');
                return false;
            }
        }
    }
}
?>