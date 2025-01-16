<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_lib {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->model('User_model');
    }

    // Fungsi untuk memeriksa login
    public function login($username, $password)
    {
        $user = $this->CI->User_model->check_login($username, $password);
        if ($user) {
            $this->CI->session->set_userdata([
                'user_id' => $user->id,
                'username' => $user->username,
                'id_level' => $user->id_level,
                'role' => $user->role,
                'is_logged_in' => true
            ]);
            return true;
        }
        return false;
    }

    // Fungsi untuk mengecek apakah pengguna sudah login
    public function check_logged_in()
    {
        if (!$this->CI->session->userdata('is_logged_in')) {
            redirect('auth/login');
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        $this->CI->session->sess_destroy();
        redirect('auth/login');
    }
}
