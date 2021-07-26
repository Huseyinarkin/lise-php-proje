<?php
include("header.php");
?>
<form action="baslik.php" method="post">
<div class="ara">
	<span>Ara:</span>
	<input type="text" name="ara" value="<?php if(isset($_POST['ara'])){ echo($_POST['ara']); }?>">
	<input type="submit" name="b">
<?php
if(isset($_SESSION['kul'])){
?>
<div style="float: right;">
	<span style="padding: 0;color: #900;">Konu:</span>
	<a href="bekle.php" class="sub" style="margin: 0;">Ekle</a>	
</div>
<?php } ?>
</div>
</form>
<?php
$cl->dbag(true);
mysql_query("SET NAMES 'utf8'");
if(isset($_POST['b'])&&isset($_POST['ara']))
{
	$anahtar=$_POST['ara'];
	 $ucek=mysql_query("select * from baslik where kulad like '%$anahtar%' or baslik like '%$anahtar%' or entry like '%$anahtar%'");
}
else
{
	$ucek=mysql_query("select * from baslik");
}
while ($y=mysql_fetch_array($ucek)) {
?>

<div class="uu">
<a <?php echo("href=\"konu.php?id=".$y['id']."\""); ?> class="anor">
	<span>
		Git
	</span>
	<ul>
		<li>Konu: <b><?php echo($y['baslik']); ?></b></li>
		<li>Yazar:<b> <?php echo($y['kulad']); ?></b></li>		
	</ul>
	</a>
</div>

<?php
}


$cl->dbag(false);
?>
</body>
</html>