<?php
    class Doctors extends Controller {
        public $page = 'allDoctor';
        public $specilist = '';
        public $doctorList = [];

        public function show() {
            $specilist = $this->model('DoctorModel');
            $doctorList = $this->model('DoctorModel');
            $this->doctorList = $doctorList->getAllDoctor();
            $specilist = $specilist->Specialities();
            $this->view('master',
            ['Page' =>$this->page,
            'specilist' => $this->specilist,
            'doctorList' => $this->doctorList,
            'ListSpecialities' => $specilist]);
        }

        public function specilist($specilistdetail) {
            $this->specilist = $specilistdetail;
            $specilistOver = $this->model('DoctorModel');
            $this->doctorList = $specilistOver->getDoctorSpecilist($specilistdetail);
            $specilistOver = $specilistOver->Specialities();
            
            $this->view('master',
            ['Page' => 'allDoctor'
            ,'specilist' => $this->specilist,
            'doctorList' => $this->doctorList,
            'ListSpecialities' => $specilistOver]);
        }
    }
?>