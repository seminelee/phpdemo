<?php
    header("Content-type: text/html; charset=utf-8");
    if (isset($_REQUEST['authcode'])) {
        session_start();
        if (strtolower($_REQUEST['authcode']) == $_SESSION['authcode']) {
            echo '<h4 style="color:#0000CC">输入正确</h4>';
        } else {
            echo '<h4 style="color:#CC0000">输入错误</h4>';
        }
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>确认验证码</title>
</head>
<body>
    <form method="post" action="./form.php">
        <p>验证码：
            <img id="captcha" border="1" src="./captcha.php?r=<?php echo rand(); ?>" width="200" height="60" style="cursor: pointer;">
            <a id="change" href="javascript:void(0)" style="text-decoration: none; font-size: 12px;">换一个</a>
        </p>
        <p>输入图中的汉字：<input type="text" name="authcode" value="" /></p>
        <p><input type="submit" value="提交" style="padding: 6px 20px;"></p>
    </form>
    <script type="text/javascript">
        var change = document.getElementById('change');
        var captcha = document.getElementById('captcha');
        change.addEventListener('click', function() {
            changeSrc();
        });
        captcha.addEventListener('click', function() {
            changeSrc();
        });
        function changeSrc() {
            captcha.src = "./captcha.php?r="+Math.random();
        }
    </script>
</body>
</html>
