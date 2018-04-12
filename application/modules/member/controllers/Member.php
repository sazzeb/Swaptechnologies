<?php
class Member extends MX_Controller
{

function __construct() {
    parent::__construct();
    $this->load->library('form_validation');
    $this->form_validation->CI =& $this;
}

private $email_code;

function index()
{
    $data['form_validation'] = base_url().'member/login';
    $data['username'] = $this->input->post('username', TRUE);
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "secure_login";
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function login()
{
    $submit = $this->input->post('submit', TRUE);
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[80]|callback_username_check|xss_clean',
        array('required' => 'Please Enter your username or your email or phone number, it can not be left     blank',
              'min_length' => 'The mininum length for your email or phone number or username should be atleast above five(5) characters',
              'max_length' => 'The maximun length for your email or phone number or username should not be above eighty(80) characters',
              'callback_username_check' => 'Your login detail is incorrect, please carefully re-enter them again')
        );
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|xss_clean',
        array( 'required' => 'Please enter your password, to continue, it is required',
                'min_length' => 'The mininum length should be atleast above eight(8) characters',
                'max_length' => 'The maximun length should not be above thirty(30) characters'
                )
        );
    if($this->form_validation->run() == TRUE)
    {
        //figure out the user_id
        $col1 = 'username';
        $value1 = $this->input->post('username', TRUE);
        $col2 = 'email';
        $value2 = $this->input->post('username', TRUE);
        $col3 = 'telephone';
        $value3 = $this->input->post('username', TRUE);
        $query_user = $this->get_with_double_condition($col1, $value1, $col2, $value2, $col3, $value3);
        foreach($query_user->result() as $row)
            {
                $user_id = $row->id;
                $verification_table = $row->verification;
                $recovery_activation_code_table = $row->recovery_activation_code;
            }

            if($verification_table == 5448034759252 AND $recovery_activation_code_table == 'HAS_NOT_SENT_RECOVERY_MAIL')
            {
            $checkbox = $this->input->post('checkbox',TRUE);
            if($checkbox == 'Long_time_login')
            {
                $login_type = 'longterm';
            }else{
                $login_type = 'shortterm';
            }

            $data['last_login'] = time();
            $this->_update($user_id, $data);

            //send them to the private page
            $this->_redirct_one_user_to_his_page($user_id, $login_type);
            // temporal login
            }else{

                $flash_msg = "Your login detail is incorrect, please carefully re-enter them again or you have not verify your account";
                $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);

                 $this->index();
                 return FALSE;
             }
        }else{
            $this->index();
    }
}


function _redirct_one_user_to_his_page($user_id, $login_type)
{
    //NOTE: the login_type can be longterm or shortterm
    if ($login_type=="longterm") {
        //set a cookie
        $this->load->module('site_cookies');
        $this->site_cookies->_set_cookie($user_id);
    } elseif($login_type == 'shortterm') {
        //set a session variable
        $this->session->set_userdata('user_id', $user_id);
    }
    //attempt to login cart and divert cart
    
    //$this->_attemp_cart_divert($user_id);

    //send the user to the private page
    redirect('members/welcome');
}




function klbcrqv($email_check, $email_code)
{
    $this->load->module('swaptechnologies_settings');
    $this->load->module('swaptechnologies_security');
    $submit = $this->input->post('submit',TRUE);
    if($submit == 'Submit'){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[30]|xss_clean',
            array('required' => 'Please enter a unique password to proceed',
                   'min_length' => 'The required character should be atleast eight(8) length to sign',
                   'max_length' => 'The maximun length should not be above 30 character')
            );
        $this->form_validation->set_rules('confirm_password', 'Repeat Password', 'trim|matches[password]|xss_clean',
                array('matches' => 'The password you enter does not match, please enter again carefully')
            );
        if($this->form_validation->run() == TRUE)
        {
            $password = $this->input->post('password');
            $email_decrypt = $this->_get_session_id_from_token($email_check);

            $mysql_query = "SELECT email, recovery_activation_code, recovery_time FROM member WHERE email = '{$email_decrypt}'  LIMIT 1";
            $query = $this->_custom_query($mysql_query);
            $row_query = $query->row();

            $email_receive = $row_query->email;
            $recovery_activation_code = $row_query->recovery_activation_code;
            $email_code_salt = $this->swaptechnologies_settings->_get_nice_salt();
            $email_cod = md5((string)$row_query->recovery_time);

            //please re-visit email code does not match 

            if(md5($email_code_salt.$email_cod) == $email_code)
            {
                if($email_decrypt == $email_receive AND $recovery_activation_code == 'HAS_NOT_SENT_RECOVERY_MAIL')
                {
                    $recovery_password = $this->swaptechnologies_security->_hash_string($password);

                    $mysql_queryUpdate = "UPDATE member SET password = '{$recovery_password}' WHERE email  = '{$email_decrypt}' LIMIT 1";
                    $this->_custom_query($mysql_queryUpdate);
                    if($this->db->affected_rows() == 1)
                    {
                        $flash_msg = "Congratulation your password has been change, you can now log in with it";
                        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        $this->index();
                    }else{
                        $flash_msg = "Yuor Password has not been change yet!";
                        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
                        $this->session->set_flashdata('item', $value);
                        return FALSE;
                    }
                }
            }else{
                $flash_msg = "This code did not matched!";
                $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
                $this->session->set_flashdata('item', $value);
                $this->klbcrrqvr($email_check, $email_code);
            }
        }else{
            $this->klbcrrqvr($email_check, $email_code);
        }
    }
}


