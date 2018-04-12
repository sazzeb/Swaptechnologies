<?php
class Members extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function _generate_thumbnail($file_name,$thumbnail_name)
{
    $config['image_library'] = 'gd2';
    $config['source_image'] = './users_img/big_pics/'.$file_name;
    $config['new_image'] = './users_img/small_pics/'.$thumbnail_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 80;
    $config['height']       = 80;

    $this->load->library('image_lib', $config);

    $this->image_lib->resize();
}


function do_upload($member_session_id)
{
    $this->load->module('member');
    $update_id = $this->_get_token_for_update_decrypt($member_session_id);

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_logged_in();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel") {
        redirect('members/upload/'.$member_session_id);
    }

    $config['upload_path']          = './users_img/big_pics/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 300;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name']            = $this->swaptechnologies_security->generate_random_string(14);
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>", "</p>"));
        $data['headline'] = "Upload Error";
        $data['update_id'] = $member_session_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "uploadfile";
        $this->load->module('templates');
        $this->templates->public_view($data);
    }
    else
    {
        //upload was successful
        $data = array('upload_data' => $this->upload->data());
        $upload_data = $data['upload_data'];

        //raw_name ...file_exit
        $raw_name=$upload_data['raw_name'];
        $file_ext = $upload_data['file_ext'];
        //generat thumbnail nam
        $thumbnail_name = $raw_name.'_thumb'.$file_ext;

        $file_name = $upload_data['file_name'];
        //update database
        $this->_generate_thumbnail($file_name, $thumbnail_name);
        $update_date['big_pic'] = $file_name;
        $update_date['small_pic'] = $file_name;
        $this->member->_update($update_id, $update_date);

        $data['headline'] = "Upload Success";
        $data['update_id'] = $member_session_id;
        $data['flash'] = $this->session->flashdata('item');
        redirect('members/welcome');
    }
}



function upload($member_session_id)
{
    $this->load->module('swaptechnologies_security');
    $this->load->library('session');
    $this->swaptechnologies_security->_make_sure_logged_in();

    $update_id = $this->_get_token_for_update_decrypt($member_session_id);
    if(!is_numeric($update_id))
    {
        redirect('swaptechnologies_security/not_allowed');
    }

    $data['member_session_id'] = $member_session_id;
    $data['headline'] = "Upload Image";
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "uploadfile";
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function logout()
{
    unset($_SESSION['user_id']);
    $this->load->module('site_cookies');
    $this->site_cookies->_destroy_cookie();
    redirect(base_url());
}

function _create_token_for_update_encrypt($session_id)
{
    $this->load->module('swaptechnologies_security');
    $encrypted_string = $this->swaptechnologies_security->_encrypt_string($session_id);
    //remove dodgy characters
    $checkout_token = str_replace('+', '-pl-', $encrypted_string);
    $checkout_token = str_replace('/', '-fd-', $checkout_token);
    $checkout_token = str_replace('=', '-ql-', $checkout_token);
    return $checkout_token;
}

function _get_token_for_update_decrypt($checkout_token)
{
    $this->load->module('swaptechnologies_security');
    //remove dodgy characters
    $session_id = str_replace('-pl-', '+', $checkout_token);
    $session_id = str_replace('-fd-', '/', $session_id);
    $session_id = str_replace('-ql-', '=', $session_id);
    $session_id = $this->swaptechnologies_security->_decrypt_string($session_id);
    return $session_id;
}

function welcome()
{
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_logged_in();

    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "members";
    $this->load->module('templates');
    $this->templates->public_view($data);
}


function _draw_users_id_content()
{
    $this->load->module('member');
    $this->load->module('swaptechnologies_security');

    $member_particulars = $this->swaptechnologies_security->_get_user_id();
    $data['query_single'] = $this->member->get_where_custom('id', $member_particulars);
    $data['member_session_id'] = $this->_create_token_for_update_encrypt($member_particulars);
    $data['user_session_id'] = $this->swaptechnologies_security->_get_user_id();

    $this->load->view('users_id_content', $data);
}


function get($order_by)
{
    $this->load->model('Mdl_members');
    $query = $this->Mdl_members->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_members');
    $query = $this->Mdl_members->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_members');
    $query = $this->Mdl_members->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_members');
    $query = $this->Mdl_members->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_members');
    $this->Mdl_members->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_members');
    $this->Mdl_members->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_members');
    $this->Mdl_members->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_members');
    $count = $this->Mdl_members->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_members');
    $max_id = $this->Mdl_members->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_members');
    $query = $this->Mdl_members->_custom_query($mysql_query);
    return $query;
}

}