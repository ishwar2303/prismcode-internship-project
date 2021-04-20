-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 10:31 PM
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
(11, 150, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 82, 120, 45, 8, 7, 60, 60, '2021-04-15 19:00:11'),
(12, 150, 'PANKAJ GAUTAM', 'RA1811003030188', 'pankaj.gautam4012@gmail.com', 44, 120, 25, 6, 29, 60, 60, '2021-04-15 18:16:58'),
(13, 150, 'RHYTHM SHARMA', 'RA1811003030214', 'srhythm2020@gmail.com', 76, 120, 41, 6, 13, 60, 60, '2021-04-15 20:25:20'),
(29, 150, 'TAPAS BARANWAL', 'RA1811003030216', 'tapasbaranwal@gmail.com', 10, 120, 6, 2, 52, 60, 60, '2021-04-20 08:35:15'),
(33, 134, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 5, 5, 5, 0, 0, 50, 5, '2021-04-20 17:46:54'),
(34, 141, 'ISHWAR BAISLA', 'RA1811003030232', 'ishwar2303@gmail.com', 17, 20, 9, 1, 0, 50, 10, '2021-04-20 19:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `certificate_id` int(11) NOT NULL,
  `quiz_name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `candidate_name` varchar(50) NOT NULL,
  `score` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`certificate_id`, `quiz_name`, `date`, `candidate_name`, `score`, `email`) VALUES
(7, 'CODE - C', '2021-04-20 17:46:54', 'ISHWAR BAISLA', '100', 'ishwar2303@gmail.com'),
(8, 'C Programming Basic', '2021-04-20 19:27:38', 'ISHWAR BAISLA', '85', 'ishwar2303@gmail.com');

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
(9, 'Very difficult exam\r\nLogical number series questions were too much difficult\r\nPlease adjust difficulty level accordingly for preparation', 25);

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
(48, 'WhatsApp Image 2021-04-15 at 10.52.41 AM.jpeg', 'pankaj.gautam4012@gmail.com');

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
(167, 103, 'Predict the output of the following code segment:\n// Add stdio.h header file in below code\n\nint main()\n{\n   int array[10] = {3, 0, 8, 1, 12, 8, 9, 2, 13, 10};\n   int x, y, z;\n   x = ++array[2]; \n   y = array[2]++;\n   z = array[x++]; \n   printf(&quot;%d %d %d&quot;, x, y, z);\n   return 0;\n}', '10 9 10', '9 9 10', '10 10 9', 'None of the above', 1, 'NA', 0),
(168, 103, 'Which of the following has a global scope in the program?', 'Formal parameters', 'Constants', 'Macros', 'Local variables', 3, 'NA', 0),
(169, 103, 'Which of the following statements about functions is false?', 'The main() function can be called recursively', 'Functions cannot return more than one value at a time', 'A function can have multiple return statements with different return values', 'The maximum number of arguments a function can take is 128', 4, 'NA', 0),
(170, 103, 'What is the correct way of treating 9.81 as a long double?', '9.81L', '9.81LD', '9.81D', '9.81DL', 1, 'NA', 0),
(171, 103, 'Which function would you use to convert 1.98 to 1?', 'ceil()', 'floor()', 'fabs()', 'abs()', 1, 'NA', 0),
(172, 103, 'Which of the following statements about the null pointer is correct?', 'The null pointer is similar to an uninitialized pointer', 'You can declare a null pointer as char* p = (char*)0', 'The NULL macro is defined only in the stdio.h header', 'The sizeof( NULL) operation would return the value 1', 2, 'NA', 0),
(173, 103, 'Which of the following statements about unions is incorrect?', 'A bit field cannot be used in a union', 'A pointer to a union exists', 'Union elements can be of different sizes', 'A union can be nested into a structure', 1, 'NA', 0),
(174, 103, 'What is the range of double data type for a 16-bit compiler?', '-1.7e-328 to +1.7e-328', '-1.7e-348 to +1.7e-348', '-1.7e-308 to +1.7e-308', '-1.7e-328 to +1.7e-328', 3, 'NA', 0),
(175, 103, 'Predict the output of the following code segment:\r<br/>// Add stdio.h header file in below code\r<br/>int main()\r<br/>{\r<br/>&nbsp;&nbsp;int x = 6;\r<br/>&nbsp;&nbsp;int y = 4;\r<br/>&nbsp;&nbsp; int z;\r<br/>&nbsp;&nbsp; if(!x &gt;= 5)\r<br/>&nbsp;&nbsp;y = 3;\r<br/>&nbsp;&nbsp;z = 2;\r<br/>&nbsp;&nbsp;printf(\"%d %d\", z, y);\r<br/>&nbsp;&nbsp;return 0;\r<br/>}', '4 2', '2 4', '2 3', '3 2', 2, 'NA', 0),
(176, 103, 'Predict the output of the following code segment:\n// Add stdio.h header file in below code\n\nint main()\n{\nint a,b,c;\na = b = c = 10;\nc = a++ || ++b &amp;&amp; ++c;\nprintf(&quot;%d %d %d&quot;,c, a, b);\nreturn 0;\n}', '1 11 10', '10 11 1', '10 11 10', '1 1 10', 1, 'NA', 0),
(191, 126, 'How many number of comparisons are required in insertion sort to sort a file if the file is sorted in reverse order?', 'N2', 'N', 'N-1', 'N/2', 1, '', 0),
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
(238, 134, 'What should be the output of below program?\n\nint main()\n{\n   int a=10; \n   cout&lt;&lt;a++;\n   return 0;\n}', '11', '10', 'Error', '0', 2, 'Post Increment', 1),
(239, 134, '#include&lt;iostream.h&gt;\nvoid Execute(int &amp;x, int y = 200)\n{\n int TEMP = x + y;\n x+= TEMP;\n if(y!=200)\n     cout&lt;&lt;TEMP&lt;&lt;x&lt;&lt;y&quot;--&quot;;\n}\n\nint main()\n{\n int A=50, B=20;\n cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\n Execute(A,B);\n cout&lt;&lt;A&lt;&lt;B&lt;&lt;&quot;--&quot;;\n return 0;\n}', '5020--5020--', '5020--7012020--12020--', '5020--70120200--5020', '5020--7050200--5020--', 2, '', 1),
(240, 134, 'How many times CppBuzz.com is printed?\n\nint main()\n{\n    int i=0;\n    lbl:\n    cout&lt;&lt;&quot;CppBuzz.com&quot;;\n    i++;\n    if(i&lt;5)\n    {\n	goto lbl;\n    }\n    return 0;\n\n}', 'Error', '5 times', '4 times', '6 times', 2, '', 1),
(241, 134, 'What is output of below program?\n\nint main()\n{\n  int a=10;\n  int b,c;\n  b = a++;\n  c = a;\n  cout&lt;&lt;a&lt;&lt;b&lt;&lt;c;\n  return 0;\n}', '111011', '111111', '101011', '101010', 1, '', 1),
(334, 140, 'Difference between circumference and diameter of a circle is 60 cm. <br/>What will be volume of cylinder, whose height is 14 cm more than that of radius of circle and radius of cylinder is 10 cm ?', '8400', '8500', '8800', '9800', 3, 'ATQ, 2&pi;r-2r=60<br/>2r=28<br/>r=14<br/>height of cylinder =14+14=28 cm<br/>radius=10 cm<br/>volume of cylinder=&pi;r^2h=22/7*10^2*28=8800 cm^3', 0),
(335, 140, 'A bag contains 5 oranges, 4 apples and 6 mangoes. \n4 fruits are drawn randomly, then find probability of getting all fruits are of mangoes.', '2/91', '1/91', '13/95', '5/96', 2, 'required no. of outcome=6C4\ntotal no. of outcome=15C4\nprobability=(6C4)/15C4\n=6*5*4*3/15*14*13*12= 1/91', 0),
(336, 140, 'A man brought two articles for rs.1200. He sold one article at a profit of 20% and another article at a loss of 20%. <br/>If the selling price of both the articles is equal, then find the cost price of article which is sold at a loss of 20%.', '720', '800', '600', '550', 1, 'total CP of two article=1200<br/>CP of one article=x<br/>CP of another article=1200-x<br/>x*120/100=(1200-x)80/100<br/>6x/5=4800-4x/5<br/>x=480<br/>CP of article which is sold at a loss of 20%=1200-480=720', 0),
(337, 140, 'The ratio of the present ages of A and B is 4:3. 4 years hence the age of A will be 20% more than the age of B 6 years hence. <br/>Find the difference of their present ages.', '10', '15', '16', '8', 4, 'let the present age of A and B be 4x and 3x respectively<br/>4x+4=(3x+6)6/5<br/>4x+4=18x+36/5<br/>20x+20=18x+36<br/>2x=16<br/>x=8<br/>A&rsquo;s present age=32<br/>B&rsquo;s present age=24<br/>difference=32-24=8 years', 0),
(338, 140, 'A,B and C alone can complete the work in 16:24:32 days respectively. <br/>All of them started working together but after 2 days A left the job and 7 days before the completion of the work B also left the job. <br/>In how many days the work is completed ?', '20', '15', '25', '16', 4, 'LCM of 16,24 and 32=96<br/>A&rsquo;s efficiency=96/6=16<br/>B&rsquo;s efficiency=96/24=4<br/>C&rsquo;s efficiency=96/32=3<br/>all work together for 2 days=13*2=26 work<br/>remaining work=96-26=70<br/>C alone work for 7 days=7*3=21 work<br/>remaining work done by B and C together=49/7=7 days<br/>total time required=2+7+7=16 days', 0),
(339, 140, 'A train crosses a man, who is running in the same direction of train at the speed of 2 m/sec. in 10 seconds. The same train crosses a tunnel in 54 seconds. If speed of train is 72 km/h then what is the length of tunnel?', '860', '900', '1080', '1120', 1, 'Speed of running man = 2 m/sec\nTime taken by train to crosss = 10 sec.\n=&gt; Distance covered by man when the train was crossing = 2 x 10 = 20 m.\nSpeed of the train = 72 km/hr = 20 m/sec;\n=&gt; Distance covered by train in 10sec = 20 x 10 = 200m.\nBut actual distance covered from the head to the end of the train = 200 + 20 = 220 m.\nThis is the length of the train = 220 m.\nNow, time taken by the train to cross the tunnel = 54 sec;\nTo find the length of the tunnel we solve as follows,\nLet&rsquo;s the length of the tunnel = &lsquo;x&rsquo; m;\n=&gt; Time taken to cover (x + 220) m = 54 sec;\n=&gt; (x + 220)/20 = 54;\n=&gt; x = 54 x 20 - 220 = 1080 - 220 = 860 m.\nThus, length of the tunnel = 860 m.', 0),
(340, 140, 'A,B and C enter into a partnership by investing in the ratio of 3:4:5. <br/>After 1 year, B invests another 15000 and C at the end of 2 years also invest 10000. At the end of 3 years profit are shared in the ratio of 3:5:7.<br/>Find initial investment of C.', '60000', '50000', '65000', '70000', 2, 'let A,B and C invest be 3x, 4x and 5x respectively<br/>A&rsquo;s total investment=3x*3=9x<br/>B&rsquo;s total investment=(4x*1)+(4x+15000)*2=12x+30000<br/>C&rsquo;s total investment=(5x*2)+(5x+10000)*1=15x+10000<br/>9x/12x+30000=3/5<br/>45x=36x+90000<br/>9x=90000<br/>x=10000<br/>C&rsquo;s initially invested=5*10000=50000', 0),
(341, 140, 'Find the length of the largest possible square slab which can be used in paving the floor 5m 44cm long and 3 m 74 cm broad', '20', '26', '34', '48', 3, '5m 44cm = 544cm = 2*2*2*2*2*17\n3m 74cm = 374cm = 2*111*17\n\nHCF(544, 374) = 17*2 = 34', 0),
(342, 140, 'In a vessel milk and water are in the ratio of 5:3. <br/>If 48 liter of mixture is taken out from the vessel and 30 liter of water is added, then new ratio of milk and water becomes 4:3. <br/>Find the initial quantity of mixture in vessel.', '368', '280', '365', '440', 1, 'let the milk and water be 5x and 3x<br/>(5x-30)/3x-18+30=4/3<br/>15x-90=12x-48<br/>3x=138<br/>x=46<br/>total quantity of mixture=8x=8*46=368', 0),
(343, 140, 'The income of A and B is in the ratio of 3:2 and their expenditure in the ratio of 4:3. <br/>If each of them save rs.4000, then find income of A ?', '9000', '8400', '9500', '6500', 2, 'let the income of A and B be 3x and 2x respectively<br/>3x-4000/2x-4000=7/3<br/>9x-12000=14x-2800<br/>5x=14000<br/>x=2800<br/>income of A=2800*3=8400', 0),
(344, 140, 'Find the missing term in place of question mark (?) in the following number series:<br/>8, 31, 67, 118, 187, ? , 401', '341', '305', '279', '275', 3, '8(+23) , 31(+36) , 67(+51) , 118(+69) , 187(+92) , 279 (+122) , 401', 0),
(345, 140, '5 , 11 , 21 , 44 , ? , 175 , 347', '81', '75', '55', '86', 4, '5*2+1=11<br/>11*2-1=21<br/>21*2+2=44<br/>44*2-2=86<br/>86*2+3=175<br/>175*2-3=347', 0),
(346, 140, 'What will come in place of the &ldquo;x&rdquo; in the following questions:<br/>25% of 400 + 30% of 270 + 48% of 100 = x', '229', '225', '249', '236', 1, '(25/100)*400+(30/100)*270+(48/100)*100 = x<br/>100+81+48=229', 0),
(347, 140, 'x% of 400 &divide; 75 + (2/5) of 315 = 30% of 625', '1355.15', '1200.25', '1168.25', '1153.12', 4, '(4x/75)+(2/5)*315=(30/100 )*625\n(4x/75)+126=187.5\n(4x/75)=187.5-126\n(4x/75)=61.5\nx=1153.125', 0),
(348, 140, 'P1 and P2 are the two pockets were made by mixing chilli powder and turmeric powder in the ratio 3:5 and 5:9 respectively.\nIf 60 grams of P1 and x grams of P2 are mixed to getpocket P3, then fid out the value of x , if the ratio of chilli and turmeric in the new pocket P3 is 35:61?', '70', '56', '98', '84', 4, 'In x gram of P2\nchilli = 5x/14\nturmeric= 9x/14\nin 60 gm in P1\nchilli=60 * 3/8= 45/2\nturmeric=60 85/8=75/2\nand =&gt;(45/2 +5x/14) / (75/2+9x/14) = 35/61\n=&gt;x= 84g', 0),
(349, 140, 'Rakesh bought a loan Rs.3,00,000 in a newyear scheme which gives r% per annum at Compound interest and this scheme doubles the loan in 72/r years which is double of the rate of interest given by the scheme.<br/>Find the total amount paid by Rakesh at the end of 48 years?', '12lac', '34lac', '45lac', '48lac', 4, 'given 72/r= 2r<br/>=&gt; r=6%<br/>So the loan amount double in 12 years.<br/>=&gt;6,00, 000= 3,00,000 ( 1+ r/100 ) ^12<br/>=&gt;1+ r/ 100 ) ^ 12= 2<br/>So required loan amount to pay = 3,00,000 ( 1+ r/100 ) ^ 48 = 3,00,000 *2^ 4 = Rs. 48,00,000', 0),
(350, 140, 'karthik and kathir&rsquo;s current age is 7: 5 and 3 years back their ages were 16:11. <br/>So what is the age of kathir after 5 years?', '15', '25', '30', '40', 3, 'let their ages be 5x and 7x .<br/>so 7x-3/5x-3 = 16/11<br/>=&gt; x= 5<br/>Hence the age of kathir = 5* 5+ 5= 30 years', 0),
(351, 140, 'Person 1 started a business y investing Rs. A after 4 months person 2 also joined with the investment of Rs. x+ 10,000. <br/>But the end of the year their profit are same. <br/>Then what is the amount invested by', '20000', '14000', '30000', '45000', 3, 'p1 P2<br/>investment x x+10,000<br/>time 12 8<br/>12x 8x+ 80,000<br/>12x= 8x + 80,000<br/>=&gt;x=20,000<br/>hence person 2 investment = 30,000', 0),
(352, 140, 'An house is on sale is said to 50% above its original price. <br/>But after the seller gives discount and gets only 20% profit. <br/>Find the percentage of discount ?', '10%', '20%', '30%', '40%', 2, 'let the original price of the house = 100x<br/>Then said price= 100x * 150/100= 150x<br/>SP= 120x<br/>discount% = 30x/150x * 100 = 20%', 0),
(353, 140, 'If the sum of the speed of a boat upsteam and down stream is 36kmph and speed of the stream is 1/3 of the speed of the boat. <br/>Find the time taken to travel 108 km upstream and 96km downstream by the boat?', '10 hrs', '11 hrs', '12 hrs', '13 hrs', 4, 'speed of boat =36/2= 18kmph<br/>speed of stream = 1/3 * 18 = 6kmph<br/>Time = 108/18-6 + 96/ 18+ 6<br/>=13hrs', 0),
(354, 140, 'Person A and Person B are 10 km apart. A can walk at an average speed of 2 km/hr and B at 3 km/h. <br/>If they start walking towards each other at 5:30 pm, when they will meet?', '7:30 pm', '10:30 pm', '9:30 pm', '6:30 pm', 1, 'Suppose they will meet after T hours.<br/>Distance = Speed x Time<br/>Sum of distance traveled by them after T hours<br/>3T + 2T = 10 km<br/>T = 2 hours.<br/>So they will meet at 5:30 pm + 2 hours = 7:30 pm', 0),
(355, 140, 'Find the greatest number that will divide 398, 436 and 542 leaving 7,11 and 15 as reminders respectively ?', '13', '15', '17', 'None of the above', 3, 'let x be the greatest number\nxa + 7 = 398, xa = 398 - 7 = 391\nxb + 11 = 436, xb = 436 - 11 = 425\nxc + 15 = 542, xc = 542 - 15 = 527\n391 = 17*13\n425 = 17*5*5\n527 = 17*23\nHCF(391, 425, 527) = 17', 0),
(356, 140, 'A seller marked an article at Rs 500 and sold it allowing 20% discount. <br/>If his profit was 25%, then the cost price of the article was', '310', '320', '280', '330', 2, 'Hence, cost price of an article = (400 x 100)/(100 + 25)<br/>= (400 x 100)/125<br/>= 320', 0),
(357, 140, 'The marked price of a watch is Rs. 800. A shopkeeper gives two successive discounts and sells the watch at Rs. 612. If the first discount is 10%, the second discount is', '12%', '20%', '15%', '10%', 3, '', 0),
(358, 140, 'If sum of upstream and between downstream speed of a boat is 80 kmph , and the boat travels 90 km . <br/>upstream in 3hr Find the time taken by boat to cover 120 km downstream', '121/5 hr', '13//5 hr', '12/5 hr', '12/7 hr', 3, 'let b= speed of the boat<br/>w= speed of water<br/>u= upstream speed= b-w<br/>d= downstream speed = b+w<br/>So u +d= 80<br/>that is b-w+b+w= 80<br/>=&gt;b= 40<br/>40-w= 90/3 = 30<br/>w= 10 kmph<br/>b+w= 120/t<br/>t= 120/50 = 12/5 hr', 0),
(359, 140, 'The difference between simple interest and compound interest of a certain sum of money at 10 % per annum for 2 years is Rs. 40. <br/>Then the sum is ;', 'Rs. 5000', 'Rs. 4000', 'Rs. 6000', 'Rs. 8000', 2, 'CI- SI = P ( r/100 ) ^2<br/>40 = p( 10/100) ^2<br/>=&gt; P= Rs.4000', 0),
(360, 140, 'Compound interest of a sum of money for 2 years at 4 percent per annum is Rs . 2500 Simple interest of the same sum of money at the same rate of interest for 2 years will be :', 'Rs. 2350', 'Rs. 2456', 'Rs. 2450', 'Rs. 2451', 4, 'CI= P( 1+r/100 ) ^t &ndash; P<br/>2500 = P (( 1-4/100)^2 -1)<br/>=&gt; p= 2500 * 625 / 51=Rs. 30637.25<br/>SI= 30,637.25 * 4* 2/100=Rs.2451', 0),
(361, 140, 'The are two positive integers a and b . What is the probability that a + b is odd ?', '1/2', '1/3', '1/4', '1/5', 1, 'Sum of positive integers is either odd or even.<br/>So the probality = 1/2', 0),
(362, 140, 'Kailash sells apples at a loss of 44 % but he uses a false scale which is 30 % less than its true weight . <br/>Find the loss / gain percent ?', '21%', '22%', '20%', '23%', 3, 'Let CP = Rs.100 for 100g<br/>So SP=Rs. 56 for 70g<br/>and SP =Rs. 80 for 100g<br/>loss%=100-80/100 * 100 = 20%', 0),
(363, 140, 'Average age of A ,B and C is 80 years . <br/>When D joins them the average age becomes 70 years . <br/>A new persons E, whose age is 4 years more than D replaces A and the average of B , C, D and E becomes 75 years . <br/>What is the age of A ?', '20 yrs', '22 yrs', '23 yrs', '24 yrs', 4, 'A+B+C = 3* 80 = 240 yrs<br/>A+B+C+D= 4* 70 = 280 yrs<br/>D age= 280-240 = 40yrs<br/>=&gt; E age= 40 + 4 = 44 yrs<br/>B+C+D+E age = 75* 4= 300 yrs<br/>B+C age = 300 &ndash; 40-44=216<br/>A age = 240-216=24 yrs', 0),
(364, 141, 'Which of the following comment is correct when a macro definition includes arguments?', 'The opening parenthesis should immediately follow the macro name.', 'There should be at least one blank between the macro name and the opening parenthesis.', 'There should be only one blank between the macro name and the opening parenthesis.', 'All the above comments are correct.', 1, '', 0),
(365, 141, 'Consider input as : abcdefg\nmain()  \n{  \n   char x [10], *ptr = x;  \n  scanf (&quot;%s&quot;, x);  \n  change(&amp;x[4]);  \n}  \n change(char a[])  \n {  \n   puts(a);  \n }', 'abcd', 'abc', 'efg', 'Garbage', 3, '', 1),
(366, 141, '#include &lt;stdio.h&gt;\nint main()  \n{  \n    int *ptr, a = 10;  \n    ptr = &amp;a;  \n    *ptr += 1;  \n    printf(&quot;%d,%d&#92;n&quot;, *ptr, a);  \n}', '10, 10', '10, 11', '11, 10', '11, 11', 4, '', 1),
(367, 141, 'If addition had higher precedence than multiplication, then the value of the expression (1 + 2 * 3 + 4 * 5) would be which of the following?', '27', '47', '69', '105', 4, '', 0),
(368, 141, '#include&lt;stdio.h&gt;\n\nmain() \n{ \n   const int a = 5; \n   \n   a++; \n   printf(&quot;%d&quot;, a); \n}', '5', '6', 'Runtime Error', 'Compile error', 4, '', 1),
(369, 141, '#include&lt;stdio.h&gt;\r\n\r\nmain()\r\n{	\r\n   char *s = &quot;Hello, &quot;\r\n   &quot;World!&quot;;\r\n\r\n   printf(&quot;%s&quot;, s);\r\n}', 'Hello, World!', 'Hello,\r\nWorld!', 'Hello', 'Compile Error', 1, 'Two immediate string constant are considered as single string constant.', 1),
(370, 141, '#include&lt;stdio.h&gt;\n\nmain()\n{ \n   int x = 3;\n   \n   x += 2;\n   x =+ 2;\n   printf(&quot;%d&quot;, x); \n}', '2', '5', '7', 'Compile Error', 1, '', 1),
(371, 141, 'Which header file can be used to define input/output function prototypes and macros?', 'math.h', 'memory.h', 'stdio.h', 'dos.h', 3, 'The stdio.h header is used to define variable types, macros, and various functions for performing input and output operation.', 0),
(372, 141, 'In the given below code, the P2 is\nTypedef int *ptr;\nptr p1, p2;', 'Integer', 'Integer Pointer', 'Both, Integer &amp; Integer pointer', 'None of the above', 2, 'Ptr is an alias to int*', 1),
(373, 141, 'Which statement can print &#92;n on the screen?', 'printf(&quot;&#92;&#92;n&quot;);', 'printf(&quot;n&#92;&quot;);', 'printf(&quot;n&quot;);', 'printf(&#39;&#92;n&#39;);', 1, 'In C programming language, &quot;&#92;n&quot; is the escape sequence for printing a new line character. In printf(&quot;&#92;&#92;n&quot;); statement, &quot;&#92;&#92;&quot; symbol will be printed as &quot;&#92;&quot; and &ldquo;n&rdquo; will be known as a common symbol.', 0),
(387, 150, 'Anil and Ruhi started a business by investing Rs 2000 and Rs 2800 respectively. After 8 months, Anil added Rs 600 and Ruhi added Rs 400. At the same time Teena joined them with Rs 4200. Find the share of Teena if they get a profit of Rs 34,300 after a year.', 'Rs 7490', 'Rs 7350', 'Rs 8250', 'Rs 8530', 2, 'Share of Anil : Share of Ruhi : Share of Teena is\n2000&times;8 + 2600&times;4 : 2800&times;8 + 3200&times;4 : 4200&times;4\n33 : 44 : 21\nso share of Teena = 21/(33+44+21) &times; 34300 = Rs 7350', 0),
(388, 150, 'A sum of Rs 7000 is deposited in two schemes. One part is deposited in Scheme A which offers 8% rate of interest. Remaining part is invested in Scheme B which offers 10% rate of interest compounded annually. If interest obtained in scheme A after 4 years is Rs 226 more than the interest obtained in scheme B after 2 years, find the part deposited in scheme B.', 'Rs 3200', 'Rs 4500', 'Rs 3800', 'Rs 3500', 3, '(7000-x)*8*4/100 = x [ (1 + 10/100)2 &ndash; 1] + 226\n70*8*4 &ndash; 32x/100 = 21x/100 + 226\n2240 &ndash; 226 = 53x/100\n2014 = 53x/100\nSo, x = Rs 3800', 0),
(389, 150, 'A work which is completed by 20 men in 8 days can be completed by 25 women 12 days. 16 men and 10 women start doing the work. After 3 days, they leave. If the remaining work is to be completed in 6 days by x number of men, find x.', '16', '18', '12', '10', 1, '20 men in 8 days so 16 men in 20 &times; 8/16 = 10 days and\n25 women in 12 days so 10 women in 25 &times; 12/10 = 30 days\nSo in 3 days, they complete (1/10 + 1/30) &times; 3 = 2/5\nSo remaining work = 1 &ndash; 2/5 = 3/5\n20 m 1 work in 8 days and x men 3/5 work in 6 days\nSo 20 &times; 8 &times; 3/5 = x &times; 6 &times; 1\nSo, x = 16 men', 0),
(390, 150, 'There are 140 tickets (numbered 1 to 140) in a bowl. Find the probability of choosing a ticket which bears multiple of either 3 or 7.', '3/5', '2/9', '1/8', '3/7', 4, 'Number of multiples of 3 in 140 = 140/3 = 46\r\nNumber of multiples of 7 in 140 = 140/7 = 20\r\nNumber of multiples of 3&times;7= 21 in 140 = 140/21 = 6\r\nSo required probability = (46+20 &ndash; 6)/140 = 60/140 = 3/7', 0),
(391, 150, 'A 48 litres solution contains liquids water and milk in the ratio 3 : 5. How much amount of milk is to be added so that amount of milk is 70% of the new solution?', '26 l', '20 l', '12 l', '18 l', 3, 'Water present in solution = 3/8 * 48 = 18 l\r\nMilk present in solution = 5/8 * 48 = 30 l\r\nLet x litres of milk to be added\r\nMilk is to be 70% of new solution, so water is to be 30% of new solution. So\r\n30/100 of new solution = Water present in new solution\r\n30/100 * (48+x) = 18\r\nSo, x = 12 litres\r\nOR\r\n70/100 of new solution = Milk present in new solution\r\n70/100 * (48+x) = 30+x\r\nSo, x = 12 litres', 0),
(392, 150, 'In a class, average age of 30 students is 18 years. If the age of 2 more students is taken into consideration, then the average of all students gets increase by 1. Find the average of the ages of those 2 students.', '50', '68', '54', '34', 4, '30 students &ndash; 18\r\n32 students &ndash; 19\r\nSo total age of those 2 students = 30&times;1 + 19&times;2 = 68\r\nSo average = 68/2 = 34', 0),
(393, 150, 'The ratio of A&rsquo;s age 3 years ago and B&rsquo;s age 5 years hence is 3 : 4. The average of the ages of A and C is 20 years. Also C&rsquo;s age after 10 years will be 2 more than twice the age present age of B. Find the age of C.', '18', '15', '22', '28', 3, '(A &ndash; 3)/(B + 5) = 3/4\r\n(A + C)/2 = 20 and\r\nC + 10 = 2B + 2', 0),
(394, 150, 'The circumference of a circle having radius equal to 35 cm is equal to the perimeter of a rectangle. If the area of rectangle is 2400 cm2, find the length of rectangle.', '75 cm', '45 cm', '40 cm', '80 cm', 4, '2 &times; 22/7 &times; 35 = 2 (l + b)\r\nso (l + b) = 110\r\nalso given, lb = 2400\r\nSo (l + 2400/l) = 110\r\nSo l2 &ndash; 110 l + 2400 = 0\r\nSo, l = 80 or 30. 30 not present in options.', 0),
(395, 150, 'The market price of an item is 20% more than its cost price. If after selling the item, the profit percent obtained is 10%, find the discount given.', 'Rs 6', 'Rs 10', 'Rs 19', 'Rs 14', 2, 'Use MP = (100+p%)/(100-d%) * CP\r\nSo\r\n120/100 * CP = (100+10)/(100-d%) * CP\r\nSolve, d% is 25/3%\r\nLet CP = Rs 100, so MP = Rs 120, and SP = Rs 110\r\nSo when discount % = (120-110)/120 * 100 = 25/3%, discount = Rs 10', 0),
(396, 150, 'A, B and C divide Rs 3900 among them in the ratio 4 : 4 : 5 respectively. Now if each of them got Rs 300 more, what will be the respective new ratio of dividing the total money among them?', '5 : 8 : 7', '5 : 5 : 6', '6 : 7 : 8', '6 : 5 : 7', 2, 'A got = [4/(4+4+5)] * 3900 = 1200, B got = [4/(4+4+5)] * 3900 = 1200, C got = [5/(4+4+5)] * 3900 = 1500\r\nWhen 300 is added to their shares, A gets=1200+300 = 1500, B = 1500, C =1800\r\nSo new ratio is 1500 : 1500 : 1800', 0),
(397, 150, 'Satish rows downstream from P to Q in 3 hours. In return journey his boat is powered by an engine due to which speed of the boat increased by 20% by this he reached the point P in 3 hours. If the speed of the stream is 2 Km/hr then what is the initial speed of the boat?', '20 Km/hr', '22 Km/hr', '24 Km/hr', '26 Km/hr', 1, 'S+R = 1.2S-R\r\nS =20', 0),
(398, 150, 'Two trains cross each other in 15 seconds when moving in the opposite direction and 210 seconds when moving in the same direction. By what percent is the speed of the faster train more than that of the slower train?', '15%', '17%', '13%', '18%', 1, 'Let the sum of length of the two trains be x m and the speed (in m/s) of the faster and slower trains be a and b.\r\n \r\n&there4; x/(a + b) = 15 and x/(a &ndash; b) = 210\r\n \r\n&there4; (a &ndash; b)/(a + b) = 15/210 = 1/14\r\n  \r\n&there4; 14(a &ndash; b) = a + b i.e. a/b = 13/15\r\n \r\n&there4; Required percentage = [(15 &ndash; 13)/13] &times; 100 = 15.38% &asymp; 15%\r\n \r\nHence, option A is correct.', 0),
(399, 150, 'Two varieties of tea, one at Rs. 126 per kg and second at Rs. 135 per kg are mixed with a third variety in the ratio 1 : 1 : 2. If the mixture is worth Rs. 153 per kg, what is the price of the third variety per kg?', 'Rs. 157.50', 'Rs. 175.50', 'Rs. 175.70', 'Rs. 157.70', 2, 'Let the cost of the third variety be Rs. y.\r\n \r\nLet the three types of tea be taken in the quantities x, x and 2x.\r\n \r\n&there4; 126x + 135x + y(2x) = 153(x + x + 2x) \r\n \r\n&there4; 261 + 2y = 153(4)\r\n \r\n&there4; 2y = 612 &minus; 261 = 351\r\n \r\n&there4; y = Rs 175.5', 0),
(400, 150, 'Which fraction is the smallest out of the given fractions ?', '17/21', '35/44', '18/35', '70/91', 3, 'If numerators of 2 fractions are equal, then the fraction with the higher denominator is the lower fraction.\r\n\r\nComparing (2) &amp; (4) i.e. 	35	 and 	70\r\n44	91\r\nIf we multiply numerator and denominator of 35/44 by 2 we get\r\n35 &times; 2	 = 	70\r\n44 &times; 2	88\r\nNow, the numerator of this new fraction &amp; (4) are equal. But the denominator of (4) is higher.\r\n \r\nSo, 	70	 &gt; 	70	 i.e. 	70	 &lt; 	35\r\n88	91	91	44\r\nNow, by observation, we can deduce that 	17	 &gt; 	18\r\n21	35\r\n[Because the increase in the numerator is from 17 to 18 i.e. approximately 1%, but increase in the denominator is from 21 to 35 i.e. 66.66% increase]\r\n \r\nSo, now we left of compare 	18	 and 	70\r\n35	91\r\nMultiply the numerator and denominator of the fraction with the denominator of the other fraction\r\n18 &times; 91	        	             	70 &times; 35\r\n35 &times; 91	91 &times; 35\r\n18 &times; 91 = 1638            70 &times; 35 = 2450\r\n \r\nHence, 	18	 &lt; 	70\r\n35	91', 0),
(401, 150, 'A committee of 5 persons is to be formed from 6 men and 4 women. In how many ways can the committee be formed, if atmost two women are included?', '172', '186', '160', '240', 2, 'Since atmost two women are included, there are three possibilities: 2 women + 3 men or 1 woman + 4 men or no women + 5 men.\r\n \r\n2 women and 3 men can be selected in 4C2 &times; 6C3 = 120 ways\r\n \r\n1 woman and 4 men can be selected in 4C1 &times; 6C4 = 60 ways\r\n \r\n5 men can be selected in 6C5 = 6ways\r\n \r\n&there4; Total number of ways = 120 + 60 + 6 = 186', 0),
(402, 150, 'In an election there were three candidates. Candidate A got 20% of the total votes, candidate B got 40% of the total votes while candidate C got 148 votes. 3% of the total votes were invalid. What was the winning margin? (in terms of number of votes)', '0', '12', '36', '80', 2, '', 0),
(403, 150, 'A shopkeeper purchased 15 kg of variety A rice at Rs. X per kg and 10 kg of variety B rice at Rs. (X + 5) per kg. The shopkeeper sold the whole quantity of variety A rice at 10% profit and that of variety B rice at 20% profit. The total selling price of variety A rice was Rs. 30 more than that of variety B rice. Had the two varieties been mixed and sold at an overall profit of 20%, what would have been the selling price (per kg)?', 'Rs. 26.40', 'Rs. 23.20', 'Rs. 24.20', 'Rs. 25.00', 1, 'Rice A	 	Rice B	 \r\nCost price	15 &times; x	 	10 &times; (x + 5)	 \r\n 	&darr; 10% profit  	 	&darr; 20% profit	 \r\nSelling price	110% of 15x	 	120% of (10x + 5)	 \r\n 	 	 	 	 \r\n 	= 16.5x	 	= 12x + 60	 \r\nNow, 16.5x = 12x + 60 + 30\r\n\r\nor, 4.5x = 90\r\n\r\n&there4;   x = 	90	 = Rs. 20 kg\r\n4.5\r\nNow, new selling price of mixture\r\n\r\n=  [15 &times; 20 + 10 (20 + 5)] 	120	 = Rs. 660\r\n100\r\n&there4;   SP per kg = 	660	 = Rs. 26.4 per kg\r\n25', 0),
(404, 150, 'The ratio between the length of Cuboid and the length of Rectangle is 3 : 2 and the ratio between the breadth of Cuboid and the breadth of Rectangle is 2 : 1. If the area of the Rectangle is 140 cm2 and the height of the cuboid is 10 cm. find the volume of the cuboid.', '3400 cm3', '4200 cm3', '2500 cm3', '2100 cm3', 2, 'Length of the rectangle = 2x, length of the cuboid = 3x, Breadth of Rectangle = y, breadth of cuboid = 2y\r\n \r\nArea of Rectangle = l &times; b\r\n \r\n140 = 2x &times; y \r\n \r\nxy = 70\r\n \r\nVolume of cuboid = l &times; b &times; h\r\n \r\n= 3x &times; 2y &times; 10 = 60 xy\r\n \r\n= 60 &times; 70 = 4200 cm3', 0),
(405, 150, 'A box contains 4 tennis ball, 6 season and 8 dues balls. 3 balls are randomly drawn from the box. What is the probability that the balls are different?', '4/17', '3/11', '2/13', '5/17', 1, 'Probability = 	Favorable outcomes\r\nTotal outcomes\r\nLet us assume that all balls are unique.\r\n\r\nThere are a total of 18 balls.\r\n\r\nTotal ways = 3 balls can be chosen in 18C3 ways\r\n\r\n=  	18!	 = 	18 &times; 17 &times; 16	 = 816	 \r\n3! &times; 15!	3 &times; 2 &times; 1\r\nFavorable ways = 1 tennis ball, 1 season ball, and 1 dues Ball = 4 &times; 6 &times; 8 = 192\r\n\r\nProbability = 	192	 = 	4\r\n816	17', 0),
(406, 150, 'The length of a circular track is 800 m. Virat and Amresh started from the same point on the track and ran in opposite directions. Virat took 12 minutes to cover one kilometer while Amresh took only 9 minutes to cover the same distance. They kept running for 90 minutes. How many times did they cross each other?', '10', '20', '21', '30', 3, 'The time taken to cover one kilometer for Vira tand Amresh is in the ratio 4 : 3\r\n\r\nTheir speeds are in the ratio 3 : 4.\r\n\r\nVirat covers 3/7th of the track and Amresh covers 4/7th from one crossing to the next i.e.\r\n\r\nVirat covers 	3	 &times; 800 m from one crossing to the next.\r\n7\r\nIn 90 min, Virat covers 	90	 &times; (1000) = 7500 m.\r\n12\r\nThe number of crossings\r\n 	7500 &times; 	7	 	 	 \r\n= 	3	 = 	175	 = 21.87\r\n800	8', 0),
(407, 150, 'Look at this series: 12, 11, 13, 12, 14, 13, &hellip; What number should come next?', '10', '16', '13', '15', 4, 'This is an alternating number of subtraction series. First, 1 is subtracted, then 2 is added.', 0),
(408, 150, 'Look at this series: 36, 34, 30, 28, 24, &hellip; What number should come next?', '22', '26', '23', '20', 1, 'This is an alternating number of subtraction series. First, 2 is subtracted, then 4, then 2, and so on.', 0),
(409, 150, 'Look at this series: 7, 10, 8, 11, 9, 12, &hellip; What number should come next?', '7', '12', '10', '13', 3, 'Its an alternating addition and subtraction series. 3 is added in the first pattern, and then 2 is subtracted.', 0),
(410, 150, 'Look at this series: 2, 1, (1/2), (1/4), &hellip; What number should come next?', '1/3', '1/8', '2/8', '1/16', 2, 'It&rsquo;s a division series. Every number is half of the previous number. The number is divided by 2 successively to get the next result. 4/2 = 2. 2/2 = 1. 1/2 = &frac12;. (1/2)/2 = &frac14;. (1/4)/2 = 1/8 and so on.', 0),
(411, 150, 'Look at this series: 80, 10, 70, 15, 60, &hellip; What number should come next?', '20', '25', '30', '50', 1, 'This is an alternating addition and subtraction series. In the first pattern, 10 is subtracted from each number to arrive at the next. In the second, 5 is added to each number to arrive at the next.', 0),
(412, 150, 'Which word does NOT belong with the others?', 'index', 'glossary', 'chapter', 'book', 4, 'Book. Rest are all parts of a book.', 0),
(413, 150, 'Which word is the odd man out?', 'trivial', 'unimportant', 'important', 'insignificant', 3, 'Important. Remaining are synonyms of each other.', 0),
(414, 150, 'Which word does NOT belong with the others?', 'wing', 'fin', 'beak', 'rudder', 3, 'Beak. Rest are parts of an aero plane.', 0),
(415, 150, 'Which word is the odd man out?', 'hate', 'fondness', 'liking', 'attachment', 1, 'hate. Rest are positive emotions.', 0),
(416, 150, 'Pick the odd man out?', 'just', 'fair', 'equitable', 'biased', 4, 'Biased. The others signify honesty', 0),
(417, 150, 'An Informal Gathering occurs when a group of people get together in a casual, relaxed manner. Which situation below is the best example of an Informal Gathering?', 'A debating club meets on the first Sunday morning of every month.', 'After finding out about his salary raise, Jay and a few colleagues go out for a quick dinner after work', 'Meena sends out 10 invitations for a bachelorette party she is giving for her elder sister.', 'Whenever she eats at a Chinese restaurant, Roop seems to run into Dibya.', 2, '', 0),
(418, 150, 'A Tiebreaker is an additional contest carried out to establish a winner among tied contestants. Choose one situation from the options below that best represents a Tiebreaker.', 'At halftime, the score is tied at 2-2 in a football match.', 'Serena and Maria have each secured 1 set in the game.', 'The umpire tosses a coin to decide which team will have bat first.', 'RCB and KKR each finished at 140 all out.', 4, '', 0),
(419, 150, 'The Sharks and the Bears each finished with 34 points, and they are now battling it out in a five-minute overtime.', 'When he is offered a better paying position, Jacob leaves the restaurant he manages to manage a new restaurant on the other side of town.', 'Catherine is spending her junior year of college studying abroad in France.', 'Malcolm is readjusting to civilian life after two years of overseas military service.', 'After several miserable months, Sharon decides that she can no longer share an apartment with her roommate Hilary.', 3, '', 0),
(420, 150, 'Reentry occurs when a person leaves his or her social system for a period of time and then returns. Which situation below best describes Reentry?', 'When he is offered a better paying position, Javed leaves the hotel he manages to manage another one in a neighboring city.', 'Charan is spending her final year of college studying abroad in China.', 'Manan is readjusting to civilian life after 2 years of overseas merchant navy service.', 'After 5 miserable months, Sneha decides that she can no longer share her room with roommate Hital.', 4, '', 0),
(421, 150, 'Posthumous Award occurs when an award is given to someone, after their death. Choose one situation below as the best example of Posthumous Award.', 'Late yesteryear actress Sridevi was awarded with a Lifetime Achievement Award posthumously in Filmfare 2019.', 'Chitra never thought she&rsquo;d live to receive a third booker prize for her novel.', 'Emanuel has been honored with a prestigious literary award for his writing career and his daughter accepted the award on behalf of her deceased father.', 'Meenal&rsquo;s publisher canceled her book contract after she failed to deliver the manuscript on time.', 1, '', 0),
(422, 150, 'The &lsquo;A&rsquo; state government has chalked out a plan for the underdeveloped &lsquo;B&rsquo; district where 66% of the funds will be placed in the hands of a committee of local representatives.\r\nCourses of action:\r\nI. The &lsquo;A&rsquo; state government should decide guidelines and norms for the functioning of the committee.\r\nII. Other state government may follow similar plan if directed by the Central government.', 'If only I follows', 'If only II follows', 'If either I or II follows', 'If neither I nor II follows', 1, '', 0),
(423, 150, 'The car dealer found that there was a tremendous response for the new XYZ&rsquo;s car booking with long queues of people complaining about the duration of business hours and arrangements. Courses of action:\r\nI. People should make their arrangement of lunch and snacks while going for car XYZ&rsquo;s booking and be ready to spend several hours.\r\nII. Arrangement should be made for more booking desks and increase business hours to serve more people in less time.', 'If only I follows', 'If only II follows', 'If either I or II follows', 'If neither I nor II follows', 2, '', 0),
(424, 150, 'The &lsquo;M&rsquo; state government has decided hence forth to award the road construction contracts through open tenders only. Courses of action:\r\nI. The &lsquo;M&rsquo; state will not be able to get the work done swiftly as it will have to go through tender and other procedures.\r\nII. Hence forth the quality of roads constructed may be far better.', 'If only I follows', 'If only II follows', 'If either I or II follows', 'If neither I nor II follows', 4, '', 0),
(425, 150, 'Alert villagers nabbed a group of bandits armed with murderous weapons. Courses of action:\r\nI. The villagers should be provided sophisticated weapons.\r\nII. The villagers should be rewarded for their courage and unity.', 'If only I follows', 'If only II follows', 'If either I or II follows', 'If neither I nor II follows', 2, '', 0),
(426, 150, '10 coaches of a passenger train have got derailed and have blocked the railway track from both ends. Courses of action:\r\nI. The railway authorities should immediately send men and equipment and clear the spot\r\nII. All the trains running in both directions should be diverted immediately via other routes.', 'If only I follows', 'If only II follows', 'If neither I nor II follows', 'If both I and II follow', 4, '', 0),
(427, 150, 'SCD, TEF, UGH, ____, WKL', 'CMN', 'UJI', 'VIJ', 'IJT', 3, 'There are two alphabetical series here. The first series is with the first letters only: STUVW. The second series involves the remaining letters: CD, EF, GH, IJ, KL.', 0),
(428, 150, 'FAG, GAF, HAI, IAH, ____', 'JAK', 'HAL', 'HAK', 'JAI', 1, 'The middle letters are static, so concentrate on the first and third letters. The series involves an alphabetical order with a reversal of the letters. The first letters are in alphabetical order: F, G, H, I , J. The second and fourth segments are reversals of the first and third segments. The missing segment begins with a new letter.', 0),
(429, 150, 'Arrange the following words in a meaningful sequence.\r\n1. Infection\r\n2. Consultation\r\n3. Doctor\r\n4. Treatment\r\n5. Recovery', '1, 3, 4, 5, 2', '1, 3, 2, 4, 5', '1, 2, 3, 4, 5', '2, 3, 5, 1, 4', 2, 'Infection occurs first, then one visits a doctor, and after consultation, the doctor starts the treatment which is followed by recovery.', 0),
(430, 150, 'Peter is in the East of Tom and Tom is in the North of John. Mike is in the South of John then in which direction of Peter is Mike?', 'South-East', 'South-West', 'South', 'North-East', 2, 'Visit link to see solution\r\nhttps://static.javatpoint.com/reasoning/images/direction-sense-test3.png', 0),
(431, 150, 'What is Geeta&#39;s rank in the class?\r\n\r\nI. There are 30 students in the class.\r\nII. There are 10 students who scored less than Geeta.', 'Statement I alone is sufficient, but statement II alone is not sufficient', 'Statement II alone is sufficient, but statement I alone is not sufficient', 'Neither I nor II is sufficient', 'Both I and II are needed', 4, 'From statements I and II, we conclude that out of 30 students 10 students scored less than Geeta. It means, 19 students scored more than Geeta. So, Geeta&#39;s rank in the class is 20th. Thus, both the statements are needed to answer the question.', 0),
(432, 150, 'If in a certain language, NOIDA is coded as OPJEB, how is DELHI coded in that language?', 'CDKGH', 'EFMIJ', 'FGNJK', 'IHLED', 2, 'Each letter in the word NOIDA is moved one step forward to form the code OPJEB. So, in DELHI, D will be coded as E, E as F, L as M, H as I, I as J. Thus, the code becomes EFMIJ.', 0),
(433, 150, 'Assertion (A): James Watt invented the steam engine.\r\n\r\nReason (R): It was invented to pump out the water from the flooded mines.', 'Both A and R are true and R is the correct explanation of A.', 'Both A and R are true, but R is not the correct explanation of A.', 'A is true, but R is false.', 'A is false, but R is true.', 1, 'The need of self-working engine to pump out the water from the flooded mines led James Watt to invent the steam engine.', 0),
(434, 150, 'Essential Part\nBook', 'Education', 'Pictures', 'Pages', 'Knowledge', 3, 'A book cannot exist without pages.', 0),
(435, 150, 'It is called Restitution when you compensate someone for damaging his or her property in some way. Which of the following situations is the best example of Restitution?', 'Tom borrows his friend\'s camera. Tom fails to zipper the case, and the camera falls on the ground, and the lens shatters. When Tom returns the camera, he tells his friend that he will pay for the damage', 'Tom borrows his friend\'s car and returns the car with an empty petrol tank. He apologizes and tells his friend that he will fill the tank tomorrow.', 'Peter asks Tom to stay in his apartment when he is out of the town. One day Tom arrives to stay and finds that pipe has burst and the apartment is filled with water. He calls the plumber to repair the pipe and pays for the repair.', 'A pothole in the parking of Peter\'s company caused his flat tyre. He informs his boss and expects that the company should pay for the repair.', 1, 'Tom damaged his friend\'s camera when the camera was in his possession, and he agreed to pay for the repair.', 0),
(436, 150, 'Statements:\n\nI) All heroes are villains.\nII) All villains are zeros.\nIII) Some heroes are jokers.\n\nConclusion:\n\ni) Some Jokers are heroes\nii) Some villains are jokers\niii) Some zeros are villains', 'Only I, II follow', 'All I, II, III follows', 'Only I, III follow', 'Only I, II follow', 2, 'Visit link to see solution\nhttps://static.javatpoint.com/reasoning/images/syllogism-q1.png', 0),
(437, 150, 'Choose the word which best expresses the meaning of the given word.\r\nBRIEF', 'Limited', 'Small', 'Little', 'Short', 4, '', 0),
(438, 150, '3, 6, 11, 18, 27, ?, 51', '35', '38', '40', '42', 2, '', 0),
(439, 150, '12, 13, 25, 38, ?, 101, 164', '63', '65', '67', '70', 1, '', 0),
(440, 150, '2, 29, 4, 25, 6, ?, 8, 17', '20', '21', '22', '23', 2, '', 0),
(441, 150, 'Select the related word/letters/number from the given alternatives.\r\n81 : 10 :: 169 : ?', '23', '18', '12', '14', 4, '', 0),
(442, 150, 'If &ldquo;!&rdquo; denotes &ldquo;added to&rdquo;, &ldquo;@&rdquo; denotes &ldquo;divided by&rdquo;, &ldquo;%&rdquo; denotes &ldquo;multiplied by&rdquo; and &ldquo;^&rdquo; denotes &ldquo;subtracted from&rdquo;, then 13 ! 102 @ 6 % 2 ^ 41 = ?', '6', '9', '14', '12', 1, '13 ! 102 @ 6 % 2 ^ 41 = 13 + [(102 /6) * 2] &ndash; 41 = 13 + (17*2) &ndash; 41 = 6', 0),
(443, 150, 'Pointing to the photograph, Ram said: &ldquo;She is the only daughter of my father&rsquo;s mother&rdquo;. How is Ram related to the person in the photograph?', 'aunt', 'son', 'nephew', 'grandson', 3, 'The person in the photograph should be Ram&rsquo;s aunt. Thus, Ram is her nephew.', 0),
(444, 150, 'If 1st January 1897 fell on a Friday, on what day of a week 1st January of 1901 would have fallen on?', 'Sunday', 'Thursday', 'Wednesday', 'Tuesday', 4, '1st January of consecutive non -leap years will fall on consecutive days since 365 leaves a remainder of 1 on division by 7.\r\n\r\n1900 is not a leap year. 1900 is divisible by 100 but not by 400. Therefore, all the years from 1897 till 1901 are non-leap years.\r\n\r\nTherefore, the day on which 1st January falls will move by 1 for every year. Therefore, in 1897, 1st January would have fallen on Saturday. In 1898, 1st January would have fallen on Sunday. Similarly, in 1901, 1st January would have fallen on Tuesday. Therefore, option D is the right answer.', 0),
(445, 150, 'If 121 @ 34 = 87 and 28 ! 13 = 41 then what is the value of\r\n353 ! 89 @ 167?', '275', '263', '317', '244', 1, '121 @ 34 = 87 and 28 ! 13 = 41\r\n121 &ndash; 34 = 87 and 28 + 13 = 41\r\nSo, 353 ! 89 @ 167 = 353 + 89 &ndash; 167 = 275', 0),
(446, 150, 'A machine codes EAT as 100 and CAT as 60. Which of the following words will be coded as 40320?', 'BAIN', 'PAINT', 'HIGH', 'RAISE', 2, 'The numerical position of E is 5, A is 1 and T is 20 &ndash; 5*1*20 = 100.\nThe numerical position of C is 3, A is 1 and T is 20 &ndash; 3*1*20 = 60.\n\nBAIN = 2*1*9*14 = 252.\nPAINT = 16*1*9*14*20 = 40320.\nHIGH = 8*9*7*8 = 4032.\nRAISE = 18*1*9*19*5 = 15390.', 0),
(449, 155, 'In Champions league, Rohit scored an average of 120 runs per match in the first 3 match and an average of 140 runs per match in the last four match. What is Rohit&rsquo;s average runs for the first match and the last two match if his average runs per match for all the five match is 122 and total number of matches are 5?', '100', '200', '150', '50', 1, 'Correct Option: A\r\nRohit&rsquo;s average score in the first 3 exams = 120\r\n\r\nLet the scores in the 5 exams be denoted by M1, M2, M3, M4, and M5\r\n\r\nM1 + M2 + M3 = 120 &times; 3 = 360     .......(i)\r\n\r\nAverage of last 4 match = 140\r\n\r\n&rArr;  	M2 + M3 + M4 + M5	 = 140\r\n4\r\n&rArr; M2 + M3 + M4 + M5 = 560        ......(ii)\r\n\r\nAverage of all the exams\r\n&rArr;  	M1 + M2 + M3 + M4 + M5	 = 122\r\n5\r\n&there4;   M1 + M2 + M3 + M4 + M5 = 122 &times; 5 = 610                    .......(iii)\r\n\r\nFrom solving above equation, we get M1 + M4 + M5 = 300\r\n \r\nRequired average runs = 	300	 = 100\r\n3', 0),
(450, 155, 'Ramesh kejriwal lent a sum of Rs.100 at simple interest of 6% p.a. for the first month, 12% p.a. for the second month, 24% p.a. for the third month and so on. What is the total amount of interest earned at the end of one year?', 'Rs. 5265', 'Rs. 5205', 'Rs. 2047.5', 'Rs. 4205.5', 3, 'Correct Option: C\r\nPrincipal= Rs.100\r\n\r\nRate of interest for first month = 6%\r\n\r\nInterest = Rs. 6/12\r\n\r\nInterest for second month = Rs. 12/12\r\n\r\nThe interest earned for the successive months is in the form of geometric progression.\r\n\r\nRs. 6/12, Rs. 12/12, Rs. 24/12 &hellip;&hellip;&hellip;&hellip;\r\n\r\na = Rs.6/12, r = (12/12)/ (6/12) = 2, where a is the first term and r is the common ratio of the series.\r\n\r\nSum of series = 	a (rn &ndash; 1)\r\nr &ndash; 1\r\n 	6	(212 &ndash; 1)	 	 	 \r\n=  	12	 = 	6	(4096 &ndash; 1)\r\n2 &ndash; 1	12\r\n=  	6	 &times; 4095 = Rs.2047.5\r\n12', 0),
(451, 155, 'Virat can do a piece of work in 24 days and Sachin can do the same work in 36 days. If Virat works for three days and got Rs. 3600, and the remaining work will completed by Sachin, then how much rupee Sachin earned', 'Rs. 45220', 'Rs. 3600', 'Rs. 16520', 'Rs. 25200', 4, 'Assume total work = LCM (24, 36) = 72\r\n\r\nIf the entire work is 72 units, Virat can complete 3 unit per day, and Sachin can complete 2 unit per days \r\n\r\nIn 3 days, Virat completes 9 units and got Rs.3600 i.e. Rs.400 per unit.\r\n\r\nRemaining work = (72 &ndash; 9)unit = 63 unit\r\n\r\n&there4;   Sachin earning = Rs.63 &times; 400 = Rs.25200', 0),
(452, 155, 'Shanghai Maglev and Harmony CRH 380A are two fastest train in world. Train Harmony CRH 380A whose length is three-fifth of that of train Shanghai Maglev crosses it travelling in opposite direction in a time which is 3/7 th of the time taken by Shanghai Maglev to cross it when travelling in same direction. Calculate the ratio of the speeds of Shanghai Maglev and Harmony CRH 380A.', '2 : 7', '5 : 2', '3 : 2', '4 : 3', 2, 'Let L1, and L2 be the lengths of the trains Shanghai Maglev and Harmony CRH 380A respectively\r\n\r\nDistance covered in each case = L1 + L2.\r\n\r\nLet the speed of the train Shanghai Maglev = S1\r\n\r\nSpeed of the train Harmony CRH 380A = S2\r\n\r\nL1+L2	 = 	3	(	L1 + L2	)	 &rArr; 	S1 + S2	 = 	7\r\nS1+S2	7	S1 - S2	S2 - S1	3\r\n&there4;   	S1	 = 	5	    (by componendo and dividendo)\r\nS2	2\r\n&there4;   The ratio of the speeds of the two trains 5 : 2', 0),
(453, 155, 'An internet service provider company Century link marks up the cost price of a plan by 60% and offers a discount of 20%. He asks the customer to pay a service tax of 15% on the selling price. The customer refuses to pay the tax due to which the shopkeeper himself pays the service tax. Find his profit percentage', '8.8%', '22.5%', '5.6%', '10.5%', 1, 'Let the cost price of the plan be P\r\n\r\nMarked price = 1.6 P\r\n\r\nSelling price = 0.8 (1.6P) = 1.28 P\r\n\r\nService tax = 0.15(1.28P) = 0.192P\r\n\r\nProfit % = 	(1.28P &ndash; 0.192P) &ndash; P	 &times; 100% = 8.8%\r\nP', 0);
INSERT INTO `question_bank` (`question_id`, `quiz_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `reason`, `formatted`) VALUES
(454, 155, 'The average weight of 20 students in a class increased by 5.75 kg when one of the students left the class but when a new student joined the class then the average weight decreased by 2.75 kg. What is the difference between the age of the new student who joined the class and the student who left the class?', '51.5 kg', '51.25 kg', '51.75 kg', '51 kg', 1, 'Let the average weight of 20 students = x kg\r\n\r\nThe total weight = 20x kg\r\n\r\nLet the weight of the students who left the class = y kg\r\n\r\nThen, according to the question, 20x &ndash; y = (x + 5.75) &times; 19\r\n\r\nx = 109.25 + y ......(i)\r\n\r\nAgain, when one of the new student joined the class then let the weight of the new student who joined the class = z kg\r\n\r\n20x + z = (x &ndash; 2.75) &times; 21\r\n\r\nz = x &ndash; 57.75 ..... (ii)\r\n\r\nPut the value of x from the equation (i) in the equation (ii)\r\n\r\nz = 109.25 + y &ndash; 57.75\r\n\r\nThe required difference = z &ndash; y = 51.5 kg', 0),
(455, 155, '(175/3)% of the raindrops could have been collected, when 3 cm of rain has fallen on a part of land of area 2 km2, in a tank having a 200 m &times; 10 m base, then water collected in the tank is 70% of its capacity. Find the capacity of the tank?', '70000 m3', '120000 m3', '100000 m3', '95000 m3', 3, 'The volume of rain water in the land which could have been collected and the volume of water in the tank should be equal .\r\nLet, level of water in the tank is h meter.\r\n\r\nAccording to the question,\r\n\r\n3	 &times; 2000 &times; 2000 &times; 	175	 = 200 &times; 10 &times; h\r\n100	300\r\nh = 35 m\r\n\r\nVolume of water in the tank = 200m &times; 10m &times; 35m = 70000 m3\r\n\r\nSince, water in the tank is 70% of its capacity.\r\n \r\nSo, capacity of tank = 	70000	 &times; 100 = 100000 m3', 0),
(456, 155, 'Mohit after travelling 60 km meets his school teacher who suggests him to go slower. He then proceeds at 4/5 of his initial speed and arrives his destination 25 minutes late. Had the meeting occured 25 km further Mohit would have reached his destination 13 minutes late. Find the final speed of Mohit ?', '30 km/hr', '35 km/hr', '25 km/hr', '22.5 km/hr', 3, 'Let initial speed of Mohit is 5 x km/hr\r\n\r\nSo, final speed of Mohit is 4 x km/hr\r\n\r\nATQ ,\r\n\r\n25/4x	 &ndash; 	25/5x	 = 	25 &ndash; 13/60\r\nx = 25/4\r\nSo final speed = 	4 &times; 25/4	 = 25 km/hr', 0),
(457, 155, 'Four friends decided to contribute money and build a Temple. Ram contributes 83 1/3 % less than Neha and Vidhi while Shyam contributes 33 1/3 % less than Ram and 11 1/9 % more than Neha. If the annual income of Vidhi is Rs. 23,76,000 and she contributes 9/10 of her monthly income then find the contribution of Shyam.', 'Rs. 220000', 'Rs. 22000', 'Rs. 320000', 'Rs. 32000', 2, 'Contribution ratio of Ram and (Neha + Vidhi) = 1 : 6\r\n\r\nContribution ratio of Ram and Shyam = 3 : 2\r\n\r\nContribution ratio of Neha and Shyam = 9 : 10\r\n\r\nCombining last two ratios ,\r\n\r\nRam : Shyam : Neha = 15 : 10 : 9\r\n\r\nAgain Ram and (Neha + Vidhi) = 15 : 90\r\n\r\nSo, Ram : Shyam : Neha : Vidhi = 15 : 10 : 9 :81\r\n\r\nNow, anuual income of Vidhi = Rs. 2376000\r\n\r\nMonthly income of Vidhi = Rs. 	2376000/12\r\nSo, contribution of Vidhi\r\n= Rs. 	2376000	&times; 9 /12*10	 = Rs. 178200\r\nContribution of Shyam = 	178200 &times; 10/81	 = Rs. 22000', 0),
(458, 155, 'Two containers X and Y contain equal volume of water and alcohol respectively. 5 litres of water is taken out from X and poured into Y. From the resulting solution in Y, 5 litres of mixture is taken out and poured into X. Now if the quantity of water in both the containers is same after the two transfers, find out the volume of alcohol in container Y initially.', '18 litres', '10 litres', '5 litres', '15 litres', 3, 'Container X	  	  	Container Y\r\nWater	 	 	Alcohol\r\nX litres	 	 	Y litres\r\nAnd it is given that, X = Y\r\n\r\nNow step I : 5 litres of taken from X and poured into Y\r\n \r\nContainer X	  	  	Container Y\r\nX &ndash; 5 litres (water)	 	 	Y + 5 litres (mixture)\r\nstep II : from container Y, 5 litres of mixture taken out and poured in to container X,\r\n\r\nIn the 5 litres, water = 25/(Y + 5) and Milk = 5Y/(Y + 5)\r\n\r\nNow,\r\nContainer X	 	 	Container Y\r\nMilk	  	Water	 	 	Milk	  	Water\r\n5Y/(Y + 5)	 	25/(Y + 5) + X &ndash; 5	 	 	Y &ndash; 5Y/ (Y + 5)	 	5 &ndash; 25/ (Y + 5)\r\nNow it is given that in the final mixture in both the containers volume of water is same\r\n \r\n25/Y+5	+ X &ndash; 5 = 5 &ndash; 	25/Y+5\r\nAnd it is known that X = Y\r\n\r\nHence by solving this we get, Y = 5 litres.', 0),
(459, 155, 'Ram and Aman work in a printing press where they have to print a minimum of 100 magazines each day to earn a daily wage of Rs. 300. If they print more than 100 magazines they are paid extra money for each extra magazine printed. Ram is paid Rs. 328 and Aman is paid Rs. 336. Find the amount paid per extra magazine if Aman printed 2 more magazines than Ram', 'Rs. 5', 'Rs. 7', 'Rs. 6', 'None of these', 4, 'Let the number of extra magazines printed by Aman be &lsquo;a&rsquo;. \r\n \r\nNumber of extra magazines printed by Ram = a &ndash; 2 \r\n \r\nLet the price paid per extra magazine printed be &lsquo;b&rsquo;. \r\n \r\nThus, 300 + a &times; b = 336 ---- (1) and 300 + (a &ndash; 2) &times; b = 328 ------ (2) \r\n \r\n(1) &ndash; (2) \r\n \r\n&rArr; ab &ndash; ab + 2b = 8 \r\n \r\n&rArr; b = 4 \r\n \r\nNone of the options match,', 0),
(460, 155, 'Sumit is appointed on a salary of Rs. 1500/month(fixed which he will get regardless of sales) and the condition that for every sales of a refrigerator of Rs. 10,000, he will get 45% of salary and 10% of the sales as a reward. The incentive scheme is not valid for the first Rs. 10,000 of sales. What should be the value of sales if he wants to earn Rs. 8200 in a particular month?', 'Rs. 60,000', 'Rs. 50,000', 'Rs. 35,000', 'Rs. 40,000', 2, '', 0),
(461, 155, 'Three partners A, B and C started a business a total investment of Rs. 7200. A&rsquo;s investment was Rs. 600 more than that of B while B&#39;s investment was Rs. 300 less than C. At the end of one year the business generated Rs. 864 profit which was distributed in the ratio of the investment of the partners. A invested 25 % of his profit in saving scheme which assures 15% return as interest in one year. What was the interest earned by A from the saving scheme in one year?', 'Rs. 12.15', 'Rs. 15.12', 'Rs. 10.12', 'Rs. 16.12', 1, '', 0),
(462, 155, 'The perimeter of a square field is 8cm more than the perimeter of a rectangle. The length of the rectangle is 51 cm which is 300% of its width. If a street of width 10 cm surrounds from outside the square,  then find the total cost of constructing the street at the rate of Rs. 25 per sq. cm?', 'Rs. 45,000', 'Rs. 45,500', 'Rs. 46,000', 'Rs. 46,500', 3, '', 0),
(463, 155, 'Three friends Anjali, Pooja and Kriti decide to pay their travel fare during a trip in the ratio of 2 : 3 : 4. Anjali pays the first day&rsquo;s fare which amounts to Rs 500, Pooja pays the second day&rsquo;s fare which amounts to Rs 600 and Kriti pays the third day&rsquo;s fare which amounts to Rs 700. When they settle their accounts, how much money does Kriti has to pay to Anjali?', 'Rs. 200', 'Rs. 150', 'Rs. 0', 'Rs. 100', 4, '', 0),
(464, 155, 'A father stated, &ldquo;thrice my father&rsquo;s age is 7 times my age. And my son&rsquo;s age is cube root of my age. Also, nine years ago, my age was one-third of my father&rsquo;s age then.&rdquo; Find the ratio between the age of the father&rsquo;s father, the father&rsquo;s son and the father himself is', '21 : 2 : 3', '14 : 2 : 9', '7 : 1 : 3', '21 : 1 : 9', 4, '', 0),
(465, 155, 'A and B started a business with initial investment in the respective ratio of 3 : 1. After four months from the start of the business, A invests Rs. 2000 more and after two more months B invested Rs. 6000 more. If A&#39;s profit share is double of B&#39;s share after a year, then what was A&#39;s initial investment?', 'Rs. 14000', 'Rs. 15000', 'Rs. 16500', 'Rs. 18000', 1, '', 0),
(466, 155, 'Kishan borrowed a certain sum from the bank. The bank charges a simple interest of 10 % per annum. Kishan later realized that he no longer needs the entire money. So he lent 60 percent of the borrowed sum to Vikas at the rate of 20% per annum compounded annually. At the end of 3 years, Vikas paid him a sum of Rs. 1555200. How much amount(in Rs.) will Kishan pay to the bank if he repays the entire loan at the end of 4 years?', '2400000', '2700000', '2100000', '2500000', 3, '', 0),
(467, 155, 'Vijay spends 75% of his salary and saves the remaining. After his salary is increased by 25%, he saves 80% of the increased amount besides the amount he used to save earlier. What will be the percentage change in his monthly savings?', '90%', '80%', '40%', '70%', 2, '', 0),
(468, 155, 'The monthly budget of A and B are in the ratio of 17 : 19. If they get an extra budget of Rs. 3500 each, the ratio of new monthly budget of A and B becomes 12 : 13. What is the new monthly budget of A?', 'Rs. 15000', 'Rs. 13000', 'Rs. 10000', 'Rs. 12000', 4, '', 0),
(469, 155, 'Kundan purchased 450 oranges of 3 types such that he earned a profit 9%, 10% and 12% respectively on each type. He earned a profit of 66/7 % on first two types and 10% overall profit on all the types. Find the number of oranges in all the three types.', '100,200 and 150', '120 ,90 and 240', '150,200 and 100', '200,150 and 100', 4, '', 0),
(470, 155, 'The average age of a family of 5 members was 32 years. 3 years later, the oldest member of the family died at the age of 60. On the same day, a child was born in the family. What would be the average age of the family 20 years after the death of the oldest member?', '52 years', '43 years', '47 years', '50 years', 2, '', 0),
(471, 155, 'Amit, Shubham, Rakesh and Ramesh are 4 brothers. Their father divided his property among his four sons such that Amit share is 40% more than Ramesh&rsquo;s share. Rakesh got 20% of the total property and his share is 5/8 times the share of Shubham. What percent of total property did Amit get?', '24%', '28%', '21%', '32%', 2, '', 0),
(472, 155, 'A man deposited Rs. 40,000 in a bank at 10% per annum, compounded annually for two years. He wanted to keep the amount deposited at the end of the two years, but there was a new law in place that for any amount in the account that date onwards, any annual interest greater than Rs.2,500 would be taxed. Also, the rate of interest was reduced to 8% per annum. What amount should he remove from his account to ensure that he just avoids paying the tax? Assume that his account had zero balance before he deposited Rs. 40,000.', 'Rs. 31,250', 'Rs. 24,000', 'Rs. 21,684', 'Rs. 17,150', 4, '', 0),
(473, 155, 'Find the height of equilateral triangle if its area is 36&radic;3 m2?', '8&radic;3 m', '5&radic;3 m', '4&radic;3 m', '6&radic;3 m', 4, '', 0),
(474, 155, 'By selling a car for Rs 405000 a man gets 10% loss, and then at what price (in Rs) should he sell to gain 20% ?', '525000', '480000', '540000', '490000', 3, '', 0),
(475, 155, 'Two persons P, and Q start running simultaneously in the same direction from the point X and Y respectively. If the distance between X and Y is 10 km. P reaches another point Z which is in the same line and returns immediately after travelling for 10 km more from the point Z, he meets Q at point R which is in between point X and Point Z. If the rate of speed of P, and Q is 10 km and 5 km per hour then find the distance between X and Z. (it is given that XZ &gt; YZ', '50 km', '45 km', '35 km', '40 km', 1, '', 0),
(476, 155, 'Some number of solid metallic right circular cones radius of which is equal to the side of the square which area is 9 cm2 and height is 100% more than the inradius of that square are melted to form a solid sphere of radius 6 cm. find the number of right circular cones is required.', '64', '36', '27', '32', 4, '', 0),
(477, 155, 'Ram borrowed Rs. x from Shyam at the rate of 13% simple interest and Rs. 2x from Mohan at the rate of 26 % simple interest he then added Rs. 82500 with the total amount he borrowed from Shyam and Mohan together and lend it to Sohan at the rate of 10% simple interest. The total profit, he received at the end of one year in this process was Rs. 1725. Find the value of x?', '18642.85', '19642.85', '16625.52', '17462.85', 1, '', 0),
(478, 155, 'Two trains A, and B of same length start from Chennai for Bangalore at 10:00 pm. After travelling for 50% of the total distance train A meets with an accident and starta travelling at the rate of 2/3rd of its original speed. In this way, both the traina reach Bangalore at 08:00 am. Find the ratio of their original speed?', '3 : 2', '5 : 3', '5 : 2', '5 : 4', 4, '', 0),
(479, 156, 'There are five persons- H, M, W, Q and V with different weights. H is heavier thanonly one person. Only one person is weighted in between Q and W. W is lighter than V. M is neither theheaviest person nor the second heaviest person.\r\n\r\nHow many persons are heavier than V?', '2', '1', '3', '4', 2, '', 0),
(480, 156, 'There are five persons- H, M, W, Q and V with different weights. H is heavier thanonly one person. Only one person is weighted in between Q and W. W is lighter than V. M is neither theheaviest person nor the second heaviest person.\r\n\r\nIf the weight of H is 50kg, then what is the weight of M?', '60 Kg', '65 Kg', '45 Kg', '55 Kg', 3, '', 0),
(481, 156, 'There are five persons- H, M, W, Q and V with different weights. H is heavier thanonly one person. Only one person is weighted in between Q and W. W is lighter than V. M is neither theheaviest person nor the second heaviest person.\r\n\r\nAs many persons are lighter than Q is the same as heavier than ___?', 'M', 'H', 'W', 'V', 1, '', 0),
(482, 156, 'If 2 is added to all the digits of the number 53276434 then what is the sum of 3rd digit from left end and 5th digit from right end.', '12', '10', '13', '11', 3, '', 0),
(483, 156, 'How many such pairs of digits are there in the number 725318649 each of which has as many digit between them in the number as in numerical series.', '2', '4', '3', '5', 4, '', 0),
(484, 156, 'Eight persons- A to H are living in the eight-storey building. The lowermost floor is numbered as one and the topmost floor is numbered as eight. All the information is not necessarily in the same order.\r\n\r\nF lives on an even number floor two persons above G. Number of person lives above F is the same as below B. H lives immediately above the one who lives two persons above A. H is neither living adjacent floor of G nor E. E lives below D and is not living on the lowermost floor.\r\n\r\nHow many floors are between H and A?', 'As many as between F and B.', 'Three', 'As many as between D and A.', 'Four', 1, '', 0),
(485, 156, 'Eight persons- A to H are living in the eight-storey building. The lowermost floor is numbered as one and the topmost floor is numbered as eight. All the information is not necessarily in the same order.\r\n\r\nF lives on an even number floor two persons above G. Number of person lives above F is the same as below B. H lives immediately above the one who lives two persons above A. H is neither living adjacent floor of G nor E. E lives below D and is not living on the lowermost floor.\r\n\r\nWhich of the following statement is/are true?\r\nI). Four floors between H and B.\r\nII). E lives two floors above C.\r\nIII). F lives immediately above A.', 'Only I and III', 'Only III', 'Only I and II', 'Only II', 1, '', 0),
(486, 156, 'Eight persons- A to H are living in the eight-storey building. The lowermost floor is numbered as one and the topmost floor is numbered as eight. All the information is not necessarily in the same order.\r\n\r\nF lives on an even number floor two persons above G. Number of person lives above F is the same as below B. H lives immediately above the one who lives two persons above A. H is neither living adjacent floor of G nor E. E lives below D and is not living on the lowermost floor.\r\n\r\nAs many people live above D is same as that of below___?', 'G', 'A', 'F', 'E', 4, '', 0),
(487, 156, 'Eight persons- A to H are living in the eight-storey building. The lowermost floor is numbered as one and the topmost floor is numbered as eight. All the information is not necessarily in the same order.\r\n\r\nF lives on an even number floor two persons above G. Number of person lives above F is the same as below B. H lives immediately above the one who lives two persons above A. H is neither living adjacent floor of G nor E. E lives below D and is not living on the lowermost floor.\r\n\r\nWho among the following lives three floors above B?', 'The one who lives on the sixth floor', 'The one who lives immediately above D', 'The one who lives two floors below H.', 'Both a and c', 1, '', 0),
(488, 156, 'Eight persons- A to H are living in the eight-storey building. The lowermost floor is numbered as one and the topmost floor is numbered as eight. All the information is not necessarily in the same order.\r\n\r\nF lives on an even number floor two persons above G. Number of person lives above F is the same as below B. H lives immediately above the one who lives two persons above A. H is neither living adjacent floor of G nor E. E lives below D and is not living on the lowermost floor.\r\n\r\nWhat is the position of G from the top of the building?', 'Seventh', 'Fourth', 'Sixth', 'Fifth', 4, '', 0),
(489, 156, 'Point P is 2m north of Point Q. Point Z is 9m west of Point Q. Point L is 15m east of Point M which is 20m south of Point Z. Point R is 3m south of Point L. Point T is west of point R and South of Point P.\r\n\r\nHow far and what is the direction of Q with respect to T?', '21m towards the south', '20m towards the south', '23m towards the north', '22m towards the north', 3, '', 0),
(490, 156, 'Point P is 2m north of Point Q. Point Z is 9m west of Point Q. Point L is 15m east of Point M which is 20m south of Point Z. Point R is 3m south of Point L. Point T is west of point R and South of Point P.\r\n\r\nWhat is the shortest distance between Point L and Point Z?', '21 m', '25 m', '20 m', '23 m', 2, '', 0),
(491, 156, 'Point P is 2m north of Point Q. Point Z is 9m west of Point Q. Point L is 15m east of Point M which is 20m south of Point Z. Point R is 3m south of Point L. Point T is west of point R and South of Point P.\r\n\r\nWhat is the shortest distance between T and R?', '6 m', '15 m', '7 m', '9 m', 1, '', 0),
(492, 156, 'Six persons viz. L, M, N, O, P and Q are standing on a triangular line such that all of them are facing towards the center, but not necessarily in the same order. Two persons stand on each side of the line.\r\n\r\nL stands two persons away from Q. M stands to the immediate left of Q but not on the same side. N stands second to the left of M and second to the right of O. P doesn&rsquo;t stand adjacent to O.\r\n\r\nWho among the following person stand to the immediate right of N?', 'M', 'P', 'L', 'O', 2, 'See Images for reference Visit links\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744970359.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744972651.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744975164.png', 0),
(493, 156, 'Six persons viz. L, M, N, O, P and Q are standing on a triangular line such that all of them are facing towards the center, but not necessarily in the same order. Two persons stand on each side of the line.\r\n\r\nL stands two persons away from Q. M stands to the immediate left of Q but not on the same side. N stands second to the left of M and second to the right of O. P doesn&rsquo;t stand adjacent to O.\r\n\r\nWhat is the position of O with respect to L?', 'Third to the right', 'Second to the right', 'Second to the left', 'Immediate left', 4, 'See Images for reference Visit links\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744970359.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744972651.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744975164.png', 0),
(494, 156, 'Six persons viz. L, M, N, O, P and Q are standing on a triangular line such that all of them are facing towards the center, but not necessarily in the same order. Two persons stand on each side of the line.\r\n\r\nL stands two persons away from Q. M stands to the immediate left of Q but not on the same side. N stands second to the left of M and second to the right of O. P doesn&rsquo;t stand adjacent to O.\r\n\r\nHow many persons stand between Q and P when counted from the right of P?', '1', '2', '3', 'None', 1, 'See Images for reference Visit links\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744970359.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744972651.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744975164.png', 0),
(495, 156, 'Six persons viz. L, M, N, O, P and Q are standing on a triangular line such that all of them are facing towards the center, but not necessarily in the same order. Two persons stand on each side of the line.\r\n\r\nL stands two persons away from Q. M stands to the immediate left of Q but not on the same side. N stands second to the left of M and second to the right of O. P doesn&rsquo;t stand adjacent to O.\r\n\r\nWho among the following person stands fourth to the left of O?', 'N', 'L', 'M', 'Q', 1, 'See Images for reference Visit links\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744970359.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744972651.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744975164.png', 0),
(496, 156, 'Six persons viz. L, M, N, O, P and Q are standing on a triangular line such that all of them are facing towards the center, but not necessarily in the same order. Two persons stand on each side of the line.\r\n\r\nL stands two persons away from Q. M stands to the immediate left of Q but not on the same side. N stands second to the left of M and second to the right of O. P doesn&rsquo;t stand adjacent to O.\r\n\r\nFill the following series.\r\nLP ML NO __', 'NQ', 'LP', 'LO', 'PL', 3, 'See Images for reference Visit links\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744970359.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744972651.png\r\n\r\nhttps://guidelyassets.s3.ap-south-1.amazonaws.com/editor/practiceMockQuestions/161744975164.png', 0),
(497, 156, '5, 12, 23, 50, 141, ?', '415', '430', '439', '488', 4, '5&hellip;&hellip;&hellip;.12&hellip;&hellip;&hellip;23&hellip;&hellip;&hellip;..50&hellip;&hellip;&hellip;.141&hellip;&hellip;&hellip;&hellip;488\r\n&hellip;.+7&hellip;&hellip;.+11&hellip;&hellip;&hellip;.+27&hellip;&hellip;&hellip;.+91&hellip;&hellip;&hellip;+347\r\n&hellip;&hellip;&hellip;+4&hellip;&hellip;..+16&hellip;&hellip;&hellip;.+64&hellip;&hellip;&hellip;+256', 0),
(498, 156, '7, 13, 25, 45, 75, ?', '117', '153', '209', '123', 1, '', 0),
(499, 156, '4, 11, 19, 41, ?, 161', '62', '81', '79', '90', 3, '4 &times; 2 + 3 = 11\r\n11 &times; 2 &ndash; 3 = 19\r\n19 &times; 2 + 3 = 41\r\n41 &times; 2 &ndash; 3 = 79\r\n79 &times; 2 + 3 = 161', 0),
(500, 156, '4, 8, 21, 59, ?, 314', '146', '134', '125', '191', 1, '4&hellip;&hellip;&hellip;.8&hellip;&hellip;&hellip;21&hellip;&hellip;&hellip;..59&hellip;&hellip;&hellip;.146&hellip;&hellip;&hellip;&hellip;314\r\n&hellip;.+4&hellip;&hellip;.+13&hellip;&hellip;.+38&hellip;&hellip;&hellip;+87&hellip;&hellip;&hellip;+168\r\n&hellip;&hellip;&hellip;+3^2&hellip;&hellip;.+5^2&hellip;&hellip;..+7^2&hellip;&hellip;&hellip;+9^2', 0),
(501, 156, '11, 6, 5, 9, 16, ?', '66.5', '78.5', '89.5', '42.5', 4, '11 &times;0.5 + 0.5 = 6\n6 &times;1 &ndash; 1 = 5\n5 &times;1.5 + 1.5 = 9\n9 &times;2 &ndash; 2 = 16\n16 &times;2.5 + 2.5 = 42.5', 0),
(502, 156, '5, 8, 28, 162, ?, 12870', '1738', '2318', '1288', '2224', 3, '&times;2 &ndash; 2, &times;4 &ndash; 4, &times;6 &ndash; 6, &times;8 &ndash; 8, &times;10 &ndash; 10', 0),
(503, 156, '3, 5, 10, 20, 37, ?', '68', '77', '78', '63', 4, '+ (1^2+1), + (2^2+1), + (3^2+1), + (4^2+1), + (5^2+1)', 0),
(504, 156, '21, 35, 56, 91, 154, ?', '273', '289', '231', '240', 1, '21 &times; 2 &ndash; 7 = 35\r\n35 &times; 2 &ndash; 14 = 56\r\n56 &times; 2 &ndash; 21 = 91\r\n91 &times; 2 &ndash; 28 = 154\r\n154 &times; 2 &ndash; 35 = 273', 0),
(505, 156, '5, 7, 11, 37, 143, ?', '733', '721', '764', '507', 2, '5 &times; 1 + 2 = 7\r\n7 &times; 2 &ndash; 3 = 11\r\n11 &times; 3 + 4 = 37\r\n37 &times; 4 &ndash; 5 = 143\r\n143 &times; 5 + 6 = 721', 0),
(506, 156, '5, 7, 25, 131, ?, 8335', '865', '914', '1025', '925', 4, '5 &times; 1 + 2 = 7\r\n7 &times; 3 + 4 = 25\r\n25 &times; 5 + 6 = 131\r\n131 &times; 7 + 8 = 925\r\n925 &times; 9 + 10 = 8335', 0),
(507, 156, '767     495     359     291     257     ?', '120', '240', '57', '68', 2, 'Series Pattern 	Given Series	 \r\n767	767	 \r\n767 &ndash; 272 = 495	495	 \r\n495 &ndash; 136 = 359	359	 \r\n359 &ndash; 68  = 291	291	 \r\n291 &ndash; 34 = 257	257	 \r\n257 &ndash; 17 = 240	240', 0),
(508, 156, '17.5     31     58     98.5     152.5     ?', '169.5', '180.5', '220', '205', 3, 'Series Pattern 	Given Series	 \n17.5	17.5	 \n17.5 + 1 &times; 13.5 = 31	31	 \n31 + 2 &times; 13.5 = 58	58	 \n58 + 3 &times; 13.5 = 98.5	98.5	 \n98.5 + 4 &times; 13.5 = 152.5	152.5	 \n152.5 + 5 &times; 13.5 = 220	220', 0),
(533, 167, 'class base\r\n{\r\npublic:\r\n       base()\r\n       {          \r\n           cout&lt;&lt;&quot;BCon&quot;;\r\n       }\r\n       ~base()\r\n       {\r\n	   cout&lt;&lt;&quot;BDest &quot;;\r\n       }\r\n};\r\nclass derived: public base\r\n{\r\npublic:\r\n       derived()\r\n       {     cout&lt;&lt;&quot;DCon &quot;;\r\n       }\r\n       ~derived()\r\n       {     cout&lt;&lt;&quot;DDest &quot;;\r\n       }\r\n};\r\n\r\nint main()\r\n{\r\n       derived object;\r\n       return 0; \r\n}', 'Dcon DDest', 'Dcon DDest BCon BDest', 'BCon DCon DDest BDest', 'BCon DCon BDes DDest', 3, '', 1),
(534, 167, '//What is the value of a in below program?\r\n\r\nint main()\r\n{\r\n int a, b=20;\r\n a = 90/b;\r\n return 0;\r\n}', '4.5', '4.0', '4', 'Compilation Error', 3, '', 1),
(535, 167, 'Which operator has highest precedence in * / % ?', '*', '/', '%', 'all have same precedence', 4, '', 0),
(536, 167, 'Are both of the preprocessor directives solving same purpose?\r\n\r\n#include &lt;iostream.h&gt;\r\n\r\n#include &quot;iostream.h&quot;', 'Yes', 'No', 'Depends on compiler', 'None of these', 1, '', 1),
(537, 167, 'Which part of memory is used for the allocation of local variables declared inside', 'Heap', 'Stack', 'Address Space', 'Depends on Compiler', 2, '', 0);

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
  `shuffle` tinyint(4) NOT NULL,
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

