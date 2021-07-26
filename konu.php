<?php
include("header.php");


if(isset($_GET['id']))
{
	$veri=$cl->bcek($_GET['id']);
}
else
	header("Location: hata.php?h=Böyle Bir Başlık Yok");

?>

<div class="konu">
	<table>
		<CAPTION><?php echo($veri['baslik']) ?></CAPTION>
		<tr>
			<td><?php echo($veri['entry']) ?></td>				
		</tr>
		<tr>
			<td class="yazar">Tarih:<b><?php echo(date("d/M/Y",$veri['tarih'])) ?></b>&nbsp;&nbsp;&nbsp;Yazar:<b style="color: #000;"><?php echo($veri['kulad']) ?></b></td>
		</tr>
		<?php
		if(isset($_SESSION['kul']))
		{		
			if($veri['kulid']==$_SESSION['kul'])
			{
				?>				
				<tr>
					<td class="yazar" style="text-align: left;">
						<a href="bdzn.php?id=<?php echo($veri['id']) ?>" class="sub" style="margin:0;padding: 1px 3px;">Düzenle</a>
			 			<a href="bsil.php?id=<?php echo($veri['id']) ?>" class="sub" style="margin:0;padding: 1px 3px;" >Sil</a>
			 		</td>
			 	</tr>
				<?php
			}
		}
		?>
	</table>
</div>
</body>
</html>