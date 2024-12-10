<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashborard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="public/css/AddApointment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="content">


        <form action="" method="post">
            <div class="content-add-appointment">
                <div class="infor-patient">
                    <div>Patient's full name </div>
                    <input type="text" name="name-patient">
                </div>
                <div class="date">
                    <div class="choose-date">Choose date</div>
                    <input type="date" name="date">
                </div>

                <div class="add-time">
                    <?php if (!empty($data['TimeType'])): ?>
                        <?php foreach ($data['TimeType'] as $timeType): ?>
                            <div class="time-detail" data-time="<?= htmlspecialchars($timeType); ?>">
                                <?= htmlspecialchars($timeType); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div>No time slots available.</div>
                    <?php endif; ?>
                </div>
                <input type="hidden" name="time_type" id="selected-time" required>

                <button class="btn-create" type="submit"> Crreate time</button>
            </div>
        </form>
    </div>
    <script>
        document.querySelectorAll('.time-detail').forEach(div => {
            div.addEventListener('click', function() {
                document.getElementById('selected-time').value = this.getAttribute('data-time');
                document.querySelectorAll('.time-detail').forEach(option => option.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
    </script>
    <style>
        .time-detail {
            margin: 5px;
            padding: 10px;
            background-color: #1d2d5e;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }

        .time-detail.selected {
            background-color: #0056b3;
        }
    </style>
</body>

</html>