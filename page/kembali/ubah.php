<?php

	$id_kembali = $_GET['id_kembali'];

	$sql = $koneksi->query("select * from tb_kembali where id_kembali='$id_kembali'");

	$tampil = $sql->fetch_assoc();
?>

<div class="panel panel-default">
<div class="panel-heading">
		Ubah Data
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" >
                                        <div class="form-group">
                                            <label>Pengembalian Buku</label>
                                            <select class="form-control" name="nama">
												<option>== Pilih ==</option>
												<?php
													$query = $koneksi->query("SELECT * FROM tb_transaksi ORDER by id");
													
													while ($nama=$query->fetch_assoc()) {
														echo "<option value='$id[nama] $nama[nama]'>$nama[nama]</option>";
													}
												?>
											</select>
										</div>
										<div class="form-group">
                                            <label>Pengembalian Buku</label>
											<select class="form-control" name="judul">
											<option>== Pilih ==</option>
												<?php
													$query = $koneksi->query("SELECT * FROM tb_transaksi ORDER by id");
													
													while ($judul=$query->fetch_assoc()) {
														echo "<option value='$id[judul] $judul[judul]'>$judul[judul]</option>";
													}
												?>
											</select></div>

                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

 	$nama = $_POST ['nama'];

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update tb_kembali set nama='$nama' where id_kembali='$id_kembali' ");

 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Ubah Berhasil Disimpan");
 					window.location.href="?page=kembali";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

