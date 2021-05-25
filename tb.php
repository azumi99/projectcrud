<?php
require 'function.php';
require 'cek.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iventaris Barang</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">BON Records</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Kas Bon
                        </a>
                        <a class="nav-link" href="tb.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tutup Bon
                        </a>
                        <a class="nav-link" href="tbl.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tutup Bon Langsung
                        </a>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Tutup Bon</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tbmodal">
                                Tambah TB
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>Company</th>
                                            <th>Nominal</th>
                                            <th>Tranfer to</th>
                                            <th>Keterangan</th>
                                            <th>Status Terima</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tampilantb = mysqli_query($conn, "select * from tb left join login on tb.id_login=login.id_login left join kb on tb.id_kb=kb.id_kb left join company on kb.id_company=company.id_company");
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($tampilantb)) {
                                            $tanggal = $data['tanggal_tb'];
                                            $nama = $data['nama'];
                                            $deskripsi = $data['deskripsi_kb'];
                                            $company = $data['company_name'];
                                            $nominal = $data['nominal_kb'];
                                            $transfer = $data['transfer_kb'];
                                            $keterangan_tb = $data['ket_tb'];
                                            $status_terima = $data['status_trmtb'];
                                            $idnama = $data['id_login'];
                                            $idkb = $data['id_kb'];
                                            $idtb = $data['id_tb'];
                                        ?>
                                            <tr>
                                                <td><?= $idtb; ?></td>
                                                <td><?= $tanggal; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $deskripsi; ?></td>
                                                <td><?= $company ?></td>
                                                <td><?= "Rp " . $nominal; ?></td>
                                                <td><?= $transfer; ?></td>
                                                <td><?= $keterangan_tb; ?></td>
                                                <td><?= $status_terima; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#tbmodalupdate<?= $idtb; ?>">update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#tbmodaldelete<?= $idtb; ?>">delete</button>
                                                </td>
                                            </tr>

                                            <!-- modal update tb -->
                                            <div class="modal fade" id="tbmodalupdate<?= $idtb; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update TB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <select name="namatb" class="form-control">
                                                                    <option value="<?= $idnama; ?>" selected><?= $nama; ?></option>
                                                                    <?php
                                                                    $tampilannama = mysqli_query($conn, "select * from login");
                                                                    while ($fetcharray = mysqli_fetch_array($tampilannama)) {
                                                                        $name = $fetcharray['nama'];
                                                                        $id_loginnya = $fetcharray['id_login'];
                                                                    ?>
                                                                        <option value="<?= $id_loginnya; ?>"><?= $name; ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br />
                                                                <select name="pilihkb" class="form-control" required>
                                                                    <option value="<?= $idkb; ?>" selected><?= $tanggal; ?> <?= $deskripsi; ?></option>
                                                                    <?php
                                                                    $det = mysqli_query($conn, "select * from kb");
                                                                    while ($d = mysqli_fetch_array($det)) {

                                                                    ?>
                                                                        <option value="<?php echo $d['id_kb'] ?>"><?php echo $d['tanggal_kb'] ?> <?php echo $d['id_login'] ?> <?php echo $d['deskripsi_kb'] ?>, <?php echo $d['id_company'] ?> <?php echo $d['nominal_kb'] ?> <?php echo $d['transfer_kb'] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <br />
                                                                <textarea type="text" class="form-control" name="keterangan" rows="3" placeholder="keterangan"><?= $keterangan_tb; ?></textarea>
                                                                <input type="hidden" name="idtb" value="<?= $idtb; ?>">
                                                                <br />
                                                                <button type="submit" name="updatetb" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal update tb -->

                                            <!-- delete modal tb -->
                                            <div class="modal fade" id="tbmodaldelete<?= $idtb; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus KB</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <fieldset disabled>
                                                                    <textarea type="text" class="form-control" name="deskripsi" rows="3" placeholder="<?= $deskripsi; ?>"></textarea>
                                                                </fieldset>
                                                                <br />
                                                                Apakah anda ingin menghapus TB ini?
                                                                <br />
                                                                <br />
                                                                <input type="hidden" name="idtb" value="<?= $idtb; ?>">
                                                                <button type="submit" name="deletetb" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete modal tb -->

                                        <?php
                                        };

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

<!-- Modal -->
<div class="modal fade" id="tbmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah TB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <select name="namatb" class="form-control">
                        <option selected>pilih user</option>
                        <?php
                        $tampilannama = mysqli_query($conn, "select * from login");
                        while ($fetcharray = mysqli_fetch_array($tampilannama)) {
                            $nama = $fetcharray['nama'];
                            $id_loginnya = $fetcharray['id_login'];
                        ?>
                            <option value="<?= $id_loginnya; ?>"><?= $nama; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <select name="pilihkb" class="form-control" required>
                        <option selected>pilih kb</option>
                        <?php
                        $det = mysqli_query($conn, "select * from kb");
                        while ($d = mysqli_fetch_array($det)) {
                        ?>
                            <option value="<?php echo $d['id_kb'] ?>"><?php echo $d['tanggal_kb'] ?> <?php echo $d['id_login'] ?> <?php echo $d['deskripsi_kb'] ?>, <?php echo $d['id_company'] ?> <?php echo $d['nominal_kb'] ?> <?php echo $d['transfer_kb'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <br />
                    <textarea type="text" class="form-control" name="keterangan" rows="3" placeholder="keterangan"></textarea>
                    <br />
                    <button type="submit" name="savetb" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>