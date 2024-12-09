<?php
class Appointment extends Controller
{
    public function show()
    {
        $id = $_SESSION['user']['UserID'];
        $model = $this->model('AppointmentModel');
        $patient= $model->getPatientsAppointment($id);
        
        // Hiển thị layout và truyền thông tin bác sĩ
        $this->view('DoctorLayout', [
            'Page' => 'Appointment',
            "Patient" => $patient,
        ]);
    }
}
?>