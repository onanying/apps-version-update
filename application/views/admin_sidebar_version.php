
  <!-- sidebar start -->
  <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">

      <ul class="am-list admin-sidebar-list">
        <li><a href="<?php echo $base_url; ?>admin/version_list/<?php echo $appid; ?>" class="am-cf"><span class="am-icon-list-ol"></span> 版本列表</a></li>
        <li><a href="javascript:;" class="am-cf" data-am-modal="{target: '#my-alert'}"><span class="am-icon-download"></span> 下载地址</a></li>
        <li><a href="<?php echo $base_url; ?>export/down_app_qrcode/<?php echo $appid; ?>" class="am-cf" target="_blank"><span class="am-icon-qrcode"></span> 下载二维码</a></li>
        <li><a href="<?php echo $base_url; ?>export/version?appid=<?php echo $appid; ?>&lang=0" class="am-cf" target="_blank"><span class="am-icon-cube"></span> APP接口</a></li>
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

  <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
    <div class="am-modal-dialog">
      <div class="am-modal-hd">复制下面的地址</div>
      <div class="am-modal-bd">
        <?php echo $base_url; ?>export/down_app/<?php echo $appid; ?>
      </div>
      <div class="am-modal-footer">
        <span class="am-modal-btn">确定</span>
      </div>
    </div>
  </div>
