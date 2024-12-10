<?php
    require __DIR__ . '/../../vendor/autoload.php';
    $stripe_secret_key = "sk_test_51Q56IALiAnjHSuM1u6IGlLNQjI1LNUzxp9vaU6CQvcLCgMU8pkKfnU0egCZpyI1CRKIinocpywULoIp5t0OVTLUL00SKcKl3w4";
    \Stripe\Stripe::setApiKey($stripe_secret_key);
    $checkout_session =  \Stripe\Checkout\Session::create([
        "mode" => "payment",
        "success_url" => "http://localhost/PHP_CLINIC/Clinic-Booking/Home",
        "line_items" => [
            [
                "quantity" => 1,
                "price_data" => [
                    "currency" => "usd",
                    "unit_amount_decimal" => $data['Fees'],
                    "product_data" => [
                    "name" => "Fees"
                    ]
                ]
            ]
        ]
    ]);
http_response_code(303);
header("Location: " . $checkout_session->url);
?>