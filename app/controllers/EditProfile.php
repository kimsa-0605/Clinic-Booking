<?php


    class EditProfile extends Controller{
        public function show(){
            $this->view('DoctorLayout',[
                'Page' => 'EditProfiles'
            ]);
        }
    }


?>