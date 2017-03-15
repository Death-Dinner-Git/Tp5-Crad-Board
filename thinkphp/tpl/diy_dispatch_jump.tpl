{__NOLAYOUT__}<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="url" content="">
    <meta name="mobile-agent" content="format=html5;url=http://m.wofang.com/">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/static/images/loader.gif" type="image/x-icon">
    <!-- For iPhone 4 Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/images/loader.gif">
    <!-- For iPhone -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/images/loader.gif">
    <!-- For iPad -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/images/loader.gif">
    <!-- For iPad Retina display -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/images/loader.gif">

    <title>跳转提示 - [ WF ]</title>

    <!-- For site css -->
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        .system-message{ padding: 24px 48px 96px 48px; color:#1fb5ac;}
        .system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; color:#1fb5ac;}
        .system-message .jump{ padding-top: 10px; }
        .system-message .jump a{  color:#1fb5ac; }
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px;}
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display: none; }
        .view.full-view{
            display:flex; position:fixed;top: 0px;left: 0px;right: 0px;bottom: 0px;
        }
        .view.view-middle{
            margin: auto;
        }
        .text-center{
            text-align: center;
            vertical-align: middle;
        }
        .load{
            position: relative;
            width: 20px;
            height: 20px;
        }
        .load img{
            position: absolute;
            width: 20px;
            height: 20px;
            bottom: 0px;
            left: -24px;
        }
    </style>
</head>
<body class="view full-view">
<div id="error_page" class="system-message view view-middle text-center">
    <?php switch ($code) {?>
    <?php case 1:?>
    <h1>:)</h1>
    <p class="success"><?php echo(strip_tags($msg));?></p>
    <?php break;?>
    <?php case 0:?>
    <h1>:(</h1>
    <p class="error"><?php echo(strip_tags($msg));?></p>
    <?php break;?>
    <?php } ?>
    <p class="detail"></p>
    <p class="jump">
        页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> <span style="display: inline-block;width: 24px;"></span><span class="load"><img  src="/static/images/loader.gif"/></span> 等待时间： <b id="wait"><?php echo($wait);?></b>
    </p>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>
