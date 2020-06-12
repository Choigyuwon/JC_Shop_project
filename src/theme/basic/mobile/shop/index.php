<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
?>

    <script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
    <script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>


<?php echo display_banner('왼쪽', 'boxbanner.skin.php'); ?>
    <div style="text-align: center">
        <button type="button" id="sch_submit2" onclick="location.href='https://gw2988.cafe24.com/g5/theme/basic/shop/JCai_mobile.php' " style="color: white;"><img src="<?php echo G5_DATA_URL; ?>/common/AICAM" style="background-repeat: no-repeat; width: 100px;height: 100px; background-color: black;color: white;"></button>
        <div style="color: black;font-size: 20px;">Search with CAM</div>
    </div>

<?php echo display_banner('메인', 'mainbanner.10.skin.php'); ?>

<?php if($default['de_mobile_type1_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo shop_type_url('1'); ?>">인기상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(1);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', false);
        echo $list->run();
        ?>
    </div>
<?php } ?>

<?php if($default['de_mobile_type2_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo shop_type_url('2');; ?>">최신상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(2);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
    </div>
<?php } ?>

<?php if($default['de_mobile_type3_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo shop_type_url('3');; ?>">추천상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(3);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
    </div>
<?php } ?>

<?php if($default['de_mobile_type4_list_use']) { ?>
    <div class="sct_wrap">
        <h2><a href="<?php echo shop_type_url('4'); ?>">할인상품</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(4);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();
        ?>
    </div>
<?php } ?>

<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>