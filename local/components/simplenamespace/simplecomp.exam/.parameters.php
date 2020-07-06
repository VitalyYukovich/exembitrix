<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

	$arComponentParameters = array(
		'PARAMETERS' => array(
			"IBLOCK_ID_PRODUCT" => array(
				"PARENT" => "DATA_SOURCE",
				"NAME" => 'ID инфоблока с каталогом товаров',
				"TYPE" => "STRING",
			),
			"IBLOCK_ID_CLASSIFIER" => array(
				"PARENT" => "DATA_SOURCE",
				"NAME" => 'ID инфоблока с классификатором',
				"TYPE" => "STRING",
			),
			"TEMPLATE_LINK_DETAIL" => array(
				"PARENT" => "DATA_SOURCE",
				"NAME" => 'Шаблон ссылки на детальный просмотр товара',
				"TYPE" => "STRING",
				'DEFAULT' => '#SITE_DIR#/products/#IBLOCK_SECTION_ID#/#ID#/'
			),
			"CODE_PROPERTY" => array(
				"PARENT" => "DATA_SOURCE",
				"NAME" => 'Код свойства товара, в котором хранится привязка товара к классификатору',
				"TYPE" => "STRING",
			),
			"CACHE_TIME"  =>  array(),
		),
	);
?>