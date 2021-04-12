-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2021 at 06:53 PM
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
(35, 141, 'PANKAJ GAUTAM', 'RA1811003030188', 'pankajgautam@gmail.com', 14, 20, 7, 2, 1, 50, 10, '2021-04-12 10:30:25'),
(36, 140, 'PANKAJ GAUTAM', 'RA1811003030188', 'pankajgautam@gmail.com', 6, 30, 6, 1, 23, 60, 30, '2021-04-12 11:58:37'),
(37, 140, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 19, 30, 19, 3, 8, 60, 30, '2021-04-12 14:49:07'),
(38, 134, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 0, 5, 0, 0, 5, 60, 5, '2021-04-12 15:22:34'),
(40, 142, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 4, 10, 2, 0, 3, 60, 5, '2021-04-12 16:21:50');

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
(1, 'Stimulating Exam!!!', 1);

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
  `reason` varchar(4000) DEFAULT NULL,
  `formatted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`, `formatted`) VALUES
(126, 67, 'who is founder of Haryanka Dynasty?', 'Ajatashatru', 'Harshvardhan', 'Bimbisara', 'Ghananand', 3, 'no explanation', 0),
(127, 67, 'The Rowlatt ACT was passed in : ', '1905', '1913', '1919', '1925', 3, 'no explanation', 0),
(128, 67, 'The East India Association was set up in :', '1866', '1857', '1836', '1885', 1, 'no explanation', 0),
(129, 67, 'The Indian National Congress passed Quit India Resolution at', '1942', '1934', '1939', '1940', 1, 'no explanation', 0),
(130, 67, 'Bande Matram was a series of articles published in the year 1907by:', 'Bal Gangadhar Tilak', 'Sir Aurobindo Ghosh', 'Domadar Chapekar', 'Balkrishana Chapekar', 2, 'no explanation', 0),
(167, 103, 'Predict&nbsp;the&nbsp;output&nbsp;of&nbsp;the&nbsp;following&nbsp;code&nbsp;segment:<br/>//&nbsp;Add&nbsp;stdio.h&nbsp;header&nbsp;file&nbsp;in&nbsp;below&nbsp;code<br/><br/>int&nbsp;main()<br/>{<br/>&nbsp;&nbsp;&nbsp;int&nbsp;array[10]&nbsp;=&nbsp;{3,&nbsp;0,&nbsp;8,&nbsp;1,&nbsp;12,&nbsp;8,&nbsp;9,&nbsp;2,&nbsp;13,&nbsp;10};<br/>&nbsp;&nbsp;&nbsp;int&nbsp;x,&nbsp;y,&nbsp;z;<br/>&nbsp;&nbsp;&nbsp;x&nbsp;=&nbsp;++array[2];&nbsp;<br/>&nbsp;&nbsp;&nbsp;y&nbsp;=&nbsp;array[2]++;<br/>&nbsp;&nbsp;&nbsp;z&nbsp;=&nbsp;array[x++];&nbsp;<br/>&nbsp;&nbsp;&nbsp;printf(&quot;%d&nbsp;%d&nbsp;%d&quot;,&nbsp;x,&nbsp;y,&nbsp;z);<br/>&nbsp;&nbsp;&nbsp;return&nbsp;0;<br/>}', '10&nbsp;9&nbsp;10', '9&nbsp;9&nbsp;10', '10&nbsp;10&nbsp;9', 'None&nbsp;of&nbsp;the&nbsp;above', 1, 'NA', 0),
(168, 103, 'Which of the following has a global scope in the program?', 'Formal parameters', 'Constants', 'Macros', 'Local variables', 3, 'NA', 0),
(169, 103, 'Which of the following statements about functions is false?', 'The main() function can be called recursively', 'Functions cannot return more than one value at a time', 'A function can have multiple return statements with different return values', 'The maximum number of arguments a function can take is 128', 4, 'NA', 0),
(170, 103, 'What is the correct way of treating 9.81 as a long double?', '9.81L', '9.81LD', '9.81D', '9.81DL', 1, 'NA', 0),
(171, 103, 'Which function would you use to convert 1.98 to 1?', 'ceil()', 'floor()', 'fabs()', 'abs()', 1, 'NA', 0),
(172, 103, 'Which of the following statements about the null pointer is correct?', 'The null pointer is similar to an uninitialized pointer', 'You can declare a null pointer as char* p = (char*)0', 'The NULL macro is defined only in the stdio.h header', 'The sizeof( NULL) operation would return the value 1', 2, 'NA', 0),
(173, 103, 'Which of the following statements about unions is incorrect?', 'A bit field cannot be used in a union', 'A pointer to a union exists', 'Union elements can be of different sizes', 'A union can be nested into a structure', 1, 'NA', 0),
(174, 103, 'What is the range of double data type for a 16-bit compiler?', '-1.7e-328 to +1.7e-328', '-1.7e-348 to +1.7e-348', '-1.7e-308 to +1.7e-308', '-1.7e-328 to +1.7e-328', 3, 'NA', 0),
(175, 103, 'Predict the output of the following code segment:\r<br/>// Add stdio.h header file in below code\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;int x = 6;\r<br/>&nbsp;&nbsp;int y = 4;\r<br/>&nbsp;&nbsp; int z;\r<br/>&nbsp;&nbsp; if(!x &gt;= 5)\r<br/>&nbsp;&nbsp;y = 3;\r<br/>&nbsp;&nbsp;z = 2;\r<br/>&nbsp;&nbsp;printf(\"%d %d\", z, y);\r<br/>&nbsp;&nbsp;return 0;\r<br/>}', '4 2', '2 4', '2 3', '3 2', 2, 'NA', 0),
(176, 103, 'Predict the output of the following code segment:\r\n// Add stdio.h header file in below code\r\n\r\nint main()\r\n{\r\nint a,b,c;\r\na = b = c = 10;\r\nc = a++ || ++b && ++c;\r\nprintf(\"%d %d %d\",c, a, b);\r\nreturn 0;\r\n}', '1 11 10', '10 11 1', '10 11 10', '1 1 10', 1, 'NA', 0),
(181, 118, 'The part of machine level instruction, which tells the central processor what has to be done, is', 'Operation code', 'Address', 'Locator', 'Flip-Flop', 1, 'no explanation', 0),
(182, 118, '	 Which of the following refers to the associative memory?', 'the address of the data is generated by the CPU', 'the address of the data is supplied by the users', 'there is no need for an address i.e. the data is used as an address', 'the data are accessed sequentially', 3, 'no explanation', 0),
(183, 118, 'To avoid the race condition, the number of processes that may be simultaneously inside their critical section is', '8', '1', '16', '0', 2, 'no explanation', 0),
(184, 118, 'A system program that combines the separately compiled modules of a program into a form suitable for execution', 'assembler', 'linking loader', 'cross compiler', 'load and go', 2, 'no explanation', 0),
(185, 118, '	 Process is', 'program in High level language kept on disk', 'contents of main memory', 'a program in execution', 'a job in secondary memory', 3, 'no explanation', 0),
(191, 126, ' How many number of comparisons are required in insertion sort to sort a file if the file is sorted in reverse order?', 'N2', 'N', 'N-1', 'N/2', 1, '', 0),
(192, 126, 'How many number of comparisons are required in insertion sort to sort a file if the file is already sorted?', 'N2', 'N', 'N-1', 'N/2', 3, '', 0),
(193, 126, 'The worst-case time complexity of Quick Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, '', 0),
(194, 126, 'The worst-case time complexity of Bubble Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, '', 0),
(195, 126, 'The worst-case time complexity of Selection Exchange Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 1, '', 0),
(196, 126, 'The worst-case time complexity of Merge Sort is________.', 'O(n2)', 'O(log n)', 'O(n)', 'O(n logn)', 4, '', 0),
(197, 126, 'The algorithm like Quick sort does not require extra memory for carrying out the sorting procedure. This technique is called __________.', 'in-place', 'stable', 'unstable', 'in-partition', 1, '', 0),
(198, 126, 'Which of the following sorting procedures is the slowest?', 'Quick sort', 'Heap sort', 'Shell sort', 'Bubble sort', 4, '', 0),
(199, 126, 'Two main measures for the efficiency of an algorithm are', 'Processor and memory', 'Complexity and capacity', 'Time and space', 'Data and space', 3, '', 0),
(200, 126, 'The space factor when determining the efficiency of algorithm is measured by', 'Counting the maximum memory needed by the algorithm', 'Counting the minimum memory needed by the algorithm', 'Counting the average memory needed by the algorithm', 'Counting the maximum disk space needed by the algorithm', 1, '', 0),
(237, 134, 'What is the output of below program?\nint main()\n{\n if(0)\n {\n    cout&lt;&lt;&quot;Hi&quot;;\n }\n else\n {\n    cout&lt;&lt;&quot;Bye&quot;;\n }\nreturn 0;\n}', 'Hi', 'Bye', 'HiBye', 'Compilation Error', 2, 'if(0) evaluates to false condition that is why else condition is executed. In C++ programming 0 is false 1 is true.', 1),
(238, 134, 'What should be the output of below program?\n\nint main()\n{\nint a=10; \ncout&lt;&lt;a++;\nreturn 0;\n}', '11', '10', 'Error', '0', 2, 'Post Increment', 1),
(239, 134, '#include&lt;iostream.h&gt;\nvoid Execute(int &amp;x, int y = 200)\n{\n int TEMP = x + y;\n x+= TEMP;\n if(y!=200)\n     cout&lt;&lt;TEMP&lt;&lt;x&lt;&lt;y&quot;--&quot;;\n}\n\nint main()\n{\n int A=50, B=20;\n cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\n Execute(A,B);\n cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\n return 0;\n}', '5020--5020--', '5020--7012020--12020--', '5020--70120200--5020', '5020--7050200--5020--', 2, '', 1),
(240, 134, 'How many times CppBuzz.com is printed?\n\nint main()\n{\n    int i=0;\n    lbl:\n    cout&lt;&lt;&quot;CppBuzz.com&quot;;\n    i++;\n    if(i&lt;5)\n    {\n	goto lbl;\n    }\nreturn 0;\n\n}', 'Error', '5 times', '4 times', '6 times', 2, '', 1),
(241, 134, 'What is output of below program?\n\nint main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  cout&lt;&lt;a&lt;&lt;b&lt;&lt;c;\n  return 0;\n}', '111011', '111111', '101011', '101010', 1, '', 1),
(244, 135, 'Abbreviate ACID.', 'Atomicity, Consistency, Isolation, Durability', 'Atomicity, Concurrency, Isolation, Duplicity', 'Aggregation, Consistency, Isolation, Durability', 'Atomicity, Consistency, Identity, Durability', 3, 'No explanation is available for this question!', 0),
(245, 135, 'What data structure is used to construct a Prev LSN in a database log?', 'Queue', 'Link List', 'Graph', 'Tree', 2, 'No explanation is available for this question!', 0),
(246, 135, 'What stores the metadata about the structure of the database, in particular the schema of the database?', 'Indices', 'Database log', 'Data files', 'Data Dictionary', 4, 'No explanation is available for this question!', 0),
(247, 135, 'Which of the following language is used to define the integrity constraints?', 'DCL', 'DML', 'DDL', 'All of the above', 3, 'No explanation is available for this question!', 0),
(248, 135, 'How many primary key can a table in database have?', 'Only one', 'At least one', 'More than one', 'Any number of', 1, 'No explanation is available for this question!', 0),
(249, 135, 'What does a query processor do in semantic checking?', 'Checks whether all the relations mentioned under the FROM clause in the SQL statement are from the database the user is referenced.', 'Checks all the attribute values and also checks whether they exist in a particular relation that is specified in the query. It checks all the attribute values that are mentioned in the SELECT and WHERE clauses of the SQL statement.', 'Verifies whether the types of attributes are compatible with the values used for the attributes.', 'All of these.', 4, 'No explanation is available for this question!', 0),
(250, 135, 'Which is the correct algorithmic sequence for the conversion of an expression from Infix to Prefix?<br/><br/>A. Change of every &#39;(&#39; (opening bracket) by &#39;)&#39; (closing bracket) and vice-versa.<br/>B. Reversal of an infix expression.<br/>C. Conversion of the modified expression into postfix form.<br/>D. Reversal of postfix expression.', 'A, B, C, D', 'C, A, D, B', 'B, A, C, D', 'D, B, A, C', 3, 'No explanation is available for this question!', 0),
(334, 140, 'Difference between circumference and diameter of a circle is 60 cm. <br/>What will be volume of cylinder, whose height is 14 cm more than that of radius of circle and radius of cylinder is 10 cm ?', '8400', '8500', '8800', '9800', 3, 'ATQ, 2&pi;r-2r=60<br/>2r=28<br/>r=14<br/>height of cylinder =14+14=28 cm<br/>radius=10 cm<br/>volume of cylinder=&pi;r^2h=22/7*10^2*28=8800 cm^3', 0),
(335, 140, 'A bag contains 5 oranges, 4 apples and 6 mangoes. <br/>4 fruits are drawn randomly, then find probability of getting all fruits are of mangoes.', '2/91', '1/19', '13/95', '5/96', 2, 'required no. of outcome=6C4<br/>total no. of outcome=15C4<br/>probability=(6C4)/15C4<br/>=6*5*4*3/15*14*13*12= 1/91', 0),
(336, 140, 'A man brought two articles for rs.1200. He sold one article at a profit of 20% and another article at a loss of 20%. <br/>If the selling price of both the articles is equal, then find the cost price of article which is sold at a loss of 20%.', '720', '800', '600', '550', 1, 'total CP of two article=1200<br/>CP of one article=x<br/>CP of another article=1200-x<br/>x*120/100=(1200-x)80/100<br/>6x/5=4800-4x/5<br/>x=480<br/>CP of article which is sold at a loss of 20%=1200-480=720', 0),
(337, 140, 'The ratio of the present ages of A and B is 4:3. 4 years hence the age of A will be 20% more than the age of B 6 years hence. <br/>Find the difference of their present ages.', '10', '15', '16', '8', 4, 'let the present age of A and B be 4x and 3x respectively<br/>4x+4=(3x+6)6/5<br/>4x+4=18x+36/5<br/>20x+20=18x+36<br/>2x=16<br/>x=8<br/>A&rsquo;s present age=32<br/>B&rsquo;s present age=24<br/>difference=32-24=8 years', 0),
(338, 140, 'A,B and C alone can complete the work in 16:24:32 days respectively. <br/>All of them started working together but after 2 days A left the job and 7 days before the completion of the work B also left the job. <br/>In how many days the work is completed ?', '20', '15', '25', '16', 4, 'LCM of 16,24 and 32=96<br/>A&rsquo;s efficiency=96/6=16<br/>B&rsquo;s efficiency=96/24=4<br/>C&rsquo;s efficiency=96/32=3<br/>all work together for 2 days=13*2=26 work<br/>remaining work=96-26=70<br/>C alone work for 7 days=7*3=21 work<br/>remaining work done by B and C together=49/7=7 days<br/>total time required=2+7+7=16 days', 0),
(339, 140, 'A train crosses a bridge and a platform of length 650m and 800m in 20 sec and 30 sec respectively. <br/>Find the speed of the train(in km/hr).', '300', '280', '200', '180', 4, 'let the length of train=x<br/>x+650/20=x+800/30<br/>3x+1950=2x+1600<br/>x=350<br/>speed of train=350+650/20=50 m/sec<br/>speed of train (in km/hr)=50*18/5=180 km/hr', 0),
(340, 140, 'A,B and C enter into a partnership by investing in the ratio of 3:4:5. <br/>After 1 year, B invests another 15000 and C at the end of 2 years also invest 10000. At the end of 3 years profit are shared in the ratio of 3:5:7.<br/>Find initial investment of C.', '60000', '50000', '65000', '70000', 2, 'let A,B and C invest be 3x, 4x and 5x respectively<br/>A&rsquo;s total investment=3x*3=9x<br/>B&rsquo;s total investment=(4x*1)+(4x+15000)*2=12x+30000<br/>C&rsquo;s total investment=(5x*2)+(5x+10000)*1=15x+10000<br/>9x/12x+30000=3/5<br/>45x=36x+90000<br/>9x=90000<br/>x=10000<br/>C&rsquo;s initially invested=5*10000=50000', 0),
(341, 140, 'Difference between SI and CI in certain amount of principal is rs.60. <br/>If the rate of interest is 20% in both cases, then find the SI after 3 years in same rate of interest.', '850', '600', '900', '1200', 3, 'ATQ, 60=PR^2//100^2<br/>60=P*400/1000<br/>P=1500<br/>SI after 3 years=1500*20/100*3=900', 0),
(342, 140, 'In a vessel milk and water are in the ratio of 5:3. <br/>If 48 liter of mixture is taken out from the vessel and 30 liter of water is added, then new ratio of milk and water becomes 4:3. <br/>Find the initial quantity of mixture in vessel.', '368', '280', '365', '440', 1, 'let the milk and water be 5x and 3x<br/>(5x-30)/3x-18+30=4/3<br/>15x-90=12x-48<br/>3x=138<br/>x=46<br/>total quantity of mixture=8x=8*46=368', 0),
(343, 140, 'The income of A and B is in the ratio of 3:2 and their expenditure in the ratio of 4:3. <br/>If each of them save rs.4000, then find income of A ?', '9000', '8400', '9500', '6500', 2, 'let the income of A and B be 3x and 2x respectively<br/>3x-4000/2x-4000=7/3<br/>9x-12000=14x-2800<br/>5x=14000<br/>x=2800<br/>income of A=2800*3=8400', 0),
(344, 140, 'Find the missing term in place of question mark (?) in the following number series:<br/>8, 31, 67, 118, 187, ? , 401', '341', '305', '279', '275', 3, '8(+23) , 31(+36) , 67(+51) , 118(+69) , 187(+92) , 279 (+122) , 401', 0),
(345, 140, '5 , 11 , 21 , 44 , ? , 175 , 347', '81', '75', '55', '86', 4, '5*2+1=11<br/>11*2-1=21<br/>21*2+2=44<br/>44*2-2=86<br/>86*2+3=175<br/>175*2-3=347', 0),
(346, 140, 'What will come in place of the &ldquo;x&rdquo; in the following questions:<br/>25% of 400 + 30% of 270 + 48% of 100 = x', '229', '225', '249', '236', 1, '(25/100)*400+(30/100)*270+(48/100)*100 = x<br/>100+81+48=229', 0),
(347, 140, 'x% of 400 &divide; 75 + (2/5) of 315 = 30% of 625', '1355.15', '1200.25', '1168.25', '1153.12', 4, '(4x/75)+(2/5)*315=(30/100 )*625\n(4x/75)+126=187.5\n(4x/75)=187.5-126\n(4x/75)=61.5\nx=1153.125', 0),
(348, 140, 'P1 and P2 are the two pockets were made by mixing chilli powder and turmeric powder in the ratio 3:5 and 5:9 respectively.<br/>If 60 grams of P1 and x grams of P2 are mixed to getpocket P3, then fid out the value of x , if the ratio of chilli and turmeric in the new pocket P3 is 35:61?', '70', '56', '98', '84', 4, 'In x gram of P2<br/>chilli = 5x/14<br/>turmeric= 9x/14<br/>in 60 gm in P1<br/>chilli=60 * 3/8= 45/2<br/>turmeric=60 85/8=75/2<br/>and =&gt;(45/2 +5x/14) / (75/2+9x/14) = 35/61<br/>=&gt;x= 84g', 0),
(349, 140, 'Rakesh bought a loan Rs.3,00,000 in a newyear scheme which gives r% per annum at Compound interest and this scheme doubles the loan in 72/r years which is double of the rate of interest given by the scheme.<br/>Find the total amount paid by Rakesh at the end of 48 years?', '12lac', '34lac', '45lac', '48lac', 4, 'given 72/r= 2r<br/>=&gt; r=6%<br/>So the loan amount double in 12 years.<br/>=&gt;6,00, 000= 3,00,000 ( 1+ r/100 ) ^12<br/>=&gt;1+ r/ 100 ) ^ 12= 2<br/>So required loan amount to pay = 3,00,000 ( 1+ r/100 ) ^ 48 = 3,00,000 *2^ 4 = Rs. 48,00,000', 0),
(350, 140, 'karthik and kathir&rsquo;s current age is 7: 5 and 3 years back their ages were 16:11. <br/>So what is the age of kathir after 5 years?', '15', '25', '30', '40', 3, 'let their ages be 5x and 7x .<br/>so 7x-3/5x-3 = 16/11<br/>=&gt; x= 5<br/>Hence the age of kathir = 5* 5+ 5= 30 years', 0),
(351, 140, 'Person 1 started a business y investing Rs. A after 4 months person 2 also joined with the investment of Rs. x+ 10,000. <br/>But the end of the year their profit are same. <br/>Then what is the amount invested by', '20000', '14000', '30000', '45000', 3, 'p1 P2<br/>investment x x+10,000<br/>time 12 8<br/>12x 8x+ 80,000<br/>12x= 8x + 80,000<br/>=&gt;x=20,000<br/>hence person 2 investment = 30,000', 0),
(352, 140, 'An house is on sale is said to 50% above its original price. <br/>But after the seller gives discount and gets only 20% profit. <br/>Find the percentage of discount ?', '10%', '20%', '30%', '40%', 2, 'let the original price of the house = 100x<br/>Then said price= 100x * 150/100= 150x<br/>SP= 120x<br/>discount% = 30x/150x * 100 = 20%', 0),
(353, 140, 'If the sum of the speed of a boat upsteam and down stream is 36kmph and speed of the stream is 1/3 of the speed of the boat. <br/>Find the time taken to travel 108 km upstream and 96km downstream by the boat?', '10 hrs', '11 hrs', '12 hrs', '13 hrs', 4, 'speed of boat =36/2= 18kmph<br/>speed of stream = 1/3 * 18 = 6kmph<br/>Time = 108/18-6 + 96/ 18+ 6<br/>=13hrs', 0),
(354, 140, 'Person A and Person B are 10 km apart. A can walk at an average speed of 2 km/hr and B at 3 km/h. <br/>If they start walking towards each other at 5:30 pm, when they will meet?', '7:30 pm', '10:30 pm', '9:30 pm', '6:30 pm', 1, 'Suppose they will meet after T hours.<br/>Distance = Speed x Time<br/>Sum of distance traveled by them after T hours<br/>3T + 2T = 10 km<br/>T = 2 hours.<br/>So they will meet at 5:30 pm + 2 hours = 7:30 pm', 0),
(355, 140, 'Find the greatest possible length of scale which can be used to measure the iron bar 8m 3cm, 8m 34cm and 9m 30cm exactly.', '63 cm', '64 cm', '61 cm', '62 cm', 4, 'Required measure of scale = HCF of 803, 834 and 930<br/>= 62 cm', 0),
(356, 140, 'A seller marked an article at Rs 500 and sold it allowing 20% discount. <br/>If his profit was 25%, then the cost price of the article was', '310', '320', '280', '330', 2, 'Hence, cost price of an article = (400 x 100)/(100 + 25)<br/>= (400 x 100)/125<br/>= 320', 0),
(357, 140, 'The marked price of a watch is Rs. 800. A shopkeeper gives two successive discounts and sells the watch at Rs. 612. If the first discount is 10%, the second discount is', '12%', '20%', '15%', '10%', 3, '', 1),
(358, 140, 'If sum of upstream and between downstream speed of a boat is 80 kmph , and the boat travels 90 km . <br/>upstream in 3hr Find the time taken by boat to cover 120 km downstream', '121/5 hr', '13//5 hr', '12/5 hr', '12/7 hr', 3, 'let b= speed of the boat<br/>w= speed of water<br/>u= upstream speed= b-w<br/>d= downstream speed = b+w<br/>So u +d= 80<br/>that is b-w+b+w= 80<br/>=&gt;b= 40<br/>40-w= 90/3 = 30<br/>w= 10 kmph<br/>b+w= 120/t<br/>t= 120/50 = 12/5 hr', 0),
(359, 140, 'The difference between simple interest and compound interest of a certain sum of money at 10 % per annum for 2 years is Rs. 40. <br/>Then the sum is ;', 'Rs. 5000', 'Rs. 4000', 'Rs. 6000', 'Rs. 8000', 2, 'CI- SI = P ( r/100 ) ^2<br/>40 = p( 10/100) ^2<br/>=&gt; P= Rs.4000', 0),
(360, 140, 'Compound interest of a sum of money for 2 years at 4 percent per annum is Rs . 2500 Simple interest of the same sum of money at the same rate of interest for 2 years will be :', 'Rs. 2350', 'Rs. 2456', 'Rs. 2450', 'Rs. 2451', 4, 'CI= P( 1+r/100 ) ^t &ndash; P<br/>2500 = P (( 1-4/100)^2 -1)<br/>=&gt; p= 2500 * 625 / 51=Rs. 30637.25<br/>SI= 30,637.25 * 4* 2/100=Rs.2451', 0),
(361, 140, 'The are two positive integers a and b . What is the probability that a + b is odd ?', '1/2', '1/3', '1/4', '1/5', 1, 'Sum of positive integers is either odd or even.<br/>So the probality = 1/2', 0),
(362, 140, 'Kailash sells apples at a loss of 44 % but he uses a false scale which is 30 % less than its true weight . <br/>Find the loss / gain percent ?', '21%', '22%', '20%', '23%', 3, 'Let CP = Rs.100 for 100g<br/>So SP=Rs. 56 for 70g<br/>and SP =Rs. 80 for 100g<br/>loss%=100-80/100 * 100 = 20%', 0),
(363, 140, 'Average age of A ,B and C is 80 years . <br/>When D joins them the average age becomes 70 years . <br/>A new persons E, whose age is 4 years more than D replaces A and the average of B , C, D and E becomes 75 years . <br/>What is the age of A ?', '20 yrs', '22 yrs', '23 yrs', '24 yrs', 4, 'A+B+C = 3* 80 = 240 yrs<br/>A+B+C+D= 4* 70 = 280 yrs<br/>D age= 280-240 = 40yrs<br/>=&gt; E age= 40 + 4 = 44 yrs<br/>B+C+D+E age = 75* 4= 300 yrs<br/>B+C age = 300 &ndash; 40-44=216<br/>A age = 240-216=24 yrs', 0),
(364, 141, 'Which of the following comment is correct when a macro definition includes arguments?', 'The opening parenthesis should immediately follow the macro name.', 'There should be at least one blank between the macro name and the opening parenthesis.', 'There should be only one blank between the macro name and the opening parenthesis.', 'All the above comments are correct.', 1, '', 0),
(365, 141, 'main()  \n{  \n   char x [10], *ptr = x;  \n  scanf (&quot;%s&quot;, x);  \n  change(&amp;x[4]);  \n}  \n change(char a[])  \n {  \n   puts(a);  \n }', 'abcd', 'abc', 'efg', 'Garbage', 3, '', 1),
(366, 141, '#include &lt;stdio.h&gt;  \n    int main()  \n    {  \n        int *ptr, a = 10;  \n        ptr = &amp;a;  \n        *ptr += 1;  \n        printf(&quot;%d,%d&#92;n&quot;, *ptr, a);  \n    }', '10, 10', '10, 11', '11, 10', '11, 11', 4, '', 1),
(367, 141, 'If addition had higher precedence than multiplication, then the value of the expression (1 + 2 * 3 + 4 * 5) would be which of the following?', '27', '47', '69', '105', 4, '', 0),
(368, 141, '#include&lt;stdio.h&gt;\n\nmain() \n{ \n   const int a = 5; \n   \n   a++; \n   printf(&quot;%d&quot;, a); \n}', '5', '6', 'Runtime Error', 'Compile error', 4, '', 1),
(369, 141, '#include&lt;stdio.h&gt;\r\n\r\nmain()\r\n{	\r\n   char *s = &quot;Hello, &quot;\r\n   &quot;World!&quot;;\r\n\r\n   printf(&quot;%s&quot;, s);\r\n}', 'Hello, World!', 'Hello,\r\nWorld!', 'Hello', 'Compile Error', 1, 'Two immediate string constant are considered as single string constant.', 1),
(370, 141, '#include&lt;stdio.h&gt;\n\nmain()\n{ \n   int x = 3;\n   \n   x += 2;\n   x =+ 2;\n   printf(&quot;%d&quot;, x); \n}', '2', '5', '7', 'Compile Error', 1, '', 1),
(371, 141, 'Which header file can be used to define input/output function prototypes and macros?', 'math.h', 'memory.h', 'stdio.h', 'dos.h', 3, 'The stdio.h header is used to define variable types, macros, and various functions for performing input and output operation.', 0),
(372, 141, 'In the given below code, the P2 is\r\n\r\n   Typedef int *ptr;\r\n   \r\n   ptr p1, p2;', 'Integer', 'Integer Pointer', 'Both, Integer &amp; Integer pointer', 'None of the above', 2, 'Ptr is an alias to int*', 1),
(373, 141, 'Which statement can print &#92;n on the screen?', 'printf(&quot;&#92;&#92;n&quot;);', 'printf(&quot;n&#92;&quot;);', 'printf(&quot;n&quot;);', 'printf(&#39;&#92;n&#39;);', 1, 'In C programming language, &quot;&#92;n&quot; is the escape sequence for printing a new line character. In printf(&quot;&#92;&#92;n&quot;); statement, &quot;&#92;&#92;&quot; symbol will be printed as &quot;&#92;&quot; and &ldquo;n&rdquo; will be known as a common symbol.', 0),
(374, 142, 'In the 16th century, an age of great marine and terrestrial exploration, Ferdinand Magellan led the first expedition to sail around the world. As a young Portuguese noble, he served the king of Portugal, but he became involved in the quagmire of political intrigue at court and lost the king&rsquo;s favor. After he was dismissed from service by the king of Portugal, he offered to serve the future Emperor Charles V of Spain.\r\n\r\nA papal decree of 1493 had assigned all land in the New World west of 50 degrees W longitude to Spain and all the land east of that line to Portugal. Magellan offered to prove that the East Indies fell under Spanish authority. On September 20, 1519, Magellan set sail from Spain with five ships. More than a year later, one of these ships was exploring the topography of South America in search of a water route across the continent. This ship sank, but the remaining four ships searched along the southern peninsula of South America. Finally they found the passage they sought near 50 degrees S latitude. Magellan named this passage the Strait of All Saints, but today it is known as the Strait of Magellan.\r\n\r\nOne ship deserted while in this passage and returned to Spain, so fewer sailors were privileged to gaze at that first panorama of the Pacific Ocean. Those who remained crossed the meridian now known as the International Date Line in the early spring of 1521 after 98 days on the Pacific Ocean. During those long days at sea, many of Magellan&rsquo;s men died of starvation and disease.\r\n\r\nLater, Magellan became involved in an insular conflict in the Philippines and was killed in a tribal battle. Only one ship and 17 sailors under the command of the Basque navigator Elcano survived to complete the westward journey to Spain and thus prove once and for all that the world is round, with no precipice at the edge.\r\n\r\nThe 16th century was an age of great ______ exploration.', 'coastline', 'mountain range', 'physical features', 'islands', 2, '', 0),
(375, 142, 'In the 16th century, an age of great marine and terrestrial exploration, Ferdinand Magellan led the first expedition to sail around the world. As a young Portuguese noble, he served the king of Portugal, but he became involved in the quagmire of political intrigue at court and lost the king&rsquo;s favor. After he was dismissed from service by the king of Portugal, he offered to serve the future Emperor Charles V of Spain.\r\n\r\nA papal decree of 1493 had assigned all land in the New World west of 50 degrees W longitude to Spain and all the land east of that line to Portugal. Magellan offered to prove that the East Indies fell under Spanish authority. On September 20, 1519, Magellan set sail from Spain with five ships. More than a year later, one of these ships was exploring the topography of South America in search of a water route across the continent. This ship sank, but the remaining four ships searched along the southern peninsula of South America. Finally they found the passage they sought near 50 degrees S latitude. Magellan named this passage the Strait of All Saints, but today it is known as the Strait of Magellan.\r\n\r\nOne ship deserted while in this passage and returned to Spain, so fewer sailors were privileged to gaze at that first panorama of the Pacific Ocean. Those who remained crossed the meridian now known as the International Date Line in the early spring of 1521 after 98 days on the Pacific Ocean. During those long days at sea, many of Magellan&rsquo;s men died of starvation and disease.\r\n\r\nLater, Magellan became involved in an insular conflict in the Philippines and was killed in a tribal battle. Only one ship and 17 sailors under the command of the Basque navigator Elcano survived to complete the westward journey to Spain and thus prove once and for all that the world is round, with no precipice at the edge.\r\n\r\nMagellan lost the favor of the king of Portugal when he became involved in a political ________.', 'entanglement', 'discussion', 'negotiation', 'problem', 1, '', 0),
(376, 142, 'In the 16th century, an age of great marine and terrestrial exploration, Ferdinand Magellan led the first expedition to sail around the world. As a young Portuguese noble, he served the king of Portugal, but he became involved in the quagmire of political intrigue at court and lost the king&rsquo;s favor. After he was dismissed from service by the king of Portugal, he offered to serve the future Emperor Charles V of Spain.\r\n\r\nA papal decree of 1493 had assigned all land in the New World west of 50 degrees W longitude to Spain and all the land east of that line to Portugal. Magellan offered to prove that the East Indies fell under Spanish authority. On September 20, 1519, Magellan set sail from Spain with five ships. More than a year later, one of these ships was exploring the topography of South America in search of a water route across the continent. This ship sank, but the remaining four ships searched along the southern peninsula of South America. Finally they found the passage they sought near 50 degrees S latitude. Magellan named this passage the Strait of All Saints, but today it is known as the Strait of Magellan.\r\n\r\nOne ship deserted while in this passage and returned to Spain, so fewer sailors were privileged to gaze at that first panorama of the Pacific Ocean. Those who remained crossed the meridian now known as the International Date Line in the early spring of 1521 after 98 days on the Pacific Ocean. During those long days at sea, many of Magellan&rsquo;s men died of starvation and disease.\r\n\r\nLater, Magellan became involved in an insular conflict in the Philippines and was killed in a tribal battle. Only one ship and 17 sailors under the command of the Basque navigator Elcano survived to complete the westward journey to Spain and thus prove once and for all that the world is round, with no precipice at the edge.\r\n\r\nThe Pope divided New World lands between Spain and Portugal according to their location on one side or the other of an imaginary geographical line 50 degrees west of Greenwich that extends in a _________ direction.', 'north and south', 'crosswise', 'easterly', 'south east', 1, '', 0),
(377, 142, 'In the 16th century, an age of great marine and terrestrial exploration, Ferdinand Magellan led the first expedition to sail around the world. As a young Portuguese noble, he served the king of Portugal, but he became involved in the quagmire of political intrigue at court and lost the king&rsquo;s favor. After he was dismissed from service by the king of Portugal, he offered to serve the future Emperor Charles V of Spain.\r\n\r\nA papal decree of 1493 had assigned all land in the New World west of 50 degrees W longitude to Spain and all the land east of that line to Portugal. Magellan offered to prove that the East Indies fell under Spanish authority. On September 20, 1519, Magellan set sail from Spain with five ships. More than a year later, one of these ships was exploring the topography of South America in search of a water route across the continent. This ship sank, but the remaining four ships searched along the southern peninsula of South America. Finally they found the passage they sought near 50 degrees S latitude. Magellan named this passage the Strait of All Saints, but today it is known as the Strait of Magellan.\r\n\r\nOne ship deserted while in this passage and returned to Spain, so fewer sailors were privileged to gaze at that first panorama of the Pacific Ocean. Those who remained crossed the meridian now known as the International Date Line in the early spring of 1521 after 98 days on the Pacific Ocean. During those long days at sea, many of Magellan&rsquo;s men died of starvation and disease.\r\n\r\nLater, Magellan became involved in an insular conflict in the Philippines and was killed in a tribal battle. Only one ship and 17 sailors under the command of the Basque navigator Elcano survived to complete the westward journey to Spain and thus prove once and for all that the world is round, with no precipice at the edge.\r\n\r\nOne of Magellan&rsquo;s ships explored the _________ of South America for a passage across the continent.', 'coastline', 'mountain range', 'physical features', 'islands', 3, '', 0),
(378, 142, 'In the 16th century, an age of great marine and terrestrial exploration, Ferdinand Magellan led the first expedition to sail around the world. As a young Portuguese noble, he served the king of Portugal, but he became involved in the quagmire of political intrigue at court and lost the king&rsquo;s favor. After he was dismissed from service by the king of Portugal, he offered to serve the future Emperor Charles V of Spain.\r\n\r\nA papal decree of 1493 had assigned all land in the New World west of 50 degrees W longitude to Spain and all the land east of that line to Portugal. Magellan offered to prove that the East Indies fell under Spanish authority. On September 20, 1519, Magellan set sail from Spain with five ships. More than a year later, one of these ships was exploring the topography of South America in search of a water route across the continent. This ship sank, but the remaining four ships searched along the southern peninsula of South America. Finally they found the passage they sought near 50 degrees S latitude. Magellan named this passage the Strait of All Saints, but today it is known as the Strait of Magellan.\r\n\r\nOne ship deserted while in this passage and returned to Spain, so fewer sailors were privileged to gaze at that first panorama of the Pacific Ocean. Those who remained crossed the meridian now known as the International Date Line in the early spring of 1521 after 98 days on the Pacific Ocean. During those long days at sea, many of Magellan&rsquo;s men died of starvation and disease.\r\n\r\nLater, Magellan became involved in an insular conflict in the Philippines and was killed in a tribal battle. Only one ship and 17 sailors under the command of the Basque navigator Elcano survived to complete the westward journey to Spain and thus prove once and for all that the world is round, with no precipice at the edge.\r\n\r\nFour of the ships sought a passage along a southern ______.', 'coast', 'inland', 'body of land with water on three sides', 'border', 3, '', 0);

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
(67, 'History ', 'Beginner', 'General knowledge', 5, 0, 0, 0, 'yr25op', 0, 1, 900, 1, 0.5, 60, 5, '2020-12-14 23:36:04'),
(103, 'C++ Programming', 'Intermediate', 'This Online C Programming Test is specially designed for you by industry experts.', 10, 0, 0, 0, '9911', 0, 1, 1800, 1, 0, 60, 5, '2020-12-14 23:36:05'),
(118, 'Operating System', 'Intermediate', 'An operating system, or \"OS,\" is software that communicates with the hardware and allows other programs to run. ... Every desktop computer, tablet, and smartphone includes an operating system that provides basic functionality for the device. Common desktop operating systems include Windows, OS X, and Linux\r<br/>', 5, 0, 0, 0, 'ishwar1999', 1, 1, 900, 2, 0, 60, 24, '2020-12-15 14:57:16'),
(126, 'Design and Analysis of Algorithms', 'Intermediate', 'Exam Key : daa@1999\r\n<br/>\r\n<br/>Design and Analysis of Algorithm is very important for designing algorithm to solve different types of problems in the branch of computer science and information technology.', 10, 0, 0, 0, 'daa@1999', 1, 1, 2700, 0, 0, 0, 24, '2020-12-15 14:54:36'),
(134, 'CODE - C', 'Intermediate', 'C and C++ Programming based Questions.\r<br/>Types\r<br/>-> Output based\r<br/>-> Error search\r<br/>-> Theory\r<br/>- >Architecture\r<br/>-> OOPS\r<br/>', 5, 1, 1611859500, 1611861300, '23031999', 1, 1, 900, 1, 0.5, 60, 24, '2020-12-15 14:54:23'),
(135, 'DODNetHTML', 'Advance', 'Question are based on Data Base, Operating System, Data Structure, Networking, HTML. ', 7, 0, 0, 0, 'in@100', 1, 1, 1800, 2, 1, 70, 25, '2020-12-14 23:36:27'),
(140, 'Quantitative Aptitude', 'Beginner', 'Arithmetic Ability test helps measure one\'s numerical ability, problem solving and mathematical skills. ... Every aspirant giving Quantitative Aptitude Aptitude test tries to solve maximum number of problems with maximum accuracy and speed.', 30, 1, 0, 0, 'QA2021', 0, 1, 3600, 1, 0, 60, 24, '2021-04-12 02:35:41'),
(141, 'C Programming Basic', 'Beginner', 'Practice Test', 10, 1, 0, 0, 'CP2021', 0, 1, 900, 2, 0, 50, 24, '2021-04-12 14:33:29'),
(142, 'Comprehension', 'Intermediate', 'Comprehension', 5, 1, 0, 0, 'CT2021', 0, 0, 1800, 2, 1, 60, 24, '2021-04-12 20:57:59');

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
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

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
