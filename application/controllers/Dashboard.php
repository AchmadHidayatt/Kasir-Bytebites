<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(['url', 'auth']); // Helper untuk cek akses
        $this->load->model(['User_model', 'Menu_model', 'Order_model', 'Transaction_model']); // Load model
    }

    public function index() {
        $role = $this->session->userdata('id_level');
        switch ($role) {
            case 1: // Owner
                $this->owner();
                break;
            case 2: // Administrator
                $this->admin();
                break;
            case 3: // Waiter
                $this->waiter();
                break;
            case 4: // Kasir
                $this->kasir();
                break;
            case 5: // Pelanggan
                $this->pelanggan();
                break;
            default:
                redirect('auth/login');
        }
    }

    public function admin() {
        check_role([2]); // Validasi role administrator
        $data['title'] = 'Administrator Dashboard';
        // $data['total_users'] = $this->User_model->count_users();
        // $data['total_menu'] = $this->Menu_model->count_menu();
        // $data['total_transactions'] = $this->Transaction_model->count_today();
        $this->load->view('templates/header/header');
		$this->load->view('templates/sidebar/sidebar_admin');
        $this->load->view('dashboard/dashboard_admin', $data);
    }

    public function owner() {
        check_role([1]); // Validasi role owner
        $data['title'] = 'Owner Dashboard';
        // $data['income'] = $this->Transaction_model->get_monthly_income();
        // $data['top_menu'] = $this->Menu_model->get_top_menu();
		$this->load->view('template');
        $this->load->view('dashboard/dashboard_owner', );
    }

    public function waiter() {
        check_role([3]); // Validasi role waiter
        // $data['title'] = 'Waiter Dashboard';
        // $data['orders'] = $this->Order_model->get_active_orders();
		$this->load->view('template');
        $this->load->view('dashboard/dashboard_waiter', );
    }

    public function kasir() {
        check_role([4]); // Validasi role kasir
        // $data['title'] = 'Kasir Dashboard';
        // $data['transactions'] = $this->Transaction_model->get_today_transactions();
		$this->load->view('template');
        $this->load->view('dashboard/dashboard_kasir', );
    }

    public function pelanggan() {
        check_role([5]); // Validasi role pelanggan
        $data['title'] = 'Pelanggan Dashboard';
        // $data['menu'] = $this->Menu_model->get_available_menu();
        // $data['orders'] = $this->Order_model->get_customer_orders($this->session->userdata('user_id'));
		$this->load->view('template');
        $this->load->view('dashboard/dashboard_pelanggan', );
    }
}

