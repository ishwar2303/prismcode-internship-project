-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 10:22 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

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

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`attempt_id`, `quiz_id`, `fullname`, `registration_no`, `email`, `score`, `total_marks`, `correct`, `wrong`, `not_attempted`, `pass_percentage`, `no_of_questions`, `time_stamp`) VALUES
(1, 135, 'JATIN KUMAR', 'RA1811003030224', 'jatin@gmail.com', 2, 14, 2, 2, 3, 70, 7, '2020-09-24 18:35:51'),
(6, 134, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 5, 5, 5, 0, 0, 60, 5, '2021-02-06 08:02:29'),
(15, 139, 'ISHWAR BAISLA', 'RA1811003030188', 'ishwar2303@gmail.com', -2, 20, 1, 4, 5, 60, 10, '2021-04-11 14:58:08'),
(16, 139, 'RHYTHM', '214', 'rhythm@gmail.com', 2, 20, 1, 0, 9, 60, 10, '2021-04-11 15:16:20'),
(17, 139, 'ISHWAR BAISLA', '434Q4', 'faf@gmail.com', 0, 20, 0, 0, 10, 60, 10, '2021-04-11 15:18:06'),
(18, 139, 'DFKJ', 'FDKJLA', 'jfdka@gmail.com', 5, 20, 4, 3, 3, 60, 10, '2021-04-11 15:51:27'),
(19, 139, 'ISHWAR BAISLA', 'RA232', 'ishwar23035@gmail.com', 0, 20, 0, 0, 10, 60, 10, '2021-04-11 15:54:02'),
(20, 46, 'ISHWAR BAISLA', 'RA1811003030188', 'pankajgautam@gmail.com', 3, 40, 1, 2, 7, 80, 10, '2021-04-11 16:24:40'),
(21, 139, 'ISHWAR BAISLA', 'RA1811003030216', 'abc@gmail.com', 0, 20, 0, 0, 10, 60, 10, '2021-04-11 16:15:21'),
(22, 139, 'ISHWAR BAISLA', 'RA181100303', 'ishwar2303fa@gmail.com', 0, 20, 0, 0, 10, 60, 10, '2021-04-11 16:56:12'),
(23, 139, 'ISHWAR BAISLA', 'RA181100303023232', 'ishwar23031999@gmail.com', 3, 20, 3, 3, 4, 60, 10, '2021-04-11 17:27:21'),
(24, 139, 'ISHWAR BAISLA', 'RA18110H03030188A', 'ishwafafar2303@gmail.com', 0, 156, 2, 4, 72, 60, 78, '2021-04-11 18:02:08'),
(27, 140, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 1, 30, 1, 13, 16, 60, 30, '2021-04-11 22:37:58'),
(28, 140, 'TAPAS', 'RA1811003030216', 'tapa@gmail.com', 0, 30, 0, 0, 0, 60, 30, '2021-04-11 22:40:35'),
(29, 140, 'PANKAJ GAUTAM', 'RA1811003030188', 'pankajgautam@gmail.com', 0, 30, 0, 5, 25, 60, 30, '2021-04-12 07:22:11'),
(30, 140, 'ISHWAR BAISLA', 'RA181100303032', 'ishwar1999@gmail.com', 0, 30, 0, 0, 0, 60, 30, '2021-04-12 07:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `comment` varchar(150) NOT NULL,
  `attempt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `comment`, `attempt_id`) VALUES
(1, 'Stimulating Exam!!!', 1),
(4, 'Stimulating Exam\r\nWould like to attempt more quizes on this platform very flexible\r\nGreat work!', 6);

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
(104, 46, 'Elon Reeve Musk FRS (/ˈiːlɒn/ EE-lon; born June 28, 1971) is a business magnate, industrial designer, and engineer.[3] He is the founder, CEO, CTO, and chief designer of SpaceX; early stage investor,[b] CEO, and product architect of Tesla, Inc.; founder of The Boring Company; co-founder of Neuralink; and co-founder and initial co-chairman of OpenAI. A centibillionaire, Musk is one of the richest people in the world.\n\nMusk was born to a Canadian mother and South African father and raised in Pretoria, South Africa. He briefly attended the University of Pretoria before moving to Canada aged 17 to attend Queen&#39;s University. He transferred to the University of Pennsylvania two years later, where he received dual bachelor&#39;s degrees in economics and physics. He moved to California in 1995 to attend Stanford University but decided instead to pursue a business career, co-founding the web software company Zip2 with his brother Kimbal. The startup was acquired by Compaq for $307 million in 1999. Musk co-founded online bank X.com that same year, which merged with Confinity in 2000 to form the company PayPal and was subsequently bought by eBay in 2002 for $1.5 billion.\n\nIn 2002, Musk founded SpaceX, an aerospace manufacturer and space transport services company, of which he is CEO, CTO, and lead designer. In 2004, he joined electric vehicle manufacturer Tesla Motors, Inc. (now Tesla, Inc.) as chairman and product architect, becoming its CEO in 2008. In 2006, he helped create SolarCity, a solar energy services company and current Tesla subsidiary. In 2015, he co-founded OpenAI, a nonprofit research company that promotes friendly artificial intelligence. In 2016, he co-founded Neuralink, a neurotechnology company focused on developing brain&ndash;computer interfaces, and founded The Boring Company, a tunnel construction company. Musk has also proposed the Hyperloop, a high-speed vactrain transportation system.\n\nMusk has been the subject of criticism due to unorthodox or unscientific stances and highly publicized controversies. In 2018, he was sued for defamation by a diver who advised in the Tham Luang cave rescue; a California jury ruled in favor of Musk. In the same year, he was sued by the US Securities and Exchange Commission (SEC) for falsely tweeting that he had secured funding for a private takeover of Tesla. He settled with the SEC, temporarily stepping down from his chairmanship and accepting limitations on his Twitter usage. Musk has spread misinformation about the COVID-19 pandemic and has received criticism from experts for his other views on such matters as artificial intelligence and public transport.', 'Mumbai', 'Bengaluru', 'Hyderabad', 'Pune', 4, 'no explanation'),
(105, 46, 'document.getElementById(&#39;textbox&#39;).addEventListener(&#39;keydown&#39;,&nbsp;function(e)&nbsp;{<br/>&nbsp;&nbsp;if&nbsp;(e.key&nbsp;==&nbsp;&#39;Tab&#39;)&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;e.preventDefault();<br/>&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;start&nbsp;=&nbsp;this.selectionStart;<br/>&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;end&nbsp;=&nbsp;this.selectionEnd;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;set&nbsp;textarea&nbsp;value&nbsp;to:&nbsp;text&nbsp;before&nbsp;caret&nbsp;+&nbsp;tab&nbsp;+&nbsp;text&nbsp;after&nbsp;caret<br/>&nbsp;&nbsp;&nbsp;&nbsp;this.value&nbsp;=&nbsp;this.value.substring(0,&nbsp;start)&nbsp;+<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&quot;&#92;t&quot;&nbsp;+&nbsp;this.value.substring(end);<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;put&nbsp;caret&nbsp;at&nbsp;right&nbsp;position&nbsp;again<br/>&nbsp;&nbsp;&nbsp;&nbsp;this.selectionStart&nbsp;=<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;this.selectionEnd&nbsp;=&nbsp;start&nbsp;+&nbsp;1;<br/>&nbsp;&nbsp;}<br/>});', '1965', '1963', '1961', '1975', 3, 'The&nbsp;Arjuna&nbsp;Awards&nbsp;are&nbsp;given&nbsp;by&nbsp;the&nbsp;Ministry&nbsp;of&nbsp;Youth&nbsp;Affairs&nbsp;and&nbsp;Sports'),
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
(167, 103, 'Predict&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;code&nbsp;segment:<br/>//&nbsp;Add&nbsp;stdio.h&nbsp;header&nbsp;file&nbsp;in&nbsp;below&nbsp;code<br/><br/>int&nbsp;main()<br/>{<br/>&nbsp;&nbsp;&nbsp;int&nbsp;array[10]&nbsp;=&nbsp;{3,&nbsp;0,&nbsp;8,&nbsp;1,&nbsp;12,&nbsp;8,&nbsp;9,&nbsp;2,&nbsp;13,&nbsp;10};<br/>&nbsp;&nbsp;&nbsp;int&nbsp;x,&nbsp;y,&nbsp;z;<br/>&nbsp;&nbsp;&nbsp;x&nbsp;=&nbsp;++array[2];&nbsp;<br/>&nbsp;&nbsp;&nbsp;y&nbsp;=&nbsp;array[2]++;<br/>&nbsp;&nbsp;&nbsp;z&nbsp;=&nbsp;array[x++];&nbsp;<br/>&nbsp;&nbsp;&nbsp;printf(&quot;%d&nbsp;%d&nbsp;%d&quot;,&nbsp;x,&nbsp;y,&nbsp;z);<br/>&nbsp;&nbsp;&nbsp;return&nbsp;0;<br/>}', '10&nbsp;9&nbsp;10', '9&nbsp;9&nbsp;10', '10&nbsp;10&nbsp;9', 'None&nbsp;of&nbsp;the&nbsp;above', 1, 'NA'),
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
(237, 134, 'What is the output of below program?<br/>int main()<br/>{<br/> if(0)<br/> {<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;Hi&quot;;<br/> }<br/> else<br/> {<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;Bye&quot;;<br/> }<br/>return 0;<br/>}', 'Hi', 'Bye', 'HiBye', 'Compilation Error', 2, 'if(0) evaluates to false condition that is why else condition is executed. In C++ programming 0 is false 1 is true.'),
(238, 134, 'What should be the output of below program?<br/><br/>int main()<br/>{<br/>int a=10; <br/>cout&lt;&lt;a++;<br/>return 0;<br/>}<br/>', '11', '10', 'Error', '0', 2, 'Post Increment'),
(239, 134, '#include&lt;iostream.h&gt;\r<br/>void Execute(int &amp;x, int y = 200)\r<br/>{\r<br/> int TEMP = x + y;\r<br/> x+= TEMP;\r<br/> if(y!=200)\r<br/>&nbsp;&nbsp;&nbsp;&nbsp; cout&lt;&lt;TEMP&lt;&lt;x&lt;&lt;y&quot;--&quot;;\r<br/>}\r<br/>\r<br/>int main()\r<br/>{\r<br/> int A=50, B=20;\r<br/> cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\r<br/> Execute(A,B);\r<br/> cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\r<br/> return 0;\r<br/>}', '5020--5020--', '5020--7012020--12020--', '5020--70120200--5020', '5020--7050200--5020--', 2, ''),
(240, 134, 'How many times CppBuzz.com is printed?<br/><br/>int main()<br/>{<br/>&nbsp;&nbsp;&nbsp;&nbsp;int i=0;<br/>&nbsp;&nbsp;&nbsp;&nbsp;lbl:<br/>&nbsp;&nbsp;&nbsp;&nbsp;cout&lt;&lt;&quot;CppBuzz.com&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;i++;<br/>&nbsp;&nbsp;&nbsp;&nbsp;if(i&lt;5)<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>	goto lbl;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>return 0;<br/><br/>}<br/><br/>', 'Error', '5 times', '4 times', '6 times', 2, ''),
(241, 134, 'What is output of below program?<br/><br/>int main()<br/>{<br/>&nbsp;&nbsp;int a=10;<br/>&nbsp;&nbsp;int b,c;<br/>&nbsp;&nbsp;b = a++;<br/>&nbsp;&nbsp;c = a;<br/>&nbsp;&nbsp;cout&lt;&lt;a&lt;&lt;b&lt;&lt;c;<br/>&nbsp;&nbsp;return 0;<br/>}', '111011', '111111', '101011', '101010', 1, ''),
(244, 135, 'Abbreviate ACID.', 'Atomicity, Consistency, Isolation, Durability', 'Atomicity, Concurrency, Isolation, Duplicity', 'Aggregation, Consistency, Isolation, Durability', 'Atomicity, Consistency, Identity, Durability', 3, 'No explanation is available for this question!'),
(245, 135, 'What data structure is used to construct a Prev LSN in a database log?', 'Queue', 'Link List', 'Graph', 'Tree', 2, 'No explanation is available for this question!'),
(246, 135, 'What stores the metadata about the structure of the database, in particular the schema of the database?', 'Indices', 'Database log', 'Data files', 'Data Dictionary', 4, 'No explanation is available for this question!'),
(247, 135, 'Which of the following language is used to define the integrity constraints?', 'DCL', 'DML', 'DDL', 'All of the above', 3, 'No explanation is available for this question!'),
(248, 135, 'How many primary key can a table in database have?', 'Only one', 'At least one', 'More than one', 'Any number of', 1, 'No explanation is available for this question!'),
(249, 135, 'What does a query processor do in semantic checking?', 'Checks whether all the relations mentioned under the FROM clause in the SQL statement are from the database the user is referenced.', 'Checks all the attribute values and also checks whether they exist in a particular relation that is specified in the query. It checks all the attribute values that are mentioned in the SELECT and WHERE clauses of the SQL statement.', 'Verifies whether the types of attributes are compatible with the values used for the attributes.', 'All of these.', 4, 'No explanation is available for this question!'),
(250, 135, 'Which is the correct algorithmic sequence for the conversion of an expression from Infix to Prefix?<br/><br/>A. Change of every &#39;(&#39; (opening bracket) by &#39;)&#39; (closing bracket) and vice-versa.<br/>B. Reversal of an infix expression.<br/>C. Conversion of the modified expression into postfix form.<br/>D. Reversal of postfix expression.', 'A, B, C, D', 'C, A, D, B', 'B, A, C, D', 'D, B, A, C', 3, 'No explanation is available for this question!'),
(256, 139, 'Elon&nbsp;Reeve&nbsp;Musk&nbsp;FRS&nbsp;(/ˈiːlɒn/&nbsp;EE-lon;&nbsp;born&nbsp;June&nbsp;28,&nbsp;1971)&nbsp;is&nbsp;a&nbsp;business&nbsp;magnate,&nbsp;industrial&nbsp;designer,&nbsp;and&nbsp;engineer.[3]&nbsp;He&nbsp;is&nbsp;the&nbsp;founder,&nbsp;CEO,&nbsp;CTO,&nbsp;and&nbsp;chief&nbsp;designer&nbsp;of&nbsp;SpaceX;&nbsp;early&nbsp;stage&nbsp;investor,[b]&nbsp;CEO,&nbsp;and&nbsp;product&nbsp;architect&nbsp;of&nbsp;Tesla,&nbsp;Inc.;&nbsp;founder&nbsp;of&nbsp;The&nbsp;Boring&nbsp;Company;&nbsp;co-founder&nbsp;of&nbsp;Neuralink;&nbsp;and&nbsp;co-founder&nbsp;and&nbsp;initial&nbsp;co-chairman&nbsp;of&nbsp;OpenAI.&nbsp;A&nbsp;centibillionaire,&nbsp;Musk&nbsp;is&nbsp;one&nbsp;of&nbsp;the&nbsp;richest&nbsp;people&nbsp;in&nbsp;the&nbsp;world.<br/><br/>Musk&nbsp;was&nbsp;born&nbsp;to&nbsp;a&nbsp;Canadian&nbsp;mother&nbsp;and&nbsp;South&nbsp;African&nbsp;father&nbsp;and&nbsp;raised&nbsp;in&nbsp;Pretoria,&nbsp;South&nbsp;Africa.&nbsp;He&nbsp;briefly&nbsp;attended&nbsp;the&nbsp;University&nbsp;of&nbsp;Pretoria&nbsp;before&nbsp;moving&nbsp;to&nbsp;Canada&nbsp;aged&nbsp;17&nbsp;to&nbsp;attend&nbsp;Queen&#39;s&nbsp;University.&nbsp;He&nbsp;transferred&nbsp;to&nbsp;the&nbsp;University&nbsp;of&nbsp;Pennsylvania&nbsp;two&nbsp;years&nbsp;later,&nbsp;where&nbsp;he&nbsp;received&nbsp;dual&nbsp;bachelor&#39;s&nbsp;degrees&nbsp;in&nbsp;economics&nbsp;and&nbsp;physics.&nbsp;He&nbsp;moved&nbsp;to&nbsp;California&nbsp;in&nbsp;1995&nbsp;to&nbsp;attend&nbsp;Stanford&nbsp;University&nbsp;but&nbsp;decided&nbsp;instead&nbsp;to&nbsp;pursue&nbsp;a&nbsp;business&nbsp;career,&nbsp;co-founding&nbsp;the&nbsp;web&nbsp;software&nbsp;company&nbsp;Zip2&nbsp;with&nbsp;his&nbsp;brother&nbsp;Kimbal.&nbsp;The&nbsp;startup&nbsp;was&nbsp;acquired&nbsp;by&nbsp;Compaq&nbsp;for&nbsp;$307&nbsp;million&nbsp;in&nbsp;1999.&nbsp;Musk&nbsp;co-founded&nbsp;online&nbsp;bank&nbsp;X.com&nbsp;that&nbsp;same&nbsp;year,&nbsp;which&nbsp;merged&nbsp;with&nbsp;Confinity&nbsp;in&nbsp;2000&nbsp;to&nbsp;form&nbsp;the&nbsp;company&nbsp;PayPal&nbsp;and&nbsp;was&nbsp;subsequently&nbsp;bought&nbsp;by&nbsp;eBay&nbsp;in&nbsp;2002&nbsp;for&nbsp;$1.5&nbsp;billion.', 'C&nbsp;Programming&nbsp;x&nbsp;:&nbsp;1&nbsp;y&nbsp;:&nbsp;14&nbsp;0', 'C&nbsp;Programming&nbsp;x&nbsp;:&nbsp;0&nbsp;y&nbsp;:&nbsp;14&nbsp;0', 'C&nbsp;Programming&nbsp;x&nbsp;:&nbsp;1&nbsp;y&nbsp;:&nbsp;14&nbsp;10', 'C&nbsp;Programming&nbsp;x&nbsp;:&nbsp;0&nbsp;y&nbsp;:&nbsp;14&nbsp;10', 4, 'printf()&nbsp;function&nbsp;returns&nbsp;the&nbsp;output&nbsp;string&nbsp;length<br/>printf(&quot;&quot;)&nbsp;return&nbsp;0&nbsp;so,&nbsp;x&nbsp;=&nbsp;0<br/>printf(&quot;%s&quot;,&nbsp;c)&nbsp;return&nbsp;14&nbsp;as&nbsp;,&nbsp;C&nbsp;Programming&nbsp;is&nbsp;string&nbsp;of&nbsp;length&nbsp;14&nbsp;hence,&nbsp;y&nbsp;=&nbsp;14<br/>if(0)&nbsp;is&nbsp;false<br/>therefore,&nbsp;<br/>else&nbsp;is&nbsp;executed&nbsp;and&nbsp;prints&nbsp;a+10&nbsp;=&nbsp;0+10&nbsp;=&nbsp;10'),
(257, 139, 'var&nbsp;c=0;<br/>function&nbsp;hideAll()<br/>{<br/>	var&nbsp;j;<br/>	var&nbsp;x&nbsp;=&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;x[0].style.display=&#39;block&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display=&quot;none&quot;;<br/>	&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/>}<br/>&nbsp;<br/>function&nbsp;nextQuestion()<br/>{<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;l&nbsp;=&nbsp;x.length;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(c&lt;l-1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	c=c+1;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		x[c].style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		if(c==l-1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			document.getElementById(&quot;btn-submit&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>}<br/>function&nbsp;prevQuestion()<br/>{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(c!=0)&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;if(c==1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;=&nbsp;c&nbsp;-1;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;block&quot;;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;	<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>}<br/><br/>function&nbsp;switchToQuestion(index){<br/>&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;var&nbsp;i=0;<br/>&nbsp;&nbsp;for(i=0;i&lt;x.length;i++){<br/>&nbsp;&nbsp;&nbsp;&nbsp;if(index&nbsp;==&nbsp;i){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[i].style.display&nbsp;=&nbsp;&#39;block&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[i].style.display&nbsp;=&nbsp;&#39;none&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;c&nbsp;=&nbsp;index;<br/>&nbsp;&nbsp;if(index&nbsp;==&nbsp;0){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;if(index&nbsp;==&nbsp;x.length-1){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;none&quot;;<br/><br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/><br/>&nbsp;&nbsp;}<br/>}<br/><br/>&nbsp;&nbsp;function&nbsp;confirmation()<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;y&nbsp;=&nbsp;confirm(&quot;Are&nbsp;you&nbsp;sure&quot;);<br/>&nbsp;&nbsp', 'Enjoy<br/>Coding...', 'Enjoy&nbsp;Coding...', 'Enjoyx0ACoding...', 'Enjoy0ACoding', 1, '0A&nbsp;in&nbsp;hexadecimal&nbsp;(10&nbsp;in&nbsp;Decimal)&nbsp;is&nbsp;the&nbsp;ASCII&nbsp;value&nbsp;of&nbsp;new&nbsp;line&nbsp;character,&nbsp;we&nbsp;can&nbsp;use&nbsp;x0A&nbsp;anywhere&nbsp;in&nbsp;the&nbsp;printf()&nbsp;statement&nbsp;to&nbsp;print&nbsp;text&nbsp;in&nbsp;new&nbsp;line.'),
(258, 139, '#include&nbsp;&lt;stdio.h&gt;<br/><br/>int&nbsp;main(){<br/>	int&nbsp;i&nbsp;=&nbsp;10;<br/>	for(int&nbsp;i&nbsp;=&nbsp;21;&nbsp;i&lt;=&nbsp;30;&nbsp;i++);<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;printf(&quot;i&nbsp;=&nbsp;%d&quot;,&nbsp;i);<br/>	return&nbsp;0;<br/>}', 'i&nbsp;=&nbsp;10', 'i&nbsp;=&nbsp;30', 'i&nbsp;=&nbsp;31', 'error:&nbsp;redeclaration&nbsp;of&nbsp;&#39;i&#39;&nbsp;in&nbsp;for&nbsp;loop', 1, 'both&nbsp;i&nbsp;variables&nbsp;are&nbsp;different<br/>i&nbsp;declared&nbsp;in&nbsp;for&nbsp;loop&nbsp;will&nbsp;be&nbsp;out&nbsp;of&nbsp;scope&nbsp;after&nbsp;for&nbsp;loop&nbsp;execution<br/>hence&nbsp;i&nbsp;with&nbsp;scope&nbsp;in&nbsp;main&nbsp;function&nbsp;will&nbsp;persist&nbsp;<br/>i&nbsp;=&nbsp;10&nbsp;is&nbsp;the&nbsp;output'),
(259, 139, '#include &lt;stdio.h&gt;<br/><br/>int anonymous(int n){<br/>	if(n == 1)<br/>		return 1;<br/>	return n + anonymous(n-1);<br/>}<br/><br/>int main(){<br/>	int n;<br/>	scanf(&quot;%d&quot;, &amp;n);<br/>	int result = anonymous(n);<br/>	printf(&quot;Result : %d&quot;, result);<br/>	return 0;<br/><br/>}<br/><br/>What does anonymous function perform?<br/><br/><br/>', 'Sum of n*i where i is natural number from 1 to n', 'Sum of n natural numbers', 'Program error, Stack overflow', 'calculates n factorial', 2, 'Consider n = 3<br/>function call -&gt; anonymous(3)<br/>n is not equal to 1<br/>return n + anonymous(n-1) =&gt; return 3 + anonymous(3-1) = return 3 + anonymous(2) ---- eq(1)<br/><br/>function call -&gt; anonymous(2)<br/>return n + anonymous(n-1) =&gt; return 2 + anonymous(2-1) = return 2 + anonymous(1) ----eq(2)<br/><br/>function call -&gt; anonymous(1)<br/>as n equals to 1<br/>function return 1 and stop<br/>anonymous(1) = 1&nbsp;&nbsp;---eq(3)<br/><br/>substitue eq3 in eq2 and eq2 2 in eq 1<br/><br/>return 3 + 2 + 1<br/>return 6<br/><br/>Sum of n natural numbers<br/><br/>'),
(260, 139, '#include &lt;stdio.h&gt;<br/>int main(){<br/>	int a = (10, 20);<br/>	int b = 10;<br/>	int c = a&amp;b;<br/>	if(c){<br/>		printf(&quot;a : %d, &quot;, a);<br/>		printf(&quot;b : %d, &quot;, b);<br/>		printf(&quot;c : %d &quot;, c);<br/>	}<br/>	else {<br/>		printf(&quot;a : %d, &quot;, a);<br/>		printf(&quot;b : %d, &quot;, b);<br/>		printf(&quot;c : %d &quot;, c);<br/>	}<br/>	return 0;<br/>}', 'a : 10, b : 10, c : 1', 'a : 20, b : 10, c : 1', 'a : 20, b : 10, c : 0', 'a : 10, b : 10, c : 0', 3, 'Comma Operator , Associativity left to right<br/>therefore a = 20<br/>b = 10<br/>c = a&amp;b<br/>c = 10&amp;20<br/>Binary of 10 = 01010<br/>Binary of 20 = 10100<br/>taking Bitwise and <br/>0&amp;0 = 0<br/>1&amp;0 = 0<br/>0&amp;1 = 0<br/>1&amp;0 = 0<br/>0&amp;1 = 0<br/>Binary 00000, Decimal = 0<br/>hence c = 0<br/>if(0) is false<br/>else is executed and a : 20, b : 10, c : 0 is printed'),
(261, 139, '#include &lt;stdio.h&gt;<br/>int main(){<br/>	char c = 255;<br/>	printf(&quot;%d&quot;, c);<br/>	return 0;<br/>}', '-1', '-128', '255', '0', 1, 'c is a signed char data type&nbsp;&nbsp;means it can hold numbers in range -128 to 127<br/>In case of unsigned char 0 to 255<br/><br/>our case is signed char<br/>storing 255 is out of range therefore<br/>255 = 127 + 128<br/>128 is out of bound so compiler will start counting again from -128, -127, -126 and so<br/>-128 + 128 - 1 = -1<br/>hence -1 will be stored'),
(262, 139, '#include&nbsp;&lt;stdio.h&gt;<br/>int&nbsp;main(){<br/>	int&nbsp;n&nbsp;=&nbsp;65;<br/>	char&nbsp;a&nbsp;=&nbsp;&#39;A&#39;;<br/>	signed&nbsp;char&nbsp;b&nbsp;=&nbsp;a&nbsp;+&nbsp;n;<br/>	unsigned&nbsp;char&nbsp;c&nbsp;=&nbsp;a&nbsp;+&nbsp;n;<br/>	a&nbsp;+=&nbsp;13;<br/>	printf(&quot;a&nbsp;=&nbsp;%c,&nbsp;&quot;,&nbsp;a);<br/>	printf(&quot;b&nbsp;=&nbsp;%d,&nbsp;&quot;,&nbsp;b);<br/>	printf(&quot;c&nbsp;=&nbsp;%d&quot;,&nbsp;c);<br/>	return&nbsp;0;<br/>}', 'a&nbsp;=&nbsp;n,&nbsp;b&nbsp;=&nbsp;-126,&nbsp;c&nbsp;=&nbsp;-126', 'a&nbsp;=&nbsp;N,&nbsp;b&nbsp;=&nbsp;-126,&nbsp;c&nbsp;=&nbsp;130', 'a&nbsp;=&nbsp;M,&nbsp;b&nbsp;=&nbsp;130,&nbsp;c&nbsp;=&nbsp;130', 'Compilation&nbsp;Error', 2, 'ASCII&nbsp;value&nbsp;of&nbsp;&#39;A&#39;&nbsp;=&nbsp;65<br/>a&nbsp;+=&nbsp;13;<br/>a&nbsp;=&nbsp;65&nbsp;+&nbsp;13&nbsp;=&nbsp;78<br/>&#39;N&#39;&nbsp;has&nbsp;ASCII&nbsp;value&nbsp;78<br/>hence,&nbsp;a&nbsp;=&nbsp;&#39;N&#39;<br/>b&nbsp;=&nbsp;a&nbsp;+&nbsp;n&nbsp;=&nbsp;65&nbsp;+&nbsp;65&nbsp;=&nbsp;130,&nbsp;signed&nbsp;char&nbsp;can&nbsp;store&nbsp;-128&nbsp;to&nbsp;127<br/>therefore&nbsp;130&nbsp;=&nbsp;127&nbsp;+&nbsp;3<br/>-128&nbsp;+&nbsp;3&nbsp;-&nbsp;1&nbsp;=&nbsp;-126<br/>b&nbsp;=&nbsp;-126<br/>signed&nbsp;char&nbsp;can&nbsp;store&nbsp;0&nbsp;to&nbsp;255<br/>c&nbsp;=&nbsp;130'),
(263, 139, 'Consider Size of int, char, double as 4, 1, 8 Bytes respectively<br/>Predict output of the program<br/><br/>#include &lt;stdio.h&gt;<br/>struct student{<br/>	int Registration_number;<br/>	char Name[30];<br/>	double Score;<br/>};<br/>int main(){<br/>	struct student s1;<br/>	printf(&quot;%u&quot;, sizeof(s1));<br/>	return 0;<br/>}', '42', '44', '46', '48', 4, 'Concept of Data Alignment<br/>int Registration_number =&gt; 4 Bytes<br/>char Name[30] =&gt; 30*1 = 30 Bytes<br/>double Score =&gt; 8 Bytes<br/><br/>Data Padding <br/>-&gt; Add 4 Bytes to integer &#39;Registration_number&#39;<br/>-&gt; Add 2 Bytes to char &#39;Name&#39;<br/>4 + 4 + 30 + 2 + 8 = 48<br/>48 Bytes will be allocated to structure variable'),
(264, 139, '#include &lt;stdio.h&gt;<br/>union student{<br/>	int Registration_number;<br/>	char name;<br/>	float score;<br/>};<br/>int main(){<br/>	union student s1;<br/>	printf(&quot;%u&quot;, sizeof(s1));<br/>	return 0;<br/>}', '2', '4', '6', '8', 2, 'The memory occupied by union is the sufficent memory size to hold the largest member of union '),
(265, 139, 'var&nbsp;c=0;<br/>function&nbsp;hideAll()<br/>{<br/>	var&nbsp;j;<br/>	var&nbsp;x&nbsp;=&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;x[0].style.display=&#39;block&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display=&quot;none&quot;;<br/>	&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/>}<br/>&nbsp;<br/>function&nbsp;nextQuestion()<br/>{<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;l&nbsp;=&nbsp;x.length;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if(c&lt;l-1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	c=c+1;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		x[c].style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		if(c==l-1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			document.getElementById(&quot;btn-submit&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;		}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>}<br/>function&nbsp;prevQuestion()<br/>{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(c!=0)&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;if(c==1)<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c&nbsp;=&nbsp;c&nbsp;-1;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[c].style.display&nbsp;=&nbsp;&quot;block&quot;;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	&nbsp;&nbsp;&nbsp;&nbsp;	<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>}<br/><br/>function&nbsp;switchToQuestion(index){<br/>&nbsp;&nbsp;var&nbsp;x&nbsp;=&nbsp;&nbsp;document.getElementsByClassName(&quot;question-answer-container&quot;);<br/>&nbsp;&nbsp;var&nbsp;i=0;<br/>&nbsp;&nbsp;for(i=0;i&lt;x.length;i++){<br/>&nbsp;&nbsp;&nbsp;&nbsp;if(index&nbsp;==&nbsp;i){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[i].style.display&nbsp;=&nbsp;&#39;block&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x[i].style.display&nbsp;=&nbsp;&#39;none&#39;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;}<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;c&nbsp;=&nbsp;index;<br/>&nbsp;&nbsp;if(index&nbsp;==&nbsp;0){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;none&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;prev&quot;).style.display&nbsp;=&nbsp;&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;if(index&nbsp;==&nbsp;x.length-1){<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;block&quot;;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;next&quot;).style.display=&quot;none&quot;;<br/><br/>&nbsp;&nbsp;}<br/>&nbsp;&nbsp;else{<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;document.getElementById(&quot;btn-submit&quot;).style.display=&quot;none&quot;;<br/><br/>&nbsp;&nbsp;}<br/>}<br/><br/>&nbsp;&nbsp;function&nbsp;confirmation()<br/>&nbsp;&nbsp;&nbsp;&nbsp;{<br/>&nbsp;&nbsp;&nbsp;&nbsp;<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;var&nbsp;y&nbsp;=&nbsp;confirm(&quot;Are&nbsp;you&nbsp;sure&quot;);<br/>&nbsp;&nbsp', 'Hello&nbsp;World&nbsp;%s&nbsp;Hello&nbsp;World', 'Hello&nbsp;World&nbsp;Hello&nbsp;World', '%s&nbsp;Hello&nbsp;World&nbsp;Hello&nbsp;World', 'Hello&nbsp;World', 3, 'Statement&nbsp;will&nbsp;become<br/>printf(&quot;%s&nbsp;Hello&nbsp;World&quot;,&nbsp;&quot;%s&nbsp;Hello&nbsp;World&quot;);<br/>left&nbsp;%s&nbsp;-&gt;&nbsp;%s&nbsp;Hello&nbsp;World<br/><br/>Output&nbsp;:&nbsp;%s&nbsp;Hello&nbsp;World&nbsp;Hello&nbsp;World'),
(266, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(267, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(268, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(269, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(270, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(271, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(272, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(273, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(274, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(275, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(276, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(277, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(278, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(279, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(280, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(281, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(282, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(283, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(284, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(285, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(286, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(287, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(288, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(289, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.');
INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`) VALUES
(290, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(291, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(292, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(293, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(294, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(295, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(296, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(297, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(298, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(299, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(300, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(301, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(302, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(303, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(304, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(305, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(306, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(307, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(308, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(309, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(310, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(311, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(312, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(313, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(314, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(315, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(316, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(317, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(318, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(319, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(320, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(321, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(322, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(323, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(324, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(325, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(326, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(327, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(328, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(329, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(330, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(331, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(332, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(333, 139, '#include <stdlib.h>\r\n#include <stdio.h>\r\nenum {false, true};\r\nint main()\r\n{\r\n   int i = 1;\r\n   do\r\n   {\r\n      printf(\"%d\\n\", i);\r\n      i++;\r\n      if (i < 15)\r\n        continue;\r\n   } while (false);\r\n  \r\n   getchar();\r\n   return 0;\r\n}', '1', '2', '3', '4', 1, 'Explanation: The do wile loop checks condition after each iteration. So after continue statement, control transfers to the statement while(false). Since the condition is false ‘i’ is printed only once.'),
(334, 140, 'Difference between circumference and diameter of a circle is 60 cm. <br/>What will be volume of cylinder, whose height is 14 cm more than that of radius of circle and radius of cylinder is 10 cm ?', '8400', '8500', '8800', '9800', 3, 'ATQ, 2&pi;r-2r=60<br/>2r=28<br/>r=14<br/>height of cylinder =14+14=28 cm<br/>radius=10 cm<br/>volume of cylinder=&pi;r^2h=22/7*10^2*28=8800 cm^3'),
(335, 140, 'A bag contains 5 oranges, 4 apples and 6 mangoes. <br/>4 fruits are drawn randomly, then find probability of getting all fruits are of mangoes.', '2/91', '1/19', '13/95', '5/96', 2, 'required no. of outcome=6C4<br/>total no. of outcome=15C4<br/>probability=(6C4)/15C4<br/>=6*5*4*3/15*14*13*12= 1/91'),
(336, 140, 'A man brought two articles for rs.1200. He sold one article at a profit of 20% and another article at a loss of 20%. <br/>If the selling price of both the articles is equal, then find the cost price of article which is sold at a loss of 20%.', '720', '800', '600', '550', 1, 'total CP of two article=1200<br/>CP of one article=x<br/>CP of another article=1200-x<br/>x*120/100=(1200-x)80/100<br/>6x/5=4800-4x/5<br/>x=480<br/>CP of article which is sold at a loss of 20%=1200-480=720'),
(337, 140, 'The ratio of the present ages of A and B is 4:3. 4 years hence the age of A will be 20% more than the age of B 6 years hence. <br/>Find the difference of their present ages.', '10', '15', '16', '8', 4, 'let the present age of A and B be 4x and 3x respectively<br/>4x+4=(3x+6)6/5<br/>4x+4=18x+36/5<br/>20x+20=18x+36<br/>2x=16<br/>x=8<br/>A&rsquo;s present age=32<br/>B&rsquo;s present age=24<br/>difference=32-24=8 years'),
(338, 140, 'A,B and C alone can complete the work in 16:24:32 days respectively. <br/>All of them started working together but after 2 days A left the job and 7 days before the completion of the work B also left the job. <br/>In how many days the work is completed ?', '20', '15', '25', '16', 4, 'LCM of 16,24 and 32=96<br/>A&rsquo;s efficiency=96/6=16<br/>B&rsquo;s efficiency=96/24=4<br/>C&rsquo;s efficiency=96/32=3<br/>all work together for 2 days=13*2=26 work<br/>remaining work=96-26=70<br/>C alone work for 7 days=7*3=21 work<br/>remaining work done by B and C together=49/7=7 days<br/>total time required=2+7+7=16 days'),
(339, 140, 'A train crosses a bridge and a platform of length 650m and 800m in 20 sec and 30 sec respectively. <br/>Find the speed of the train(in km/hr).', '300', '280', '200', '180', 4, 'let the length of train=x<br/>x+650/20=x+800/30<br/>3x+1950=2x+1600<br/>x=350<br/>speed of train=350+650/20=50 m/sec<br/>speed of train (in km/hr)=50*18/5=180 km/hr'),
(340, 140, 'A,B and C enter into a partnership by investing in the ratio of 3:4:5. <br/>After 1 year, B invests another 15000 and C at the end of 2 years also invest 10000. At the end of 3 years profit are shared in the ratio of 3:5:7.<br/>Find initial investment of C.', '60000', '50000', '65000', '70000', 2, 'let A,B and C invest be 3x, 4x and 5x respectively<br/>A&rsquo;s total investment=3x*3=9x<br/>B&rsquo;s total investment=(4x*1)+(4x+15000)*2=12x+30000<br/>C&rsquo;s total investment=(5x*2)+(5x+10000)*1=15x+10000<br/>9x/12x+30000=3/5<br/>45x=36x+90000<br/>9x=90000<br/>x=10000<br/>C&rsquo;s initially invested=5*10000=50000'),
(341, 140, 'Difference between SI and CI in certain amount of principal is rs.60. <br/>If the rate of interest is 20% in both cases, then find the SI after 3 years in same rate of interest.', '850', '600', '900', '1200', 3, 'ATQ, 60=PR^2//100^2<br/>60=P*400/1000<br/>P=1500<br/>SI after 3 years=1500*20/100*3=900'),
(342, 140, 'In a vessel milk and water are in the ratio of 5:3. <br/>If 48 liter of mixture is taken out from the vessel and 30 liter of water is added, then new ratio of milk and water becomes 4:3. <br/>Find the initial quantity of mixture in vessel.', '368', '280', '365', '440', 1, 'let the milk and water be 5x and 3x<br/>(5x-30)/3x-18+30=4/3<br/>15x-90=12x-48<br/>3x=138<br/>x=46<br/>total quantity of mixture=8x=8*46=368'),
(343, 140, 'The income of A and B is in the ratio of 3:2 and their expenditure in the ratio of 4:3. <br/>If each of them save rs.4000, then find income of A ?', '9000', '8400', '9500', '6500', 2, 'let the income of A and B be 3x and 2x respectively<br/>3x-4000/2x-4000=7/3<br/>9x-12000=14x-2800<br/>5x=14000<br/>x=2800<br/>income of A=2800*3=8400'),
(344, 140, 'Find the missing term in place of question mark (?) in the following number series:<br/>8, 31, 67, 118, 187, ? , 401', '341', '305', '279', '275', 3, '8(+23) , 31(+36) , 67(+51) , 118(+69) , 187(+92) , 279 (+122) , 401'),
(345, 140, '5 , 11 , 21 , 44 , ? , 175 , 347', '81', '75', '55', '86', 4, '5*2+1=11<br/>11*2-1=21<br/>21*2+2=44<br/>44*2-2=86<br/>86*2+3=175<br/>175*2-3=347'),
(346, 140, 'What will come in place of the &ldquo;x&rdquo; in the following questions:<br/>25% of 400 + 30% of 270 + 48% of 100 = x', '229', '225', '249', '236', 1, '(25/100)*400+(30/100)*270+(48/100)*100 = x<br/>100+81+48=229'),
(347, 140, 'x% of 400 &divide; 75 + (2/5) of 315 = 30% of 625', '1355.15', '1200.25', '1168.25', '1153.12', 1, '(4x/75)+(2/5)*315=(30/100 )*625<br/>(4x/75)+126=187.5<br/>(4x/75)=187.5-126<br/>(4x/75)=61.5<br/>x=1153.125'),
(348, 140, 'P1 and P2 are the two pockets were made by mixing chilli powder and turmeric powder in the ratio 3:5 and 5:9 respectively.<br/>If 60 grams of P1 and x grams of P2 are mixed to getpocket P3, then fid out the value of x , if the ratio of chilli and turmeric in the new pocket P3 is 35:61?', '70', '56', '98', '84', 4, 'In x gram of P2<br/>chilli = 5x/14<br/>turmeric= 9x/14<br/>in 60 gm in P1<br/>chilli=60 * 3/8= 45/2<br/>turmeric=60 85/8=75/2<br/>and =&gt;(45/2 +5x/14) / (75/2+9x/14) = 35/61<br/>=&gt;x= 84g'),
(349, 140, 'Rakesh bought a loan Rs.3,00,000 in a newyear scheme which gives r% per annum at Compound interest and this scheme doubles the loan in 72/r years which is double of the rate of interest given by the scheme.<br/>Find the total amount paid by Rakesh at the end of 48 years?', '12lac', '34lac', '45lac', '48lac', 4, 'given 72/r= 2r<br/>=&gt; r=6%<br/>So the loan amount double in 12 years.<br/>=&gt;6,00, 000= 3,00,000 ( 1+ r/100 ) ^12<br/>=&gt;1+ r/ 100 ) ^ 12= 2<br/>So required loan amount to pay = 3,00,000 ( 1+ r/100 ) ^ 48 = 3,00,000 *2^ 4 = Rs. 48,00,000'),
(350, 140, 'karthik and kathir&rsquo;s current age is 7: 5 and 3 years back their ages were 16:11. <br/>So what is the age of kathir after 5 years?', '15', '25', '30', '40', 3, 'let their ages be 5x and 7x .<br/>so 7x-3/5x-3 = 16/11<br/>=&gt; x= 5<br/>Hence the age of kathir = 5* 5+ 5= 30 years'),
(351, 140, 'Person 1 started a business y investing Rs. A after 4 months person 2 also joined with the investment of Rs. x+ 10,000. <br/>But the end of the year their profit are same. <br/>Then what is the amount invested by', '20000', '14000', '30000', '45000', 3, 'p1 P2<br/>investment x x+10,000<br/>time 12 8<br/>12x 8x+ 80,000<br/>12x= 8x + 80,000<br/>=&gt;x=20,000<br/>hence person 2 investment = 30,000'),
(352, 140, 'An house is on sale is said to 50% above its original price. <br/>But after the seller gives discount and gets only 20% profit. <br/>Find the percentage of discount ?', '10%', '20%', '30%', '40%', 2, 'let the original price of the house = 100x<br/>Then said price= 100x * 150/100= 150x<br/>SP= 120x<br/>discount% = 30x/150x * 100 = 20%'),
(353, 140, 'If the sum of the speed of a boat upsteam and down stream is 36kmph and speed of the stream is 1/3 of the speed of the boat. <br/>Find the time taken to travel 108 km upstream and 96km downstream by the boat?', '10 hrs', '11 hrs', '12 hrs', '13 hrs', 4, 'speed of boat =36/2= 18kmph<br/>speed of stream = 1/3 * 18 = 6kmph<br/>Time = 108/18-6 + 96/ 18+ 6<br/>=13hrs'),
(354, 140, 'Person A and Person B are 10 km apart. A can walk at an average speed of 2 km/hr and B at 3 km/h. <br/>If they start walking towards each other at 5:30 pm, when they will meet?', '7:30 pm', '10:30 pm', '9:30 pm', '6:30 pm', 1, 'Suppose they will meet after T hours.<br/>Distance = Speed x Time<br/>Sum of distance traveled by them after T hours<br/>3T + 2T = 10 km<br/>T = 2 hours.<br/>So they will meet at 5:30 pm + 2 hours = 7:30 pm'),
(355, 140, 'Find the greatest possible length of scale which can be used to measure the iron bar 8m 3cm, 8m 34cm and 9m 30cm exactly.', '63 cm', '64 cm', '61 cm', '62 cm', 4, 'Required measure of scale = HCF of 803, 834 and 930<br/>= 62 cm'),
(356, 140, 'A seller marked an article at Rs 500 and sold it allowing 20% discount. <br/>If his profit was 25%, then the cost price of the article was', '310', '320', '280', '330', 2, 'Hence, cost price of an article = (400 x 100)/(100 + 25)<br/>= (400 x 100)/125<br/>= 320'),
(357, 140, 'using namespace std;<br/> <br/>void towerOfHanoi(int n, char from_rod,<br/>                    char to_rod, char aux_rod)<br/>{<br/>    if (n == 1)<br/>    {<br/>        cout &lt;&lt; &quot;Move disk 1 from rod &quot; &lt;&lt; from_rod &lt;&lt;<br/>                            &quot; to rod &quot; &lt;&lt; to_rod&lt;&lt;endl;<br/>        return;<br/>    }<br/>    towerOfHanoi(n - 1, from_rod, aux_rod, to_rod);<br/>    cout &lt;&lt; &quot;Move disk &quot; &lt;&lt; n &lt;&lt; &quot; from rod &quot; &lt;&lt; from_rod &lt;&lt;<br/>                                &quot; to rod &quot; &lt;&lt; to_rod &lt;&lt; endl;<br/>    towerOfHanoi(n - 1, aux_rod, to_rod, from_rod);<br/>}<br/> <br/>// Driver code<br/>int main()<br/>{<br/>    int n = 4; // Number of disks<br/>    towerOfHanoi(n, &#39;A&#39;, &#39;C&#39;, &#39;B&#39;); // A, B and C are names of rods<br/>    return 0;<br/>}<br/> <br/>// This is code is contributed by rathbhupendra', '20,000 km', '15,000 km', '18,000 km', '28,000 km', 4, 'Let the total distance be y km.<br/>Then, 1y / 5 = 12000<br/>&rArr; y = (12000 x 5) /1= 60000 km.<br/>Distance traveled by plane 2<br/>= (1/3 X 60000) = 20,000 km.<br/><br/>Distance traveled by plane3<br/>= [60000- (20000 + 12000) ] km.<br/>= 28,000 km.'),
(358, 140, 'If sum of upstream and between downstream speed of a boat is 80 kmph , and the boat travels 90 km . <br/>upstream in 3hr Find the time taken by boat to cover 120 km downstream', '121/5 hr', '13//5 hr', '12/5 hr', '12/7 hr', 3, 'let b= speed of the boat<br/>w= speed of water<br/>u= upstream speed= b-w<br/>d= downstream speed = b+w<br/>So u +d= 80<br/>that is b-w+b+w= 80<br/>=&gt;b= 40<br/>40-w= 90/3 = 30<br/>w= 10 kmph<br/>b+w= 120/t<br/>t= 120/50 = 12/5 hr'),
(359, 140, 'The difference between simple interest and compound interest of a certain sum of money at 10 % per annum for 2 years is Rs. 40. <br/>Then the sum is ;', 'Rs. 5000', 'Rs. 4000', 'Rs. 6000', 'Rs. 8000', 2, 'CI- SI = P ( r/100 ) ^2<br/>40 = p( 10/100) ^2<br/>=&gt; P= Rs.4000'),
(360, 140, 'Compound interest of a sum of money for 2 years at 4 percent per annum is Rs . 2500 Simple interest of the same sum of money at the same rate of interest for 2 years will be :', 'Rs. 2350', 'Rs. 2456', 'Rs. 2450', 'Rs. 2451', 4, 'CI= P( 1+r/100 ) ^t &ndash; P<br/>2500 = P (( 1-4/100)^2 -1)<br/>=&gt; p= 2500 * 625 / 51=Rs. 30637.25<br/>SI= 30,637.25 * 4* 2/100=Rs.2451'),
(361, 140, 'The are two positive integers a and b . What is the probability that a + b is odd ?', '1/2', '1/3', '1/4', '1/5', 1, 'Sum of positive integers is either odd or even.<br/>So the probality = 1/2'),
(362, 140, 'Kailash sells apples at a loss of 44 % but he uses a false scale which is 30 % less than its true weight . <br/>Find the loss / gain percent ?', '21%', '22%', '20%', '23%', 3, 'Let CP = Rs.100 for 100g<br/>So SP=Rs. 56 for 70g<br/>and SP =Rs. 80 for 100g<br/>loss%=100-80/100 * 100 = 20%'),
(363, 140, 'Average age of A ,B and C is 80 years . <br/>When D joins them the average age becomes 70 years . <br/>A new persons E, whose age is 4 years more than D replaces A and the average of B , C, D and E becomes 75 years . <br/>What is the age of A ?', '20 yrs', '22 yrs', '23 yrs', '24 yrs', 4, 'A+B+C = 3* 80 = 240 yrs<br/>A+B+C+D= 4* 70 = 280 yrs<br/>D age= 280-240 = 40yrs<br/>=&gt; E age= 40 + 4 = 44 yrs<br/>B+C+D+E age = 75* 4= 300 yrs<br/>B+C age = 300 &ndash; 40-44=216<br/>A age = 240-216=24 yrs');

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
  `active_timing` bigint(20) NOT NULL,
  `inactive_timing` bigint(20) NOT NULL,
  `Exam_key` varchar(30) NOT NULL,
  `key_access` tinyint(4) NOT NULL,
  `show_evaluation` tinyint(4) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `marks_per_question` int(11) NOT NULL,
  `negative_marking` double NOT NULL,
  `passing_percentage` int(11) NOT NULL,
  `admin_email_id` int(11) NOT NULL,
  `time_stamp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `active_timing`, `inactive_timing`, `Exam_key`, `key_access`, `show_evaluation`, `time_duration`, `marks_per_question`, `negative_marking`, `passing_percentage`, `admin_email_id`, `time_stamp`) VALUES
(46, 'General Knowledge', 'Intermediate', 'General knowledge is information that has been accumulated over time through various mediums. It excludes specialized learning that can only be obtained with extensive training and information confined to a single medium. General knowledge is an essential component of crystallized intelligence.\r<br/>\r<br/>', 10, 1, 0, 0, 'gk@1947', 1, 1, 1800, 4, 0.5, 80, 24, '2020-09-25 00:03:03'),
(67, 'History ', 'Beginner', 'General knowledge', 5, 0, 0, 0, 'yr25op', 0, 1, 900, 1, 0.5, 60, 5, '2020-12-14 23:36:04'),
(103, 'C++ Programming', 'Intermediate', 'This Online C Programming Test is specially designed for you by industry experts.', 10, 0, 0, 0, '9911', 0, 1, 1800, 1, 0, 60, 5, '2020-12-14 23:36:05'),
(118, 'Operating System', 'Intermediate', 'An operating system, or \"OS,\" is software that communicates with the hardware and allows other programs to run. ... Every desktop computer, tablet, and smartphone includes an operating system that provides basic functionality for the device. Common desktop operating systems include Windows, OS X, and Linux\r<br/>', 5, 0, 0, 0, 'ishwar1999', 1, 0, 900, 2, 0, 60, 24, '2020-12-15 14:57:16'),
(126, 'Design and Analysis of Algorithms', 'Intermediate', 'Exam Key : daa@1999\r\n<br/>\r\n<br/>Design and Analysis of Algorithm is very important for designing algorithm to solve different types of problems in the branch of computer science and information technology.', 10, 0, 0, 0, 'daa@1999', 1, 1, 2700, 0, 0, 0, 24, '2020-12-15 14:54:36'),
(134, 'CODE - C', 'Intermediate', 'C and C++ Programming based Questions.\r<br/>Types\r<br/>-> Output based\r<br/>-> Error search\r<br/>-> Theory\r<br/>- >Architecture\r<br/>-> OOPS\r<br/>', 5, 0, 1611859500, 1611861300, '23031999', 1, 1, 900, 1, 0.5, 60, 24, '2020-12-15 14:54:23'),
(135, 'DODNetHTML', 'Advance', 'Question are based on Data Base, Operating System, Data Structure, Networking, HTML. ', 7, 0, 0, 0, 'in@100', 1, 1, 1800, 2, 1, 70, 25, '2020-12-14 23:36:27'),
(139, 'C Programming', 'Intermediate', 'C Programming\r<br/>-> Predict Output', 78, 1, 0, 0, 'CP2021', 0, 1, 1800, 2, 1, 60, 24, '21-04-09 11:00:12am'),
(140, 'Quantitative Aptitude', 'Beginner', 'Arithmetic Ability test helps measure one\'s numerical ability, problem solving and mathematical skills. ... Every aspirant giving Quantitative Aptitude Aptitude test tries to solve maximum number of problems with maximum accuracy and speed.', 30, 1, 0, 0, 'QA2021', 0, 1, 3600, 1, 0, 60, 24, '2021-04-12 02:35:41');

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
(5, 'Tapas', 'Baranwal', 9017527234, 'male', 'Haryana', '1999-04-13', 'Sirsa', 'SRM-IST', 'tapasbaranwal@gmail.com', '23031999'),
(24, 'Ishwar', 'Baisla', 9821671707, 'male', 'Delhi', '1999-03-23', 'wazirabad village gali no 6', 'SRM-IST', 'ishwar2303@gmail.com', '23031999'),
(25, 'SAMARTH', 'TANDON', 9140521693, 'male', 'Uttar Pradesh', '2020-09-10', 'Mirzapur', 'SRM-IST', 'samarth@gmail.com', '12345678'),
(28, 'ISHWAR', 'BAISLA', 9821671707, 'male', 'Delhi', '2020-12-17', 'Delhi', '', 'admin@quizwit.in', '12345678');

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
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
