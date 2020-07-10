<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
	<h3><b>Каталог:</b></h3>

	<ul>
	<?foreach($arResult['arClassifier'] as $classifier){?>
		<li><b><?echo $classifier['NAME'];?></b></li>
		<ul>
			<?foreach($classifier['PRODUCT'] as $product){?>
				<li><?echo $product['NAME'] . ' - ' . $product['PROPERTY_PRICE_VALUE'] . ' - ' . $product['PROPERTY_MATERIAL_VALUE'] . ' - ' . $product['PROPERTY_ARTNUMBER_VALUE'] . ' (' . $product['DETAIL_PAGE_URL'] . '.php)';
				?></li>
			<?}?>
		</ul>
	<?}?>
	<ul>
<??>