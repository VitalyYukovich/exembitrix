<?
AddEventHandler('main', 'OnEpilog', array("MyHandler", "checkNonExistingPage"));

class MyHandler
{
    function checkNonExistingPage(){
        if (defined('ERROR_404') && ERROR_404 == 'Y') {
            global $APPLICATION;

            CEventLog::Add(
                array(
                    "SEVERITY"      => "INFO",
                    "AUDIT_TYPE_ID" => "ERROR_404",
                    "MODULE_ID"     => "main",
                    "DESCRIPTION"   => $_SERVER['DOCUMENT_ROOT'] . $APPLICATION->GetCurUri(),
                )
            );
        }
    }
}
?>