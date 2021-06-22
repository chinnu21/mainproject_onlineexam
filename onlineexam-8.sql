
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tbl_bank` (
  `id` int(11) NOT NULL,
  `nameoncard` varchar(45) DEFAULT NULL,
  `cardtype` varchar(45) DEFAULT NULL,
  `exp_month` varchar(45) DEFAULT NULL,
  `exp_year` varchar(45) DEFAULT NULL,
  `cvv` varchar(45) DEFAULT NULL,
  `balance` int(11) DEFAULT 5000,
  `cardno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bank`
--

INSERT INTO `tbl_bank` (`id`, `nameoncard`, `cardtype`, `exp_month`, `exp_year`, `cvv`, `balance`, `cardno`) VALUES
(4, 'ABC', 'visa', '06', '2024', '387', 44500, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `name` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `name`) VALUES
(4, 'BCA'),
(5, 'BTech'),
(7, 'MBA'),
(1, 'MCA'),
(8, 'mcom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(11) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `exam_date` varchar(15) DEFAULT NULL,
  `exam_time` varchar(10) DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `subject` int(11) DEFAULT NULL,
  `portion` varchar(100) DEFAULT NULL,
  `no_question` int(11) DEFAULT NULL,
  `exp_time` varchar(30) NOT NULL,
  `course` int(11) NOT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `title`, `exam_date`, `exam_time`, `duration`, `subject`, `portion`, `no_question`, `exp_time`, `course`, `sem`) VALUES
(6, 'dfsdfdsfrt', '2021-05-30', '13:00', '150', 1, '  fdfdfa', 20, '2021-05-30 15:30:00', 1, 1),
(7, 'frwfrw', '2021-06-15', '10:15:00', '200', 4, '   hitrfg', 50, '2021-06-15 13:35:00', 1, 1),
(8, 'rewrwr', '2021-05-30', '12:12:12', '75', 4, 'wrwerwr', 15, '2021-05-30 13:27:00', 1, 3),
(9, 'bvbcb', '2021-04-31', '15:15:15', '90', 12, ' cbcvbcbcv', 20, '2021-04-31 16:45:00', 1, 1),
(10, 'new exam', '2021-06-15', '19:00:00', '150', 1, 'Some portion', 20, '2021-06-15 19:15:00', 1, 4),
(11, 'algebra', '2021-06-07', '20:02', '40', 13, 'ueyiwer', 5, '2021-06-07 20:42:00', 1, 1),
(12, 'architecture', '2021-06-10', '11:55', '60', 13, 'module 4', 5, '2021-06-10 12:55:00', 1, 1),
(13, 'maths', '2021-06-09', '18:58', '40', 13, 'jhrew', 3, '2021-06-09 19:38:00', 1, 1),
(14, 'yyjfhj', '2021-06-26', '15:15:15', '65', 9, 'dfgdg', 54, '2021-06-26 16:20:00', 1, 1),
(15, 'abcd', '2021-06-10', '18:48', '30', 13, 'dff', 5, '2021-06-10 19:18:00', 1, 1),
(16, 'malayalam', '2021-06-13', '13:10', '30', -1, 'hief', 10, '2021-06-13 13:40:00', 1, 9),
(17, 'english', '2021-06-13', '13:13', '30', -1, 'module 1', 10, '2021-06-13 13:43:00', 7, 10),
(18, 'fffgg', '2021-07-05', '15:15:15', '35', 16, '   bdbff', 33, '2021-07-05 15:50:00', 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `userid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `qualification` varchar(30) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`userid`, `name`, `address`, `email`, `contact`, `dob`, `gender`, `photo`, `username`, `password`, `qualification`, `role`) VALUES
(1, 'cdfg', 'dsfsf', 'fac@gmail.com', '8956457845', '15-05-1986', 'Male', '', 'fac', 'fac', 'BTech', 'FACULTY'),
(2, 'annmariya', 'agjdddd', 'ann@gmail.com', '9888888888', '2004-12-16', 'Male', 'WIN_20210212_16_49_03_Pro3.jpg', 'hgeu', 'ann', 'mca', 'FACULTY'),
(3, 'laly', 'saju', 'laly@gmail.com', '9544798493', '2004-12-31', 'Female', 'WIN_20210212_16_49_03_Pro3.jpg', 'hfh', 'laly', 'jewhie', 'FACULTY'),
(4, 'shone', 'paul', 'shone@gmail.com', '9544798493', '2004-12-30', 'Male', 'WIN_20210212_16_49_03_Pro4.jpg', 'iew', 'shone', 'wfih', 'FACULTY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty_subject`
--

CREATE TABLE `tbl_faculty_subject` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `subject` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_faculty_subject`
--

INSERT INTO `tbl_faculty_subject` (`id`, `course`, `sem`, `subject`, `userid`) VALUES
(6, 1, 4, 1, 1),
(7, 1, 1, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedbacks`
--

CREATE TABLE `tbl_feedbacks` (
  `id` int(11) NOT NULL,
  `feedback` varchar(45) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `feedback_date` varchar(45) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedbacks`
--

INSERT INTO `tbl_feedbacks` (`id`, `feedback`, `userid`, `feedback_date`, `reply`) VALUES
(2, 'wqe', 2, '2021-03-15', 'sdfsdfsd'),
(3, 'ertertyty', 2, '2021-03-27', NULL),
(4, 'rterteyy', 2, '2021-03-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE `tbl_option` (
  `Id` int(11) NOT NULL,
  `question` int(11) NOT NULL,
  `option` varchar(50) NOT NULL,
  `is_answer` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`Id`, `question`, `option`, `is_answer`) VALUES
(6, 2, 'ghghghgh', 0),
(7, 2, 'fgfgg', 0),
(8, 3, 'gggs', 0),
(9, 3, 'fgtgg', 0),
(10, 3, 'dfgfgfg', 0),
(11, 3, 'fgfgfg', 0),
(12, 11, 'hdd', 0),
(13, 11, 'dtt', 0),
(14, 11, 'rtyy', 0),
(15, 12, 'fhhhh', 0),
(16, 12, 'ghhhd', 0),
(17, 12, 'ghhghg', 0),
(18, 12, 'fggg', 0),
(19, 16, 'gdhddd', 0),
(20, 16, 'dghdddg', 0),
(21, 16, 'dfdfgdfgdfgdfg', 0),
(22, 16, 'gddgdfgdfg', 0),
(23, 17, 'g', 0),
(24, 17, 'nkj', 0),
(25, 17, 'hh', 0),
(26, 17, 'hgj', 0),
(27, 18, 'gh', 0),
(28, 18, 'jk', 0),
(29, 18, 'hgjg', 0),
(30, 18, 'jhk', 0),
(31, 19, 'h', 0),
(32, 19, 'hgh', 0),
(33, 19, 'jdhk', 0),
(34, 19, 'uyi', 0),
(35, 20, 'g', 0),
(36, 20, 'jh', 0),
(37, 20, 'k', 0),
(38, 20, 'jh', 0),
(39, 21, 'kl', 0),
(40, 21, 'jwh', 0),
(41, 21, 'kw', 0),
(42, 21, 'owie', 0),
(43, 22, 'dhks', 0),
(44, 22, 'uu', 0),
(45, 22, 'ko', 0),
(46, 22, 'uye', 0),
(47, 22, 'iuw', 0),
(48, 23, 'hekw', 0),
(49, 23, 'edjh', 0),
(50, 23, 'jhjde', 0),
(51, 23, 'hed', 0),
(52, 24, 'hhi', 0),
(53, 24, 'j', 0),
(54, 24, 'kjl', 0),
(55, 24, 'uy', 0),
(56, 25, 'sd', 0),
(57, 25, 'sd', 0),
(58, 25, 'sdcd', 0),
(59, 25, 'ef', 0),
(60, 26, 'hg', 0),
(61, 26, 'huyi', 0),
(62, 26, 'gu', 0),
(63, 26, 'hgj', 0),
(64, 27, 'ghg', 0),
(65, 27, 'hg', 0),
(66, 27, 'jh', 0),
(67, 27, 'jhj', 0),
(68, 29, 'gjgj', 0),
(69, 29, 'uy', 0),
(70, 29, 'jhh', 0),
(71, 29, 'jhjhlk', 0),
(72, 29, 'hgg', 0),
(78, 30, 'rer', 0),
(79, 30, 'rfefre', 0),
(80, 30, 'rerer', 0),
(81, 30, 'rrtr', 0),
(82, 31, 'rere', 0),
(84, 31, 'erre', 0),
(85, 31, 'rerre', 0),
(86, 31, 'rerr', 0),
(88, 32, 'erer', 0),
(89, 32, 't', 0),
(90, 32, 'tr', 0),
(91, 32, 'e', 0),
(92, 32, 'ff', 0),
(93, 33, 'h', 0),
(94, 33, 'u', 0),
(95, 33, 'nn', 0),
(96, 33, 'uy', 0),
(97, 34, 'ee', 0),
(98, 34, 'tt', 0),
(99, 34, 'ee', 0),
(100, 34, 'gb', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `Id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `exam` int(11) NOT NULL,
  `paid_date` varchar(20) NOT NULL,
  `fee` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`Id`, `userid`, `exam`, `paid_date`, `fee`) VALUES
(1, 1, 9, '2021-05-30', '500'),
(2, 1, 6, '2021-05-30', '500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `qn` varchar(50) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `ans` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `qn`, `exam`, `ans`) VALUES
(2, 'thyryrrthrthrthrthrtbdfs', 6, 7),
(3, 'vccvv', 7, 11),
(11, 'dfsf', 8, 14),
(12, 'ghgh', 10, 18),
(13, 'jiffy', 8, -1),
(14, 'ghgh', 10, -1),
(15, 'fgdfgf', 7, -1),
(16, 'ghdgdgdgdfdgdfg', 10, 20),
(17, 'gkgj,', 11, 26),
(18, 'jhhl', 11, 30),
(19, 'iuljgj', 11, 34),
(20, 'yuire', 12, 36),
(21, 'hrieir', 12, 42),
(22, 'hiehr', 12, 47),
(23, 'jhkij', 12, 51),
(24, 'uui4yr', 12, 55),
(25, 'wdd', 13, 59),
(26, 'wedwe', 13, 63),
(27, 'efe', 13, 67),
(28, 'ee', 13, -1),
(29, 'ef', 13, 72),
(30, 'sdd', 15, 78),
(31, 'ddd', 15, 82),
(32, 'hhth', 15, 88),
(33, 'tyyt', 15, 93),
(34, 'tytrr', 15, 97);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `exam` int(11) DEFAULT NULL,
  `mark` varchar(5) DEFAULT NULL,
  `exam_date` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `userid`, `exam`, `mark`, `exam_date`) VALUES
(5, 1, 8, '3', '2021-05-30'),
(7, 1, 7, '0', '2021-05-30'),
(11, 7, 11, '0', '2021-06-07'),
(36, 8, 12, '2', '2021-06-10'),
(37, 7, 15, '2', '2021-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sem`
--

CREATE TABLE `tbl_sem` (
  `id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `sem` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sem`
--

INSERT INTO `tbl_sem` (`id`, `course`, `sem`) VALUES
(2, 4, 'Sem27'),
(3, 1, 'Sem2'),
(4, 1, 'Sem3'),
(5, 1, 'Sem4'),
(6, 1, 'Sem5'),
(8, 6, 'sem 1'),
(9, 1, 'sem 1'),
(10, 7, 'sem 1'),
(11, 8, 'sem 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `course`, `sem`) VALUES
(1, 'Algorthm', 4, 2),
(4, 'Networking', 1, 4),
(9, 'cvc', 1, 3),
(12, 'ccccccc', 1, 1),
(13, 'coa', 1, 1),
(15, 'langua', 7, 10),
(16, 'language', 7, 10),
(17, 'commerce', 8, 11),
(18, 'computer', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(1000) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `course` int(11) DEFAULT NULL,
  `sem` int(11) NOT NULL,
  `role` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `fname`, `lname`, `address`, `email`, `contact`, `dob`, `gender`, `photo`, `username`, `password`, `course`, `sem`, `role`) VALUES
(1, 'dff', 'dfdfsdsdfsfsfdfdf', 'sdfsdfsdf', 'test@gmail.com', '9652365214', '2004-12-02', 'Female', 'HMI-Palletizer-button-261.png', 'test', 'test', 1, 4, 'USER'),
(2, 'etetet', 'trt', 'ertertrtrert', 'werffe@gmail.com', '9652365745', '2004-12-04', 'Female', 'HMI-Palletizer-button-19.png', 'wwww', 'wwww', 4, 3, 'USER'),
(4, 'admin', 'admin', 'sdfsdfsdf', 'admin@gmail.com', '9652365214', '2004-12-02', 'Male', 'HMI-Palletizer-button-261.png', 'admin', 'admin', 0, 0, 'ADMIN'),
(6, 'vxv', 'fvfvfv', 'fsss', 'ttt@dddfd.ddfd', '7894563252', '2021-45-12', 'Male', '', 'dddd', 'dddd', 1, 1, 'USER'),
(7, 'chinnu', 'saju', 'jdhfilh.', 'chinnu@gmail.com', '9544798493', '2004-12-08', 'Male', 'WIN_20210212_16_48_49_Pro1.jpg', 'gjgj', 'chinnu', 1, 1, 'USER'),
(8, 'antony', 'babu', 'jheilwhife', 'antony@gmail.com', '9888888888', '2004-12-21', 'Male', 'WIN_20210212_16_49_03_Pro4.jpg', 'jewhfu', 'antony', 1, 1, 'USER'),
(9, 'fgrtwerewr', 'dfderewr', 'fgdf', 'qqq@ghj.nm', '7878787878', '19-05-1985', 'Male', '', 'qqq', 'qqq', 1, 5, 'USER'),
(10, 'fvvv', 'ffvfv', 'fvfvfsvfv', 'ggg@gmail.com', '9685968596', '2000-05-05', 'Male', '', 'ggg', 'ggg', 7, 10, 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_faculty_subject`
--
ALTER TABLE `tbl_faculty_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`,`course`,`sem`,`subject`);

--
-- Indexes for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sem`
--
ALTER TABLE `tbl_sem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`course`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_faculty_subject`
--
ALTER TABLE `tbl_faculty_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_feedbacks`
--
ALTER TABLE `tbl_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_option`
--
ALTER TABLE `tbl_option`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_sem`
--
ALTER TABLE `tbl_sem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

