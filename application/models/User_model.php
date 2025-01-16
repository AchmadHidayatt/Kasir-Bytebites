<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk memeriksa login
    public function check_login($username, $password)
    {
        // Cek apakah username dan password cocok dengan data di database
        $this->db->where('username', $username);
        $this->db->where('password', $password); // Jika password belum di-hash, ganti dengan hashing method yang sesuai
        $query = $this->db->get('user'); // Pastikan nama tabel sesuai dengan yang ada di database

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data pengguna yang ditemukan
        } else {
            return false; // Tidak ada data yang ditemukan
        }
    }
}
