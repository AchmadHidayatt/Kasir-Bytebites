<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    // Fungsi untuk mengambil semua transaksi
    public function get_all_transactions()
    {
        $query = $this->db->get('transactions'); // 'transactions' adalah nama tabel transaksi
        return $query->result(); // Mengembalikan hasil query sebagai array objek
    }

    // Fungsi untuk mengambil transaksi berdasarkan ID transaksi
    public function get_transaction_by_id($id_transaction)
    {
        $this->db->where('id_transaction', $id_transaction);
        $query = $this->db->get('transactions');
        return $query->row(); // Mengembalikan data transaksi berdasarkan ID
    }

    // Fungsi untuk menambahkan transaksi baru
    public function add_transaction($data)
    {
        return $this->db->insert('transactions', $data); // Menambahkan transaksi baru ke dalam tabel 'transactions'
    }

    // Fungsi untuk mengupdate transaksi
    public function update_transaction($id_transaction, $data)
    {
        $this->db->where('id_transaction', $id_transaction);
        return $this->db->update('transactions', $data); // Mengupdate transaksi berdasarkan ID
    }

    // Fungsi untuk menghapus transaksi
    public function delete_transaction($id_transaction)
    {
        $this->db->where('id_transaction', $id_transaction);
        return $this->db->delete('transactions'); // Menghapus transaksi berdasarkan ID
    }

    // Fungsi untuk mengambil transaksi berdasarkan ID pelanggan
    public function get_transactions_by_customer($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get('transactions'); // 'transactions' adalah nama tabel transaksi
        return $query->result(); // Mengembalikan semua transaksi berdasarkan ID pelanggan
    }

    // Fungsi untuk mengambil transaksi berdasarkan status
    public function get_transactions_by_status($status)
    {
        $this->db->where('status', $status);
        $query = $this->db->get('transactions');
        return $query->result(); // Mengembalikan transaksi berdasarkan status
    }
}
