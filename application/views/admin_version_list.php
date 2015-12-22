  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <p><?php echo $app_name; ?> - <?php echo $title; ?></p>
	  <hr data-am-widget="divider" class="am-divider am-divider-default" />
      <a class="am-btn am-btn-default" href="<?php echo $base_url; ?>admin/version_add/<?php echo $appid; ?>"><span class="am-icon-plus"></span> 新增</a>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-id">ID</th>
                <th class="table-title">文件名</th>
                <th class="table-type">版本号	</th>
                <th class="table-author">版本编号</th>
                <th class="table-date">文件大小</th>
                <th class="table-date">更新时间</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php foreach ($version_list as $row): ?>
            <tr>
              <td><?php echo $row->id; ?></td>
              <td><?php echo $row->file_name; ?></td>
              <td><?php echo $row->version; ?></td>
              <td><?php echo $row->code; ?></td>
              <td><?php echo sprintf("%.2f", $row->file_size/1024/1024); ?> MB</td>
              <td><?php echo $row->datetime; ?></td>
              <td>
                <div class="am-btn-toolbar">
                  <div class="am-btn-group am-btn-group-xs">
                    <a class="am-btn am-btn-default am-btn-xs am-text-secondary" href="<?php echo $base_url; ?>admin/version_edit/<?php echo $appid; ?>/<?php echo $row->id; ?>"><span class="am-icon-pencil-square-o"></span> 编辑</a>
                    <a class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" href="<?php echo $base_url; ?>admin/version_delete/<?php echo $row->id; ?>"><span class="am-icon-trash-o"></span> 删除</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>

        <div>
          <p class="am-text-sm am-padding-left-sm">共 <?php echo $total_rows; ?> 条记录</p>
          <ul class="am-pagination">        
          <?php echo $pages_html; ?>        
          </ul>
        </div>

      </div>
    </div>
    
  </div>
  <!-- content end -->