/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : psyweb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-06 17:35:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for menu_items
-- ----------------------------
#DROP TABLE IF EXISTS `menu_items`;


-- ----------------------------
-- Records of menu_items
-- ----------------------------
INSERT INTO `menu_items` VALUES ('1', '小小白', null, 'http://127.0.0.2/cat/1', null, '1', '2018-04-06 14:20:42', '2018-04-06 14:36:35', '2018-04-06 14:36:35');
INSERT INTO `menu_items` VALUES ('2', '首页', '0', 'http://127.0.0.2', null, '1', '2018-04-06 14:20:51', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('3', '大学成长', '1', 'http://127.0.0.2/cat/2', null, '1', '2018-04-06 14:20:58', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('4', '学习心理', '0', 'http://127.0.0.2/cat/3', '3', '1', '2018-04-06 14:20:59', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('5', '恋爱心理', '1', 'http://127.0.0.2/cat/4', '3', '1', '2018-04-06 14:20:59', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('6', '校园社交', '2', 'http://127.0.0.2/cat/5', null, '1', '2018-04-06 14:21:55', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('7', '舍友关系', '0', 'http://127.0.0.2/cat/6', '6', '1', '2018-04-06 14:21:56', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('8', '同学关系', '1', 'http://127.0.0.2/cat/7', '6', '1', '2018-04-06 14:21:57', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('9', '师生关系', '3', 'http://127.0.0.2/cat/8', '6', '1', '2018-04-06 14:21:58', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('10', '每日心理学', '3', 'http://127.0.0.2/cat/9', null, '1', '2018-04-06 14:22:03', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('11', '心理测评', '0', 'http://127.0.0.2/cat/10', '10', '1', '2018-04-06 14:22:04', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('12', '心理指导', '1', 'http://127.0.0.2/cat/11', '10', '1', '2018-04-06 14:22:05', '2018-04-06 14:36:35', null);
INSERT INTO `menu_items` VALUES ('13', '心灵鸡汤', '4', 'http://127.0.0.2/cat/12', null, '1', '2018-04-06 14:22:06', '2018-04-06 14:40:20', null);
INSERT INTO `menu_items` VALUES ('14', '小小白', null, 'http://127.0.0.2/cat/1', null, '1', '2018-04-06 14:25:02', '2018-04-06 14:36:35', '2018-04-06 14:36:35');


/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : psyweb

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-04-06 17:52:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for banner_items
-- ----------------------------
DROP TABLE IF EXISTS `banner_items`;
CREATE TABLE `banner_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '图片',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '跳转链接',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `banner_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `word` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banner_items_banner_id_foreign` (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of banner_items
-- ----------------------------
INSERT INTO `banner_items` VALUES ('1', 'http://127.0.0.2/uploads/lp.jpg', null, null, '1', '2018-04-06 17:13:21', '2018-04-06 17:13:21', null, null);
INSERT INTO `banner_items` VALUES ('2', 'http://127.0.0.2/uploads/rBACE1PCcx7hhDPnAAMoRClvDvc721.jpg', null, null, '1', '2018-04-06 17:13:34', '2018-04-06 17:13:34', null, null);
INSERT INTO `banner_items` VALUES ('3', 'http://127.0.0.2/uploads/learn.jpg', null, null, '1', '2018-04-06 17:19:30', '2018-04-06 17:19:30', null, null);
INSERT INTO `banner_items` VALUES ('4', 'http://127.0.0.2/uploads/50219257341399599081.jpg', null, null, '1', '2018-04-06 17:19:36', '2018-04-06 17:19:36', null, null);

--
-- 转存表中的数据 `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `image`, `image2`, `brief`, `type`, `more`, `content`, `view`, `sort`, `seo_title`, `seo_des`, `seo_keyword`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '小小白', 'xiao-xiao-bai', '', '', '', 'post', NULL, NULL, 2, 0, '', '', '', 0, '2018-04-06 09:56:18', '2018-04-06 10:49:14', NULL),
(2, '大学生应该树立正确的恋爱价值观', 'da-xue-sheng-ying-gai-shu-li-zheng-que-de-lian-ai-jia-zhi-guan', '', '', '一、要正确对待恋爱。\r\n&nbsp; &nbsp; &nbsp;正确处理好恋爱、学业、事业三者之间的关系。恋爱是人生的一件大事，但并不是人生的全部。大学生应该以学业为重，因为学习是大学', 'LovePsychogy', NULL, '<p><strong>一、要正确对待恋爱。</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp;正确处理好恋爱、学业、事业三者之间的关系。恋爱是人生的一件大事，但并不是人生的全部。大学生应该以学业为重，因为学习是大学生的主要目的。事业高于爱情，主张事业为主，不宜过早地恋爱。但也不要认为爱情是事业的绊脚石，处理得好的话，爱情也能对事业起到催化作用。</p>\r\n<p><strong>二、要培养爱的能力，其爱的能力包括以下几种：</strong></p>\r\n<p>（1）迎接爱的能力。</p>\r\n<p>&nbsp; &nbsp; &nbsp; 如果一个人心中有了爱就要敢于用正确的方式表达；如果面对别人的示爱时要能够取舍，并及时做出接受或拒绝的选择。能够承受求爱拒绝或拒绝求爱的心理困扰。</p>\r\n<p>（2）拒绝爱的能力。</p>\r\n<p>&nbsp; &nbsp; &nbsp; 对于自己不愿意接受或认为不值得接受的爱情应有勇气拒绝。拒绝时应注意两点：一、如果不希望爱情到来，拒绝的语气要果断坚决，容不得半点优柔寡断，否则对对方造成的将是更大的伤害。二、要掌握恰当的方式。要掌握说话的方式和度。虽然每个人都有拒绝爱的权力，但是也要做到对别人起码的尊重。</p>\r\n<p>&nbsp; &nbsp; &nbsp; 对大学生来说，如果在大学时代与爱情相逢，那就应用心阿护，倍加珍惜。处理好恋爱中的各种关系，是对爱情的祝福，也是对自己的祝福，更是对未来人生幸福的祝福。</p>\r\n<p>&nbsp; &nbsp; &nbsp; 恋爱是未来寻找志同道合、白头偕老的终身伴侣，而不是为了安慰解闷，寻找刺激，更不是单纯为了性的满足。恋爱对象的选择是一个复杂的过程，不能忽视了经济、政治、文化、个性等因素，但是共同的理想的指向、共同的品德和情操是最根本的。恋爱动机的好坏，直接关系的恋爱的成功与否。大学生作为新时代的桥梁，其恋爱观应该是理想、道德、事业和性爱的有机结合。</p>', 2, 0, '', '', '', 0, '2018-04-06 10:41:25', '2018-04-06 10:44:09', '2018-04-06 10:44:09'),
(3, '大学生应该树立正确的恋爱价值观', 'da-xue-sheng-ying-gai-shu-li-zheng-que-de-lian-ai-jia-zhi-guan', 'http://127.0.0.2/uploads/20130604080839314.jpg', '', '一、要正确对待恋爱。\r\n正确处理好恋爱、学业、事业三者之间的关系。恋爱是人生的一件大事，但并不是人生的全部。大学生应该以学业为重，因为学习是大学生的主要目的。事业高于爱情，主张事业为主', 'LovePsychogy', NULL, '<p><strong>一、要正确对待恋爱。</strong></p>\r\n<p>正确处理好恋爱、学业、事业三者之间的关系。恋爱是人生的一件大事，但并不是人生的全部。大学生应该以学业为重，因为学习是大学生的主要目的。事业高于爱情，主张事业为主，不宜过早地恋爱。但也不要认为爱情是事业的绊脚石，处理得好的话，爱情也能对事业起到催化作用。</p>\r\n<p><strong>二、要培养爱的能力。其爱的能力包括以下几种：</strong></p>\r\n<p>（1）迎接爱的能力。</p>\r\n<p>如果一个人心中有了爱就要敢于用正确的方式表达；如果面对别人的示爱时要能够取舍，并及时做出接受或拒绝的选择。能够承受求爱拒绝或拒绝求爱的心理困扰。</p>\r\n<p>（2）拒绝爱的能力。</p>\r\n<p>对于自己不愿意接受或认为不值得接受的爱情应有勇气拒绝。拒绝时应注意两点：一、如果不希望爱情到来，拒绝的语气要果断坚决，容不得半点优柔寡断，否则对对方造成的将是更大的伤害。二、要掌握恰当的方式。要掌握说话的方式和度。虽然每个人都有拒绝爱的权力，但是也要做到对别人起码的尊重。</p>\r\n<p>对大学生来说，如果在大学时代与爱情相逢，那就应用心阿护，倍加珍惜。处理好恋爱中的各种关系，是对爱情的祝福，也是对自己的祝福，更是对未来人生幸福的祝福。</p>\r\n<p>恋爱是未来寻找志同道合、白头偕老的终身伴侣，而不是为了安慰解闷，寻找刺激，更不是单纯为了性的满足。恋爱对象的选择是一个复杂的过程，不能忽视了经济、政治、文化、个性等因素，但是共同的理想的指向、共同的品德和情操是最根本的。恋爱动机的好坏，直接关系的恋爱的成功与否。大学生作为新时代的桥梁，其恋爱观应该是理想、道德、事业和性爱的有机结合。</p>', 1, 0, '', '', '', 1, '2018-04-06 10:48:09', '2018-04-06 11:03:32', '2018-04-06 11:03:32'),
(4, '最美的时光，我们要读书', 'LearningBook', 'http://127.0.0.2/uploads/130917004023314.jpg', '', '     读大学，读什么书？作为学生', 'post', NULL, '<p>&nbsp; &nbsp; &nbsp;读大学，读什么书？作为学生，当然首先得读专业书，但这绝不意味着满足于仅仅读教材。教材，读其中一本有代表性的，也就够了，因为目前的绝大多数教材都是东拼西凑之作，乏善可陈。</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;读什么？读本专业的名家名著，读原版的名著，特别是非专业的跨学科的古今中外的经典著作。初读，也许味同嚼蜡；读不懂，没有关系，因为有些经典注定是让大多数人读不懂的。从囫囵吞枣到一知半解，从不懂到读懂，乃至读透，乃是一个循环往复、甘苦与共、苦尽甘来的复杂过程，一言难尽。&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;读书，除了汲取知识、学养，更重要的是从中发现问题。带着问题，再去读书，用比较的视角，用批判性的思维，尝试着提出问题、解决问题，这就是研究性地读书。读书读到一定程度，自然就会养成一种学术的判断力，从而才有可能融会贯通，有所发现，进而推陈出新。在这一过程中，不仅要把知识内化为修养，而且还要把知识转化为智慧，从而为做一个&ldquo;有尊严的知识人&rdquo;（余英时教授语），奠定扎扎实实的理论、学术和知识上的坚实基础。&nbsp;</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;在大学里，分数的意义已经不再像在中学里那样是学生的&ldquo;命根子&rdquo;了。为分数而学习的大学生，一定是舍弃了博览群书的取向、自由探索的过程，基本上是围绕着教材、讲义或者教室打转转。这样，与其说是读大学，不如说是读高四、高五、高六、高七。尤其在综合性大学还不会读书的话，大学算是白读了。</p>\r\n<p>&nbsp; &nbsp; 人的一生约略可以划分为3个大的时段：一是30岁之前，二是30～60岁之间，三是60岁之后。从&ldquo;90后&rdquo;新生代的可预期前景看，这3个时段应该各有侧重：第一个时段，只要条件允许，应该一鼓作气读完高级学位（至少是名牌大学的硕士学位，最好是拿下博士学位），同时再娶（嫁）一个可以托付一生的另一半。第二个时段，只要身心健康，应该是绝大多数人做事的最好时光，也是成就事业的黄金年华；至于60岁之后，应该是以享受人生为主。不管怎么说，每个人的情况或许有所不同，但大学4年绝对是前提中的前提、基础中的基础。所以，大学生活的质量直接或间接影响着一生的幸福指数。&nbsp;</p>\r\n<p><img src="http://127.0.0.2/uploads/130917004023314.jpg?1523012325311" alt="130917004023314" /></p>', 4, 0, NULL, NULL, NULL, 1, '2018-04-06 10:58:53', '2018-04-06 11:49:33', NULL),
(7, '大学生应该树立正确的恋爱价值观', 'LoveValue', 'http://127.0.0.2/uploads/20130604080839314.jpg', '', '第一、爱情是一个过程', 'post', NULL, '<p><img src="http://127.0.0.2/uploads/20130604080839314.jpg?1523014818350" alt="20130604080839314" /></p>\r\n<p><strong>第一、爱情是一个过程</strong></p>\r\n<p>　　在这个过程里双方要充分发挥人性里面美好的一面，相互尊重，理解，宽容，支持，信任等等。无论什么样的爱情都离不开这个过程。没有这些爱情就是一句空话。爱情需要一定的基础，爱情发展将会得到升华，爱情的结局将是一段美好的故事和传说。真正的爱情，是在能爱的时候，懂得去珍惜，真正的爱情，是在无法爱的时候，懂得去放手，因为放手才是拥有一切。爱需要对方相互去付出。</p>\r\n<p><strong>第二、爱情是发自内心的付出</strong></p>\r\n<p>　　真正的爱不是用言语可以表达的，是发自内心的，你的整颗心都会被你爱的人所吸引，为她着迷，为她牵挂，但愿每一分钟都可以见到他，见不到的时候时时刻刻都会想着他，见到的时候你会兴奋，心跳加快，在一起的时候你会感觉很温暖很安全，真正的爱你会心甘情愿的照顾他关怀他，给与她想要的一切，看着你爱的人开心你也会跟着开心，看到他烦恼你也会跟着烦恼，但你会想尽一切办法使你爱的人开心快乐，真正的爱你会想和她共同到老，与他相濡以沫，你会期待用你的全部爱心来带给他最大的幸福，而你也在这种过程中得到了另一种幸福！</p>', 1, 0, NULL, NULL, NULL, 1, '2018-04-06 11:42:58', '2018-04-06 11:46:45', NULL),
(5, '有一种爱，叫做舍友情', 'you-yi-zhong-ai-jiao-zuo-she-you-qing', '', '', '&nbsp; &nbsp; &nbsp;\r\n&nbs', 'post', NULL, '<p>&nbsp; &nbsp; &nbsp;<img src="http://127.0.0.2/uploads/121223161620151.jpg?1523013224524" alt="121223161620151" /></p>\r\n<p>&nbsp; &nbsp; &nbsp; 从不认识，到认识，到相知......<br /><br />　　在我难过的时候，我会想时间会冲刷一切，一直以来，我都是这样让自己保持乐观的。<br /><br />　　直到我知道什么叫失去，什么叫不可挽回。我才不再这样安慰自己，不再那么乐观。<br /><br />　　今天舍友生日，我们帮她庆祝。很温馨。不用许多祝福的言语。她许了愿望，她说：你们也一起许愿吧。我们都说好啊。其实我没有许愿，她们十指合拢，闭上眼睛，都在那里许愿，我只是看着。我装装样子，因为我不想让她们看到我还没有真正的快乐起来。<br /><br />　　我不开心的时候，她们跟着我不开心。我哭的时候，我叫她们别来安慰我，我说你们越安慰我会越哭的。所以，她们只是悄悄的看着。我也很努力的让自己重新快乐起来。<br /><br />　　有时候，爱不用言语，用心就能体会到关爱。<br /><br />　　走到一起是一种缘分，几年的大学生活让我们学会了同甘共苦。一起玩，一起吃，一起睡，一起学习，有时候还吵架。一起讨论问题，一起讨论生活，讨论感情，讨论以后的就业，就这样，我们成为了一个小集体。<br /><br />　　互相学习，互相关心，似乎已经升华成为一种亲情。每个人心中都有一道伤，只要轻轻的一碰，就会很痛。可是几个姐妹在一起，都彼此知道那一道伤，没有人会去提起，因为我们都知道会痛，只是默默的支持着对方，似乎已经协议好的，彼此都知道"无论怎样，我们都一起陪你度过"。<br /><br />　　有一种爱，叫做舍友情。从不认识，到认识，到相知......可能过不了多久，会各奔东西。生活在这样一个小集体里，感觉很温暖，没有什么压力，没有竞争，没有勾心斗角，所以说，学生时代是幸福的。</p>', 1, 0, '', '', '', 1, '2018-04-06 11:14:00', '2018-04-06 11:14:45', '2018-04-06 11:14:45'),
(6, '有一种爱，叫做舍友情', 'roommate', 'http://127.0.0.2/uploads/121223161620151.jpg', '', '     \r\n&nbs', 'post', NULL, '<p>&nbsp; &nbsp; &nbsp;<img src="http://127.0.0.2/uploads/121223161620151.jpg?1523013380039" alt="121223161620151" /></p>\r\n<p>&nbsp; &nbsp; &nbsp; 从不认识，到认识，到相知......<br />　　在我难过的时候，我会想时间会冲刷一切，一直以来，我都是这样让自己保持乐观的。<br />　　直到我知道什么叫失去，什么叫不可挽回。我才不再这样安慰自己，不再那么乐观。<br />　　今天舍友生日，我们帮她庆祝。很温馨。不用许多祝福的言语。她许了愿望，她说：你们也一起许愿吧。我们都说好啊。其实我没有许愿，她们十指合拢，闭上眼睛，都在那里许愿，我只是看着。我装装样子，因为我不想让她们看到我还没有真正的快乐起来。<br />　　我不开心的时候，她们跟着我不开心。我哭的时候，我叫她们别来安慰我，我说你们越安慰我会越哭的。所以，她们只是悄悄的看着。我也很努力的让自己重新快乐起来。<br />　　有时候，爱不用言语，用心就能体会到关爱。<br />　　走到一起是一种缘分，几年的大学生活让我们学会了同甘共苦。一起玩，一起吃，一起睡，一起学习，有时候还吵架。一起讨论问题，一起讨论生活，讨论感情，讨论以后的就业，就这样，我们成为了一个小集体。<br />　　互相学习，互相关心，似乎已经升华成为一种亲情。每个人心中都有一道伤，只要轻轻的一碰，就会很痛。可是几个姐妹在一起，都彼此知道那一道伤，没有人会去提起，因为我们都知道会痛，只是默默的支持着对方，似乎已经协议好的，彼此都知道"无论怎样，我们都一起陪你度过"。<br />　　有一种爱，叫做舍友情。从不认识，到认识，到相知......可能过不了多久，会各奔东西。生活在这样一个小集体里，感觉很温暖，没有什么压力，没有竞争，没有勾心斗角，所以说，学生时代是幸福的。</p>', 2, 0, NULL, NULL, NULL, 1, '2018-04-06 11:16:44', '2018-04-06 13:06:26', NULL),
(8, '测试你在什么时候最容易紧张', 'HeartTest', 'http://127.0.0.2/uploads/mp25925706_1438769900111_1.jpg', '', '很多人都想要更多的了解自己的性格，或面对一些事情的心理，那么如何知道自己什么时候紧张呢？来测试下吧。', 'post', NULL, '<p>每个人都容易紧张但是每个人紧张的时候不是一样的，那么你在什么时候最容易紧张呢，想知道你自己在什么时候最容易紧张的人可以来看看小编今天带来的测试题吧。</p>\r\n<p>和喜欢、讨厌一样，紧张也是一种人天性中的情绪，无论你再怎么掩饰，至少你自己知道自己在紧张不是吗？再见惯了场面的人，恐怕也会有那么些个不淡定的时刻，你在什么时候容易紧张呢？</p>\r\n<p>　　1、你很容易发火，但是很快就可以平静下来？</p>\r\n<p>　　不是－3　　是的－2</p>\r\n<p>　　2、愤怒的时候会口不择言？</p>\r\n<p>　　不是－4　　是的－3</p>\r\n<p>　　3、有的时候却表现出相当能忍耐？</p>\r\n<p>　　不是－5　　是的－4</p>\r\n<p>　　4、讨厌繁琐无聊的工作，没办法集中精力？</p>\r\n<p>　　不是－6　　是的－5</p>\r\n<p>　　5、总是很疲惫？</p>\r\n<p>　　不是－7　　是的－6</p>\r\n<p>&nbsp; &nbsp; &nbsp; 6、经常担心还没有发生的事？</p>\r\n<p>　　不是－8　　是的－7</p>\r\n<p>　　7、不擅长数理逻辑，不喜欢玩数字游戏？</p>\r\n<p>　　不是－9　　是的－8</p>\r\n<p>　　8、总是觉得自己说错了话，但说话的时候总忘记考虑再三？</p>\r\n<p>　　不是－10　　是的－9</p>\r\n<p>　　9、在外面衣着光鲜，家里一团糟？</p>\r\n<p>　　不是－B　　是的－A</p>\r\n<p>　　10、任何时候，都在观察别人的情绪和细微的变化？</p>\r\n<p>　　不是－D　　是的－C</p>\r\n<p><strong>测试结果：</strong></p>\r\n<p><strong>　　A、对方气场比你强大</strong></p>\r\n<p>　　你是典型的心理素质不好，在对方气场比你强大的时候，你就容易紧张和不安，这个时候你本来准备好的腹稿也都统统消失，大脑一片空白，只知道顺着别人的意思说</p>\r\n<p>　<strong>　B、失职失误</strong></p>\r\n<p>　　典型的过度忧虑，你是个很怕别人质疑你能力和水平的人，所以一旦你在工作上出现什么纰漏，你就会非常的不好意思，生怕别人因此看不起你，更怕自己就此被全盘否定</p>\r\n<p><strong>　　C、喜欢的人面前</strong></p>\r\n<p>不管你在工作上把自己锻炼的多么的老练和圆滑，还是没有办法去克服你的害羞和不自信，你在喜欢的人面前总是这样，害怕自己不够好害怕自己不够完美，却又觉得自己凭什么要这样紧张</p>\r\n<p><strong>　　D、很少有这种情况</strong>&nbsp;</p>\r\n<p>　　你一般不会紧张，因为你更多的时候都在关心自己的情绪、表现和观点，很少去揣摩别人的心思，这对你来说是一件好事，这样你能保留更多的个性和想法，也不会受到别人很多负面的影响。</p>', 2, 0, NULL, NULL, NULL, 1, '2018-04-06 12:21:04', '2018-04-06 13:05:30', NULL),
(9, '与同学交往的正确方式', 'ClassmateAssociation', 'http://127.0.0.2/uploads/6309333.jpg', '', '五个方面同学们在建立良好的人际关系时应该注意和借鉴。　　一、要热情而谨慎交往。人际关系是互动的，不要总是消极地', 'post', NULL, '<pre id="best-content-1681333203" class="best-text mb-10">五个方面同学们在建立良好的人际关系时应该注意和借鉴。<br />　　一、要热情而谨慎交往。人际关系是互动的，不要总是消极地等待别人来主动关心自己，而要主动地与周围的同学交往沟通。开放自我是有感染性的，你对别人开放，别人也会对你开放。当对方走出故步自封、自我封闭的死圈子的时候，你不仅会对对方有更深一层地认识，更重要的是对自己也会有新的认识和体验。同学们通常会为了鸡毛蒜皮的事而产生矛盾，甚至不惜拳脚相向。如果我们能冷静下来，多设身处地为别人着想，多一些宽容，多一分理解，事情不是更容易解决了吗？同时要谨慎交友。我们在成长过程中除了老师家长的教诲，影响最大的莫过于朋友，许多青少年最终走上邪路，往往就是因为他们结交了坏朋友。这种教训极其深刻，所以我们在交朋友的时候必须慎之又慎。交品德高尚的朋友，交志同道合的朋友。<br />　　二、要理解尊重。每个人都有自己的气质和性格特点，不同的成长背景和生活习惯，所以在与同学交往的过程中，如果能互相理解尊重，大家的关系就容易融洽，也会减少不必要的摩擦。<br />　　三、要以诚相待。人与人的交往，最重要的就是真诚和善意，这也是做人的根本原则。口是心非，虚伪傲慢的人是难以有朋友的。<br />　　四、要宽容谅解。俗话说：&ldquo;人无完人,金无足赤。&rdquo;我们周围的同学（包括自己）都还处于成长的阶段，处理问题常会有很多不妥之处，在许多问题上同学间也会有不同的见解，这就要求我们换位思考，能够从对方的角度考虑问题，相互谅解，就不会导致敌意。<br />　　五、消除依赖感。在人际交往中还有一种不健康的心态，就是依赖感过强的人，总是希望别人像父母兄姐一样关心自己，凡事都要别人替自己拿主意，这是缺乏独立意识的表现。过强的依赖感还会发展成为控制欲，他们强求别人和自己一起学习，一起复习功课，向自己通报行动计划，甚至限制别人同其他同学的交往。这是一种人格缺陷，应及时加以纠正。<br />　　当然，这五方面是具有普遍性的适合于大众化的情况，所谓一把钥匙开一把锁，这就需要我们中学生从自身实际出发，具体的来处理与周围人的关系，力争使自己处于融洽和谐的人际环境中，从而更好的学习、生活。<br /><img src="http://127.0.0.2/uploads/6309333.jpg?1523017986277" alt="6309333" /></pre>', 1, 0, NULL, NULL, NULL, 1, '2018-04-06 12:35:09', '2018-04-06 12:36:10', NULL),
(10, '自我测试 让你更懂你自己', 'MyselfTest', 'http://127.0.0.2/uploads/mt1.jpg', '', '谁能真正看清自己了解自己呢？认识自己才能真正把握自己，才能在此基础上有突破。今天小编就为大家介绍一种认识自己的自测方法！', 'PsychologyTest', NULL, '<p>请拿出一张纸一支笔把你的答案写下来，结论就在后面。</p>\r\n<p>　<strong>　场景：</strong></p>\r\n<p>　　1、你在森林的深处，你向前走，看见前面有一座很旧的小屋。</p>\r\n<p>　　(1)这个小屋的门现在是什么状态?(开着/关着)</p>\r\n<p>　　(2)你走进屋子里看见一张桌子这个桌子是什么形状的?(圆形/椭圆形/正方形/长方形/三角形)</p>\r\n<p>　　(3)在桌子上有个花瓶，瓶子里有水，有多少水在花瓶里?(满的/一半/空的)</p>\r\n<p>　　(4)这个瓶子是由什么材料制造的?(玻璃/陶瓷/泥土/金属/塑料/木头)</p>\r\n<p>　　(5)你走出屋子，继续向森林深处前进，你看见远处有瀑布飞流直下，请问水流的速度是多少?(你可以从0&mdash;10任意选一个)</p>\r\n<p>　　(6)过了一会，你走过瀑布，你站在坚硬的地面上，你看见地上有金光闪烁，你弯腰拾起来，是一个带着钥匙的钥匙链。有多少把钥匙拴在上面，你可以任意选一个数字(从1到10)</p>\r\n<p>　　(7)你继续向前走，试着找出一条路来，突然你发现眼前有一座城堡。这个城堡是什么样的?(旧的/新的)</p>\r\n<p>　　(8)你走进城堡，看见一个游泳池，黑暗的水面上飘浮着很多闪闪发光的宝石，你会捡起这些宝石吗?(是/不)</p>\r\n<p>　　(9)在这个黑暗的游泳池旁边还有一座游泳池。清澈的水面上飘浮着很多枚钱币。你会捡起这些钱币吗?(是/不)</p>\r\n<p>　　(10)你走到城堡的尽头有一个出口，你继续向前走走出了城堡。在城堡外面，你看见一座大花园，你看见地面上有一个箱子。这个箱子是多大尺寸的?(小/中/大)</p>\r\n<p>　　(11)这个箱子是什么材料做的?(硬纸板/纸/木头/金属)</p>\r\n<p>　　(12)花园里还有一座桥就在离着箱子的不远处。桥是什么材料建造的?(金属/木头/藤条)</p>\r\n<p>　　(13)走过这座桥，有一匹马。马是什么颜色的?(白色/灰色/褐色/黑色)</p>\r\n<p>　　(14)马正在做什么?(安静地站着/吃草/在附近奔跑)</p>\r\n<p>　　(15)哦，不!离马很近的地方突然刮起了一阵龙卷风。你有三种选择。A、跑过去藏在箱子里?B、跑过去藏在桥底下?C、跑过去骑马离开?</p>\r\n<p>　　<strong>好了，下面这就是我们的结论：</strong></p>\r\n<p><strong>　　(1)门：</strong></p>\r\n<p>　　门如果是开着的：说明你是一个任何事都愿与别人分享的人</p>\r\n<p>　　门如果是关着的：说明你是一个任何事都愿一个人去做的人</p>\r\n<p><strong>　　(2)桌子的形状：</strong></p>\r\n<p>　　圆形/椭圆形：&mdash;总有一些朋友陪伴着你，你完全地信任并接受他们。</p>\r\n<p>　　正方形/长方形：&mdash;你在交朋友的时候有点挑剔，你只是和那些你认为比较熟悉的朋友有一些来往。</p>\r\n<p>　　三角形：&mdash;在对待朋友的问题上，你是一个真正的非常吹毛求疵的人，所以你的生活里没有许多朋友。</p>\r\n<p><strong>　　(3)瓶子里的水：</strong></p>\r\n<p>　　空的：你目前的生活很不满意。</p>\r\n<p>　　一半：你的生活只有一半达到你的理想。</p>\r\n<p>　　满的：你对目前的生活非常满意。</p>\r\n<p><strong>　　(4)瓶子的质地：</strong></p>\r\n<p>　　玻璃/泥土/陶瓷：在生活里你是一个脆弱而需要得到照顾的人。</p>\r\n<p>　　金属/塑料/木头：你在生活里是一个强者。</p>\r\n<p><strong>　　(5)水流速度：</strong></p>\r\n<p>　　0：你根本没有性欲</p>\r\n<p>　　1&mdash;4：你的性欲很低</p>\r\n<p>　　5：中等水平的性欲</p>\r\n<p>　　6&mdash;9：很强的性欲</p>\r\n<p>　　10：哇噻！你有超强的性欲，生活里没有性根本不行。</p>\r\n<p><strong>　　(6)钥匙：</strong></p>\r\n<p>　　1：生活中你只有一个好朋友。</p>\r\n<p>　　2&mdash;5：生活中你有一些好朋友。</p>\r\n<p>　　6&mdash;10：生活中你有许多好朋友。</p>\r\n<p><strong>　　(7)城堡：</strong></p>\r\n<p>　　旧的：显示你在过去的交往中有一段不好的和不值得纪念的关系。</p>\r\n<p>　　新的：显示你在过去的交往中有一段很好的交往现在仍然鲜活的驻留在你心里。</p>\r\n<p><strong>　　(8)从脏水的游泳池里捡宝石：</strong></p>\r\n<p>　　是：当你的伴侣在你身边时，你依然和周围的人调情。</p>\r\n<p>　　不：当你的伴侣在你身边里，你绝大多数时间只会围着他/她转。</p>\r\n<p>　<strong>　(9)从清澈的游泳池里捡钱币：</strong></p>\r\n<p>　　是：当你的伴侣不在你身边，你会和周围的人调情。</p>\r\n<p>　　不：当你的伴侣不在你身边，你也会忠实于他/她，不和周围的人调情。</p>\r\n<p><strong>　　(10)箱子的大小：</strong></p>\r\n<p>　　小：不自负</p>\r\n<p>　　中等：比较自负</p>\r\n<p>　　大：非常自负</p>\r\n<p>　<strong>　(11)箱子的材料(从表面看)：</strong></p>\r\n<p>　　硬纸/纸/木头(不闪光)：谦虚的性格</p>\r\n<p>　　金属：骄傲而顽固的性格</p>\r\n<p>　<strong>　(12)桥的材料：</strong></p>\r\n<p>　　金属：和朋友有非常紧密的联系</p>\r\n<p>　　木头：和朋友有比较紧密的联系</p>\r\n<p>　　藤条：周围没有很好的朋友</p>\r\n<p>　<strong>　(13)马的颜色：</strong></p>\r\n<p>　　白色：你的伴侣在你心目中非常纯洁而美好。</p>\r\n<p>　　灰色/褐色：你的伴侣在你心目中的位置一般。</p>\r\n<p>　　黑色：你的伴侣在你心目中好像根本不怎么样，甚至还很坏。</p>\r\n<p><strong>　　(14)马的动作：</strong></p>\r\n<p>　　安静/吃草：你的伴侣是一个顾家的，谦虚的人。</p>\r\n<p>　　在附近奔跑：你的伴侣是一个非常狂野的人。</p>\r\n<p>　　<strong>(15)这是最后一个问题但也是最重要的问题。对了，故事的结尾是一阵龙卷风，</strong></p>\r\n<p>　　你怎么去做呢?这里提供了三种选择：</p>\r\n<p>　　A、跑过去藏在箱子里面?</p>\r\n<p>　　B、跑过去藏在桥下面?</p>\r\n<p>　　C、跑过去骑上马走?</p>\r\n<p>　<strong>　那么什么是你的选择呢?</strong></p>\r\n<p>　　现在，我们看看上面的这些事物代表的是什么：</p>\r\n<p>　　龙卷风：你生活中的麻烦</p>\r\n<p>　　箱子：你自己</p>\r\n<p>　　桥：你的朋友</p>\r\n<p>　　马：你的伴侣</p>\r\n<p>　　<strong>那么答案就是：</strong></p>\r\n<p>&nbsp; &nbsp; &nbsp; A、如果你选择箱子，你无论何时遇到麻烦你都会自己解决。</p>\r\n<p>　　B、或者你选择桥，无论何时你遇到麻烦你都有将去找你的朋友一起解决。</p>\r\n<p>　　C、又或者你选择的最后一个马，你寻找的伴侣是你无论何时遇到麻烦都要和他/她一起去面对。</p>', 1, 0, '', '', '', 1, '2018-04-06 12:52:22', '2018-04-06 12:52:22', NULL),
(11, '浅谈师生交往及策略', 'teacherAssociation', 'http://127.0.0.2/uploads/ts1.jpg', '', '\r\n', 'teacherRelation', NULL, '<p><img src="http://127.0.0.2/uploads/ts1.jpg?1523019564463" alt="ts1" width="654" height="436" /></p>\r\n<div class="resolved-cnt src-import">师生进行沟通的途径可以多种多样，特别是信息技术日益发达的今天更是如此，不同的沟通途径可以采取不同的方法。<br /><br />　　（一）面对面谈话式沟通。这是最直接、最传统的沟通方式，师生直接面对，真诚而坦率地交谈，沟通的效果可能立竿见影。在进行面对面谈话式沟通时，有几点需要注意：<br /><br />　　1、空间位置需要注意。师生进行面对面关系谈话式沟通时的空间位置有如下几种：师坐生站、师站生坐、师生共站、师生共坐等。一般情况下，前两种均不太好，因为我们在师生沟通时应尽量注意师生的平等，尽量多给学生一些尊重；在室外只能是师生共站，在室内最好是师生共同坐下沟通较好。<br /><br />　　2、注重师生对话技巧――注重以&ldquo;我&rdquo;为主的表达方式<br /><br />　　做学生工作，很多教师都有这种感觉，学生对老师的话像是有一种本能的抵御和反抗，师生之间沟通难。对于这个问题，很多老师的经验表明：与学生相处中，对大部分学生从关心出发，运用以&ldquo;我&rdquo;为主的表达方式，直抒&ldquo;我&rdquo;的感想，较之单纯的批评和带有指责的特点的以&ldquo;你&rdquo;开头的话，更易于师生间的沟通。教育效果更好。这是因为以&ldquo;我&rdquo;为主的表达方式，主要谈&ldquo;我&rdquo;的观点和看法，表达&ldquo;我&rdquo;对此事的感想和对学生的关心，不存在指责因素，所以也就不易产生抵触和对抗情绪，可以使犯错误的学生看清自己的行为所带来的不良后果，让其认识到为了自己的完美，确有改正的必要。<br /><br />　　3、注意沟通和疏导工作中的口语修辞<br /><br />　　在与学生的沟通与疏导中，我们说话也不能太过随便，要注意谈话中的口语修辞，恰当的口语修辞可使口语表达更这生动、准确、优美和得体，更易被人接受。它有一定的分寸，一旦失去分寸，也会产生极大的消极作用。在教育中往往会引起学生情绪上的对立。<br /><br />　　学生犯了错误，班主任在批评性谈话中可以有多种表达方式：<br />　　①&ldquo;你这样做太好了。<br />　　②&ldquo;你这样做难道好吗？&rdquo;<br />　　③&ldquo;你这样做简直太好了！&rdquo;<br />　　④&ldquo;你这样做就不好了。&rdquo;<br />　　第一句是肯定句，直接了当，但嵌了一个&ldquo;太&rdquo;字，语意随肯定的语气表达显得重了些，学生听了有可能会产生抵触情绪；第二句是反问句，严厉的质问带有明显训斥的味道，溢于言表的激愤很难叫学生心悦诚服；第三句是反语句，透出的讥讽和挖苦只会造成学生的逆反心理；第四句用了否定句，态度明朗，却又显得委婉诚恳，在语出于口的一瞬间又加了一个不起眼的修饰词&ldquo;就&rdquo;，学生听了比较易于接受，同一事实，致使教育效果迥异，这就是口语修辞的微妙之处。<br /><br />　　（二）书信交流沟通。<br /><br />　　书信交流进行沟通也是较为传统的一种师生沟通策略。但即使在现代高度发达的社会里这种沟通方法还会起到很好的作用。在某些环境下可能有某些事情师生之间不方便直接面对面沟通，那么通过书信来进行沟通不失为一种较好的方法。这种沟通教师可能会了解到学生中平时不易掌握的情况，可能能直面学生的内心世界，而作为学生也会得到教师更为完备的帮助和指导。<br /><br />　　（三）周记和作业沟通。<br /><br />　　现在很多教师尤其是班主任都要求学生写周记，通过周记来了解学生一周以来学习、生活、思想等方面的情况，这是很好的一种办法。这样做关键是不能流于形式，因为别人这样做了，我也就这样做。其实我们可以通过周记和学生进行沟通，可能会起到意想不到的效果。这就需要教师要有一定的敏感性，能透过学生周记中的字里行间及时捕捉信息，然后进行必要的沟通，如写一段鼓励性的语言，提出几点具体的要求，讲讲教师心里的一些感受等等，都可能引起学生的共鸣，对学生是一种极大的促进和帮助，也许周记就成为师生对话的工具和主渠道了。当然，老师在批改作业时也不应就满足于对和错，作业本也可以成为师生沟通的重要途径，如教师可在作业本上写道：&ldquo;做得真不错&rdquo;、&ldquo;希望你继续努力&rdquo;、&ldquo;以后可不要再这样粗心了&rdquo;&ldquo;努力啊，岁月不待人，莫等闲白了少年头&rdquo;等等，也许会起到良好的效果。<br /><br />　　（四）电话及网上沟通。<br /><br /><br />　　随着当今互联网的日益发展，上网也就成了学生业余生活的一部分。其实我们也可以利用网络的优势来与学生进行沟通，我们教师也取一个好听一点的昵称，根学生在网上进行自然而愉悦的沟通。我想在这样的时候师生的沟通这个问题应该迎刃而解了吧。<br /><br />　　总之，师生之间可以利用不同的时间和空间进行沟通，也可以利用不同的方法和途径进行沟通，相信师生有了良好的沟通，必将会很好地解决许多教学问题。当师生之间真正喊出&ldquo;理解万岁&rdquo;时，师生沟通将不会成为难题，教学将更具有亲和力，学校也将会成为学生和老师共同的天堂！</div>\r\n<div class="laud" data-clicked="" data-ans_id="1460793720720590">&nbsp;</div>', 1, 0, '', '', '', 1, '2018-04-06 13:03:25', '2018-04-06 13:03:25', NULL);




-- 处理中间表
SET FOREIGN_KEY_CHECKS=0;


INSERT INTO `category_post` (`id`, `category_id`, `post_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, NULL, NULL, NULL),
(2, 4, 3, NULL, NULL, NULL),
(3, 3, 4, NULL, NULL, NULL),
(4, 6, 6, NULL, NULL, NULL),
(5, 4, 7, NULL, NULL, NULL),
(6, 10, 8, NULL, NULL, NULL),
(7, 7, 9, NULL, NULL, NULL),
(8, 10, 10, NULL, NULL, NULL),
(9, 8, 11, NULL, NULL, NULL);
--
-- Indexes for dumped tables
--

