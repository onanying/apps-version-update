  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding am-padding-bottom-0">
      <p><?php echo $title; ?></p>
	    <hr data-am-widget="divider" class="am-divider am-divider-default" />
    </div>

    <div class="am-g">
      
      <?php $cnt = count($app_list); ?>
      <?php foreach ($app_list as $key=>$row): ?>
      <div class="am-u-sm-4 <?php echo $key==$cnt-1?'am-u-end':''; ?>">
        <div class="am-panel am-panel-default">
          <div class="am-panel-hd">
          
          <div class="am-cf">
            <div class="am-fl"><?php echo $row->name; ?></div>
            <div class="am-fr">

              <div class="am-dropdown" data-am-dropdown>
                <button class="am-btn am-btn-default am-btn-xs am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-cog"></span> <span class="am-icon-caret-down"></span></button>
                <ul class="am-dropdown-content am-text-xs">
                  <li><a href="<?php echo $base_url; ?>admin/app_edit/<?php echo $row->id; ?>">1. 编辑</a></li>
                  <li><a href="<?php echo $base_url; ?>admin/app_delete/<?php echo $row->id; ?>">2. 删除</a></li>
                </ul>
              </div>

            </div>
          </div>
          </div>
          <div class="am-panel-bd">
            <p class="am-text-sm"><?php echo $row->desc; ?></p>
            <a class="am-btn am-btn-success am-btn-sm" href="<?php echo $base_url; ?>admin/version_list/<?php echo $row->id; ?>" target="_blank">版本管理 →</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    
  </div>
  <!-- content end -->