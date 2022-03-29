<?php
    include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="assets_admin/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Admin | Pegasus</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Profil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="home_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="tabelcustomer.php">Data User</a>
                                    <a class="nav-link" href="tabelpesanan.php">Data Pesanan</a>
                                    <a class="nav-link" href="tabelpembayaran.php">Data Pembayaran</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Data User</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Data User</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data User
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Tambah Data User
                                </button>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Nomor Handphone</th>
                                            <th>Alamat</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user = $koneksi->select_user();
                                        $no = 1;
                                        ?>
                                        <?php foreach ($user as $row): ?>
                                            <tr>
                                                <th><?= $no++ ?></th>
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['no_hp'] ?></td>
                                                <td><?= $row['alamat'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['pass'] ?></td>
                                                <td> 
                                                    <a type="button" href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row['id_pembayaran']?>">Edit</a>
                                                    <a type="button" class="btn btn-danger btn-sm" href="koneksi.php?delete_pembayaran=<?= $row['id_pembayaran'] ?>">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <?php foreach ($user as $row): ?>
        
        <!-- Modal Edit -->
        <div class="modal fade" id="exampleModal<?= $row['id_pembayaran']?>" tabindex="-1" aria-labelledby="exampleModal<?= $row['id_pembayaran']?>Label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModal<?= $row['id_pembayaran']?>Label">Ubah Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="koneksi.php?update_pembayaran" method="post">
                        <input type="hidden" name="id_pembayaran" value="<?= $row['id_pembayaran']?>">
                        <div class="modal-body">
                            <div class="form-group">
                                 <label>jumlah pembayaran</label>
                                 <input type="text" name="jumlahbayar" class="form-control" placeholder="jumlahbayar" value="<?= $row['jumlahbayar']?>" required>
                           </div>  
                           <div class="form-group">
                                <label>Metode Pembayaran</label>
                                <select id="pembayaran" name="id_metode" class="form-control">
                                    <option selected disabled>Pilih Jenis Pembayaran</option>
                                    <?php
                                    $pembayaran = $koneksi->select_metode();
                                    foreach ($pembayaran as $item): ?>
                                        <?php if ($item['id_metode'] == $row['id_metode']): ?>
                                            <option value="<?= $item['id_metode']?>" selected><?=$item['nama_metode']?></option>
                                        <?php else: ?>
                                            <option value="<?= $item['id_metode']?>"><?=$item['nama_metode']?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                 <label>keterangan</label>
                                 <input type="text" name="keterangan" class="form-control" placeholder="keterangan" value="<?= $row['keterangan']?>" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="koneksi.php?insert_pembayaran" method="post">
                    <div class="modal-body">
                            <div class="form-group">
                                 <label>jumlah pembayaran</label>
                                 <input type="text" name="jumlahbayar" class="form-control" placeholder="jumlahbayar" required>
                           </div>  
                           <div class="form-group">
                                <label>Metode Pembayaran</label>
                                <select id="id_metode" name="id_metode" class="form-control">
                                    <option selected disabled>Pilih Metode Pembayaran</option>
                                    <?php
                                    $metode =$koneksi->select_metode();
                                    foreach ($metode as $row): ?>
                                        <option value="<?= $row['id_metode']?>"><?=$row['nama_metode']?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                 <label>Keterangan</label>
                                 <input type="text" name="keterangan" class="form-control" placeholder="keterangan" required>
                             </div>
                            <br>
                                <button type="submit" name="submit1" class="btn btn-primary">Submit</button>
                            </br>
                    </div>
                </form>
            </div>
        </div>
    </div>
            
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Pegasus 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="assets_admin/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="assets_admin/js/datatables-simple-demo.js"></script>
    </body>
</html>
