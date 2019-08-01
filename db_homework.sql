-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 01, 2019 at 11:24 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_homework3`
--

-- --------------------------------------------------------

--
-- Table structure for table `constraintlabel`
--

CREATE TABLE `constraintlabel` (
  `id` int(11) NOT NULL,
  `nameApp` text NOT NULL,
  `l1` text NOT NULL,
  `title` text NOT NULL,
  `des` text NOT NULL,
  `r1` text NOT NULL,
  `r2` text NOT NULL,
  `r3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `constraintlabel`
--

INSERT INTO `constraintlabel` (`id`, `nameApp`, `l1`, `title`, `des`, `r1`, `r2`, `r3`) VALUES
(1, 'OBE Syllabus Builder', 'Bloom\'s Taxonomy of Cognitive Outcomes', 'My Syllabus', 'Click and type your syllabus here.', 'Intended learning Outcomes', 'Outcome-based Assessment', 'Teaching and Learning');

-- --------------------------------------------------------

--
-- Table structure for table `constraintlabel_vi`
--

CREATE TABLE `constraintlabel_vi` (
  `id` int(11) NOT NULL,
  `nameApp` text NOT NULL,
  `l1` text NOT NULL,
  `title` text NOT NULL,
  `des` text NOT NULL,
  `r1` text NOT NULL,
  `r2` text NOT NULL,
  `r3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `constraintlabel_vi`
--

INSERT INTO `constraintlabel_vi` (`id`, `nameApp`, `l1`, `title`, `des`, `r1`, `r2`, `r3`) VALUES
(1, 'Hệ thống hỗ trợ xây dựng đề cương', 'Phân loại tư duy của Bloom về kết quả nhận thức', 'Đề cương', 'Chọn và gõ đề cương của bạn ở đây.', 'Kết quả học tập dự định', 'Đánh giá dựa trên kết quả', 'Dạy và học');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `idLevel` int(11) NOT NULL,
  `nameLevel` varchar(99) NOT NULL,
  `descriptionLevel` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`idLevel`, `nameLevel`, `descriptionLevel`) VALUES
(1, 'Remembering', 'After class or programme,learner will be able to: Retrieve relevant knowledge from long-term memory'),
(2, 'Understanding', 'After class or programme, learner will be able to: Construct meaning from instructional messages'),
(3, 'Applying', 'After class or programme, learner will be able to: Carry out or use a procedure in a given situation'),
(4, 'Analysing', 'After class or programme, learner will be able to: Detemine how the parts relate to one another and to an overall structure'),
(5, 'Evaluating', 'After class or programme, learner will be able to: Make judgements based on criteria and standards'),
(6, 'Creating', 'After class or programme, learner will be able to: Reorganise elements into a new pattern');

-- --------------------------------------------------------

--
-- Table structure for table `levels_vi`
--

CREATE TABLE `levels_vi` (
  `idLevel` int(11) NOT NULL,
  `nameLevel` varchar(99) NOT NULL,
  `descriptionLevel` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels_vi`
--

INSERT INTO `levels_vi` (`idLevel`, `nameLevel`, `descriptionLevel`) VALUES
(1, 'Ghi nhớ', 'Sau chương trình này, người học có thế: Lấy kiến thức từ các tài liệu'),
(2, 'Hiểu', 'Sau chương trình này, người học có thế hiểu rõ kiến thức từ tài liệu, bài giảng'),
(3, 'Áp dụng', 'Sau chương trình này, người học có thế: Thực hiện hay sử dụng một quy trình trong một tình huống nhất định'),
(4, 'Phân tích', 'Sau chương trình này, người học có thế: Xác định sự liên quan các kiến thức với nhau và cấu trúc tổng thế'),
(5, 'Đánh giá', 'Sau chương trình này, người học có thế: Đánh giá dựa trên các tiêu chí và tiêu chuẩn'),
(6, 'Sáng tạo', 'Sau chương trình này, người học có thế: sắp xếp các yếu tố để tạo thành mô hình mới');

-- --------------------------------------------------------

--
-- Table structure for table `methods`
--

CREATE TABLE `methods` (
  `idMethod` int(11) NOT NULL,
  `idTemplate` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `nameMethod` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `methods`
--

INSERT INTO `methods` (`idMethod`, `idTemplate`, `idLevel`, `nameMethod`) VALUES
(1, 1, 1, 'Arrange'),
(2, 1, 1, 'Collect'),
(3, 1, 1, 'Define'),
(4, 1, 1, 'Describe'),
(5, 1, 1, 'Identify'),
(6, 1, 1, 'Locate'),
(7, 1, 1, 'List'),
(8, 1, 1, 'Name'),
(9, 1, 1, 'Recall'),
(10, 1, 1, 'Recognise'),
(11, 1, 2, 'Contrast'),
(12, 1, 2, 'Distinguish'),
(13, 1, 2, 'Explain'),
(14, 1, 2, 'Exemplify'),
(15, 1, 2, 'Infer'),
(16, 1, 2, 'Interpret'),
(17, 1, 2, 'Summarise'),
(18, 1, 3, 'Construct'),
(19, 1, 3, 'Demonstrate'),
(20, 1, 3, 'Execute'),
(21, 1, 3, 'Illustrate'),
(22, 1, 3, 'Implement'),
(23, 1, 3, 'Predict'),
(24, 1, 3, 'Examine'),
(25, 1, 4, 'Analyse'),
(26, 1, 4, 'Attribute'),
(27, 1, 4, 'Calculate'),
(28, 1, 4, 'Compare'),
(29, 1, 4, 'Contrast'),
(30, 1, 4, 'Deconstruct'),
(31, 1, 4, 'Differentiate'),
(32, 1, 4, 'Discriminate'),
(33, 1, 4, 'Organise'),
(34, 1, 4, 'Outline'),
(35, 1, 5, 'Argue'),
(36, 1, 5, 'Assess'),
(37, 1, 5, 'Check'),
(38, 1, 5, 'Conclude'),
(39, 1, 5, 'Critique'),
(40, 1, 5, 'Estimate'),
(41, 1, 5, 'Evaluate'),
(42, 1, 5, 'Justify'),
(43, 1, 5, 'Prove'),
(44, 1, 5, 'Recommend'),
(45, 1, 6, 'Assemble'),
(46, 1, 6, 'Composing'),
(47, 1, 6, 'Construct'),
(48, 1, 6, 'Create'),
(49, 1, 6, 'Design'),
(50, 1, 6, 'Formulate'),
(51, 1, 6, 'Generate'),
(52, 1, 6, 'Plan'),
(53, 1, 6, 'Produce'),
(54, 1, 6, 'Substitute'),
(55, 2, 1, 'Fill-in the blanks'),
(56, 2, 1, 'Multiple choice'),
(57, 2, 1, 'Labeling diagrams'),
(58, 2, 1, 'Reciting'),
(59, 2, 2, 'Oral/written exam questions'),
(60, 2, 2, 'Concept maps'),
(61, 2, 2, 'Summarizing'),
(62, 2, 2, 'Comparing and/or contrasting'),
(63, 2, 2, 'Classifying or categorizing'),
(64, 2, 2, 'Paraphrasing'),
(65, 2, 2, 'Explaining and/or elaborating'),
(66, 2, 3, 'Problem sets'),
(67, 2, 3, 'Performances'),
(68, 2, 3, 'Labs'),
(69, 2, 3, 'Prototype presentations'),
(70, 2, 3, 'Simulations'),
(71, 2, 4, 'Lectures'),
(72, 2, 4, 'Discussions'),
(73, 2, 4, 'Case studies'),
(74, 2, 4, 'Writing'),
(75, 2, 4, 'Labs'),
(76, 2, 4, 'Group projects'),
(77, 2, 5, 'Journals'),
(78, 2, 5, 'Diaries'),
(79, 2, 5, 'Critiques'),
(80, 2, 5, 'Problem sets'),
(81, 2, 5, 'Product reviews'),
(82, 2, 5, 'Case studies'),
(83, 2, 5, 'Research project reports'),
(84, 2, 5, 'Research project self assessments'),
(85, 2, 5, 'Research project peer assessments'),
(86, 2, 5, 'Research project presentations'),
(87, 2, 6, 'Research project reports'),
(88, 2, 6, 'Research project presentations'),
(89, 2, 6, 'Research project self assessments'),
(90, 2, 6, 'Research project peer assessments'),
(91, 2, 6, 'Musical compositions'),
(92, 2, 6, 'Performances'),
(93, 2, 6, 'Essays'),
(94, 2, 6, 'Business plans'),
(95, 2, 6, 'Website designs'),
(96, 2, 6, 'Prototype presentations'),
(97, 2, 6, 'Set designs'),
(98, 3, 1, 'Lectures'),
(99, 3, 1, 'Discussions'),
(100, 3, 2, 'Lectures'),
(101, 3, 2, 'Discussions'),
(102, 3, 3, 'Lectures'),
(103, 3, 3, 'Discussions'),
(104, 3, 3, 'Case studies'),
(105, 3, 3, 'Writing'),
(106, 3, 3, 'Labs'),
(107, 3, 3, 'Group projects'),
(108, 3, 4, 'Lectures'),
(109, 3, 4, 'Discussions'),
(110, 3, 4, 'Case studies'),
(111, 3, 4, 'Writing'),
(112, 3, 4, 'Labs'),
(113, 3, 4, 'Group projects'),
(114, 3, 5, 'Lectures'),
(115, 3, 5, 'Discussions'),
(116, 3, 5, 'Case studies'),
(117, 3, 5, 'Writing'),
(118, 3, 5, 'Labs'),
(119, 3, 5, 'Group projects'),
(120, 3, 6, 'Lectures'),
(121, 3, 6, 'Discussions'),
(122, 3, 6, 'Case studies'),
(123, 3, 6, 'Writing'),
(124, 3, 6, 'Labs'),
(125, 3, 6, 'Group projects');

-- --------------------------------------------------------

--
-- Table structure for table `methods_vi`
--

CREATE TABLE `methods_vi` (
  `idMethod` int(11) NOT NULL,
  `idTemplate` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `nameMethod` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `methods_vi`
--

INSERT INTO `methods_vi` (`idMethod`, `idTemplate`, `idLevel`, `nameMethod`) VALUES
(1, 1, 1, 'Sắp xếp'),
(2, 1, 1, 'Sưu tầm'),
(3, 1, 1, 'Định nghĩa'),
(4, 1, 1, 'Miêu tả'),
(5, 1, 1, 'Nhận định'),
(6, 1, 1, 'Định vị'),
(7, 1, 1, 'Danh sách'),
(8, 1, 1, 'Tên'),
(9, 1, 1, 'Nhớ lại'),
(10, 1, 1, 'Nhìn nhận'),
(11, 1, 2, 'Tương phản'),
(12, 1, 2, 'Phân biệt'),
(13, 1, 2, 'Giải thích'),
(14, 1, 2, 'Nêu gương'),
(15, 1, 2, 'Suy luận'),
(16, 1, 2, 'Thông dịch'),
(17, 1, 2, 'Tóm tắt'),
(18, 1, 3, 'Xây dựng'),
(19, 1, 3, 'Chứng minh'),
(20, 1, 3, 'Thực thi'),
(21, 1, 3, 'Minh họa'),
(22, 1, 3, 'Triển khai'),
(23, 1, 3, 'Dự đoán'),
(24, 1, 3, 'Xem xét'),
(25, 1, 4, 'Phân tích'),
(26, 1, 4, 'Thuộc tính'),
(27, 1, 4, 'Tính toán'),
(28, 1, 4, 'So sánh'),
(29, 1, 4, 'Tương phản'),
(30, 1, 4, 'Chứng minh'),
(31, 1, 4, 'Phân biệt'),
(32, 1, 4, 'Phân biệt'),
(33, 1, 4, 'Tổ chức'),
(34, 1, 4, 'Đề cương'),
(35, 1, 5, 'Tranh cãi'),
(36, 1, 5, 'Đánh giá'),
(37, 1, 5, 'Kiểm tra'),
(38, 1, 5, 'Kết luận'),
(39, 1, 5, 'Phê bình'),
(40, 1, 5, 'Ước lượng'),
(41, 1, 5, 'Đánh giá'),
(42, 1, 5, 'Biện minh'),
(43, 1, 5, 'Chứng tỏ'),
(44, 1, 5, 'Giới thiệu'),
(45, 1, 6, 'Tập hợp'),
(46, 1, 6, 'Sáng tạo'),
(47, 1, 6, 'Xây dựng'),
(48, 1, 6, 'Tạo'),
(49, 1, 6, 'Thiết kế'),
(50, 1, 6, 'Công thức'),
(51, 1, 6, 'Tạo'),
(52, 1, 6, 'Kế hoạch'),
(53, 1, 6, 'Sản xuất'),
(54, 1, 6, 'Thay thế'),
(55, 2, 1, 'Điền vào chỗ trống'),
(56, 2, 1, 'Nhiều lựa chọn'),
(57, 2, 1, 'Sơ đồ ghi nhãn'),
(58, 2, 1, 'Đọc thuộc lòng'),
(59, 2, 2, 'Đề thi vẫn đáp'),
(60, 2, 2, 'Bản đồ khái niệm'),
(61, 2, 2, 'Tóm tắt'),
(62, 2, 2, 'So sánh và/hoặc tương phản'),
(63, 2, 2, 'Phân loại'),
(64, 2, 2, 'Diễn giải'),
(65, 2, 2, 'Giải thích và/hoặc xây dựng'),
(66, 2, 3, 'Bộ vấn đề'),
(67, 2, 3, 'Trình bày'),
(68, 2, 3, 'Phòng thí nghiệm'),
(69, 2, 3, 'Trình bày nguyên mẫu'),
(70, 2, 3, 'Mô phỏng'),
(71, 2, 4, 'Bài giảng'),
(72, 2, 4, 'Thảo luận'),
(73, 2, 4, 'Nghiên cứu điển hình'),
(74, 2, 4, 'Viết'),
(75, 2, 4, 'Phòng thí nghiệm'),
(76, 2, 4, 'Các nhóm dự án'),
(77, 2, 5, 'Báo hằng ngày'),
(78, 2, 5, 'Sổ nhật kí'),
(79, 2, 5, 'Phê bình'),
(80, 2, 5, 'Bộ vấn đề'),
(81, 2, 5, 'Giới thiệu sản phẩm'),
(82, 2, 5, 'Nghiên cứu điển hình'),
(83, 2, 5, 'Báo cáo dự án nghiên cứu'),
(84, 2, 5, 'Tự đánh giá dự án nghiên cứu'),
(85, 2, 5, 'Đánh giá dự án nghiên cứu ngang hàng'),
(86, 2, 5, 'Thuyết trình dự án nghiên cứu'),
(87, 2, 6, 'Báo cá dự án nghiên cứu'),
(88, 2, 6, 'Thuyết trình dự án nghiên cứu'),
(89, 2, 6, 'Tự đánh giá dự án nghiên cứu'),
(90, 2, 6, 'Đánh giá dự án nghiên cứu ngang hàng'),
(91, 2, 6, 'Sáng tác nhạc'),
(92, 2, 6, 'Biểu diễn'),
(93, 2, 6, 'Tiểu luận'),
(94, 2, 6, 'Kế hoạch kinh doanh'),
(95, 2, 6, 'Thiết kế trang web'),
(96, 2, 6, 'Trình bày nguyên mẫu'),
(97, 2, 6, 'Đặt thiết kế'),
(98, 3, 1, 'Bài giảng'),
(99, 3, 1, 'Thảo luận'),
(100, 3, 2, 'Bài giảng'),
(101, 3, 2, 'Thảo luận'),
(102, 3, 3, 'Bài giảng'),
(103, 3, 3, 'Thảo luận'),
(104, 3, 3, 'Nghiên cứu điển hình'),
(105, 3, 3, 'Viết'),
(106, 3, 3, 'Phòng thí nghiệm'),
(107, 3, 3, 'Các nhóm dự án'),
(108, 3, 4, 'Bài giảng'),
(109, 3, 4, 'Thảo luận'),
(110, 3, 4, 'Nghiên cứu điển hình'),
(111, 3, 4, 'Viết'),
(112, 3, 4, 'Phòng thí nghiệm'),
(113, 3, 4, 'Các nhóm dự án'),
(114, 3, 5, 'Bài giảng'),
(115, 3, 5, 'Thảo luận'),
(116, 3, 5, 'Nghiên cứu điển hình'),
(117, 3, 5, 'Viết'),
(118, 3, 5, 'Phòng thí nghiệm'),
(119, 3, 5, 'Các nhóm dự án'),
(120, 3, 6, 'Bài giảng'),
(121, 3, 6, 'Thảo luận'),
(122, 3, 6, 'Nghiên cứu điển hình'),
(123, 3, 6, 'Viết'),
(124, 3, 6, 'Phòng thí nghiệm'),
(125, 3, 6, 'Các nhóm dự án');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggests`
--

CREATE TABLE `suggests` (
  `idTemplate` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `title` text NOT NULL,
  `descriptionSuggest` text NOT NULL,
  `example` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggests`
--

INSERT INTO `suggests` (`idTemplate`, `idLevel`, `title`, `descriptionSuggest`, `example`) VALUES
(1, 1, 'Action verbs for ILO statements', 'Select and click on the action verbs for your statements', 'List the steps for task analysis.\r\nName the symptoms for Parkinson Disease.\r\nDefine the term \'progress\' as used by military strategists'),
(1, 2, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'Summarize the main points of political argument.\r\nIdentify the concepts used in organisational development.\r\nSummarise the email etiquettes for business communication'),
(1, 3, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'Use MS PowerPoint to create an interactive presentation.\r\nIllustrate the main constructs of social learning theory.\r\nEstablish a set of rules that can be used to mitigate spam in small office settings'),
(1, 4, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'Identify different logical and structural components of an argument.\nDifferentiate between constructivism and social learning theory.\nCompare and contrast the strengths and weaknesses of a  political debate by employing linguistic analysis.'),
(1, 5, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'Effectively evaluate research designs, methods, and conclusions.\nAssess their own strengths, weaknesses, and omissions.\nProve the validity of financial reports using XYZ analysis.\n'),
(1, 6, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'Effectively communicate both formally and informally through speaking, writing and listening.\nAdjust future performance in light of their self-assessments.\nWrite a company operation manual to reduce energy consumption.'),
(2, 1, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Asking students about the definition of sustainability given by the Brundtland Commission'),
(2, 2, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Asking students to illustrate the process of how melamine affects human kidneys.'),
(2, 3, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Conducting a lab for students to apply their understanding of microbiology to identify an unknown bacteria.'),
(2, 4, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Developing a case study about the financial crisis of 2008 to let students analyse its global impacts.'),
(2, 5, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Requesting students to compose a personal journal for their group projects, which includes literature review, team dynamics and progress.'),
(2, 6, 'Suggested assessment types', 'Select and click on the assessment types for your outcome-based syllabus', 'Asking students to design a business plan for a declining business in Hong Kong.'),
(3, 1, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Conducting a lecture about different definitions of sustainability'),
(3, 2, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Conducting a discussion about how melamine affects human kidneys after lecturing about its molecular structure.'),
(3, 3, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Conducting an experiment on the signal transmission of nerve fibers in frogs.'),
(3, 4, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Asking students to analyse the global impact of the 2008 financial crisis and write an essay about it.'),
(3, 5, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Conducting a discussion about the post-1997 societal development of Hong Kong.'),
(3, 6, 'Suggested assessment teaching and learning activitites', 'Select and click on the activities types for your outcome-based syllabus', 'Asking students to design a business plan for a declining business in Hong Kong.');

-- --------------------------------------------------------

--
-- Table structure for table `suggests_vi`
--

CREATE TABLE `suggests_vi` (
  `idTemplate` int(11) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `title` mediumtext NOT NULL,
  `descriptionSuggest` mediumtext NOT NULL,
  `example` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggests_vi`
--

INSERT INTO `suggests_vi` (`idTemplate`, `idLevel`, `title`, `descriptionSuggest`, `example`) VALUES
(1, 1, 'Động từ hành động cho câu lệnh ILO', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Liệt kê các bước để phân tích nhiệm vụ.\r\nKể tên các triệu chứng của bệnh Parkinson.\r\nXác định thuật ngữ \'tiến bộ\' được sử dụng bởi các chiến lược gia quân sự'),
(1, 2, 'Động từ hành động cho câu lệnh ILO', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Tóm tắt những điểm chính của lập luận chính trị.\r\nXác định các khái niệm được sử dụng trong phát triển tổ chức.\r\nTóm tắt các nghi thức email cho giao tiếp kinh doanh.'),
(1, 3, 'Động từ hành động cho câu lệnh ILO', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Sử dụng MS PowerPoint để tạo một bản trình bày tương tác.\r\nMinh họa các cấu trúc chính của lý thuyết học tập xã hội.\r\nThiết lập một bộ quy tắc có thể được sử dụng để giảm thiểu thư rác trong các cài đặt văn phòng nhỏ'),
(1, 4, 'Động từ hành động cho câu lệnh ILO', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Xác định các thành phần logic và cấu trúc khác nhau của một đối số.\r\nPhân biệt giữa kiến ​​tạo và lý thuyết học tập xã hội.\r\nSo sánh và đối chiếu những điểm mạnh và điểm yếu của một cuộc tranh luận chính trị bằng cách sử dụng phân tích ngôn ngữ.'),
(1, 5, 'Động từ hành động cho câu lệnh ILO', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Đánh giá hiệu quả thiết kế nghiên cứu, phương pháp và kết luận.\r\nĐánh giá điểm mạnh, điểm yếu và thiếu sót của chính họ.\r\nChứng minh tính hợp lệ của các báo cáo tài chính bằng phân tích XYZ.'),
(1, 6, 'Động từ hành động cho câu lệnh ILO   ', 'Chọn và nhấp vào các động từ hành động cho câu lệnh của bạn', 'Giao tiếp hiệu quả cả chính thức và không chính thức thông qua nói, viết và nghe.\r\nĐiều chỉnh hiệu suất trong tương lai theo ánh sáng tự đánh giá của họ.\r\nViết hướng dẫn vận hành công ty để giảm tiêu thụ năng lượng.'),
(2, 1, 'Các loại đánh giá đề xuất', 'Chọn và nhấp vào các loại đánh giá cho giáo trình dựa trên kết quả của bạn', 'Hỏi sinh viên về định nghĩa bền vững được đưa ra bởi Ủy ban Brundtland.'),
(2, 2, 'Các loại đánh giá đề xuất ', 'Chọn và nhấp vào các loại đánh giá cho giáo trình dựa trên kết quả của bạn', 'Yêu cầu học sinh minh họa quá trình melamine ảnh hưởng đến thận của con người như thế nào.'),
(2, 3, 'Các loại đánh giá đề xuất', 'Chọn và nhấp vào các loại đánh giá cho giáo trình dựa trên kết quả của bạn', 'Tiến hành một phòng thí nghiệm cho sinh viên áp dụng hiểu biết của họ về vi sinh để xác định một loại vi khuẩn chưa biết.'),
(2, 4, 'Các loại đánh giá đề xuất ', 'Chọn và nhấp vào các loại đánh giá cho giáo trình dựa trên kết quả của bạn', 'Phát triển một nghiên cứu trường hợp về cuộc khủng hoảng tài chính năm 2008 để cho sinh viên phân tích các tác động toàn cầu của nó.'),
(2, 5, 'Các loại đánh giá đề xuất ', 'Chọn và nhấp vào các loại đánh giá cho giáo trình dựa trên kết quả của bạn', 'Yêu cầu sinh viên soạn một tạp chí cá nhân cho các dự án nhóm của họ, bao gồm đánh giá tài liệu, động lực nhóm và tiến bộ.'),
(3, 1, 'Đề nghị đánh giá hoạt động dạy và học', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn', 'Thực hiện một bài giảng về các định nghĩa khác nhau về tính bền vững.'),
(3, 2, 'Đề nghị đánh giá hoạt động dạy và học', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn\r\n', 'Tiến hành một cuộc thảo luận về cách melamine ảnh hưởng đến thận của con người sau khi giảng về cấu trúc phân tử của nó.'),
(3, 3, 'Đề nghị đánh giá hoạt động dạy và học ', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn', 'Tiến hành một thí nghiệm về việc truyền tín hiệu của các sợi thần kinh ở ếch.'),
(3, 4, 'Đề nghị đánh giá hoạt động dạy và học    ', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn', 'Yêu cầu sinh viên phân tích tác động toàn cầu của cuộc khủng hoảng tài chính năm 2008 và viết một bài luận về nó.'),
(3, 5, 'Đề nghị đánh giá hoạt động dạy và học    ', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn', 'Tiến hành một cuộc thảo luận về sự phát triển xã hội sau năm 1997 của Hồng Kông.'),
(3, 6, 'Đề nghị đánh giá hoạt động dạy và học', 'Chọn và nhấp vào các loại hoạt động cho giáo trình dựa trên kết quả của bạn', 'Asking students to design a business plan for a declining business in Hong Kong.');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `idSyllabus` int(11) NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `nameSyllabus` text NOT NULL,
  `intended` text,
  `OutcomeBased` text,
  `Teaching` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `idTemplate` int(11) NOT NULL,
  `headContent` varchar(99) DEFAULT NULL,
  `nameTemplate` varchar(99) NOT NULL,
  `descriptionTemplate` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`idTemplate`, `headContent`, `nameTemplate`, `descriptionTemplate`) VALUES
(1, 'Bloom\'s Taxonomy of Cognitive Outcomes', 'ILO', NULL),
(2, 'Bloom\'s Taxonomy of Cognitive Outcomes', 'OBA', 'Decide and click on the cognitive level of your learning outcomes'),
(3, 'Bloom\'s Taxonomy of Cognitive Outcomes', 'TLA', 'Decide and click on the cognitive level of your learning outcomes');

-- --------------------------------------------------------

--
-- Table structure for table `templates_vi`
--

CREATE TABLE `templates_vi` (
  `idTemplate` int(11) NOT NULL,
  `headContent` varchar(99) NOT NULL,
  `nameTemplate` varchar(99) NOT NULL,
  `descriptionTemplate` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templates_vi`
--

INSERT INTO `templates_vi` (`idTemplate`, `headContent`, `nameTemplate`, `descriptionTemplate`) VALUES
(1, 'Phân loại tư duy của Bloom về kết quả nhận thức', 'ILO', ''),
(2, 'Phân loại tư duy của Bloom về kết quả nhận thức', 'OBA', 'Quyết định và nhấp vào cấp độ nhận thức về kết quả học tập của bạn.'),
(3, 'Phân loại tư duy của Bloom về kết quả nhận thức', 'TLA', 'Quyết định và nhấp vào cấp độ nhận thức về kết quả học tập của bạn.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$jdL8vuK.4YuBASmJrbfSROZqUP.qpNZk95mQ07Ek4E8dISAZvAw3C', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `constraintlabel`
--
ALTER TABLE `constraintlabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constraintlabel_vi`
--
ALTER TABLE `constraintlabel_vi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `levels_vi`
--
ALTER TABLE `levels_vi`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`idMethod`,`idTemplate`,`idLevel`),
  ADD KEY `fk_methods_templates_idx` (`idTemplate`),
  ADD KEY `fk_metthods_level_idx` (`idLevel`);

--
-- Indexes for table `methods_vi`
--
ALTER TABLE `methods_vi`
  ADD PRIMARY KEY (`idMethod`,`idTemplate`,`idLevel`),
  ADD KEY `idLevel` (`idLevel`),
  ADD KEY `idTemplate` (`idTemplate`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `suggests`
--
ALTER TABLE `suggests`
  ADD PRIMARY KEY (`idTemplate`,`idLevel`),
  ADD KEY `fk_suggest_level_idx` (`idLevel`);

--
-- Indexes for table `suggests_vi`
--
ALTER TABLE `suggests_vi`
  ADD PRIMARY KEY (`idTemplate`,`idLevel`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`idSyllabus`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`idTemplate`);

--
-- Indexes for table `templates_vi`
--
ALTER TABLE `templates_vi`
  ADD PRIMARY KEY (`idTemplate`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `levels_vi`
--
ALTER TABLE `levels_vi`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `idMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `methods_vi`
--
ALTER TABLE `methods_vi`
  MODIFY `idMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `idSyllabus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `idTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `templates_vi`
--
ALTER TABLE `templates_vi`
  MODIFY `idTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `methods`
--
ALTER TABLE `methods`
  ADD CONSTRAINT `fk_methods_templates` FOREIGN KEY (`idTemplate`) REFERENCES `templates` (`idTemplate`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_metthods_level` FOREIGN KEY (`idLevel`) REFERENCES `levels` (`idLevel`) ON UPDATE CASCADE;

--
-- Constraints for table `methods_vi`
--
ALTER TABLE `methods_vi`
  ADD CONSTRAINT `methods_vi_ibfk_1` FOREIGN KEY (`idLevel`) REFERENCES `levels_vi` (`idLevel`),
  ADD CONSTRAINT `methods_vi_ibfk_2` FOREIGN KEY (`idTemplate`) REFERENCES `templates_vi` (`idTemplate`);

--
-- Constraints for table `suggests`
--
ALTER TABLE `suggests`
  ADD CONSTRAINT `fk_suggest_level` FOREIGN KEY (`idLevel`) REFERENCES `levels` (`idLevel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_suggest_tempalte` FOREIGN KEY (`idTemplate`) REFERENCES `templates` (`idTemplate`);

--
-- Constraints for table `suggests_vi`
--
ALTER TABLE `suggests_vi`
  ADD CONSTRAINT `suggests_vi_ibfk_1` FOREIGN KEY (`idLevel`) REFERENCES `levels_vi` (`idLevel`),
  ADD CONSTRAINT `suggests_vi_ibfk_2` FOREIGN KEY (`idTemplate`) REFERENCES `templates_vi` (`idTemplate`);

--
-- Constraints for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD CONSTRAINT `syllabus_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
