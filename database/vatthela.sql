-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2014 at 02:12 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vatthela`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(300) NOT NULL,
  `short_description` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) NOT NULL,
  `path` varchar(150) NOT NULL,
  `seo_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `endhot_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `rate` float NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `url`, `short_description`, `description`, `image`, `path`, `seo_title`, `seo_description`, `active`, `create_date`, `update_date`, `endhot_date`, `user_id`, `hot`, `rate`, `view`) VALUES
(1, 'Bí ẩn số điện thoại ma ám', 'bi-an-so-dien-thoai-ma-am', 'Trong vòng 10 năm qua những người sở hữu số điện thoại này đều lần lượt ra đi.', '<p style="text-align:justify"><strong>86. Số điện thoại đen đủi</strong></p>\r\n\r\n<p style="text-align:justify">Trang Daily Mail ng&agrave;y 25 th&aacute;ng 5 năm 2010 đưa tin,&nbsp;ở Trung Quốc v&agrave; một số nước Đ&ocirc;ng Nam &Aacute; số &ldquo;8&rdquo; l&agrave; tượng trưng cho sự may mắn, ph&aacute;t t&agrave;i. Những người d&acirc;n ở quốc gia thuộc khu vực n&agrave;y đặc biệt th&iacute;ch số điện thoại c&oacute; nhiều số &ldquo;8&rdquo;.&nbsp;</p>\r\n\r\n<p style="text-align:justify">Tuy nhi&ecirc;n, tại Bulgary, số điện thoại di động bao gồm 9 số &ldquo;8&rdquo; lại trở th&agrave;nh con số chết ch&oacute;c thảm họa.&nbsp;</p>\r\n\r\n<p style="text-align:justify">Trong v&ograve;ng 10 năm qua những người sở hữu số điện thoại n&agrave;y đều lần lượt&nbsp;ra đi. Thậm ch,&iacute; c&ocirc;ng ty viễn th&ocirc;ng quốc gia Bulgary đ&atilde; ra lệnh ngừng cấp số điện thoại n&agrave;y tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p style="text-align:justify">Chủ sở hữu đầu ti&ecirc;n của số điện thoại 0888 888 888, &ocirc;ng Vladimir Grashow gi&aacute;m đốc điều h&agrave;nh c&ocirc;ng ty viễn th&ocirc;ng quốc gia Bulgary chết v&igrave; ung thư năm 2001 khi mới 48 tuổi.</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn số điện thoại ma ám - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-393402705.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">Thi thể của Konstantin Dimitrov bị bắn tại Amsterdam năm 2003</p>\r\n\r\n<p style="text-align:justify">Chủ nh&acirc;n thứ 2 của n&oacute; l&agrave; tr&ugrave;m mafia Bulgary Konstarin Dimitrov. &Ocirc;ng bị bắn chết ở H&agrave; Lan năm 31 tuổi khi đang d&ugrave;ng bữa với một người mẫu trong chuyến đi kiểm tra đế chế bu&ocirc;n lậu ma t&uacute;y của m&igrave;nh.</p>\r\n\r\n<p style="text-align:justify">Doanh nh&acirc;n Konstantin Dishliev trở th&agrave;nh chủ nh&acirc;n thứ 3 của số điện thoại n&agrave;y v&agrave; sau đ&oacute; &ocirc;ng bị bắn chết ở một nh&agrave; h&agrave;ng Ấn Độ tại thủ đ&ocirc; Bulgary năm 2005.</p>\r\n\r\n<p style="text-align:justify"><strong>87. Người c&oacute; thể nhớ được nội dung 9.000 cuốn s&aacute;ch</strong></p>\r\n\r\n<p style="text-align:justify">Kim Peek sinh năm 1951 mất năm 2009 tại Utal, Hoa Kỳ. Ngay từ khi sinh ra, cha &ocirc;ng đ&atilde; được khuy&ecirc;n n&ecirc;n đưa Kim Peek v&agrave;o viện d&agrave;nh cho trẻ t&agrave;n tật.</p>\r\n\r\n<p style="text-align:justify">Kim Peek bị mắc chứng tự kỷ v&agrave; kh&ocirc;ng thể l&agrave;m được những điều đơn giản như tự mặc quần &aacute;o hay bật c&ocirc;ng tắc đ&egrave;n.&nbsp;Tuy nhi&ecirc;n&nbsp;&ocirc;ng lại c&oacute; khả năng si&ecirc;u ph&agrave;m l&agrave; nhớ được tất cả những g&igrave; &ocirc;ng đ&atilde; từng đọc hoặc đ&atilde; từng nghe thấy. &Ocirc;ng c&oacute; thể đọc nguy&ecirc;n văn nội dung của 9000 cuốn s&aacute;ch.</p>\r\n\r\n<p style="text-align:justify">B&ecirc;n cạnh đ&oacute;, Kim c&ograve;n l&agrave; một thi&ecirc;n t&agrave;i tinh th&ocirc;ng tr&ecirc;n 15 lĩnh vực từ lịch sử, văn học, địa l&yacute;, to&aacute;n học, vật l&yacute; đến &acirc;m&nbsp; nhạc, thể thao.</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn số điện thoại ma ám - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-710693648.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">&Ocirc;ng Kim Peek</p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng c&oacute; thể nhớ những bản nhạc nghe từ nhiều thập kỷ trước v&agrave; chơi ch&uacute;ng tr&ecirc;n piano th&agrave;nh thạo. Kim lu&ocirc;n d&agrave;nh h&agrave;ng&nbsp; giờ liền để đọc s&aacute;ch v&agrave;&nbsp;c&oacute; thể đọc hai trang s&aacute;ch một l&uacute;c bằng mắt tr&aacute;i v&agrave; mắt phải v&agrave; chỉ mất từ 8-10 gi&acirc;y.</p>\r\n\r\n<p style="text-align:justify">Ch&iacute;nh Kim Peek đ&atilde; tạo cảm hứng cho nh&agrave; văn Barry Morrow viết l&ecirc;n kịch bản được chuyển thể th&agrave;nh phim c&ugrave;ng t&ecirc;n&nbsp;<em>Rain Main.&nbsp;</em>Bộ phim đ&atilde; đoạt bốn giải Oscar danh gi&aacute; trong đ&oacute; c&oacute; giải phim xuất sắc nhất năm 1989.</p>\r\n\r\n<p style="text-align:justify">Kể từ đ&oacute;, Kim Peek bỗng trở n&ecirc;n nổi tiếng, thường xuy&ecirc;n được mời phỏng vấn trong c&aacute;c chương tr&igrave;nh truyền h&igrave;nh, tham gia c&aacute;c buổi diễn thuyết v&ograve;ng quanh thế giới, tr&igrave;nh diễn khả năng t&iacute;nh to&aacute;n si&ecirc;u ph&agrave;m v&agrave; kiến thức uy&ecirc;n th&acirc;m tr&ecirc;n nhiều lĩnh vực. Năm 2009, &ocirc;ng đột ngột qua đời sau cơn đau tim.</p>\r\n\r\n<p style="text-align:justify"><strong>88. Tuyết rơi tr&ecirc;n sa mạc</strong></p>\r\n\r\n<p style="text-align:justify">Sa mạc Taklamakan nằm trong địa phận khu tự trị T&acirc;n Cương, Trung Quốc l&agrave; một trong 15 sa mạc lớn nhất thế giới với tổng diện t&iacute;ch 337.600 km2, chiều d&agrave;i t&iacute;nh theo hướng Đ&ocirc;ng T&acirc;y l&agrave; hơn 1000 km, chiều rộng theo hường Nam Bắc l&agrave; 400 km.</p>\r\n\r\n<p style="text-align:justify">Đường bi&ecirc;n giới ph&iacute;a Bắc v&agrave; ph&iacute;a Nam của Taklamakan l&agrave; một trong qu&atilde;ng đường d&agrave;i đầy gian khổ trong huyền thoại &quot;con đường tơ lụa&quot; lịch sử.</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn số điện thoại ma ám - 3" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-967315706.jpg" style="border:0px; height:333px; max-width:400px; width:500px" /></p>\r\n\r\n<p style="text-align:center">Cảnh tượng hiếm thấy tr&ecirc;n sa mạc Taklamakan</p>\r\n\r\n<p style="text-align:justify">Năm 2008, tuyết bất ngờ rơi v&agrave; phủ khắp sa mạc Taklamakan suốt 11 ng&agrave;y liền. Đ&acirc;y được coi l&agrave; hiện tượng thời tiết rất hiếm gặp đối với c&aacute;c sa mạc. Lớp tuyết mỏng c&oacute; độ d&agrave;y khoảng 4cm phủ trắng l&ecirc;n sa mạc n&oacute;ng bỏng tạo n&ecirc;n phong cảnh hết sức kỳ th&uacute;.</p>\r\n\r\n<p style="text-align:justify"><strong>89. Đ&aacute; biết &quot;nhột&quot; (buồn)</strong></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn số điện thoại ma ám - 4" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-173523774.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">Nếu chạm kh&ocirc;ng đ&uacute;ng &quot;điểm nhột&quot;, 5 hay 6 người đẩy th&igrave; h&ograve;n đ&aacute; cũng kh&ocirc;ng lung lay</p>\r\n\r\n<p style="text-align:justify">Tại th&ocirc;n T&acirc;n Lạc, huyện Thạch Trụ, tỉnh Tứ Xuy&ecirc;n, Trung Quốc c&oacute; hai h&ograve;n đ&aacute; kỳ lạ, kh&ocirc;ng r&otilde; nguy&ecirc;n nh&acirc;n g&igrave; ch&uacute;ng được gh&eacute;p chồng l&ecirc;n nhau.</p>\r\n\r\n<p style="text-align:justify">Chỉ cần d&ugrave;ng tay chạm nhẹ v&agrave;o đ&uacute;ng chỗ nhột, h&ograve;n đ&aacute; liền ph&aacute;t ra tiếng &quot;ka, ka, ka &hellip; &quot; -&nbsp;giống như l&agrave; đang cười,&nbsp;c&ugrave;ng l&uacute;c đ&oacute;&nbsp; n&oacute; c&ograve;n lắc lư nh&egrave; nhẹ. Tuy nhi&ecirc;n nếu kh&ocirc;ng chạm v&agrave;o đ&uacute;ng chỗ m&agrave; d&ugrave;ng sức 5 đến 6 người th&igrave; h&ograve;n đ&aacute; cũng kh&ocirc;ng lung lay một tấc v&igrave; n&oacute; c&oacute; trọng lượng kh&aacute; nặng (mỗi h&ograve;n khoảng 5 tấn).</p>\r\n\r\n<p style="text-align:justify"><strong>90. Người nghiện ăn b&ugrave;n</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn số điện thoại ma ám - 5" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-196991769.jpg" style="border:0px; height:301px; max-width:400px; text-align:justify; width:450px" /></p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng Trần Hưng T&agrave;i, 54 tuổi người Tứ Xuy&ecirc;n, Trung Quốc v&igrave; thường xuy&ecirc;n ăn b&ugrave;n đất n&ecirc;n&nbsp;sức khỏe ng&agrave;y một yếu&nbsp;đi.</p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng cho biết khi c&ograve;n nhỏ, gia đ&igrave;nh ngh&egrave;o đ&oacute;i, lương thực khan hiếm, ăn kh&ocirc;ng đủ no n&ecirc;n&nbsp;thường l&eacute;n b&oacute;c b&ugrave;n đất đắp l&ograve; ra ăn.</p>\r\n\r\n<p style="text-align:justify">Sau n&agrave;y khi kh&ocirc;ng c&ograve;n phải lo đến c&aacute;i ăn c&aacute;i mặc, &ocirc;ng lại nghiện ăn b&ugrave;n. C&aacute;c bức tường đất ch&aacute;t b&ugrave;n xung quanh nh&agrave; &ocirc;ng đều bị &ocirc;ng cậy ra ăn sạch.</p>\r\n', '1400485635-so-phone-ma-am.jpg', '../images/articles/2014-05-19/', 'Bí ẩn số điện thoại ma ám', 'Bí ẩn số điện thoại ma ám', 2, '2014-05-19 14:47:15', '2014-05-19 14:48:14', '0000-00-00 00:00:00', 1, 0, 0, 57),
(2, 'Nữ Nhi Quốc trong Tây Du Ký có thật', 'nu-nhi-quoc-trong-tay-du-ky-co-that', 'Nữ nhi quốc hiện nay vẫn còn lưu truyền lại cho bộ phận người dân ở Tứ Xuyên, TQ', '<p style="text-align:justify"><strong>91. Nữ Nhi Quốc c&oacute; thật</strong></p>\r\n\r\n<p style="text-align:justify">Nếu ai đ&atilde; từng xem t&aacute;c phẩm kinh điển T&acirc;y Du K&yacute; năm&nbsp;1986, hẳn sẽ kh&ocirc;ng qu&ecirc;n phần 16 mang t&ecirc;n Thỉnh Kinh Nữ Nhi Quốc. Đất nước c&oacute; nh&agrave; vua v&ocirc; c&ugrave;ng xinh đẹp, si t&igrave;nh v&agrave; c&oacute; nhiều điều kỳ th&uacute; như chỉ cần uống nước s&ocirc;ng l&agrave; mang thai.Tuy nhi&ecirc;n đ&acirc;y kh&ocirc;ng phải l&agrave; địa danh&nbsp;hư cấu m&agrave; được ghi ch&eacute;p trong quyển số 197 Cựu Đường Thư, chứng minh n&oacute; thực sự tồn tại. Thậm ch&iacute;,&nbsp;tập tục của Nữ nhi quốc hiện nay vẫn c&ograve;n lưu truyền lại cho một&nbsp;bộ phận người d&acirc;n ở tỉnh Tứ Xuy&ecirc;n.</p>\r\n\r\n<p style="text-align:center"><img alt="Nữ Nhi Quốc trong Tây Du Ký có thật - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-364166894.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">Truyền nh&acirc;n của Đ&ocirc;ng nữ quốc</p>\r\n\r\n<p style="text-align:justify">T&ecirc;n thật của Nữ nhi quốc l&agrave; Đ&ocirc;ng nữ quốc. Kiến tr&uacute;c phổ biến của đất nước n&agrave;y l&agrave; c&aacute;c t&ograve;a th&aacute;p rộng. Nữ vương thường ở tr&ecirc;n tầng cao nhất - tầng thứ 9, c&ograve;n b&aacute;ch t&iacute;nh sống ở tầng thứ 4 v&agrave; thứ 5.&nbsp;Đất nước n&agrave;y&nbsp;duy tr&igrave;&nbsp;tập tục trọng nữ khinh nam, đ&agrave;n &ocirc;ng chỉ l&agrave;m n&ocirc; dịch, phụ nữ được đức cao trọng vọng.&nbsp;Sau lịch sử di cư v&agrave; tranh đấu sinh tồn l&acirc;u d&agrave;i với nhiều bộ lạc kh&aacute;c, Đ&ocirc;ng nữ quốc dần biến mất nhưng tập tục của họ vẫn c&ograve;n lưu truyền lại cho đến ng&agrave;y nay.</p>\r\n\r\n<p style="text-align:justify"><strong>92. Cuốn băng ghi &acirc;m đ&aacute;ng sợ</strong></p>\r\n\r\n<p style="text-align:justify">Th&aacute;ng 5 năm 2005, m&aacute;y bay CI 611 thuộc h&atilde;ng h&agrave;ng kh&ocirc;ng d&acirc;n dụng China Airlines gặp phải sự cố nghi&ecirc;m trọng cướp đi sinh mạng hơn 200 h&agrave;ng kh&aacute;ch tại khu vực biển B&agrave;nh Hồ.</p>\r\n\r\n<p style="text-align:center"><img alt="Nữ Nhi Quốc trong Tây Du Ký có thật - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-742737073.jpg" style="border:0px; max-width:400px; width:500px" /></p>\r\n\r\n<p style="text-align:justify">Sau khi vụ việc thương t&acirc;m xảy ra, một đoạn băng ghi &acirc;m được cho l&agrave; của nạn nh&acirc;n tr&ecirc;n chuyến bay CI 611 để lại được gửi qua bưu điện cho một người đ&agrave;n &ocirc;ng họ Trương với nỗi sợ h&atilde;i kinh ho&agrave;ng: &ldquo;Gửi, thứ 5, 5 giờ 21 ph&uacute;t&rdquo; k&egrave;m theo tiếng kh&oacute;c d&agrave;i khoảng 10 gi&acirc;y, rồi đột ngột c&oacute; tiếng k&ecirc;u cứu &ldquo;Đừng, t&ocirc;i kh&ocirc;ng muốn chết, kh&ocirc;ng muốn chết ở đ&acirc;y&rdquo;. Một ph&uacute;t sau mọi &acirc;m thanh biến mất.&nbsp;Kỳ lạ hơn, cuốn băng ghi &acirc;m n&agrave;y được ghi v&agrave;o ng&agrave;y 30 th&aacute;ng 5 năm 2005, trước một ng&agrave;y khi m&aacute;y bay CI 611 xảy ra sự cố.&nbsp;Để t&igrave;m nguồn gốc cuốn băng, &ocirc;ng Trương đ&atilde; t&igrave;m đến c&ocirc;ng ty điện t&iacute;n v&agrave; cảnh s&aacute;t th&agrave;nh phố B&igrave;nh Đ&ocirc;ng nhưng họ cũng kh&ocirc;ng gi&uacute;p được g&igrave;.&nbsp;Theo&nbsp;<a href="http://localhost/vatthela.com/vatthela/backend" style="line-height: 1.6em; text-decoration: none; color: rgb(0, 0, 255);">b&aacute;o</a>&nbsp;giới Đ&agrave;i Loan, kh&ocirc;ng phận thuộc v&ugrave;ng biển ph&iacute;a T&acirc;y Nam B&agrave;nh Hồ thường xuất hiện hiện tượng kỳ b&iacute; như la b&agrave;n quay t&iacute;t m&ugrave; hoặc đổi hướng, mặt biển ph&aacute;t quang.&nbsp;Trong v&ograve;ng 16 năm t&iacute;nh đến năm 2005 đ&atilde; c&oacute; tr&ecirc;n dưới 10 vụ tai nạn h&agrave;ng kh&ocirc;ng v&agrave; B&agrave;nh Hồ được mệnh danh &ldquo;Tam gi&aacute;c quỷ B&agrave;nh Hồ&rdquo;.</p>\r\n\r\n<p style="text-align:justify"><strong>93. Hồn ma&nbsp;b&agrave; ngoại xuất hiện trong ảnh ch&aacute;u g&aacute;i</strong></p>\r\n\r\n<p style="text-align:justify">Ng&agrave;y 5 th&aacute;ng 8 năm 2009, một c&ocirc; g&aacute;i người Mỹ 18 tuổi t&ecirc;n l&agrave; Casey khi chụp ảnh cho c&ocirc; ch&aacute;u g&aacute;i 2 tuổi bằng điện thoại đ&atilde; t&aacute; hỏa khi ph&aacute;t hiện khu&ocirc;n mặt b&agrave; ngoại đ&atilde; mất c&aacute;ch đ&oacute; 20 năm.&nbsp;Casey cho biết: &ldquo;<em>L&uacute;c đ&oacute; chỉ c&oacute; t&ocirc;i v&agrave; Penny ở nh&agrave;, t&ocirc;i cũng kh&ocirc;ng hiểu chuyện g&igrave; đ&atilde; xảy ra. Xung quanh hai d&igrave; ch&aacute;u kh&ocirc;ng c&oacute; gương hay ti vi&rdquo;.&nbsp;</em>Casey c&ograve;n c&ocirc;ng bố bức ảnh c&ocirc; chụp với b&agrave; ngoại 20 mươi năm trước v&agrave;&nbsp;thật kỳ lạ b&agrave; xuất hiện ở hai bức ảnh&nbsp;với trang phục v&agrave; diện mạo y chang.&nbsp;Sau khi bức ảnh hồn ma b&agrave; ngoại được c&ocirc;ng bố, Casey ngay lập tức trở th&agrave;nh nh&acirc;n vật phỏng vấn độc quyền của đ&agrave;i truyền h&igrave;nh bang Rhode Island, Mỹ.&nbsp;Nhiều người cho rằng đ&acirc;y chỉ l&agrave; tr&ograve; lừa bịp hay kết quả của sử dụng phần mềm photoshop nhưng kh&ocirc;ng ai đưa ra chứng cứ thực sự thuyết phục chứng minh Casey lừa đảo.</p>\r\n\r\n<p style="text-align:center"><img alt="Nữ Nhi Quốc trong Tây Du Ký có thật - 3" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-303803185.jpg" style="border:0px; height:533px; max-width:400px; width:400px" /></p>\r\n\r\n<p style="text-align:center">Ảnh Penny v&agrave; khu&ocirc;n mặt cụ ngoại</p>\r\n\r\n<p style="text-align:center"><img alt="Nữ Nhi Quốc trong Tây Du Ký có thật - 4" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-819336117.jpg" style="border:0px; height:272px; max-width:400px; width:400px" /></p>\r\n\r\n<p style="text-align:center">Bức ảnh c&oacute; hồn ma&nbsp;b&agrave; ngoại b&ecirc;n tr&aacute;i</p>\r\n\r\n<p style="text-align:justify"><strong>94. Khu l&agrave;ng tự ch&aacute;y ở Italia</strong></p>\r\n\r\n<p style="text-align:justify">Trang Guardian của Anh ng&agrave;y 11 th&aacute;ng 2 năm 2004 đăng tải, tại khu l&agrave;ng Caronia v&ugrave;ng duy&ecirc;n hải miền Nam nước Italia xảy ra chuyện lạ. Tất cả đồ đạc gia dụng, m&aacute;y m&oacute;c v&agrave; c&aacute;c vật dụng h&agrave;ng ng&agrave;y tự nhi&ecirc;n bốc ch&aacute;y đ&ugrave;ng đ&ugrave;ng kh&ocirc;ng r&otilde; nguy&ecirc;n do.</p>\r\n\r\n<p style="text-align:center"><img alt="Nữ Nhi Quốc trong Tây Du Ký có thật - 5" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-184357504.jpg" style="border:0px; height:449px; max-width:400px; width:350px" /></p>\r\n\r\n<p style="text-align:justify">Những hộ d&acirc;n lập tức được sơ t&aacute;n v&agrave; l&iacute;nh cửu phải đấu tranh cật lực suốt một ng&agrave;y trời mới dập tắt đ&aacute;m ch&aacute;y. Sự việc kh&ocirc;ng chỉ diễn ra một lần duy nhất.&nbsp;Hơn 100 nh&agrave; khoa học bao gồm chuy&ecirc;n gia về điện, địa chất, từ trường, viễn th&ocirc;ng&hellip; đ&atilde; được cử đến nghi&ecirc;n cứu t&igrave;nh h&igrave;nh nhưng họ cũng kh&ocirc;ng thể giải th&iacute;ch được nguy&ecirc;n nh&acirc;n khu l&agrave;ng tự bốc ch&aacute;y.&nbsp;&Ocirc;ng Avery Glasgow một chuy&ecirc;n gia về điện cho biết:&nbsp;<em>&ldquo;T&ocirc;i t&igrave;m được một đoạn d&acirc;y điện tr&ecirc;n s&agrave;n nh&agrave; mặc d&ugrave; kh&ocirc;ng cắm v&agrave;o ổ điện n&agrave;o nhưng cũng bị ch&aacute;y x&eacute;m</em>&rdquo;.&nbsp;Được biết, khu l&agrave;ng Caronia c&oacute; tổng cộng 150 hộ d&acirc;n, việc đồ đạc trong nh&agrave; tự nhi&ecirc;n bốc đ&atilde; xuất hiện được nửa th&aacute;ng từ nh&agrave; một hộ d&acirc;n khi một đoạn đường d&acirc;y điện tự nhi&ecirc;n bốc ch&aacute;y, rồi sau đ&oacute; l&agrave; c&aacute;c vật dụng như tủ lạnh, điện thoại, m&aacute;y h&uacute;t bụi, ghế, giường , nệm, ống nước&hellip;ở c&aacute;c căn hộ kh&aacute;c.&nbsp;Trong khi một ph&aacute;t ng&ocirc;n vi&ecirc;n c&ocirc;ng ty điện lực cho hay, 10 ng&agrave;y trước c&ocirc;ng ty điện lực đ&atilde; cắt hết nguồn điện dẫn tới Caronia nhưng chuyện kỳ lạ n&agrave;y vẫn xảy ra.</p>\r\n\r\n<p style="text-align:justify"><strong>95. &quot;Người b&iacute; ẩn&quot; gọi&nbsp;cơm hộp</strong></p>\r\n\r\n<p style="text-align:justify">Vụ việc xảy ra v&agrave;o th&aacute;ng 12 năm 1989 tại khu biệt thự sầm uất nhất nh&igrave; Hồng K&ocirc;ng &ndash; T&acirc;n Giới. Ở đ&acirc;y c&oacute; một cửa h&agrave;ng chuy&ecirc;n phục vụ giao tận nơi c&aacute;c loại đồ uống, cơm trứng, m&igrave; v&agrave; c&aacute;c loại b&aacute;nh t&ecirc;n l&agrave; Triều Dũng K&iacute;.&nbsp;Một ng&agrave;y, nh&acirc;n vi&ecirc;n Triều Dũng K&iacute; nhận được điện thoại đặt bốn suất cơm trứng v&agrave; m&igrave; b&ograve; giao đến biệt thự Hỷ T&uacute; Hoa Vi&ecirc;n khu Đại Phổ Điền T&acirc;y.&nbsp;Sau khi ghi lại địa chỉ, ch&agrave;ng trai&nbsp;lập tức ph&oacute;ng xe đi giao đồ ăn. Đến nơi cậu g&otilde; cửa rồi đợi rất l&acirc;u nhưng kh&ocirc;ng thấy ai.&nbsp;Triều Dũng K&iacute; lại tiếp tục g&otilde; v&agrave; k&ecirc;u to: &ldquo;T&ocirc;i giao đồ ăn&rdquo;. Bất th&igrave;nh l&igrave;nh c&aacute;nh cửa h&eacute; mở nhỏ, tiền từ đ&acirc;u được đẩy ra ngo&agrave;i qua khe cửa &nbsp;v&agrave; c&oacute; giọng n&oacute;i&nbsp;k&ecirc;u nh&acirc;n vi&ecirc;n giao h&agrave;ng chỉ cần đặt ở cửa.</p>\r\n', '1400753425-nu-nhi-quoc.jpg', '../images/articles/2014-05-22/', 'Nữ Nhi Quốc trong Tây Du Ký có thật', 'Nữ Nhi Quốc trong Tây Du Ký có thật', 2, '2014-05-22 17:10:25', '2014-05-22 17:10:36', '0000-00-00 00:00:00', 1, 0, 0, 1),
(3, 'Ba quả cầu lửa khổng lồ rơi ở Trung Quốc', 'ba-qua-cau-lua-khong-lo-roi-o-trung-quoc', 'Cư dân một vài ngôi làng thuộc tỉnh Hắc Long Giang (Trung Quốc) cho biết họ nhìn thấy ba vật thể bay không xác định (UFO) rơi trên bầu trời vào sáng 16/5.', '<p style="text-align:justify">C&aacute;c vật thể bằng kim loại h&igrave;nh tr&ograve;n đ&atilde; rơi xuống hai huyện ở Trung Quốc sau khi d&acirc;n l&agrave;ng nghe thấy tiếng r&iacute;t vang dội v&agrave; một số người c&ograve;n thấy quả cầu lửa khổng lồ rơi xuống một khu vườn rau. Trang<a href="http://localhost/vatthela.com/vatthela/backend" style="text-decoration: none; color: rgb(0, 0, 255);">tin</a>&nbsp;Chinatopix dẫn lời một người d&acirc;n địa phương:&nbsp;<em>&ldquo;T&ocirc;i thấy quả cầu lửa khổng lồ. T&ocirc;i nghĩ đ&oacute; l&agrave; một thi&ecirc;n thạch. T&ocirc;i nấp trong nh&agrave; v&agrave; chờ cho vật thể rơi xuống đất&rdquo;.</em></p>\r\n\r\n<p style="text-align:center"><img alt="Ba quả cầu lửa khổng lồ rơi ở Trung Quốc - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-689117742.jpg" style="border:0px; max-width:400px; width:500px" /></p>\r\n\r\n<p style="text-align:center">Vật thể kim loại rơi xuống Trung Quốc</p>\r\n\r\n<p style="text-align:justify">China News Service m&ocirc; tả c&aacute;c vật thể n&oacute;i tr&ecirc;n h&igrave;nh tr&ograve;n, m&agrave;u x&aacute;m bạc, r&igrave;a ngo&agrave;i c&oacute; răng cưa v&agrave; c&oacute; dấu vết bị ch&aacute;y. Theo k&ecirc;nh OPenMinds TV, vật thể c&oacute; đường k&iacute;nh 76 cm v&agrave; c&acirc;n nặng hơn 40 kg.</p>\r\n\r\n<p style="text-align:center"><img alt="Ba quả cầu lửa khổng lồ rơi ở Trung Quốc - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-787414763.jpg" style="border:0px; max-width:400px; width:500px" /></p>\r\n\r\n<p style="text-align:center">C&aacute;c vật thể h&igrave;nh tr&ograve;n, m&agrave;u x&aacute;m bạc, r&igrave;a ngo&agrave;i c&oacute; răng cưa v&agrave; c&oacute; dấu vết bị ch&aacute;y.</p>\r\n\r\n<p style="text-align:justify">Khi c&aacute;c nh&agrave; điều tra đến hiện trường để khảo s&aacute;t vật thể lạ, một v&agrave;i giải th&iacute;ch được n&ecirc;u. Theo trang tin tiếng Anh Ecns của China News Service, ngay trước khi cư d&acirc;n nơi n&agrave;y nh&igrave;n thấy UFO tr&ecirc;n bầu trời, t&ecirc;n lửa Proton-M của Nga mang theo vệ tinh viễn th&ocirc;ng bị hỏng động cơ v&agrave; ch&aacute;y tr&ecirc;n bầu kh&iacute; quyển tr&aacute;i đất. Sự cố xảy ra chỉ thời gian ngắn sau khi t&ecirc;n lửa được ph&oacute;ng l&ecirc;n v&agrave;o s&aacute;ng 16/5.&nbsp;Truyền th&ocirc;ng Trung Quốc nghi ngờ vật thể lạ l&agrave; những phần chưa bị ch&aacute;y của t&ecirc;n lửa v&agrave; vệ tinh n&oacute;i tr&ecirc;n nhưng cuộc điều tra vẫn c&ograve;n tiếp tục.</p>\r\n', '1400753585-cau-lua-roi-trung-quoc.jpg', '../images/articles/2014-05-22/', 'Ba quả cầu lửa khổng lồ rơi ở Trung Quốc', 'Ba quả cầu lửa khổng lồ rơi ở Trung Quốc', 2, '2014-05-22 17:13:06', '2014-05-23 14:27:22', '2014-05-29 00:00:00', 1, 1, 0, 0),
(4, 'Những người có "siêu năng lực" kỳ lạ', 'nhung-nguoi-co-sieu-nang-luc-ky-la', 'Họ "điều tiết" được dòng điện mạnh chạy qua người và thậm chí có thể sử dụng nó để chữa bệnh cho người khác...', '<p style="text-align:justify">Điện l&agrave; nguồn năng lượng kh&ocirc;ng thể thiếu trong thế giới hiện đại. Tuy nhi&ecirc;n, nếu để&nbsp;d&ograve;ng điện qu&aacute; mạnh đi v&agrave;o cơ thể, con người sẽ&nbsp;tử vong. Vậy nhưng&nbsp;tr&ecirc;n thế giới&nbsp;lại c&oacute; những trường hợp đặc biệt, kh&ocirc;ng chỉ c&oacute;&nbsp;thể&nbsp;ph&aacute;t ra điện m&agrave; c&ograve;n d&ugrave;ng khả năng n&agrave;y để cứu người kh&aacute;c.</p>\r\n\r\n<p style="text-align:justify"><strong>&ldquo;Người đ&agrave;n &ocirc;ng Ắc-quy&rdquo; ở Serbia</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-298676237.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:justify">Anh Slavisa Pajkic người Serbia được biết đến với&nbsp;khả năng t&iacute;ch điện kỳ lạ.</p>\r\n\r\n<p style="text-align:justify">Năm 17 tuổi, anh Slavisa Pajkic đ&atilde;&nbsp;v&ocirc; t&igrave;nh chạm tay v&agrave;o d&ograve;ng điện c&oacute; cường độ lớn bị r&ograve; rỉ ở nơi l&agrave;m việc. Khi&nbsp;mọi người hoảng hốt chưa biết xử l&yacute; ra sao th&igrave; ch&agrave;ng trai trẻ&nbsp;lại kh&ocirc;ng c&oacute; biểu hiện bị điện giật.&nbsp;V&agrave; cũng kể từ đ&oacute;, anh kh&aacute;m ph&aacute; được si&ecirc;u năng lực đặc biệt n&agrave;y của m&igrave;nh.</p>\r\n\r\n<p style="text-align:justify">Kh&ocirc;ng chỉ phục vụ bản th&acirc;n trong việc nấu ăn, thắp s&aacute;ng nơi ở, anh Slavisa&nbsp;c&ograve;n d&ugrave;ng nguồn điện t&iacute;ch được trong cơ thể để&nbsp;chữa bệnh cho một số người bị vi&ecirc;m khớp. V&igrave; thế mọi người bắt đầu gọi anh l&agrave; &ldquo;người đ&agrave;n &ocirc;ng ắc quy&rdquo;.</p>\r\n\r\n<p style="text-align:justify">Sau khi nổi tiếng, anh c&ograve;n d&ugrave;ng khả năng đ&oacute; để kiếm tiền. Gần đ&acirc;y nhất, anh Slavisa&nbsp;đ&atilde; biểu diễn đưa d&ograve;ng điện cao thế l&ecirc;n đến một triệu Volt v&agrave;o cơ thể trong một chương tr&igrave;nh về&nbsp;<a href="http://localhost/vatthela.com/vatthela/backend" style="text-decoration: none; color: rgb(0, 0, 255);">chuyện lạ</a>&nbsp;của Anh, g&acirc;y kinh ngạc cho to&agrave;n thể kh&aacute;n giả.</p>\r\n\r\n<p style="text-align:justify">Giải th&iacute;ch cho hiện tượng n&agrave;y, một chuy&ecirc;n gia trong lĩnh vực nghi&ecirc;n cứu về điện cho biết:&nbsp;&ldquo;<em>Khi sinh ra, anh Slavisa Pajkic đ&atilde; kh&ocirc;ng c&oacute; tuyến mồ h&ocirc;i, dẫn đến da thiếu nước. D&ograve;ng điện đi v&agrave;o cơ thể kh&ocirc;ng c&oacute; nước dẫn&nbsp;n&ecirc;n kh&ocirc;ng lan đến c&aacute;c bộ phận kh&aacute;c. Nếu c&oacute; cũng chỉ l&agrave; một ch&uacute;t t&ecirc; t&ecirc; trong người</em>&rdquo;.</p>\r\n\r\n<p style="text-align:justify"><strong>Nh&acirc;n vi&ecirc;n m&aacute;t xa c&oacute; khả năng dẫn điện</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-885498161.jpg" style="border:0px; height:490px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:justify">Anh&nbsp;M&atilde; Hiển Cương (44 tuổi) sống tại&nbsp;&nbsp;th&agrave;nh phố Đại Kh&aacute;nh, Trung Quốc&nbsp;cũng&nbsp;c&oacute; khả năng để d&ograve;ng điện 220V chạy qua người&nbsp;m&agrave; kh&ocirc;ng c&oacute; cảm gi&aacute;c.</p>\r\n\r\n<p style="text-align:justify">10 l&agrave;m việc trong trung t&acirc;m m&aacute;t xa, anh vẫn lu&ocirc;n d&ugrave;ng d&ograve;ng điện t&iacute;ch được trong cơ thể để&nbsp;x&oacute;a b&oacute;p&nbsp;cho người bệnh.</p>\r\n\r\n<p style="text-align:justify">Năm 16 tuổi, trong một lần tr&egrave;o l&ecirc;n m&aacute;i nh&agrave; sửa ng&oacute;i, anh v&ocirc; t&igrave;nh chạm v&agrave;o d&acirc;y điện bị đứt.&nbsp;Ai nấy đều kinh ho&agrave;ng, lo cho t&iacute;nh mạng của anh nhưng thật kỳ lạ rằng M&atilde; Hiển Cương vẫn&nbsp;b&igrave;nh an leo từ tr&ecirc;n m&aacute;i nh&agrave; xuống trước con mắt kinh ngạc của mọi người.</p>\r\n\r\n<p style="text-align:justify">C&aacute;c chuy&ecirc;n gia về lĩnh vực n&agrave;y ở&nbsp;Khoa Vật l&yacute;, trường Đại học sư phạm Đại Kh&aacute;nh đ&atilde; kiểm tra cơ thể M&atilde; Hiển Cương. Kết quả cho thấy, &iacute;t nhất anh&nbsp;c&oacute; thể chịu được điện &aacute;p l&ecirc;n đến 220V, truyền được d&ograve;ng điện một chiều dưới 200V. Điện trở giữa hai tay đạt 800 đến 900 ngh&igrave;n Ohm, cao gấp 8,9 lần điện trở người b&igrave;nh thường.</p>\r\n\r\n<p style="text-align:justify"><strong>&ldquo;Kỳ nh&acirc;n dẫn điện&rdquo; Ấn Độ</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 3" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-521027089.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:justify">1/10 ampe d&ograve;ng điện đ&atilde; c&oacute; thể g&acirc;y tử vong cho những ai chạm phải, nhưng người đ&agrave;n &ocirc;ng Ấn Độ t&ecirc;n l&agrave; Raj Mohan Nair n&agrave;y kh&ocirc;ng phải l&agrave; người b&igrave;nh thường. Anh c&oacute; thể chịu được d&ograve;ng điện l&ecirc;n đến v&agrave;i ampe cũng kh&ocirc;ng hề hấn g&igrave;.</p>\r\n\r\n<p style="text-align:justify">Nhờ khả năng đặc biệt n&agrave;y m&agrave; Raj Mohan Nair dần được c&aacute;c nh&agrave; khoa học nổi tiếng tr&ecirc;n Thế giới quan t&acirc;m đến.</p>\r\n\r\n<p style="text-align:justify">Mỗi khi kết nối với d&ograve;ng điện, anh như &quot;vụt&nbsp;trở th&agrave;nh si&ecirc;u nh&acirc;n&quot;. Hai tay nắm lấy hai đầu nguồn điện, Raj Mohan Nair c&oacute; thể dễ d&agrave;ng thắp s&aacute;ng b&oacute;ng đ&egrave;n k&iacute;ch cỡ lớn, thậm ch&iacute; c&ograve;n c&oacute; thể khởi động m&aacute;y trộn b&ecirc; t&ocirc;ng.</p>\r\n\r\n<p style="text-align:justify">V&agrave;o năm 7 tuổi, v&igrave; qu&aacute; đau l&ograve;ng khi mẹ qua đời, kh&ocirc;ng c&ograve;n người th&acirc;n n&agrave;o b&ecirc;n cạnh, cậu b&eacute; Raj đ&atilde; tr&egrave;o l&ecirc;n m&aacute;y biến &aacute;p để điện giật tự s&aacute;t. Kh&ocirc;ng ngờ, sự việc cậu mong đợi kh&ocirc;ng xảy ra. Sau gi&acirc;y ph&uacute;t kinh ngạc l&agrave; l&uacute;c cậu &yacute; thức được Thượng Đế đ&atilde; ban cho m&igrave;nh một m&oacute;n qu&agrave; qu&yacute; gi&aacute;.</p>\r\n\r\n<p style="text-align:justify">C&aacute;c nh&agrave; khoa học khi nghi&ecirc;n cứu về Raj Mohan Nair đ&atilde; ph&aacute;t hiện điện trở trong cơ thể anh cao gấp 10 lần người b&igrave;nh thường. Anh c&ograve;n kh&ocirc;ng ngần ngại đưa d&ograve;ng điện 10 ampe v&agrave;o cơ thể, bất chấp nguy cơ&nbsp;bị m&ugrave; tạm thời m&agrave; rất cao. Tuy nhi&ecirc;n, thật may mắn l&agrave; anh vẫn khống chế được n&oacute;.</p>\r\n\r\n<p style="text-align:justify"><strong>C&ocirc; g&aacute;i tự nhận điều khiển được d&ograve;ng điện</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 4" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-28016107.jpg" style="border:0px; height:230px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:justify">Một c&ocirc; g&aacute;i đến từ nước Anh t&ecirc;n l&agrave; Debbie Wolf tự xưng c&oacute; thể l&agrave;m nhiễu s&oacute;ng radio, l&agrave;m b&oacute;ng đ&egrave;n chập chờn v&agrave; t&aacute;c động được l&ecirc;n c&aacute;c vật dụng chạy bằng điện trong nh&agrave;.</p>\r\n\r\n<p style="text-align:justify">C&ocirc; cho biết:&nbsp;&ldquo;Mỗi lần t&ocirc;i căng thẳng hoặc lo lắng, khả năng dị thường n&agrave;y sẽ xuất hiện&rdquo;.</p>\r\n\r\n<p style="text-align:justify">Thực tế, khả năng n&agrave;y đ&atilde; g&acirc;y cho c&ocirc; kh&ocirc;ng &iacute;t rắc rối, phiền n&atilde;o : &ldquo;<em>Đ&egrave;n đường xung quanh nh&agrave; t&ocirc;i đều bị ch&aacute;y hết, điều khiển từ xa cũng bị t&ocirc;i &lsquo;h&uacute;t cạn&rsquo; pin, ti vi đang chạy c&oacute; l&uacute;c c&ograve;n tự chuyển k&ecirc;nh&rdquo;.</em></p>\r\n\r\n<p style="text-align:justify"><strong>Người phụ nữ nam ch&acirc;m</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 5" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-836639567.jpg" style="border:0px; height:544px; max-width:400px; text-align:justify; width:450px" /></p>\r\n\r\n<p style="text-align:justify">Một người phụ nữ khoảng 50 tuổi đến từ nước Anh cũng&nbsp;nhận được sự quan t&acirc;m của nhiều người khi biểu diễn khả năng h&uacute;t đồ vật bằng kim loại như một thỏi nam ch&acirc;m.</p>\r\n\r\n<p style="text-align:justify">Đặc biệt hơn nữa, cơ thể b&agrave; c&ograve;n c&oacute; thể thắp s&aacute;ng được đ&egrave;n điện, hoặc khởi động c&ograve;i&nbsp;<a href="http://localhost/vatthela.com/vatthela/backend" style="text-decoration: none; color: rgb(0, 0, 255);">b&aacute;o</a>&nbsp;ở xe hơi.&nbsp;Khả năng n&agrave;y khiến b&agrave; thấy m&igrave;nh như một chiếc &quot;tủ lạnh di động&quot;.</p>\r\n\r\n<p style="text-align:justify">C&aacute;c nh&agrave; khoa học suy đo&aacute;n:&nbsp;&ldquo;C&oacute; lẽ l&agrave; trường điện từ trong cơ thể b&agrave; ấy lớn hơn người b&igrave;nh thường rất nhiều&nbsp;n&ecirc;n mới h&uacute;t được c&aacute;c vật thể kim loại nhỏ như tiền xu, kim băng, tua-vit, &hellip; d&iacute;nh v&agrave;o cơ thể như thế&quot;.</p>\r\n\r\n<p style="text-align:justify"><strong>Người dẫn điện Trung Quốc</strong></p>\r\n\r\n<p style="text-align:center">&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 6" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-586059983.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng Tưởng Trung Văn sinh sống ở tỉnh Ho&agrave;nh Dương, Trung Quốc cũng l&agrave; một kỳ nh&acirc;n dẫn điện nổi tiếng xa gần.</p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng c&oacute; thể đưa d&ograve;ng điện 220V &quot;đi lại tự do&quot; trong cơ thể m&agrave; vẫn b&igrave;nh an v&ocirc; sự,&nbsp;thậm ch&iacute; c&oacute; thể biến&nbsp;bản th&acirc;n th&agrave;nh m&aacute;y biến &aacute;p, điều khiển d&ograve;ng điện.</p>\r\n\r\n<p style="text-align:justify">Thử nghiệm v&ocirc; số lần với d&ograve;ng điện cường độ lớn&nbsp;v&agrave; cũng kh&ocirc;ng &iacute;t lần bị điện giật nhưng &ocirc;ng cho biết: &ldquo;<em>Mỗi lần thử nghiệm, t&ocirc;i đều cực kỳ cẩn thận. Tuy c&oacute; v&agrave;i lần&nbsp;bị giật&nbsp;nhưng kh&ocirc;ng c&oacute; ảnh hưởng n&agrave;o lớn lắm&rdquo;.</em></p>\r\n\r\n<p style="text-align:justify">&Ocirc;ng Tưởng Trung Văn c&ograve;n cho rằng: &ldquo;<em>Điện vốn c&oacute; thể g&acirc;y chết người chủ yếu l&agrave; v&igrave; d&ograve;ng điện đi v&agrave;o tim, dẫn đến t&ecirc; liệt. Nếu c&oacute; thể t&igrave;m c&aacute;ch ngăn chặn d&ograve;ng điện chạy v&agrave;o tim th&igrave;&nbsp;sẽ kh&ocirc;ng c&ograve;n nguy hiểm nữa&rdquo;.</em></p>\r\n\r\n<p style="text-align:justify"><strong>&ldquo;Si&ecirc;u nh&acirc;n điện quang&rdquo; T&acirc;n Cương</strong></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 7" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-694732970.jpg" style="border:0px; height:303px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:center"><img alt="Những người có &quot;siêu năng lực&quot; kỳ lạ - 8" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-524475572.jpg" style="border:0px; height:300px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:justify">Một trường hợp nữa ở Trung Quốc c&oacute; khả năng đặc biệt n&agrave;y l&agrave; &ocirc;ng Trương Đức Khoa - c&ocirc;ng nh&acirc;n đ&atilde; nghỉ hưu v&agrave; hiện&nbsp;71 tuổi.</p>\r\n\r\n<p style="text-align:justify">Sau khi ph&aacute;t hiện si&ecirc;u năng lực n&agrave;y, &ocirc;ng Trương Đức Khoa đ&atilde; đến&nbsp;Viện khoa học Trung Quốc, chi nh&aacute;nh T&acirc;n Cương để l&agrave;m kiểm tra.</p>\r\n\r\n<p style="text-align:justify">C&aacute;c chuy&ecirc;n gia ở đ&acirc;y cho biết, &ocirc;ng mang trong m&igrave;nh một dạng c&ocirc;ng năng đặc biệt&nbsp;giống c&aacute;c trường hợp kh&aacute;c thế giới. Tuy nhi&ecirc;n về nguy&ecirc;n nh&acirc;n, vẫn chưa c&oacute; một lời giải th&iacute;ch thỏa đ&aacute;ng n&agrave;o.</p>\r\n\r\n<p style="text-align:justify">Tuổi đ&atilde; cao, &ocirc;ng Trương Đức Khoa d&ugrave;ng năng lực n&agrave;y như một dạng vận động&nbsp;tăng cường sức khỏe. Kh&ocirc;ng chỉ vậy, &ocirc;ng c&ograve;n c&oacute; thể&nbsp;trị bệnh miễn ph&iacute; cho họ h&agrave;ng, người th&acirc;n, những người bị bệnh phong h&agrave;n, xương khớp, đau thắt lưng, &hellip; v&agrave; hiệu quả v&ocirc; c&ugrave;ng tuyệt vời.</p>\r\n\r\n<p style="text-align:justify">C&ograve;n nếu sau 3 ng&agrave;y trị liệu theo c&aacute;ch đ&oacute; kh&ocirc;ng được, &ocirc;ng sẽ khuy&ecirc;n người bệnh n&ecirc;n đến bệnh viện kh&aacute;m.</p>\r\n', '1400753988-phi-thuong.jpg', '../images/articles/2014-05-22/', 'Những người có "siêu năng lực" kỳ lạ', 'Những người có "siêu năng lực" kỳ lạ', 2, '2014-05-22 17:19:48', '2014-05-23 14:26:59', '2014-05-28 00:00:00', 1, 1, 0, 2),
(5, 'Bí ẩn 2 xác ướp nổi tiếng thời Lý Việt Nam', 'bi-an-2-xac-uop-noi-tieng-thoi-ly-viet-nam', 'Xác ướp nằm trong quan tài giống như một người phụ nữ đang ngủ.', '<p style="text-align:justify"><strong>1. X&aacute;c ướp b&agrave; Phạm Thị Đằng</strong></p>\r\n\r\n<p style="text-align:justify">M&ocirc;̣t ngày tháng 11 năm 1968, các nhà khảo c&ocirc;̉ Vi&ecirc;̣t Nam bắt đ&acirc;̀u cu&ocirc;̣c khai qu&acirc;̣t ng&ocirc;i m&ocirc;̣ c&ocirc;̉ kỳ&nbsp;lạ.</p>\r\n\r\n<p style="text-align:justify">Nằm tr&ecirc;n một g&ograve; đất thu&ocirc;̣c th&ocirc;n V&acirc;n C&aacute;t, x&atilde; Kim Th&aacute;i, huyện Vụ Bản, tỉnh Nam Định, ng&ocirc;i m&ocirc;̣ c&ocirc;̉ với c&acirc;́u trúc đặc bi&ecirc;̣t trong quan ngoài quách, được bảo v&ecirc;̣ r&acirc;́t chắc chắn và bí m&acirc;̣t.</p>\r\n\r\n<p style="text-align:justify">Lớp qu&aacute;ch bao ngoài quan tài d&agrave;y gần 30cm, được đổ bằng 13 mẻ hợp chất cứng, bền. Quan t&agrave;i b&ecirc;n trong d&agrave;y gần 10cm, đúc bằng gỗ ngọc am v&agrave; gỗ lim gh&eacute;p lại với nhau r&acirc;́t c&ocirc;ng phu và t&ocirc;́n kém.</p>\r\n\r\n<p style="text-align:justify">Với những thiết kế như vậy, c&aacute;c nh&agrave; khảo cổ dự đo&aacute;n đ&acirc;y l&agrave; mộ của 1 vị quan chức trong triều đ&igrave;nh hoặc 1 vị qu&yacute; tộc thời xưa.</p>\r\n\r\n<p style="text-align:justify">X&aacute;c ướp&nbsp;nằm trong quan tài gi&ocirc;́ng như m&ocirc;̣t người phụ nữ đang ngủ. Chỉ có đi&ecirc;̀u, người này đã ngủ hàng th&ecirc;́ kỉ nay, ở s&acirc;u trong lòng đ&acirc;́t cho đ&ecirc;́n khi ng&ocirc;i m&ocirc;̣ được phát hi&ecirc;̣n.</p>\r\n\r\n<p style="text-align:justify">Các chuy&ecirc;n gia khảo cổ&nbsp;đã xác định được, đ&acirc;y là xác của bà Phạm Thị Đằng, phu nh&acirc;n thứ hai của quan thượng phụ Đặng Đình Tường &ndash; m&ocirc;̣t vị quan dưới thời nhà Lý (1428-1788).</p>\r\n\r\n<p style="text-align:justify">X&aacute;c ướp bà Phạm Thị Đằng được mặc 35 chiếc &aacute;o thụng bằng gấm, lụa, có cái còn được th&ecirc;u kim tuy&ecirc;́n r&acirc;́t c&acirc;̀u kỳ; 18 chiếc v&aacute;y vải, lụa. B&ecirc;n cạnh còn có h&agrave;ng chục chiếc gối ch&egrave;n lớn nhỏ, quạt giấy, t&uacute;i trầu th&ecirc;u g&acirc;́m với 10 miếng trầu đ&atilde; t&ecirc;m v&agrave; 10 miếng cau tươi, t&uacute;i gấm đựng thuốc l&agrave;o, khăn lau miệng bằng lụa v&agrave;&nbsp; mũ lụa.</p>\r\n\r\n<p style="text-align:justify">Điều đặc biệt hơn nữa l&agrave; tr&ecirc;n ngực x&aacute;c ướp c&ograve;n được đặt một chuỗi tr&agrave;ng hạt nhà Ph&acirc;̣t kết bằng 101 hạt gỗ đen v&agrave; một t&uacute;i gấm đựng hai quyển Đại tạng kinh v&agrave; Tu tinh thổ tiệp kinh.&nbsp;Trong mi&ecirc;̣ng xác ướp còn ng&acirc;̣m m&ocirc;̣t đ&ocirc;̀ng ti&ecirc;̀n Khang Hi Th&ocirc;ng Bảo và hai đ&ocirc;̀ng H&ocirc;̀ng Hóa Th&ocirc;ng Bảo.&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn 2 xác ướp nổi tiếng thời Lý Việt Nam - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-648254745.jpg" style="border:0px; height:284px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:center">Chu&ocirc;̃i tràng hạt nhà Ph&acirc;̣t đeo tr&ecirc;n ngực bà Đằng</p>\r\n\r\n<p style="text-align:center"><img alt="Bí ẩn 2 xác ướp nổi tiếng thời Lý Việt Nam - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-380219125.jpg" style="border:0px; height:777px; max-width:400px; width:450px" /></p>\r\n\r\n<p style="text-align:center">M&ocirc;̣t trang trong cu&ocirc;́n &ldquo;Đại tạng kinh&rdquo;</p>\r\n\r\n<p style="text-align:justify">Theo quan ni&ecirc;̣m xưa, người ch&ecirc;́t xu&ocirc;́ng &acirc;m phủ phải đi qua m&ocirc;̣t con s&ocirc;ng, n&ecirc;́u kh&ocirc;ng có ti&ecirc;̀n trả cho &ldquo;người lái đò&rdquo; thì sẽ kh&ocirc;ng th&ecirc;̉ qua s&ocirc;ng đ&ecirc;̉ đi đ&acirc;̀u thai mà phải làm &acirc;m h&ocirc;̀n lang thang, v&acirc;́t vưởng, mãi mãi kh&ocirc;ng th&ecirc;̉ si&ecirc;u thoát. Vì th&ecirc;́ cho n&ecirc;n mới có tục l&ecirc;̣ đ&ecirc;̉ người ch&ecirc;́t ng&acirc;̣m những đ&ocirc;̀ng ti&ecirc;̀n vào mi&ecirc;̣ng.</p>\r\n\r\n<p style="text-align:justify">Hàng th&acirc;̣p kỷ nghi&ecirc;n cứu các xác ướp phát hi&ecirc;̣n được dọc khắp đ&acirc;́t nước, từ xác ướp vua chúa, hoàng t&ocirc;̣c cho đ&ecirc;́n các quan lại và d&acirc;n thường, giới khảo c&ocirc;̉ v&acirc;̃n chưa h&ecirc;́t ngạc nhi&ecirc;n với kĩ thu&acirc;̣t ướp xác tuy&ecirc;̣t vời của người Vi&ecirc;̣t Nam c&ocirc;̉ đại.</p>\r\n\r\n<p style="text-align:justify">Th&acirc;̣m chí, các nhà khảo c&ocirc;̉ còn nhờ m&ocirc;̣t người phụ nữ địa phương ở t&acirc;̀m tu&ocirc;̉i 60 đ&ecirc;̉ đứng cạnh xác ướp, so sánh xem &ldquo;ai là người đẹp hơn&rdquo;.</p>\r\n\r\n<p style="text-align:justify"><strong>2. X&aacute;c ướp b&agrave; B&ugrave;i Thị Khang</strong></p>\r\n\r\n<p style="text-align:justify">Năm 1971, 3 năm sau khi ng&ocirc;i m&ocirc;̣ bà Phạm Thị Đằng được khai qu&acirc;̣t, khi nhi&ecirc;̀u đi&ecirc;̀u v&acirc;̃n còn nằm trong vòng nghi v&acirc;́n chưa được giải đáp thì bom đạn kh&ocirc;́c li&ecirc;̣t lại v&ocirc; tình vén l&ecirc;n m&ocirc;̣t t&acirc;́m màn bí m&acirc;̣t.</p>\r\n\r\n<p style="text-align:justify">M&ocirc;̣t ng&ocirc;i m&ocirc;̣ c&ocirc;̉ ở gò Lăng Dứa, xã Thượng L&acirc;n, huy&ecirc;̣n Mỹ Đức, Hà T&acirc;y (nay thu&ocirc;̣c địa ph&acirc;̣n Hà N&ocirc;̣i) bị bom Mỹ đánh b&acirc;̣t tung bia đá. Mặt trước t&acirc;́m bia có khắc m&ocirc;̣t dòng chữ Hán: &ldquo;Đặng c&ocirc;ng qu&acirc;̣n phu nh&acirc;n Bùi Thị chi m&ocirc;̣.&rdquo;</p>\r\n\r\n<p style="text-align:justify">Sau khi khai qu&acirc;̣t l&ecirc;n, các nhà khảo c&ocirc;̉ đã v&ocirc; cùng ngạc nhi&ecirc;n khi nhìn th&acirc;́y t&acirc;́m minh tinh (t&acirc;́m vải dài vi&ecirc;́t bằng chữ Hán, trong đó có cho bi&ecirc;́t th&acirc;n ph&acirc;̣n của người ch&ecirc;́t)&nbsp;ghi r&acirc;́t rõ ràng, đ&acirc;y là m&ocirc;̣ bà Bùi Thị Khang, phu nh&acirc;n qu&acirc;̣n c&ocirc;ng Đặng Đình Tường. Năm l&acirc;̣p m&ocirc;̣ là năm Vĩnh Thịnh thứ 10, 1714, chính là tri&ecirc;̀u vua L&ecirc; Dụ T&ocirc;ng.</p>\r\n\r\n<p style="text-align:justify">Nhằm xác định rõ mọi v&acirc;́n đ&ecirc;̀, các nhà khảo c&ocirc;̉ đã tìm v&ecirc;̀ nơi lưu lại gia phả dòng họ Đặng. Th&acirc;̣t may mắn là trong đó có ghi chép v&ocirc; cùng tỉ mỉ v&ecirc;̀ 13 đời Đặng qu&acirc;̣n c&ocirc;ng, giúp làm sáng tỏ những đi&ecirc;̉m còn nghi v&acirc;́n.</p>\r\n\r\n<p style="text-align:justify">Quan thượng phụ Đặng Đình Tường là đời thứ 9 trong 13 đời làm qu&acirc;̣n c&ocirc;ng dòng họ Đặng. &Ocirc;ng l&acirc;̣p bà Bùi Thị Khang làm chính th&acirc;́t. Sau đó, &ocirc;ng lại l&acirc;̣p bà Phạm Thị Đằng &ndash; con gái út Uy&ecirc;n Thái H&acirc;̀u, cháu gọi bà Khang là c&ocirc;, làm thứ th&acirc;́t.</p>\r\n\r\n<p style="text-align:justify">Mộ b&agrave; B&ugrave;i Thị Khang cũng c&oacute; cấu tr&uacute;c tương tự mộ b&agrave; Phạm Thị Đằng, nhưng x&aacute;c ướp của b&agrave; kh&ocirc;ng được bảo quản tốt bằng. Người ta xác định nguy&ecirc;n nh&acirc;n là do mộ b&agrave; Khang bị bom đạn l&agrave;m nứt vỏ qu&aacute;ch&nbsp;n&ecirc;n đã ảnh hưởng đ&ecirc;́n cái xác b&ecirc;n trong đó.</p>\r\n\r\n<p style="text-align:justify">Những đồ vật an t&aacute;ng theo b&agrave; B&ugrave;i Thị Khang cũng &iacute;t hơn b&agrave; Đằng. Điều n&agrave;y chứng tỏ b&agrave; mất l&uacute;c Đặng Đ&igrave;nh Tướng chưa l&agrave;m quan lớn. Bà Đặng thì may mắn hơn. Khi b&agrave;&nbsp;m&acirc;́t th&igrave;&nbsp;phu qu&acirc;n đã c&ocirc;ng thành danh toại, đ&ocirc;̀ v&acirc;̣t b&ocirc;̀i táng phu nh&acirc;n cũng sang trọng hơn, quý giá hơn.</p>\r\n', '1400835098-xac-uop.jpg', '../images/articles/2014-05-23/', 'Bí ẩn 2 xác ướp nổi tiếng thời Lý Việt Nam', 'Bí ẩn 2 xác ướp nổi tiếng thời Lý Việt Nam', 2, '2014-05-23 15:51:38', '2014-05-27 10:27:40', '0000-00-00 00:00:00', 1, 0, 0, 0);
INSERT INTO `articles` (`id`, `title`, `url`, `short_description`, `description`, `image`, `path`, `seo_title`, `seo_description`, `active`, `create_date`, `update_date`, `endhot_date`, `user_id`, `hot`, `rate`, `view`) VALUES
(6, 'Bí mật về bãi đá cổ 5.000 năm tuổi', 'bi-mat-ve-bai-da-co-5000-nam-tuoi', 'Người ta đã đưa ra vô vàn giả thuyết về mục đích xây dựng quần thể đá chồng Stonehenge - kỳ quan độc nhất vô nhị ở miền nam nước Anh đã được UNESCO công nhận là Di sản thế giới năm 1986.', '\r\n<p>Stonehenge được coi l&agrave; một&nbsp;trong những kiến tr&uacute;c độc đ&aacute;o mang nhiều b&iacute; ẩn nhất tr&ecirc;n thế giới. Đ&oacute; kh&ocirc;ng phải l&agrave; một&nbsp;tr&ograve; lừa gạt, bởi tuổi thọ của n&oacute;&nbsp;được ước t&iacute;nh hơn 5.000 năm tuổi. Đ&acirc;y c&oacute; lẽ l&agrave; di t&iacute;ch thời tiền sử quan trọng nhất của nước Anh.</p>\r\n\r\n<p>Khi viếng thăm khu di t&iacute;ch n&agrave;y, bạn sẽ c&oacute; cảm gi&aacute;c như&nbsp;m&igrave;nh đang ngao du qua h&agrave;ng dặm những ngọn đồi ở&nbsp;v&ugrave;ng n&ocirc;ng th&ocirc;n y&ecirc;n ả. Sau đ&oacute;, bạn sẽ phải ngỡ ng&agrave;ng trước cấu tr&uacute;c kỳ lạ của b&atilde;i đ&aacute; chồng n&agrave;y.</p>\r\n\r\n<p><img alt="Bí mật về bãi đá cổ 5.000 năm tuổi - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-23682615.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;c cuộc khai quật v&agrave; nghi&ecirc;n cứu cho thấy, c&ocirc;ng tr&igrave;nh Stonehenge được ho&agrave;n th&agrave;nh qua 4 giai đoạn. Lần đầu ti&ecirc;n l&agrave; h&agrave;ng loạt c&aacute;c lỗ lớn được đ&agrave;o v&agrave;o khoảng năm 3.100 trước c&ocirc;ng nguy&ecirc;n với mục đ&iacute;ch phục vụ 1 buổi lễ t&ocirc;n gi&aacute;o.</p>\r\n\r\n<p>Sau đ&oacute;, giai đoạn quan trọng nhất được tiến h&agrave;nh khoảng 1.000 năm sau. C&aacute;c phiến đ&aacute; xanh từ ngọn n&uacute;i ở xứ Wales được mang đến Stonehenge. Điều b&iacute; ẩn l&agrave; tại sao người ta l&agrave;m được điều n&agrave;y v&agrave;o thời gian đ&oacute; - khi mọi điều kiện về giao th&ocirc;ng vận chuyển đều rất th&ocirc; sơ.&nbsp;</p>\r\n\r\n<p>Giai đoạn thứ 3 l&agrave; khoảng năm 2.000 trước c&ocirc;ng nguy&ecirc;n với sự vận chuyển c&aacute;c phiến đ&aacute; từ Marlborough Downs c&aacute;ch đ&oacute;&nbsp;25 dặm (40 km). Cuối c&ugrave;ng, c&aacute;c phiến đ&aacute; được sắp xếp lại th&agrave;nh v&ograve;ng m&oacute;ng ngựa v&agrave; c&aacute;c v&ograve;ng tr&ograve;n như ch&uacute;ng ta thấy hiện nay.</p>\r\n\r\n<p style="text-align:center"><img alt="Bí mật về bãi đá cổ 5.000 năm tuổi - 2" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-833038496.jpg" style="border:0px; height:374px; max-width:400px; width:500px" /></p>\r\n\r\n<p>Xung quanh những v&ograve;ng tr&ograve;n cột đ&aacute; đồng t&acirc;m l&agrave; một đường h&agrave;o s&acirc;u 6m, rộng khoảng 21m. Đường h&agrave;o n&agrave;y được đắp th&agrave;nh tường. B&ecirc;n trong h&agrave;o l&agrave; 56 c&aacute;i hố tạo th&agrave;nh một v&ograve;ng tr&ograve;n. C&aacute;c hố hiện nay đ&atilde; bị đ&aacute; v&ocirc;i lấp đầy, b&ecirc;n trong c&ograve;n lẫn tro cốt của con người..</p>\r\n\r\n<p>Điều b&iacute; ẩn nhất về Stonehenge l&agrave; mục đ&iacute;ch x&acirc;y dựng c&ocirc;ng tr&igrave;nh n&agrave;y để l&agrave;m g&igrave;. Đ&oacute; c&oacute; phải l&agrave; một&nbsp;đền thờ,&nbsp;khu vực ch&ocirc;n cất&nbsp;hay&nbsp;đ&agrave;i quan s&aacute;t hoặc l&agrave; một&nbsp;loại lịch cổ đại. Nếu kh&ocirc;ng c&oacute; cỗ m&aacute;y thời gian quay lại th&igrave; ch&uacute;ng ta vẫn c&ograve;n ho&agrave;i nghi về Stonehenge như 1 ẩn số.</p>\r\n\r\n\r\nHải Yến (Theo Luciddream)&nbsp;(Khampha.vn)\r\n', '1400835324-stonehengelandscapedaytime.jpg', '../images/articles/2014-05-23/', 'Bí mật về bãi đá cổ 5.000 năm tuổi', 'Bí mật về bãi đá cổ 5.000 năm tuổi', 2, '2014-05-23 15:55:24', '2014-05-23 15:55:24', '2014-05-29 00:00:00', 1, 1, 0, 8),
(7, 'Những vòng tròn bí ẩn chưa thể lý giải', 'nhung-vong-tron-bi-an-chua-the-ly-giai', 'Những người tin vào thế giới huyền bí cho rằng những vòng tròn này là nơi tập hợp một năng lượng bí ẩn nào đó và theo một cách bí ẩn.', '<p>Những v&ograve;ng tr&ograve;n n&agrave;y được tạo ra một&nbsp;c&aacute;ch b&iacute; hiểm chỉ&nbsp;sau 1&nbsp;đ&ecirc;m. Trong 2 thập kỷ qua, h&igrave;nh dạng của c&aacute;c m&ocirc; h&igrave;nh n&agrave;y đ&atilde; được ph&aacute;t triển đa dạng th&agrave;nh c&aacute;c h&igrave;nh&nbsp;học phức tạp kh&aacute;c nhau như xoắn k&eacute;p AND hay xoắn h&igrave;nh tr&ocirc;n ốc... Mặc d&ugrave; chưa x&aacute;c định được nguy&ecirc;n nh&acirc;n tạo ra ch&uacute;ng&nbsp;nhưng c&oacute; thể thấy những v&ograve;ng tr&ograve;n b&iacute; ẩn n&agrave;y&nbsp;đang ng&agrave;y một nhiều l&ecirc;n v&agrave; phức tạp hơn&nbsp;chỉ trong v&agrave;i thập kỷ.</p>\r\n\r\n<p>V&ograve;ng tr&ograve;n đầu ti&ecirc;n được ph&aacute;t hiện&nbsp;v&agrave;o năm 1966, khi một&nbsp;người n&ocirc;ng d&acirc;n &Uacute;c cho biết &ocirc;ng ta nh&igrave;n thấy 1 chiếc đĩa bay từ đầm lầy trồi&nbsp;l&ecirc;n.</p>\r\n\r\n<p>&Ocirc;ng kể lại đ&atilde; nh&igrave;n thấy một&nbsp;b&atilde;i lau sậy được dệt theo chiều kim đồng hồ với những hoa văn phức tạp.</p>\r\n\r\n<p>Ngay lập tức, th&ocirc;ng&nbsp;tin n&agrave;y đ&atilde; được lan truyền rộng r&atilde;i&nbsp;tr&ecirc;n khắp Thế giới. Sau đ&oacute;,&nbsp;li&ecirc;n tục c&oacute; những<a href="http://localhost/vatthela.com/vatthela/backend" style="text-decoration: none; color: rgb(0, 0, 255);">tin</a>&nbsp;đồn về c&aacute;c vật thể lạ của người ngo&agrave;i h&agrave;nh tinh đ&atilde;&nbsp;l&agrave;m c&acirc;y trồng bị ch&aacute;y rụi hoặc đ&egrave; bẹp theo 1 mặt phẳng.</p>\r\n\r\n<p style="text-align:center"><img alt="Những vòng tròn bí ẩn chưa thể lý giải - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-420776945.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">Những v&ograve;ng tr&ograve;n b&iacute; ẩn chưa thể l&yacute; giải nguồn gốc</p>\r\n\r\n<p>Tuy nhi&ecirc;n lại c&oacute; nhiều bằng chứng chứng tỏ rằng đ&acirc;y chỉ l&agrave; những v&ograve;ng tr&ograve;n nh&acirc;n tạo.</p>\r\n\r\n<p>Năm 1991, hai người đ&agrave;n &ocirc;ng từ Southampton, Anh đ&atilde; thừa nhận rằng họ c&oacute; thể tạo ra c&aacute;c v&ograve;ng tr&ograve;n khổng lồ bằng c&aacute;c tấm v&aacute;n hay d&acirc;y thừng v&agrave; mũ.</p>\r\n\r\n<p>C&aacute;c nghi&ecirc;n cứu cũng b&aacute;c bỏ quan điểm đ&oacute; l&agrave; do đĩa bay của người ngo&agrave;i h&agrave;nh tinh. Họ cho rằng đ&oacute; l&agrave; dấu vết của việc người n&ocirc;ng d&acirc;n sử dụng ph&acirc;n b&oacute;n Nitrat cho c&acirc;y trồng.</p>\r\n\r\n<p>Tuy nhi&ecirc;n những người tin v&agrave;o&nbsp;thế giới huyền b&iacute; lại cho rằng những v&ograve;ng tr&ograve;n n&agrave;y&nbsp;l&agrave; nơi tập hợp một&nbsp;năng lượng b&iacute; ẩn n&agrave;o đ&oacute; v&agrave; theo một&nbsp;c&aacute;ch b&iacute; ẩn, gi&uacute;p ch&uacute;ng&nbsp;c&oacute; thể li&ecirc;n lạc với thế giới ngo&agrave;i tr&aacute;i đất.&nbsp;</p>\r\n\r\n<p>Hải Yến (Theo Luciddream)&nbsp;(Khampha.vn)</p>\r\n', '1400835428-bi-an.jpg', '../images/articles/2014-05-23/', 'Những vòng tròn bí ẩn chưa thể lý giải', 'Những vòng tròn bí ẩn chưa thể lý giải', 2, '2014-05-23 15:57:08', '2014-06-24 18:33:19', '2014-06-30 00:00:00', 1, 1, 0, 3),
(8, 'Lời nguyền về chiếc ly trừng phạt kẻ hám của', 'loi-nguyen-ve-chiec-ly-trung-phat-ke-ham-cua', 'Những món vàng bạc châu báu dường như ngay từ khi được đưa vào lăng mộ cùng với Pha-ra-ong đã bị một làn khí huyền bí bao trùm lấy.', '<p style="text-align:justify">Ly Hy Vọng được ph&aacute;t hiện ở sảnh trước lăng mộ Pha-ra-ong. Người ta đo&aacute;n rằng, những kẻ đ&agrave;o trộm mộ trong l&uacute;c vội v&agrave;ng đ&atilde; l&agrave;m rơi lại. B&ecirc;n tr&ecirc;n ly c&ograve;n khắc chữ:&nbsp;<em>&quot;Nếu ngươi t&igrave;nh nguyện quay mặt về ph&iacute;a gi&oacute; phương Bắc, sau một v&agrave;i năm,&nbsp;ước nguyện của ngươi sẽ được thực hiện&quot;</em>.</p>\r\n\r\n<p style="text-align:justify">Ai Cập l&agrave; quốc gia c&oacute; nền văn h&oacute;a cổ đại l&acirc;u đời, thịnh vượng, cũng l&agrave; v&ugrave;ng đất thần b&iacute;, mang trong m&igrave;nh những truyền thuyết kỳ lạ. Lăng mộ Pha-ra-ong được đồn l&agrave; nơi chứa nhiều b&aacute;u vật nhất Ai Cập nhưng người ta cũng e ngại khi nơi đ&acirc;y được cho l&agrave; c&oacute; lời nguyền của Pha-ra-ong. Lời nguyền ấy giữ g&igrave;n sự an b&igrave;nh nơi đ&acirc;y, trừng phạt những kẻ tham lam của cải của Ng&agrave;i&nbsp;v&agrave; l&agrave; b&iacute; ẩn ng&agrave;n năm chưa được giải. &nbsp;</p>\r\n\r\n<p style="text-align:justify">Những m&oacute;n v&agrave;ng bạc ch&acirc;u b&aacute;u dường như ngay từ khi được đưa v&agrave;o lăng mộ c&ugrave;ng với Pha-ra-ong đ&atilde; bị một l&agrave;n kh&iacute; huyền b&iacute; bao tr&ugrave;m lấy.</p>\r\n\r\n<p><img alt="Lời nguyền về chiếc ly trừng phạt kẻ hám của - 1" class="news-image" src="http://localhost/vatthela.com/vatthela/backend/images/content/news-content-487732445.jpg" style="border:0px; max-width:400px" /></p>\r\n\r\n<p style="text-align:center">Chiếc ly Hy vọng với những d&ograve;ng chữ gợi nhiều giả thuyết</p>\r\n\r\n<p style="text-align:justify">Tutankhamun &ndash; Pha-ra-ong thứ 18 của Ai Cập đ&atilde; thống nhất đất nước từ năm 1336 đến 1327 trước C&ocirc;ng nguy&ecirc;n. Tuy Tutankhamun kh&ocirc;ng phải Pha-ra-ong c&oacute; nhiều c&ocirc;ng lao, th&agrave;nh t&iacute;ch nhất nhưng được coi l&agrave; Pha-ra-ong văn minh nhất trong lịch sử Ai Cập. Chiếc mặt nạ bằng v&agrave;ng của &ocirc;ng trở th&agrave;nh biểu tượng cho nền văn minh Ai Cập cổ đại, được cả thế giới biết đến.</p>\r\n\r\n<p style="text-align:justify">Việc ph&aacute;t hiện ra lăng mộ Pha-ra-ong Tutankhamun l&agrave; bước tiến lớn của ng&agrave;nh khảo cổ học. Đ&acirc;y&nbsp;l&agrave; lăng mộ Pha-ra-ong được bảo tồn nguy&ecirc;n vẹn nhất được t&igrave;m thấy trong Thung lũng c&aacute;c vị vua. Những lời nguyền trong truyền thuyết dường như ứng nghiệm nhiều hơn từ sau khi lăng mộ Tutankhamun được khai quật.</p>\r\n', '1402579157-1402453238-thumbnail.jpg', '../images/articles/2014-06-12/', '', '', 2, '2014-06-12 20:19:17', '2014-06-24 18:38:16', '2014-06-26 00:00:00', 1, 1, 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `article_image`
--

CREATE TABLE IF NOT EXISTS `article_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `image` varchar(300) NOT NULL,
  `alt` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(300) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `order_possition` int(11) NOT NULL,
  `type` char(2) NOT NULL,
  `seo_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `title`, `url`, `description`, `create_date`, `user_id`, `active`, `order_possition`, `type`, `seo_title`, `seo_description`) VALUES
(1, 0, 'UFO', 'ufo', 'Vật thể bay không xác định', '2014-05-07 19:26:17', 1, 0, 1, 'G', 'Vật thể bay không xác định', 'Vật thể bay không xác định'),
(2, 0, 'Người ngoài hành tinh', 'nguoi-ngoai-hanh-tinh', 'Người ngoài hành tinh', '2014-05-12 19:38:16', 1, 0, 2, 'G', 'Người ngoài hành tinh', 'Người ngoài hành tinh'),
(3, 0, 'Phi thường kì lạ', 'phi-thuong-ki-la', 'Phi thường kì lạ', '2014-05-12 19:39:34', 1, 0, 3, 'A', 'Phi thường kì lạ', 'Phi thường kì lạ'),
(4, 1, 'UFO 1', 'ufo-1', 'UFO 1', '2014-06-05 17:26:18', 1, 0, 1, 'G', 'UFO 1', 'UFO 1'),
(5, 0, 'Kì quặc', 'ki-quac', 'Kì quặc', '2014-06-09 19:27:03', 1, 0, 3, 'G', 'Kì quặc', 'Kì quặc');

-- --------------------------------------------------------

--
-- Table structure for table `category_relation`
--

CREATE TABLE IF NOT EXISTS `category_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `category_relation`
--

