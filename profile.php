<?php
include("header.php");

if(isset($_POST['sil']))
	echo "sil";


$yonet=false;
if(isset($_GET['id']))
{
	if($_GET['id']==@$_SESSION['kul'])
	{
		$yonet=true;
	}
	$veri=$cl->dcek($_GET['id']);
}
else
	header("Location: hata.php?h=Böyle Bir Kullanıcı yok");

 ?>
 
<div class="psag" style="margin-bottom: 5px;">
	<table>
		<CAPTION>PROFİL BİLGİLERİ</CAPTION>
		<tr>
			<th>Ad:</th><td><?php echo($veri['ad']); ?></td>
		</tr>
		<tr>
			<th>Soyad:</th><td><?php echo($veri['soyad']); ?></td>
		</tr>
		<tr>
			<th>Kul. Adı:</th><td><?php echo($veri['kulad']); ?></td>
		</tr>
		<tr>
			<th>Cinsiyet:</th><td><?php echo($veri['cins']); ?></td>
		</tr>
		<tr>
			<th>Email:</th><td><?php echo($veri['email']); ?></td>
		</tr>
	</table>
	<?php
	
		if($yonet)
		{			
			?>		    
			 <table>
			 	<CAPTION>AYARLAR</CAPTION>
			 	<tr>
			 		<th><a href="kuldzn.php" class="sub">Düzenle</a></th>
			 		<th><a href="kulsil.php" class="sub">Sil</a></th>
			 	</tr>
			 </table>		 
		<?php
		}
	?>
</div>
<div class="psag" style="text-align: center;margin-left: 2%;">
<span style="color:#111;font-size:215%;">Başlıklar</span>
<hr>
<?php


if(isset($_GET['id']))
{	
	$cl->dbag(true);
	mysql_query("SET NAMES 'utf8'");
	$id=intval($_GET['id']);
	$ucek=mysql_query("select * from baslik where kulid=$id ");
	
	if(mysql_num_rows($ucek)>0)
	{
	while ($y=mysql_fetch_array($ucek)) {
?>

<div class="uu" style="width: 90%;">
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
		
	}
	else{
		echo("<font style=\"color:#900;\" >KULLANCI BAŞLIK GİRMEMİŞ</font>");
	}


	$cl->dbag(false);
}
?>
</div>
</body>
</html>