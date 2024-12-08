<?php
    class DoctorModel extends DB {

        // Lấy danh sách bác sĩ
        public function GetDoctor() {
            $doctorList = [];
            $sql = "SELECT * FROM doctor";
            $result = $this->con->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $doctorList[] = $row;
                }
            }
            return $doctorList;
        }

        // Lấy danh sách chuyên khoa
        public function Specialities() {
            $docSpeList = [];
            $sql = "SELECT * FROM specilist";
            $result = $this->con->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $docSpeList[] = $row;
                }
            }
            return $docSpeList;
        }

        // Lấy tất cả bác sĩ với thông tin người dùng và chuyên khoa
        public function getAllDoctor() {
            $docList = [];
            $sql = "SELECT * 
                    FROM User u
                    INNER JOIN Doctor d ON d.UserID = u.UserID
                    INNER JOIN Specilist s ON s.SPID = d.SPID";
            $result = $this->con->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $docList[] = $row;
                }
            }
            return $docList;
        }

        // Lấy danh sách bác sĩ theo chuyên khoa
        public function getDoctorSpecilist($specilistdetail) {
            $docList = [];
            $sql = "SELECT * 
                    FROM User u
                    INNER JOIN Doctor d ON d.UserID = u.UserID
                    INNER JOIN Specilist s ON s.SPID = d.SPID
                    WHERE s.SPName = '$specilistdetail'";
            $result = $this->con->query($sql);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $docList[] = $row;
                }
            }
            return $docList;
        }

        // Lấy thông tin chi tiết bác sĩ theo ID
        public function getDoctorDetail($id) {
            $sql = "SELECT * 
                    FROM User u
                    INNER JOIN Doctor d ON d.UserID = u.UserID
                    INNER JOIN Specilist s ON s.SPID = d.SPID
                    WHERE d.DoctorID = '$id'";
            $result = $this->con->query($sql);
            if ($result) {
                if ($row = $result->fetch_assoc()) {
                    return $row;
                }
            }
            return null;
        }

        public function getDoctorRelate($id) {
            $doctorList = [];
        
            // Lấy SPName của bác sĩ hiện tại
            $sql_specilist = "SELECT s.SPName FROM Specilist s
                              INNER JOIN Doctor d ON d.SPID = s.SPID
                              WHERE d.DoctorID = ?";
            $stmt = $this->con->prepare($sql_specilist);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result_specilist = $stmt->get_result();
        
            if ($result_specilist->num_rows > 0) {
                $row_specilist = $result_specilist->fetch_assoc();
                $specilist = $row_specilist['SPName'];
        
                // Lấy danh sách bác sĩ liên quan
                $sql = "SELECT * FROM User u
                INNER JOIN Doctor d ON d.UserID = u.UserID
                INNER JOIN Specilist s ON s.SPID = d.SPID
                WHERE DoctorID != ? AND s.SPName = ?";
                $stmt = $this->con->prepare($sql);
                $stmt->bind_param('is', $id, $specilist);
                $stmt->execute();
                $result = $stmt->get_result();
        
                while ($row = $result->fetch_assoc()) {
                    $doctorList[] = $row;
                }
            }
            $stmt->close();
            return $doctorList;
        }
        
        // Lấy timevalue
        public function getTimeValue($id) {
            $timevalue = [];

            $sql = "SELECT TimeValue FROM TimeType t
                    INNER JOIN Schedule s ON t.TTID = s.TTID
                    WHERE s.DoctorID = ?";
            
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $id); 
            $stmt->execute();

            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $timevalue[] = strtolower($row['TimeValue']);
            }
            $stmt->close();
            return $timevalue;
        }

        public function getIsBooked($id) {
            $timevalue = [];
            $sql = "SELECT TimeValue FROM TimeType t
                    INNER JOIN Schedule s ON s.TTID = t.TTID
                    WHERE s.DoctorID = ? AND s.IsBooked = 1";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) {
                $timevalue [] = strtolower($row['TimeValue']);
            }

            $stmt->close();
            return $timevalue;
        }

        public function getDays() {
            $days = [];
            $currentDay = new DateTime();
            for($i = 0; $i < 7; $i++) {
                $day = clone $currentDay;
                $day->modify("+$i day");
                $days[] = $day->format('Y-m-d');
            }
            return $days;
        }

        //Get days of schedule
        //Xem lai cach lay du lieu
        public function getDayOfSchedule($id) {
            $days = [];
            $sql = "SELECT DateOfSchedule FROM Schedule
            WHERE DoctorID = ?";
            $stmt = $this->con->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()) {
                $days[] = $row['DateOfSchedule'];
            }

            return $days;
        }

        public function getDoctorInforforAdmin() {
            $sql = "SELECT 
                    u.*, 
                    d.*, 
                    sp.SPName AS Specialty 
                FROM 
                    doctor d
                JOIN 
                    user u ON d.UserID = u.UserID
                JOIN 
                    specilist sp ON d.SPID = sp.SPID
                WHERE 
                    u.RoleID = 2
                ORDER BY 
                    u.FullName ASC";
            return mysqli_query($this->con, $sql);
        }

        public function getAllSpecialtiesAdmin() {
            $sql = "SELECT SPID, SPName FROM specilist";

            return mysqli_query($this->con, $sql);
        }

        public function insertDoctor($specialtyID, $fees, $userID) {
            $sql = "INSERT INTO doctor 
            VALUES (Null, $fees, Null, 1,Null, $userID,$specialtyID)";
            return mysqli_query($this->con, $sql);

        }
    } 
?>
