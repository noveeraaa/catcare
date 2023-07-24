<!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Basic Tables </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url('admin/index') ?>">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Makanan Kucing</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <?php if (session()->getFlashKeys()): ?>
                  <?php echo session()->getFlashdata('berhasilhapusmakanan'); ?>
                  <?php echo session()->getFlashdata('berhasiltambahmakanan'); ?>
                  <?php echo session()->getFlashdata('berhasileditmakanan'); ?>
                <?php endif; ?>
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Data Makanan Kucing</h4>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Nama Makanan </th>
                            <th> Harga </th>
                            <th> Foto </th>
                            <th> Aksi </th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php $no=1; foreach($makanan as $m): ?>

                          <tr>
                            <td class="py-1">
                              <?= $no; ?>
                            </td>
                            <td> <?= $m->nama_makanan ?> </td>
                            <td>
                              <?= $m->harga ?>
                            </td>
                            <td>
                                <img src="<?= base_url($m->foto) ?>" >
                            </td>
                            <td>
                                <a href="<?= base_url('admin/edit_makanan?id_makanan='.$m->id_makanan) ?>" class="btn btn-warning">Edit</a>
                                <button onclick="confirmDelete(<?= $m->id_makanan ?>)" class="btn btn-danger">Delete</button>
                            </td>
                          </tr>

                        <?php $no++; endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->