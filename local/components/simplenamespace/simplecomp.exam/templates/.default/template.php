<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<h3>Каталог</h3>
<ul>
	<?foreach($arResult['arNews'] as $news){?>
		<?
		$this->AddEditAction($news["ID"], $news["LINKS"]["ADD_LINK"], 'Добавить элемент');
		$this->AddEditAction($news["ID"], $news["LINKS"]["EDIT_LINK"], 'Редактировать элемент');
		$this->AddDeleteAction($news["ID"], $news["LINKS"]["DELETE_LINK"], 'Удалить элемент', array("CONFIRM" => 'Вы действительно хотите удилить элемент?'));
		?>
		<li id="<?=$this->GetEditAreaId($news["ID"]);?>">
			<?echo '<b>' . $news['NAME'] . '</b>' . ' - ' . $news['ACTIVE_FROM'] . ' (';
			foreach($news['arSectionProduct'] as $key => $section){
				if($key!=0) echo ', ';
				echo $section['NAME'];
			}
			echo ')';?>
			<ul>
				<?foreach($news['arProduct'] as $product){?>
					<li><?echo $product['NAME'] . ' - ' . $product['PROPERTY_PRICE_VALUE'] . ' - ' . $product['PROPERTY_MATERIAL_VALUE'] . ' - ' . $product['PROPERTY_ARTNUMBER_VALUE'];?></li>
				<?}?>
			</ul>
		</li>
	<?}?>
</ul>