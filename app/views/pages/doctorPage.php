<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($data['DoctorList'])) : ?>
        <?php foreach($data['DoctorList'] as $doctor) : ?>
            <h2><?= htmlspecialchars($doctor['DoctorID']); ?></h2>
            <h3><?= htmlspecialchars($doctor['Experience']); ?></h3>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>