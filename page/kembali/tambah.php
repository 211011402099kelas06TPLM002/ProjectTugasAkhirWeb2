<?php
	$menjabat = date("Y-m-d");
	$lima_tahun = mktime(0,0,0,date("n"),date("j")+1826,date("Y"));
	$selesai = date("Y-m-d", $lima_tahun);
	
mysql_connect("localhost","root","") or die("gagal");
mysql_select_db("db_perpustakaan") or die("gagal milih");


function autoNumber($id, $table){
  $query = 'SELECT MAX(RIGHT('.$id.', 3)) as max_id FROM '.$table.' ORDER BY '.$id;
  $result = mysql_query($query);
  $data = mysql_fetch_array($result);
  $id_max = $data['max_id'];
  $sort_num = (int) substr($id_max, 1, 3);
  $sort_num++;
  $new_code = sprintf("%04s", $sort_num);
  return $new_code;
 }

?>

<div class="panel panel-default">
<div class="panel-heading">
        Tambah Data Pengembalian Buku
 </div> 
<div class="panel-body">
    <div class="row">
        <div class="col-md-12">
            
            <form method="POST" onsubmit="return validasi(this)" enctype="multipart/form-data">
                <div class="form-group">
                    <label>id_kembali</label>
                   
                    <input name="id_kembali" type="text" class="form-control" 
					value="<?php echo autoNumber('id_kembali','tb_kembali');?>" />
                </div>

				<div class="form-group">
                <label> Nama Peminjam</label>
                <select class="form-control" name="nama">
                    <option>== Pilih ==</option>
                    <?php
                        $query = $koneksi->query("SELECT * FROM tb_transaksi ORDER by id");
                        
                        while ($nama=$query->fetch_assoc()) {
                            echo "<option value='$id[nama] $nama[nama]'>$nama[nama]</option>";
                        }
                    ?>
                </select></div> 
				
				<div class="form-group">
                <label> Judul Buku</label>
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
                    
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                </div>
         </div>

         </form>
      </div>
 </div>  
 </div>  
 </div>


 <?php

    $id_kembali		= $_POST ['id_kembali'];
 
	$nama			= $_POST ['nama'];
	$judul			= $_POST ['judul'];
	$simpan			= $_POST ['simpan'];

		
    if ($simpan) {
        
        $sql = $koneksi->query("insert into tb_kembali (id_kembali,nama,judul)
		values('$id_kembali','$nama','$judul')");

        if ($sql) {
            ?>
                <script type="text/javascript">
                    
                    alert ("Data Berhasil Disimpan");
                    window.location.href="?page=kembali";

                </script>
            <?php
        }
    }

?>
                             
                             

