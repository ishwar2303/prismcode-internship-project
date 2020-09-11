-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 10:59 AM
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
  `registration_no` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` double NOT NULL,
  `total_marks` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `not_attempted` int(11) NOT NULL,
  `pass_percentage` int(11) NOT NULL,
  `no_of_questions` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `attempt_id` int(11) NOT NULL
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

--
-- Dumping data for table `profile_photo`
--

INSERT INTO `profile_photo` (`image_id`, `image_name`, `admin_email`) VALUES
(37, 'IMG-1qrxv2ls.jpg', 'ishwar2303@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` varchar(6000) NOT NULL,
  `option_1` varchar(1000) NOT NULL,
  `option_2` varchar(1000) NOT NULL,
  `option_3` varchar(1000) NOT NULL,
  `option_4` varchar(1000) NOT NULL,
  `answer` int(11) NOT NULL,
  `reason` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`) VALUES
(104, 46, 'The National chemical laboratory is located in', 'Mumbai', 'Bengaluru', 'Hyderabad', 'Pune', 4, 'no explanation'),
(105, 46, 'The Arjuna Awards were instituted in', '1965', '1963', '1961', '1975', 3, 'The Arjuna Awards are given by the Ministry of Youth Affairs and Sports'),
(106, 46, 'Which one of the following countries is not a member of OPEC?', 'Algeria', 'Indonesia', 'Malaysia', 'Nigeria', 3, 'Organization of the Petroleum Exporting Countries (OPEC)'),
(107, 46, 'The National school of Drama is situated in which of the following cities?', 'Mumbai', 'New Delhi', 'Bhopal', 'Kolkata', 2, 'no explanation'),
(108, 46, 'The radiant energy of Sun results from', 'Nuclear fusion', 'Nuclear fission', 'Cosmic radiation', 'Combustion', 1, 'no explanation'),
(109, 46, 'Parliament of which of the following days the world Human Rights Day is celebrated?', 'December 3', 'December 10', 'December 17', 'December 25', 2, 'no explanation'),
(110, 46, 'A noise level of 100 decibel would correspond to', 'Just audible sound', 'Ordinary conversation', 'Sound from a noisy street', 'Noise from a machine shop', 4, 'a unit used to measure the intensity of a sound'),
(111, 46, 'Fundamental Rights in India are guranteed by it through', 'The right of equality', 'Right against Exploitaion', 'Right to Constitutional Remedies', 'Educational and Cultural Rights', 3, 'no explanation'),
(112, 46, 'Tendons and ligaments are kind of ', 'Muscular tissue', 'Connective tissue', 'Epidermal tissue', 'Nervous tissue', 2, 'Tendons are strong and non-flexible while ligaments are flexible and elastic.'),
(113, 46, 'The first woman to climb mount Everest was', 'Marie Jose perec', 'Florence Griffith Joyner', 'Junko Tabei', 'Jackie Joyner Kersee', 3, 'Tabei was the first woman to summit Mt. Everest, the worlds highest peak, in 1975.'),
(126, 67, 'who is founder of Haryanka Dynasty?', 'Ajatashatru', 'Harshvardhan', 'Bimbisara', 'Ghananand', 3, 'no explanation'),
(127, 67, 'The Rowlatt ACT was passed in : ', '1905', '1913', '1919', '1925', 3, 'no explanation'),
(128, 67, 'The East India Association was set up in :', '1866', '1857', '1836', '1885', 1, 'no explanation'),
(129, 67, 'The Indian National Congress passed Quit India Resolution at', '1942', '1934', '1939', '1940', 1, 'no explanation'),
(130, 67, 'Bande Matram was a series of articles published in the year 1907by:', 'Bal Gangadhar Tilak', 'Sir Aurobindo Ghosh', 'Domadar Chapekar', 'Balkrishana Chapekar', 2, 'no explanation'),
(167, 103, 'Predict the output of the following code segment:\r<br/>Predict the output of the following code segment:\r<br/>// Add stdio.h header file in below code\r<br/>\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;&nbsp;int array[10] = {3, 0, 8, 1, 12, 8, 9, 2, 13, 10};\r<br/>&nbsp;&nbsp;&nbsp;int x, y, z;\r<br/>&nbsp;&nbsp;&nbsp;x = ++array[2];&nbsp;\r<br/>&nbsp;&nbsp;&nbsp;y = array[2]++;\r<br/>&nbsp;&nbsp;&nbsp;z = array[x++];&nbsp;\r<br/>&nbsp;&nbsp;&nbsp;printf(\"%d %d %d\", x, y, z);\r<br/>&nbsp;&nbsp;&nbsp;return 0;\r<br/>}', '10 9 10', '9 9 10', '10 10 9', 'None of the above', 1, 'NA'),
(168, 103, 'Which of the following has a global scope in the program?', 'Formal parameters', 'Constants', 'Macros', 'Local variables', 3, 'NA'),
(169, 103, 'Which of the following statements about functions is false?', 'The main() function can be called recursively', 'Functions cannot return more than one value at a time', 'A function can have multiple return statements with different return values', 'The maximum number of arguments a function can take is 128', 4, 'NA'),
(170, 103, 'What is the correct way of treating 9.81 as a long double?', '9.81L', '9.81LD', '9.81D', '9.81DL', 1, 'NA'),
(171, 103, 'Which function would you use to convert 1.98 to 1?', 'ceil()', 'floor()', 'fabs()', 'abs()', 1, 'NA'),
(172, 103, 'Which of the following statements about the null pointer is correct?', 'The null pointer is similar to an uninitialized pointer', 'You can declare a null pointer as char* p = (char*)0', 'The NULL macro is defined only in the stdio.h header', 'The sizeof( NULL) operation would return the value 1', 2, 'NA'),
(173, 103, 'Which of the following statements about unions is incorrect?', 'A bit field cannot be used in a union', 'A pointer to a union exists', 'Union elements can be of different sizes', 'A union can be nested into a structure', 1, 'NA'),
(174, 103, 'What is the range of double data type for a 16-bit compiler?', '-1.7e-328 to +1.7e-328', '-1.7e-348 to +1.7e-348', '-1.7e-308 to +1.7e-308', '-1.7e-328 to +1.7e-328', 3, 'NA'),
(175, 103, 'Predict the output of the following code segment:\r<br/>// Add stdio.h header file in below code\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;int x = 6;\r<br/>&nbsp;&nbsp;int y = 4;\r<br/>&nbsp;&nbsp; int z;\r<br/>&nbsp;&nbsp; if(!x &gt;= 5)\r<br/>&nbsp;&nbsp;y = 3;\r<br/>&nbsp;&nbsp;z = 2;\r<br/>&nbsp;&nbsp;printf(\"%d %d\", z, y);\r<br/>&nbsp;&nbsp;return 0;\r<br/>}', '4 2', '2 4', '2 3', '3 2', 2, 'NA'),
(176, 103, 'Predict the output of the following code segment:\r\n// Add stdio.h header file in below code\r\n\r\nint main()\r\n{\r\nint a,b,c;\r\na = b = c = 10;\r\nc = a++ || ++b && ++c;\r\nprintf(\"%d %d %d\",c, a, b);\r\nreturn 0;\r\n}', '1 11 10', '10 11 1', '10 11 10', '1 1 10', 1, 'NA'),
(181, 118, 'The part of machine level instruction, which tells the central processor what has to be done, is', 'Operation code', 'Address', 'Locator', 'Flip-Flop', 1, 'no explanation'),
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
(204, 129, 'With reference to Hard water, consider the\r\nfollowing statements:\r\n1. Hardness in water is caused by soluble\r\nsalts of calcium and magnesium.\r\n2. Hard water is known to reduce the\r\nefficiency of boilers.\r\n3. Treatment with washing soda removes\r\nhardness of the water.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 and 2 only', '1 and 3 only', '2 and 3 only', '1, 2 and 3', 1, ''),
(205, 129, 'Which among the following phenomena\r\nexplains the fact that we see lightning much\r\nbefore we hear its thunder?', 'Light waves can travel in vacuum whereas sound waves cannot.', 'Light waves travels faster than sound waves.', 'Intensity of light waves is more than sound waves.', 'Light waves are scattered more than sound waves', 1, ''),
(206, 129, 'Which of the followings is/are application of\r\nUltrasound?\r\n1. Cleaning of objects\r\n2. Detecting cracks in metal blocks\r\n3. Images of internal organs of the human\r\nbody\r\n4. Determining the depth of the sea\r\nSelect the correct answer using the code\r\ngiven below.', '1 and 2 only', '2, 3 and 4 only', '3 and 4 only', '1, 2, 3 and 4', 1, ''),
(207, 129, 'Drinking soda helps us during digestion.\r\nWhich among the following correctly\r\nexplains this process?', 'The acids in soda water help in neutralizing the bases in stomach.', 'Soda water causes bloating, which stretches the stomach.', 'The bases in soda water help in neutralizing the acids in stomach.', 'Soda water enhances the activity of gut bacteria', 1, ''),
(208, 129, 'Oceans are the largest carbon sinks on earth.\r\nThrough which among the following ways\r\ncarbon-dioxide is transferred from\r\natmosphere into oceans?\r\n1. Carbon-dioxide reacts with sea water to\r\nform Carbonic Acid\r\n2. Absorption of carbon-dioxide by\r\nphotosynthetic phytoplankton\r\n3. Carbon-dioxide reacts with sea water to\r\nform Carbonates and Bicarbon', '1 and 3 only', '2 only', '2 and 3 only', '1, 2 and 3', 1, ''),
(209, 129, 'Consider the following statements:\r\n1. Sound gets reflected at the surface of a\r\nsolid or liquid and follows the same laws\r\nof reflection as Light.\r\n2. The working of a hearing aid involves\r\nconverting the sound waves into\r\nelectrical signals.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 1, ''),
(210, 129, 'Which of the following help owls in their\r\nnight vision adaptability?\r\n1. Large cornea\r\n2. Large Pupil\r\n3. Large number of cons on retina\r\ncompared to rods.\r\nSelect the correct answer using the code\r\ngiven below.', '1 and 2 only', '1 and 3 only', '2 and 3 only', '1, 2 and 3', 1, ''),
(211, 129, 'With reference to ‘Impulse’, consider the\r\nfollowing statements:\r\n1. It is rate of change in momentum of a\r\nbody.\r\n2. It can be used to explain why a cricketer\r\nmoves his hand backward when taking a\r\ncatch.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 1, ''),
(212, 129, 'Chips manufacturer usually flush bags of\r\nchips with nitrogen gas, for which of the\r\nfollowing purposes?', 'To prevent growth of microorganisms.', 'To prevent oxidation of the chips.', 'To prevent reaction of salts in chips with the inner layering of the packet', 'To enhance the flavour of the chips', 1, ''),
(213, 129, 'The major advantage of an alternating\r\ncurrent (AC) over direct current (DC) is that', 'The cost of installations of AC is less than DC.', 'AC contains more electrical energy than DC.', 'AC is free from voltage fluctuation.', 'AC voltages can be readily transformed to higher or lower voltage levels.', 1, ''),
(214, 129, 'Which of the following best explains the\r\nreason why women have shriller voice than\r\nmen?', 'Higher frequency', 'Lower frequency', 'Higher amplitude', 'Lower amplitude', 1, ''),
(215, 129, 'Which of the following reasons best explains\r\nwhy metal utensils do not work in\r\nmicrowave ovens?', 'They deflect microwaves from the food', 'They produce sparks on coming in contact with microwaves', 'They are bad conductors of heat.', 'They absorb all microwaves not allowing heat to reach the food.', 1, ''),
(216, 129, 'With reference to Acute Flaccid Paralysis,\r\nconsider the following statements:\r\n1. It is a paralysis caused by bacteria.\r\n2. It is symptomatic of a polio vaccine\r\ngiven to children.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 1, ''),
(217, 129, 'With reference to aqua regia, consider the\r\nfollowing statements:\r\n1. It a mixture of concentrated hydrochloric\r\nand concentrated sulphuric acid.\r\n2. It has ability to dissolve gold and\r\nplatinum.\r\nWhich of the statements given above is/are\r\ncorrect?', '1 only', '2 only', 'Both 1 and 2', 'Neither 1 nor 2', 1, ''),
(218, 129, 'asdfghjk', 'A', 'B', 'C', 'D', 2, ''),
(237, 134, 'What is the output of below program?<br/>int main()<br/>{<br/> if(0)<br/> {<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;Hi&quot;;<br/> }<br/> else<br/> {<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;Bye&quot;;<br/> }<br/>return 0;<br/>}', 'Hi', 'Bye', 'HiBye', 'Compilation Error', 2, 'if(0) evaluates to false condition that is why else condition is executed. In C++ programming 0 is false 1 is true.'),
(238, 134, 'What should be the output of below program?\r<br/>\r<br/>int main()\r<br/>{\r<br/>int a=10; \r<br/>cout&lt;&lt;a++;\r<br/>return 0;\r<br/>}\r<br/>', '11', '10', 'Error', '0', 2, 'Post Increment'),
(239, 134, '#include&lt;iostream.h&gt;\r<br/>void Execute(int &amp;x, int y = 200)\r<br/>{\r<br/> int TEMP = x + y;\r<br/> x+= TEMP;\r<br/> if(y!=200)\r<br/>&nbsp;&nbsp;&nbsp;&nbsp; cout&lt;&lt;TEMP&lt;&lt;x&lt;&lt;y&quot;--&quot;;\r<br/>}\r<br/>\r<br/>int main()\r<br/>{\r<br/> int A=50, B=20;\r<br/> cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\r<br/> Execute(A,B);\r<br/> cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\r<br/> return 0;\r<br/>}', '5020--5020--', '5020--7012020--12020--', '5020--70120200--5020', '5020--7050200--5020--', 2, ''),
(240, 134, 'How many times CppBuzz.com is printed?\r<br/>\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;int i=0;\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;lbl:\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;CppBuzz.com&quot;;\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;i++;\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;if(i&lt;5)\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;{\r<br/>	goto lbl;\r<br/>&nbsp;&nbsp;&nbsp;&nbsp;}\r<br/>return 0;\r<br/>\r<br/>}\r<br/>\r<br/>', 'Error', '5 times', '4 times', '6 times', 2, ''),
(241, 134, 'What is output of below program?\r<br/>\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;int a=10;\r<br/>&nbsp;&nbsp;int b,c;\r<br/>&nbsp;&nbsp;b = a++;\r<br/>&nbsp;&nbsp;c = a;\r<br/>&nbsp;&nbsp;cout&lt;&lt;a&lt;&lt;b&lt;&lt;c;\r<br/>&nbsp;&nbsp;return 0;\r<br/>}', '111011', '111111', '101011', '101010', 1, ''),
(244, 135, 'Abbreviate ACID.', 'Atomicity, Consistency, Isolation, Durability', 'Atomicity, Concurrency, Isolation, Duplicity', 'Aggregation, Consistency, Isolation, Durability', 'Atomicity, Consistency, Identity, Durability', 3, 'No explanation is available for this question!'),
(245, 135, 'What data structure is used to construct a Prev LSN in a database log?', 'Queue', 'Link List', 'Graph', 'Tree', 2, 'No explanation is available for this question!'),
(246, 135, 'What stores the metadata about the structure of the database, in particular the schema of the database?', 'Indices', 'Database log', 'Data files', 'Data Dictionary', 4, 'No explanation is available for this question!'),
(247, 135, 'Which of the following language is used to define the integrity constraints?', 'DCL', 'DML', 'DDL', 'All of the above', 3, 'No explanation is available for this question!'),
(248, 135, 'How many primary key can a table in database have?', 'Only one', 'At least one', 'More than one', 'Any number of', 1, 'No explanation is available for this question!'),
(249, 135, 'What does a query processor do in semantic checking?', 'Checks whether all the relations mentioned under the FROM clause in the SQL statement are from the database the user is referenced.', 'Checks all the attribute values and also checks whether they exist in a particular relation that is specified in the query. It checks all the attribute values that are mentioned in the SELECT and WHERE clauses of the SQL statement.', 'Verifies whether the types of attributes are compatible with the values used for the attributes.', 'All of these.', 4, 'No explanation is available for this question!'),
(250, 135, 'Which is the correct algorithmic sequence for the conversion of an expression from Infix to Prefix?<br/><br/>A. Change of every &#39;(&#39; (opening bracket) by &#39;)&#39; (closing bracket) and vice-versa.<br/>B. Reversal of an infix expression.<br/>C. Conversion of the modified expression into postfix form.<br/>D. Reversal of postfix expression.', 'A, B, C, D', 'C, A, D, B', 'B, A, C, D', 'D, B, A, C', 3, 'No explanation is available for this question!');

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

CREATE TABLE `quizes` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `difficulty_level` char(30) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `Exam_key` varchar(30) NOT NULL,
  `key_access` tinyint(4) NOT NULL,
  `show_evaluation` tinyint(4) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `marks_per_question` int(11) NOT NULL,
  `negative_marking` double NOT NULL,
  `passing_percentage` int(11) NOT NULL,
  `admin_email_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `Exam_key`, `key_access`, `show_evaluation`, `time_duration`, `marks_per_question`, `negative_marking`, `passing_percentage`, `admin_email_id`, `time_stamp`) VALUES
