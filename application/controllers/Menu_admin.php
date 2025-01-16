<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_admin extends CI_Controller {

    function __construct ()
    {
        parent::__construct();
        $this->load->model(['menu_model', 'category_m', 'unit_m']);
        
    }

    public function index()
    {
        $data['row'] = $this->menu_model->get();
        $this->load->view('templates/header/header');
		$this->load->view('templates/sidebar/sidebar_admin');
        $this->load->view('admin/menu/menu_admin', $data);
    }

    public function add()
    {
        $menu = new stdClass();
        $menu->menu_id = null;
        $menu->nama_masakan = null;
        $menu->gambar = null;
        $menu->kategori = null;
        $menu->harga = null; // Menggunakan category_id, bukan category
        $menu->status_masakan = null;

        $query_category = $this->category_m->get();
        $query_unit = $this->unit_m->get();
        $unit[null] = '- Pilih -';
        foreach($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->nama_masakan;
        }

        $data = array(
            'page' => 'Add',
            'row' => $menu,
            'category' => $query_category,
            'unit' => $unit,
            'selectedunit' => null,
        );
        $this->template->load('template', 'product/menu/menu_form', $data);
    }

    public function edit($id)
    {
        $query = $this->menu_m->get($id);
        if ($query->num_rows() > 0) {
            $menu = $query->row();
            $query_category = $this->category_m->get();
            $query_unit = $this->unit_m->get();
            $unit[null] = '- Pilih -';
            foreach($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->nama_masakan;
            }

            $data = array(
                'page' => 'edit', // Menghilangkan spasi tambahan
                'row' => $menu,
                'category' => $query_category,
                'unit' => $unit,
                'selectedunit' => $menu->unit_id,
            );
            $this->template->load('template', 'product/menu/menu_form', $data);
        } else {
            echo "<script>
                    swal({
                        title: 'Error!',
                        text: 'Data tidak dmenuukan',
                        icon: 'error',
                        button: 'OK',
                    }).then(function() {
                        window.location='" . site_url('menu') . "'; 
                    });
                  </script>";
        }
    }

    public function process()
    {
        $config['upload_path']     = './uploads/product/';
        $config['allowed_types']   = 'gif|jpg|png|jpeg';
        $config['max_size']        = 2048; 
        $config['file_nama_masakan']       = 'menu-' . date('ymd') . '_' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($post['add'])) {
            // Cek untuk add menu
            if ($this->menu_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('menu/add');
            } else {
                // Proses penambahan menu
                if (@$_FILES['gambar']['nama_masakan'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $post['gambar'] = $this->upload->data('file_nama_masakan');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('menu/add');
                    }
                } else {
                    $post['gambar'] = null; // Tidak ada gambar yang diupload
                }

                $this->menu_m->add($post); // Menambahkan menu
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('menu'); // Redirect ke menu setelah berhasil menambah
            }
        } elseif (isset($post['edit'])) {
            // Cek untuk edit menu
            if ($this->menu_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('menu/edit/' . $post['id']);
            } else {
                if (@$_FILES['gambar']['nama_masakan'] != null) {
                    if ($this->upload->do_upload('gambar')) {
                        $menu = $this->menu_m->get($post['id'])->row();
                        if ($menu->gambar != null) {
                            $target_file = './uploads/product/' . $menu->gambar; // Pastikan menambahkan './' di depan
                            if (file_exists($target_file)) {
                                unlink($target_file);
                            }
                        }

                        $post['gambar'] = $this->upload->data('file_nama_masakan');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('menu/edit/' . $post['id']); // Redirect ke edit jika upload gagal
                    }
                } else {
                    $post['gambar'] = null; // Menetapkan gambar ke null jika tidak ada upload
                }

                // Mengupdate menu, menggunakan metode edit
                $this->menu_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil diupdate');
                }
                redirect('menu');
            }
        }
    }

    public function del($id)
{
    $menu = $this->menu_m->get($id)->row();
    if ($menu->gambar != null) {
        $target_file = './uploads/product/' . $menu->gambar; 
        if (file_exists($target_file)) {
            unlink($target_file);
        }
    }

    if ($this->menu_m->del($id)) {
        $this->session->set_flashdata('success', 'Data menu berhasil dihapus');
    } else {
        $this->session->set_flashdata('error', 'Data menu gagal dihapus');
    }
    redirect('menu');
}


    
}
