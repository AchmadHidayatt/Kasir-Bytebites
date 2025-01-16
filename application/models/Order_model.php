<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua pesanan yang aktif
    public function get_active_orders()
    {
        $this->db->where('status', 'active'); // Menampilkan pesanan dengan status aktif
        $query = $this->db->get('orders'); // 'orders' adalah nama tabel pesanan
        return $query->result(); // Mengembalikan hasil query sebagai array objek
    }

    // Fungsi untuk mengambil pesanan berdasarkan ID pesanan
    public function get_order_by_id($id_order)
    {
        $this->db->where('id_order', $id_order);
        $query = $this->db->get('orders'); // 'orders' adalah nama tabel pesanan
        return $query->row(); // Mengembalikan data pesanan berdasarkan ID
    }

    // Fungsi untuk menambahkan pesanan baru
    public function add_order($data)
    {
        return $this->db->insert('orders', $data); // Menambahkan data pesanan ke dalam tabel 'orders'
    }

    // Fungsi untuk mengupdate pesanan
    public function update_order($id_order, $data)
    {
        $this->db->where('id_order', $id_order);
        return $this->db->update('orders', $data); // Mengupdate data pesanan berdasarkan ID
    }

    // Fungsi untuk mengubah status pesanan menjadi 'completed'
    public function complete_order($id_order)
    {
        $this->db->where('id_order', $id_order);
        return $this->db->update('orders', ['status' => 'completed']); // Mengubah status pesanan menjadi 'completed'
    }

    // Fungsi untuk menghapus pesanan
    public function delete_order($id_order)
    {
        $this->db->where('id_order', $id_order);
        return $this->db->delete('orders'); // Menghapus pesanan berdasarkan ID
    }

    // Fungsi untuk mengambil pesanan berdasarkan ID pelanggan
    public function get_customer_orders($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get('orders'); // 'orders' adalah nama tabel pesanan
        return $query->result(); // Mengembalikan semua pesanan berdasarkan ID pelanggan
    }
}