function klbcrrqvr($email_check, $email_code)
{
    $data['email'] = $this->_get_session_id_from_token($email_check);
    $data['flash'] = $this->session->flashdata('item');
    $data['form_validation'] = base_url().'member/klbcrqv/'.$email_check.'/'.$email_code;
    $data['view_file'] = "forgot_pword";
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function uath_email()
{
    $this->load->library('session');
    $submit = $this->input->post('submit',TRUE);
    if($submit == 'Cancel')
    {
        $this->index();
    }


    if($submit == 'Submit')
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[5]|max_length[60]|xss_clean',
            array(  'required' => 'You left the space blank please fill in a valid Email Address to continue',
                    'valid_email' => 'The email you enter is not a valid email, please inspect correctly  and retype'
                    )
            );
        if($this->form_validation->run() == TRUE)
        {
            $email = trim($this->input->post('email', TRUE));
            $result = $this->_email_checker($email);
            if($result == TRUE)
            {
                $this->_set_recovery_time_email($email);
                $this->_get_recovery_session_for_email($email);
                $this->_send_email_reset_password();
            }
        }else{
            $this->reset();
        }
    }
}

function _get_recovery_session_for_email($email)
{
    $this->load->library('session');
    $mysql_query = "SELECT username, email, recovery_activation_code, recovery_time FROM member WHERE email = '{$email}'  LIMIT 1";
    $select_query = $this->_custom_query($mysql_query);
    $row_query = $select_query->row();
    $sess_data = array('username' => $row_query->username,
                        'email' => $row_query->email,
                        'recovery_activation_code' => $row_query->recovery_activation_code,
                        'logged_in' => 0
                        );
    $this->email_code = md5((string)$row_query->recovery_time);
    $this->session->set_userdata($sess_data);
}


function _set_recovery_time_email($email)
{
    $this->load->module('swaptechnologies_security');
    $recovery_setTime = time();
    $random_num = $this->swaptechnologies_security->generate_random_string(11);
    $random_num_strin = strtoupper($random_num);
    $mysql_query = "UPDATE member SET recovery_time = '{$recovery_setTime}', recovery_activation_code = '{$random_num_strin}' WHERE email  = '{$email}' LIMIT 1";
    $this->_custom_query($mysql_query);
    if($this->db->affected_rows() == 1)
    {
        return TRUE;
    }else{
        return FALSE;
    }
}


function _email_checker($email)
{
    $mysql_query = "select username, email from member where email = '{$email}' limit 1";
    $query = $this->_custom_query($mysql_query);
    $new_row = $query->row();
    if($new_row->email == TRUE)
    {
        return TRUE;
    }else{
        $flash_msg = "You email is incorrect, we suggest you register";
        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member/reset');
        return FALSE;
    }
}

function _send_email_reset_password()
{

    $this->load->module('swaptechnologies_settings');
    
    $this->load->library('email');
    $email = $this->session->userdata('email');
    $username = $this->session->userdata('username');

    $recovery_activation_code = $this->session->userdata('recovery_activation_code');

    $email_send = $this->_create_checkout_token($email);

    $email_cod = $this->email_code;
    $email_code_salt = $this->swaptechnologies_settings->_get_nice_salt();
    $email_code = md5($email_code_salt.$email_cod);

    $this->email->from('eko.5samuel@gmail.com', 'SwapTechnologies Rseset Password');
    $this->email->to($email);
    $this->email->subject('Please activate your registration here');

    $message = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    </head>
    <body>';
    $message.= '<p>Dear '.$username.',</p>';
    $message.= '<p>Your confirmation code is '.$recovery_activation_code.' write it down to confirm </p>';
    $message.= '<p>Please <strong><a href="'.base_url().'member/jxfn8fbrvsyutek/'.$email_send.'/'.$email_code.'">Click Here. </a></strong>To enable recover your password.</p>';
    $message.= '<p><strong>Thanks</strong></p>';
    $message.= '<p><strong>SwapTechnologies Managament</strong></p>';
    $message.='</body>
               </html>';
    $this->email->message($message);

    if($this->email->send())
    {
        return TRUE;
    }else{
        return FALSE;
    }
}

