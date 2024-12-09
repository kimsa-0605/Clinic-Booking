<?php
    class AppointmentModel extends DB{
        public function getAllTime(){
            $qr= "SELECT * FROM timetype";
            $result= mysqli_query($this->con, $qr);
            $timeTypes = [];
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $timeTypes[] = $row['TimeValue']; // Lưu từng mốc thời gian vào mảng
                }
            }
            return $timeTypes;
            }

        public function getPatientsAppointment($id)
        {
            $patientList = [];
            $qr = "SELECT u.Image as Image, 
                u.FullName as NamePatient,
                 u.Email as emailPatient,
                  tt.TimeValue as TimeValue,
                s.DateOfSchedule as DateSchedule,
                a.PaymentStatus as Payment,
                 a.AppointmentStatus as StatusAppointment 
                FROM appointment a 
                JOIN user u ON a.UserID = u.UserID
                JOIN schedule s ON a.SCID = s.SCID
                JOIN timetype tt ON s.TTID = tt.TTID
                WHERE u.UserID = ?";

            // Chuẩn bị và thực hiện truy vấn
            $stmt = $this->con->prepare($qr);
            $stmt->bind_param("i", $id); // Gán giá trị cho tham số
            $stmt->execute();
            $result = $stmt->get_result();

            // Kiểm tra kết quả và thêm vào mảng
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $patientList[] = $row; // Thêm mỗi hàng vào mảng
                }
            }

            return $patientList; // Trả về mảng các cuộc hẹn
        }

     }


        

    
?>


<!-- SELECT u.Image, u.FullName, u.Email, tt.TimeValue, s.DateOfSchedule, a.PaymentStatus, a.AppointmentStatus FROM appointment a 
JOIN user u ON a.UserID = u.UserID
JOIN schedule s ON a.SCID = s.SCID
JOIN timetype tt ON s.TTID = tt.TTID

WHERE u.UserID =?; -->