<?php
class Swaptechnologies_settings extends MX_Controller 
{

function __construct() {
parent::__construct();
}

function is_mobile()
{
    $this->load->library('user_agent');
    $is_mobile = $this->agent->is_mobile();
    //$is_mobile = TRUE;
    return $is_mobile; // return TRUE or FALSE
}


function _get_nice_salt()
{
    $nice_salt = 'LP₦@Ru$RBc₦sr₦e9₦XkzR';
    return $nice_salt;
}


function _get_cookie_name()
{
    $cookie_name = '$₦2ys9Y@₦BsU$5₦sv₦₦W3B₦WS$Xw6vmL#W8$hgfd';
    return $cookie_name;
}


function _get_robotics_dropdown()
{
    //return the segments for the category pages
    $segments = "legorobotics/legos/";
    return $segments;
}

function _get_develop_dropdown()
{
    //return the segments for the category pages
    $segments = "programming/projects/";
    return $segments;
}

function _get_music_dropdown()
{
    //return the segments for the category pages
    $segments = "musical/trains/";
    return $segments;
}
function _get_video_dropdown()
{
    //return the segments for the category pages
    $segments = "upload/visuals/";
    return $segments;
}

function _get_page_not_found_msg()
{
    $msg = "<h1>It's a webpage Jim but not as we know it!</h1>";
    $msg.= "<p>Please check your vibe and try again.</p>";
    return $msg;
}




}