function jxfn8fbrvsyutek($email_check, $email_code)
{
    $data['form_validation'] = base_url().'member/jxfn8fbrvSy/'.$email_check.'/'.$email_code;
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "recover_confirm_code";
    $this->load->module('templates');
    $this->templates->public_view($data);
}

function jxfn8fbrvSy($email_check, $email_code)
{
    $submit = $this->input->post('submit', TRUE);
    if($submit == 'Submit')
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('confirm_code', 'Confirmation Code', 'trim|required|xss_clean',
                array('required' => 'You did not enter the confirmation code, it is required')
            );
        if($this->form_validation->run() == TRUE)
        {
            $confirm_code = $this->input->post('confirm_code',TRUE);
            $this->_get_recovery_same_code($email_check,$email_code);
            $this->_get_the_recovery_code_to_original($email_check,$email_code);
            $flash_msg = "Congratulation the code is accepted, proceed to changed your password";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            $this->klbcrrqvr($email_check,$email_code);
        }else{
            $this->JXfN8fbrvSyutEk($email_check, $email_code);
        }
    }
}

function _get_the_recovery_code_to_original($email_check,$email_code)
{
    $email_receive = $this->_get_session_id_from_token($email_check);
    $recovery_set = 'HAS_NOT_SENT_RECOVERY_MAIL';
    $mysql_query = "UPDATE member SET recovery_activation_code = '{$recovery_set}' WHERE email  = '{$email_receive}' LIMIT 1";
     $this->_custom_query($mysql_query);
    if($this->db->affected_rows() == 1)
    {
        return TRUE;
    }else{
        return FALSE;
    }
}

function _get_recovery_same_code($email_check,$email_code)
{
    $confirm_cod = $this->input->post('confirm_code',TRUE);
    $confirm_code = strtoupper($confirm_cod);
    $email_codedrop = $this->_get_session_id_from_token($email_check);
    $mysql_query = "select email,recovery_activation_code from member where email = '{$email_codedrop}' limit 1";
    $query = $this->_custom_query($mysql_query);
    $new_row = $query->row();
    if($email_codedrop == $new_row->email AND $confirm_code == $new_row->recovery_activation_code)
    {
        return TRUE;
    }else{
        $flash_msg = "The confirmation code you enter is wrong, please enter the right Confirmation order sent to your email";
        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member/jxfn8fbrvsyutek/'.$email_check.'/'.$email_code);
        return FALSE;
    }
}

function reset()
{
    $data['form_validation'] = base_url().'member/uath_email';
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "reset_now";
    $this->load->module('templates');
    $this->templates->public_view($data);
}



function signup()
{
    $this->load->library('session');
    $this->load->module('swaptechnologies_security');
    $submit = $this->input->post('submit',TRUE);
    if($submit=='Submit')
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[60]|is_unique[member.username]|xss_clean',
            array(  'required' => 'The Username is required, it must not be left blank',
                    'min_length' => 'Your username should be above five (5) characters',
                    'max_length' => 'Your username should not be above sixty (60) characters',
                    'is_unique' => 'The usename u choose is already taken, please choose another unique username'
                )
            );


        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|min_length[10]|max_length[60]|is_unique[member.email]|xss_clean',
            array(  'required' => 'You left the Email blank please fill the space to continue',
                    'min_length' => 'Your email should be above ten (10) characters',
                    'max_length' => 'Your email should not be above sixty (60) characters',
                    'is_unique' => 'The Email you enter has already been taken by another user, please enter another email address'
                    )
            );


        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|numeric|min_length[11]|max_length[19]|is_unique[member.telephone]|xss_clean',
            array(  'required' => 'Please enter your phone number, it is required',
                     'numeric' => 'Your phone number should only contain numbers, not numbers and letters',
                     'min_length' => 'The mininum length should be eleevn (11) characters if your are not from Nigeria or using special line or line-line add the country code',
                     'max_length' => 'The maximun length should not be above ninteen (19) characters',
                     'is_unique' => 'The phone number you enter has already been taken, please choose a different phone number'
                     )
            );


        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]|xss_clean',
            array(  'required' => 'Please enter a unique password to proceed',
                    'min_length' => 'Your password should be above six 6 characters',
                    'max_length' => 'Your password should not be above thirty (30) characters'
                    )
            );


        $this->form_validation->set_rules('confirm_pasword', 'Repeat Password', 'trim|matches[password]|xss_clean',
                array('matches' => 'The password you enter does not match, please enter again carefully')
            );


        if($this->form_validation->run() == TRUE)
        {
            $data = $this->fetch_data_from_post();
            unset($data['comfirm_password']);
            $email = $data['email'];
            $password = $data['password'];
            $data['date_made'] = time();
            $data['password'] = $this->swaptechnologies_security->_hash_string($password);
            $this->_insert($data);
            $this->_get_session_for_this_email($email);
            $this->_send_validation_email();
            $flash_msg = "Your account was successfully created head over to your email account to activate it";
            $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            $this->index();
        }else{
            $this->register();
        }
    }
}

