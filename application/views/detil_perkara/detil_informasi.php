
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/wb/letter.css">
<div style="width:100%;z-index:200;padding-top:20px">
  <div style="padding:10px;background-color:none;margin:-20px auto;">
	<div class='letter'>
	<div class="clip"></div>
	<!-- edit mulai dari sini -->
		<h1 style="padding:30px 0px 4px;"><i style="color:#3C8100;"> INFORMASI BAGI PELANGGAR</i></h1>	
		<strong>
		<ol>
			<li>Pelanggar tidak perlu lagi mengikuti sidang Tilang di <?php echo $satker; ?>.</li>
			<li>Perkara Lalu Lintas (Tilang) diputus  hari Senin (Polresta & PJR) dan Kamis (Polres & DLLAJ Timbangan) setiap minggunya.</li>
			<li>Untuk mengetahui denda tilang, <?php echo $satker; ?> memberikan fasilitas kemudahan yaitu :</li>
			<ol>
				<li>Pelanggar cukup mengetikan Nomor Kendaraan / NOMORTILANG pada fasilitas pencarian pada aplikasi SIPP (Sistem Informasi Penelusuran Perkara).</li>
				<li>dst....</li>
			</ol>
			<li>Untuk pembayaran denda tilang dan pengambilan barang bukti, pelanggar cukup datang ke kantor Kejaksaan Negeri <?php echo ucwords($this->tanggalhelper->namaKota($satker)); ?>.</li>
			<li>Denda Tilang yang dibayarkan akan disetorkan sebagai pendapatan Negara Bukan Pajak.</li>
			<li>Bagi para pelanggar wajib untuk melaksanakan <font color="red">Point 3</font> agar mendapatkan informasi  yang benar tentang apakah Perkara Tilang sudah diputus atau belum oleh <?php echo $satker; ?>, apabila NOMORTILANG pelanggar tidak ada dalam daftar sesuai dengan tanggal putusan yang ditentukan, maka yang bersangkutan bisa langsung menghubungi pihak terkait (Pihak Kepolisian atau DLLAJ).</li>
		</ol>
	<!-- batas -->
		</strong>
				<div>
		     	 	<input type="button" id="kembaliKeList" value="Tutup" class="btn">
		     	 </div>				
		</div>		
	</div>
</div>
</div>

<script type="text/javascript">
closeLoading();
$('#kembaliKeList').closingFormWin();
</script>