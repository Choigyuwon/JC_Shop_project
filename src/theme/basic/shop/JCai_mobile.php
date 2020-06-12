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
<body>

<?php
include_once('./_common.php');

define("_INDEX_", TRUE);
?>
<!-- AI 코드 시작 -->

<?php
$list_data = @file("./DATA_FOR_JCai/LIST.txt");
$num_data = count($list_data);
$num_data2 = 0;
$ar_data = array();
$k = 0;

for($i = 0; $i < $num_data; $i++) {
    if($i != $num_data - 1) {
        $list_data[$i] = substr($list_data[$i], 0, -1);
    }
    $path_data = "./DATA_FOR_JCai/".$list_data[$i].".txt";
    $temp_data = @file($path_data);
    $num_data2 += count($temp_data);

    for ($j = 0; $j < count($temp_data); $j++) {
        $ar_data[$k] = $temp_data[$j];
        $k++;
    }
}
?>

<div><button type="button" id="buttonclick" onclick="init()" style="font-size: 25px;background-color: black;color:white;width: 400px;height: 400px;">CamStart</button></div>
<div id="webcam-container"></div>
<div id="label-container"></div>
<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>
<script type="text/javascript">
    // More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "./my_model/";

    let model, webcam, labelContainer, maxPredictions;

    // Load the image model and setup the webcam
    async function init() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(400, 400, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }
        document.getElementById("buttonclick").style.display = "none";
    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }

    // run the webcam image through the image model
    async function predict() {

        var js_ary, strar, strar_re, count;
        count = <?php echo json_encode($num_data2) ?>;
        js_ary = <?php echo json_encode($ar_data) ?>;
        tes = String(js_ary);
        strar = tes.split(",");

        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        for (let i = 0; i < maxPredictions; i++) {
            const classPrediction = prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            labelContainer.childNodes[i].innerHTML = classPrediction;
            for(let j = 0; j < count; j++) {
                strar_re = strar[j].split("|");
                if(strar_re[1] == prediction[i].className && prediction[i].probability.toFixed(2) >= 0.80 && prediction[i].probability.toFixed(2) <= 0.90 ) {
                    var result = confirm("찾으시는 상품의 추천상품을 보시려면 확인을 눌러주세요. 정확하게 찾으시는 상품을 찾으시려면 취소를 눌러주세요.");
                    if(result){
                        alert("관련상품으로 이동합니다.");
                        location.href=strar_re[3];
                    }else{
                        alert("다시 스캔해주세요!");
                    }
                    alert(strar_re[2]);
                    location.href = strar_re[3];
                }
            }
        }
    }
</script>
<!-- AI 코드 끝 -->

</body>
<!--Start of Tawk.to Script-->

</html>