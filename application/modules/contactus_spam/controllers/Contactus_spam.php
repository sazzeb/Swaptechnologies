<?php
class Contactus_spam extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function get($order_by)
{
    $this->load->model('Mdl_contactus_spam');
    $query = $this->Mdl_contactus_spam->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus_spam');
    $query = $this->Mdl_contactus_spam->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus_spam');
    $query = $this->Mdl_contactus_spam->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_contactus_spam');
    $query = $this->Mdl_contactus_spam->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_contactus_spam');
    $this->Mdl_contactus_spam->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus_spam');
    $this->Mdl_contactus_spam->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus_spam');
    $this->Mdl_contactus_spam->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_contactus_spam');
    $count = $this->Mdl_contactus_spam->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_contactus_spam');
    $max_id = $this->Mdl_contactus_spam->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_contactus_spam');
    $query = $this->Mdl_contactus_spam->_custom_query($mysql_query);
    return $query;
}

}