INSERT INTO `quizes` (`quiz_id`, `quiz_name`, `difficulty_level`, `description`, `number_of_questions`, `is_active`, `active_timing`, `inactive_timing`, `Exam_key`, `key_access`, `show_evaluation`, `shuffle`, `time_duration`, `marks_per_question`, `negative_marking`, `passing_percentage`, `admin_email_id`, `time_stamp`) VALUES
(103, 'C++ Programming', 'Intermediate', 'This Online C Programming Test is specially designed for you by industry experts.', 10, 0, 0, 0, '9911', 0, 0, 1, 1800, 1, 0, 60, 24, '2020-12-14 23:36:05'),
(126, 'Design and Analysis of Algorithms', 'Intermediate', 'Exam Key : daa@1999\r\n<br/>\r\n<br/>Design and Analysis of Algorithm is very important for designing algorithm to solve different types of problems in the branch of computer science and information technology.', 10, 0, 0, 0, 'daa@1999', 0, 0, 0, 2700, 0, 0, 0, 24, '2020-12-15 14:54:36'),
(134, 'CODE - C', 'Intermediate', 'C and C++ Programming based Questions.\r\nTypes\r\n-> Output based\r\n-> Error search\r\n-> Theory\r\n- >Architecture\r\n-> OOPS', 5, 1, 1611859500, 1611861300, '23031999', 1, 1, 1, -1, 1, 0.5, 50, 24, '2020-12-15 14:54:23'),
(140, 'Quantitative Aptitude', 'Beginner', 'Arithmetic Ability test helps measure one\'s numerical ability, problem solving and mathematical skills. ... Every aspirant giving Quantitative Aptitude Aptitude test tries to solve maximum number of problems with maximum accuracy and speed.', 30, 0, 0, 0, 'QA2021', 0, 0, 1, 3600, 1, 0, 60, 24, '2021-04-12 02:35:41'),
(141, 'C Programming Basic', 'Beginner', 'Practice Test', 10, 1, 0, 0, 'CP2021', 1, 0, 1, 900, 2, 1, 50, 24, '2021-04-12 14:33:29'),
(150, 'General Aptitude 1.0', 'Intermediate', 'Quantitative Aptitude : 20 Questions\r\nLogical Reasoning : 20 Questions\r\nVerbal ability : 20 Questions', 60, 1, 0, 0, 'GA2021', 1, 1, 0, 7200, 2, 1, 60, 41, '2021-04-15 04:33:11'),
(155, 'Quantitative Aptitude SBI PO', 'Intermediate', 'Quantitative Aptitude\r<br/>SBI PO', 30, 1, 0, 0, 'QASBIPO2021', 0, 1, 1, 3600, 4, 1, 60, 41, '2021-04-16 17:18:36'),
(156, 'Logical Reasoning 1.0', 'Intermediate', 'Logical Reasoning Questions To Prepare For SBI PO Exams', 30, 1, 0, 0, 'LR2021', 1, 1, 0, 3600, 1, 0, 60, 41, '2021-04-16 19:25:22'),
(167, 'C++ Programming 2.0', 'Intermediate', 'Predict Output', 5, 0, 0, 0, 'CP2021', 0, 0, 0, -1, 2, 1, 60, 24, '2021-04-17 15:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `registered_admin`
--

CREATE TABLE `registered_admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` char(50) NOT NULL,
  `last_name` char(30) NOT NULL,
  `admin_contact` bigint(20) NOT NULL,
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
(24, 'Ishwar', 'Baisla', 9821671707, 'male', 'Delhi', '1999-03-23', 'wazirabad village gali no 6', 'SRM UNIVERSITY', 'ishwar2303@gmail.com', '23031999'),
(41, 'ISHWAR', 'BAISLA', 9821671707, 'male', 'Delhi', '1999-03-23', 'wazirabad village gali no 6', 'SRM-IST', 'ishwar1999@gmail.com', '23031999'),
(43, 'RHYTHM', 'SHARMA', 870853702, 'male', 'Haryana', '2000-11-24', 'Kurukshetra', 'SRM-IST', 'srhythm2020@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `reported_questions`
--

CREATE TABLE `reported_questions` (
  `report_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `problem` varchar(3000) NOT NULL,
  `amend` tinyint(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`certificate_id`);

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
-- Indexes for table `reported_questions`
--
ALTER TABLE `reported_questions`
  ADD PRIMARY KEY (`report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `attempt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

--
-- AUTO_INCREMENT for table `quizes`
--
ALTER TABLE `quizes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `registered_admin`
--
ALTER TABLE `registered_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reported_questions`
--
ALTER TABLE `reported_questions`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
