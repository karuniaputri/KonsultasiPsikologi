<?php
include_once 'koneksi.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Table Data Pegasus</title>
  </head>
  <body>
    <div class="container-fluid mt-5">
        <h4><center>Table Data Pegasus<center></h4>
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Data
        </button> -->

        <table border ="1" class= "table table-stripped">
            <thead>
                <tr>
                <th>No.</th>
                    
                    <th>Nama </th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Pesanan</th>
                    <th>Jumlah Pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $koneksi->select_data();
                    $no = 1;
                ?>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        
                         <td><?= $row['nama'] ?></td>
                         <td><?= $row['no_hp'] ?></td>
                         <td><?= $row['alamat'] ?></td>
                         <td><?= $row['pesanan'] ?></td>
                         <td><?= $row['jumlahpesanan'] ?></td>
                        <td>
                            <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Bayar</a>
                            <!-- <a href="" class="badge badge-success" data-toggle="modal" data-target="#tabelModal<?= $row['id_pesanan']  ?>">Edit</a>
                            <a href="koneksi.php?delete_data=<?= $row['id_pesanan'] ?>" class="badge badge-danger">Hapus</a> -->
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
      </div>
            <!-- Modal EDIT -->
            <?php
            $data = $koneksi->select_data();
            foreach ($data as $row): ?>
               <div class="modal fade" id="tabelModal<?= $row['id_pesanan']  ?>" tabindex="-1" aria-labelledby="tabelModal<?= $row['id_pesanan']  ?>Label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tabelModal<?= $row['id_pesanan']  ?>Label"> Edit Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="koneksi.php?update_data" method="post">
                            <input type="hidden" name="id" value="<?= $row['id_pesanan'] ?>">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="form-group">
                                        <label>Pesanan</label>
                                        <select class="form-control" name="pesanan" value="<?= $row['pesanan'] ?>">
                                            <option disable selected>Pilihan</option>
                                            <option value="gas">Gas</option>
                                            <option value="galon">Galon</option>
                                        </select>
                                    <div class="form-group">
                                        <label>Jumlah Pesanan (max.5)</label>
                                        <input type="text" class="form-control" name="jumlah" value="<?= $row['jumlahpesanan'] ?>">
                                    </div>
                                   </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<?php endforeach ?>

<!-- Modal Tambah data -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bayar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container">
                    <form action="koneksi.php?insert_data" method="post">
                        <div class="form-group">
                        <select class="form-control" name="pesanan" value="<?= $row['pesanan'] ?>">
                            <option disable selected>Pilihan</option>
                            <option value="gas">Gas</option>
                            <option value="galon">Galon</option>
                        </select>
                        <div class="form-group">
                            <label>Jumlah Pesanan</label>
                            <input type="text" class="form-control" name="jumlahpesanan" placeholder="Masukan jumlah yang dipesan">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>