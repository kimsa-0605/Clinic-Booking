<?php 


    class AddAppointment extends Controller{
        public function show(){
            $model = $this->model('Appointment');
            $timeValue = $model->getAllTime();
            var_dump($timeValue); // Kiểm tra giá trị của $timeValue
            exit; //
            $this->view('DoctorLayout', [
                'Page' => 'AddAppointment',
                'TimeValue' => $timeValue
            ]);

        }
    }