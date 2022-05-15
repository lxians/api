<?php /*a:1:{s:64:"/www/wwwroot/api.xcdah.cn/application/index/view/index/post.html";i:1644046912;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
<meta name="renderer" content="webkit"/>
<meta name="force-rendering" content="webkit"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title><?php echo htmlentities($post['title']); ?> - <?php echo htmlentities($info['title']); ?></title>
<meta name="keywords" content="<?php echo htmlentities($info['keywords']); ?>">
<meta name="description" content="<?php echo htmlentities($info['desc']); ?>">
<link rel="stylesheet" href="/public/static/mdui/css/mdui.min.css"/>
<link rel="stylesheet" href="/public/static/index/css/post.css">
</head>
<body>
<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
  <div class="mdui-container">
    <div class="mdui-card">
        <div class="home">
            <a href="/list">
                <i class="mdui-icon material-icons">arrow_back</i>
            </a>
        </div>
        <div class="share">
            <a href="/">
                <i class="mdui-icon material-icons">home</i>
            </a>
        </div>
        <h1 class="title"><?php echo htmlentities($post['title']); ?></h1>
        <div class="tags">
            <div class="mdui-chip">
                <span class="mdui-chip-title">分类：<?php echo htmlentities($post['sort']); ?></span>
            </div>
            <div class="mdui-chip">
                <span class="mdui-chip-title">时间：<?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($post['time'])? strtotime($post['time']) : $post['time'])); ?></span>
            </div>
        </div>
        <div class="mdui-row">
            <div class="mdui-col-xs-12">
                <?php echo $post['content']; ?>
            </div>
        </div>
    </div>
</div>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?<?php echo htmlentities($info['baidu']); ?>";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<?php echo htmlentities($info['css']); ?><?php echo htmlentities($info['js']); ?>
</body>
</html>