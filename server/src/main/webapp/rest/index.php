<?php
header("Pragma: no-cache");
$url = $_SERVER['REQUEST_URI'];
$match = array();
preg_match_all('/\/hilaosong\/rest\/(.*?)\?+/i', $url, $match);
preg_match_all('/\/hilaosong\/rest\/(.*?)$/i', $url, $match1);
//print_r($match);
//print_r($match1);
$tmp1 = $match[1][0];
$tmp2 = $match1[1][0];
//echo $tmp1;
//echo $tmp2;
$api = '';
if($tmp1){
	$api = $tmp1;
} else {
	$api = $tmp2;
}

$apijson = array(
'login'=>'{
  "respInfo":{
    "msgName":"terminalUserLoginResp",
    "resp_time":"2015-09-17 08:43:32",
    "result_code":"300",
    "result_desc":"success"
  },
  "loginID":"552136",
  "ssoid":"0100000055221575",
  "customerKey":"0100000055221575",
  "tabCount":"0",
  "mailCount":"0",
  "friendsCount":"0",
  "photoCount":"1"
}',
'getuserinfo'=>'{
  "respInfo":{
    "msgName":"getUserInfoResp",
    "resp_time":"2015-09-17 08:43:34",
    "result_code":"300",
    "result_desc":"success"
  },
  "user":{
    "user_entity_id":552136,
    "hits":"0",
    "nickname":"测试账号",
    "sex":1,
    "logo":"http://hi.haidilao.com/User/UserHeadImage/230X230/1421658915362.jpg",
    "mobile":"13161695955",
    "usertype":0,
    "brithday":"1924-01-01",
    "intro":"我的订单不用处理，",
    "area_code":0,
    "location":"北京市-县",
    "createtime":"2014-05-04 13:09:10",
    "follow_num":4,
    "followed_num":0,
    "report_num":5,
    "fav_num":0,
    "at_num":0,
    "userLevel":"4",
    "receivemsg":0,
    "address":"null",
    "postCode":"null",
    "hi_laobi":0,
    "isFriend":0,
    "taste":""
  }
}',
'getcities'=>'[{"id":8221,"cityId":"110000","city":"北京市","provinceId":"110000"},{"id":9831,"cityId":"130100","city":"石家庄市","provinceId":"130000"},{"id":9832,"cityId":"410100","city":"郑州市","provinceId":"410000"},{"id":9833,"cityId":"321000","city":"扬州市","provinceId":"320000"},{"id":9834,"cityId":"350200","city":"厦门市","provinceId":"350000"},{"id":9835,"cityId":"340100","city":"合肥市","provinceId":"340000"},{"id":9836,"cityId":"320400","city":"常州市","provinceId":"320000"},{"id":9837,"cityId":"370100","city":"济南市","provinceId":"370000"},{"id":9838,"cityId":"510100","city":"成都市","provinceId":"510000"},{"id":9839,"cityId":"420100","city":"武汉市","provinceId":"420000"},{"id":9840,"cityId":"430100","city":"长沙市","provinceId":"430000"},{"id":9841,"cityId":"370200","city":"青岛市","provinceId":"370000"},{"id":9842,"cityId":"350100","city":"福州市","provinceId":"350000"},{"id":9843,"cityId":"440100","city":"广州市","provinceId":"440000"},{"id":9712,"cityId":"210100","city":"沈阳市","provinceId":"210000"},{"id":8212,"cityId":"310000","city":"上海市","provinceId":"310000"},{"id":8219,"cityId":"610100","city":"西安市","provinceId":"610000"},{"id":8215,"cityId":"320100","city":"南京市","provinceId":"320000"},{"id":8216,"cityId":"330100","city":"杭州市","provinceId":"330000"},{"id":8225,"cityId":"440300","city":"深圳市","provinceId":"440000"},{"id":9292,"cityId":"320200","city":"无锡市","provinceId":"320000"},{"id":9376,"cityId":"320500","city":"苏州市","provinceId":"320000"}]',
'getareastore'=>'{"storeId":"0201"}',
'getcategories'=>'[{"dishTypeId":"012","dishTypeName":"套餐"},{"dishTypeId":"001","dishTypeName":"锅底"},{"dishTypeId":"002","dishTypeName":"特色菜"},{"dishTypeId":"003","dishTypeName":"荤菜"},{"dishTypeId":"004","dishTypeName":"素菜"},{"dishTypeId":"005","dishTypeName":"小吃"},{"dishTypeId":"007","dishTypeName":"小料"},{"dishTypeId":"010","dishTypeName":"专人服务"},{"dishTypeId":"006001","dishTypeName":"饮品类"},{"dishTypeId":"006002","dishTypeName":"啤酒类"},{"dishTypeId":"006003","dishTypeName":"红酒黄酒"},{"dishTypeId":"006004","dishTypeName":"白酒类"}]',
'cntpacks'=>'{"totalRowsCount":5, "totalPagesCount":1}',
'getpacks'=>'[{"packId":"82192_0201","dishId":"82192_0201","unitPrice":"288.0000","type":"2","storeDishId":"82192","storeDishName":"微特享套餐A"},{"packId":"82193_0201","dishId":"82193_0201","unitPrice":"488.0000","type":"2","storeDishId":"82193","storeDishName":"微特享套餐B"},{"packId":"82194_0201","dishId":"82194_0201","unitPrice":"688.0000","type":"2","storeDishId":"82194","storeDishName":"微特享套餐C"},{"packId":"82195_0201","dishId":"82195_0201","unitPrice":"888.0000","type":"2","storeDishId":"82195","storeDishName":"微特享套餐D"},{"packId":"82119_0201","dishId":"82119_0201","unitPrice":"297.0000","type":"2","storeDishId":"82119","storeDishName":"Hi捞送情侣套餐"}]',
'getpackdishes'=>'[{"packId":"82192_0201","dishId":"41006_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)木耳(半)","unitPrice":"10.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41006.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/10020006_2.png"},{"packId":"82192_0201","dishId":"41024_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)茼蒿(半)","unitPrice":"9.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41024.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/10020024_2.png"},{"packId":"82192_0201","dishId":"41066_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)大白菜(半)","unitPrice":"8.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41066.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/10020064_2.png"},{"packId":"82192_0201","dishId":"41044_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)海带(半)","unitPrice":"10.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41044.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/10020044_2.png"},{"packId":"82192_0201","dishId":"10001_0201","dishNumber":1,"innerId":"1","innerNumber":1,"innerName":"锅底","dishName":"鸳鸯火锅","unitPrice":"61.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10001.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/01010011_2.png"},{"packId":"82192_0201","dishId":"10002_0201","dishNumber":1,"innerId":"1","innerNumber":1,"innerName":"锅底","dishName":"三鲜火锅(非清真)","unitPrice":"59.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10002.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/01010012_2.png"},{"packId":"82192_0201","dishId":"10004_0201","dishNumber":1,"innerId":"1","innerNumber":1,"innerName":"锅底","dishName":"红油火锅","unitPrice":"61.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10004.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/01010014_2.png"},{"packId":"82192_0201","dishId":"10012_0201","dishNumber":1,"innerId":"1","innerNumber":1,"innerName":"锅底","dishName":"红番汤鸳鸯","unitPrice":"61.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10012.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/01010022_2.png"},{"packId":"82192_0201","dishId":"31024_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)手工墨鱼丸(半)","unitPrice":"23.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/31024.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/09020024_2.png"},{"packId":"82192_0201","dishId":"32014_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)鲜黄腊丁(半)","unitPrice":"26.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/32014.png"},{"packId":"82192_0201","dishId":"20014_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)捞派滑牛肉(半)","unitPrice":"22.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/20014.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/03010014_2.png"},{"packId":"82192_0201","dishId":"20012_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)手切羊肉(半)","unitPrice":"29.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/20012.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/03010012_2.png"},{"packId":"82192_0201","dishId":"30009_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"内蒙羔羊肉","unitPrice":"42.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/30009.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/09010009_2.png"},{"packId":"82192_0201","dishId":"40020_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)豆腐皮(半)","unitPrice":"9.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40020.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/10010020_2.png"},{"packId":"82192_0201","dishId":"33052_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"捞派鸭肠(半)","unitPrice":"14.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/33052.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/09040052_2.png"},{"packId":"82192_0201","dishId":"30012_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)捞派澳洲肥牛(半)","unitPrice":"24.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/30012.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/09010010_2.png"},{"packId":"82192_0201","dishId":"31034_0201","dishNumber":1,"innerId":"group31024_0201","innerNumber":1,"innerName":"荤菜","dishName":"(B)虾滑(半)","unitPrice":"24.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/31034.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/09020034_2.png"},{"packId":"82192_0201","dishId":"61008_0201","dishNumber":1,"innerId":"2","innerNumber":4,"innerName":"小料","dishName":"麻酱","unitPrice":"5.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61008.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/12020008_2.png"},{"packId":"82192_0201","dishId":"61012_0201","dishNumber":1,"innerId":"2","innerNumber":4,"innerName":"小料","dishName":"海鲜酱","unitPrice":"5.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61012.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/12020012_2.png"},{"packId":"82192_0201","dishId":"61001_0201","dishNumber":1,"innerId":"2","innerNumber":4,"innerName":"小料","dishName":"海底捞味碟","unitPrice":"5.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61001.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/12020001_2.png"},{"packId":"82192_0201","dishId":"61003_0201","dishNumber":1,"innerId":"2","innerNumber":4,"innerName":"小料","dishName":"香油蒜泥","unitPrice":"5.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61003.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/12020003_2.png"},{"packId":"82192_0201","dishId":"61011_0201","dishNumber":1,"innerId":"2","innerNumber":4,"innerName":"小料","dishName":"菌王酱","unitPrice":"5.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61011.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/12020011_2.png"},{"packId":"82192_0201","dishId":"20026_0201","dishNumber":1,"innerId":"group10001_0201","innerNumber":1,"innerName":"素菜","dishName":"(B)捞派豆花(半)","unitPrice":"9.0000","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/20026.png","mediumImageAddr":"http://172.16.254.91:9080/TzxRifImage/images/03010026_2.png"}]',
'cntdishes'=>'{"totalRowsCount":14, "totalPagesCount":2}',
'getdishes'=>'[]',
'cntgds'=>'{"totalRowsCount":3, "totalPagesCount":1}',
'getgds'=>'[{"guodiId":69237,"guodiName":"测试账号的2号锅底","dishId2":"10053_020115","dishId":"10002_020115","dishName":"菌汤火锅+三鲜火锅","unitPrice":"63.0000","type":"1","bigImageAddr":"http://cater.haidilao.comhttp://172.16.254.91:9080/TzxRifImage/images/01010012_1.png"},{"guodiId":69238,"guodiName":"测试账号的2号锅底","dishId2":"10016_020110","dishId":"10004_020110","dishName":"红油火锅+全番茄火锅","unitPrice":"68.0000","type":"1","bigImageAddr":"http://cater.haidilao.comhttp://172.16.254.91:9080/TzxRifImage/images/01010014_1.png"},{"guodiId":69239,"guodiName":"测试账号的3号锅底","dishId2":"10015_020110","dishId":"10004_020110","dishName":"红油火锅+番茄锅三鲜火锅","unitPrice":"68.0000","type":"1","bigImageAddr":"http://cater.haidilao.comhttp://172.16.254.91:9080/TzxRifImage/images/01010014_1.png"}]',
'getgdname'=>'{"guodiName":"测试账号的4号锅底"}',
'creategd'=>'{"respCode":"210","respMsg":"创建DIY锅底成功","guodiId":"69242"}',
'updategd'=>'{"respCode":"211","respMsg":"更新DIY锅底成功","guodiId":"69237"}',
'deletegd'=>'{"respCode":"212","respMsg":"删除DIY锅底成功"}',
'getdishdetail'=>'',
'getlatestaddress'=>'',
'testbaidu'=>'["22495","北京市-昌平区-立汤路","116.41856,40.155056"]',
'calcdeliveryfee'=>'{"deliveryFee":"161"}',
'getdeliverylimitmoney'=>'{"deliveryLimitMoney":"276","startDay":"1","endDay":"60","firstDayStartTime":"17:00:00","startTime":"16:00:00","endTime":"17:00:00","message":"","busyTimes":[],"closeTimes":[]}',
'getdeliverylimit'=>'{"deliveryLimitMoney":"276","startDay":"0","endDay":"60","firstDayStartTime":"17:00:00","startTime":"16:00:00","endTime":"17:00:00","message":"","busyTimes":[],"closeTimes":[]}',
'getstores0'=>'{"storeId":"020110","storeName":"红庙店","storeAddress":"朝阳区红庙延静西里2号东华商大厦2楼 ","storeTele":"01065060403,01065069340","storeCode":"BJ10","storeType":"5","provinceId":"110000","cityId":"110105","coordinate":"116.488962,39.921939","baiduIid":"1","deptType":"4","deptId":"020110","deptName":"北京十店","distance":5.21585990855414890605136420777670148627,"deliveryFee":"52"}',
'getstores2'=>'[{"storeId":"020102","storeName":"牡丹园店","storeAddress":"海淀区花园东路2号(牡丹宾馆北) ","storeTele":"01062033112,01062033113","storeCode":"BJ02","storeType":"4","provinceId":"110000","cityId":"110108","coordinate":"116.375007,39.984875","baiduIid":"1","deptType":"4","deptId":"020102","deptName":"北京二店"},{"storeId":"020103","storeName":"劲松店","storeAddress":"朝阳区南磨房路平乐园29号(近西大望路) ","storeTele":"01087798911,87798677","storeCode":"BJ03","storeType":"5","provinceId":"110000","cityId":"110105","coordinate":"116.480007,39.890367","baiduIid":"1","deptType":"4","deptId":"020103","deptName":"北京三店"},{"storeId":"020105","storeName":"白纸坊店","storeAddress":"西城区广安门南街42号中建二局大厦1-2楼(白纸坊桥东)","storeTele":"01051816880,01051816876","storeCode":"BJ05","storeType":"4","provinceId":"110000","cityId":"110102","coordinate":"116.357526,39.882033","baiduIid":"1","deptType":"4","deptId":"020105","deptName":"北京五店"},{"storeId":"020107","storeName":"望京店","storeAddress":"朝阳区望京街9号望京国际商业中心4楼(近方恒国际中心)","storeTele":"010-59203512","storeCode":"BJ07","storeType":"3","provinceId":"110000","cityId":"110105","coordinate":"116.490943,39.995847","baiduIid":"1","deptType":"4","deptId":"020107","deptName":"北京七店"},{"storeId":"020110","storeName":"红庙店","storeAddress":"朝阳区红庙延静西里2号东华商大厦2楼 ","storeTele":"01065060403,01065069340","storeCode":"BJ10","storeType":"5","provinceId":"110000","cityId":"110105","coordinate":"116.488962,39.921939","baiduIid":"1","deptType":"4","deptId":"020110","deptName":"北京十店"},{"storeId":"020111","storeName":"石景山店","storeAddress":"石景山区石景山路乙18号万达广场c栋4楼(近1号线八宝山地铁站) ","storeTele":"01088689558,01088689559","storeCode":"BJ11","storeType":"2","provinceId":"110000","cityId":"110000","coordinate":"116.231073,39.911262","baiduIid":"1","deptType":"4","deptId":"020111","deptName":"北京十一店"},{"storeId":"020112","storeName":"紫竹桥店","storeAddress":"海淀区紫竹院路北洼路4号1区195号楼苏宁电器4楼(香格里拉饭店西) ","storeTele":"01068717926,01068716676","storeCode":"BJ12","storeType":"5","provinceId":"110000","cityId":"110108","coordinate":"116.311342,39.950911","baiduIid":"1","deptType":"4","deptId":"020112","deptName":"北京十二店"},{"storeId":"020113","storeName":"翠微路店","storeAddress":"海淀区翠微路凯德MALL（原嘉茂购物中心）商场四层","storeTele":"01068218532,01068216579","storeCode":"BJ13","storeType":"2","provinceId":"110000","cityId":"110000","coordinate":"116.308843,39.91883","baiduIid":"1","deptType":"4","deptId":"020113","deptName":"北京十三店"},{"storeId":"020115","storeName":"王府井店","storeAddress":"北京市东城区王府井大街88号乐天银泰百货8层 ","storeTele":"01057620153,01057620741","storeCode":"BJ15","storeType":"3","provinceId":"110000","cityId":"110101","coordinate":"116.417951,39.92221","baiduIid":"1","deptType":"4","deptId":"020115","deptName":"北京十五店"},{"storeId":"020116","storeName":"方庄店","storeAddress":"丰台区蒲芳路26-2号(方庄体育公园对面)","storeTele":"01067616839,01067619519","storeCode":"BJ16","storeType":"3","provinceId":"110000","cityId":"110106","coordinate":"116.434278,39.871546","baiduIid":"1","deptType":"4","deptId":"020116","deptName":"北京十六店"},{"storeId":"020120","storeName":"天通苑店","storeAddress":"北京市昌平区天通中苑F区华联天通苑购物中心四楼","storeTele":"01057859826,01057859828","storeCode":"BJ19","storeType":"2","provinceId":"110000","cityId":"110114","coordinate":"116.420593,40.076381","baiduIid":"1","deptType":"4","deptId":"020120","deptName":"北京十九店"},{"storeId":"020122","storeName":"太阳宫店","storeAddress":"北京朝阳区太阳宫新区C区凯德MALL-太阳宫B1层-50B/51号","storeTele":"01084150908,01084150958","storeCode":"BJ22","storeType":"2","provinceId":"110000","cityId":"110105","coordinate":"116.45583,39.97981","baiduIid":"1","deptType":"4","deptId":"020122","deptName":"北京二十二店"},{"storeId":"020126","storeName":"望京港旅店","storeAddress":"北京市湖光中街甲6号望京港旅大厦2层","storeTele":"01064709181,01064709081","storeCode":"BJ21","storeType":"2","provinceId":"110000","cityId":"110105","coordinate":"116.470736,40.002578","baiduIid":"1","deptType":"4","deptId":"020126","deptName":"北京二十一店"},{"storeId":"020127","storeName":"万丰桥店","storeAddress":"北京市丰台区丰台北路36号华铁咨询大厦C座一、二层","storeTele":"01083897277,01083897276","storeCode":"BJ23","storeType":"2","provinceId":"110000","cityId":"110106","coordinate":"116.30316,39.871875","baiduIid":"1","deptType":"4","deptId":"020127","deptName":"北京二十三店"},{"storeId":"020128","storeName":"大钟寺店","storeAddress":"海淀区大钟寺中坤广场E座五层","storeTele":"01062133511,01062133512","storeCode":"BJX1D","storeType":"2","provinceId":"110000","cityId":"110108","coordinate":"116.349992,39.971416","baiduIid":"1","deptType":"4","deptId":"020128","deptName":"北京新一店"},{"storeId":"020129","storeName":"顺义华联店","storeAddress":"北京市顺义区新顺北大街与府前中街交口华联商厦5层","storeTele":"01089465850、01089465860","storeCode":"BJ24D","storeType":"2","provinceId":"110000","cityId":"110113","coordinate":"116.658162,40.134005","baiduIid":"1","deptType":"4","deptId":"020129","deptName":"北京二十四店"},{"storeId":"020130","storeName":"华联店","storeAddress":"北京市通州区杨庄北里天时名苑小区14号楼华联商场F2","storeTele":"010-56351786","storeCode":"BJ26D","storeType":"3","provinceId":"110000","cityId":"110112","coordinate":"116.642463,39.909781","baiduIid":"1","deptType":"4","deptId":"020130","deptName":"北京二十六店"},{"storeId":"020131","storeName":"星城商厦店","storeAddress":"北京市大兴区黄村西大街与兴丰大街交叉十字路口处星城商厦6层","storeTele":"01069236661、01069236662","storeCode":"BJ25D","storeType":"3","provinceId":"110000","cityId":"110115","coordinate":"116.34594,39.736123","baiduIid":"1","deptType":"4","deptId":"020131","deptName":"北京二十五店"}]',
'getcouponinfo'=>'',
'usecoupon'=>'',
'createorder'=>'',
'cnthistoryorders'=>'{"totalRowsCount":45, "totalPagesCount":5}',
'gethistoryorders'=>'[{"serialId":"2015091502519","orderId":"WABCD012015091502519","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试","contactPhone":"13161695955","participantNumber":1,"dinningTime":"2015-09-15 14:30:00","status":"0","orderType":"2","deliveryType":"3","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-15 13:29:41","totalPrice":251,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091502518","orderId":"WABCD012015091502518","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试N","contactPhone":"18801135596","participantNumber":1,"dinningTime":"2015-09-15 14:30:00","status":"0","orderType":"2","deliveryType":"3","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-15 13:29:05","totalPrice":290,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091502511","orderId":"WABCD012015091502511","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试N","contactPhone":"18801135596","participantNumber":1,"dinningTime":"2015-09-15 14:19:00","status":"0","orderType":"2","deliveryType":"3","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-15 13:18:42","totalPrice":631,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091402451","orderId":"WABCD012015091402451","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试","contactPhone":"18311288077","participantNumber":1,"dinningTime":"2015-09-14 11:59:00","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"0","orderNature":"2","payStatus":"0","createdDt":"2015-09-14 10:58:41","totalPrice":356,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091302446","orderId":"WABCD012015091302446","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试程程","contactPhone":"18801135596","participantNumber":1,"dinningTime":"2015-09-13 14:54:00","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-13 13:53:58","totalPrice":368,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091302445","orderId":"WABCD012015091302445","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"杨爽","contactPhone":"13718370704","participantNumber":4,"dinningTime":"2015-09-13 12:26:00","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-13 11:25:35","totalPrice":455.4,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015091302444","orderId":"WABCD012015091302444","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"杨爽","contactPhone":"13718370704","participantNumber":4,"dinningTime":"2015-09-16 12:10:00","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-13 11:23:22","totalPrice":455.4,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015090902272","orderId":"WBJ152015090902272","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"Jimmy","contactPhone":"13585947701","participantNumber":4,"dinningTime":"2015-10-12 16:30:05","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"0","custMemo":"请美女送餐","orderNature":"2","payStatus":"0","createdDt":"2015-09-09 16:44:12","totalPrice":106.8,"address":{},"expenses":{},"packs":[],"dishes":[]},{"serialId":"2015090702094","orderId":"WBJ152015090702094","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"Jimmy","contactPhone":"13585947701","participantNumber":4,"dinningTime":"2015-10-20 16:30:05","status":"0","orderType":"0","deliveryType":"0","needReciept":0,"payChannel":"0","custMemo":"请美女送餐","orderNature":"2","payStatus":"0","createdDt":"2015-09-07 18:14:54","totalPrice":118,"address":{},"expenses":{},"packs":[],"dishes":[]}]',
'getorderinfo'=>'{"serialId":"2015091502519","orderId":"WABCD012015091502519","customerId":"552136","storeId":"020115","storeName":"王府井店","contactName":"测试","contactPhone":"13161695955","participantNumber":1,"dinningTime":"2015-09-15 14:30:00","status":"0","potNumber":0,"panNumber":0,"potStatus":"0","orderType":"2","deliveryType":"3","needReciept":0,"payChannel":"2","orderNature":"2","payStatus":"0","createdDt":"2015-09-15 13:29:41","address":{},"expenses":{"expensesId":1991147,"waiterFee":"0","deliveryFee":"0","dishPrice":251,"totalPrice":251},"packs":[],"dishes":[{"dishId":"10002_020105","dishName":"三鲜火锅(非清真)","unitPrice":"59.0000","dishNumber":1,"dishType":"0"},{"dishId":"10004_020105","dishName":"红油火锅","unitPrice":"61.0000","dishNumber":1,"dishType":"0"},{"dishId":"10006_020105","dishName":"无渣火锅（麻辣）","unitPrice":"68.0000","dishNumber":1,"dishType":"0"},{"dishId":"10007_020105","dishName":"菌汤火锅(鸳鸯)","unitPrice":"63.0000","dishNumber":1,"dishType":"0"}]}',
);
if($api == 'getdishes' && $_GET['catId'] == '001'){
	echo '[{"dishId":"10001_0201","unitPrice":"61.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10001.png","storeDishId":"10001","storeDishName":"鸳鸯火锅"},{"dishId":"10002_0201","unitPrice":"59.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10002.png","storeDishId":"10002","storeDishName":"三鲜火锅(非清真)"},{"dishId":"10004_0201","unitPrice":"61.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10004.png","storeDishId":"10004","storeDishName":"红油火锅"},{"dishId":"10005_0201","unitPrice":"59.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10005.png","storeDishId":"10005","storeDishName":"无渣火锅(鸳鸯)"},{"dishId":"10006_0201","unitPrice":"59.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10006.png","storeDishId":"10006","storeDishName":"无渣火锅(麻辣)"},{"dishId":"10007_0201","unitPrice":"63.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10007.png","storeDishId":"10007","storeDishName":"菌汤火锅(鸳鸯)"},{"dishId":"10011_0201","unitPrice":"63.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10011.png","storeDishId":"10011","storeDishName":"菌汤火锅(三鲜)"},{"dishId":"10012_0201","unitPrice":"61.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10012.png","storeDishId":"10012","storeDishName":"红番汤鸳鸯"},{"dishId":"10015_0201","unitPrice":"61.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/10015.png","storeDishId":"10015","storeDishName":"红番三鲜"}]';
} elseif($api == 'getdishes' && $_GET['catId'] == '004'){
	echo '[{"dishId":"20021_0201","unitPrice":"24.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/20021.png","storeDishId":"20021","storeDishName":"笋片","halfDishId":"20022_0201","halfStoreDishId":"20022","halfPrice":"12.0000"},{"dishId":"40015_0201","unitPrice":"18.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40015.png","storeDishId":"40015","storeDishName":"豆腐","halfDishId":"40016_0201","halfStoreDishId":"40016","halfPrice":"9.0000"},{"dishId":"40017_0201","unitPrice":"20.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40017.png","storeDishId":"40017","storeDishName":"冻豆腐","halfDishId":"40018_0201","halfStoreDishId":"40018","halfPrice":"10.0000"},{"dishId":"40019_0201","unitPrice":"18.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40019.png","storeDishId":"40019","storeDishName":"豆腐皮","halfDishId":"40020_0201","halfStoreDishId":"40020","halfPrice":"9.0000"},{"dishId":"40023_0201","unitPrice":"18.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40023.png","storeDishId":"40023","storeDishName":"油豆腐皮","halfDishId":"40024_0201","halfStoreDishId":"40024","halfPrice":"9.0000"},{"dishId":"40025_0201","unitPrice":"18.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/40025.png","storeDishId":"40025","storeDishName":"腐竹","halfDishId":"40026_0201","halfStoreDishId":"40026","halfPrice":"9.0000"},{"dishId":"41005_0201","unitPrice":"20.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41005.png","storeDishId":"41005","storeDishName":"木耳","halfDishId":"41006_0201","halfStoreDishId":"41006","halfPrice":"10.0000"},{"dishId":"41007_0201","unitPrice":"24.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41007.png","storeDishId":"41007","storeDishName":"金针菇","halfDishId":"41008_0201","halfStoreDishId":"41008","halfPrice":"12.0000"},{"dishId":"41009_0201","unitPrice":"18.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/41009.png","storeDishId":"41009","storeDishName":"香菇","halfDishId":"41010_0201","halfStoreDishId":"41010","halfPrice":"9.0000"}]';
} elseif($api == 'getdishes' && $_GET['catId'] == '005'){
	echo '[{"dishId":"50007_0201","unitPrice":"12.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/50007.png","storeDishId":"50007","storeDishName":"窝窝头","halfDishId":"50008_0201","halfStoreDishId":"50008","halfPrice":"6.0000"},{"dishId":"50011_0201","unitPrice":"10.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/50011.png","storeDishId":"50011","storeDishName":"金银馒头","halfDishId":"50012_0201","halfStoreDishId":"50012","halfPrice":"5.0000"},{"dishId":"50019_0201","unitPrice":"3.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/50019.png","storeDishId":"50019","storeDishName":"五常米饭"},{"dishId":"50023_0201","unitPrice":"3.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/50023.png","storeDishId":"50023","storeDishName":"火烧"},{"dishId":"50184_0201","unitPrice":"6.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/50184.png","storeDishId":"50184","storeDishName":"汤圆"},{"dishId":"51013_0201","unitPrice":"12.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/51013.png","storeDishId":"51013","storeDishName":"跳水泡菜","halfDishId":"51014_0201","halfStoreDishId":"51014","halfPrice":"6.0000"},{"dishId":"51035_0201","unitPrice":"12.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/51035.png","storeDishId":"51035","storeDishName":"糖蒜","halfDishId":"51036_0201","halfStoreDishId":"51036","halfPrice":"6.0000"}]';
} elseif($api == 'getdishes' && $_GET['catId'] == '007'){
	echo '[{"dishId":"61001_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61001.png","storeDishId":"61001","storeDishName":"海底捞味碟"},{"dishId":"61002_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61002.png","storeDishId":"61002","storeDishName":"麻酱味碟"},{"dishId":"61003_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61003.png","storeDishId":"61003","storeDishName":"香油蒜泥"},{"dishId":"61008_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61008.png","storeDishId":"61008","storeDishName":"麻酱"},{"dishId":"61010_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61010.png","storeDishId":"61010","storeDishName":"XO酱"},{"dishId":"61012_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61012.png","storeDishId":"61012","storeDishName":"海鲜酱"},{"dishId":"61015_0201","unitPrice":"5.0000","type":"1","bigImageAddr":"http://cater.haidilao.com/Cater/images/dishes/0201/61015.png","storeDishId":"61015","storeDishName":"沙茶酱"},{"dishId":"61022_0201","unitPrice":"5.0000","type":"1","storeDishId":"61022","storeDishName":"自制酱油"},{"dishId":"61023_0201","unitPrice":"5.0000","type":"1","storeDishId":"61023","storeDishName":"风味豆豉"}]';
} else {
	echo $apijson[$api];
}

