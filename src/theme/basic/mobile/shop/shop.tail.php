<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
</div><!-- container End -->

<div id="ft">
    <div id="ft_copy">
        <div id="ft_company">
            <a href="<?php echo get_pretty_url('content', 'company'); ?>">팀원소개</a>
            <a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a>
            <a href="<?php echo get_pretty_url('content', 'provision'); ?>">서비스이용약관</a>
        </div>
    </div>
    <div class="ft_cnt">
        <h2>사이트 정보</h2>
        <p class="ft_info">
            팀명 : JustClap<br>
            주소 : 강원도 원주시 흥업면 강릉원주대학교 컴퓨터 공학과<br>
            대표 : 최규원 전화 010-4535-6076<br>
            개인정보 보호책임자 : 최규원<br>
        </p>
        <div style="color: white;"><br>Copyright &copy; <b>JustClap.</b> All rights reserved.<br></div>
    </div>

    <?php
    if(G5_DEVICE_BUTTON_DISPLAY && G5_IS_MOBILE) { ?>
        <?php
    }

    if ($config['cf_analytics']) {
        echo $config['cf_analytics'];
    }
    ?>
</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
