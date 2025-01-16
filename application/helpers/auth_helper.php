<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function check_role($allowed_roles)
{
    $CI =& get_instance();
    $role = $CI->session->userdata('id_level');
    
    if (!in_array($role, $allowed_roles)) {
        redirect('auth/login'); // Redirect jika role tidak sesuai
    }
}
