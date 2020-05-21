<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원정보 찾기 시작 { -->
<div id="find_info" class="new_win">
    <h1 id="win_title">아이디 / 비밀번호 찾기</h1>
    <div class="new_win_con">
        <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
            <fieldset id="info_fs">
                <p>
                    회원가입 시 등록하신 이름과 e-mail을 입력해 주세요!!<br>
                    해당 이름과 e-mail로 가입되어있는 이메일로 아이디와 비밀번호 정보를 보내드립니다!!!
                </p>
                <input type="name" id="mb_name" name="mb_name" placeholder="이름(필수)" required class="frm_input name">
                <input type="email" id="mb_email" name="mb_email" placeholder="이메일주소(필수)" required class="frm_input email">
            </fieldset>
            <div class="win_btn">
                <button type="submit" class="btn_submit">확인</button>
                <button type="button" onclick="window.close();" class="btn_close">창닫기</button>
            </div>
        </form>
    </div>
</div>

<script>
    function fpasswordlost_submit(f)
    {
        <?php echo chk_captcha_js(); ?>

        return true;
    }

    $(function() {
        var sw = screen.width;
        var sh = screen.height;
        var cw = document.body.clientWidth;
        var ch = document.body.clientHeight;
        var top  = sh / 2 - ch / 2 - 100;
        var left = sw / 2 - cw / 2;
        moveTo(left, top);
    });
</script>