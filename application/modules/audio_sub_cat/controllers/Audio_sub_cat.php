<?php
class Audio_sub_cat extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function delete($update_id)
{
    if (!is_numeric($update_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    //fetch the item_id
    $query = $this->get_where($update_id);
    foreach($query->result() as $row) {
        $item_id = $row->item_id;
    }

    $this->_delete($update_id);

    $flash_msg = "The option was successfully deleted.";
    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
    $this->session->set_flashdata('item', $value);

    redirect('audio_sub_cat/update/'.$item_id);
}

function submit($item_id)
{
    if (!is_numeric($item_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin(); 
    
    $submit = $this->input->post('submit', TRUE);
    $cat_id = trim($this->input->post('cat_id', TRUE));

    if ($submit=="Finished") {
        redirect('ad_audio/create/'.$item_id);
    } elseif ($submit=="Submit") {
        
        //attempt an insert
        if ($cat_id!="") {
            $data['item_id'] = $item_id;
            $data['cat_id'] = $cat_id;
            $this->_insert($data);

            $this->load->module('audiocat');
            $cat_title = $this->audiocat->_get_cat_title($cat_id);

            $flash_msg = "The item was successfully assigned to the ".$cat_title." category.";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
        }
    }

    redirect('audio_sub_cat/update/'.$item_id);
}

function update($item_id)
{

    if (!is_numeric($item_id)) {
        redirect('swaptechnologies_security/not_allowed');
    }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    //get an array of all sub categories on the site
    $this->load->module('audiocat');
    $sub_categories = $this->audiocat->_get_all_sub_cats_for_dropdown();

    //get an array of all assigned categories
    $query = $this->get_where_custom('item_id', $item_id);
    $data['query'] = $query;
    $data['num_rows'] = $query->num_rows();
    foreach($query->result() as $row) {
        $cat_title = $this->audiocat->_get_cat_title($row->cat_id);
        $parent_cat_title = $this->audiocat->_get_parent_cat_title($row->cat_id);
        $assigned_categories[$row->cat_id] = $parent_cat_title." > ".$cat_title;
    }

    if (!isset($assigned_categories)) {
        $assigned_categories = "";
    } else {
        //the item has been assigned to at least one category
        $sub_categories = array_diff($sub_categories, $assigned_categories);
    }

    $data['options'] = $sub_categories;
    $data['cat_id'] = $this->input->post('cat_id', TRUE);
 
    $data['headline'] = "Category Assign";
    $data['item_id'] = $item_id;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "update";
    $this->load->module('templates');
    $this->templates->admin_view($data);


}

function get($order_by)
{
    $this->load->model('Mdl_audio_sub_cat');
    $query = $this->Mdl_audio_sub_cat->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_audio_sub_cat');
    $query = $this->Mdl_audio_sub_cat->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_audio_sub_cat');
    $query = $this->Mdl_audio_sub_cat->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_audio_sub_cat');
    $query = $this->Mdl_audio_sub_cat->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_audio_sub_cat');
    $this->Mdl_audio_sub_cat->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_audio_sub_cat');
    $this->Mdl_audio_sub_cat->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_audio_sub_cat');
    $this->Mdl_audio_sub_cat->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_audio_sub_cat');
    $count = $this->Mdl_audio_sub_cat->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_audio_sub_cat');
    $max_id = $this->Mdl_audio_sub_cat->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_audio_sub_cat');
    $query = $this->Mdl_audio_sub_cat->_custom_query($mysql_query);
    return $query;
}

}