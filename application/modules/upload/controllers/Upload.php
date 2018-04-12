<?php
class Upload extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function visuals()
{
    //figure out what the category ID is
    $cat_url = $this->uri->segment(3);
    $this->load->module('videocat');
    $cat_id = $this->videocat->_get_catvideo_id_from_cat_url($cat_url);
    $this->videocat->view($cat_id);
}

function training()
{
    //figure out what the item ID is
    $item_url = $this->uri->segment(3);
    $this->load->module('ad_videos');
    $item_id = $this->ad_videos->_get_item_id_from_item_url($item_url);
    $this->ad_videos->view($item_id);
}

function _draw_background_videos()
{
	$this->load->view('background_videos');
}

function index()
{
	$this->load->module('robotics');
	$this->load->module('ad_audio');
	$this->load->module('developers');
	$mysql_query_robotics = "select * from robotics order by date_made desc limit 0,10";
	$data['robotics_query_links'] = $this->robotics->_custom_query($mysql_query_robotics);

	$mysql_query_developers = "select * from developers order by date_made desc limit 0,10";
	$data['developers_query_links'] = $this->developers->_custom_query($mysql_query_developers);

	$mysql_query_ad_audio = "select * from ad_audio order by date_made desc limit 0,10";
	$data['ad_audio_query_links'] = $this->ad_audio->_custom_query($mysql_query_ad_audio);

	$data['view_file'] = 'visualvibe';
    $this->load->module('templates');
    $this->templates->public_view($data);
}

}