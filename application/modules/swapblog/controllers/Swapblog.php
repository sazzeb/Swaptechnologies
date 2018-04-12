<?php
class Swapblog extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function view($update_id)
{
   if (!is_numeric($update_id)) {
        redirect('invalid/error');
    }
    // fetch data in store
    $query = $this->get_where($update_id);

    foreach($query->result() as $row)
    {
        $data['page_title'] = $row->page_title;
        $data['page_description'] = $row->page_description;
        $big_pic = $row->big_pic;
        $data['img_mark'] = base_url().'blog/big_pics/'.$big_pic; 
    }
    $data['flash'] = $this->session->flashdata('item');
    $data['view_module'] = "swapblog";
    $data['view_file'] = "view";
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function _get_cat_id_from_cat_url($page_url)
{
    $query = $this->get_where_custom('page_url', $page_url);
    foreach($query->result() as $row) {
        $page_id = $row->id;
    }

    if (!isset($page_id)) {
        redirect('invalid/error');
    }

    return $page_id;
}

function _get_full_cat_url($update_id)
{
    $items_segments = $this->setting_component->_get_blod_segments();
    $data = $this->fetch_data_from_db($update_id);
    $page_url = $data['page_url'];

    $full_cat_url = base_url().$items_segments.$page_url;
    return $full_cat_url;
}

function _process_delete($update_id)
{
    //delete the page
    $this->_delete($update_id);

    //attempt to delete item from the store items
}

function delete($update_id)
{
    if(!is_numeric($update_id)){
    redirect('invalid/error');

}
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit=$this->input->post('submit',TRUE);
    if($submit=='Cancel')
    {
        redirect('swapblog/create/'.$update_id);
    }elseif($submit=='Yes - Delete  Blog Entry'){
        $this->_process_delete($update_id);

        $flash_msg = "The Blog Entry was successfully deleted";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('page',$value);

        redirect('swapblog/manage');
    }

}

function deleteconf($update_id){
    if(!is_numeric($update_id)){
    redirect('invalid/error');

}
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();


    $data['headline'] = "Delete  Entry";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('page');
    $data['view_file'] = 'deleteconf';
    $this->load->module('templates');
    $this->templates->admin_view($data);
}



function _draw_feed_hp()
{
    $this->load->helper('text');
    $mysql_query = "select * from swapblog order by date_published desc limit 0,4";
    $data['query'] = $this->_custom_query($mysql_query);
    $this->load->view('drill', $data);
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

    $big_pic_path = './blog/big_pics/'.$big_pic;
    $small_pic_path = './blog/small_pics/'.$small_pic;

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

    redirect('swapblog/create/'.$update_id);
}


function _generate_thumbnail($file_name,$thumbnail_name)
{
    $config['image_library'] = 'gd2';
    $config['source_image'] = './blog/big_pics/'.$file_name;
    $config['new_image'] = './blog/small_pics/'.$thumbnail_name;
    $config['maintain_ratio'] = TRUE;
    $config['width']         = 200;
    $config['height']       = 200;

    $this->load->library('image_lib', $config);

    $this->image_lib->resize();
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
        redirect('swapblog/create/'.$update_id);
    }

    $config['upload_path']          = './blog/big_pics/';
    $config['allowed_types']        = 'jpg|png';
    $config['max_size']             = 200;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;
    $config['file_name']            = $this->swaptechnologies_security->generate_random_string(29);
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile'))
    {
        $data['error'] = array('error' => $this->upload->display_errors("<p style='color: red;'>", "</p>"));
        $data['headline'] = "The format is invalid";
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
        $data['view_file'] = "upload_success";
        $this->load->module('templates');
        $this->templates->admin_view($data);
    }
}

function upload_image($update_id)
{
if(!is_numeric($update_id)){
    redirect('invalid/error');

}
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);


    $data['headline'] = "Upload Image, You have not uploaded any image, or that image format is not allowed, or too big";
    $data['update_id'] = $update_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = 'upload_image';
    $this->load->module('templates');
    $this->templates->admin_view($data);
}

function create() 
{

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $update_id = $this->uri->segment(3);
    $submit = $this->input->post('submit', TRUE);
    $this->load->module('timedate');

    if ($submit=="Cancel") {
        redirect('swapblog/manage');
    }

    if ($submit=="Submit") {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('date_published', 'Date Published', 'required');
        $this->form_validation->set_rules('page_title', 'Title', 'required|max_length[250]');
        $this->form_validation->set_rules('page_content', 'Page Content', 'required');

        if ($this->form_validation->run() == TRUE) {
            //get the variables
            $data = $this->fetch_data_from_post();
            $data['page_url'] = url_title($data['page_title']);
            //convert the datepicker into a unix timestamp
            $data['date_published'] = $this->timedate->make_timestamp_from_datepicker_us($data['date_published']);

            if (is_numeric($update_id)) {
                //update the page details
                $this->_update($update_id, $data);
                $flash_msg = "The blog entry details were successfully updated.";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('swapblog/create/'.$update_id);
            } else {
                //insert a new page
                $data['date_made'] = time();
                $this->_insert($data);
                $update_id = $this->get_max(); //get the ID of the new page
                $flash_msg = "The blog entry was successfully created.";
                $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                redirect('swapblog/create/'.$update_id);
            }
        }
    }

    if ((is_numeric($update_id)) && ($submit!="Submit")) {
        $data = $this->fetch_data_from_db($update_id);
    } else {
        $data = $this->fetch_data_from_post();
        $data['big_pic'] = "";
    }

    if (!is_numeric($update_id)) {
        $data['headline'] = "Create New Blog Entry";
    } else {
        $data['headline'] = "Update Blog Entry Details";
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
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();
    $data['flash'] = $this->session->flashdata('item');

    
    $data['query'] = $this->get('date_published desc');
    $data['view_file'] = "manage";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}
function fetch_data_from_post() 
{
    $data['firstname'] = $this->input->post('firstname', TRUE);
    $data['lastname'] = $this->input->post('lastname', TRUE);
    $data['page_title'] = $this->input->post('page_title', TRUE);
    $data['page_keywords'] = $this->input->post('page_keywords', TRUE);
    $data['page_description'] = $this->input->post('page_description', TRUE);
    $data['page_content'] = $this->input->post('page_content', TRUE);
    $data['date_published'] = $this->input->post('date_published', TRUE);
    return $data;
}

function fetch_data_from_db($update_id) 
{

    if (!is_numeric($update_id)) {
        redirect('invalid/error');
    }

    $query = $this->get_where($update_id);

    foreach($query->result() as $row) {
        $data['page_title'] = $row->page_title;
        $data['page_url'] = $row->page_url;
        $data['page_keywords'] = $row->page_keywords;
        $data['page_content'] = $row->page_content;
        $data['page_description'] = $row->page_description;
        $data['date_published'] = $row->date_published;
        $data['firstname'] = $row->firstname;
        $data['lastname'] = $row->lastname;
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
    $this->load->model('Mdl_swapblog');
    $query = $this->Mdl_swapblog->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_swapblog');
    $query = $this->Mdl_swapblog->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_swapblog');
    $query = $this->Mdl_swapblog->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_swapblog');
    $query = $this->Mdl_swapblog->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_swapblog');
    $this->Mdl_swapblog->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_swapblog');
    $this->Mdl_swapblog->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_swapblog');
    $this->Mdl_swapblog->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_swapblog');
    $count = $this->Mdl_swapblog->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_swapblog');
    $max_id = $this->Mdl_swapblog->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_swapblog');
    $query = $this->Mdl_swapblog->_custom_query($mysql_query);
    return $query;
}

}