--
-- 数据库： `tour`
--
DROP DATABASE IF EXISTS `tour`;
CREATE DATABASE IF NOT EXISTS `tour` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `tour`;

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `fieldName` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fieldName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`fieldName`, `content`) VALUES
('companyName', '雪花旅行社股份有限公司'),
('address', '江苏省盐城市亭湖区大庆中路1234 号'),
('code', '1234567'),
('telephone', '010-88888888'),
('fax', '010-88666666'),
('about', '以“让旅游更简单”为使命，为消费者提供由北京、上海、广州、深圳等64 个城市出发的旅游产品预订服务，产品全面，价格透明，全年365 天24 小时400 电话预订，并提供丰富的后续服务和保障。 目前，雪花旅行社旅游网提供8 万余种旅游产品供消费者选择，涵盖跟团、自助、自驾、邮轮、酒店、签证、景区门票以及公司旅游等，已成功服务累计超过400 万人次出游。 同时基于雪花旅行社旅游网全球中文景点目录以及中文旅游社区，可以更好地帮助游客了解目的地信息，妥善制定好出游计划，并方便地预订旅程中的服务项目');

-- --------------------------------------------------------

--
-- 表的结构 `chat_user`
--

DROP TABLE IF EXISTS `chat_user`;
CREATE TABLE IF NOT EXISTS `chat_user` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名',
  `userPass` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `userName` (`userName`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='聊天用户';

--
-- 转存表中的数据 `chat_user`
--

INSERT INTO `chat_user` (`Id`, `userName`, `userPass`) VALUES
(1, 'rose', '123456'),
(2, 'jack', '123456'),
(3, 'kkkk', 'kkkk'),
(4, 'cckk', '6686212'),
(5, 'ssss', '1111'),
(6, 'jerry', '123456'),
(7, 'cccc', 'cccc'),
(8, 'dddd', 'dddd'),
(9, 'bbbb', 'bbbb'),
(10, 'gggg', 'gggg'),
(11, 'aaaaa', 'aaaaa'),
(12, '3333', '3333'),
(13, 'admin', 'admin888');

-- --------------------------------------------------------

--
-- 表的结构 `content`
--

DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `introduce` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `manyidu` float NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `content`
--

INSERT INTO `content` (`id`, `uid`, `location`, `introduce`, `price`, `manyidu`, `image`, `content`, `addtime`) VALUES
(1, 13, '曼谷-芭提雅6日游', '包团特惠，超丰富景点，升级1晚国五，无自费，更赠送600元/成人自费券', 2864, 77, '169382321425483.jpg', '<h2 id=\"target_expenses\">&nbsp;费用说明</h2><div><div data=\"[object Object]\"><section><h2>费用包含</h2><div>景点门票<div><p>行程中所列景点首道大门票</p></div></div><div>大交通<div><p>飞机往返经济舱机票</p></div></div><div>当地交通<div><p>根据参团人数调派车型，保证一人一正座</p></div></div><div>住宿<div><p>行程所列酒店5晚住宿费用，标准2人间</p></div></div><div>餐食<div><p>行程中团队标准用餐；</p></div></div><div>导游服务<div><p>领队和当地中文导游服务</p></div></div></section></div><div data=\"[object Object]\"><section><h2>费用不含</h2><div><div><p></p><pre>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</pre><p></p><p></p><pre>出入境个人物品海关征税，超重行李的托运费、保管费</pre><p></p><p></p><pre>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</pre><p></p><p></p><pre>一切个人消费及费用包含中未提及的任何费用</pre><p></p></div></div><div>其他<div><p>导游服务费300元/人，现场支付导游。</p><p>快递通关费50元/人，现场支付导游。</p><p>落地签签证费：2200 泰铢（约450元）/人，现场支付导游。</p><p>非大陆护照加收500元/人，客人如中途离团的需加收500/人/天。</p><p>因个人意愿要求房型升级产生的单房差费用，单男单女及单人住宿要求需补房差单房差1200 元/人。</p><p>泰国核酸检测费用：参考费用1500 泰铢/人，具体以当地医院价格为准</p></div></div></section></div><div data=\"[object Object]\"><section><h2>儿童政策</h2><div><div><p></p><pre>根据泰国法律要求：12-18岁小孩必须占床（含12 岁），占床加1200 元/人。12 岁以下不占床与成人同价，占床加收1200 元/人。</pre><p></p></div></div></section></div></div>', '2023-09-04 17:01:59'),
(3, 13, '土耳-国庆团期', '深度10到13天跟团游（蓝色清真寺/棉花堡/卡帕多奇亚/圣索菲亚大教堂/博斯普鲁斯海峡/特洛伊/以弗所/图兹湖/安塔利亚）', 9900, 88, '1693831580749630.jpeg', '<div data=\"[object Object]\"><section><h2>费用包含</h2><div>景点门票<div><p>行程中所列景点首道大门票</p></div></div><div>大交通<div><p>飞机往返经济舱机票</p><p>免费行李托运1件，每件20KG</p><p>燃油附加费（以实际收费标准为准，如遇政府或航空公司政策性调整燃油税费，在未出票的情况下将进行多退少补）</p><p>机场建设费</p></div></div><div>当地交通<div><p>根据参团人数调派车型，保证一人一正座</p></div></div><div>住宿<div><p>行程所列酒店7晚住宿费用，标准2人间</p><p>具体入住酒店晚数，以客服发送的行程单为准。境外酒店没有挂星制度，行程中所标明的酒店等级为当地行业参考标准。因住宿成本按2人住1间房来核算，成人单价只含半间房费，故出行人数中的单成人如果无法安排拼房，则须补1个单房差费用，全程单独住一间房。</p></div></div><div>餐食<div><p>行程中所列餐食（飞机餐是否收费请参照航空公司规定）7早，14正餐</p><p>具体餐数，以客服发送的行程单为准。早餐为酒店自助早餐，如用餐时间在途中则可能安排路餐（面包牛奶鸡蛋这类）。正餐为当地风味餐、 中国餐、 西餐等。如客人放弃用餐 ，费用不退。</p></div></div><div>导游服务<div><p>领队和当地中文导游服务</p></div></div><div>签证/签注<div><p>团队旅游签证费</p></div></div><div>其他<div><p>根据《旅游法》规定，旅行者不得脱团，行程中如擅自脱团、离团、滞留等，旅行社将向公安机关、旅游主管部门、我国驻外机构报告，由此产生的一切法律后果由旅游者承担。</p></div></div></section></div><div data=\"[object Object]\"><section><h2>费用不含</h2><div><div><p>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</p><p>出入境个人物品海关征税，超重行李的托运费、保管费</p><p>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</p><p>一切个人消费及费用包含中未提及的任何费用</p></div></div><div>其他<div><p>费用不含司导服务费大约1000-1800元/人，不同团期价格不同，具体详询客服；费用不含出发城市到直飞城市的往返联运机票费用，不同城市价格不同，具体价格详询客服。</p></div></div></section></div><div data=\"[object Object]\"><section><h2>儿童政策</h2><div><div><p>年龄4-8周岁（不含），不占床含餐，价格详询客服</p><p>年龄8-18周岁（不含），服务标准同成人，价格按成人算</p></div></div></section></div>', '2023-09-04 18:34:03'),
(4, 13, '云南昆明+大理+丽江6天5晚', '动车返回昆明+吉普车旅拍+洱海游艇+玉龙雪山+网红圣地+《丽水金沙》表演+大理古城', 1900, 70, '1693832274334468.jpeg', '<section><div><div data=\"[object Object]\"><section><h2>费用包含</h2><div>景点门票<div><p>行程中所列景点首道大门票</p></div></div><div>大交通<div><p>飞机往返经济舱机票</p><p>燃油附加费（以实际收费标准为准，如遇政府或航空公司政策性调整燃油税费，在未出票的情况下将进行多退少补）</p><p>机场建设费</p><p>为节省您的出行成本，产品展示的价格为系统默认的低价机票组合，多为夜航或廉价航空，若您指定航班，需补差价。</p><p>为节省您的出行成本，产品展示的价格为系统默认的低价机票组合，多为夜航或廉价航空，若为廉价航空不含托运，需自理。</p></div></div><div>当地交通<div><p>根据参团人数调派车型，保证一人一正座</p><p>含大理至昆明单程动车票</p><p>含24小时免费接送机（接送车上无导游）</p></div></div><div>住宿<div><p>行程所列酒店5晚住宿费用，标准2人间</p><p>全程轻奢高端酒店+1晚4钻酒店</p><p>网页所列酒店仅供参考，具体以实际入住为准</p></div></div><div>餐食<div><p>行程中所列餐食（飞机餐是否收费请参照航空公司规定）5早，7正餐</p><p>正餐10菜一汤，十人一桌（如果客人自愿放弃用餐，餐费一律不予退还）</p><p>正餐餐标:30元/人，升级特色餐:宜良烤鸭+野生菌火锅+白族风味菜+南涧挑菜歌舞伴餐+白族风味餐+纳西火塘鸡</p></div></div><div>导游服务<div><p>当地中文导游服务</p></div></div><div>其他<div><p>境内旅游意外险（3岁-70岁为投保年龄范围；外宾险另议）</p><p>专业摄影师旅拍+单程动车票+吉普车体验+洱海游船（赠送项目如遇特殊原因无法安排，不退任何费用）</p></div></div></section></div><div data=\"[object Object]\"><section><h2>费用不含</h2><div><div><p>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</p><p>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</p><p>一切个人消费及费用包含中未提及的任何费用</p></div></div><div>其他<div><p>景区小交通:景区索道、环保车、电瓶车费等</p><p>“费用包含”中不包含的其他项目</p></div></div></section></div><div data=\"[object Object]\"><section><h2>儿童政策</h2><div><div><p>2-12岁儿童费用包含：机票、目的地用车、半餐、导游服务费，其他费用不含若产生敬请自理！</p></div></div></section></div><div data=\"[object Object]\"></div></div></section><section><a id=\"target_purchase\"></a><h2>&nbsp;购买须知</h2><div><section><h2>服务信息</h2><div><p>支付完成后商家最晚会在9个工作小时内（9:00-18:00）确认是否预定成功</p><p>超时未确认系统将自动退款，预计1-7个工作日退还到支付账户</p><p>本商品提供出团通知书/确认单，商家最晚在出行日期前1天发送，如未收到请及时与商家联系</p></div></section></div></section>', '2023-09-04 20:57:54'),
(5, 13, '阿联酋迪拜-全景深度6到7天跟团游', '朱美拉海滩+阿布扎比总统府+海上卢浮宫+哈利法塔+谢赫扎伊德清真寺+法拉利公园', 4999, 66, '1693832715684837.png', '<div><div><div><p></p></div></div></div><div><h2>费用包含</h2><h3><section><div><div data=\"[object Object]\"><section><div><span>景点门票</span><div><p><span></span>行程中所列景点首道大门票</p><p><span></span>该目的地景点较为特殊，并非传统意义上的旅行景点，有些是酒店或公共建筑物等，行程中游览顺序和停留时间仅供参考，我公司有权根据当地天气、交通等情况调整景点顺序或增减，实际停留时间及是否安排以具体行程游览为准。行程中有些车览或外观景点，可能因行车路线或游览安排调整而有增减，如未车览或外观，不再另作安排，请您理解知晓！</p></div></div><div><span>大交通</span><div><p><span></span>飞机往返经济舱机票</p><p><span></span>免费行李托运1件，每件20KG</p><p><span></span>燃油附加费（以实际收费标准为准，如遇政府或航空公司政策性调整燃油税费，在未出票的情况下将进行多退少补）</p><p><span></span>机场建设费</p><p><span></span>团队机票将统一出票，如遇政府或航空公司政策性调整燃油税费， 在未出票的情况下将进行多退少补，敬请谅解。团队机票一经开出，不得更改、不得签转、不得退票。非直飞城市的团费价格不包含出发地往返出境口岸城市的联运机票价格，请以航司出票为准。</p></div></div><div><span>当地交通</span><div><p><span></span>根据参团人数调派车型，保证一人一正座</p><p><span></span>迪拜机场往返接送服务</p></div></div><div><span>住宿</span><div><p><span></span>行程所列酒店5晚住宿费用，标准2人间</p><p><span></span>此产品为2人入住1间价格，单人入住需补房差。</p></div></div><div><span>餐食</span><div><p><span></span>行程中所列餐食（飞机餐是否收费请参照航空公司规定）6早，4正餐</p><p><span></span>用餐时间在飞机或船上以机船餐为准，不再另补，如因自身原因放弃用餐， 则餐费不退。</p></div></div><div><span>导游服务</span><div><p><span></span>领队和当地中文导游服务</p></div></div></section></div></div></section></h3><h2>费用不含</h2><h3><section><div><div data=\"[object Object]\"><section><div><div><p><span></span>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</p><p><span></span>出入境个人物品海关征税，超重行李的托运费、保管费</p><p><span></span>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</p><p><span></span>一切个人消费及费用包含中未提及的任何费用</p></div></div><div><span>服务费/小费</span><div><p><span></span>此商品不包含导游服务费1000人民币元/人，需与团费一起支付</p></div></div><div><span>其他</span><div><p><span></span>所有团期费用不含司导服务费1000-1500元/人，具体咨询客服以团期对应价格为准；非直飞城市的团费价格不包含该城市到直飞城市的往返联运机票费，不同城市联运价格不同，具体详询客服。</p></div></div></section></div></div></section></h3><h2>儿童政策</h2><h3><section><div><div data=\"[object Object]\"><section><div><div><p><span></span>儿童团费含往返大交通、目的地旅游车车位、半价正餐、导服，其他费用不含若产生敬请自理。</p></div></div></section></div></div></section></h3><h2>自费项目</h2><h3><section><div><div data=\"[object Object]\"><section><table><thead><tr><th>活动</th><th>说明</th><th>停留时间</th><th>参考价格</th></tr></thead><tbody><tr><td>迪拜</td><td>沙漠冲沙</td><td>60分钟</td><td>90USD</td></tr><tr><td>迪拜</td><td>登125层迪拜塔</td><td>30分钟</td><td>90USD</td></tr><tr><td>迪拜</td><td>水舞秀</td><td>60分钟</td><td>135USD</td></tr></tbody></table><section>自费项目不强制购买，客人应本着\"自愿自费\"的原则酌情参加。</section></section></div></div></section></h3><h2>&nbsp;购买须知</h2><h2>服务信息</h2><h3><section><a id=\"target_purchase\"></a><div><section><div><p>支付完成后商家最晚会在4个工作小时内（9:00-18:00）确认是否预定成功</p><p>超时未确认系统将自动退款，预计1-7个工作日退还到支付账户</p><p>本商品提供出团通知书/确认单，商家最晚在出行日期前1天发送，如未收到请及时与商家联系</p></div></section></div></section></h3></div>', '2023-09-04 21:05:15'),
(6, 13, '甘肃青海西北大环线8天7晚跟团游', '全程舒适酒店+莫高窟B票+鸣沙山月牙泉+翡翠湖+茶卡盐湖+祁连草原+青海湖二郎剑+塔尔寺', 4420, 86, '1693833549502623.png', '<div data=\"[object Object]\"><section><h2>费用包含</h2><div>景点门票<div><p>行程中所列景点首道大门票</p></div></div><div>大交通<div><p>飞机往返经济舱机票</p><p>燃油附加费（以实际收费标准为准，如遇政府或航空公司政策性调整燃油税费，在未出票的情况下将进行多退少补）</p><p>机场建设费</p><p>1、为节省您的出行成本，产品展示的价格为系统默认的低价机票组合，多为夜航、经停或廉价航空，若为廉价航空不含托运，需自理。可升级航班！机票一经预定不退改签！若因客人原因导致机票姓名与证件不符产生损失将由客人自行承担；如出票前遇航空公司临时调价，我社有权调整价格，客人自行补差价。如遇航空公司临时取消航班，我社会通知您更换临近的班期，客人自行补差价，敬请谅解！ 2、航班时间仅供参考，具体以实际出票为准。</p></div></div><div>当地交通<div><p>根据参团人数调派车型，保证一人一正座</p></div></div><div>住宿<div><p>行程所列酒店7晚住宿费用，标准2人间</p><p>1、【兰州参考酒店】贝舒酒店/华茂酒店/飞天空港/星程酒店/瑞岭雅苑/润东酒店/华纳精选/尚客优悦/希曼酒店/格林 豪泰/遇见悦酒店/曼哈顿酒店/奥莱阳光或同级别</p><p>2、【张掖参考酒店】喜来顺酒店/隆盛假日/临松酒店/崇文酒店/中祁酒店/凯利酒店/盛华文华酒店（丹霞景区）/丹霞 彩虹湾/宏鼎商务宾馆（丹霞）/多彩酒店（丹霞景区）或同级</p><p>3、【敦煌参考酒店】敦煌慕礼酒店/桓宇酒店/安和大酒店/飞天大酒店 /石油大厦/茉雅庄/兰新 /嘉锦/玺迎 缘/玺迎客/滨河国际酒店/新泰大酒店/天河湾酒店/丽都国际大酒店/华荣大酒店/天宇大酒店或同级别</p><p>4、【大柴旦或德令哈参考酒店】大柴旦：杞园驿站/黎明假日酒店/大柴旦华庭商务/大柴旦聚鑫商务/慕山丽璟假日宾馆/ 万和馨悦/红崖酒店/天成大酒店/首兴商务宾馆/大柴旦高原蓝或同级；德令哈：星空之城酒店/东方凯悦酒店/星程酒店/勇岩大酒店/洲龙大酒店/德都大酒店/德勒大酒 店/新堉山庄或同级</p><p>5、【青海湖或黑马河参考酒店】嫦娥酒店/格日酒店/龙马避暑山庄/格桑梅朵酒店/青海湖甲乙赛/天湖大酒店/青海湖西海酒店/ 湖缘金湖酒店/西海酒店/旺湖酒店或同级</p><p>6、【兰州参考酒店】天银宾馆/华辰宾馆/新德丽宾馆/花园美居/兰州三新怡家/庆阳大厦/兰州虹云宾馆/兰 州星美/兰州河湾丽景酒店/兰州盛合苑酒店/星程（西客站店）/中林宾馆或同级</p></div></div><div>餐食<div><p>行程中所列餐食（飞机餐是否收费请参照航空公司规定）7早，6正餐</p></div></div><div>导游服务<div><p>当地中文导游服务</p></div></div><div>其他<div><p>境内旅游意外险</p><p>赠送:沙漠项目（沙漠越野车+沙漠海盗船+滑沙）+牧场项目（民族服饰拍照+射箭+民族锅庄+藏獒拍照+挤牛奶+做酸奶）+《秘境敦煌》演出+每人一条丝巾+每人每天1瓶水（赠送项目不用不退费）</p></div></div></section></div><div data=\"[object Object]\"><section><h2>费用不含</h2><div><div><p>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</p><p>出入境个人物品海关征税，超重行李的托运费、保管费</p><p>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</p><p>一切个人消费及费用包含中未提及的任何费用</p></div></div><div>其他<div><p>景区小交通不含（具体以景区收费为准）</p></div></div></section></div><div data=\"[object Object]\"><section><h2>儿童政策</h2><div><div><p>年龄2-12周岁（不含），不占床含餐</p></div></div></section></div>', '2023-09-04 21:19:09'),
(7, 13, '贵州贵阳荔波安顺5天4晚跟团游', '可加梵净山+温泉酒店苗景客栈+小七孔+西江千户苗寨+黄果树瀑布+贵州古镇+专职老司机带路', 1800, 92, '1693833616150486.jpeg', '<section><div><div data=\"[object Object]\"><section><h2>费用包含</h2><div>景点门票<div><p>行程中所列景点首道大门票</p></div></div><div>大交通<div><p>火车往返二等座</p><p>飞机往返经济舱机票</p><p>燃油附加费（以实际收费标准为准，如遇政府或航空公司政策性调整燃油税费，在未出票的情况下将进行多退少补）</p><p>机场建设费</p></div></div><div>当地交通<div><p>根据参团人数调派车型，保证一人一正座</p></div></div><div>住宿<div><p>行程所列酒店4晚住宿费用，标准2人间</p><p>酒店如遇客观原因，我社有权调整安排同等级酒店，不降低标准</p></div></div><div>餐食<div><p>行程中所列餐食（飞机餐是否收费请参照航空公司规定）4早，4正餐</p><p>含4早餐4正餐，正餐30元/人，十人一围，十菜一汤。 特色餐：西江苗家长桌宴 酒店房费含早餐，自愿放弃早餐不退费用</p></div></div><div>导游服务<div><p>当地中文导游服务</p></div></div></section></div><div data=\"[object Object]\"><section><h2>费用不含</h2><div><div><p>因交通延阻、罢工、天气、飞机、机器故障、航班取消或更改时间等不可抗力原因所导致的额外费用</p><p>酒店内洗衣、理发、电话、传真、收费电视、饮品、烟酒等个人消费</p><p>一切个人消费及费用包含中未提及的任何费用</p></div></div></section></div><div data=\"[object Object]\"><section><h2>儿童政策</h2><div><div><p>年龄3-14周岁（不含），不占床不含餐</p></div></div></section></div><div data=\"[object Object]\"></div></div></section><section><a id=\"target_purchase\"></a><h2>&nbsp;购买须知</h2><div><section><h2>服务信息</h2><div><p>支付完成后商家最晚会在9个工作小时内（9:00-18:00）确认是否预定成功</p><p>超时未确认系统将自动退款，预计1-7个工作日退还到支付账户</p><p>本商品提供出团通知书/确认单，商家最晚在出行日期前1天发送，如未收到请及时与商家联系</p></div></section></div></section>', '2023-09-04 21:20:16');