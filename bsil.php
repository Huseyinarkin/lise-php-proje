<?php
include("class.php");
session_start();
if(isset($_SESSION['kul'])&&isset($_GET['id']))
{


$cl=new cls();
$al=$cl->bcek($_GET['id']);
if($_SESSION['kul']==$al['kulid'])
{
$cl->dbag(true);
$id=intval($_GET['id']);
mysql_query("SET NAMES 'utf8'");
$sil=mysql_query("DELETE FROM baslik WHERE id=$id");
$cl->dbag(false);
if($sil)
{
	header("Location:hata.php?h=Başlık Başarıyla silindi.");
}
else
{
	header("Location:hata.php?h=Silme işlemi başarısız.");
}
}
else
	header("Location:hata.php?h=Yanlış İşlem");
}
else
	header("Location:giris.php");
?>