<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // المقارنة مع معلومات تسجيل الدخول الفعلية
    $actualUsername = "اسم المستخدم"; // ضع اسم المستخدم الفعلي هنا
    $actualPassword = "كلمة المرور"; // ضع كلمة المرور الفعلية هنا

    if ($username == $actualUsername && $password == $actualPassword) {
        // تحقق ناجح، قم بتعيين متغيرات الجلسة
        $_SESSION["username"] = $username;
        $_SESSION["loggedIn"] = true;

        // توجيه المستخدم إلى صفحة تأكيد الدخول
        header("Location: confirmation.php");
        exit();
    } else {
        // تحقق فاشل، يمكن توجيه المستخدم إلى صفحة خطأ الدخول
        header("Location: error.html");
        exit();
    }
}
?>