function _get_session_for_this_email($email)
{
    $this->load->library('session');
    $mysql_query = "SELECT username, email, date_made FROM member WHERE email = '".$email."'  LIMIT 1";
    $select_query = $this->_custom_query($mysql_query);
    $row_query = $select_query->row();
    $sess_data = array('username' => $row_query->username,
                        'email' => $row_query->email,
                        'logged_in' => 0
                        );
    $this->email_code = md5((string)$row_query->date_made);
    $this->session->set_userdata($sess_data);
}

function _create_checkout_token($session_id)
{
    $this->load->module('swaptechnologies_security');
    $encrypted_string = $this->swaptechnologies_security->_encrypt_string($session_id);
    //remove dodgy characters
    $checkout_token = str_replace('+', '-pl-', $encrypted_string);
    $checkout_token = str_replace('/', '-fd-', $checkout_token);
    $checkout_token = str_replace('=', '-ql-', $checkout_token);
    return $checkout_token;
}

function _get_session_id_from_token($checkout_token)
{
    $this->load->module('swaptechnologies_security');
    //remove dodgy characters
    $session_id = str_replace('-pl-', '+', $checkout_token);
    $session_id = str_replace('-fd-', '/', $session_id);
    $session_id = str_replace('-ql-', '=', $session_id);
    $session_id = $this->swaptechnologies_security->_decrypt_string($session_id);
    return $session_id;
}

function _send_validation_email()
{
    $this->load->library('email');
    $email = $this->session->userdata('email');
    $this->load->module('swaptechnologies_settings');

    $email_send = $this->_create_checkout_token($email);

    $username = $this->session->userdata('username');


    $email_cod = $this->email_code;
    $email_code_salt = $this->swaptechnologies_settings->_get_nice_salt();
    $email_code = md5($email_code_salt.$email_cod);


    $this->email->from('eko.5samuel@gmail.com', 'SwapTechnologies Confirm');
    $this->email->to($email);
    $this->email->subject('Please activate your registration here');

    $message = '
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    </head>
    <body>';
    $message.= '<p>Dear '.$username.',</p>';
    $message.= '<p>Thanks for registering at SwapTechnologies </p>';
    $message.= '<p>Please <strong><a href="'.base_url().'member/dBQuct6CbdhcW/'.$email_send.'/'.$email_code.'">Click Here. </a></strong>To complete your registration at SwapTechnologies. We are happy you have signup.</p>';
    $message.= '<p><strong>Thanks</strong></p>';
    $message.= '<p><strong>SwapTechnologies Managament</strong></p>';
    $message.='</body>
               </html>';
    $this->email->message($message);

    if($this->email->send())
    {
        return TRUE;
    }else{
        return FALSE;
    }
}


function dBQuct6CbdhcW($email_decrypt,$email_code)
{
    $email_code = trim($email_code);
    $validate = $this->_valid_email($email_decrypt,$email_code);
    if($validate == TRUE)
    {
        $flash_msg = "Congratulation, Your account has been activated, you can now login and to use the site";
        $value = '<div class="alert alert-success" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member');
    }else{
        $flash_msg = "Email has not been activated yet";
        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member/register');
    }
}

