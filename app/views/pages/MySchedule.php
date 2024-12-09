<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/MySchedule.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>


    <div class="content-schedule">
        <div class="my-chedule">
            <div class="date">
                <div>Filter date</div>
                <input type="date">
            </div>
            <div class="schedule-detail">
                <?php if (!empty($data['TimeType'])): ?> <!-- Sửa từ 'TimeType' thành 'TimeTypes' -->
                    <?php foreach ($data['TimeType'] as $timeType): ?> <!-- Sửa từ 'timetype' thành 'timeType' -->
                        <div class="schedule-detail-time"><?= htmlspecialchars($timeType); ?></div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div>No time slots available.</div> <!-- Thay đổi từ <tr> sang <div> -->
                <?php endif; ?>

            </div>
        </div>
    </div>


</body>

</html>