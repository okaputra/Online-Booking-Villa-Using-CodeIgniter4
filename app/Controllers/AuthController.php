<?php

namespace App\Controllers;
use App\Models\Users;
use Config\Services;
class AuthController extends BaseController
{
    // USER
    // AKSES: 0=USER, 1=ADMIN

    public function index(){
        return view('login');
    }
    public function postLogin(){
        $session = session();
        $model = new Users();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->where('akses',0)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'            => $data['id'],
                    'username'      => $data['username'],
                    'name'          => $data['name'],
                    'address'       => $data['address'],
                    'no_wa'         => $data['no_wa'],
                    'islogin'       => TRUE,
                    'akses'         => $data['akses'],
                ];
                $session->set($ses_data);
                session()->setFlashdata("success", "Login Success");
                return redirect()->to('/dashboard');
            }else{
                session()->setFlashdata("error", "Wrong Password");
                return redirect()->to('/login-section');
            }
        }else{
            session()->setFlashdata("error", "Login Credentials Not Found");
            return redirect()->to('/login-section');
        }
    }
    public function register(){
        return view('register');
    }
    public function postRegister(){
        helper(['form']);

        $data = [
            'username'     => $this->request->getVar('username'),
            'name'         => $this->request->getVar('name'),
            'address'      => $this->request->getVar('address'),
            'no_wa'        => $this->request->getVar('no_wa'),
            'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'password_confirmation' => password_hash($this->request->getPost('password_confirmation'),PASSWORD_DEFAULT),
            'akses'        => 0,
        ];

        $rules = [
            'username' => [
                'label' => 'username',
                'rules' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.username]',
                'errors' => [
                    'valid_email'   => 'username must be a valid email address.',
                    'is_unique'     => 'email is already taken.',
                ],
            ],
            'name'                  => 'required',
            'address'               => 'required',
            'no_wa' => [
                'label' => 'no_wa',
                'rules' => 'required|regex_match[/^\+\d{1,3}\d{9,}$/]',
                'errors' => [
                    'regex_match' => 'The telephone number must be a valid phone number with a country code.',
                ],
            ],
            'password'              => 'required|min_length[6]|max_length[200]',
            'password_confirmation' => [
                'label' => 'password_confirmation',
                'rules' =>  'matches[password]',
                'errors' => [
                    'matches'   => 'Password Confirmation does not match!',
                ],
            ],
        ];

        // Validate the input data
        $validation = Services::validation();
        $validation->setRules($rules);
         
        if($this->validate($rules)){
            $model = new Users();
            $model->save($data);
            session()->setFlashdata("success", "Register Succesfully, Please Login!");
            return redirect()->to('/login-section');
        }else if(!$validation->run($data)){

            // If validation fails, get the validation errors
            $errors = $validation->getErrors();

            // Convert the errors array into a string
            $errorString = '';
            foreach ($errors as $error) {
                $errorString .= $error;
            }

            // Return the error message using SweetAlert
            session()->setFlashdata("error", $errorString);
            return redirect()->to('/register');
        }
    }
    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    // ADMIN AUTH

    public function adminLogin(){
        return view('login-admin');
    }
    public function adminLogout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login-section-admin');
    }
    public function postLoginAdmin(){
        $session = session();
        $model = new Users();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->where('akses',1)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'            => $data['id'],
                    'username'      => $data['username'],
                    'name'          => $data['name'],
                    'address'       => $data['address'],
                    'no_wa'         => $data['no_wa'],
                    'isadmin'       => TRUE,
                    'akses'         => $data['akses'],
                ];
                $session->set($ses_data);
                session()->setFlashdata("success", "Login Admin Success");
                return redirect()->to('/admin-dashboard');
            }else{
                session()->setFlashdata("error", "Wrong Password");
                return redirect()->to('/login-section-admin');
            }
        }else{
            session()->setFlashdata("error", "Login Credentials Not Found");
            return redirect()->to('/login-section-admin');
        }
    }

}