function _valid_email($email_decrypt,$email_code)
{
    $this->load->module('swaptechnologies_settings');
    $email_receive = $this->_get_session_id_from_token($email_decrypt);
    $email_code_salt = $this->swaptechnologies_settings->_get_nice_salt();
    $mysql_query = "SELECT username, email, date_made FROM member WHERE email  = '{$email_receive}' LIMIT 1 ";
    $query = $this->_custom_query($mysql_query);
    foreach($query->result() as $row_query) {
    }
    if($query->num_rows() == 1 && $row_query->username)
    {
        $email_cod = md5((string)$row_query->date_made);
        if(md5($email_code_salt.$email_cod) == $email_code){
            $query_result = $this->_activate_email($email_decrypt);
        }else{
            return FALSE;
        }
        if($query_result == TRUE)
        {
            return TRUE;
        }else{
            $flash_msg = "Your account was not activated, please register and confirm your registration";
            $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
            $this->session->set_flashdata('item', $value);
            redirect('member/register');
        }
    }else{
        $flash_msg = "Your account was not activated, please register and confirm your registration";
        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member/register');
    }
}

function _activate_email($email_decrypt)
{
    $email_receive = $this->_get_session_id_from_token($email_decrypt);
    $mysql_query = "UPDATE member SET verification = 5448034759252 WHERE email  = '{$email_receive}' LIMIT 1";
     $this->_custom_query($mysql_query);
    if($this->db->affected_rows() == 1)
    {
        return TRUE;
    }else{
        $flash_msg = "Your account was not activated, please register and confirm your registration";
        $value = '<div class="alert alert-danger" role="alert">'.$flash_msg.'</div>';
        $this->session->set_flashdata('item', $value);
        redirect('member/register');
    }
}

function register()
{
    $this->load->library('session');
    $data = $this->fetch_data_from_post();
    $data['flash'] = $this->session->flashdata('item');
    $data['view_file'] = "regist";
    $this->load->module('templates');
    $this->templates->public_view($data);
}
function fetch_data_from_post()
{
    $data['username'] = $this->input->post('username', TRUE);
    $data['email'] = $this->input->post('email', TRUE);
    $data['telephone'] = $this->input->post('telephone', TRUE);
    $data['password'] = $this->input->post('password', TRUE);
    $data['comfirm_password'] = $this->input->post('comfirm_password', TRUE);
    return $data;
}
function get($order_by)
{
    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->get($order_by);
    return $query;
}

function get_with_limit($limit, $offset, $order_by)
{
    if ((!is_numeric($limit)) || (!is_numeric($offset))) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->get_with_limit($limit, $offset, $order_by);
    return $query;
}

function get_where($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->get_where($id);
    return $query;
}

function get_where_custom($col, $value)
{
    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->get_where_custom($col, $value);
    return $query;
}

function get_with_double_condition($col1, $value1, $col2, $value2, $col3, $value3)
{
    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->get_with_double_condition($col1, $value1, $col2, $value2, $col3, $value3);
    return $query;
}

function _insert($data)
{
    $this->load->model('Mdl_member');
    $this->Mdl_member->_insert($data);
}

function _update($id, $data)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_member');
    $this->Mdl_member->_update($id, $data);
}

function _delete($id)
{
    if (!is_numeric($id)) {
        die('Non-numeric variable!');
    }

    $this->load->model('Mdl_member');
    $this->Mdl_member->_delete($id);
}

function count_where($column, $value)
{
    $this->load->model('Mdl_member');
    $count = $this->Mdl_member->count_where($column, $value);
    return $count;
}

function get_max()
{
    $this->load->model('Mdl_member');
    $max_id = $this->Mdl_member->get_max();
    return $max_id;
}

function _custom_query($mysql_query)
{
    $this->load->model('Mdl_member');
    $query = $this->Mdl_member->_custom_query($mysql_query);
    return $query;
}


function username_check($str)
{
    $this->load->module('swaptechnologies_security');

    $error_msg = "Your login detail is incorrect, please carefully re-enter them again";

    $col1 = 'username';
    $value1 = $str;
    $col2 = 'email';
    $value2 = $str;
    $col3 = 'telephone';
    $value3 = $str;
    $query = $this->get_with_double_condition($col1, $value1, $col2, $value2, $col3, $value3);
    $num_rows = $query->num_rows();

    if ($num_rows<1) {
        $this->form_validation->set_message('username_check', $error_msg);
        return FALSE;
    }

    foreach($query->result() as $row) {
        $password_on_table = $row->password;
    }

    $password = $this->input->post('password', TRUE);
    $result = $this->swaptechnologies_security->_verify_hash($password, $password_on_table);

    if ($result==TRUE) {
        return TRUE;
    } else {
        $this->form_validation->set_message('username_check', $error_msg);
        return FALSE;
    }
    
}



}