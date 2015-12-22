  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <p><?php echo $app_name; ?> - <?php echo $title; ?></p>
	  <hr data-am-widget="divider" class="am-divider am-divider-default" />
    </div>

    <div class="am-g">
      <div class="am-u-sm-8 am-u-lg-6 am-u-sm-centered">

        <?php if(isset($errmsg)): ?>
        <div class="am-alert am-alert-<?php echo $errcode==0?'success':'danger'; ?>" data-am-alert>
          <button type="button" class="am-close">&times;</button>
          <p>
          <?php echo $errmsg; ?>
          <?php if($errcode==0): ?>
          &nbsp;&nbsp;&nbsp;<a href="<?php echo $base_url; ?>admin/version_list/<?php echo $appid; ?>" class="am-text-xs">&laquo;返回列表</a>
          <?php endif; ?>
          </p>
        </div>
        <?php endif; ?>

        <form class="am-form" method="post" enctype="multipart/form-data" data-am-validator>

        	<p><input type="text" name="version" class="am-form-field" placeholder="版本号" value="<?php echo set_value('version', isset($row)?$row->version:''); ?>" required/></p>
          
          <p><input type="text" name="code" class="am-form-field js-pattern-number" placeholder="版本编号" value="<?php echo set_value('code', isset($row)?$row->code:''); ?>" required/></p>
          
         	  <div class="am-form-group">
              <textarea class="" name="content_cn" rows="5" placeholder="更新内容-中文" required><?php echo set_value('content_cn', isset($row)?$row->content_cn:''); ?></textarea>
            </div>
            
         	  <div class="am-form-group">
              <textarea class="" name="content_en" rows="5" placeholder="更新内容-英文"><?php echo set_value('content_en', isset($row)?$row->content_en:''); ?></textarea>
            </div>

            <label class="am-checkbox">
              <input type="checkbox" name="compel" value="1" <?php echo set_checkbox('compel', '1', (isset($row) && $row->compel==1)?true:false); ?> data-am-ucheck>
              强制更新
            </label>
            
            <div class="am-form-group am-form-file">
              <button type="button" class="am-btn am-btn-danger am-btn-sm"><i class="am-icon-cloud-upload"></i> 选择要上传的APP</button>
              <input id="apkfile" name="apkfile" type="file" multiple>    
            </div>
            
            <p id="file-list"></p>
            
			      <script>
              $(function() {
                $('#apkfile').on('change', function() {
                  var fileNames = '';
                  $.each(this.files, function() {
                    fileNames += '<span class="am-badge am-text-default">file: ' + this.name + '</span> ';
                  });
                  $('#file-list').html(fileNames);
                });
              });
            </script>

           <button type="submit" class="am-btn am-btn-primary am-btn-block am-margin-bottom-xl">提交</button>
        </form>
      </div>
    </div>      	 
    
  </div>
  <!-- content end -->