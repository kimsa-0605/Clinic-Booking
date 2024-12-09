
<?php
    class Home extends Controller {
        public function show() {
            $model = $this->model('DoctorModel');
            $doctorList = $model->getAllDoctor();
            $this->view('master', [
                'Page' => 'Home',
                'DoctorList' => $doctorList
            ]);
        }
    }
?>
