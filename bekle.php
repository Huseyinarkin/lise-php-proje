<?php
include("header.php");
?>
<form action="bekle.php" method="post">
<div class="kd">
	<table >
		<caption>Konu Ekle</caption>
		<tr>
			<td>Başlık:</td>
			<td><input type="text" maxlength="20" name="bas" style="width: 300px;"></td>			
		</tr>
		<tr>
			<td>İçerik:</td>
			<td><textarea class="tarea" name="entry"></textarea></td>			
		</tr>
		<tr>
			<td colspan="2">
			<?php

if(@$_POST['bas']!=null && @$_POST['entry']!=null)
{
	$i=$cl->bekle($_SESSION['kul'],$_POST['bas'],$_POST['entry']);
	header("Location: konu.php?id=$i");	
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