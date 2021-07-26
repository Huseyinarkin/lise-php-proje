<!DOCTYPE html>
<html>
<head>
	<title>İndex</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script type="text/javascript" scr="js.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<div class="header">

<table>

	<?php
 		include("class.php");
 		session_start();
 		$cl=new cls();
 		$alt=false;
 		if(@$_SESSION['kul']!="")
 		{
 			$isim=$cl->dcek($_SESSION['kul']);
 			echo "<tr><td><a href=\"profile.php?id=".$isim['id']."\" >".$isim['kulad']."</a></td></tr>";
 			echo "<tr><td><a href=\"bekle.php\">Konu Ekle</a></tr></td>";
 			$alt=true;
 		}
		 else
		{			
			echo "<tr><td><a href='giris.php'>Giriş</a></td></tr>";
		}
	?>
	
	<tr>
		<td><a href="uyeler.php">Üyeler</a></td>
	</tr>
	<tr>
		<td><a href="baslik.php">Başlıklar</a></td>
	</tr>
	<tr>
	<?php
		if($alt)
		
			echo "<td><a href='cik.php' >Çıkış</a></td>";
		else
			echo "<td><a href='kayit.php' >Kayit Ol</a></td>"; 


	?>
		
	</tr>
</table>
</div>