        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              <?php foreach($makanan as $m): ?>

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Data Makanan Kucing</h4>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="<?= base_url('admin/proses_edit_makanan') ?>" method="POST">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Makanan Kucing</label>
                        <input type="text" value="<?= $page; ?>" name="id_makanan" hidden>
                        <input type="text" class="form-control" name="makanan" id="exampleInputName1" value="<?= $m->nama_makanan; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Harga</label>
                        <input type="text" class="form-control" name="harga" id="exampleInputEmail3" value="<?= $m->harga; ?>" required>
                      </div>


                      <button type="submit" class="btn btn-warning mr-2">Edit</button>
                      <a href="<?= base_url('admin/makanan') ?>"><button class="btn btn-dark">Cancel</button></a>
                    </form>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

            </div>
          </div>