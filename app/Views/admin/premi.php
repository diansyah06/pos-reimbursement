<?= $this->extend('layout/templates'); ?>

<?= $this->section('page-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <a href="<?= base_url('admin/tambah_premi'); ?>"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#addModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Premi</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Premi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Kelamin</th>
                            <th>Kelas</th>
                            <th>Pekerjaan</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($premi as $pr) :  ?>
                        <tr>
                            <td><?= $pr['nama'] ?></td>
                            <td><?= $pr['tgl_lahir']; ?></td>

                            <!-- Kondisi Kelamin -->
                            <?php if ($pr['kelamin'] == 1) : ?>
                            <td>Laki - Laki</td>
                            <?php elseif ($pr['kelamin'] == 2) : ?>
                            <td>Perempuan</td>
                            <?php else : ?>
                            <td>Anak - Anak</td>
                            <?php endif; ?>

                            <?php if ($pr['kls'] == 1) : ?>
                            <td>PM-100</td>
                            <?php elseif ($pr['kls'] == 2) : ?>
                            <td>PM-200</td>
                            <?php elseif ($pr['kls'] == 3) : ?>
                            <td>PM-400</td>
                            <?php elseif ($pr['kls'] == 4) : ?>
                            <td>PM-800</td>
                            <?php elseif ($pr['kls'] == 5) : ?>
                            <td>PM-100</td>
                            <?php elseif ($pr['kls'] == 6) : ?>
                            <td>PM-200</td>
                            <?php elseif ($pr['kls'] == 7) : ?>
                            <td>PM-400</td>
                            <?php elseif ($pr['kls'] == 8) : ?>
                            <td>PM-800</td>
                            <?php elseif ($pr['kls'] == 9) : ?>
                            <td>PM-100</td>
                            <?php elseif ($pr['kls'] == 10) : ?>
                            <td>PM-200</td>
                            <?php elseif ($pr['kls'] == 11) : ?>
                            <td>PM-400</td>
                            <?php else : ?>
                            <td>PM-800</td>
                            <?php endif; ?>
                            <td><?= $pr['pekerjaan']; ?></td>
                            <td><?= "Rp " . number_format($pr['total'], 0, '', '.') . " " ?></td>
                            <td align="center">
                                <a class="btn btn-success btn-edit-premi" href="#" data-id="<?= $pr['id']; ?>"
                                    data-nama="<?= $pr['nama']; ?>" data-datePicker="<?= $pr['tgl_lahir']; ?>"
                                    data-kelamin="<?= $pr['kelamin']; ?>" data-kelas="<?= $pr['kls']; ?>"
                                    data-pekerjaan="<?= $pr['pekerjaan']; ?>" data-total="<?= $pr['total']; ?>"><em
                                        class="fa fa-eye"></em></a>

                                <a class="btn btn-danger btn-delete-premi" href="#" data-id="<?= $pr['id']; ?>"><em
                                        class="fa fa-trash"></em></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<!-- Modal Add Kelas-->
<form action="/admin/savepremi" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Premi Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 date">
                            <label>Tanggal Lahir</label>
                            <div class="input-group input-append date" id="datePicker">
                                <input type="text" class="form-control" name="datePicker" id="datePicker" />
                                <span class="input-group-addon add-on"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="kelamin" id="kelamin" class="form-control input-lg">
                            <option value="">Choose...</option>
                            <?php
                            foreach ($jenis_kelamin as $row) {
                                echo '<option value="' . $row["id"] . '">' . $row["kelamin"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Kelas</label>
                        <select name="kelas" id="kelas" class="form-control input-lg">
                            <option value="">Choose...</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <select name="total" id="total" class="form-control input-lg">
                            <option value="">Choose...</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="/admin/updatepremi" method="post">
    <div class="modal fade" id="editModalPremi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Premi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control nama" name="nama">
                    </div>

                    <div class="form-group">
                        <div class="col-xs-5 date">
                            <label>Tanggal Lahir</label>
                            <div class="input-group input-append date" id="datePicker">
                                <input type="text" class="form-control datePicker" name="datePicker" id="datePicker" />
                                <span class="input-group-addon add-on"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control kelamin" name="kelamin">
                    </div>

                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control kelas" name="kelas">
                    </div> -->

                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control pekerjaan" name="pekerjaan">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control total" name="total">
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="/admin/deletepremi" method="post">
    <div class="modal fade" id="deleteModalPremi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <h4>Apakah kamu yakin ingin menghapus premi ini?</h4>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<?= $this->endSection(); ?>