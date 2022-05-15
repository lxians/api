<?php /*a:3:{s:65:"/www/wwwroot/api.xcdah.cn/application/admin/view/index/black.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/header.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/footer.html";i:1644046912;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>请求限制 - 后台管理</title>
    <link rel="stylesheet" href="/public/static/mdui/css/mdui.min.css" />
    <link rel="stylesheet" href="/public/static/admin/main.css">
    <script src="/public/static/jquery.min.js"></script>
    <script src="/public/static/admin/chart.min.js"></script>
    <link rel="icon" type="image/png" href="/public/favicon.png">
    <script src="/public/static/admin/public.js"></script>
    <link rel="stylesheet" href="/public/static/editor/css/editormd.css">k
</head>

<body class="mdui-drawer-body-left mdui-loaded">
    <div class="loading">
        <div class="mdui-spinner mdui-spinner-colorful mdui-spinner-dots"></div>
    </div>
    <div class="mdui-appbar-with-toolbar">
        <div class="mc-appbar mdui-appbar mdui-appbar-fixed">
            <div class="mdui-toolbar">
                <button id="toggle" class="drawer mdui-btn mdui-btn-icon mdui-ripple">
                    <i class="mdui-icon material-icons">menu</i>
                </button>
                <a href="javascript:;" class="mdui-typo-headline min-display">Index</a>
                <a href="javascript:;" class="mdui-typo-title min-display">请求限制</a>
                <div class="mdui-toolbar-spacer"></div>
                <div class="mdui-textfield mdui-textfield-expandable mdui-float-right">
                    <button class="mdui-textfield-icon mdui-btn mdui-btn-icon">
                      <i class="mdui-icon material-icons">search</i>
                    </button>
                    <input class="mdui-textfield-input" type="text" id="search" placeholder="Search" />
                    <button class="mdui-textfield-close mdui-btn mdui-btn-icon">
                      <i class="mdui-icon material-icons">close</i>
                    </button>
                </div>
                <a href="javascript:;" class="mdui-btn mdui-btn-icon" id="upDate" mdui-tooltip="{content: '检测更新'}">
                    <i class="mdui-icon material-icons">loop</i>
                </a>
                <button class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#menu'}" mdui-tooltip="{content: '个人信息'}">
                    <i class="mdui-icon material-icons">perm_identity</i>
                </button>
                <ul class="mdui-menu" id="menu">
                    <li class="mdui-menu-item" id="getUserinfo" mdui-dialog="{target: '#userinfo'}">
                        <a href="javascript:;" class="mdui-ripple">个人设置</a>
                    </li>
                    <li class="mdui-divider"></li>
                    <li class="mdui-menu-item">
                        <a href="javascript:;" onclick="logout()" class="mdui-ripple">退出登录</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mdui-dialog" id="userinfo">
        <div class="mdui-dialog-title">用户信息</div>
        <div class="mdui-dialog-content">
            <img class="mdui-img-circle mdui-center mdui-shadow-2" src="https://gravatar.loli.top/avatar/9dd60d36e3c5f1c7ee7c19b7d40af067" />
            <div class="mdui-textfield">
                <label class="mdui-textfield-label">User Name</label>
                <input class="mdui-textfield-input" id="username" type="text" required/>
                <div class="mdui-textfield-error">用户名不能为空</div>
            </div>

            <div class="mdui-textfield">
                <label class="mdui-textfield-label">Email</label>
                <input class="mdui-textfield-input" id="email" type="email" required/>
                <div class="mdui-textfield-error">邮箱格式错误</div>
            </div>

            <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Password</label>
                <input class="mdui-textfield-input" id="password" type="password" pattern="^.*(?=.{6,})(?=.*[a-z])(?=.*[A-Z]).*$" required/>
                <div class="mdui-textfield-error">密码至少 6 位，且包含大小写字母</div>
                <div class="mdui-textfield-helper">请输入至少 6 位，且包含大小写字母的密码</div>
            </div>
        </div>
        <div class="mdui-dialog-actions">
            <button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>
            <button class="mdui-btn mdui-ripple" id="putUserinfo">提交</button>
        </div>
    </div>

    <div class="mdui-drawer" id="drawer">
        <div class="mdui-list">
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('index/index'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons ">dashboard</i>
                <div class="mdui-list-item-content">仪表盘</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('post/postAdd'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                <div class="mdui-list-item-content">文章发布</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('post/postList'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">format_list_bulleted</i>
                <div class="mdui-list-item-content">文章列表</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('api/apiAdd'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">playlist_add</i>
                <div class="mdui-list-item-content">接口添加</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('api/apiList'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">format_list_bulleted</i>
                <div class="mdui-list-item-content">接口列表</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('sort/sortAdd'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">playlist_add</i>
                <div class="mdui-list-item-content">分类添加</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('sort/sortList'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">format_list_bulleted</i>
                <div class="mdui-list-item-content">分类列表</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('index/black'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">filter_drama</i>
                <div class="mdui-list-item-content">请求限制</div>
            </a>
            <a class="mdui-list-item mdui-ripple" href="<?php echo url('index/setup'); ?>">
                <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
                <div class="mdui-list-item-content">站点信息</div>
            </a>
        </div>
        <div class="copyright">
            <p>©
                <script>
                    document.write(new Date().getFullYear())
                </script> API-Admin</p>
            <p>Powered by
                <a href="https://5ime.cn">iami233</a> &amp;
                <a href="https://github.com/5ime/api-admin">API-Admin</a>
            </p>
        </div>
    </div>
<div class="mdui-container">
    <div class="mdui-col-xs-12">
        <div class="mdui-card">
            <div class="mdui-row">
                <div class="mdui-col-md-1">
                    <div class="mdui-textfield" style="overflow: inherit;">
                        <select class="mdui-select" id="reType" mdui-select="{position: 'bottom'}">
                                <option value="0">Referer</option>
                                <option value="1">IP</option>
                              </select>
                    </div>
                </div>
                <div class="mdui-col-md-11">
                    <div class="mdui-textfield">
                        <input type="text" id="reValue" class="mdui-textfield-input" placeholder="填写限制目标" />
                        <div class="mdui-textfield-helper">保持在六个字内</div>
                    </div>
                </div>

                <button id="reGet" class="mdui-btn mdui-btn-block mdui-btn-raised">提交</button>
            </div>
        </div>
    </div>
    <div class="mdui-progress" style="display: none;">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <div class="mdui-row">
        <div class="mdui-col-xs-12">
            <div class="mdui-table-fluid list">
                <table class="mdui-table mdui-table-hoverable mdui-typo">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>限制目标</th>
                            <th>限制类型</th>
                            <th>最后修改时间</th>
                            <th>操作管理</th>
                        </tr>
                    </thead>
                    <tbody id='table'></tbody>
                </table>
            </div>
            <div class="mdui-btn-group mdui-float-right" id="page"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.mdui-container').hide();
    $('.loading').show();

    $('#reGet').click(function() {
        $(".loading").show();
        var reType = $('.mdui-select-selected').text();
        var reValue = $('#reValue').val();
        var reType = reType == 'Referer' ? 0 : 1;
        var reData = {
            value: reValue,
            type: reType
        };
        $.post("/admin/index/postBlack", reData, function(data) {
            if (data.code == 200) {
                mdui.snackbar({
                    message: data.msg,
                });
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            } else {
                mdui.snackbar({
                    message: data.msg,
                });
                $(".loading").hide();
            }
            return false;
        });
    });


    $.ajax({
        url: "<?php echo url('index/getList'); ?>" + "?page=" + getQueryVariable("page"),
        type: "get",
        dataType: "json",
        success: function(json) {
            if (json.code == 200) {
                var html = '';
                var pages = '';
                var butHtml = '<a class="mdui-btn mdui-btn-raised mdui-btn-dense moe-btn" ';
                for (var i = 0; i < json.data.data.length; i++) {
                    var reType = json.data.data[i].type == 0 ? 'Referer' : 'IP';
                    html += '<tr><td>' + parseInt(i + 1) + '</td><td>' + json.data.data[i].value + '</td><td>' + reType + '</td><td>' + getLocalTime(json.data.data[i].time) + '</td><td><a onclick="reEdit(' + json.data.data[i].id + ')">修改</a> <a onclick="reDelete(' + json.data.data[i].id + ')">删除</a></td></tr>';
                }
                for (var j = 0; j < json.data.last_page; j++) {
                    pages += butHtml + 'href="?page=' + (j + 1) + '">' + (j + 1) + '</a>';
                }
                if (getQueryVariable("page") == 1 || json.data.current_page == 1) {
                    pages = butHtml + 'disabled>«</a>' + pages;
                } else {
                    pages = butHtml + 'href="?page=' + (parseInt(json.data.current_page) - 1) + '">«</a>' + pages;
                }
                if (getQueryVariable("page") == json.data.last_page || json.data.last_page == 1) {
                    pages += butHtml + 'disabled>»</a>';
                } else {
                    pages += butHtml + 'href="?page=' + (parseInt(json.data.current_page) + 1) + '">»</a>';
                }
                setTimeout(function() {
                    $('#table').html(html);
                    $('#page').html(pages);
                    $(".loading").hide();
                    if (json.data.current_page == 1) {
                        $("#page a").eq(1).addClass("mdui-btn-active");
                    } else if (json.data.current_page == getQueryVariable("page")) {
                        $("#page a").eq(getQueryVariable("page")).addClass("mdui-btn-active");
                    }
                    $(".mdui-container").show();
                }, 500);
            } else {
                mdui.snackbar({
                    message: json.msg,
                });
                $('.mdui-container').show();
                $(".loading").hide();
            }
        }
    });
</script>
<script src="/public/static/mdui/js/mdui.min.js"></script>
<script src="/public/static/admin/main.js"></script>

</body>

</html>