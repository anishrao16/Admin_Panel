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
        }
    }
?>