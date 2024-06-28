<?php
	

	$nis = $_GET['id'];

	$sql = $koneksi->query("select * from tb_anggota where nis = '$nis'");

	$tampil = $sql->fetch_assoc();

    $jkl = $tampil['jk'];
    $kelas = $tampil['kelas'];


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
                    <label>NIS</label>
                    <input class="form-control" name="nis" value="<?php echo $tampil['nis']?>" readonly/>
                    
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input class="form-control" name="nama" value="<?php echo $tampil['nama']?>"/>
                    
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" name="tmpt_lahir" value="<?php echo $tampil['tempat_lahir']?>" />
                    
                </div>

                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']?>"  />
                    
                </div>

                <div class="form-group">
                 <label>Jenis Kelamin</label><br/>
                <label class="radio-inline">
                     <input type="radio" value="L" name="jk" <?php echo($jkl=="L")?"checked":"";?> /> Laki-laki
                </label>
                <label class="radio-inline">
                    <input type="radio" value="P" name="jk" <?php echo($jkl=="P")?"checked":"";?> /> Perempuan
                </label>
                </div>

                <div class="form-group">
                <label> Kelas</label>
                    <select class="form-control" name="kelas">
                        <option value="06TPLM001" <?php if ($kelas == '06TPLM001') echo 'selected'; ?>>06TPLM001</option>
                        <option value="06TPLM002" <?php if ($kelas == '06TPLM002') echo 'selected'; ?>>06TPLM002</option>
                        <option value="06TPLM003" <?php if ($kelas == '06TPLM003') echo 'selected'; ?>>06TPLM003</option>
                        <option value="06TPLM004" <?php if ($kelas == '06TPLM004') echo 'selected'; ?>>06TPLM004</option>
                        <option value="06TPLM005" <?php if ($kelas == '06TPLM005') echo 'selected'; ?>>06TPLM005</option>
                        <option value="06TPLM006" <?php if ($kelas == '06TPLM006') echo 'selected'; ?>>06TPLM006</option>
                    </select>
                </div>
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

 	$nis = $_POST ['nis'];
 	$nama = $_POST ['nama'];
 	$tmpt_lahir = $_POST ['tmpt_lahir'];
 	$tgl_lahir = $_POST ['tgl_lahir'];
 	$jk = $_POST ['jk'];
 	$kelas = $_POST ['kelas'];
 	
 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
 		
 		$sql = $koneksi->query("update  tb_anggota set nama='$nama', tempat_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', jk='$jk', kelas='$kelas' where nis='$nis' ");
 		if ($sql) {
 			?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Disimpan");
 					window.location.href="?page=anggota";

 				</script>
 			<?php
 		}
 	}

 ?>
                             
                             

