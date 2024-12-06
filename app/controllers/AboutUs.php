<?php
class AboutUs extends Controller {

    function show() {
        $this->view('master', [
            'Page' => 'AboutUs',
        ]); // view
    }

  
    }