<?php
include("header.php");
if(isset($_SESSION['kul'])&&isset($_GET['id']))
{
	$cl=new cls();
	$al=$cl->bcek($_GET['id']);
	if($_SESSION['kul']==$al['kulid'])
	{		
		$fy="action=\"bdzn.php?id=".$_GET['id']."\" ";
		?>
		<form <?php echo($fy); ?> method="post">
<div class="kd">
	<table >
		<caption>Konu Düzenle</caption>
		<tr>
			<td>Başlık:</td>
			<td><input type="text" maxlength="20" name="bas" value="<?php echo($al['baslik']); ?>" style="width: 300px;"></td>			
		</tr>
		<tr>
			<td>İçerik:</td>
			<td><textarea class="tarea" name="entry"><?php echo($al['entry']); ?></textarea></td>			
		</tr>
		<tr>
			<td colspan="2">
			<?php

if(@$_POST['bas']!=null && @$_POST['entry']!=null)
{
	$cl->bupdate($_POST['bas'],$_POST['entry'],$_GET['id']);
	header("Location: konu.php?id=".$_GET['id']);	
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

		<?php
	}
	else
		header("Location:hata.php?h=Yanlış İşlem");
}
else
	header("Location:giris.php");
?>

</body>
</html>