/*

eval({

"busytimelist":[{"busyTimeEnd":"2015-09-12:21:30","busyTimeStart":"2015-09-12:09:00"},{"busyTimeEnd":"2015-09-19:21:30","busyTimeStart":"2015-09-19:09:30"},{"busyTimeEnd":"2015-09-18:22:30","busyTimeStart":"2015-09-18:09:00"},{"busyTimeEnd":"2015-08-21:22:00","busyTimeStart":"2015-08-21:14:00"}],

"closetimelist":[],

"delevierlimitmoney1":"258",

"delevierlimitmoney2":"",

"delevierlimitmoney3":"",

"firstDayLowHour":"16:00",

"lowDate":"0",

"lowhour":"9:00",

"lowtime":"",
,"upDate":"30","uphour":"23:45","uptime":""

"msg":"尊敬的顾客，您好：海底捞牡丹园店于2月17号晚上21:00至2月20号早上9:00不营业，给您带来的不便敬请谅解.海底捞牡丹园店位于北京市海淀区花园东路2号牡丹宾馆向北200米路西，附近标志性建筑物有中兴大厦、泰兴大厦，您开车过来可以停在牡丹集团的院子里（院里早上7：00到晚上21:00,5元/小时，晚上21:00到第二天凌晨7:00，2小时/1元）。问询电话：010-62033112  62033113","result":{"returncode":"0","returnmsg":"success"}});

"startDay":"1","endDay":"60","firstDayStartTime":"17:00:00","startTime":"16:00:00","endTime":"17:00:00",
"lowDate":"0","upDate":"30","firstDayLowHour":"16:00","lowhour":"9:00","uphour":"23:45","lowtime":"","uptime":""
{"deliveryLimitMoney":"276","startDay":"1","endDay":"60","firstDayStartTime":"17:00:00","startTime":"16:00:00","endTime":"17:00:00","message":"","busyTimes":[],"closeTimes":[]}
*/
?>