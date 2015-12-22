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
          </p>
        </div>
        <?php endif; ?>

        <form class="am-form" method="post">
    			<p><input type="password" name="pwd" class="am-form-field" placeholder="原密码" value="" /></p>
    			<p><input type="password" name="npwd" class="am-form-field" placeholder="新密码" value="" /></p>
    			<p><input type="password" name="cpwd" class="am-form-field" placeholder="重复新密码" value="" /></p>
    			<button type="submit" class="am-btn am-btn-primary am-btn-block am-margin-bottom-xl">提交</button>
        </form>
      </div>
    </div>
    
  </div>
  <!-- content end -->