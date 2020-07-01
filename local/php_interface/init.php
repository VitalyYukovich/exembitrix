<?
AddEventHandler("main", "OnBeforeEventAdd", array("MyHandler", "OnBeforeEventAddHandler"));

class MyHandler
{
	function OnBeforeEventAddHandler(&$event, &$lid, &$arFields){
        if($event == 'FEEDBACK_FORM'){
            global $USER;
            if($USER->isAuthorized())
                $author = "Пользователь авторизован: ".$USER->GetID()." (".$USER->GetLogin().") ".$USER->GetFullName();
            else
                $author = 'Пользователь не авторизован';
            $arFields['AUTHOR']  = $author . ', данные из формы: ' . $arFields['AUTHOR'];
            CEventLog::Add(array(
                "SEVERITY" => "INFO",
                "AUDIT_TYPE_ID" => 'CHANGE_MAIL_CONTEXT',
                "MODULE_ID" => "main",
                "DESCRIPTION" => 'Замена данных в отсылаемом письме - ' . $arFields['AUTHOR'] ,
                )
            );
        }
    }
}
?>