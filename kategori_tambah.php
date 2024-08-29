
<h1 class="mt-4">kategori buku</h1>
<div class="row">
<div class="col-md-12">
<!-- <a href="?page=tambah_kategori" class="btn btn-success">+ tambah</a> -->
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">+tambah data</button>

<div id="id01" class="modal">
    <div class="modal-content animate">
        <form method="post">
            <?php
                if(isset($_POST['submit'])){
                    $kategori = $_POST['kategori'];
                    $query = mysqli_query($koneksi, "INSERT INTO kategoribuku(NamaKategori) values('$kategori')");

                    if($query){
                        echo '<script>alert("penambahan data berhasil.");</script>';
                    } else {
                        echo '<script>alert("penambahan data gagal.");</script>';
                    }
                }
            ?>  
            <div class="container">
                <input type="text" placeholder="tambahkan data" name="kategori" required>
                <div>
                    <button type="submit" class="btn-success" name="submit" value="submit">simpan</button>
                    <button type="reset" class="btn-secondary">reset</button>
                </div>
                <div class="container" style="background-color:#f1f1f1; text-align: center;">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
<table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
        <tr>
            <th>no</th>
            <th>nama kategori</th>
            <th>aksi</th>
        </tr>

        <?php 
        $i=1;
        $query = mysqli_query($koneksi, "SELECT*FROM kategori");
        while($data = mysqli_fetch_array($query)){
            ?>
            <tr>
               <td><?php echo $i++; ?></td>
               <td><?php echo $data['Kategori']; ?></td>
               <td>
                <a href="?page=ubah_kategori&&id=<?php echo $data['id_Kategori']; ?>" class="btn btn-warning">ubah</a>
                <a onclick="return confirm('Anda akan menghapus data ini?')" class="btn btn-danger" href="?page=hapus_kategori&&id=<?php echo $data['id_Kategori'];?>">hapus</a>

               </td>
            </tr>
 
            <?php
        }
          ?>      
    </table>
</div>
</div>
</div>