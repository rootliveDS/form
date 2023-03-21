<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');




if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        http_response_code(400);
        echo "Пожалуйста, заполните все поля.";
        exit;
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "Пожалуйста, введите правильный email.";
        exit;
    }


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'ageev@itr-spb.ru';
    $subject = 'Сообщение с формы обратной связи';
    $message = 'Имя: ' . $_POST['name'] . "\n\n" . 'Email: ' . $_POST['email'] . "\n\n" . 'Сообщение: ' . $_POST['message'];
    $headers = 'From: ' . $_POST['email'];

    if (mail($to, $subject, $message, $headers)) {

        http_response_code(200);
        echo "<script>alert('Данные успешно отправлены!');</script>";
    } else {
        http_response_code(500);
        echo "Извините, произошла ошибка при отправке сообщения.";
    }
}
?>
