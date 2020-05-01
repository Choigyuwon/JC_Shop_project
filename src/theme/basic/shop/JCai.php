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
<div><p style = "font-size:25px;color:#243071; font-weight: bold;">상품 찾기(찾으시려는 상품을 캠 화면에 비춰주세요)</p><button type="button" onclick="init()" style="font-size: 25px;background-color: black;color:white;width: 500px;height: 500px;">CamStart</button></div>
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

        <?
        $lines = @file("../../../product_var.txt") or $result = "파일을 읽을 수 없습니다.";
        ?>

        var js_ary;
        var i, j;
        js_ary = <?php echo json_encode($lines) ?>;
        tes = String(js_ary);
        var strar = tes.split(",");

        for(i = 0; i < strar.length; i++) {
            strar[i] = strar[i].slice(0, strar[i].length - 2);
        }
        for(i = 1; i < strar.length; i+=5) {
            for(j = 0; j < strar.length / 5; j++) {
                if(prediction[j].className == strar[i] && prediction[j].probability.toFixed(2) <= 1.00 && prediction[j].probability.toFixed(2) >= 0.95) {
                    alert(strar[i+1]);
                    location.href=strar[i+2];
                }
            }
        }
        /*
        if(prediction[0].className == "shirt_pattern_shirt02" && prediction[0].probability.toFixed(2) <= 1.00 && prediction[0].probability.toFixed(2) >= 0.90) {
            //labelContainer.childNodes[0].innerHTML = "<font color=#483d8b>검정색 가방이다. 크로스백으로 요즘 많이 사용한다.</font>"
            alert("빨간색 계열의 바탕색에 검은색 체크무늬 가 들어간 셔츠!");
            location.href="http://gw2988.cafe24.com/g5/shop/item.php?it_id=1587623769"
        }
        else {
            labelContainer.childNodes[0].innerHTML = "<font color=#483d8b size='5'>알 수 없음</font>"
        }*/
    }
</script>
<section id="side_pd">
    <h2><a href="<?php echo shop_type_url('4'); ?>">사용자들이 많이 검색하는 상품</a></h2>
    <?php
    $list = new item_list();
    $list->set_type(4);
    $list->set_view('it_id', false);
    $list->set_view('it_name', true);
    $list->set_view('it_basic', false);
    $list->set_view('it_cust_price', false);
    $list->set_view('it_price', true);
    $list->set_view('it_icon', false);
    $list->set_view('sns', false);
    $list->set_view('star', true);
    echo $list->run();
    ?>
</section>
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