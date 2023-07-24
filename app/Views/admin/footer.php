<!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © catcare.com 2023</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url() ?>admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url() ?>admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url() ?>admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="<?= base_url() ?>admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="<?= base_url() ?>admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url() ?>admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url() ?>admin/assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>admin/assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>admin/assets/js/misc.js"></script>
    <script src="<?= base_url() ?>admin/assets/js/settings.js"></script>
    <script src="<?= base_url() ?>admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url() ?>admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <script>
        function confirmDelete(serviceId) {
            if (confirm("Anda yakin akan menghapus makanan ini?")) {
                // Redirect to the delete route with the service ID
                window.location.href = "<?= base_url('admin/delete_makanan/') ?>" + serviceId;
            }
        }

        function confirmDeleteKucing(serviceId) {
            if (confirm("Anda yakin akan menghapus kucing ini?")) {
                // Redirect to the delete route with the service ID
                window.location.href = "<?= base_url('admin/delete_kucing/') ?>" + serviceId;
            }
        }
    </script>

  </body>
</html>