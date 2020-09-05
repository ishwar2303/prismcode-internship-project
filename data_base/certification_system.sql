-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 10:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certification_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `attempt_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `fullname` char(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `quiz_id` int(50) NOT NULL,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `email` varchar(30) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profile_photo`
--

CREATE TABLE `profile_photo` (
  `image_id` int(11) NOT NULL,
  `image_name` text NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(350) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `answer` int(11) NOT NULL,
  `reason` varchar(400) DEFAULT 'No Explanation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`) VALUES
(99, 43, 'output : (  echo \"Hello World\"; )', 'HelloWorld', 'Hello World', 'helloworld', 'Syntax Error', 2, 'echo is used to print'),
(100, 43, 'which language code reside in php file', 'JAVA SCRIPT', 'HTML', 'CSS', 'All of the above', 4, '. (period is used to concatenate string)'),
(101, 43, 'php superglobal', '$_GET', '$_POST', '$_SESSION', 'none of these', 3, '$_SESSION array used to transfer data on multiple pages'),
(102, 43, 'intialize var = 5', 'var named variable is initialized with value = 5', 'var is a keyword cannot declare variable as var', 'syntax error all variable in php must start with $ symbol', 'based on different server', 3, '$ in prefix is must in PHP'),
(103, 43, 'full form of PHP', 'preprocessor hypertext protocol', 'hypertext preprocessor', 'post hypertext protocol', 'none of these', 2, 'no reason'),
(104, 46, 'The National chemical laboratory is located in', 'Mumbai', 'Bengaluru', 'Hyderabad', 'Pune', 4, 'no explanation'),
(105, 46, 'The Arjuna Awards were instituted in', '1965', '1963', '1961', '1975', 3, 'The Arjuna Awards are given by the Ministry of Youth Affairs and Sports'),
(106, 46, 'Which one of the following countries is not a member of OPEC?', 'Algeria', 'Indonesia', 'Malaysia', 'Nigeria', 3, 'Organization of the Petroleum Exporting Countries (OPEC)'),
(107, 46, 'The National school of Drama is situated in which of the following cities?', 'Mumbai', 'New Delhi', 'Bhopal', 'Kolkata', 2, 'no explanation'),
(108, 46, 'The radiant energy of Sun results from', 'Nuclear fusion', 'Nuclear fission', 'Cosmic radiation', 'Combustion', 1, 'no explanation'),
(109, 46, 'Parliament of which of the following days the world Human Rights Day is celebrated?', 'December 3', 'December 10', 'December 17', 'December 25', 2, 'no explanation'),
(110, 46, 'A noise level of 100 decibel would correspond to', 'Just audible sound', 'Ordinary conversation', 'Sound from a noisy street', 'Noise from a machine shop', 4, 'a unit used to measure the intensity of a sound'),
(111, 46, 'Fundamental Rights in India are guranteed by it through', 'The right of equality', 'Right against Exploitaion', 'Right to Constitutional Remedies', 'Educational and Cultural Rights', 3, 'no explanation'),
(112, 46, 'Tendons and ligaments are kind of ', 'Muscular tissue', 'Connective tissue', 'Epidermal tissue', 'Nervous tissue', 2, 'endons are strong and non-flexible while ligaments are flexible and elastic.'),
(113, 46, 'The first woman to climb mount Everest was', 'Marie Jose perec', 'Florence Griffith Joyner', 'Junko Tabei', 'Jackie Joyner Kersee', 3, 'Tabei was the first woman to summit Mt. Everest, the world\'s highest peak, in 1975.'),
(114, 47, '5 + 7 = ?', '10', '11', '12', '13', 3, 'addition'),
(115, 47, '8 - 3 = ?', '5', '6', '9', '0', 3, 'subtraction'),
(116, 47, '9 x 6 = ?', '45', '36', '72', '54', 4, 'multiplication'),
(117, 47, '100 / 25 = ?', '5', '4', '2', '10', 2, 'division'),
(118, 47, 'if a = 10, b=5, c=30 then a + b - c = ?', '5', '10', '-15', '30', 3, 'a+b that is 10 + 5 = 15\r\n15 - c = 15 - 30 = -15 result '),
(126, 67, 'who is founder of Haryanka Dynasty?', 'Ajatashatru', 'Harshvardhan', 'Bimbisara', 'Ghananand', 3, 'no explanation'),
(127, 67, 'The Rowlatt ACT was passed in : ', '1905', '1913', '1919', '1925', 3, 'no explanation'),
(128, 67, 'The East India Association was set up in :', '1866', '1857', '1836', '1885', 1, 'no explanation'),
(129, 67, 'The Indian National Congress passed Quit India Resolution at', '1942', '1934', '1939', '1940', 1, 'no explanation'),
(130, 67, 'Bande Matram was a series of articles published in the year 1907by:', 'Bal Gangadhar Tilak', 'Sir Aurobindo Ghosh', 'Domadar Chapekar', 'Balkrishana Chapekar', 2, 'no explanation'),
(167, 103, 'Predict the output of the following code segment:\r\nPredict the output of the following code segment:\r\n// Add stdio.h header file in below code\r\n\r\nint main()\r\n{\r\nint array[10] = {3, 0, 8, 1, 12, 8, 9, 2, 13, 10};\r\nint x, y, z;\r\nx = ++array[2];\r\ny = array[2]++;\r\nz = array[x++];\r\nprintf(\"%d %d %d\", x, y, z);\r\nreturn 0;\r\n}', '10 9 10', '9 9 10', '10 10 9', 'None of the above', 1, 'NA'),
(168, 103, 'Which of the following has a global scope in the program?', 'Formal parameters', 'Constants', 'Macros', 'Local variables', 3, 'NA'),
(169, 103, 'Which of the following statements about functions is false?', 'The main() function can be called recursively', 'Functions cannot return more than one value at a time', 'A function can have multiple return statements with different return values', 'The maximum number of arguments a function can take is 128', 4, 'NA'),
(170, 103, 'What is the correct way of treating 9.81 as a long double?', '9.81L', '9.81LD', '9.81D', '9.81DL', 1, 'NA'),
(171, 103, 'Which function would you use to convert 1.98 to 1?', 'ceil()', 'floor()', 'fabs()', 'abs()', 1, 'NA'),
(172, 103, 'Which of the following statements about the null pointer is correct?', 'The null pointer is similar to an uninitialized pointer', 'You can declare a null pointer as char* p = (char*)0', 'The NULL macro is defined only in the stdio.h header', 'The sizeof( NULL) operation would return the value 1', 2, 'NA'),
(173, 103, 'Which of the following statements about unions is incorrect?', 'A bit field cannot be used in a union', 'A pointer to a union exists', 'Union elements can be of different sizes', 'A union can be nested into a structure', 1, 'NA'),
(174, 103, 'What is the range of double data type for a 16-bit compiler?', '-1.7e-328 to +1.7e-328', '-1.7e-348 to +1.7e-348', '-1.7e-308 to +1.7e-308', '-1.7e-328 to +1.7e-328', 3, 'NA'),
(175, 103, 'Predict the output of the following code segment:\r\n// Add stdio.h header file in below code\r\n\r\nint main()\r\n{\r\nint x = 6;\r\nint y = 4;\r\nint z;\r\nif(!x >= 5)\r\ny = 3;\r\nz = 2;\r\nprintf(\"%d %d\", z, y);\r\nreturn 0;\r\n}', '4 2', '2 4', '2 3', '3 2', 2, 'NA'),
(176, 103, 'Predict the output of the following code segment:\r\n// Add stdio.h header file in below code\r\n\r\nint main()\r\n{\r\nint a,b,c;\r\na = b = c = 10;\r\nc = a++ || ++b && ++c;\r\nprintf(\"%d %d %d\",c, a, b);\r\nreturn 0;\r\n}', '1 11 10', '10 11 1', '10 11 10', '1 1 10', 1, 'NA'),
(181, 118, '	 The part of machine level instruction, which tells the central processor what has to be done, is', 'Operation code', 'Address', 'Locator', 'Flip-Flop', 1, 'no explanation'),
(182, 118, '	 Which of the following refers to the associative memory?', 'the address of the data is generated by the CPU', 'the address of the data is supplied by the users', 'there is no need for an address i.e. the data is used as an address', 'the data are accessed sequentially', 3, 'no explanation'),
(183, 118, 'To avoid the race condition, the number of processes that may be simultaneously inside their critical section is', '8', '1', '16', '0', 2, 'no explanation'),
(184, 118, 'A system program that combines the separately compiled modules of a program into a form suitable for execution', 'assembler', 'linking loader', 'cross compiler', 'load and go', 2, 'no explanation'),
(185, 118, '	 Process is', 'program in High level language kept on disk', 'contents of main memory', 'a program in execution', 'a job in secondary memory', 3, 'no explanation'),
(191, 126, ' How many number of comparisons are required in insertion sort to sort a file if the file is sorted in reverse order?', 'N2', 'N', 'N-1', 'N/2', 1, ''),
(192, 126, 'How many number of comparisons are required in insertion sort to sort a file if the file is already sorted?', 'N2', 'N', 'N-1', 'N/2', 3, ''),
(193, 126, 'The worst-case time complexity of Quick Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, ''),
(194, 126, 'The worst-case time complexity of Bubble Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, ''),
(195, 126, 'The worst-case time complexity of Selection Exchange Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, ''),
(196, 126, 'The worst-case time complexity of Merge Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 4, ''),
(197, 126, 'The algorithm like Quick sort does not require extra memory for carrying out the sorting procedure. This technique is called __________.', 'in-place', 'stable', 'unstable', 'in-partition', 1, ''),
(198, 126, 'Which of the following sorting procedures is the slowest?', 'Quick sort', 'Heap sort', 'Shell sort', 'Bubble sort', 4, ''),
(199, 126, 'Two main measures for the efficiency of an algorithm are', 'Processor and memory', 'Complexity and capacity', 'Time and space', 'Data and space', 3, ''),
(200, 126, 'The space factor when determining the efficiency of algorithm is measured by', 'Counting the maximum memory needed by the algorithm', 'Counting the minimum memory needed by the algorithm', 'Counting the average memory needed by the algorithm', 'Counting the maximum disk space needed by the algorithm', 1, ''),
(204, 129, 'With reference to Hard water, consider the\r\nfollowing statements:<br>\r\n1. Hardness in water is caused by soluble\r\nsalts of calcium and magnesium.<br>\r\n2. Hard water is known to reduce the\r\nefficiency of boilers.<br>\r\n3. Treatment with washing soda removes\r\nhardness of the water.<br>\r\nWhich of the statements given above is/are\r\ncorrect?', '1 and 2 only', '1 and 3 only', '2 and 3 only', '1, 2 and 3', 4, ''),
(205, 129, 'Which among the following phenomena\r\nexplains the fact that we see lightning much\r\nbefore we hear its thunder?', 'Light waves can travel in vacuum whereas sound waves cannot.', 'Light waves travels faster than sound waves.', 'Intensity of light waves is more than sound waves.', 'Light waves are scattered more than sound waves', 2, ''),
(206, 129, 'Which of the followings is/are application of\r\nUltrasound?\r\n1. Cleaning of objects\r\n2. Detecting cracks in metal blocks\r\n3. Images of internal organs of the human\r\nbody\r\n4. Determining the depth of the sea\r\nSelect the correct answer using the code\r\ngiven below.', '1 and 2 only', '2, 3 and 4 only', '3 and 4 only', '1, 2, 3 and 4', 4, ''),
(207, 129, 'Drinking soda helps us during digestion.\r\nWhich among the following correctly\r\nexplains this process?', 'The acids in soda water help in neutralizing the bases in stomach.', 'Soda water causes bloating, which stretches the stomach.', 'The bases in soda water help in neutralizing the acids in stomach.', 'Soda water enhances the activity of gut bacteria', 2, ''),
(208, 129, 'Oceans are the largest carbon sinks on earth.\r\nThrough which among the following ways\r\ncarbon-dioxide is transferred from\r\natmosphere into oceans?\r\n1. Carbon-dioxide reacts with sea water to\r\nform Carbonic Acid\r\n2. Absorption of carbon-dioxide by\r\nphotosynthetic phytoplankton\r\n3. Carbon-dioxide reacts with sea water to\r\nform Carbonates and Bicarbon', '1 and 3 only', '2 only', '2 and 3 only', '1, 2 and 3', 4, ''),
(209, 129, 'Consider the following statements:\r\n1. Sound gets reflected at the surface of a\r\nsolid or liquid and follows the same laws\r\nof reflection as Light.\r\n2. The working of a hearing aid involves\r\nconverting the sound waves into\r\nelectrical signals.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 3, ''),
(210, 129, 'Which of the following help owls in their\r\nnight vision adaptability?\r\n1. Large cornea\r\n2. Large Pupil\r\n3. Large number of cons on retina\r\ncompared to rods.\r\nSelect the correct answer using the code\r\ngiven below.', '1 and 2 only', '1 and 3 only', '2 and 3 only', '1, 2 and 3', 1, ''),
(211, 129, 'With reference to ‘Impulse’, consider the\r\nfollowing statements:\r\n1. It is rate of change in momentum of a\r\nbody.\r\n2. It can be used to explain why a cricketer\r\nmoves his hand backward when taking a\r\ncatch.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 2, ''),
(212, 129, 'Chips manufacturer usually flush bags of\r\nchips with nitrogen gas, for which of the\r\nfollowing purposes?', 'To prevent growth of microorganisms.', 'To prevent oxidation of the chips.', 'To prevent reaction of salts in chips with the inner layering of the packet', 'To enhance the flavour of the chips', 2, ''),
(213, 129, 'The major advantage of an alternating\r\ncurrent (AC) over direct current (DC) is that', 'The cost of installations of AC is less than DC.', 'AC contains more electrical energy than DC.', 'AC is free from voltage fluctuation.', 'AC voltages can be readily transformed to higher or lower voltage levels.', 4, ''),
(214, 129, 'Which of the following best explains the\r\nreason why women have shriller voice than\r\nmen?', 'Higher frequency', 'Lower frequency', 'Higher amplitude', 'Lower amplitude', 1, ''),
(215, 129, 'Which of the following reasons best explains\r\nwhy metal utensils do not work in\r\nmicrowave ovens?', 'They deflect microwaves from the food', 'They produce sparks on coming in contact with microwaves', 'They are bad conductors of heat.', 'They absorb all microwaves not allowing heat to reach the food.', 1, ''),
(216, 129, 'With reference to Acute Flaccid Paralysis,\r\nconsider the following statements:\r\n1. It is a paralysis caused by bacteria.\r\n2. It is symptomatic of a polio vaccine\r\ngiven to children.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 2, ''),
(217, 129, 'With reference to aqua regia, consider the\r\nfollowing statements:\r\n1. It a mixture of concentrated hydrochloric\r\nand concentrated sulphuric acid.<br>\r\n2. It has ability to dissolve gold and\r\nplatinum.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 2, ''),
(218, 129, 'Why do silver articles become black after\r\nsometime when exposed to air?', 'The silver particles react with carbon dioxide present in the air.', 'The silver particles react with sulphur present in the air.', 'The silver particles react with water present in the air.', 'None of the above.', 2, ''),
(235, 133, 'PHP Stands for?', 'Hypertex Processor', 'Hyper Markup Processor', 'Hyper Markup Preprocessor', 'Hypertext Preprocessor', 4, 'No Explanation'),
(236, 133, 'PHP is an example of ___________ scripting language.', 'Server-side', 'Client-side', 'Browser-side', 'In-side', 1, ''),
(237, 133, 'Who is known as the father of PHP?', 'Rasmus Lerdorf', 'Willam Makepiece', 'Drek Kolkevi', 'List Barely', 1, ''),
(238, 133, 'Which of the following is not true?', 'PHP can be used to develop web applications.', 'PHP makes a website dynamic', 'PHP applications can not be compile', 'PHP can not be embedded into html.', 4, ''),
(239, 133, 'PHP scripts are enclosed within _______', '<php> . . . </php>', '<?php . . . ?>', '?php . . . ?php', '<p> . . . </p>', 2, ''),
(240, 133, 'Which of the following variables is not a predefined variable?', '$get', '$ask', '$request', '$post', 2, ''),
(241, 133, 'When you need to obtain the ASCII value of a character which of the following function you apply in PHP?', 'chr( );', 'asc( );', 'ord( );', 'val( );', 3, ''),
(242, 133, 'Which of the following method sends input to a script via a URL?', 'Get', 'Post', 'Both', 'None', 1, ''),
(243, 133, 'Which of the following function returns a text in title case from a variable?', 'ucwords($var)', 'upper($var)', 'toupper($var)', 'ucword($var)', 1, ''),
(244, 133, 'Which of the following function returns the number of characters in a string variable?\r\n', 'count($variable)', 'len($variable)', 'strcount($variable)', 'strlen($variable)', 4, ''),
(245, 133, 'aaaaaaaaaaaa', 'a', 'b', 'c', 'd', 2, ''),
(246, 133, '22222222222222', 'A', 'B', 'C', 'D', 1, ''),
(247, 133, '33333333333333333', 'A', 'B', 'C', 'D', 3, ''),
(248, 133, '4444444444444444444444444', 'A', 'B', 'C', 'D', 4, ''),
(249, 133, '55555555555555555', 'A', 'B', 'C', 'D', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `difficulty_level` char(30) NOT NULL,
  `description` varchar(150) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `Exam_key` varchar(30) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `Exam_key`, `time_duration`, `admin_email`, `time_stamp`) VALUES
(43, 'PHP 005', 'Beginner', 'website', 5, 1, 'php@003', 900, 'ishwar2303@gmail.com', '2020-05-22 16:10:41'),
(46, 'General Knowledge', 'Intermediate', 'all fields', 10, 1, 'gk@1947', 1800, 'ishwar2303@gmail.com', '2020-05-24 07:50:51'),
(47, 'First Grade 001', 'Beginner', 'Maths', 5, 0, 'root', 900, 'ishwar2303@gmail.com', '2020-05-21 16:46:25'),
(67, 'History ', 'Beginner', 'General knowledge', 10, 0, 'yr25op', 900, 'tapasbaranwal@gmail.com', '2020-05-22 20:22:55'),
(103, 'C++ Programming', 'Intermediate', 'This Online C Programming Test is specially designed for you by industry experts.', 10, 1, '9911', 1800, 'tapasbaranwal@gmail.com', '2020-05-22 20:21:36'),
(118, 'Operating System', 'Intermediate', 'no description', 5, 1, 'ishwar1999', 900, 'ishwar2303@gmail.com', '2020-05-24 11:53:55'),
(126, 'Design and Analysis of Algorithms', 'Intermediate', 'No Description', 10, 1, 'daa@1999', 2700, 'ishwar2303@gmail.com', '2020-05-22 16:10:44'),
(129, 'GENERAL STUDIES (P) 2020 – Test ', 'Intermediate', 'General studies', 15, 1, 'gs@2020', 10800, 'ishwar2303@gmail.com', '2020-05-23 13:18:41'),
(133, 'PHP 001', 'Beginner', 'PHP is the popular server-side scripting language. Knowledge of PHP language is now essential for dynamic web page development.', 15, 1, 'php@001', 1800, 'tapasbaranwal@gmail.com', '2020-05-24 19:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `registered_admin`
--

CREATE TABLE `registered_admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(30) NOT NULL,
  `admin_contact` bigint(15) NOT NULL,
  `admin_gender` char(10) NOT NULL,
  `state` char(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `admin_address` varchar(50) DEFAULT NULL,
  `institution_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_admin`
--

INSERT INTO `registered_admin` (`admin_id`, `first_name`, `last_name`, `admin_contact`, `admin_gender`, `state`, `date_of_birth`, `admin_address`, `institution_name`, `admin_email`, `admin_password`) VALUES
(5, 'Tapas', 'Baranwal', 9017527234, 'male', 'Haryana', '1999-04-13', 'Sirsa', 'SRM-IST', 'tapasbaranwal@gmail.com', 'asdf@123'),
(24, 'Ishwar', 'Baisla', 9821671707, 'male', 'Delhi', '1999-03-23', 'wazirabad village gali no 6', 'SRM-University', 'ishwar2303@gmail.com', '23031999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quizes`
--
ALTER TABLE `quizes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `registered_admin`
--
ALTER TABLE `registered_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
