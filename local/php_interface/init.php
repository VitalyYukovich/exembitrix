<?

AddEventHandler("main", "OnBuildGlobalMenu", array("MyHandler", "OnBuildGlobalMenuHandler"));

class MyHandler{
	function OnBuildGlobalMenuHandler(&$aGlobalMenu, &$aModuleMenu){
        global $USER;
        if($USER->IsAdmin())
      		return;

        $isManager = false;
        $userGroups = \CUser::GetUserGroupList($USER->GetId());
        $contentEditerGroupID = \CGroup::GetList ($by = "c_sort", $order = "asc", array("STRING_ID" => 'content_editor'))->Fetch()['ID'];
        while ($group = $userGroups->Fetch()) {
            if ($group['GROUP_ID'] == $contentEditerGroupID) {
                $isManager = true;
                break;
            }
        }
        if ($isManager) {
            foreach ($aModuleMenu as $item) {
                if ($item['items_id'] == 'menu_iblock_/news') {
                    $aModuleMenu = [$item];
                    foreach ($item['items'] as $subItem) {
                        if ($subItem['items_id'] == 'menu_iblock_/news/1') {
                            $aModuleMenu[0]['items'] = [$subItem];
                            break;
                        }
                    }
                    break;
                }
            }
            $aGlobalMenu = ['global_menu_content' => $aGlobalMenu['global_menu_content']];
        }
    }
}