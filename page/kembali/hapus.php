<?php
	
	$id_kembali = $_GET ['id_kembali'];

	$koneksi->query("delete from tb_kembali where id_kembali ='$id_kembali'");

?>


<script type="text/javascript">
		window.location.href="?page=kembali";
</script>