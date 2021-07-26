
<?php
    include("header.php");
    if(@$_SESSION['kul']==null)
    {
	$yan=true;
	if(isset($_POST['kulad']))
	{			
		if($cl->giris($_POST['kulad'],$_POST['sifre'])){	
			$yan=true;
			$i=$cl->dcek($_SESSION['kul']);
			header("Location: profile.php?id=".$i['id']);
		}
		else
			$yan=false;
	}	
	}
	else
	{
		$i=$cl->dcek($_SESSION['kul']);
		header("Location: profile.php?id=".$i['id']);	
	}
?>

<form action="giris.php" method="post">

<div id="container" >
<div>
 	<br><br>
	<span>KULLANICI ADI</span><br>
	<input type="text" class="ss" name="kulad"><br><br>
	<span>ŞİFRE</span><br>
	<input type="password" name="sifre" class="ss"><br><br><br><br>
	<input type="submit" value="Giriş" ><br><br>
	<?php if(!$yan){echo "<font style='background-color:#333;padding:3px;color:#f00;border-radius:5px;'>Şifre veya Kullanıcı adı Hatalı</font>";} ?>
</div>
</div>
</form>
</body>
</html>


