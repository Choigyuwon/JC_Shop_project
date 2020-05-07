<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    <div id="tnb">
        <div class="inner">
            <ul id="hd_define">
            </ul>
            <ul class="hd_login">
                <?php if ($is_member) {  ?>
                    <li class="shop_login">
                        <?php echo outlogin('theme/shop_basic'); // 아웃로그인 ?>
                    </li>
                    <li class="shop_cart"><a href="<?php echo G5_SHOP_URL; ?>/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sound_only">장바구니</span><span class="count"><?php echo get_boxcart_datas_count(); ?></span></a></li>
                <?php } else { ?>
                    <li class="login"><a href="<?php echo G5_BBS_URL ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a></li>
                <?php }  ?>
            </ul>
        </div>
    </div>
    <div id="hd_wrapper">
        <div id="logo">
            <a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/jc_logo" id="logosize" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
        <div class="hd_sch_wr">
            <fieldset id="hd_sch">
                <legend>쇼핑몰 전체검색</legend>
                <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">

                    <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="sch_str" required placeholder="검색어를 입력해주세요">
                    <button type="submit" id="sch_submit" value="검색"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
                    <button type="button" id="sch_submit2" onclick="location.href='https://gw2988.cafe24.com/g5/theme/basic/shop/JCai.php' " style="color: white;"><img src="<?php echo G5_DATA_URL; ?>/common/AICAM" style="background-repeat: no-repeat; width: 100px;height: 100px; background-color: black;color: white;">WebCams</button>
                    <div style="color: white; position: absolute; margin-top: 200px; margin-left: 175px; font-size: 20px;">Search with CAM</div>
                </form>
                <script>
                    function search_submit(f) {
                        if (f.q.value.length < 2) {
                            alert("검색어는 두글자 이상 입력하십시오.");
                            f.q.select();
                            f.q.focus();
                            return false;
                        }
                        return true;
                    }
                </script>
            </fieldset>
        </div>
        <!-- 쇼핑몰 배너 시작 { -->
        <?php // echo display_banner('왼쪽'); ?>
        <!-- } 쇼핑몰 배너 끝 -->

    </div>

    <!-- del_js -->
</div>
<!-- } 상단 끝 -->


<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">

        <div id="container">
            <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php } ?>