INSERT INTO `category_relation` (`id`, `category_id`, `table_id`, `table_name`) VALUES
(1, 3, 1, 'A'),
(2, 3, 2, 'A'),
(5, 3, 4, 'A'),
(6, 3, 3, 'A'),
(8, 2, 6, 'A'),
(15, 2, 7, 'A'),
(16, 3, 5, 'A'),
(18, 3, 8, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `href` varchar(300) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id`, `text`, `href`, `status`) VALUES
(3, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(4, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(5, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(6, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(7, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(8, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(9, '<i class=''fa fa-home''></i>Trang chủ', 'a', 0),
(10, '<i class=''fa fa-home''></i>Trang chủ', 'http://localhost/vatthela/', 0),
(11, 'Bí ẩn', 'http://aegame.vn', 0),
(12, 'Bí ẩn', 'http://aegame.vn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `possition` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `status`, `possition`) VALUES
(1, 'Man_menu', 0, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `menu_relation`
--

CREATE TABLE IF NOT EXISTS `menu_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `possition` int(11) NOT NULL,
  `text` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=223 ;

--
-- Dumping data for table `menu_relation`
--

INSERT INTO `menu_relation` (`id`, `menu_id`, `table_id`, `table_name`, `possition`, `text`, `parent_id`) VALUES
(216, 1, 10, 'L', 0, '<i class=''fa fa-home''></i>Trang chủ', 0),
(217, 1, 5, 'C', 1, 'Kì quặc', 0),
(218, 1, 3, 'C', 2, 'Phi thường kì lạ', 0),
(219, 1, 12, 'L', 3, 'Bí ẩn', 0),
(220, 1, 1, 'C', 4, '<i class=''fa fa-file-text''></i> UFO', 219),
(221, 1, 2, 'C', 5, '<i class=''fa fa-file-text''></i> Người hành tinh', 0),
(222, 1, 4, 'C', 6, '<i class=''fa fa-file-text''></i> Chuyện lạ', 221);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) NOT NULL,
  `alt` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`id`, `image`, `alt`, `category_id`) VALUES
