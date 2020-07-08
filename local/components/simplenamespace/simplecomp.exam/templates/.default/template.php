<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

	$arTemplateLinkDetail = explode('/', $arParams['TEMPLATE_LINK_DETAIL']);
	array_shift($arTemplateLinkDetail);
	echo 'Метка времени: ' . time();
?>
	<h3><b>Каталог:</b></h3>

	<ul>
	<?foreach($arResult['arClassifier'] as $classifier){?>
		<li><b><?echo $classifier['NAME'];?></b></li>
		<ul>
			<?foreach($classifier['PRODUCT'] as $product){
				$linkDetail = $arTemplateLinkDetail[0] . '/' . $product[trim($arTemplateLinkDetail[1], '#')] . '/' . $product[trim($arTemplateLinkDetail[2], '#')] . '/';
				?>
				<li><?echo $product['NAME'] . ' - ' . $product['PROPERTY_PRICE_VALUE'] . ' - ' . $product['PROPERTY_MATERIAL_VALUE'] . ' - ' . $product['PROPERTY_ARTNUMBER_VALUE'] . ' - ' . $linkDetail;
				?></li>
			<?}?>
		</ul>
	<?}?>
	<ul>
<??>