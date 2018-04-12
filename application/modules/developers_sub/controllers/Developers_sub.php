<?php
class Developers_sub extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function _get_parent_title($parent_id)
{
    $this->load->module('robotics');
    $parent_title=$this->robotics->_get_title($parent_id);
    return $parent_title;
}

function _get_entity_name($type)
{
    //type can be singular or prular 
    if($type=='singular')
    {
        $entity_type='Entries';
    }
    else
    {
        // plural 
        $entity_type='More Entries';
    }
    return $entity_type;
}

function submit($update_id)
{
    // update the form that has been submitted via or through / view
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit=$this->input->post('submit', TRUE);

    if($submit=="Cancel")
    {
        $parent_id=$this->_get_parent_id($update_id);
        redirect('developers_sub/update_group/'.$parent_id);
    }
    elseif ($submit=="Submit") 
    {
        $this->_update($update_id, $data);
        redirect('developers_sub/view/'.$update_id);
    }
}


function _get_update_group_headline($parent_id)
{
    $parent_title= ucfirst($this->_get_parent_title($parent_id));
    $entity_name=ucfirst($this->_get_entity_name('plural'));
    $headline='Update '. $entity_name.' for '.$parent_title;
    return $headline;
}

function update_group($parent_id)
{
    // update/ manage records belonging to a parent category 
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data['parent_id']= $parent_id;
    $data['flash']=$this->session->flashdata('item'); 
    $data['headline']='Manage Subsequent Directory';
    $data['sub_headline']=$this->_get_update_group_headline($parent_id);
    $data['query']=$this->get_where_custom('parent_id', $parent_id);
    $data['num_rows']=$data['query']->num_rows();
    $data['entity_name']=$this->_get_entity_name('plural');
    $data['parent_title']=$this->_get_parent_title($parent_id);
    $data['view_file']="update_group";
    $this->load->module('templates');
    $this->templates->admin_view($data);
}


function deleteconf($update_id)
{
    if (!is_numeric($update_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }

    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $entity_name=$this->_get_entity_name('singular');
    $data['headline']= "Delete ".$entity_name;
    $data['update_id']=$update_id;
    $data['flash']=$this->session->flashdata('item');  
    $data['view_file']="deleteconf";
    $this->load->module('templates');
    $this->templates->admin_view($data);

}

function delete($update_id)
{
     if (!is_numeric($update_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }

    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit=$this->input->post('submit', TRUE);

    if ($submit=="Yes - Delete") 
    {
        $parent_id=$this->_get_parent_id($update_id);
        $this->_delete($update_id);

        $entity_name=$this->_get_entity_name('singular');
        $flash_msg="The ".$entity_name." was successfull deleted";
        $value= '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item',$value);

        redirect('developers_sub/update_group/'.$parent_id);


    }
}

function submit_create()
{
    // form hs been submitted , try to create new records 
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data['parent_id'] = $this->input->post('parent_id', TRUE);
    $this->_insert($data);
    $max_id = $this->get_max();
    redirect('developers_sub/view/'.$max_id);
}


function _get_parent_id($update_id)
{
    $data = $this->fetch_data_from_db($update_id);
    $parent_id = $data['parent_id'];
    return $parent_id;
}

function fetch_data_from_post()
{
    $data['parent_id'] = $this->input->post('parent_id',TRUE);
    return $data;
}

function fetch_data_from_db($update_id)
{

     if (!is_numeric($update_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }

    $query= $this->get_where($update_id);
    foreach ($query->result() as $row) {
        $data['item_two_description']= $row->item_two_description;
        $data['item_two_describe']= $row->item_two_describe;
        $data['parent_id']= $row->parent_id;
    }

    if(!isset($data))
    {
        $data= "";
    }
    return $data;
}


function upload_view($parent_id)
{

     if (!is_numeric($parent_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data['headline']= "Upload Subsequent Content";
    $data['parent_id']=$parent_id;
    $data['item_two_description'] = $this->input->post('item_two_description');
    $data['item_two_describe'] = $this->input->post('item_two_describe');
    $data['flash']=$this->session->flashdata('item');  
    $data['view_file']="upload_view";
    $this->load->module('templates');
    $this->templates->admin_view($data);

}

function _get_parent_id_sd($parent_id)
{
    $query = $this->get_where_custom('parent_id',$parent_id);
    foreach($query->result() as $rows)
    {
        $parent_num = $row->parent_id;
    }
    return $parent_num;
}

function update_view($parent_id)
{

     if (!is_numeric($parent_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }

    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $data = $this->fetch_data_from_db($parent_id);
    $data['headline'] = "Update Subsequent Content";
    $data['parent_id'] = $parent_id;
    $data['flash']=$this->session->flashdata('item');  
    $data['view_file']="update_view";
    $this->load->module('templates');
    $this->templates->admin_view($data);

}


//  function of uploading image
function create($parent_id)
{

     if (!is_numeric($parent_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }


    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit=$this->input->post('submit',TRUE);
    if ($submit=="Cancel") 
    {
        redirect('developers_sub/update_group/'.$parent_id);
    }

    if ($submit == 'Submit')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_two_description', 'Form Field', 'trim|required');
        $this->form_validation->set_rules('item_two_describe', 'Code', 'trim|required');

        if($this->form_validation->run() == TRUE)
        {

        $data['parent_id']= $parent_id;
        $data['item_two_description'] = $this->input->post('item_two_description');
        $data['item_two_describe'] = $this->input->post('item_two_describe');
        $this->_insert($data);
        // divert the user to the view 
        $flash_msg = "The item was successfully added.";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('developers_sub/update_group/'.$parent_id);
        }else{
            redirect('developers_sub/update_group/'.$parent_id);
        }
    }
}

function update_created($parent_id)
{

     if (!is_numeric($parent_id)) 
     {
        redirect('swaptechnologies_security/not_allowed');
     }


    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();

    $submit=$this->input->post('submit',TRUE);

    if ($submit == 'Submit')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('item_two_description', 'Form Field', 'trim|required');
        $this->form_validation->set_rules('item_two_describe', 'Code', 'trim|required');
        if($this->form_validation->run() == TRUE)
        {
            $data = $this->fetch_data_from_db($parent_id);
            $data_set['item_two_description'] = $this->input->post('item_two_description');
            $data_set['item_two_describe'] = $this->input->post('item_two_describe');
            $data['parent_id']= $parent_id;
            $this->_update($parent_id, $data_set);
            // divert the user to the view 
            $flash_msg = "The item was successful updated.";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('developers_sub/update_view/'.$parent_id);
        }else{
            redirect('developers_sub/update_view/'.$parent_id);
        }
    }
}

function get($order_by)
{
    $this->load->model('Mdl_developers_sub');
    $query = $this->Mdl_developers_sub->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_developers_sub');
    $query = $this->Mdl_developers_sub->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_developers_sub');
    $query = $this->Mdl_developers_sub->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_developers_sub');
    $query = $this->Mdl_developers_sub->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_developers_sub');
    $this->Mdl_developers_sub->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_developers_sub');
    $this->Mdl_developers_sub->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_developers_sub');
    $this->Mdl_developers_sub->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_developers_sub');
    $count = $this->Mdl_developers_sub->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_developers_sub');
    $max_id = $this->Mdl_developers_sub->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_developers_sub');
    $query = $this->Mdl_developers_sub->_custom_query($mysql_query);
    return $query;
}

}