<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
	$arComponentParameters = array(
		'PARAMETERS' => array(
			'IBLOCK_ID_PRODUCT' => array(
				"PARENT" => "DATA_SOURCE",
				'NAME' => 'ID инфоблока товаров',
				'TYPE' => 'STRING',
			),
			'IBLOCK_ID_NEWS' => array(
				"PARENT" => "DATA_SOURCE",
				'NAME' => 'ID инфоблока новостей',
				'TYPE' => 'STRING',
			),
			'CODE_USER_PROPERTY' => array(
				"PARENT" => "DATA_SOURCE",
				'NAME' => 'Код пользовательского свойства разделов каталога',
				'TYPE' => 'STRING'
			),
			"CACHE_TIME"  =>  array()

		)

	);

?>