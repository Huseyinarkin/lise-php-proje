<?php
include("class.php");
session_start();
if(isset($_SESSION['kul']))
{

$cl=new cls();

$cl->dbag(true);
$id=intval($_SESSION['kul']);
mysql_query("SET NAMES 'utf8'");
$sil=mysql_query("DELETE FROM uye WHERE id=$id");
mysql_query("DELETE FROM baslik WHERE kulid=$id");
$cl->dbag(false);
if($sil)
{	
	unset($_SESSION['kul']);
	session_destroy();
	header("Location:hata.php?h=Hesabınız Başarıyla silindi.");
}
else
{
	header("Location:hata.php?h=Silme işlemi başarısız.");
}

}
else
	header("Location:giris.php");
?>