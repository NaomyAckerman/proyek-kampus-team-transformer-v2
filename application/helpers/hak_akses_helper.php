<?php

    function session()
    {
        $ci = get_instance();
        return $ci->session->userdata('email');
    }

    function login()
    {
        $ci = get_instance();
        if ($ci->session->userdata('email')) {
            redirect('home');
        }
    }

    function is_user()
    {
        $ci = get_instance();
        if($ci->session->userdata('level') == 'Admin'){
            redirect('dashboard');
        }
    }
    
    function is_admin()
    {
        $ci = get_instance();
        if ($ci->session->userdata('level') == 'User') {
            redirect('home');
        }
    }