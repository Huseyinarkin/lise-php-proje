<?php
include("header.php");
if(isset($_SESSION['kul']))
{
	$y=$cl->dcek($_SESSION['kul']);
?>
<form action="kuldzn.php" method="post">
<div class="kd">
	<table >
		<caption>Güncelle</caption>
		<tr>
			<td>Ad:</td>
			<td><input type="text" maxlength="20" name="ad" value="<?php echo($y['ad']); ?>"></td>			
		</tr>
		<tr>
			<td>Soyad:</td>
			<td><input type="text" maxlength="20" name="sad" value="<?php echo($y['soyad']); ?>"></td>			
		</tr>
		<tr>
			<td>Kullanıcı Adı:</td>
			<td><input type="text" maxlength="20" name="kulad" value="<?php echo($y['kulad']); ?>"></td>			
		</tr>
		<tr>
			<td>Sifre</td>
			<td><input type="text" maxlength="20" name="sifre" value="<?php echo($y['sifre']); ?>"></td>			
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" maxlength="20" name="email" value="<?php echo($y['email']); ?>"></td>			
		</tr>
		<tr>
			<td>Cinsiyet:</td>
			<?php
			$ck="";
			$ce="";
			if($y['cins']=="Erkek")
				$ce="checked";
			else
				$ck="checked";
			?>
			<td>Erkek<input type="radio" name="c" value="Erkek" <?php echo($ce); ?> >Kadın<input type="radio" name="c" value="Kadın" <?php echo($ck); ?>></td>
		</tr>
		<tr>
			<td colspan="2">
			<?php

if(@$_POST['ad']!=null && @$_POST['sad']!=null && @$_POST['kulad']!=null && @$_POST['sifre']!=null && @$_POST['sifre']!=null && @$_POST['email']!=null)
{
	if($cl->k_c($_POST['kulad'],$_SESSION['kul']))
	{
		header("Location: kuldzn.php?r=red&y=Bu kullanıcı adı zaten var");
	}
	else
	{
		$cl->guncelle($_POST['ad'],$_POST['sad'],$_POST['kulad'],$_POST['sifre'],$_POST['email'],$_POST['c'],$_SESSION['kul']);
		header("Location: kuldzn.php?r=green&y=İşlem Başarılı");
	}	
}
else
{
	if(isset($_GET['y'])&&isset($_GET['r']))
	{
		echo "<font color='".$_GET['r'] ."' >".$_GET['y']."</font>";
	}
	else
		echo "<font color=black>Tam Doldurunuz.</font>";
}
?>
			<input type="submit" value="Güncelle" style="float: right;"></td>
		</tr>		
	</table>
	<table style="margin-top: 5px;">
		<tr>
			<td style="text-align: center;"><a href="profile.php?id=<?php echo($_SESSION['kul']); ?>" class="sub">PROFİLE</a></td>
		</tr>
	</table>
</div>
</form>
<?php
}
?>
</body>
</html>