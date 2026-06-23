let img = new Image();

function loadImage() {
    let code = document.getElementById("code").value;
    img.src = "get_image.php?code=" + encodeURIComponent(code);
}

function generateCard() {
    let canvas = document.getElementById("cardCanvas");
    let ctx = canvas.getContext("2d");

    let template = document.getElementById("template").value;

    // 背景
    if (template === "template1") {
        ctx.fillStyle = "red";
    } else {
        ctx.fillStyle = "blue";
    }
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // 圖片
    ctx.drawImage(img, 50, 50, 300, 300);

    // 文字
    let text = document.getElementById("customText").value ||
               document.getElementById("presetText").value;

    ctx.fillStyle = "white";
    ctx.font = "20px Arial";
    ctx.fillText(text, 50, 400);
}

function uploadCard() {
    let canvas = document.getElementById("cardCanvas");

    canvas.toBlob(blob => {
    let formData = new FormData();

    // ✅ 加上檔名（非常重要）
    formData.append("image", blob, "photo.png");

    fetch("upload.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(code => {
        document.getElementById("result").innerText =
            "✅ 上傳成功！你的代碼：" + code;
    });
});

}