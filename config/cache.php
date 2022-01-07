<?php 
 return array (
  'table_name' => 'fa_cesiummapv_config,fa_cesiummapv_lineseffect,fa_cesiummapv_mapimagery,fa_cesiummapv_modellist,fa_cesiummapv_pointeffect,fa_cesiummapv_titleset',
  'self_path' => 'public/assets/addons/cesiummapv
application/admin/lang/zh-cn/cesiummapv',
  'update_data' => '--
-- 转存表中的数据 `__PREFIX__cesiummapv_config`
--

INSERT INTO `__PREFIX__cesiummapv_config` (`id`, `name`, `group`, `title`, `tip`, `type`, `value`, `content`, `rule`, `extend`) VALUES
(9, \'categorytype\', \'dictionary\', \'Category type\', \'\', \'array\', \'{\\"product\\":\\"Product\\"}\', \'\', \'\', \'\'),
(10, \'configgroup\', \'dictionary\', \'Config group\', \'\', \'array\', \'{\\"map_config\\":\\"Map Config\\",\\"map_view_first\\":\\"Map View First\\"}\', \'\', \'\', \'\'),
(41, \'baseLayerPicker\', \'map_config\', \'基础影响图层选择器\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(42, \'navigationHelpButton\', \'map_config\', \'导航帮助按钮\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(43, \'animation\', \'map_config\', \'动画控件\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(44, \'timeline\', \'map_config\', \'时间控件\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(45, \'shadows\', \'map_config\', \'显示阴影\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(46, \'shouldAnimate\', \'map_config\', \'大气模型动画效果\', \'\', \'switch\', \'1\', \'\', \'\', \'\'),
(47, \'skyBox\', \'map_config\', \'天空盒\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(48, \'infoBox\', \'map_config\', \'信息提示框\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(49, \'fullscreenButton\', \'map_config\', \'是否显示全屏按钮\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(50, \'logo\', \'map_config\', \'显示cesiumLogo\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(51, \'homeButton\', \'map_config\', \'首页按钮\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(52, \'sceneModePicker\', \'map_config\', \'展示视角切换按钮\', \'\', \'switch\', \'1\', \'\', \'\', \'\'),
(53, \'showSaveButton\', \'map_view_first\', \'显示保存当前摄像头视角按钮\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(54, \'lat\', \'map_view_first\', \'初始化经度\', \'\', \'string\', \'43.683912868708\', \'\', \'\', \'\'),
(55, \'lng\', \'map_view_first\', \'初始化纬度\', \'\', \'string\', \'-77.627715674658\', \'\', \'\', \'\'),
(56, \'height\', \'map_view_first\', \'初始化高度\', \'\', \'string\', \'15517301.157069\', \'\', \'\', \'\'),
(57, \'direction_x\', \'map_view_first\', \'摄像头方向direction_x\', \'\', \'string\', \'-0.15494260061502\', \'\', \'\', \'\'),
(58, \'direction_y\', \'map_view_first\', \'摄像头方向direction_y\', \'\', \'string\', \'0.70634837012173\', \'\', \'\', \'\'),
(59, \'direction_z\', \'map_view_first\', \'摄像头方向direction_z\', \'\', \'string\', \'-0.69069875527688\', \'\', \'\', \'\'),
(60, \'up_x\', \'map_view_first\', \'摄像头up_x\', \'\', \'string\', \'-0.14799108835462\', \'\', \'\', \'\'),
(61, \'up_y\', \'map_view_first\', \'摄像头up_y\', \'\', \'string\', \'0.67465799358537\', \'\', \'\', \'\'),
(62, \'up_z\', \'map_view_first\', \'摄像头up_z\', \'\', \'string\', \'0.72314260658529\', \'\', \'\', \'\'),
(63, \'duration\', \'map_view_first\', \'飞跃延迟时间\', \'单位（秒）\', \'string\', \'1\', \'\', \'\', \'\'),
(65, \'flytoView\', \'map_view_first\', \'是否飞到视图\', \'\', \'switch\', \'0\', \'\', \'\', \'\'),
(66, \'frontDebugger\', \'map_config\', \'是否为前端调试模式\', \'\', \'switch\', \'0\', \'\', \'\', \'\');

-- --------------------------------------------------------

--
-- 转存表中的数据 `__PREFIX__cesiummapv_lineseffect`
--

INSERT INTO `__PREFIX__cesiummapv_lineseffect` (`id`, `type`, `width`, `geojsonfile`, `effectimage`, `setup_param`, `showswitch`, `createtime`, `updatetime`) VALUES
(1, \'FlyLines\', 2.00, \'\', \'\', \'{\\"color\\":\\"#A932B4\\",\\"height\\":3000,\\"speed\\":6,\\"percent\\":0.1,\\"gradient\\":0.1,\\"random\\":300,\\"startPoint_lng\\":113.8918,\\"startPoint_lat\\":22.4818,\\"endPoint_ing\\":113.96858,\\"endPoint_lat\\":22.5692}\', 1, 1632365596, 1632817818),
(2, \'BusLines\', 3.60, \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/geojson/shenzhen-nanshan.geojson\', \'\', \'{\\"color\\":\\"#32B47E\\",\\"speed\\":\\"9.0\\",\\"percent\\":\\"0.1\\",\\"gradient\\":\\"0.1\\"}\', 0, 1632740887, 1632817776),
(3, \'RoadPic\', 1.70, \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/geojson/nanshan-road1.geojson\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/pic/spriteline1.png\', \'{\\"time\\":3600}\', 1, 1632812901, 1632814947),
(4, \'RoadPic\', 2.00, \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/geojson/nanshan-road2.geojson\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/pic/spriteline2.png\', \'{\\"time\\":3000}\', 1, 1632815020, 1632815020),
(5, \'RoadPic\', 1.60, \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/geojson/nanshan-road3.geojson\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/pic/spriteline3.png\', \'{\\"time\\":600}\', 1, 1632815053, 1632815053);

-- --------------------------------------------------------

--
-- 转存表中的数据 `__PREFIX__cesiummapv_mapimagery`
--

INSERT INTO `__PREFIX__cesiummapv_mapimagery` (`id`, `name`, `type`, `classConfig`, `interfaceConfig`, `offset`, `invertswitch`, `filterRGB`, `showswitch`, `weigh`, `createtime`, `updatetime`) VALUES
(1, \'高德地图_LYJ\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"http://webst03.is.autonavi.com/appmaptile?x={x}&y={y}&z={z}&style=7\\"}\', \'{\\"saturation\\":0.1,\\"brightness\\":0.8,\\"contrast\\":0.5,\\"hue\\":-0.02,\\"gamma\\":\\"0.3\\"}\', \'0,0\', 0, \'#1d5e99\', 1, 12, 1624326728, 1636513956),
(2, \'ArcGIS在线街道底图\', \'ArcGisMapServerImageryProvider\', \'{\\"url\\":\\"http://services.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer\\"}\', \'{\\"show\\":\\"true\\"}\', \'0,0\', 0, \'#ffffff\', 0, 11, 1624341777, 1624502352),
(3, \'高德地图02\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"https://webst02.is.autonavi.com/appmaptile?style=6&x={x}&y={y}&z={z}\\"}\', \'{}\', \'0,0\', 0, \'#ffffff\', 0, 0, 1624346908, 1624534656),
(6, \'腾讯地图\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"https://rt3.map.gtimg.com/tile?z={z}&x={x}&y={reverseY}&styleid=2&version=297\\"}\', \'\', \'0,0\', 0, \'#ffffff\', 0, 2, 1624502561, 1624533628),
(8, \'天地地图\', \'WebMapTileServiceImageryProvider\', \'{\\"url\\":\\"http://t0.tianditu.gov.cn/img_w/wmts?tk=8fad2e150122529b77178ff7ae4d0a5a\\",\\"layer\\":\\"img\\",\\"style\\":\\"default\\",\\"tileMatrixSetID\\":\\"w\\",\\"format\\":\\"tiles\\",\\"maximumLevel\\":\\"18\\"}\', \'\', \'0,0\', 0, \'#ffffff\', 0, 6, 1624503700, 1629362469),
(9, \'mapbox\', \'MapboxStyleImageryProvider\', \'{\\"url\\":\\"https://api.mapbox.com/styles/v1\\",\\"styleId\\":\\"ckm47tk3ycuse17p66i3bfdba\\",\\"username\\":\\"haw86104\\",\\"accessToken\\":\\"pk.eyJ1IjoiaGF3azg2MTA0IiwiYSI6ImNrbTQ3cWtyeTAxejEzMHBtcW42bmc0N28ifQ.bvS9U_yWdHDh41jzaDS1dw\\"}\', \'\', \'0,0\', 0, \'#ffffff\', 0, 8, 1624504801, 1629362287),
(10, \'mapbox\', \'MapboxStyleImageryProvider\', \'{\\"styleId\\":\\"dark-v10\\",\\"accessToken\\":\\"pk.eyJ1IjoiaGF3azg2MTA0IiwiYSI6ImNrbTQ3cWtyeTAxejEzMHBtcW42bmc0N28ifQ.bvS9U_yWdHDh41jzaDS1dw\\"}\', \'\', \'0,0\', 0, \'#05bda7\', 0, 9, 1624518112, 1632900252),
(11, \'腾讯地图\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"https://p2.map.gtimg.com/sateTiles/{z}/{sx}/{sy}/{x}_{reverseY}.jpg?version=229\\",\\"customTags\\":\\"{sx: function(imageryProvider, x, y, level) {return x >> 4},sy: function(imageryProvider, x, y, level) {return ((1 << level) - y) >> 4},}\\"}\', \'\', \'0,0\', 0, \'#ffffff\', 0, 3, 1624519334, 1629362295),
(12, \'ArcGisChinaOnline\', \'ArcGisMapServerImageryProvider\', \'{\\"url\\":\\"http://map.geoq.cn/arcgis/rest/services/ChinaOnlineStreetPurplishBlue/MapServer\\"}\', \'\', \'0,0\', 0, \'#ffffff\', 0, 13, 1624533626, 1629362277),
(13, \'ArcGIS蓝底\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"http://map.geoq.cn/ArcGIS/rest/services/ChinaOnlineStreetPurplishBlue/MapServer/tile/{z}/{y}/{x}/\\"}\', \'                    {\\"saturation\\":\\"1.0\\",\\"brightness\\":\\"1.0\\",\\"contrast\\":\\"1.0\\",\\"hue\\":\\"0.0\\",\\"gamma\\":\\"1.0\\"}\\r\\n                \', \'0,0\', 0, \'#ffffff\', 0, 10, 1632900474, 1632967909),
(14, \'高德地图01\', \'UrlTemplateImageryProvider\', \'{\\"url\\":\\"http://webst03.is.autonavi.com/appmaptile?x={x}&y={y}&z={z}&style=7\\"}\', \'{\\"saturation\\":\\"0.0\\",\\"brightness\\":\\"0.6\\",\\"contrast\\":\\"1.8\\",\\"hue\\":\\"1\\",\\"gamma\\":\\"0.3\\"}\', \'0,0\', 1, \'#4e70a6\', 1, 0, 1624326728, 1627283665);

-- --------------------------------------------------------

--
-- 转存表中的数据 `__PREFIX__cesiummapv_modellist`
--

INSERT INTO `__PREFIX__cesiummapv_modellist` (`id`, `name`, `url`, `showswitch`, `color`, `colorModelist`, `duration`, `rotateSpeed`, `latRotation`, `positionLon`, `positionLat`, `height`, `scale`, `minimumPixelSize`, `createtime`, `updatetime`) VALUES
(2, \'上海浦东外滩模型-高德\', \'https://a.amap.com/jsapi_demos/static/gltf-online/shanghai/scene.gltf\', 0, \'rgba(255, 255, 255, 1)\', \'HIGHLIGHT\', 37, 0, 3.820, 121.512924194335940000000000000, 31.231559753417970000000000000, 260, 511.00000, 21, 1636422226, 1636531511),
(3, \'深证南山区部分区块城市精细化模型\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/model/2099city/scene.gltf\', 1, \'rgba(255, 255, 255, 1)\', \'HIGHLIGHT\', 20, 0, 1.540, 113.946289062500000000000000000, 22.545898437500000000000000000, 0, 0.01280, 20, 1636448214, 1636528951),
(4, \'旋转锥子\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/model/pyramid.glb\', 1, \'rgba(59, 237, 207, 0.45)\', \'REPLACE\', 19, 6, 3.760, 113.933219909667970000000000000, 22.517576217651367000000000000, 420, 200.00000, 20, 1636531685, 1636531777);

-- --------------------------------------------------------

--
-- 转存表中的数据 `__PREFIX__cesiummapv_pointeffect`
--

INSERT INTO `__PREFIX__cesiummapv_pointeffect` (`id`, `effect_type`, `lon`, `lat`, `height`, `onswitch`, `color`, `radius`, `duration`, `ext`, `createtime`, `updatetime`) VALUES
(13, \'CircleDiffusion\', 113.944435120, 22.523283005, 0, 1, \'rgba(247, 235, 8, 1)\', 1400, 9500, \'{\\"waveCount\\":3,\\"step\\":-0.01,\\"height\\":500,\\"edgeCount\\":5 }\', 1629702358, 1636531409),
(14, \'Scanline\', 113.922744751, 22.536218643, 0, 1, \'rgba(206, 19, 116, 0.91)\', 1200, 6500, \'{\\"waveCount\\":3,\\"step\\":-0.01,\\"height\\":500,\\"edgeCount\\":5 }\', 1629702548, 1629977652),
(15, \'CircleWave\', 113.939323425, 22.511972427, 0, 1, \'rgba(31, 168, 227, 0.59)\', 400, 4500, \'{\\"waveCount\\":4,\\"step\\":-0.01,\\"height\\":500,\\"edgeCount\\":5 }\', 1629702655, 1629977608),
(16, \'HexagonSpread\', 113.915191650, 22.513103485, 0, 1, \'rgba(255, 0, 183, 1)\', 800, 3000, \'{\\"waveCount\\":3,\\"step\\":-0.01,\\"height\\":360,\\"edgeCount\\":0 }\', 1629702824, 1629977887),
(17, \'CircleScan\', 113.928703308, 22.505599976, 0, 1, \'rgba(187, 0, 255, 1)\', 1000, 3000, \'{\\"waveCount\\":3,\\"step\\":-0.01,\\"height\\":500,\\"edgeCount\\":5 }\', 1629702906, 1632819276),
(18, \'HexagonSpread\', 113.934036255, 22.552270889, 0, 1, \'rgba(0, 153, 191, 1)\', 1000, 7500, \'{\\"waveCount\\":3,\\"step\\":-0.01,\\"height\\":500,\\"edgeCount\\":5 }\', 1629703112, 1636528352);

-- --------------------------------------------------------

--
-- 转存表中的数据 `__PREFIX__cesiummapv_titleset`
--

INSERT INTO `__PREFIX__cesiummapv_titleset` (`id`, `name`, `url`, `offset_x`, `offset_y`, `offset_z`, `onswitch`, `flytoswitch`, `color`, `effectswitch`, `height`, `effect_color`, `createtime`, `updatetime`) VALUES
(1, \'成都全市白膜\', \'http://home.fany100.com:8081/cesium/chengdu/tileset.json\', 0, 0, -500, 0, 1, \'rgba(255, 255, 255, 0.71)\', 1, 230, \'#00ffd4\', 1626311265, 1630543401),
(2, \'上海全市白膜\', \'http://home.fany100.com:8081/cesium/shanghai/tileset.json\', 0.0046, -0.0018, 0, 0, 1, \'rgba(255, 255, 255, 1)\', 1, 230, \'#0de6f5\', 1626330642, 1634267311),
(3, \'深圳前海某街道\', \'http://home.fany100.com:8081/cesium/sz_ns2/tileset.json\', 0, 0, 0, 0, 1, \'rgba(255, 0, 123, 0.69)\', 1, 100, \'#ff00ae\', 1626346976, 1630484036),
(4, \'深圳南山区大街道\', \'https://mapv-data.oss-cn-hangzhou.aliyuncs.com/titleset/sz_ns2/tileset.json\', 0, 0, 0, 1, 1, \'rgba(255, 255, 255, 1)\', 1, 260, \'#df16f1\', 1626347087, 1637372783),
(5, \'上海核心地段白膜\', \'http://home.fany100.com:8081/cesium/shanghai/tileset.json\', 0.0046, -0.0015, 0, 0, 1, \'rgba(255, 255, 255, 1)\', 1, 600, \'#0ac0f7\', 1629856413, 1636514211),
(6, \'兰州全市\', \'http://home.fany100.com:8081/cesium/lanzhou/tileset.json\', 0.0024, -0.0003, 0, 0, 1, \'rgba(255, 255, 255, 0.71)\', 1, 200, \'#ffbb00\', 1630543582, 1630543584);',
);