<?php
include("header.php");
?>
<form action="kayit.php" method="post">
<div class="kd">
	<table >
		<caption>Kayıt Formu</caption>
		<tr>
			<td>Ad:</td>
			<td><input type="text" maxlength="20" name="ad"></td>			
		</tr>
		<tr>
			<td>Soyad:</td>
			<td><input type="text" maxlength="20" name="sad"></td>			
		</tr>
		<tr>
			<td>Kullanıcı Adı:</td>
			<td><input type="text" maxlength="20" name="kulad"></td>			
		</tr>
		<tr>
			<td>Sifre</td>
			<td><input type="password" maxlength="20" name="sifre"></td>			
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" maxlength="20" name="email"></td>			
		</tr>
		<tr>
			<td>Cinsiyet:</td>
			<td>Erkek<input type="radio" name="c" value="Erkek" checked >Kadın<input type="radio" name="c" value="Kadın"></td>
		</tr>
		<tr>
			<td colspan="2">
			<?php

if(@$_POST['ad']!=null && @$_POST['sad']!=null && @$_POST['kulad']!=null && @$_POST['sifre']!=null && @$_POST['sifre']!=null && @$_POST['email']!=null)
{
		if($cl->k_c($_POST['kulad'],$_SESSION['kul']))
	{
		header("Location: kayit.php?r=red&y=Bu kullanıcı adı zaten var");
	}
		else
	{
		$cl->kulkayit($_POST['ad'],$_POST['sad'],$_POST['kulad'],$_POST['sifre'],$_POST['email'],$_POST['c']);
		header("Location: kayit.php?r=green&y=İşlem Başarılı");
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
			<input type="submit" value="Gönder" style="float: right;"></td>
		</tr>
	</table>
</div>
</form>
</body>
</html>