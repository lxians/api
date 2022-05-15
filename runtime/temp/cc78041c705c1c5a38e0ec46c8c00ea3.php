<?php /*a:3:{s:65:"/www/wwwroot/api.xcdah.cn/application/admin/view/index/index.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/header.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/footer.html";i:1644046912;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>仪表盘 - 后台管理</title>
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
                <a href="javascript:;" class="mdui-typo-title min-display">仪表盘</a>
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
    <div class="mdui-progress" style="display: none;">
        <div class="mdui-progress-indeterminate"></div>
    </div>
    <style>
        .icon .mdui-icon {
            font-size: 60px;
            line-height: 100px;
            float: left;
            margin-left: 10px;
        }
    </style>
    <div class="mdui-row">
        <div class="mdui-col-md-6">
            <div class="mdui-col-md-6 mdui-col-sm-6">
                <div class="mdui-card">
                    <div class="content">
                        <h3>调用总数</h3>
                        <p id="count"></p>
                    </div>
                </div>
            </div>
            <div class="mdui-col-md-6 mdui-col-sm-6">
                <div class="mdui-card">
                    <div class="content">
                        <h3>接口总数</h3>
                        <p id="info"></p>
                    </div>
                </div>
            </div>
            <div class="mdui-col-md-6 mdui-col-sm-6">
                <div class="mdui-card">
                    <div class="content">
                        <h3>分类总数</h3>
                        <p id="sort"></p>
                    </div>
                </div>
            </div>
            <div class="mdui-col-md-6 mdui-col-sm-6">
                <div class="mdui-card">
                    <div class="content">
                        <h3>文章总数</h3>
                        <p id="post"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mdui-col-md-6  mdui-col-sm-12">
            <div class="mdui-card">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <div class="mdui-table-fluid" style="position: relative; display: none;">
        <span style="position: absolute;top: 10px;right: 10px;z-index: 99;">
            <a href="javascript:;" class="mdui-btn mdui-btn-icon" id="getNewData" mdui-tooltip="{content: '刷新数据'}">
                <i class="mdui-icon material-icons">loop</i>
            </a>
        </span>
        <table class="mdui-table mdui-table-hoverable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>请求 IP</th>
                    <th>请求方式</th>
                    <th>请求路径</th>
                    <th>状态码</th>
                    <th>请求时间</th>
                </tr>
            </thead>
            <tbody id="New10">
            </tbody>
        </table>
    </div>
</div>
<script>
    $('.mdui-container').hide();
    $('.loading').show();
    $.ajax({
        url: '<?php echo url("admin/index/getCount"); ?>',
        type: 'post',
        dataType: 'json',
        success: function(data) {
            var data = data.data;
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'API Top 10',
                        data: [],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(123, 128, 234, 0.2)',
                            'rgba(57, 154, 457, 0.2)',
                            'rgba(41, 132, 254, 0.2)',
                            'rgba(77, 234, 238, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(123, 128, 234, 1)',
                            'rgba(57, 154, 457, 1)',
                            'rgba(41, 132, 254, 1)',
                            'rgba(77, 234, 238, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            for (var i = 0; i < data.top10.length; i++) {
                myChart.data.labels.push(data.top10[i].name);
                myChart.data.datasets[0].data.push(data.top10[i].count);
            }
            $('#count').html(data.count);
            $('#info').html(data.info);
            $('#sort').html(data.sort);
            $('#post').html(data.post);
        }
    });
    $.ajax({
        url: "<?php echo url('admin/index/getNew10'); ?>",
        type: 'get',
        dataType: 'json',
        success: function(data) {
            if (data.code == 200) {
                $('.mdui-table-fluid').show();
                for (var i = 0; i < data.data.length; i++) {
                    $('#New10').append('<tr><td>' + parseInt(i + 1) + '</td><td>' + data.data[i][0] + '</td><td>' + data.data[i][3] + '</td><td>' + data.data[i][4] + '</td><td>' + data.data[i].slice(-2, -1) + '</td><td>' + data.data[i][1] + '</td></tr>');
                }
            } else {
                mdui.snackbar({
                    message: '最新请求数据获取失败，请检查日志文件是否可以被访问！',
                    position: 'top'
                });
            }
        }
    });

    $("#getNewData").click(function() {
        $.ajax({
            url: "<?php echo url('admin/index/getNew10'); ?>",
            type: 'get',
            dataType: 'json',
            success: function(data) {
                $('#New10').html('');
                for (var i = 0; i < data.data.length; i++) {
                    $('#New10').append('<tr><td>' + parseInt(i + 1) + '</td><td>' + data.data[i][0] + '</td><td>' + data.data[i][3] + '</td><td>' + data.data[i][4] + '</td><td>' + data.data[i].slice(-2, -1) + '</td><td>' + data.data[i][1] + '</td></tr>');
                }
            }
        });
    });
    setTimeout(() => {
        $('.mdui-container').show();
        $('.loading').hide();
    }, 1000);
</script>
<script src="/public/static/mdui/js/mdui.min.js"></script>
<script src="/public/static/admin/main.js"></script>

</body>

</html>