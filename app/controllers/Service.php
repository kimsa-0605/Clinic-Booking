<?php
    class Service extends Controller {
        public function show() {
            $this->view('master',
            ['Page' => 'servicePage']);
        }
    }
?>