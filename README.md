<!--
 * @Description: 
 * @Version: 1.668
 * @Autor: Hawk
 * @Date: 2021-06-17 15:09:27
 * @LastEditors: Hawk
 * @LastEditTime: 2022-01-07 11:46:29
-->
# vue3-typescript-cesium-elementPlus [后台插件化]

## 演示地址 
前台地址：【由于白膜数据量大，请耐心等待】  
http://map.217dan.com/addons/cesiummapv  
 
后台地址:
http://map.217dan.com/aeSAZtOfuN.php  
用户名:test  
密码:12345678  

前端使用的技术栈为：
vue3.0 CLI4.x脚手架搭建，使用typescript作为逻辑代码，UI界面为elementPlus  
GIS地图部分，使用Cesium-1.82开源库，简单了修改了地图展示部分代码  
加入了主流的一些WebGL动态效果类  
项目地址为: https://gitee.com/hawk86104/vue3-ts-cesium-map-show  

此部分为后台源码：
技术栈为：ThinkPHP5 + Bootstrap + mysql
基于框架fastadmin: https://www.fastadmin.net/

## 截图展示
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/index.png)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/config1.png)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/config2.png)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/index截屏.gif)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/line.gif)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/mapimagery.gif)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/modelsit.gif)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/pointeffect.gif)
![展示](https://jdvop.oss-cn-qingdao.aliyuncs.com/assets/img/3ddemo/titleset.gif)

使用方法：  
一、首先安装fastadmin 「1.2.1.20210730_full」完整版:https://www.fastadmin.net/download/full.html?version=1.2.1.20210730_beta
其他最新的版本，因为版权原因，不给离线安装插件了。  
然后安装fastadmin这个平台:  
https://www.fastadmin.net/video.html  
注意public运行目录 以及 thinkphp的伪静态配置  

二、下载右侧编译好的 发行版 文件 .zip  
1、修改上传文件的大小限制:  
修改文件：  
/application/extra/upload.php  
20行：  
'maxsize'   => '20mb',  

2、application/config.php 中  
unknownsources  改为 true  
debug  改为 true  
trace  改为 true  
然后请设置清空前后台缓存  

3、进入你刚部署的fastadmin后台，选择插件管理、离线安装，选择这个zip文件  

4、修改文件  
addons/cesiummapv/vue3-typescript/.env.production  
VUE_APP_API_URL = 'http://map.217dan.com/addons/cesiummapv'  
其中的 map.217dan.com 部分 改成你的网址  

5、npm install  
npm run build  

享用吧