## 项目简介

一个可以给需要在线自动更新版本的手机或桌面软件的APP接口与后台管理的web程序。

## 提供了以下功能：

本项目 采用php+html5+css3开发

*  APP更新接口返回json格式的更新数据
*  支持多个app的版本更新管理
*  提供永远下载最新版本的url地址
*  输出可永远下载最新版本的二维码
*  前后端都为开源框架开发，更好的扩展性。（后端框架：CodeIgniter，前端框架：amazeui）

## 安装步骤

*  Step 1：新建一个mysql的数据库
*  Step 2：打开sql文件夹内的数据库文件，在新建立的数据库中执行
*  Step 3：打开application\config下的database.php，根据你的环境修改port、password、database参数
*  Step 4：打开application\config下的config.php，根据你的需要修改 “中文备注” 的那几个参数，其他参数默认即可
*  Step 5：开启Apache的Rewrite模块
*  Step 6：修改php.ini，使之支持大文件上传，修改 file_uploads = on; upload_tmp_dir = "/tmp"; upload_max_filesize = 50m; post_max_size = 50m; max_execution_time = 600; max_input_time = 600; memory_limit = 32m; 
*  Step 7：使用浏览器进入config.php配置的base_url地址，后台管理默认用户名为 admin，默认密码为 123456

## 屏幕截图

*  APP更新接口返回的json

![image](https://raw.githubusercontent.com/onanying/AppsVersionUpdate/master/screenshot/json.png)

*  APP列表

![image](https://raw.githubusercontent.com/onanying/AppsVersionUpdate/master/screenshot/app_list.png)

*  版本列表

![image](https://raw.githubusercontent.com/onanying/AppsVersionUpdate/master/screenshot/version_list.png)

*  永远下载最新版本的url地址

![image](https://raw.githubusercontent.com/onanying/AppsVersionUpdate/master/screenshot/down_app_url.png)
