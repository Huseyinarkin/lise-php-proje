<?php

class cls{


	function dbag($b)
	{
		if($b==true)
		{
		$vt="db";
		$bag=@mysql_connect("localhost","root","");
		if($bag){
			//echo "Baglanti Basarili<br>";
		}
		else{
			//die("Veritabanina baglanilamadi...<br> HATA:".	mysql_error());
			header("Location:hata.php?h=". mysql_error());		
		}

		if(@mysql_select_db($vt,$bag)){
		//echo "VeriTabani Seçimi Başarili<br>";
		}
		else{
			//die("Veritabani seçilemedi<br> HATA: ".mysql_error());
			header("Location:hata.php?h=". mysql_error());			
		}	
		}
		else
		{
			$bag=@mysql_connect("localhost","root","");
			@mysql_close($this->bag);
		}	
	}
	function giris($k,$s)
	{
		$don=false;
		$this->dbag(true);		
		mysql_query("SET NAMES 'utf8'");
		$sql=mysql_query("select * from uye where kulad='$k' and sifre='$s' ");
		$uyevarmi=mysql_num_rows($sql);
		if($uyevarmi>0)
		{
			$uyebilgi=mysql_fetch_assoc($sql);			
			$_SESSION['kul']=$uyebilgi['id'];
			$don=true;			
		}
		else
			$don=false;
		$this->dbag(false);		
		return($don);
	}
	function dcek($i)
	{	
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		$sor=mysql_query("select * from uye where id=$i ");
		if(!$sor)
		{
			$cek=false;
		}
		else
			$cek=mysql_fetch_array($sor);	
				
		$this->dbag(false);
		return($cek);
	}
	function kulkayit($ad,$sad,$kulad,$sifre,$email,$cins)
	{	
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		mysql_query("insert into uye(ad,soyad,kulad,sifre,cins,email) values('$ad','$sad','$kulad','$sifre','$cins','$email')");
		$this->dbag(false);
	}
	function guncelle($a,$sad,$kulad,$sifre,$email,$cins,$id)
	{
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		mysql_query("update uye set ad='$a',soyad='$sad',kulad='$kulad',sifre='$sifre',cins='$cins',email='$email' where id=$id ");
		$this->dbag(false);
	}
	function k_c($k,$i)
	{
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		$sor=mysql_query("select * from uye where kulad='$k' ");
		if($sor)
		{
			$s=mysql_fetch_array($sor);
			if($s['id']==$i)
				$cek=false;
			else
				$cek=true;
		}
		else
			$cek=true;
				
		$this->dbag(false);
		return($cek);
	}
	function bekle($kul,$bas,$entry)
	{
		$this->dbag(true);
		$trh=time();
		$s=$this->dcek($kul);
		$ad=$s['kulad'];
		mysql_query("SET NAMES UTF8");
		mysql_query("insert into baslik(kulid,kulad,baslik,entry,tarih) values('$kul','$ad','$bas','$entry','$trh')");
		$r=mysql_query("select id from baslik where tarih='$trh' and kulad='$ad' ");
		$g=mysql_fetch_assoc($r);
		$r=$g['id'];
		$this->dbag(false);
		return($r);
	}
	function bcek($i){
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		$sor=mysql_query("select * from baslik where id=$i ");
		if(!$sor)
		{
			$cek=false;
		}
		else
			$cek=mysql_fetch_array($sor);	
				
		$this->dbag(false);
		return($cek);
	}
	function bupdate($bas,$entry,$id)
	{
		$this->dbag(true);
		mysql_query("SET NAMES UTF8");
		mysql_query("update baslik set baslik='$bas',entry='$entry' where id=$id ");
		$this->dbag(false);		
	}
	
}
?>