<?php
class Legorobotics extends MX_Controller 
{

function __construct() {
parent::__construct();
}


function legos()
{
    //figure out what the category ID is
    $cat_url = $this->uri->segment(3);
    $this->load->module('robotcat');
    $cat_id = $this->robotcat->_get_cat_id_from_cat_url($cat_url);
    $this->robotcat->view($cat_id);
}

function lego()
{
    //figure out what the category ID is
    $cat_url = $this->uri->segment(3);
    $this->load->module('robotics');
    $cat_id = $this->robotics->_get_item_id_from_item_url($cat_url);
    $this->robotics->view($cat_id);
}




function index()
{
	$this->load->module('ad_videos');
	$this->load->module('ad_audio');
	$this->load->module('developers');
	$mysql_query_ad_videos = "select * from ad_videos order by date_made desc limit 0,10";
	$data['ad_videos_query_links'] = $this->ad_videos->_custom_query($mysql_query_ad_videos);

	$mysql_query_developers = "select * from developers order by date_made desc limit 0,10";
	$data['developers_query_links'] = $this->developers->_custom_query($mysql_query_developers);

	$mysql_query_ad_audio = "select * from ad_audio order by date_made desc limit 0,10";
	$data['ad_audio_query_links'] = $this->ad_audio->_custom_query($mysql_query_ad_audio);
	$data['view_file'] = 'legostically';
    $this->load->module('templates');
    $this->templates->public_view($data);
}

}