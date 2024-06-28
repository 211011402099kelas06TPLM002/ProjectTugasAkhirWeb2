<div class="row">
<div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-primary">
    <div class="panel-heading">
         DATA PENGEMBALIAN BUKU
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr style="background:Chartreuse;color:black;">
                        <th>No</th>
                        <th>Nim</th>
						<th>Nama Peminjam</td>
						<th>Judul Buku yg Dipinjam</td>
						<th>Tanggal Peminjaman</td>
                        <th>Tanggal pengembalian</th>
	
                    </tr>
                </thead>
                <tbody>

                    <?php

                        $no = 1;
                        $sql = $koneksi->query("select * from tb_kembali ");
						
                        while ($data= $sql->fetch_assoc()) {

                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        
                        </td>	
                        
						<td><?php echo $data['nis'];?></td>
						<td><?php echo $data['nama'];?></td>
						<td><?php echo $data['judul'];?></td>
						<td><?php echo $data['tgl_pinjam'];?></td>
                        <td><?php echo $data['tgl_kembali'];?></td>
                       
                       

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