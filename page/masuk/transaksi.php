<div class="row">
<div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-primary">
    <div class="panel-heading">
         Data Transaksi Peminjaman
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <div>
                <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data Peminjaman</a>
            </div><br>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr style="background:gold;color:#333;">
                        <th>No</th>
                        <th>Judul</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Tanggal Pinjaman</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Terlambat</th>
                        
						<th width="21%">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        $no = 1;

                        $sql = $koneksi->query("select * from tb_transaksi where status='pinjam' ");

                        while ($data= $sql->fetch_assoc()) {

                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <?php 
                                $test = $data['id_buku'];
                                // echo $test;
                                $jbuku = $koneksi->query("SELECT * FROM tb_buku WHERE id_buku=$test");
                                $jjbuku = $jbuku->fetch_assoc();
                                echo $jjbuku['judul'];
                             ?>
                        </td>
                        <td>
                            <?php 
                                $anggota = $data['nis'];
                                // echo $test;
                                $anggotaa = $koneksi->query("SELECT * FROM tb_anggota WHERE nis=$anggota");
                                $show = $anggotaa->fetch_assoc();
                                echo $show['nis'];
                             ?>
                        </td>
                        <td><?php echo $show['nama'];;?></td>
                        <td><?php echo $data['tgl_pinjam'];?></td>
                        <td><?php echo $data['tgl_kembali'];?></td>
                        <td><?php echo $data['status'];?></td>
                        
                        <td>
                        	<?php
							$denda = 1000;

                        	$tanggal_dateline = $data['tgl_kembali'];

                        	$tgl_kembali=date('Y-m-d');

                        	$lambat = terlambat($tanggal_dateline, $tgl_kembali);

                        	$denda1 = $lambat*$denda;

                        	if ($lambat>0) {
                        		echo "<font color='red'>$lambat Hari dan  </font>";
                        	}
							if ($denda1>0) {
                        		echo "<font color='red'>Denda Rp.$denda1  </font>";
                        	}else{
                        		echo $denda1  . "hari";
                        	}
							

                        	?>
                        </td>
                       
						
                        <td>
                            <a href="?page=transaksi&aksi=kembali&id=<?php echo $data['id']; ?>
							&judul=<?php echo $data['judul'];?>
							&nis=<?php echo $data['nis'];?>
							&tgl_pinjam=<?php echo $data['tgl_pinjam'];?>
							&nama=<?php echo $data['nama'];?>" 
							class="btn btn-info" >Kembalikan Buku</a>
							
                            <a href="?page=transaksi&aksi=perpanjang&id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'];?>&tgl_kembali=<?php echo $data['tgl_kembali']?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger" >Perpanjang</a>
                        </td>
                    </tr>
                    <?php  } ?>
                </tbody>
                </table>
              </div>
    </div>
</div>
</div>
</div>                          