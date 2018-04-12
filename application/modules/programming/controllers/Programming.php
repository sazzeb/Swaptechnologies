<?php
class Programming extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function projects()
{
    //figure out what the category ID is
    $cat_url = $this->uri->segment(3);
    $this->load->module('programcat');
    $cat_id = $this->programcat->_get_develop_id_from_cat_url($cat_url);
    $this->programcat->view($cat_id);
}

function index()
{
	$data['view_file'] = 'program';
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function project()
{
    //figure out what the item ID is
    $item_url = $this->uri->segment(3);
    $this->load->module('developers');
    $item_id = $this->developers->_get_item_id_from_item_url($item_url);
    $this->developers->view($item_id);
}



}