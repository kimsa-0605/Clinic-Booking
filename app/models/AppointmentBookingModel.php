<?php
class AppointmentBookingModel extends DB {
    public function getAppointments($userID) {
        $qr = "SELECT 
            u.FullName AS DoctorName,
            sp.SPName AS Specilist,
            sch.DateOfSchedule AS ScheduleDate,
            tt.TimeValue AS TimeType,
            CASE 
                WHEN ap.AppointmentStatus = 0 THEN 'Not examined'
                WHEN ap.AppointmentStatus = 1 THEN 'Examined'
                ELSE 'Không xác định'
            END AS AppointmentStatus,
            ap.Description AS AppointmentDescription
        FROM 
            appointment ap
        JOIN 
            schedule sch ON ap.SCID = sch.SCID
        JOIN 
            doctor d ON sch.DoctorID = d.DoctorID
        JOIN 
            user u ON d.UserID = u.UserID
        JOIN 
            specilist sp ON d.SPID = sp.SPID
        JOIN 
            timetype tt ON sch.TTID = tt.TTID
        WHERE 
            ap.UserID = '$userID'
        ORDER BY 
            ap.AppointmentStatus = 0 DESC, -- Đưa các bản ghi với AppointmentStatus = 0 lên đầu
            sch.DateOfSchedule ASC; -- Sắp xếp theo ngày tăng dần
        "; 
        return mysqli_query($this->con, $qr);
    }

    public function getUpcomingSchedule($userID) {
        $qr = "SELECT 
            ap.APID,
            u.FullName AS DoctorName,
            sp.SPName AS Specilist,
            sch.DateOfSchedule AS ScheduleDate,
            tt.TimeValue AS TimeType,
            ap.AppointmentStatus,
            ap.Description
        FROM 
            appointment ap
        JOIN 
            schedule sch ON ap.SCID = sch.SCID
        JOIN 
            doctor d ON sch.DoctorID = d.DoctorID
        JOIN 
            user u ON d.UserID = u.UserID
        JOIN 
            specilist sp ON d.SPID = sp.SPID
        JOIN 
            timetype tt ON sch.TTID = tt.TTID
        WHERE 
            ap.UserID = '$userID' 
            AND ap.AppointmentStatus = 0 -- Lấy lịch chưa khám
            AND sch.DateOfSchedule >= CURDATE() -- Chỉ lấy lịch từ ngày hôm nay trở đi
        ORDER BY 
            sch.DateOfSchedule ASC, -- Sắp xếp theo ngày gần nhất
            tt.TimeValue ASC -- Sắp xếp theo thời gian
        LIMIT 1; -- Lấy lịch gần nhất";
        return mysqli_query($this->con, $qr);
    }

    public function getRecentAppointments($userID) {
        $qr = "SELECT 
            u.FullName AS DoctorName,
            sp.SPName AS Specilist,
            sch.DateOfSchedule AS ScheduleDate,
            tt.TimeValue AS TimeType,
            ap.AppointmentStatus,
            ap.Description
        FROM 
            appointment ap
        JOIN 
            schedule sch ON ap.SCID = sch.SCID
        JOIN 
            doctor d ON sch.DoctorID = d.DoctorID
        JOIN 
            user u ON d.UserID = u.UserID
        JOIN 
            specilist sp ON d.SPID = sp.SPID
        JOIN 
            timetype tt ON sch.TTID = tt.TTID
        WHERE 
            ap.UserID = '$userID'
            AND ap.AppointmentStatus = 1 -- Chỉ lấy lịch đã hoàn thành
        ORDER BY 
            sch.DateOfSchedule DESC, -- Lấy ngày gần nhất trước
            tt.TimeValue DESC -- Nếu cùng ngày, lấy thời gian gần nhất trước
        LIMIT 5; -- Chỉ lấy 5 lịch gần nhất";
         return mysqli_query($this->con, $qr);
    }
}
