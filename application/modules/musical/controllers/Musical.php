<?php
class Musical extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function trains()
{
    //figure out what the category ID is
    $cat_url = $this->uri->segment(3);
    $this->load->module('audiocat');
    $cat_id = $this->audiocat->_get_musicat_id_from_cat_url($cat_url);
    $this->audiocat->view($cat_id);
}


function training()
{
    //figure out what the item ID is
    $item_url = $this->uri->segment(3);
    $this->load->module('ad_audio');
    $item_id = $this->ad_audio->_get_item_id_from_item_url($item_url);
    $this->ad_audio->view($item_id);
}

function index()
{
	$this->load->module('robotics');
	$this->load->module('ad_videos');
	$this->load->module('developers');
	$mysql_query_robotics = "select * from robotics order by date_made desc limit 0,10";
	$data['robotics_query_links'] = $this->robotics->_custom_query($mysql_query_robotics);

	$mysql_query_developers = "select * from developers order by date_made desc limit 0,10";
	$data['developers_query_links'] = $this->developers->_custom_query($mysql_query_developers);

	$mysql_query_ad_videos = "select * from ad_videos order by date_made desc limit 0,10";
	$data['ad_videos_query_links'] = $this->ad_videos->_custom_query($mysql_query_ad_videos);
	
	$data['view_file'] = 'listencool';
    $this->load->module('templates');
    $this->templates->public_view($data);
}

}