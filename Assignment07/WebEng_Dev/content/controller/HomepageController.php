<?php

include_once '../dao/Database.php';

class HomepageController
{
    
    public function show()
    {
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        require_once('../view/viewHomepage/showHomepage.php');
    }
}

