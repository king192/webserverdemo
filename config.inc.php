<?php
define("UserName", "root");									//数据库连接用户名
//define("PassWord", "astgo@127.0.0.1");	root0808qxt								//数据库连接密码
define("PassWord", "root0808qxt");
define("ServerName", "localhost");							//数据库服务器的名称
define("DBName","dinghuo_db");								//数据库名称
define("ERRFILE","err.php");								//错误处理显示文件

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);//定义根目录路径DIRECTORY_SEPATRATOR  DIRECTORY_SEPARATOR
// DIRECTORY_SEPARATOR
define('SCRIPT_PATH', $_SERVER["SCRIPT_NAME"] );
define('KEIYICLASS_ROOT', dirname(__FILE__) . '/');
//define(ROOT, dirname(__FILE__).DIRECTORY_SEPARATOR."upload");
define('INCLUDE_PATH', ROOT_PATH . 'include'.DIRECTORY_SEPARATOR);
define('SHOP_INCLUDE_PATH', ROOT_PATH .'shop_sys'.DIRECTORY_SEPARATOR.'include'.DIRECTORY_SEPARATOR);
define('INCLUDE_SYS_ACTION_PATH', ROOT_PATH .'lgy_sys'.DIRECTORY_SEPARATOR.'action'.DIRECTORY_SEPARATOR);
define("AD", serialize(array('1'=>'首页广告滚动大图884*350','2'=>'新品/特价顶部广告图1192*169','4'=>'登录广告421*318','60'=>'手机版滚动广告840*255')));
//define("HELPS", serialize(array('1'=>'使用帮助','2'=>'售后服务','3'=>'配送流程','4'=>'关于柒花','5'=>'携手柒花')));
define("HELPS", serialize(array('1'=>'公告信息','2'=>'公司动态','3'=>'常见问题','4'=>'联系我们')));
define("WEBNAME", '');

?>