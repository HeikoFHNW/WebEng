<?php

include_once '../dao/Database.php';

class HomepageController
{
    
    public function show()
    {
        require_once('../view/viewHomepage/showHomepage.php');
    }
}

