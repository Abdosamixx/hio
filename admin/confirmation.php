<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subscriptionTitle = $_POST["subscriptionTitle"];
    $subscriptionPrice = $_POST["subscriptionPrice"];
    $emailAddress = $_POST["emailAddress"];

    // اتصال بقاعدة البيانات
    $servername = "localhost";
    $username = "اسم المستخدم";
    $password = "كلمة المرور";
    $dbname = "اسم قاعدة البيانات";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // التحقق من الاتصال
    if ($conn->connect_error) {
        die("فشل الاتصال: " . $conn->connect_error);
    }

    // إدراج البيانات في جدول
    $sql = "INSERT INTO subscriptions (subscriptionTitle, subscriptionPrice, emailAddress)
            VALUES ('$subscriptionTitle', '$subscriptionPrice', '$emailAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "تم تأكيد الاشتراك بنجاح!";
    } else {
        echo "حدث خطأ: " . $conn->error;
    }

    $conn->close();
}
?>