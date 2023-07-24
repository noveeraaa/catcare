<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MakananModel;
use App\Models\KucingModel;

class Admin extends BaseController
{

	protected $session;
    protected $db;

    public function __construct(){
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    private function isLoggedIn()
    {
        $session = session();

        // Check if the 'logged_in' session variable exists and is true
        if ($session->logged_in) {
            return true;
        }

        return false;
    }

	public function index(){

		if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }


        $header = view('admin/header');
        $mainContent = view('admin/index');
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
	}

	public function tambah_makanan(){

		if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }


        $header = view('admin/header');
        $mainContent = view('admin/tambah_makanan');
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
	}

	public function tambah_kucing(){

		if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }


        $header = view('admin/header');
        $mainContent = view('admin/tambah_kucing');
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
	}

	public function makanan(){

		if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }

        $MakananModel = new MakananModel();
        $data['makanan'] = $MakananModel->findAll();

        $header = view('admin/header');
        $mainContent = view('admin/makanan', $data);
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
	}

	public function proses_tambah_makanan(){

		$nama_makanan = $this->request->getPost('makanan');
		$harga = $this->request->getPost('harga');
		$servicePicture = $this->request->getFile('service_picture');
        if ($servicePicture->isValid() && !$servicePicture->hasMoved()) {
            // Generate a unique file name
            $newFileName = $servicePicture->getRandomName();

            // Move the uploaded file to the desired directory
            $servicePicture->move('./uploads', $newFileName);

            // Store the file path in the $data array
            $data['foto'] = './uploads/' . $newFileName;
        } else {
            // Handle the error if the file upload fails
            // Redirect, display an error message, or set a validation error
            return redirect()->back()->withInput()->with('error', 'Failed to upload service picture');
        }

        // Validate the form data
        if (empty($nama_makanan)) {
            // Handle the error, redirect, or display an error message
            return redirect()->back()->withInput()->with('error', 'Service Name is required');
        }

        // Insert the data into the database
        $MakananModel = new \App\Models\MakananModel();
        $data = [
            'nama_makanan' => $nama_makanan,
            'harga' => $harga,
            'foto' => './uploads/' . $newFileName // Store the file path in the database
        ];
        $MakananModel->insert($data);

        if($MakananModel){
            $session = session();
            $session->setFlashdata('berhasiltambahmakanan', '<div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Selamat! Anda berhasil menambahkan makanan!</a>
                        </div>');
            return redirect()->to("admin/makanan");
        }else{
            return redirect()->to("admin/dashboard");
        }

	}

	public function proses_tambah_kucing(){

		$nama_kucing = $this->request->getPost('kucing');
		$deskripsi = $this->request->getPost('deskripsi');
		$servicePicture = $this->request->getFile('service_picture');
        if ($servicePicture->isValid() && !$servicePicture->hasMoved()) {
            // Generate a unique file name
            $newFileName = $servicePicture->getRandomName();

            // Move the uploaded file to the desired directory
            $servicePicture->move('./uploads', $newFileName);

            // Store the file path in the $data array
            $data['foto'] = './uploads/' . $newFileName;
        } else {
            // Handle the error if the file upload fails
            // Redirect, display an error message, or set a validation error
            return redirect()->back()->withInput()->with('error', 'Failed to upload service picture');
        }

        // Validate the form data
        if (empty($nama_kucing)) {
            // Handle the error, redirect, or display an error message
            return redirect()->back()->withInput()->with('error', 'Service Name is required');
        }

        // Insert the data into the database
        $KucingModel = new \App\Models\KucingModel();
        $data = [
            'nama_kucing' => $nama_kucing,
            'deskripsi' => $deskripsi,
            'foto' => './uploads/' . $newFileName // Store the file path in the database
        ];
        $KucingModel->insert($data);

        if($KucingModel){
            $session = session();
            $session->setFlashdata('berhasiltambahkucing', '<div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Selamat! Anda berhasil menambahkan kucing!</a>
                        </div>');
            return redirect()->to("admin/kucing");
        }else{
            return redirect()->to("admin/dashboard");
        }

	}

	public function delete_makanan($id_makanan)
    {
        $MakananModel = new \App\Models\MakananModel();
        $makanan = $MakananModel->find($id_makanan);

        if ($makanan) {
            // Delete the service from the database
            $MakananModel->delete($id_makanan);
            $session = session();
            $session->setFlashdata('berhasilhapusmakanan', '<div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Data makanan berhasil di hapus!</a>
                        </div>');
            return redirect()->to("admin/makanan");
        } else {
            // Service not found, redirect or display an error message
            return redirect()->to('admin/dashboard')->with('error', 'Service not found');
        }
    }

    public function delete_kucing($id_kucing)
    {
        $KucingModel = new \App\Models\KucingModel();
        $kucing = $KucingModel->find($id_kucing);

        if ($kucing) {
            // Delete the service from the database
            $KucingModel->delete($id_kucing);
            $session = session();
            $session->setFlashdata('berhasilhapuskucing', '<div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Data kucing berhasil di hapus!</a>
                        </div>');
            return redirect()->to("admin/kucing");
        } else {
            // Service not found, redirect or display an error message
            return redirect()->to('admin/dashboard')->with('error', 'Service not found');
        }
    }

    public function edit_makanan(){
    	if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }

        $page = $this->request->getGet('id_makanan');

        $MakananModel = new MakananModel();
        $data['makanan'] = $MakananModel->where('id_makanan', $page)->findAll();
        $data['page'] = $page;

        $header = view('admin/header');
        $mainContent = view('admin/edit_makanan', $data);
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function edit_kucing(){
    	if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }

        $page = $this->request->getGet('id_kucing');

        $KucingModel = new KucingModel();
        $data['kucing'] = $KucingModel->where('id_kucing', $page)->findAll();
        $data['page'] = $page;

        $header = view('admin/header');
        $mainContent = view('admin/edit_kucing', $data);
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
    }

    public function proses_edit_makanan()
    {
        $idt = $this->request->getPost('id_makanan');
        $nama_makanan = $this->request->getPost('makanan');
		$harga = $this->request->getPost('harga');

        // Retrieve the transaction from the database
        $MakananModel = new MakananModel();
        $makanan = $MakananModel->find($idt);

        if ($makanan) {
            // Update the status to "cancelled"
            $makanan->nama_makanan = $nama_makanan;
            $makanan->harga = $harga;
            
            // Save the updated transaction
            $MakananModel->save($makanan);

            $session = session();
            $session->setFlashdata('berhasileditmakanan', '<div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Selamat! Data berhasil di edit.<br>Silahkan Check.</a>
                        </div>');
            return redirect()->to("admin/makanan");
        } else {
            return redirect()->to("admin/dashboard");
        }
    }

    public function proses_edit_kucing()
    {
        $idt = $this->request->getPost('id_kucing');
        $nama_kucing = $this->request->getPost('kucing');
		$deskripsi = $this->request->getPost('deskripsi');

        // Retrieve the transaction from the database
        $KucingModel = new KucingModel();
        $kucing = $KucingModel->find($idt);

        if ($kucing) {
            // Update the status to "cancelled"
            $kucing->nama_kucing = $nama_kucing;
            $kucing->deskripsi = $deskripsi;
            
            // Save the updated transaction
            $KucingModel->save($kucing);

            $session = session();
            $session->setFlashdata('berhasileditkucing', '<div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Selamat! Data berhasil di edit.<br>Silahkan Check.</a>
                        </div>');
            return redirect()->to("admin/kucing");
        } else {
            return redirect()->to("admin/dashboard");
        }
    }

    public function kucing(){

		if (!$this->isLoggedIn()) {
            $session = session();
            $session->setFlashdata('belumloginpesan', '<div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <i class="icon-line-lock"></i>Anda harus login terlebih dahulu untuk mengakses halaman pemesanan kendaraan.<br>Silahkan Coba Login.</a>
                        </div>');
            return redirect()->to("home/masuk");
        }

        $KucingModel = new KucingModel();
        $data['kucing'] = $KucingModel->findAll();

        $header = view('admin/header');
        $mainContent = view('admin/kucing', $data);
        $footer = view('admin/footer');

        $fullView = $header . $mainContent . $footer;
        
        return $this->response->setBody($fullView);
	}

}