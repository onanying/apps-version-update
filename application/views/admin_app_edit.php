  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <p><?php echo $title; ?></p>
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
          &nbsp;&nbsp;&nbsp;<a href="<?php echo $base_url; ?>admin/app_list" class="am-text-xs">&laquo;返回列表</a>
          <?php endif; ?>
          </p>
        </div>
        <?php endif; ?>

        <form class="am-form" method="post" enctype="multipart/form-data" data-am-validator>

        	<div class="am-form-group">
          <input type="text" name="name" class="am-form-field" placeholder="名称" value="<?php echo set_value('name', isset($row)?$row->name:''); ?>" required/>
          </div>
          
          <div class="am-form-group">
          <textarea name="desc" rows="5" placeholder="描述" required><?php echo set_value('desc', isset($row)?$row->desc:''); ?></textarea>
          </div>

          <div class="am-form-group">
          <input type="text" name="sort" class="am-form-field" placeholder="排序" value="<?php echo set_value('sort', isset($row)?$row->sort:''); ?>" />
          </div>
          
          <button type="submit" class="am-btn am-btn-primary am-btn-block am-margin-bottom-xl">提交</button>

        </form>
      </div>
    </div>      	 
    
  </div>
  <!-- content end -->