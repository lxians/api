<?php /*a:1:{s:63:"/www/wwwroot/api.xcdah.cn/application/index/view/index/doc.html";i:1644046912;}*/ ?>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <title><?php echo htmlentities($api['name']); ?> - <?php echo htmlentities($info['title']); ?></title>
    <meta name="keywords" content="<?php echo htmlentities($info['keywords']); ?>">
    <meta name="description" content="<?php echo htmlentities($info['desc']); ?>">
    <link rel="stylesheet" href="/public/static/mdui/css/mdui.min.css">
    <link rel="stylesheet" href="/public/static/doc/css/github-gist.css">
    <link rel="stylesheet" href="/public/static/doc/css/docs.css">
    <script src="/public/static/jquery.min.js"></script>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-loaded">
    <header class="mdui-appbar mdui-appbar-fixed">
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer'}">
				<i class="mdui-icon material-icons">menu</i>
			</span>
            <a href="<?php echo htmlentities($info['domain']); ?>" class="mdui-typo-headline mdui-hidden-xs"><?php echo htmlentities($info['title']); ?></a>
            <a href="/list" class="mdui-typo-headline mdui-hidden-xs">文章列表</a>
        </div>
    </header>
    <div class="mdui-drawer" id="main-drawer">
        <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lists): $mod = ($i % 2 );++$i;if(($lists['id'] == 1)): if(is_array($lists['nr']) || $lists['nr'] instanceof \think\Collection || $lists['nr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $lists['nr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                    <div class="mdui-collapse-item">
                        <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                            <i class="mdui-list-item-icon mdui-icon material-icons "><?php echo htmlentities($sub['icon']); ?></i>
                            <div class="mdui-list-item-content">
                                <a href="<?php echo htmlentities($sub['doc']); ?>"><?php echo htmlentities($sub['name']); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; else: ?>
                <div class="mdui-collapse-item">
                    <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                        <i class="mdui-list-item-icon mdui-icon material-icons "><?php echo htmlentities($lists['icon']); ?></i> 
                        <div class="mdui-list-item-content">
                            <?php echo htmlentities($lists['name']); ?>
                        </div>
                        <?php if(($lists['type'] == 0)): ?>
                            <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i> 
                        <?php endif; ?>
                    </div>
                    <?php if(is_array($lists['nr']) || $lists['nr'] instanceof \think\Collection || $lists['nr'] instanceof \think\Paginator): $i = 0; $__LIST__ = $lists['nr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($i % 2 );++$i;?>
                        <div class="mdui-collapse-item-body mdui-list">
                            <a href="<?php echo htmlentities($sub['doc']); ?>" class="mdui-list-item mdui-ripple "><?php echo htmlentities($sub['name']); ?></a>
                        </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="mdui-container doc-container">
        <div class="mdui-typo">
            <h1 class="doc-title mdui-text-color-theme"><?php echo htmlentities($api['name']); ?></h1>
        </div>
        <div class="doc-intro mdui-typo">
            <?php if(!(empty($api['desc']) || (($api['desc'] instanceof \think\Collection || $api['desc'] instanceof \think\Paginator ) && $api['desc']->isEmpty()))): ?>
            <ul>
                <li><?php echo htmlentities($api['desc']); ?></li>
            </ul>
            <?php endif; ?>
        </div>
        <nav class="doc-toc mdui-text-color-theme">
            <ul>
                <li>
                    <a href="#1">使用教程</a>
                    <ul>
                        <li><a href="#2">请求地址</a></li>
                        <li><a href="#3">返回数据</a></li>
                        <li><a href="#4">调用效果</a></li>
                    </ul>
                </li>
                <li><a href="#5">请求参数</a></li>
            </ul>
        </nav>
        <div class="doc-cover">
        </div>
        <div class="doc-chapter">
            <div class="mdui-typo">
                <h2 class="doc-chapter-title doc-chapter-title-first mdui-text-color-theme">使用教程
                    <a class="doc-anchor" id="1"></a>
                </h2>
            </div>
            <div class="mdui-typo">
                <hr>
                <p id="2">
                    请求地址 <a><code id="URL" onclick="myCopyFunction()"><?php echo htmlentities($info['domain']); ?><?php echo htmlentities($api['path']); ?></code></a>
                </p>
                <p id="3">
                    返回数据 <code><?php echo htmlentities($api['info']); ?></code>
                </p>
            </div>
            <?php if(!(empty($api['demo']) || (($api['demo'] instanceof \think\Collection || $api['demo'] instanceof \think\Paginator ) && $api['demo']->isEmpty()))): ?>
            <div class="doc-example">
                <div class="doc-example-tools">
                    <a href="javascript:;" class="viewsource" mdui-tooltip="{content: '查看代码'}"><i class="mdui-icon material-icons">code</i></a>
                </div>
                <div class="doc-example-demo-label">
                    Example
                </div>
                <div class="doc-example-demo">
                    <p id="4">调用效果 <code><?php echo $api['demo']; ?></code></p>
                </div>
                <pre class="doc-example-code">
						<code class="lang-html hljs xml"><span class="hljs-tag"><?php echo htmlentities($api['demo']); ?></span></code>
					</pre>
            </div>
            <?php endif; ?>
            <div class="mdui-typo" id="5">
                <h2 class="doc-chapter-title mdui-text-color-theme">请求参数</h2>
                <div class="mdui-table-fluid">
                    <?php echo $api['detail']; ?>
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
    <script>
        function myCopyFunction() {
            var myText = document.createElement("textarea")
            myText.value = document.getElementById("URL").innerHTML;
            document.body.appendChild(myText)
            myText.select();
            document.execCommand('copy');
            document.body.removeChild(myText);
            mdui.snackbar("请求链接已复制");
        }
    </script>
    <script src="/public/static/doc/js/smooth-scroll.min.js"></script>
    <script src="/public/static/doc/js/holder.min.js"></script>
    <script src="/public/static/doc/js/highlight.pack.js"></script>
    <script src="/public/static/mdui/js/mdui.min.js"></script>
    <script>
        var $$ = mdui.$;
    </script>
    <script src="/public/static/doc/js/docs.js"></script>
</body>

</html>