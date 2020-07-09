<?
function CheckUserCount(){
    $date = date('d.m.Y H:i:s');
	$prevDate = COption::GetOptionString("main", "prev_date_start_agent"); //Дата и время предыдущего запуска агента
	if ($prevDate) {
        $arFilter = array("DATE_REGISTER_1" => $prevDate);
    }else{
        $arFilter = array();
    }

    $resultUsers = CUser::GetList($by = "DATE_REGISTER", $order = "ASC", $arFilter);
    $countUsers = $resultUsers->result->num_rows;

    if (!$prevDate) {
        $prevDate = $resultUsers->Fetch()["DATE_REGISTER"];
    }

    $diffTime = strtotime($date) - strtotime($prevDate);
    $countDays = round($diffTime/(24*60*60));

    $resultAdmins = CUser::GetList($by = "ID", $order = "ASC", array("GROUPS_ID" => 1));
    while($admin = $resultAdmins->fetch()){
    CEvent::Send(
            "NUMBER_REGISTERED_USERS",
            "s1",
            array(
                "EMAIL_TO" => $admin["EMAIL"],
                "COUNT" => $countUsers,
                "DAYS" => $countDays,
            ),
            "Y",
            "84"
        );
    }
    COption::SetOptionString("main", "prev_date_start_agent", $date);

    return 'CheckUserCount();';
}
?>