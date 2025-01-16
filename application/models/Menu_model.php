<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

    public function get($id = null)
    {
        $this->db->select('masakan');
        $this->db->from('masakan');
        
        if ($id != null) {
            $this->db->where('menu_id', $id);
        }
        
        $query = $this->db->get();
        return $query;
    }    

    public function add($post)
{
    $params = [
        'nama_masakan' => $post['nama_masakan'],
        'gambar' => $post['gambar'],
        'kategori' => $post['kategori'],
        'harga' => $post['harga'],
        'status_masakan' => $post['status_masakan'], // Ganti 'prince' dengan 'price'
    ];
    $this->db->insert('masakan', $params);
}

public function edit($post)
{
    $params = [
        'nama_masakan' => $post['nama_masakan'],
        'gambar' => $post['gambar'],
        'kategori' => $post['kategori'],
        'harga' => $post['harga'],
        'status_masakan' => $post['status_masakan'], // Ganti 'prince' dengan 'price'
    ];
    if($post['gambar'] != null) {
    $params['gambar'] = $post['gambar'];
    }
    $this->db->where('menu_id', $post['id']);
    $this->db->update('masakan', $params);
}


public function del($id)
{
    $this->db->where('menu_id', $id);
    $delete = $this->db->delete('masakan'); // Menggunakan tabel p_menu
    
    if ($delete) {
        return TRUE; // Berhasil dihapus
    } else {
        return FALSE; // Gagal dihapus
    }
}

}