(46, 'General Knowledge', 'Intermediate', 'General knowledge is information that has been accumulated over time through various mediums. It excludes specialized learning that can only be obtained with extensive training and information confined to a single medium. General knowledge is an essential component of crystallized intelligence.\r<br/>\r<br/>', 10, 1, 'gk@1947', 1, 1, 1800, 3, 0.5, 60, 24, '2020-09-01 12:45:35'),
(67, 'History ', 'Beginner', 'General knowledge', 5, 1, 'yr25op', 0, 1, 900, 1, 0.5, 60, 5, '2020-08-30 18:22:02'),
(103, 'C++ Programming', 'Intermediate', 'This Online C Programming Test is specially designed for you by industry experts.', 10, 1, '9911', 0, 1, 1800, 1, 0, 60, 5, '2020-08-30 18:22:28'),
(118, 'Operating System', 'Intermediate', 'Exam Key : op@linux<br/>\r\n<br/>An operating system, or \"OS,\" is software that communicates with the hardware and allows other programs to run. ... Every desktop computer, tablet, and smartphone includes an operating system that provides basic functionality for the device. Common desktop operating systems include Windows, OS X, and Linux\r\n', 5, 1, 'ishwar1999', 1, 0, 900, 0, 0, 0, 24, '2020-09-01 12:46:09'),
(126, 'Design and Analysis of Algorithms', 'Intermediate', 'Exam Key : daa@1999\r\n<br/>\r\n<br/>Design and Analysis of Algorithm is very important for designing algorithm to solve different types of problems in the branch of computer science and information technology.', 10, 1, 'daa@1999', 1, 0, 2700, 0, 0, 0, 24, '2020-08-31 09:20:31'),
(129, 'GENERAL STUDIES (P) 2020 – Test ', 'Intermediate', 'General studies', 15, 0, 'gs@2020', 0, 0, 10800, 0, 0, 0, 24, '2020-08-23 13:06:16'),
(134, 'CODE - C', 'Intermediate', 'C and C++ Programming', 5, 1, '23031999', 0, 0, 900, 1, 0.5, 60, 24, '2020-09-01 12:40:28'),
(135, 'DODNetHTML', 'Advance', 'Question are based on Data Base, Operating System, Data Structure, Networking, HTML. ', 7, 1, 'in@100', 1, 1, 1800, 2, 1, 70, 25, '2020-09-01 13:33:00');

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
(24, 'Ishwar', 'Baisla', 9821671707, 'male', 'Delhi', '1999-03-23', 'wazirabad village gali no 6', 'SRM-IST', 'ishwar2303@gmail.com', '23031999'),
(25, 'SAMARTH', 'TANDON', 9140521693, 'male', 'Uttar Pradesh', '2020-09-10', 'Mirzapur', 'SRM-IST', 'samarth@gmail.com', '12345678');

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
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `attempt_id` (`attempt_id`);

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
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `admin_email_id` (`admin_email_id`);

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
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`attempt_id`) REFERENCES `attempts` (`attempt_id`);

--
-- Constraints for table `quizes`
--
ALTER TABLE `quizes`
  ADD CONSTRAINT `quizes_ibfk_1` FOREIGN KEY (`admin_email_id`) REFERENCES `registered_admin` (`admin_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
