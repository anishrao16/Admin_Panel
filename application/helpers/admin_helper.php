<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

    function pre($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    if(!function_exists('get_instance'))
    {
        function get_instance()
        {
            $CI = &get_instance();
        }
    }

    if(!function_exists('verifyHashedPassword'))
    {
        function verifyHashedPassword($plainPassword, $hashedPassword)
        {
            return password_verify($plainPassword, $hashedPassword) ? true : false;
        }
    }

    if(!function_exists('getBrowserAgent'))
    {
        function getBrowserAgent()
        {
            $CI = get_instance();
            $CI->load->library('user_agent');

            $agent = '';

            if($CI->agent->is_browser())
            {
                $agent = $CI->agent->browser().' '.$CI->agent->version();
            }
            else if($CI->agent->is_robot())
            {
                $agent = $CI->agent->robot();
            }
            else if ($CI->agent->is_mobile())
            {
                $agent = $CI->agent->mobile();
            }
            else
            {
                $agent = 'Unidentified User Agent';
            }

            return $agent;
        }
    }

    if(!function_exists('setProtocol'))
    {
        function setProtocol()
        {
            $CI = &get_instance();

            $CI->load->library('email');

            $config['protocol'] = PROTOCOL;
            $config['mailpath'] = MAIL_PATH;
            $config['smtp_host'] = SMTP_HOST;
            $config['smtp_port'] = SMTP_PORT;
            $config['smtp_user'] = SMTP_USER;
            $config['smtp_pass'] = SMTP_PASS;
            $config['charset'] = "utf-8";
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";

            $CI->email->initialize($config);

            return $CI;
        }
    }

    if(!function_exists('emailConfig'))
    {
        function emailConfig()
        {
            $CI->load->library('email');
            $config['protocol'] = PROTOCOL;
            $config['smtp_host'] = SMTP_HOST;
            $config['smtp_port'] = SMTP_PORT;
            $config['mailpath'] = MAIL_PATH;
            $config['charset'] = 'UTF-8';
            $config['mailtype'] = "html";
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
        }
    }

    if(!function_exists('resetPasswordEmail'))
    {
        function resetPasswordEmail($detail)
        {
            $data["data"] = $detail;

            $CI = setProtocol();

            $CI->email->from(EMAIL_FROM, FROM_NAME);
            $CI->email->subject("Reset Password");
            $CI->email->message($CI->load->view('email/resetPassword', $data, TRUE));
            $CI->email->to($detail["email"]);
            $status = $CI->email->send();

            return $status;
        }
    }

?>