(1, '01.jpg', '01.', 1),
(2, '03.jpg', '03.', 2),
(3, '04.jpg', '04.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `frequency`, `url`, `description`, `title`) VALUES
(1, 'điện thoại ma ám', 1, 'dien-thoai-ma-am', '', ''),
(2, 'nu nhi quoc', 1, 'nu-nhi-quoc', '', ''),
(3, 'cau lua', 1, 'cau-lua', '', ''),
(4, 'trung quoc', 1, 'trung-quoc', '', ''),
(5, 'roi cau lua', 1, 'roi-cau-lua', '', ''),
(6, 'xác ướp', 1, 'xac-uop', '', ''),
(7, 'bi an', 1, 'bi-an', '', ''),
(8, 'nguoi ngoai hanh tin', 1, 'nguoi-ngoai-hanh-tin', '', ''),
(9, 'vong tron bi an', 1, 'vong-tron-bi-an', '', ''),
(10, 'ufo', 1, 'ufo', '', ''),
(11, 'vat the la', 1, 'vat-the-la', '', ''),
(12, '123', 1, '123', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tag_connect`
--

CREATE TABLE IF NOT EXISTS `tag_connect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `table_name` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tag_connect`
--

INSERT INTO `tag_connect` (`id`, `tag_id`, `table_id`, `table_name`) VALUES
(2, 1, 1, 'A'),
(4, 2, 2, 'A'),
(11, 3, 3, 'A'),
(12, 4, 3, 'A'),
(13, 5, 3, 'A'),
(16, 7, 6, 'A'),
(17, 8, 6, 'A'),
(46, 6, 5, 'A'),
(47, 7, 5, 'A'),
(48, 8, 5, 'A'),
(49, 10, 5, 'A'),
(52, 7, 7, 'A'),
(53, 9, 7, 'A'),
(54, 10, 7, 'A'),
(55, 11, 7, 'A'),
(57, 12, 8, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(12) NOT NULL DEFAULT 'Male',
  `address` varchar(200) NOT NULL,
  `birth_day` date NOT NULL,
  `phone` int(20) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `roles` varchar(50) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastAccessTime` datetime DEFAULT NULL,
  `lastIPAccess` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `isBlock` int(1) DEFAULT '0',
  `createBy` int(11) DEFAULT NULL,
  `avatar` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `display_name`, `gender`, `address`, `birth_day`, `phone`, `score`, `roles`, `create_date`, `lastAccessTime`, `lastIPAccess`, `isBlock`, `createBy`, `avatar`) VALUES
(1, 'anhntk54', 'trieunhu@a.co', '$2a$13$YdUogOxxnz9rObu3qTo88uEkTJ4gllz0mPaOjrQ/3qTMBVtVVZoTG', NULL, NULL, 'Nhữ Tuấn Anh', 'Male', '', '1998-06-07', NULL, 0, 'member', '2014-04-10 21:17:09', '2014-04-11 18:17:09', NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` varchar(200) NOT NULL,
  `video_image` varchar(300) NOT NULL,
  `video_title` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_shortdescription` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `video_createdate` datetime NOT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_id`, `video_image`, `video_title`, `video_shortdescription`, `video_description`, `video_createdate`, `hot`, `active`, `view`) VALUES
(5, '1Vk_1ThE0Qc', 'http://img.youtube.com/vi/1Vk_1ThE0Qc/hqdefault.jpg', 'Liên khúc nhạc trẻ', 'Liên khúc nhạc trẻ', '<p>Li&ecirc;n kh&uacute;c nhạc trẻ</p>\r\n', '2014-06-12 14:29:13', 1, 0, 2),
(6, 'WUSuO_DSuls', 'http://img.youtube.com/vi/WUSuO_DSuls/hqdefault.jpg', 'Những Bài Hát Hay Nhất của MODERN TALKING', 'Những Bài Hát Hay Nhất của MODERN TALKING', '<h1><span dir="ltr" style="font-size:0.9em">Những B&agrave;i H&aacute;t Hay Nhất của MODERN TALKING</span></h1>\r\n', '2014-06-12 14:09:07', 0, 0, 2),
(7, 'ZkiFg1v3fsY', 'http://img.youtube.com/vi/ZkiFg1v3fsY/hqdefault.jpg', 'Những ca khúc hay nhất của westlife', 'Những ca khúc hay nhất của westlife', '<p><a class="related-video spf-link  yt-uix-sessionlink" href="https://www.youtube.com/watch?v=ZkiFg1v3fsY" style="margin: 0px; padding: 0px 5px; border: 0px; cursor: pointer; color: rgb(51, 51, 51); text-decoration: none; position: relative; display: block; overflow: hidden; zoom: 1; font-family: arial, sans-serif; line-height: 13px; background-image: initial; background-attachment: initial; background-size: initial; background-origin: initial; background-clip: initial; background-position: initial; background-repeat: initial;"><strong>Những ca kh&uacute;c hay nhất của westlife</strong></a></p>\r\n', '2014-06-12 14:09:42', 0, 0, 0),
(8, '_6ngNGWiBlA', 'http://img.youtube.com/vi/_6ngNGWiBlA/hqdefault.jpg', 'Liên khúc nhạc thập niên 80', 'Liên khúc nhạc thập niên 80', '<p>Li&ecirc;n kh&uacute;c nhạc thập ni&ecirc;n 80</p>\r\n', '2014-06-12 14:10:43', 0, 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
