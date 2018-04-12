<?php
class Route_load extends MX_Controller 
{

//This is the module that loads by default

function __construct() {
parent::__construct();
}

function index()
{
    //attempt to load content from the webpages table
    $first_bit = trim($this->uri->segment(1));

    $this->load->module('webpages');
    $this->load->module('swaptechnologies_settings');
    $query = $this->webpages->get_where_custom('page_url', $first_bit);
    $num_rows = $query->num_rows();

    if ($num_rows>0) {
        //we have found content!

        foreach($query->result() as $row) {
            $data['page_title'] = $row->page_title;
            $data['page_url'] = $row->page_url;
            $data['page_keywords'] = $row->page_keywords;
        } 
    } else {
        //page not found!
        $data['page_content'] = $this->swaptechnologies_settings->_get_page_not_found_msg();
    }
    $template = 'public_view';
    $this->load->module('templates');
    $this->templates->$template($data);
} //end of index

}