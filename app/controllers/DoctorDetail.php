<?php
    class DoctorDetail extends Controller {
        public function show($id)
        {
            $model = $this->model('DoctorModel');
            $doctor = $model->getDoctorDetail($id);
            $doctorRelate = $model->getDoctorRelate($id);
            $timevalue = $model->getTimeValue($id);
            $isBooked = $model->getIsBooked($id);
            $day = $model->getDays();
            $slot = $model->getSlots($id);
            $daySchedule = $model->getDayOfSchedule($id);
            $this->view('master', [
                'Page' => 'DoctorDetail',
                'Doctor' => $doctor,
                'DoctorRelate' => $doctorRelate,
                'TimeValue' => $timevalue,
                'isBooked' => $isBooked,
                'days' => $day,
                'dayofschedule' => $daySchedule,
                'slots' => $slot,
                'id' => $id
            ]);
        }

        public function payment($id) {
            $feesModel = $this->model('DoctorModel');
            $fees = $feesModel->getFees($id);
            $this->view('payment',
            ['Fees'=>$fees
            ]);
        }
        public function success() {
            $success = $this->model('DoctorModel');
            $this->view('master',
            ['Page' => 'allDoctor']);
        }
    }
?>