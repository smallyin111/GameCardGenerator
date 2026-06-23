<?php
function generateCode() {
    return substr(str_shuffle("0123456789"), 0, 8);
}

if (!isset($_FILES["image"]) || $_FILES["image"]["error"] !== 0) {
    echo "No file";
    exit;
}

$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

do {
    $code = generateCode();
    $filePath = $targetDir . $code . ".png";
} while (file_exists($filePath));

if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {
    echo $code;
} else {
    echo "Upload fail";
}
?>