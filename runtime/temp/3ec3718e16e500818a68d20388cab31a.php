<?php /*a:3:{s:65:"/www/wwwroot/api.xcdah.cn/application/admin/view/api/apiEdit.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/header.html";i:1644046912;s:60:"/www/wwwroot/api.xcdah.cn/application/admin/view/footer.html";i:1644046912;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>接口编辑 - 后台管理</title>
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
                <a href="javascript:;" class="mdui-typo-title min-display">接口编辑</a>
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
                    <div class="mdui-textfield" style="overflow: unset;">
                        <select class="mdui-select" id="apiType" mdui-select>
                            <option value="get">GET</option>
                            <option value="post">POST</option>
                            <option value="request">均可</option>
                        </select>
                    </div>
                </div>
                <div class="mdui-col-md-1">
                    <div class="mdui-textfield" style="overflow: unset;">
                        <select class="mdui-select" id="apiSort"></select>
                    </div>
                </div>
                <div class="mdui-col-md-1 mdui-col-sm-4">
                    <div class="mdui-textfield">
                        <input type="text" id="apiIcon" class="mdui-textfield-input" value="dvr" placeholder="ICON" />
                        <div class="mdui-textfield-helper mdui-typo">
                            <a href="https://www.mdui.org/docs/material_icon" target="_blank">选择图标</a>
                        </div>
                    </div>
                </div>
                <div class="mdui-col-md-3  mdui-col-sm-6">
                    <div class="mdui-textfield">
                        <input type="text" id="apiName" class="mdui-textfield-input" maxlength="7" placeholder="接口名称" />
                        <div class="mdui-textfield-helper">保持在七个字内</div>
                    </div>
                </div>
                <div class="mdui-col-md-3 mdui-col-sm-6">
                    <div class="mdui-textfield">
                        <input type="text" id="apiDoc" class="mdui-textfield-input" placeholder="文档地址" />
                        <div class="mdui-textfield-helper">http[s]://domain.com/doc/[文档地址]</div>
                    </div>
                </div>
                <div class="mdui-col-md-3 mdui-col-sm-6">
                    <div class="mdui-textfield">
                        <input type="text" id="apiPath" class="mdui-textfield-input" id="apiPath" placeholder="接口地址" />
                        <div class="mdui-textfield-helper">http[s]://domain.com/api/[接口地址]</div>
                    </div>
                </div>
                <div class="mdui-col-md-6">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <textarea class="mdui-textfield-input" placeholder="接口描述" rows="2" id="apiDesc"></textarea>
                    </div>
                </div>
                <div class="mdui-col-md-6">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <textarea class="mdui-textfield-input" placeholder="调用效果" rows="2" id="apiDemo"></textarea>
                    </div>
                </div>
                <div class="mdui-col-md-9">
                    <div class="mdui-textfield">
                        <input type="text" class="mdui-textfield-input" id="apiValue" placeholder="请求测试" />
                        <div class="mdui-textfield-helper">name1=value&name2=value</div>
                    </div>
                </div>
                <div class="mdui-col-md-3">
                    <div class="mdui-textfield">
                        <a class="mdui-btn mdui-btn-block mdui-btn-raised" id="getInfo">获取</a>
                    </div>
                </div>
                <div class="mdui-col-md-12">
                    <div class="mdui-textfield mdui-textfield-floating-label">
                        <div class="mdui-col-md-12">
                            <div class="mdui-textfield mdui-textfield-floating-label">
                                <textarea class="mdui-textfield-input" placeholder="接口返回数据" rows="6" id="apiInfo"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mdui-col-md-12">
                        <div id="editor">
                            <textarea id="detail" style="display:none;"></textarea>
                        </div>
                    </div>
                </div>
                <button id="apiGet" class="mdui-btn mdui-btn-block mdui-btn-raised">提交</button>
            </div>
        </div>
    </div>
</div>
<script src="/public/static/editor/editormd.min.js"></script>
<script src="/public/static/editor/lib/marked.min.js"></script>
<script src="/public/static/editor/lib/prettify.min.js"></script>
<script src="/public/static/mdui/js/mdui.min.js"></script>
<script type="text/javascript">
    $('.mdui-container').hide();
    $('.loading').show();
    $.get("/admin/sort/getList", function(data) {
        var inst = new mdui.Select('#apiSort');
        if (data.code == 200) {
            for (var i = 0; i < data.data.data.length; i++) {
                if (data.data.data[i].type == 0) {
                    $('#apiSort').append('<option value="' + data.data.data[i].id + '">' + data.data.data[i].name + '</option>');
                }
            }
            inst.handleUpdate();
        } else {
            $(".loading").hide();
            mdui.snackbar({
                message: '请求失败'
            });
        }
    });

    $.get("/admin/api/apiOper?id=" + getQueryVariable('id'), function(data) {
        if (data.code == 200) {
            $('.mdui-select-selected').eq(0).text(data.data.type);
            $('#apiIcon').val(data.data.icon);
            $('#apiName').val(data.data.name);
            $('#apiDoc').val(data.data.doc);
            $('#apiPath').val(data.data.path);
            $('#apiDesc').val(data.data.desc);
            $('#apiDemo').val(data.data.demo);
            $('#apiValue').val(data.data.request);
            $('#apiInfo').val(data.data.info);
            $('#detail').text(data.data.detail);
            $('.mdui-select-selected').eq(1).text(data.data.sort_name);
        } else {
            mdui.snackbar({
                message: '请求失败'
            });
        }
        setTimeout(() => {
            $(function() {
                var editor = editormd("editor", {
                    width: "100%",
                    toolbarIcons: function() {
                        return ["undo", "redo", "|", "preview", "watch", ]
                    },
                    height: 300,
                    path: "/public/static/editor/lib/",
                    htmlDecode: true,
                });
            });
            $('.loading').hide();
            $('.mdui-container').show();
        }, 1000);
    });


    $('#apiGet').click(function() {
        $(".loading").show();
        var apiValue = $('#apiValue').val();
        var apiPath = $('#apiPath').val();
        var apiName = $('#apiName').val();
        var apiDesc = $('#apiDesc').val();
        var apiDemo = $('#apiDemo').val();
        var apiDoc = $('#apiDoc').val();
        var apiIcon = $('#apiIcon').val();
        var apiType = $('.mdui-select-selected').eq(0).text();
        var apiInfo = $('#apiInfo').val();
        var apiDetail = $('#detail').val();
        var apiId = getQueryVariable('id');
        var apiSort = $('.mdui-select-selected').eq(1).text();
        var apiData = {
            request: apiValue,
            path: apiPath,
            name: apiName,
            desc: apiDesc,
            demo: apiDemo,
            doc: apiDoc,
            icon: apiIcon,
            type: apiType,
            info: apiInfo,
            detail: apiDetail,
            id: apiId,
            sort: apiSort,
        };
        $.post("/admin/api/apiUpdate", apiData, function(data) {
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
        });
    });
</script>
<script src="/public/static/mdui/js/mdui.min.js"></script>
<script src="/public/static/admin/main.js"></script>

</body>

</html>