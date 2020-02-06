<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $this->isLoggedIn();
    }

    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            $this->load->view('login');
        }
        else
        {
            redirect('/dashboard');
        }
    }

    public function loginMe()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');

        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('email')));
            $password = $this->input->post('password');

            $result = $this->login_model->loginMe($email, $password);
            if(!empty($result))
            {
                $lastLogin = $this->login_model->lastLoginInfo($rsult->userId);

                $sessionArray = array('userId'=>$result->userId,
                                        'role'=>$result->roleId,
                                        'roleText'=>$result->role,
                                        'name'=>$result->name,
                                        'lastLogin'=> $lastLogin->createDtm,
                                        'isLoggedIn' => TRUE
                                    );

                $this->session->set_userdata($sessionArray);

                unset($sessionArray['userId'], $sessionArray['isLoggedIn'], $sessionArray['lastlogin']);

                $loginInfo = array("userId"=>$result->userId, "sessionData" => json_encode($sessionArray), "machineIp"=>$_SERVER['REMOTE_ADDR'], "userAgent"=>getBrowserAgent(), "agentString"=>$this->agent->agent_string(), "platform"=>$this->agent->platform());

                $this->login_model->lastLogin($loginInfo);

                redirect('/dashboard');
            }
            else
            {
                $this->session->set_flashdata('error', 'Email or password mismatch');

                $this->index();
            }
        }
    }

    public function forgotPassword()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if(!isset($isLoggedIn) || $isLoggedIn !=TRUE)
        {
            $this->load->view('forgotPassword');
        }
        else
        {
            redirect('/dashboard');
        }
    }

    function resetPasswordUser()
    {
        $status = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email','Email','trim|required|valid_email');

        if($this->form_validation->run() == FALSE)
        {
            $this->forgotPassword();
        }
        else
        {
            $email = strtolower($this->security->xss_clean($this->input->post('login_email')));

            if($this->login_model->checkEmailExist($email))
            {
                $encoded_email = urlencode($email);

                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum',15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();

                $save = $this->login_model->resetPasswordUser($data);

                if($save)
                {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if(!empty($userInfo)){
                        $data1["name"] = $userInfo->name;
                        $data1["email"] = $userInfo->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if($sendStatus)
                    {
                        $status = "send";
                        setFlashData($status, "Reset password link send successfully");
                    }
                    else
                    {
                        $status = 'notsend';
                        setFlashData($status, "Email has been failed, try again");
                    }
                }
                else
                {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            }
            else
            {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    function resetPasswordConfirmUser($activation_id, $email)
    {
        $email = urldecode($email);

        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        if($is_correct == 1)
        {
            $this->load->view('newPassword', $data);
        }
        else
        {
            redirect('/login');
        }
    }

    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = strtolower($this->input->post("email"));
        $activation_id = $this->input->post("activation_code");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]');

        if($this->form_validation->run() == FALSE)
        {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        }
        else
        {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            $is_correct = $this->login_model->checkActivationDeatils($email, $activation_id);

            if($is_correct == 1)
            {
                $this->login_model->createPasswordUser($email, $password);

                $status = 'success';
                $message = 'Password reset successfully';
            }
            else
            {
                $status = 'error';
                $message = 'Password reset failed';
            }

            setFlashData($status, $message);

            redirect("/login");
        }
    }
}
?>