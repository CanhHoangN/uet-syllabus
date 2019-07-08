-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2019 at 09:20 AM
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
-- Database: `db_homework`
--

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Action verbs for ILO statements.', 'Select and click on the action verbs for your statements', 'List the steps for task analysis.\nName the symptoms for Parkinson Disease.\nDefine the term \'progress\' as used by military strategists.'),
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
-- Table structure for table `Syllabus`
--

CREATE TABLE `Syllabus` (
  `idSyllabus` int(11) NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `nameSyllabus` text NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Syllabus`
--

INSERT INTO `Syllabus` (`idSyllabus`, `idUser`, `nameSyllabus`, `content`, `updated_at`, `created_at`) VALUES
(1, 2, 'hehe', '<html><div class=\"text-box\">\n        <label id=\"ILO\">Intended Learning Outcomes</label>\n        <p>Describe\r\nDescribe\r\nDescribe</p>\n        <label id=\"OBA\">Outcome-based Assessment</label>\n        <p>Critiques\r\nCritiques</p>\n\n        <label id=\"TAL\">Teaching and Learning.</label>\n        <p>Writing\r\nWriting\r\nWriting\r\nWriting</p>', '2019-07-08 00:15:01', '2019-07-08 00:15:01'),
(2, 2, 'hihi', '<html><div class=\"text-box\">\n        <label id=\"ILO\">Intended Learning Outcomes</label>\n        <p>Describe\r\nDescribe\r\nDescribe</p>\n        <label id=\"OBA\">Outcome-based Assessment</label>\n        <p>Fill-in the blanks\r\nFill-in the blanks\r\nFill-in the blanks</p>\n\n        <label id=\"TAL\">Teaching and Learning.</label>\n        <p>Discussions\r\nDiscussions\r\nDiscussions</p>', '2019-07-08 00:15:54', '2019-07-08 00:15:54');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dang Liem', 'dangliem.uet@gmail.com', NULL, '$2y$10$WFYsEEN0kCVBa.Oe3xQaruZqdsB3a0SLg9wXysu17folv6SDPsdSe', 1, NULL, '2019-07-02 10:20:47', '2019-07-02 10:20:47'),
(2, 'Ngoc', 'nguyenkhacngoc089@gmail.com', NULL, '$2y$10$k5ra67rmAD7ZkjAHZ0LVju3lqeyPHdF.WE6c0IYBU5E1QnGM7Quje', 0, NULL, '2019-07-08 00:12:48', '2019-07-08 00:12:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `methods`
--
ALTER TABLE `methods`
  ADD PRIMARY KEY (`idMethod`,`idTemplate`,`idLevel`),
  ADD KEY `fk_methods_templates_idx` (`idTemplate`),
  ADD KEY `fk_metthods_level_idx` (`idLevel`);

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
-- Indexes for table `Syllabus`
--
ALTER TABLE `Syllabus`
  ADD PRIMARY KEY (`idSyllabus`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
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
-- AUTO_INCREMENT for table `methods`
--
ALTER TABLE `methods`
  MODIFY `idMethod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Syllabus`
--
ALTER TABLE `Syllabus`
  MODIFY `idSyllabus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `idTemplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `suggests`
--
ALTER TABLE `suggests`
  ADD CONSTRAINT `fk_suggest_level` FOREIGN KEY (`idLevel`) REFERENCES `levels` (`idLevel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_suggest_tempalte` FOREIGN KEY (`idTemplate`) REFERENCES `templates` (`idTemplate`);

--
-- Constraints for table `Syllabus`
--
ALTER TABLE `Syllabus`
  ADD CONSTRAINT `syllabus_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
