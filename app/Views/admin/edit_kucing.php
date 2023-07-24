        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              <?php foreach($kucing as $k): ?>

              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Data Kucing</h4>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="<?= base_url('admin/proses_edit_kucing') ?>" method="POST">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Kucing</label>
                        <input type="text" value="<?= $page; ?>" name="id_kucing" hidden>
                        <input type="text" class="form-control" name="kucing" id="exampleInputName1" value="<?= $k->nama_kucing; ?>" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="exampleInputEmail3" required><?= $k->deskripsi; ?></textarea>
                      </div>


                      <button type="submit" class="btn btn-warning mr-2">Edit</button>
                      <a href="<?= base_url('admin/kucing') ?>"><button class="btn btn-dark">Cancel</button></a>
                    </form>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>

            </div>
          </div>