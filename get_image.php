<?php
$code = $_GET['code'] ?? '';

// 安全處理（只保留數字）
$code = preg_replace('/[^0-9]/', '', $code);

$file = __DIR__ . '/uploads/' . $code . '.png';

// ✅ Debug（超重要）
if (!file_exists($file)) {
    echo "❌ 找不到檔案<br>";
    echo "路徑：" . $file;
    exit;
}

// ✅ 顯示圖片
header("Content-Type: image/png");
header("Content-Length: " . filesize($file));
readfile($file);
exit;
?>