
<?php
    class Home extends Controller {
        public function show() {
            // $model = $this->model('DoctorModel');
            // $doctorList = $model->GetDoctor();
            $this->view('master', [
                'Page' => 'Home'
                // 'DoctorList' => $doctorList
            ]);
        }
    }
?>
