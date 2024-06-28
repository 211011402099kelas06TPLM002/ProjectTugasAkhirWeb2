<?php

	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_transaksi where id='$id'");

	$tampil = $sql->fetch_assoc();
?>

<?php

	$id     		= $_GET['id'];
	$id_buku 		= $_GET['judul'];
	$id_kembali		= $_GET ['id_kembali'];
	$nis			= $_GET ['nis'];
	$nama			= $_GET ['nama'];
	$judul			= $_GET ['judul'];
	$tgl_pinjam			= $_GET ['tgl_pinjam'];
	
	

	$sql = $koneksi->query("insert into tb_kembali (id_kembali,nis,nama,judul,tgl_pinjam) values('$id_kembali','$nis','$nama','$judul','$tgl_pinjam')");
	$buku = $koneksi->query("update  tb_buku set jumlah_buku = (jumlah_buku+1) where judul='$id_buku' ");
	$sql = $koneksi->query("delete from tb_transaksi where id = '$id'");
	if ($sql ||  $buku) {
		
		?>

			<script type="text/javascript">
				
				alert("Buku Berhasil Dikembalikan");

				window.location.href="?page=transaksi";

			</script>
		<?php
}

?>