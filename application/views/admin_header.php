<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <title><?php echo $title; ?> - <?php echo $this->config->item('site_name'); ?></title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="icon" type="image/png" href="<?php echo $base_url; ?>static/img/favicon.png">
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/amazeui/css/amazeui.min.css"/>
  <link rel="stylesheet" href="<?php echo $base_url; ?>plugins/amazeui/css/admin.css">
  <script src="<?php echo $base_url; ?>plugins/amazeui/js/jquery.min.js"></script>
  <script src="<?php echo $base_url; ?>plugins/amazeui/js/amazeui.min.js"></script>
  <script src="<?php echo $base_url; ?>plugins/amazeui/js/app.js"></script>
  <link rel="stylesheet" href="<?php echo $base_url; ?>static/css/admin.css">
</head>
<body>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar admin-header am-topbar-inverse">
  <div class="am-topbar-brand">
    <p class="am-text-lg"><?php echo $this->config->item('site_name'); ?></p>
  </div>

  <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
      <li class="am-dropdown" data-am-dropdown>
        <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
          <span class="am-icon-user"></span> <?php echo $user['name']; ?> <span class="am-icon-caret-down"></span>
        </a>
        <ul class="am-dropdown-content">
          <li><a href="<?php echo $base_url; ?>admin/quit"><span class="am-icon-power-off"></span> 退出</a></li>
        </ul>
      </li>
      <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>

  </div>
</header>

<div class="am-cf admin-main">
