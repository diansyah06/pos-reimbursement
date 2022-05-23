<?= $this->extend('layout/templates'); ?>

<?= $this->section('page-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

        <button type="button" class="btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#addModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kelas</button>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Kelas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <th>Nama Kelas</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($premi_kls as $pkls) : ?>
                        <tr>
                            <?php if ($pkls['id_klm'] == 1) : ?>
                            <td>Laki - Laki</td>
                            <?php elseif ($pkls['id_klm'] == 2) : ?>
                            <td>Perempuan</td>
                            <?php else : ?>
                            <td>Anak - Anak</td>
                            <?php endif; ?>

                            <td><?= $pkls['kls']; ?></td>
                            <td><?= "Rp " . number_format($pkls['harga'], 0, '', '.') . " " ?></td>
                            <td align="center">
                                <a class="btn btn-success btn-edit" href="#" data-id="<?= $pkls['id']; ?>"
                                    data-kelamin="<?= $pkls['id_klm']; ?>" data-kelas="<?= $pkls['kls']; ?>"
                                    data-harga="<?= $pkls['harga']; ?>"><em class="fa fa-eye"></em></a>

                                <a class="btn btn-danger btn-delete" href="#" data-id="<?= $pkls['id']; ?>"><em
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

<!-- Modal Add Kelas-->
<form action="/admin/savekelas" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="kelamin" id="kelamin" class="form-control">
                            <option value="">Choose...</option>
                            <?php foreach ($jenis_kelamin as $jk) : ?>
                            <option value="<?= $jk['id']; ?>"><?= $jk['kelamin']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" id="kelas">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga">
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
<form action="/admin/updatekelas" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="kelamin" class="form-control kelamin">
                            <?php foreach ($jenis_kelamin as $jk) : ?>
                            <option value="<?= $jk['id']; ?>"><?= $jk['kelamin']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nama Kelas</label>
                        <input type="text" class="form-control kelas" name="kelas">
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control harga" name="harga">
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
<form action="/admin/deletekelas" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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

                    <h4>Apakah kamu yakin ingin menghapus kelas ini?</h4>

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

<!-- /.container-fluid -->

<?= $this->endSection(); ?>