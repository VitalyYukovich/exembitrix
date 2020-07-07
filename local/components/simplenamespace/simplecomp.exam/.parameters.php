<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	'PARAMETERS' => array(
		"IBLOCK_ID_NEWS" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => 'ID информационного блока с новостями',
			"TYPE" => "STRING",
		),
		"CODE_PROPETRY_AUTHOR" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => 'Код свойства информационного блока, в котором хранится Автор',
			"TYPE" => "STRING",
		),
		"CODE_USER_FIELD_TYPE_AUTHOR" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => 'Код пользовательского свойства пользователей, в котором хранится тип автора',
			"TYPE" => "STRING",
		),
		"CACHE_TIME"  =>  array(),
	)
);