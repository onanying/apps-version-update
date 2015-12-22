<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title><?php echo $title; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/png" href="<?php echo $base_url; ?>static/img/favicon.png">
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/amazeui/css/amazeui.min.css"/>
  <script src="<?php echo $base_url; ?>plugins/amazeui/js/jquery.min.js"></script>
  <script src="<?php echo $base_url; ?>plugins/amazeui/js/amazeui.min.js"></script>
  <link rel="stylesheet" href="<?php echo $base_url; ?>static/css/admin.css">
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1><?php echo $this->config->item('site_name'); ?></h1>
    <p><?php echo $this->config->item('base_url'); ?></p>
  </div>
  <br>
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">

    <?php if(isset($errmsg)): ?>
    <div class="am-alert am-alert-danger" data-am-alert>
      <button type="button" class="am-close">&times;</button>
      <p><?php echo $errmsg; ?></p>
    </div>
    <?php endif; ?>

    <form method="post" class="am-form">
      <label>账号:</label>
      <input type="text" name="account" value="<?php echo set_value('account'); ?>">
      <br>
      <label>密码:</label>
      <input type="password" name="password" value="<?php echo set_value('password'); ?>">
      <br>
      <label for="email">验证码:</label>   
      <div class="am-form-group">
        <div class="am-u-sm-2 am-padding-0">
          <input type="text" name="captcha" value="">
        </div>
        <div class="am-u-sm-10 am-animation-fade">
          <?php echo $cap_img_html; ?>
        </div>
      </div>
      <br><br>
      <div class="am-cf">
        <input type="submit" value="登 录" class="am-btn am-btn-primary am-fl">
      </div>
    </form>
    <hr>
    <p><?php echo $this->config->item('copyright'); ?></p>
  </div>
</div>
</body>
</html>