<script src="/src/layui/cropper/cropper.js"></script>
<script src="/src/layui/cropper/croppers.js"></script>

<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo">山人广告业务登记</div>
        <!-- 头部区域（可配合layui已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item"><a href="">控制台</a></li>
            <li class="layui-nav-item"><a href="">商品管理</a></li>
            <li class="layui-nav-item"><a href="">用户</a></li>
            <li class="layui-nav-item">
                <a href="javascript:;">其它系统</a>
                <dl class="layui-nav-child">
                    <dd><a href="">邮件管理</a></dd>
                    <dd><a href="">消息管理</a></dd>
                    <dd><a href="">授权管理</a></dd>
                </dl>
            </li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:;">
                    <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                    用户
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="">基本资料</a></dd>
                    <dd><a href="">安全设置</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="">退出</a></li>
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item">
                    <a class="" href="javascript:;">业务登记</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">新增订单</a></dd>
                        <dd><a href="javascript:;">订单查看</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">类别管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">类别编辑</a></dd>
                        <dd><a href="javascript:;">材质编辑</a></dd>
                        <dd><a href="javascript:;">工艺编辑</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="javascript:;">价格管理</a></li>
                <li class="layui-nav-item"><a href="javascript:;">安装人员</a></li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">
            <form class="layui-form  layui-form-pane" method="post" enctype=multipart/form-data>
                <!-- 提示：如果你不想用form，你可以换成div等任何一个普通元素 -->
                <div class="layui-form-item">
                    <label class="layui-form-label">项目名称</label>
                    <div class="layui-input-block">
                        <input type="text" name="input" placeholder="请输入" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">项目单位</label>
                    <div class="layui-input-block">
                        <select name="company" lay-filter="company">
                            <option value="">请选择项目单位</option>
                            {foreach $company as $v}
                            <option value="{$v['company_id']}">{$v['company_name']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">项目类别</label>
                    <div class="layui-input-block">
                        <select name="category" lay-filter="category">
                            <option value="">请选择项目类别</option>
                            {foreach $categories as $v}
                            <option value="{$v['category_id']}">{$v['category_name']}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">项目材质</label>
                    <div class="layui-input-block">
                        <select name="material" lay-filter="material">
                            <option value="">请选择项目材质</option>
                        </select>
                    </div>
                </div>

                <div class="layui-form-item" pane="">
                    <label class="layui-form-label">项目工艺</label>
                    <div class="layui-input-block">
                        <input type="checkbox" name="like[write]" title="写作">
                        <input type="checkbox" name="like[read]" title="阅读">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">项目尺寸</label>
                    <div class="layui-input-inline">
                        <input type="text" name="p_length" placeholder="长（mm）" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="p_width" placeholder="宽（mm）" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="p_height" placeholder="高（mm）" autocomplete="off" class="layui-input">
                    </div>
                    <div class="layui-input-inline">
                        <input type="text" name="p_layers" placeholder="层数" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">缩略图片:</label>
                    <input type="hidden" name="productImg" id="productImg"/>
                    <div class="layui-upload">
                        <button type="button" class="layui-btn" id="productImgButton">
                            <i class="layui-icon">&#xe67c;</i>上传
                        </button>

                        <img class="layui-upload-img" id="productImgImg" src="">

                    </div>
                </div>


                <div class="layui-form-item" pane="">
                    <label class="layui-form-label">是否安装</label>
                    <div class="layui-input-inline">
                        <input type="checkbox" name="open" checked lay-skin="switch">
                    </div>
                    <div class="layui-inline" >
                        <select name="installer" lay-filter="installer">
                            <option value="">请选择安装师傅</option>
                            {foreach $installer as $v}
                            <option value="{$v['installer_id']}">{$v['installer_name']}</option>
                            {/foreach}
                        </select>
                    </div>

                </div>

                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">备注</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" name="desc" class="layui-textarea"></textarea>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <input type="hidden" name="id" value="0">
                        <button class="layui-btn" lay-filter="formDemo">立即提交</button>
                    </div>
                </div>
                <!-- 更多表单结构排版请移步文档左侧【页面元素-表单】一项阅览 -->
            </form>
        </div>
    </div>

    <div class="layui-footer">
        <!-- 底部固定区域 -->
        © layui.com - 底部固定区域
    </div>
</div>

<script src="/src/layui/layui.js"></script>
<script>
    //JavaScript代码区域
    layui.use(['layer', 'form', 'element'], function () {
        var layer = layui.layer
            , form = layui.form
            , element = layui.element;

        $('.layui-nav-tree').on('click', 'li', function () {
            $(this).siblings('li').removeClass('layui-nav-itemed')
        });

        form.on('select(category)',function (data) {
            var categoryID=data.value;
            console.log(categoryID);
            $.ajax({
                type:"GET",
                dataType:"json",
                contentType: "application/json; charset=utf-8",
                url:"/index/index/material",
                data:{categoryID:categoryID},
                success:function (material_res) {
                    $('[name="material"]').empty();
                    $('[name="material"]').prepend("<option value=''>请选择项目材质</option>");
                    $.each(JSON.parse(material_res),function(index,obj){
                        $('[name="material"]').append("<option value='"+obj['material_id']+"'>"+obj['material_name']+"</option>");
                    });

                    form.render('select');

                },
            });

        });




    });

    layui.config({
        base: '/src/layui/cropper/' //layui自定义layui组件目录
    }).use('croppers', function () {
        var croppers = layui.croppers;

        //创建一个图片裁剪上传组件
        var productImgCropper = croppers.render({
            elem: '#productImgButton',
            defaultImg: '',// 默认图片 选填
            size: 2048,   // 大小限制 默认1024k 选填
            saveW: 280,    //保存宽度
            saveH: 160,    //保存高度
            mark: 7 / 4, //选取比例
            area: '900px', //弹窗宽度
            url: '/index/index/upImage', //图片上传接口返回和（layui 的upload 模块）返回的JOSN一样
            done: function (url) { //上传完毕回调
                //console.log(url.src);
                $("#productImg").val(url.src);
                $("#productImgImg").attr('src', url.src);
            }
        });

    });
    //


</script>