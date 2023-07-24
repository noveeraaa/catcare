<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\MakananModel;
use App\Models\KucingModel;

class Home extends BaseController
{
    protected $session;
    protected $db;

    public function __construct(){
        $this->session = session();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $MakananModel = new MakananModel();
        $data['makanan'] = $MakananModel->findAll();

        $KucingModel = new KucingModel();
        $data['kucing'] = $KucingModel->findAll();

        return view('index', $data);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function create() {
        $usermodel = new UserModel();
  
        $plainPassword = $this->request->getPost("password");
        $hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);
  
        $result = $usermodel->insert([
           'nama'=>$this->request->getPost("nama"),
           'username'=>$this->request->getPost("username"),
           'password'=> $hashedPassword,
           'level' => 'user'
        ]);
  
        if($result==true) {
              $session = session();
              $session->setFlashdata('berhasilbuatakun', '<div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon-line-lock"></i>Selamat! Akun Berhasil Dibuat.<br>Silahkan Login.</a>
                          </div>');
              return redirect()->to("home/login");
          }else{
              $session = session();
              $session->setFlashdata('gagalbuatakun', '<div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon-line-lock"></i>Maaf! Akun Gagal Dibuat.<br>Silahkan Coba Lagi.</a>
                          </div>');
              return redirect()->to("home/login");
          }
  
     }


    //ini fungsi login
    public function masuk()
    {
        $users = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $users->where([
            'username' => $username,
        ])->first();

        if ($dataUser) {
            if (password_verify($password, $dataUser->password)) {
                if ($dataUser->level == 'admin') {
                    session()->set([
                        'username' => $dataUser->username,
                        'level' => $dataUser->level,
                        'nama' => $dataUser->nama,
                        'id_user' => $dataUser->id_user,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('admin/index'));
                } elseif ($dataUser->level == 'user') {
                    session()->set([
                        'username' => $dataUser->username,
                        'nama' => $dataUser->nama,
                        'level' => $dataUser->level,
                        'logged_in' => TRUE
                    ]);
                    return redirect()->to(base_url('user/index'));
                } else {
                    $session = session();
                    // Invalid user level
                    session()->setFlashdata('error', 'Invalid user level');
                    return redirect()->to(base_url('home/index'));
                }
            } else {
                $session = session();
                $session->setFlashdata('salahpw', '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Maaf, Password Anda Salah<br>Silahkan coba kembali.</a>
                            </div>');
                return redirect()->to(base_url('home/login'));
            }
        } else {
            $session = session();
            $session->setFlashdata('salah', '<div class="alert alert-danger">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <i class="icon-line-lock"></i>Maaf, Username & Password Anda Salah<br>Silahkan coba kembali.</a>
                            </div>');
            return redirect()->to(base_url('home/login'));
        }        
    }

    public function logout(){
        $session = session();
        $session->destroy();

        return redirect()->to(base_url());
    }
}
