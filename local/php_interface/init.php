<?
define("IBLOCK_ID", 3);

AddEventHandler("iblock", "OnBeforeIBlockElementUpdate", Array("MyHandler", "OnBeforeIBlockElementUpdateHandler"));

class MyHandler
{
    // создаем обработчик события "OnBeforeIBlockElementUpdate"
    function OnBeforeIBlockElementUpdateHandler(&$arParams)
    {
        if($arParams["IBLOCK_ID"] == IBLOCK_ID){
            global $CACHE_MANAGER;
            $CACHE_MANAGER->ClearByTag('iblock_id_' . IBLOCK_ID);
        }
    }
}
?>