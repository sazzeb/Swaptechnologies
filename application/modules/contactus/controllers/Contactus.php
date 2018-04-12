<?php
class Contactus extends MX_Controller 
{

function __construct() {
parent::__construct();
$this->load->library('form_validation');
$this->form_validation->CI =& $this;
}

function submit()
{

    $submit = $this->input->post('submit', TRUE);
    $this->load->library('geolib/geolib');
    $data_store = $this->geolib->ip_info('197.210.226.119');//for testing insert ip here
    $data_store1 = $this->geolib->user_agent('197.210.226.119');//for testin insert ip here 

    if ($submit=="Submit") {
        //process the form
        $this->load->library('form_validation');
        $this->form_validation->set_rules('yourname', 'Name', 'trim|required|min_length[4]|max_length[240]|xss_clean',
            array('xss_clean' => 'Error Message: your xss is not clean.')
            );
        $this->form_validation->set_rules('youremail', 'Email', 'trim|required|min_length[5]|max_length[240]|valid_email|xss_clean');
        $this->form_validation->set_rules('purpose', 'Purpose', 'trim|required|min_length[5]|max_length[240]|xss_clean');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');

        if ($this->form_validation->run() == TRUE) {
            $data = $this->fetch_data_from_post();


            $data['ip_address'] = $data_store['geoplugin_request'];
            $data['ip_status'] = $data_store['geoplugin_status'];
            $data['city'] = $data_store['geoplugin_city'];
            $data['state'] = $data_store['geoplugin_region'];
            $data['country_code'] = $data_store['geoplugin_countryCode'];
            $data['country_name'] = $data_store['geoplugin_countryName'];
            $data['continental_code'] = $data_store['geoplugin_continentCode'];
            $data['latitude'] = $data_store['geoplugin_latitude'];
            $data['longitude'] = $data_store['geoplugin_longitude'];
            $data['converter'] = $data_store['geoplugin_currencyConverter'];

            $data['robot'] = $data_store1['is_robot'];
            $data['device'] = $data_store1['is_mobile'];
            $data['browser_number'] = $data_store1['is_browser'];
            $data['referered_from'] = $data_store1['is_referral'];
            $data['browser'] = $data_store1['browser'];
            $data['version'] = $data_store1['version'];
            $data['platform'] = $data_store1['platform'];

            $data['date_sent'] = time();
            $security = $this->input->post('security', TRUE);
            $firstname = $this->input->post('firstname', TRUE);
            $lastname = $this->input->post('lastname', TRUE);
            $secure_lowercase = strtoupper($security);

            if($secure_lowercase != 'ABUJA')
            {
                $flash_msg = "The capital you added is wrong, try another answer, you can search Google for help.";
                $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                $this->index();
            }else{
                
                if($firstname == TRUE OR $lastname == TRUE)
                {
                    $this->load->module('contactus_spam');
                    $data['firstname'] = $firstname;
                    $data['lastname'] = $lastname;
                    $flash_msg = "You have just sent us a spam message, and we frown at such thing, please decease from such act, because we take our company policy strickly, offenders are seriousely punished";
                    $value = '<div class="alert alert-warning" role="alert">'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    $this->contactus_spam->_insert($data);
                    $this->index();
                }else{
                    $this->_customer_sentmail();
                    $this->_admin_mail();
                    $this->_insert($data);
                    $flash_msg = "Your request has been submited, and it will be handle with due attention. and we will get intouch with you between 24 - 48hours. We are happy to attend to all your demand";
                    $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('contactus');
                }
            }
        }else{
            $this->index();
        }
    }

}

function index()
{
    $data = $this->fetch_data_from_post();
    $data['flash'] = $this->session->flashdata('item');
    $data['firstname'] = $this->input->post('firstname', TRUE);
    $data['lastname'] = $this->input->post('lastname', TRUE);
    $data['form_location'] = base_url().'contactus/submit';
    $data['view_file'] = "contactus";
    $this->load->module('templates');
    $this->templates->public_view($data);  
}


function fetch_data_from_post()
{
    $data['yourname'] = $this->input->post('yourname', TRUE);
    $data['youremail'] = $this->input->post('youremail', TRUE);
    $data['purpose'] = $this->input->post('purpose', TRUE);
    $data['comment'] = $this->input->post('comment', TRUE);
    return $data;
}

function _customer_sentmail()
{
    $this->load->library('email');
    $this->email->from('eko.5samuel@gmail.com', $this->input->post('yourname'));
    $this->email->to($this->input->post('youremail'));
    $this->email->subject('Admin | Reply');
    $this->email->message('Thanks For Contacting Admin, 
        we have receive your mail we will be contacting you very soon.
        Take a moment and go through our website, we will like you to like our facebook twitter, instagram, youtube page, so that we can serve you better.');
     if($this->email->send())
     {
        $send_me = '<p style="font-size: 1.3em; color: gray;">Your form was successfully submitted.  We will be in touch with you shortly.</p>';
        $send_me.= '<p style="font-size: 1.3em; color: gray;">Our team of engineers and professional will responds to your mail in less than 24hours.</p>';
        $send_me.= '<p style="font-size: 1.3em; color: gray;">Thanks</p>';
            $this->session->set_flashdata('success', 'Email was sent successfully');
            $this->session->set_flashdata('success', $send_me);
        }else{
            $this->session->set_flashdata('success', 'Email was not Sent');
        }
    
}


function _admin_mail()
{
    $this->load->library('email');
    $this->email->from('eko.5samuel@gmail.com', $this->input->post('yourname'));
    $this->email->to('sazzebb@gmail.com');
    $this->email->subject($this->input->post('subject'));
    $this->email->message($this->input->post('comment'));

    if($this->email->send())
    {
       $send_me = '<p style="font-size: 1.3em; color: gray;">Your form was successfully submitted.  We will be in touch with you shortly.</p>';
    $send_me.= '<p style="font-size: 1.3em; color: gray;">Our team of engineers and professional will responds to your mail in less than 24hours.</p>';
    $send_me.= '<p style="font-size: 1.3em; color: gray;">Thanks</p>';
        $this->session->set_flashdata('item', 'Email was sent successfully');
        $this->session->set_flashdata('item', $send_me);
    }else{
        $this->session->set_flashdata('item', 'Email was not Sent');
    }
}


function get($order_by)
{
    $this->load->model('Mdl_contactus');
    $query = $this->Mdl_contactus->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by) 
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus');
    $query = $this->Mdl_contactus->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus');
    $query = $this->Mdl_contactus->get_where($id);
    return $query;
}

function get_where_custom($col, $value) 
{
    $this->load->model('Mdl_contactus');
    $query = $this->Mdl_contactus->get_where_custom($col, $value);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_contactus');
    $this->Mdl_contactus->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus');
    $this->Mdl_contactus->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_contactus');
    $this->Mdl_contactus->_delete($id);
}

function count_where($column, $value) 
{
    $this->load->model('Mdl_contactus');
    $count = $this->Mdl_contactus->count_where($column, $value);
    return $count;
}

function get_max() 
{
    $this->load->model('Mdl_contactus');
    $max_id = $this->Mdl_contactus->get_max();
    return $max_id;
}

function _custom_query($mysql_query) 
{
    $this->load->model('Mdl_contactus');
    $query = $this->Mdl_contactus->_custom_query($mysql_query);
    return $query;
}

}