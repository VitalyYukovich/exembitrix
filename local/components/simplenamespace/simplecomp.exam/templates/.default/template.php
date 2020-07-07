<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<h5><b>Авторы и новости</b></h5>
<ul>
<?foreach($arResult['users'] as $user){?>
	<li><?echo '[' . $user['ID'] . '] - ' . $user['LOGIN'];?></li>
	<ul>
		<?foreach($user['NEWS'] as $news){?>
			<li><?echo $news['NAME'] . ' - '. $news['DATE_ACTIVE_FROM'];?></li>
		<?}?>
	</ul>
<?}?>
</ul>
