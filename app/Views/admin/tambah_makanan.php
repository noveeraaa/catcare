        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Data Makanan Kucing</h4>
                    <!-- <p class="card-description"> Basic form elements </p> -->
                    <form class="forms-sample" action="<?= base_url('admin/proses_tambah_makanan') ?>" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Nama Makanan Kucing</label>
                        <input type="text" class="form-control" name="makanan" id="exampleInputName1" placeholder="Nama Makanan Kucing" required>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Harga</label>
                        <input type="text" class="form-control" name="harga" id="exampleInputEmail3" placeholder="Harga Makanan Kucing" required>
                      </div>
                      <div class="form-group">
                        <label>Unggah Foto Makanan Kucing</label>
                        <input type="file" name="service_picture" class="form-control">
                        <!-- <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Unggah Foto Makanan Kucing" required>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Unggah</button>
                          </span>
                        </div> -->
                      </div>


                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>