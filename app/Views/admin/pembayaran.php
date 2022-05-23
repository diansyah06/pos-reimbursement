<?= $this->extend('layout/templates'); ?>

<?= $this->section('page-content'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row">
        <div class="col">
            <div class="box">
                <form method="post" action="<?= base_url('admin/addPremi'); ?>" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <h4 class="widget-title">Detail Reimbursement</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nama Lengkap</label>
                                    <input id="nama" type="text" name="nama" class="form-control" required="required"
                                        data-error="Firstname is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_name">Nomor peserta</label>
                                    <input id="nama" type="text" name="nama" class="form-control" required="required"
                                        data-error="Firstname is required." value="RI<?= date('ymdhms') ?>" readonly>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="form_lastname">Jenis Kelamin</label>
                                    <select name="kelamin" id="kelamin" class="form-control input-lg">
                                        <option value="">Choose...</option>
                                        <?php
                                        foreach ($jenis_kelamin as $row) {
                                            echo '<option value="' . $row["id"] . '">' . $row["kelamin"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Klaim Jaminan Kesehatan</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Deskripsi</th>
                                                <th>Kelas</th>
                                                <th>Jumlah Hari</th>
                                                <th>Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_tanggung as $lt) :  ?>
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?= $lt['kode']; ?>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?= $lt['desk']; ?></td>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="kelas" id="kelas" class="form-control input-lg">
                                                            <option value="">Choose...</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td align="center" style="width: 150px;">
                                                    <input type="text">
                                                </td>
                                                <td align="center"
                                                    style="color: green; font-size: 20px; font-weight: 200px;">$320,800
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary btn-lg mb30">Tambah Premi</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

            <div class="widget">
                <h4 class="widget-title">Total Rincian Ditanggung</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Nama Lengkap</label>
                            <input id="nama" type="text" name="nama" class="form-control" required="required"
                                data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Jenis Kelamin</label>
                            <select name="kelamin" id="kelamin" class="form-control input-lg">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($jenis_kelamin as $row) {
                                    echo '<option value="' . $row["id"] . '">' . $row["kelamin"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Tanggal Lahir</label>
                            <div class="form-group">
                                <div class="col-xs-5 date">
                                    <div class="input-group input-append date" id="datePicker">
                                        <input type="text" class="form-control" name="tgl_lahir" />
                                        <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_phone">Pekerjaan</label>
                            <input id="pekerjaan" type="text" name="pekerjaan" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="form_email">Pilih Kelas</label>
                            <select name="kelas" id="kelas" class="form-control input-lg">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
            </div>

        </div>
        <div class="col-md-6">

            <div class="widget">
                <h4 class="widget-title">Total Rincian Bayar Sendiri</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Nama Lengkap</label>
                            <input id="nama" type="text" name="nama" class="form-control" required="required"
                                data-error="Firstname is required.">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Jenis Kelamin</label>
                            <select name="kelamin" id="kelamin" class="form-control input-lg">
                                <option value="">Choose...</option>
                                <?php
                                foreach ($jenis_kelamin as $row) {
                                    echo '<option value="' . $row["id"] . '">' . $row["kelamin"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">Tanggal Lahir</label>
                            <div class="form-group">
                                <div class="col-xs-5 date">
                                    <div class="input-group input-append date" id="datePicker">
                                        <input type="text" class="form-control" name="tgl_lahir" />
                                        <span class="input-group-addon add-on"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_phone">Pekerjaan</label>
                            <input id="pekerjaan" type="text" name="pekerjaan" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="form_email">Pilih Kelas</label>
                            <select name="kelas" id="kelas" class="form-control input-lg">
                                <option value="">Choose...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
            </div>

        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?= $this->endSection(); ?>