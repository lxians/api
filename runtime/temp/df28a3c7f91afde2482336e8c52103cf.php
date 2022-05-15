<?php /*a:1:{s:65:"/www/wwwroot/api.xcdah.cn/application/index/view/index/index.html";i:1644046912;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlentities($site['title']); ?></title>
    <meta name="description" content="<?php echo htmlentities($site['desc']); ?>">
    <meta name="keywords" content="<?php echo htmlentities($site['keywords']); ?>">
    <link rel="stylesheet" type="text/css" href="public/static/index/css/flaghome.css">
    <script src="/public/static/jquery.min.js"></script>
</head>
<body>
    <div class="background">
        <canvas id="startrack"></canvas>
        <div class="cover">
        </div>
    </div>
    <div class="main">
        <div class="ch intro">
            <div class="container">
                <div class="hello">
                    <h1 id="slogan">思考中……</h1>
                    <h2>
                        <div class="circle">
                            <span></span><span></span><span></span>
                        </div>
                        <?php echo htmlentities($site['title']); ?>免费提供API服务
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <?php if(!(empty($post) || (($post instanceof \think\Collection || $post instanceof \think\Paginator ) && $post->isEmpty()))): ?>
    <div class="ch about">
        <div class="container">
          <h2 class="chtitle"><span>文章列表</span></h2>
          <ul class="skill clear">
            <?php if(is_array($post) || $post instanceof \think\Collection || $post instanceof \think\Paginator): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="post">
                    <p><a href="/post/<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities(msubstr($vo['title'],0,20)); ?></a></p>
                    <span><?php echo htmlentities(date("Y-m-d",!is_numeric($vo['time'])? strtotime($vo['time']) : $vo['time'])); ?></span>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        <?php if(count($post) > 11): ?>
        <span class="more"><a href="/list">查看更多</a></span>
        <?php endif; ?>
        </div>
      </div>      
      <?php endif; ?>
    <div class="find ch">
        <div class="container links">
            <h2 class="chtitle"><span>API列表</span></h2>
            <div class="clear">
                <?php if(is_array($api) || $api instanceof \think\Collection || $api instanceof \think\Paginator): $i = 0; $__LIST__ = $api;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$api): $mod = ($i % 2 );++$i;?>
                <a href="/doc/<?php echo htmlentities($api['doc']); ?>" target="_blank">
                    <div class="item">
                        <div class="bg" style="background-color: #28A9E0"></div>
                        <div class="inner">
                            <span><?php echo htmlentities($api['name']); ?></span>
                        </div>
                    </div>
                </a>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div class="footer ch">
        <div class="container">
            <p>
                <script type="text/javascript" src="https://tenapi.cn/yiyan/get/"></script>
            </p>
            <p class="c">Make by <a href="http://flag.Moe" rel="nofollow" target="_blank">flag.Moe</a> | Second revision by
                <a href="https://github.com/5ime/api-admin" rel="nofollow" target="_blank">API-Admin</a></p>
        </div>
    </div>
    </div>
    <script src="public/static/index/js/page.js"></script>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?<?php echo htmlentities($site['baidu']); ?>";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <?php echo htmlentities($site['css']); ?>
    <?php echo htmlentities($site['js']); ?>
</body>

</html>