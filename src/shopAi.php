<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/default_shop.css">
    <link rel="stylesheet" href="../../../js/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../js/owlcarousel/owl.carousel.css">
    <link rel="stylesheet" href="../../../theme/basic/skin/outlogin/shop_side/style.css">
    <link rel="stylesheet" href="../../../theme/basic/skin/shop/basic/style.css">
</head>
<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>

<!-- 메인이미지 시작 { -->
<div><p style = "font-size:25px;color:#243071; font-weight: bold;">상품 찾기(찾으시려는 상품을 캠 화면에 비춰주세요)</p><button type="button" onclick="init()" style="font-size: 25px;background-color: black;color:white;">CamStart</button></div>
<div
<div id="webcam-container"></div>
<div id="label-container"></div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    const URL = "./my_model/";

    let model, webcam, labelContainer, maxPredictions;

    async function init() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        const flip = true;
        webcam = new tmImage.Webcam(500, 500, flip);
        await webcam.setup();
        await webcam.play();
        window.requestAnimationFrame(loop);

        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
    }

    async function loop() {
        webcam.update();
        await predict();
        window.requestAnimationFrame(loop);
    }

    async function predict() {
        const prediction = await model.predict(webcam.canvas);
        if(prediction[0].className == "blackbag" && prediction[0].probability.toFixed(2) == 1.00) {
            //labelContainer.childNodes[0].innerHTML = "<font color=#483d8b>검정색 가방이다. 크로스백으로 요즘 많이 사용한다.</font>"
            alert("검정색 가방입니다. 유사 상품이 있는 곳으로 이동합니다.");
            location.href="https://gw2988.cafe24.com/g5/theme/basic/shop/"
        } else if(prediction[1].className == "hair" && prediction[1].probability.toFixed(2) == 1.00) {
            labelContainer.childNodes[0].innerHTML = "<font color=#483d8b>놀이동산에서 구매할 수 있는 머리띠 이다.</font>"
            alert("머리띠 입니다. 유사 상품이 있는 곳으로 이동합니다.");
        } else {
            labelContainer.childNodes[0].innerHTML = "<font color=#483d8b size='5'>알 수 없음</font>"
        }
    }
</script>
</body>
<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5e46e727a89cda5a188607bb/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
</html>