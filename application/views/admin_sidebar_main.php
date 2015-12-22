
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">

      <ul class="am-list admin-sidebar-list">
        <li class="admin-parent">
          <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> APP管理 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
          <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
            <li><a href="<?php echo $base_url; ?>admin/app_list" class="am-cf"><span class="am-icon-list-ol"></span> APP列表</a></li>
            <li><a href="<?php echo $base_url; ?>admin/app_add" class="am-cf"><span class="am-icon-plus"></span> 新增APP</a></li>
          </ul>
        </li>
        <li><a href="<?php echo $base_url; ?>admin/change_pwd" class="am-cf"><span class="am-icon-edit"></span> 修改密码</a></li>
        <li><a href="<?php echo $base_url; ?>admin/quit" class="am-cf"><span class="am-icon-sign-out"></span> 退出</a></li>
      </ul>

      <div class="am-panel am-panel-default admin-sidebar-panel">
        <div class="am-panel-bd">
          <p><span class="am-icon-bookmark"></span> 公告</p>
          <p>时光静好，与君语；细水流年，与君同。</p>
        </div>
      </div>

    </div>
  </div>
  <!-- sidebar end -->
