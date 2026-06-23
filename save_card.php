<?php
$targetDir = "cards/";

if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

$name = uniqid("card_") . ".png";

move_uploaded_file($_FILES["card"]["tmp_name"], $targetDir . $name);

echo "✅ 卡牌已儲存：" . $name;
?>