<!DOCTYPE html>
<html lang="en">
<head>
<base href="/Clinic-Booking/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once './app/views/components/Header.php';
        require_once './app/views/pages/'.$data['Page'].'.php';
        require_once './app/views/components/Footer.php';
    ?>
</body>
</html>