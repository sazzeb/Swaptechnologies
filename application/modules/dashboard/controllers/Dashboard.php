<?php
class Dashboard extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function home()
{

    $this->load->module('swaptechnologies_security');
    $this->swaptechnologies_security->_make_sure_is_admin();
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "home";
    $this->load->module('templates');
    $this->templates->admin_view($data);

}

}