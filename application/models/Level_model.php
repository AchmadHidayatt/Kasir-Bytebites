<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mendapatkan level pengguna
    public function get_level($id_level)
    {
        $this->db->where('id_level', $id_level);
        $query = $this->db->get('level'); // Pastikan nama tabel sesuai dengan yang ada di database

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data level
        } else {
            return false; // Tidak ada data level yang ditemukan
        }
    }
}
