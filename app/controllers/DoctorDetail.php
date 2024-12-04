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
            $daySchedule = $model->getDayOfSchedule($id);
            $this->view('master', [
                'Page' => 'DoctorDetail',
                'Doctor' => $doctor,
                'DoctorRelate' => $doctorRelate,
                'TimeValue' => $timevalue,
                'isBooked' => $isBooked,
                'days' => $day,
                'dayofschedule' => $daySchedule
            ]);
        }
    }
?>