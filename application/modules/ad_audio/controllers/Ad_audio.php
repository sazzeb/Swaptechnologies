<?php
class Ad_audio extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function _get_item_id_from_item_url($item_url)
{
    $query = $this->get_where_custom('item_url', $item_url);
    foreach($query->result() as $row) {
        $item_id = $row->id;
    }

    if (!isset($item_id)) {
        $item_id = 0;
    }

    return $item_id;
}

function _collect_presenter_cool_vibe()
{
    $this->load->helper('text');
    $mysql_query_show_all = "select * from ad_audio order by date_made desc";
    $data['query_show_all_audio'] = $this->_custom_query($mysql_query_show_all);
    $this->load->view('presenter_cool_vibe',$data);
}

function _draw_music_home_content()
{
    $this->load->helper('text');
    $mysql_query = "select * from ad_audio order by date_published desc limit 0,8";
    $data['music_content_query'] = $this->_custom_query($mysql_query);
    $this->load->view('music_home_content', $data);
}

function view($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $data['update_id'] = $update_id;
    $data['view_module'] = 'ad_audio';
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_view($data);
}


function _process_delete($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['small_pic'];

    $big_pic_path = './audio_mp3/images/big_pics/'.$big_pic;
    $small_picture = str_replace('.', '_thumb.', $small_pic);
    $small_pic_path = './audio_mp3/images/small_pics/'.$small_picture;

    //attempt to remove the images
    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    }

    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    }

    //delete the item record from store_items
    $this->_delete($update_id);
}

function image_delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel") {
        redirect('ad_audio/create/'.$update_id);
    } elseif ($submit=="Delete Item") {
        $this->_process_delete($update_id);

        $flash_msg = "The item image was successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('ad_audio/manage');  
    }    
}

function delete_image($update_id)
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);
    $big_pic = $data['big_pic'];
    $small_pic = $data['small_pic'];

    $big_pic_path = './audio_mp3/images/big_pics/'.$big_pic;
    $small_picture = str_replace('.', '_thumb.', $small_pic);
    $small_pic_path = './audio_mp3/images/small_pics/'.$small_picture;

    //attempt to remove the images
    if (file_exists($big_pic_path)) {
        unlink($big_pic_path);
    }

    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    }

    //update the database
    unset($data);
    $data['big_pic'] = "";
    $data['small_pic'] = "";
    $this->_update($update_id, $data);

    $flash_msg = "The item image was successfully deleted.";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);

    redirect('ad_audio/create/'.$update_id);
}

function _generate_thumbnail($file_name,$thumbnail_name)
{
    $config['image_library'] = 'gd2';
    $config['source_image'] = './audio_mp3/images/big_pics/'.$file_name;
    $config['new_image'] = './audio_mp3/images/small_pics/'.$thumbnail_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 100;
    $config['height']       = 100;

    $this->load->library('image_lib', $config);

    $this->image_lib->resize();
}


function upload_files($update_id)
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel") {
        redirect('ad_audio/create/'.$update_id);
    }

    $config['upload_path']          = './audio_mp3/images/big_pics/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 400;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name']            = $this->swaptechnologies_security->generate_random_string(29);
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile'))
    {
            $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>", "</p>"));
            $data['headline'] = "Upload Error";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image";
            $this->load->module('templates');
            $this->templates->admin_view($data);
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
            $this->_update($update_id, $update_date);

            $data['headline'] = "Upload Success";
            $data['update_id'] = $update_id;
            $data['flash'] = $this->session->flashdata('item');
            $data['view_file'] = "upload_image_success";
            $this->load->module('templates');
            $this->templates->admin_view($data);
    }
}



function upload_image($update_id) 
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();
 
    $data['headline'] = "Add Image To Song";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "upload_image";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}

function _process_delete_audio($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $audio_mp3 = $data['audio_mp3'];
    $small_pic = $data['small_pic'];

    $audio_mp3_path = './audio_mp3/audio'.$audio_mp3;

    //attempt to remove the images
    if (file_exists($audio_mp3_path)) {
        unlink($audio_mp3_path);
    }

    if (file_exists($small_pic_path)) {
        unlink($small_pic_path);
    }

    //delete the item record from store_items
    $this->_delete($update_id);
}

function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel") {
        redirect('ad_audio/create/'.$update_id);
    } elseif ($submit=="Delete Item") {
        $this->_process_delete_audio($update_id);

        $flash_msg = "The item image was successfully deleted.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);

        redirect('ad_audio/manage');  
    }    
}

function deleteconf($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data['headline'] = "Delete Item";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "deleteconf";
    $this->load->module('templates');
    $this->templates->admin_view($data);        
}

function delete_audio($update_id)
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($update_id);
    $audio_mp3 = $data['audio_mp3'];
    //$small_pic = $data['small_pic'];

    $audio_mp3_path = './audio_mp3/audio'.$audio_mp3;
    //$small_pic_path = './music_pic/small_pics/'.$small_pic;

    //attempt to remove the images
    if (file_exists($audio_mp3_path)) {
        unlink($audio_mp3_path);
    }
    
    //update the database
    unset($data);
    $data['audio_mp3'] = "";
    //$data['small_pic'] = "";
    $this->_update($update_id, $data);

    $flash_msg = "The item image was successfully deleted.";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);

    redirect('ad_audio/create/'.$update_id);
}

