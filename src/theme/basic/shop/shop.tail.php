<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
    return;
}

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>
        </div>  <!-- } .shop-content 끝 -->
	</div>      <!-- } #container 끝 -->
</div>
<!-- } 전체 콘텐츠 끝 -->
<!-- 하단 시작 { -->
<div id="ft">
<div id="ft_wr">
<div id="logo" class="ft_cnt">
<a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/jc_logo" id="logosize" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
        <div id="ft_company" class="ft_cnt">
        	<h2>회사(팀) 정보</h2>
	        <p class="ft_info">
		    <span><b>팀명</b> <?php echo $default['de_admin_company_name']; ?></span><br>
	            <span><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></span><br>
	            <span><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></span>
	            <span><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></span><br>
	            <!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
	            <span><b>개인정보 보호책임자</b> <?php echo $default['de_admin_info_name']; ?></span><br>
	    </div>
        <div class="ft_cnt" id="ft_bank">
        <h2 id="ft_bankh2">BANKING INFO</h2><br><br>
        농협 356-1004-8447-03 최규원<br><br>
        농협 352-050-199-4833 정예락<br><br>
        농협 302-0912-2093-11  엄수현<br><br>
        농협 356-0993-7665-13 이재성<br><br>
        </div>

        <ul id="ft_link" class="ft_cnt">
            <li><a href="<?php echo get_pretty_url('content', 'company'); ?>">팀원소개</a></li>
            <li><a href="<?php echo get_pretty_url('content', 'provision'); ?>">서비스이용약관</a></li>
            <li><a href="<?php echo get_pretty_url('content', 'privacy'); ?>">개인정보처리방침</a></li>
        </ul>
        
	    
	    <!-- 커뮤니티 최신글 시작 { -->
       
    </div>

    <div id="ft_copy">Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.</div>
</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
