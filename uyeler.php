<?php
include("header.php");
?>
<form action="uyeler.php" method="post">
<div class="ara">
	<span>Ara:</span>
	<input type="text" name="ara" value="<?php if(isset($_POST['ara'])){ echo($_POST['ara']); }?>">
	<input type="submit" name="b">
</div>
</form>
<?php
$cl->dbag(true);
mysql_query("SET NAMES 'utf8'");
if(isset($_POST['b'])&&isset($_POST['ara']))
{
	$anahtar=$_POST['ara'];
	 $ucek=mysql_query("select * from uye where ad like '%$anahtar%' or soyad like '%$anahtar%' or kulad like '%$anahtar%' or email like '%$anahtar%' ");
}
else
{
	$ucek=mysql_query("select * from uye");
}
while ($y=mysql_fetch_array($ucek)) {
?>

<div class="uu">
<a <?php echo("href=\"profile.php?id=".$y['id']."\""); ?> class="anor">
	<span>
		Git
	</span>
	<ul>
		<li><b><?php echo($y['kulad']); ?></b></li>
		<li><?php echo($y['ad']." ".$y['soyad']); ?></li>		
	</ul>
	</a>
</div>
<?php
}

$cl->dbag(false);
?>
</body>
</html>