function do_upload($update_id)
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit = $this->input->post('submit', TRUE);
    if ($submit=="Cancel") {
        redirect('ad_audio/create/'.$update_id);
    }

    $config['upload_path']          = './audio_mp3/audio';
    $config['allowed_types']        = 'mp3|wav|wma';
    $config['file_name']            = $this->swaptechnologies_security->generate_random_string(29);
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>", "</p>"));
        $data['headline'] = "Upload Error";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "upload_audio";
        $this->load->module('templates');
        $this->templates->admin_view($data);
    }
    else
    {
        //upload was successful
        $data = array('upload_data' => $this->upload->data());
        $upload_data = $data['upload_data'];

        //raw_name ...file_exit
        $raw_name=$upload_data['raw_name'];
        $file_ext = $upload_data['file_ext'];

        $file_name = $upload_data['file_name'];
        //update database
        $update_date['audio_mp3'] = $file_name;
        $this->_update($update_id, $update_date);

        $data['headline'] = "Upload Success";
        $data['update_id'] = $update_id;
        $data['flash'] = $this->session->flashdata('item');
        $data['view_file'] = "upload_success";
        $this->load->module('templates');
        $this->templates->admin_view($data);
    }
}

function upload_audio($update_id) 
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();
 
    $data['headline'] = "Upload Audio Format";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "upload_audio";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}


function create()
{
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->load->module('swaptechnologies_settings');
    $this->swaptechnologies_security->_make_sure_is_admin();
    $this->load->module('timedate');

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);

    if ($submit=="Cancel") {
        redirect('ad_audio/manage');
    }

    if ($submit=="Submit") {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_title', 'Item Title', 'trim|required|max_length[240]');//|callback_item_check come back
        $this->form_validation->set_rules('item_description', 'Item Description', 'trim|required');
        $this->form_validation->set_rules('artist', 'Artist Name', 'trim|required|max_length[240]');
        $this->form_validation->set_rules('label', 'date published', 'trim|max_length[60]');
        $this->form_validation->set_rules('date_published', 'date published', 'trim|max_length[60]');

        if ($this->form_validation->run() == TRUE) {
            //get the variables
            $data = $this->fetch_data_from_post();
            $data['item_url'] = url_title($data['item_title']);
            //convert the datepicker into a unix timestamp
            $data['date_published'] = $this->timedate->make_timestamp_from_datepicker_us($data['date_published']);

            if (is_numeric($update_id)) {
                //update the item details
                $this->_update($update_id, $data);
                $flash_msg = "The item details were successfully updated.";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('ad_audio/create/'.$update_id);
            } else {
                //insert a new item
                $data['date_made'] = time();
                $this->_insert($data);
                $update_id = $this->get_max(); //get the ID of the new item
                $flash_msg = "The item was successfully added.";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('ad_audio/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
        $data['date_publish'] = $this->timedate->get_nice_date($data['date_published'], 'full');
        $data['imageDisplay'] = '<img src="'.base_url().'audio_mp3/images/big_pics/'.$data['big_pic'].'">';
    } else {
        $data = $this->fetch_data_from_post();
        $data['audio_mp3'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Add New Audio";
    } else {
        $data['headline'] = "Update Audio Details";
    }

    if ($data['date_published']>0) {
        //it must be a unix timestamp, so covert to datepicker format
        $data['date_published'] = $this->timedate->get_nice_date($data['date_published'], 'datepicker_us');
    }

    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "create";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}

function manage()
{
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();
    
    $data['headline'] = 'Manage Images';
    $data['query'] = $this->get('date_published desc');
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}




function fetch_data_from_post() 
{
    $data['item_title'] = $this->input->post('item_title', TRUE);
    $data['artist'] = $this->input->post('artist', TRUE);
    $data['album'] = $this->input->post('album', TRUE);
    $data['label'] = $this->input->post('label', TRUE);
    $data['date_published'] = $this->input->post('date_published', TRUE);
    $data['item_description'] = $this->input->post('item_description', TRUE);
    return $data;
}

function fetch_data_from_db($update_id) 
{

    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        //`item_title`, `item_url`, `item_price`, `item_description`, `audio_mp3`, `picture`, `was_price`
        $data['item_title'] = $row->item_title;
        $data['item_url'] = $row->item_url;
        $data['artist'] = $row->artist;
        $data['label'] = $row->label;
        $data['album'] = $row->album;
        $data['date_published'] = $row->date_published;
        $data['item_description'] = $row->item_description;
        $data['audio_mp3'] = $row->audio_mp3;
        $data['big_pic'] = $row->big_pic;
        $data['small_pic'] = $row->small_pic;
    }

    if (!isset($data)) {
        $data = "";
    }

    return $data;
}

function get($order_by)
{
    $this->load->model('Mdl_add_audio');
    $query = $this->Mdl_add_audio->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_add_audio');
    $query = $this->Mdl_add_audio->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_add_audio');
    $query = $this->Mdl_add_audio->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_add_audio');
    $query = $this->Mdl_add_audio->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_add_audio');
    $this->Mdl_add_audio->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_add_audio');
    $this->Mdl_add_audio->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_add_audio');
    $this->Mdl_add_audio->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_add_audio');
    $count = $this->Mdl_add_audio->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_add_audio');
    $max_id = $this->Mdl_add_audio->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_add_audio');
    $query = $this->Mdl_add_audio->_custom_query($mysql_query);
    return $query;
}

function item_check($str) 
{

    $item_url = url_title($str);
    $mysql_query = "select * from ad_audio where item_title='$str' and item_url='$item_url'";

    $update_id = $this->uri->segment(3);
    if (is_numeric($update_id)) {
        //this is an update
        $mysql_query.= " and id!=$update_id";
    }

    $query = $this->_custom_query($mysql_query);
    $num_rows = $query->num_rows();

    if ($num_rows>0)
    {
        $this->form_validation->set_message('item_check', 'The item title that you submitted is not available');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}

}