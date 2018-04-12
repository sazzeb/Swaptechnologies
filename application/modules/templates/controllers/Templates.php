<?php
class Templates extends MX_Controller 
{

function __construct() {
parent::__construct();
}
function _draw_top_nav()
{
	$this->load->module('robotcat');
  $this->load->module('programcat');
  $this->load->module('audiocat');
  $this->load->module('videocat');
	$this->load->module('swaptechnologies_settings');

  $mysql_query_robot = "select * from robotcat where robot_parent_cat_id=0 order by priority";
  $query_robot = $this->robotcat->_custom_query($mysql_query_robot);
  foreach($query_robot->result() as $robot_rows)
  {
    $robot_parent_categories[$robot_rows->id] = $robot_rows->cat_title;
  }

  $mysql_query_program = "select * from programcat where develop_parent_cat_id=0 order by priority";
  $query_program = $this->programcat->_custom_query($mysql_query_program);
  foreach($query_program->result() as $program_rows)
  {
    $program_parent_categories[$program_rows->id] = $program_rows->cat_title;
  }

  $mysql_query_music = "select * from audiocat where audio_parent_cat_id=0 order by priority";
  $query_music = $this->audiocat->_custom_query($mysql_query_music);
  foreach($query_music->result() as $music_rows)
  {
    $music_parent_categories[$music_rows->id] = $music_rows->cat_title;
  }

  $mysql_query_video = "select * from videocat where video_parent_cat_id=0 order by priority";
  $query_video = $this->videocat->_custom_query($mysql_query_video);
  foreach($query_video->result() as $video_rows)
  {
    $video_parent_categories[$video_rows->id] = $video_rows->cat_title;
  }

	$robot_segment = $this->swaptechnologies_settings->_get_robotics_dropdown();
  $program_segment = $this->swaptechnologies_settings->_get_develop_dropdown();
  $music_segment = $this->swaptechnologies_settings->_get_music_dropdown();
  $video_segment = $this->swaptechnologies_settings->_get_video_dropdown();


	$data['robot_target_url'] = base_url().$robot_segment;
  $data['program_target_url'] = base_url().$program_segment;
  $data['music_target_url'] = base_url().$music_segment;
  $data['video_target_url'] = base_url().$video_segment;

	$data['robot_parent_categories'] = $robot_parent_categories;
  $data['program_parent_categories'] = $program_parent_categories;
  $data['music_parent_categories'] = $music_parent_categories;
  $data['video_parent_categories'] = $video_parent_categories;

	$this->load->view('top_nav', $data);
}

function _draw_top_nav_small()
{
  $this->load->module('robotcat');
  $this->load->module('programcat');
  $this->load->module('audiocat');
  $this->load->module('videocat');
  $this->load->module('swaptechnologies_settings');

  $mysql_query_robot_small = "select * from robotcat where robot_parent_cat_id=0 order by priority";
  $query_small_robot = $this->robotcat->_custom_query($mysql_query_robot_small);
  foreach($query_small_robot->result() as $robot_small_rows)
  {
    $robot_parent_categories_small[$robot_small_rows->id] = $robot_small_rows->cat_title;
  }

  $mysql_query_program_small = "select * from programcat where develop_parent_cat_id=0 order by priority";
  $query_program_small = $this->programcat->_custom_query($mysql_query_program_small);
  foreach($query_program_small->result() as $program_rows_small)
  {
    $program_parent_categories_small[$program_rows_small->id] = $program_rows_small->cat_title;
  }

  $mysql_query_music_small = "select * from audiocat where audio_parent_cat_id=0 order by priority";
  $query_music_small = $this->audiocat->_custom_query($mysql_query_music_small);
  foreach($query_music_small->result() as $music_rows_small)
  {
    $music_parent_categories_small[$music_rows_small->id] = $music_rows_small->cat_title;
  }

  $mysql_query_video_small = "select * from videocat where video_parent_cat_id=0 order by priority";
  $query_video_small = $this->videocat->_custom_query($mysql_query_video_small);
  foreach($query_video_small->result() as $video_rows_small)
  {
    $video_parent_categories_small[$video_rows_small->id] = $video_rows_small->cat_title;
  }

  $robot_segment = $this->swaptechnologies_settings->_get_robotics_dropdown();
  $program_segment = $this->swaptechnologies_settings->_get_develop_dropdown();
  $music_segment = $this->swaptechnologies_settings->_get_music_dropdown();
  $video_segment = $this->swaptechnologies_settings->_get_video_dropdown();


  $data['robot_target_url_small'] = base_url().$robot_segment;
  $data['program_target_url_small'] = base_url().$program_segment;
  $data['music_target_url_small'] = base_url().$music_segment;
  $data['video_target_url_small'] = base_url().$video_segment;

  $data['robot_parent_categories_small'] = $robot_parent_categories_small;
  $data['program_parent_categories_small'] = $program_parent_categories_small;
  $data['music_parent_categories_small'] = $music_parent_categories_small;
  $data['video_parent_categories_small'] = $video_parent_categories_small;

  $this->load->view('top_nav_small', $data);
}

function public_view($data) 
{
    if (!isset($data['view_module'])) {
      $data['view_module'] = $this->uri->segment(1);
    }
    
    $this->load->view('public_view', $data);
}


function admin_view($data) 
{
    if (!isset($data['view_module'])) {
      $data['view_module'] = $this->uri->segment(1);
    }
    
    $this->load->view('admin_view', $data);
}


}

