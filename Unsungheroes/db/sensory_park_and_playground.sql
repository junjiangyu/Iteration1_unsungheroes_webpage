-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2021 at 02:39 AM
-- Server version: 8.0.23
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitnami_wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `sensory_park_and_playground`
--

CREATE TABLE `sensory_park_and_playground` (
  `facility_id` int UNSIGNED NOT NULL,
  `facility_name` varchar(999) NOT NULL,
  `address` varchar(999) NOT NULL,
  `area_of_Melbourne` varchar(999) NOT NULL,
  `latitude` decimal(10,6) NOT NULL,
  `longitude` decimal(10,6) NOT NULL,
  `facility_features` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensory_park_and_playground`
--

INSERT INTO `sensory_park_and_playground` (`facility_id`, `facility_name`, `address`, `area_of_Melbourne`, `latitude`, `longitude`, `facility_features`) VALUES
(1, 'Debneys Park', '38 Mount Alexander Road, Flemington', 'Central Melbourne', '-37.785893', '144.936859', 'BBQ and tables under shade sails, unshaded seats and table tennis tables and an oval.'),
(2, 'Albert Park', 'Aughtie Drive, Albert Park', 'Central Melbourne', '-37.847412', '144.970046', 'Sheltered BBQ and tables. Some shaded tables and seats under the trees. Toilets.'),
(3, 'Artplay playground', 'Birrarung Marr, Melbourne', 'Central Melbourne', '-37.818128', '144.971214', 'Tables, toilets, water tap, shaded seating and Liberty swing.'),
(4, 'Skinners Adventure Playground', '211 Dorcas Street, South Melbourne', 'Central Melbourne', '-37.832774', '144.962211', 'Shaded seats. Skinners Park is open in the late afternoon on weekdays and on weekends and is staffed.'),
(5, 'Carlton Gardens', 'Carlton Gardens, Cnr Rathdowne Street and Carlton Street, Carlton', 'Central Melbourne', '-37.805412', '144.971389', 'Shaded and unshaded seats. Water tap. Grassy area with trees and big basketball court. The playground is located next to the Melbourne Museum.'),
(6, 'Fitzroy Gardens', 'Cnr Clarendon Street and Grey St, East Melbourne', 'Central Melbourne', '-37.812738', '144.980111', 'Shaded seating and toilets.'),
(7, 'Plum Garland Memorial Playground', 'Cnr Beaconsfield Parade and Victoria Ave, Albert Park', 'Central Melbourne', '-37.847634', '144.948155', 'Four seats which can catch some shade. Completely enclosed by fence with safety gates. Water tap.'),
(8, 'Powlett Reserve', 'Cnr Powlett & Grey Streets, East Melbourne', 'Central Melbourne', '-37.811364', '144.987496', 'There are shaded tables and seats. Water tap. Small basketball court nearby.'),
(9, 'Bayswater Road Park', '41 Bayswater Road, Kensington', 'Central Melbourne', '-37.793866', '144.923625', 'BBQ in the corner, shaded and unshaded tables and seats. Fenced with gates. Good sized grassy area. Water tap.'),
(10, 'Curtain Square Playground', '77 Newry Street, Carlton North', 'Central Melbourne', '-37.789405', '144.972903', 'Tables and shelter. Full size basketball court and enough grassy area to fly a kite.'),
(11, 'Edinburgh Gardens (South)', '173 Alfred Crescent, Fitzroy North', 'Central Melbourne', '-37.787445', '144.983021', 'In an elevated position in the centre is a big shelter with seats. Shaded tables, seats, BBQs and water tap. Toilets. Next to ovals and large basketball court is nearby.'),
(12, 'Garden City Reserve', '47 Beacon Rd, Port Melbourne', 'Central Melbourne', '-37.835949', '144.929993', 'Plenty of unshaded seats. Table with possible shade. Water tap.'),
(13, 'Edwards Park', '210 Esplanade West, Port Melbourne', 'Central Melbourne', '-37.839337', '144.944295', 'All equipment under shade sails. Some shaded seats. Large grassy area for play amongst the palm trees but no fences.'),
(14, 'Flagstaff Gardens', 'Cnr William Street and Abeckett St, West Melbourne', 'Central Melbourne', '-37.810391', '144.954560', 'BBQ, tables and water tap. Some seats with shade.'),
(15, 'Inner Circle-Thomas Kidney Reserve', 'Cnr Park St and Bennett St, Fitzroy North', 'Central Melbourne', '-37.781529', '144.989923', 'Fully fenced, shelter, BBQ, tables, basketball court, grassy areas and shaded seats.'),
(16, 'Langdon Reserve', '16 Miller Street, Fitzroy North', 'Central Melbourne', '-37.776502', '144.979211', 'Outside the fenced area are a BBQ, unshaded table and shaded seats plus grassy area.'),
(17, 'J.J Holland Park', '50 Altona St, Kensington', 'Central Melbourne', '-37.798357', '144.923617', 'BBQs, shaded tables, unshaded seats, toilets and water tap. Next to basketball court and oval.'),
(18, 'Princes Park', '121 Princes Park Drive, Carlton North', 'Central Melbourne', '-37.784917', '144.961451', 'Water taps and shaded seats. Slightly away from the playground area is a BBQ and tables with possible shade. Located next to oval. Paid parking during the week.'),
(19, 'Middle Park', '151 Richardson Street, Middle Park', 'Central Melbourne', '-37.852038', '144.963970', 'Plenty of tables and seats (some shaded). Water tap. Area completely fenced in with gates.'),
(20, 'St Vincent Gardens', '1 St Vincent Street, Albert Park', 'Central Melbourne', '-37.838850', '144.954935', 'Good shade from trees. Shaded and unshaded seats, toilets and water tap.'),
(21, 'Yarra Park', 'Cnr Vale St and Wellington Pde South, East Melbourne', 'Central Melbourne', '-37.819802', '144.986513', 'Tables and seats with shade. BBQ and basketball court. Toilets are 200 metres away.'),
(22, 'Gardiner Reserve', '118 Haines Street, North Melbourne', 'Central Melbourne', '-37.798581', '144.943900', 'BBQs and shaded and unshaded tables and seats. Water tap. Reasonable amount of grassy area. Some protection from the roads by partial fencing.'),
(23, 'Ludwig Stamer Reserve', '102 Cobden Street, South Melbourne', 'Central Melbourne', '-37.836230', '144.965561', 'Shaded seats. Fenced with safety gate. Water tap and shaded table.'),
(24, 'Bicentennial Park', 'Thames Promenade & Scotch Parade, Chelsea VIC 3196, Australia', 'Melbourne South East Region', '-38.029563', '145.124800', 'There is a Liberty swing. Shelters with BBQs and tables, toilets, seats (including some wonderful curved seats) and water taps are spread around. The area is surrounded by fences with child proof gates.'),
(25, 'Carrum Foreshore Playground', 'Cnr Johnson ave, Old Post Office Ln, Carrum VIC 3197, Australia', 'Melbourne South East Region', '-38.075749', '145.121279', 'The sandy playground area is surrounded by paths and decking, relaxing blue and white high backed deck chairs, bench seating, water taps, toilets and two open sided shelters with a BBQ and table each.'),
(26, 'Allnutt Park', 'Wheatley Rd, McKinnon VIC 3204, Australia', 'Melbourne South East Region', '-37.913262', '145.032376', 'Seats with shade. Rotundas with tables, BBQs, rubbish bins, water tap and toilets. Good size basketball / netball court nearby.'),
(27, 'Carrum Pirate Ship Park', '17 Dyson Rd, Carrum VIC 3197, Australia', 'Melbourne South East Region', '-38.077201', '145.130936', 'Near the dry watercourse is a curved seat for resting under a tree, shelter with BBQ and table, water tap and double sided tennis wall.'),
(28, 'Alma Park Playground', '150 Dandenong Rd, St Kilda East VIC 3183, Australia', 'Melbourne South East Region', '-37.861541', '144.995401', 'Shelter, BBQ, toilets and water tap.'),
(29, 'Bald Hill Park', 'Clarinda VIC 3169, Australia', 'Melbourne South East Region', '-37.932543', '145.105041', 'Shelter with table and BBQ. Tables and seats (including two curved seats) which are mainly unshaded. Water tap. There is another area with a large shelter which has BBQs and tables. This area also has shaded tables and a water tap. Toilets. Next to a huge grassy park.'),
(30, 'Banjo Paterson Playground', 'Lynbrook VIC 3975, Australia', 'Melbourne South East Region', '-38.053937', '145.250897', 'BBQ and single seat without shade. Almost enclosed by a fence but with a large lake nearby need to be vigilant. Next to the lake which has ducks and pelicans are four tables under shelter and more BBQs. A basketball court and BMX track are nearby. Toilets have been added.'),
(31, 'Borthwick Park Playground', 'Blair Rd, Belgrave VIC 3160, Australia', 'Melbourne South East Region', '-37.913370', '145.355021', 'Shaded seats and tables. There is a section of sloping shady grassy area.'),
(32, 'Braeside Park - Childrens Playground', 'Braeside VIC 3195, Australia', 'Melbourne South East Region', '-37.991428', '145.127453', 'Surrounded by gum trees and plenty of shaded tables.'),
(33, 'Murrumbeena Park', '41 Kangaroo Rd, Murrumbeena VIC 3163, Australia', 'Melbourne South East Region', '-37.897603', '145.072802', 'There are two shelters with tables, unshaded BBQs, water tap and toilets. There are ovals next to the playground. The shelters can be booked for events and a fee applies.'),
(34, 'Caulfield Park Playground', 'Caulfield North VIC 3161, Australia', 'Melbourne South East Region', '-37.872733', '145.033908', 'Plenty of BBQs, tables and seats (some with shade). Even a shelter with table at the top of the hill with the large slide. Toilets, water taps, basketball court with hoop at each end, exercise stations located around the perimeter of the park and heaps of grassy areas for ball games.'),
(35, 'Markham Reserve Playground', '75 Victory Blvd, Ashburton VIC 3147, Australia', 'Melbourne South East Region', '-37.871246', '145.086047', 'Shelters with tables, unshaded seats, lots of water taps, BBQs and toilets. The playground has good access to equipment via paths. A basketball court and a small skate park is next to the playground.'),
(36, 'Dendy Park', 'Unnamed Road, Brighton East VIC 3187, Australia', 'Melbourne South East Region', '-37.927082', '145.022144', 'The playground is located in Dendy Park. The park has drinking fountains, dog off leash area, goal posts, two playgrounds (the other one is terrible), practice nets, tennis/handball practice wall and toilets.'),
(37, 'Heatherton Park', 'Heatherton Rd, Clayton South VIC 3169, Australia', 'Melbourne South East Region', '-37.203985', '145.299382', 'There is a large shelter with two tables and BBQ, water tap, unshaded table and seats. Also a basketball court.'),
(38, 'Edithvale Recreation Reserve playground', 'Edithvale VIC 3196, Australia', 'Melbourne South East Region', '-38.037204', '145.120064', 'Shelter with BBQs and tables. Unshaded table and seats. Water tap. Next to oval and cycling track. Well protected from road by a fence. In general, best suited to older kids due to the height.'),
(39, 'Federal Reserve Playground', 'Mount Waverley VIC 3149, Australia', 'Melbourne South East Region', '-37.860275', '145.123317', 'Large BBQ and tables under roof.'),
(40, 'Valley Reserve Playspace', '80 Waimarie Dr, Mount Waverley VIC 3149, Australia', 'Melbourne South East Region', '-37.879019', '145.135970', 'Picnic table and shaded seating.'),
(41, 'Halley Park', 'Jasper Rd, Bentleigh VIC 3204, Australia', 'Melbourne South East Region', '-37.927548', '145.039047', 'Basketball court and exercise stations nearby. Rotunda with three tables, BBQs, other tables with possible shade. Quite a large grassy area for playing games. Lovely place to have a BBQ on a nice summer evening.'),
(42, 'Kingston Heath Reserve Playground', 'Cheltenham VIC 3192, Australia', 'Melbourne South East Region', '-37.968485', '145.087735', 'Plenty of shaded seats, BBQ under shelter, toilets and water tap.'),
(43, 'Hemmings Park', '61A Princes Hwy, Dandenong VIC 3175, Australia', 'Melbourne South East Region', '-37.981114', '145.208165', 'Next to skateboard/BMX park.'),
(44, 'Packer Park', '120 Leila Rd, Carnegie VIC 3163, Australia', 'Melbourne South East Region', '-37.902111', '145.059652', 'There is a wetland area with ponds to explore next to the playground. Some shade afforded by a large gum tree in the middle of the playground. BBQs, tables under shelter, water tap, rubbish bins and toilets. Also basketball ring, tennis practice wall, synthetic surfaced velodrome and golf practice net (birdie cages) in the general area.'),
(45, 'Penpraze Park', '35 Victoria Rd N, Malvern VIC 3144, Australia', 'Melbourne South East Region', '-37.870765', '145.037592', 'There is also a BBQ area which seems to be on the school grounds.'),
(46, 'Peter Scullin Reserve', 'Mordialloc VIC 3195, Australia', 'Melbourne South East Region', '-38.008369', '145.084848', 'Unshaded seats and tables. BBQ and water tap. Located near the foreshore. Be warned that there is ticketed parking.'),
(47, 'Phoenix Park Playground', '3 Ivanhoe Grove, Malvern East VIC 3145, Australia', 'Melbourne South East Region', '-37.879311', '145.080982', 'Phoenix Park Cafe is a small family ran cafe located within the Phoenix Park Community centre adjacent to the playground. There is a Neighbourhood house, Library, BBQs and a Cafe on site.'),
(48, 'Princess Park', 'Hawthorn Rd, Caulfield South VIC 3162, Australia', 'Melbourne South East Region', '-37.893309', '145.022696', 'BBQs, sheltered tables and seats, toilets and water tap. The park also has cricket, football, lawn bowls, soccer, tennis, basketball and netball rings, pavilion and sensory garden.'),
(49, 'St Kilda Adventure Playground', 'Neptune St, St Kilda VIC 3182, Australia', 'Melbourne South East Region', '-37.862188', '144.978892', 'Staffed. Toilets. There is even tea and coffee provided. The only negative is the difficulty finding a parking place.'),
(50, 'Tatterson Park', '62 Chapel Rd, Keysborough VIC 3173, Australia', 'Melbourne South East Region', '-37.998002', '145.155605', 'Three shelters with a table, BBQs and water tap. Toilets. Located next to an oval. The playground is located at the back of Springers Leisure Centre.'),
(51, 'The Grange Reserve', '136-176 Osborne Ave, Clayton South VIC 3169, Australia', 'Melbourne South East Region', '-37.946224', '145.132190', 'There are two shelters with tables, shaded BBQ, toilets, water tap, unshaded seats and some sloping grassy area dotted with pine trees.'),
(52, 'Thomas Street South Reserve', 'Hampton, VIC 3188, Australia', 'Melbourne South East Region', '-37.941133', '145.016930', 'BBQ, shaded tables and seats, toilets and water tap. Set amongst lovely native trees and there is a large area to play ball games in. Almost entirely fenced in with the main gate being child proof. '),
(53, 'Tirhatuan Park', '4 Kriegel Way, Dandenong North VIC 3175, Australia', 'Melbourne South East Region', '-37.945907', '145.222482', 'BBQs, tables and seats under shelter and shade. Toilets and water tap.'),
(54, 'Watson Park', 'Ashburton, VIC 3147, Australia', 'Melbourne South East Region', '-37.869328', '145.074449', 'BBQ, water tap and shaded picnic tables. Play area has some shade from the trees.'),
(55, 'Wombat Bend Playspace', 'Finns Reserve, Templestowe Road & Union Street, Templestowe Lower VIC 3107, Australia', 'Melbourne North West Region', '-37.753519', '145.115640', 'The playground is fully fenced. There is a BBQ, water tap and a few sheltered tables inside the fenced area and lots of picnicking opportunities along the river outside. Toilets.'),
(56, 'Beckett Park Playground', '30 Parring Rd, Balwyn VIC 3103, Australia', 'Melbourne North East Region', '-37.810863', '145.092447', 'Plenty of large wooden sculptures. Shaded tables and seats. Water tap. Toilets. Playground is shaded by plenty of big trees. There is a stone tower which you can climb to a lookout level via ladders inside.'),
(57, 'Riversdale Park', 'Spencer Rd, Camberwell VIC 3124, Australia', 'Melbourne North East Region', '-37.832442', '145.071739', 'There is some shaded seating at the edge of the playground as well as an adjacent covered double BBQ with picnic-table seating and water bubblers. Located well away from the road.'),
(58, 'Bollygum Park', '40 Whittlesea-Kinglake Rd, Kinglake VIC 3763, Australia', 'Melbourne North East Region', '-37.529091', '145.338999', 'Plenty of shady seats including many shaped from logs, unshaded tables, water tap, toilets and BBQ. Limited grassy area which is not suitable for ball games. Next to an excellent Skate Park.'),
(59, 'Eltham North Adventure Playground', 'Eltham North VIC 3095, Australia', 'Melbourne North East Region', '-37.699252', '145.153998', 'Large variety of walkways, BBQs, sheltered tables and seats and water taps. Lovely path with Australian animals embedded in the surface. Liberty swing.'),
(60, 'Lilydale Lake Playground', '435 Swansea Rd, Lilydale VIC 3140, Australia', 'Melbourne North East Region', '-37.765048', '145.357642', 'There are cute round tables with toadstool seats and extensive picnic areas around the playground with shaded tables and seats, BBQs and toilets.'),
(61, 'Halliday Park', '308-332 Mitcham Rd, Mitcham VIC 3132, Australia', 'Melbourne North East Region', '-37.810863', '145.191484', 'BBQs, tables, seats, water tap under huge leafy oak trees. Toilets.'),
(62, 'Ringwood Lake Park', '172 Maroondah Hwy, Ringwood VIC 3134, Australia', 'Melbourne North East Region', '-37.812564', '145.235852', 'Sheltered BBQs and tables, plenty of shaded seats, toilets, walking track and water tap. Liberty Swing.'),
(63, 'Montrose Playground', '950 Mount Dandenong Tourist Rd, Montrose VIC 3765, Australia', 'Melbourne North East Region', '-37.812179', '145.345539', 'An area with four BBQs and tables (some shaded). Water tap. There is limited shade for the playground from the trees. Next to an oval with toilets. This is the type of playground where it is easy for parents and kids to play together.'),
(64, 'Surrey Park', 'Box Hill VIC 3128, Australia', 'Melbourne North East Region', '-37.824826', '145.115556', 'BBQs, tables under shelter and shaded seats. A lot of the playground gets shade from the trees. There is a lake close by so need to be vigilant.'),
(65, 'Ruffey Lake Park', '99 Victoria St, Doncaster East VIC 3109, Australia', 'Melbourne North East Region', '-37.775375', '145.137342', 'Includes BBQ, sheltered table and seats. Water tap and toilets. There is space for ball games.'),
(66, 'Alistair Knox Park', '829 Main Rd, Eltham VIC 3095, Australia', 'Melbourne North East Region', '-37.718495', '145.144957', 'Plenty of shaded and unshaded seating, unshaded tables, BBQ, toilets and big grassy area. The Alistair Knox Wetlands is not so far away so need to be vigilant.'),
(67, 'Central Gardens', '32 Henry St, Hawthorn VIC 3122, Australia', 'Melbourne North East Region', '-37.821092', '145.041413', 'The playground is set in beautiful gardens with water tap, toilets and plenty of seats, tables, BBQ and shade.'),
(68, 'Anderson Park', '5 Anderson Rd, Hawthorn East VIC 3123, Australia', 'Melbourne North East Region', '-37.840498', '145.050245', 'Part of the playground is shaded and there are plenty of shaded seats. There is a BBQ and tables fairly close by. A lovely cricket/football ground in an amphitheatre type setting is next to the playground with views across to the Melbourne skyline. Absolutely top notch.'),
(69, 'Ferguson\'s Paddock', '12 Arthurs Creek Rd, Hurstbridge VIC 3099, Australia', 'Melbourne North East Region', '-37.635916', '145.193442', 'Huge grassy area. Shelter and shaded and unshaded seats scattered about.'),
(70, 'Hays Paddock', 'Leason St, Kew East VIC 3102, Australia', 'Melbourne North East Region', '-37.790053', '145.058305', 'The playground area is fenced with safety gates. Outside is a wetlands area with a bird hide overlooking this area inside the playground. There is a also a learner\'s bike circuit. There are toilets outside the playground area. '),
(71, 'Yarra Glen Adventure Playground', 'Anzac Ave & Bell Street, Yarra Glen VIC 3775, Australia', 'Melbourne North East Region', '-37.655771', '145.373245', 'There is a shelter inside the play area plus shaded and unshaded tables and seats scattered about. Water tap and toilets. Outside the play area is a shelter with tables, BBQ, grassy area and more tables. Toilets.'),
(72, 'Deepdene Park', '118-126 Whitehorse Rd, Deepdene VIC 3103, Australia', 'Melbourne North East Region', '-37.811696', '145.068310', 'BBQ, water tap, table and seats with possible shade.'),
(73, 'Lynden Park', 'Lynden St, Camberwell VIC 3124, Australia', 'Melbourne North East Region', '-37.843717', '145.087093', 'BBQ, tables and shade.'),
(74, 'Macleay Park', '189 Belmore Rd, Balwyn North VIC 3104, Australia', 'Melbourne North East Region', '-37.800667', '145.075480', 'Shaded tables, shaded and unshaded seats, BBQ, water tap and huge grassy area.'),
(75, 'Galaxy Land Jackson Park', '1/25 Betula Terrace, Sunbury VIC 3429, Australia', 'Melbourne North West Region', '-37.593873', '144.723730', 'BBQ, Tables, Toilets.'),
(76, 'Gisborne Adventure Playground', '10 Brantome St, Gisborne VIC 3437, Australia', 'Melbourne North West Region', '-37.483796', '144.590249', 'Shelter, BBQ, Tables, Water tap, Liberty Swing, Secure Fencing (part of playground), Toilets.'),
(77, 'Allan Reserve playground', '22 Park Dr, Keilor East VIC 3033, Australia', 'Melbourne North West Region', '-37.747910', '144.859765', 'Shelter, tables, water tap, BBQ and toilets.'),
(78, 'Harmony Park', '187-195 Gaffney St, Coburg VIC 3058, Australia', 'Melbourne North West Region', '-37.733081', '144.952296', 'Shelter, tables, water tap, BBQ, toilets and basketball court.'),
(79, 'Victory Park', 'Ascot Vale, VIC 3032, Australia', 'Melbourne North West Region', '-37.779549', '144.912429', 'Tables, water tap, BBQ and toilets.'),
(80, 'Woodlands Park', '141A Woodland St, Essendon VIC 3040, Australia', 'Melbourne North West Region', '-37.741905', '144.912170', 'Shelter, tables, water tap, BBQ and toilets.'),
(81, 'Cliff Harvey Lagoon Reserve', '662-664 Old Calder Hwy, Keilor VIC 3036, Australia', 'Melbourne North West Region', '-37.720875', '144.837974', 'Shelter, tables, water tap, BBQ.'),
(82, 'Keilor Downs Skate Park', '96 Taylors Rd, Keilor Downs VIC 3038, Australia', 'Melbourne North West Region', '-37.727666', '144.802442', 'Tables, BBQ and basketball court. Skate Park close by.'),
(83, 'Hannah Watts Park', 'Hannah Watts Park (Melton Rec Res), 183-225 High St, Melton VIC 3337, Australia', 'Melbourne North West Region', '-37.683574', '144.592152', 'Shelter, tables, BBQ, Liberty Swing and toilets.'),
(84, 'Navan Park', 'Centenary Ave, Melton West VIC 3337, Australia', 'Melbourne North West Region', '-37.671024', '144.567702', 'Shelter, tables, BBQ, Liberty Swing and toilets.'),
(85, 'Isabella Williams Memorial Reserve', 'Deer Park VIC 3023, Australia', 'Melbourne North West Region', '-37.751178', '144.758211', 'Shelter, BBQs.'),
(86, 'Braybrook Park', '107 Churchill Ave, Braybrook VIC 3019, Australia', 'Melbourne North West Region', '-37.782292', '144.852303', 'Tables, BBQs.'),
(87, 'Maddingley Park', '16 Taverner St, Maddingley VIC 3340, Australia', 'Melbourne South West Region', '-37.682389', '144.438392', 'Shelter with seats, unshaded tables, water tap and toilets. Liberty swing.'),
(88, 'Buckingham Reserve', 'Kororoit Creek Trail, Sunshine West VIC 3020, Australia', 'Melbourne South West Region', '-37.798880', '144.829819', 'Shelter, BBQ, tables.'),
(89, 'Yarraville Gardens', '153 Hyde St, Yarraville VIC 3013, Australia', 'Melbourne South West Region', '-37.813761', '144.898804', 'Tables, toilets and water tap.'),
(90, 'Alamanda Playground', 'Point Cook VIC 3030, Australia', 'Melbourne South West Region', '-37.899740', '144.740713', 'Lots of unshaded tables and seats. BBQs and shelter.'),
(91, 'Club House Park Playground', '32 Emma Dr, Tarneit VIC 3029, Australia', 'Melbourne South West Region', '-37.841962', '144.657806', 'Unshaded tables, water tap and shaded seats.'),
(92, 'Presidents Park', 'Corner of Heaths and, McGrath Rd, Werribee VIC 3030, Australia', 'Melbourne South West Region', '-37.886100', '144.631901', 'BBQs and sheltered tables scattered about. Toilets and water tap. Most seats in the playground do not have shade. '),
(93, 'Beaton Reserve', 'Yarraville, VIC 3013,Australia', 'Melbourne South West Region', '-37.817551', '144.885833', 'Shelter with seats, BBQ, table with possible shade, shaded seat, basketball court and a huge grassy area. Some shade from trees.'),
(94, 'Charlotte Street Playground', '11 Charlotte St, Yarraville VIC 3013, Australia', 'Melbourne South West Region', '-37.812529', '144.871806', 'BBQ, table under shelter and tables, seats without shade, water tap and toilets.'),
(95, 'J D Bellin Reserve Playground', 'Finch Rd, Werribee South VIC 3030, Australia', 'Melbourne South West Region', '-37.973275', '144.688829', 'BBQ, table under shelter and tables, seats without shade, water tap and toilets.'),
(96, 'Beevers Reserve', '28-36 Wales St, Kingsville VIC 3012, Australia', 'Melbourne South West Region', '-37.807254', '144.880142', 'Basketball court, unshaded table and seats. Slightly undulating grassy area.'),
(97, 'Logan Reserve Playground', '173 Esplanade, Altona VIC 3018, Australia', 'Melbourne South West Region', '-37.870303', '144.829682', 'Shelter with seats. There are plenty of shaded and unshaded tables and seats scattered about. Grassy area with BBQs, toilets and water tap. Next to Altona pier and beach.'),
(98, 'Ardeer Community Park', 'Ardeer, VIC 3022, Australia', 'Melbourne South West Region', '-37.782817', '144.805747', 'Shelter with table, BBQ and water tap. Plenty of areas to explore outside the immediate playground area. There is lovely landscaping, basketball court and grassy area.'),
(99, 'Matthews Hill Reserve', 'Sunshine, VIC 3020, Australia', 'Melbourne South West Region', '-37.794193', '144.840833', 'Shelter with tables, unshaded table, unshaded seats, BBQ, basketball court and big grassy area.'),
(100, 'Saturday Bootcamp Playground', 'Farfalla Way, Tarneit VIC 3029, Australia', 'Melbourne South West Region', '-37.848158', '144.665960', 'Basketball court. Huge shelter with tables, water tap, BBQ, unshaded seats and grassy area.'),
(101, 'Rocket Playground', '10 Norfolk Dr, Narre Warren VIC 3805, Australia', 'Melbourne South East Region', '-38.033857', '145.307510', 'The playground is next to a Skate Park and BMX track. There is also a sensory trail which highlights different eco-systems, BBQs, plenty of shaded tables and seats under trees, shelters and shade sails. Toilets.'),
(102, 'Old Cheese Factory Playground', '34 Homestead Rd, Berwick VIC 3806, Australia', 'Melbourne South East Region', '-38.053550', '145.333415', 'Shelter with tables, unshaded seats and tables, BBQ and grassy area. There are buildings with historical items to explore, Farmers market on some days and a cafe serving Devonshire scones.'),
(103, 'Rowville Community Centre Playground', 'Cb272 Public Toilets, 40 Fulham Rd, Rowville VIC 3178, Australia', 'Melbourne North East Region', '-37.920015', '145.240540', 'Shaded seats. Fenced except for the wide entry point and gates (without a working lock). Toilets. A shelter with BBQs, water tap and unshaded tables is located outside the fenced area. Next to an oval and Skate Park.'),
(104, 'Wilson Botanic Park Playground', '28 Quarry Hills Dr, Berwick VIC 3806, Australia', 'Melbourne South East Region', '-38.026077', '145.336942', 'Shaded seats, tables and BBQ. Toilets and water tap. Nearby is a big shelter with tables and BBQs. There is a walk up to a lookout tower, large lake and pond, visitor\'s centre and picnic areas. There are snakes in the area during summer.'),
(105, 'Kirrabilli Parade Reserve Playground', 'Berwick VIC 3806, Australia', 'Melbourne South East Region', '-38.072511', '145.347785', 'Lovely area with lots of gum trees, shelter with tables, BBQ, grassy area and unshaded seats.'),
(106, 'Heritage Boulevard Park', 'Heritage Bvd, Doncaster VIC 3108, Australia', 'Melbourne North East Region', '-37.784839', '145.115096', 'Basketball court and grassy area for games. The grassy area has a shelter without seats, lovely tables made from olden day carts and a windmill.'),
(107, 'Heritage Estate Reserve Playground', 'Pakenham VIC 3810, Australia', 'Melbourne South East Region', '-38.082682', '145.465465', 'There are fantastic seats and a table made from old farm equipment. Grassy area.'),
(108, 'Cresthaven Playground', '14-20R Hillgrove Cres, Berwick VIC 3806, Australia', 'Melbourne South East Region', '-38.063554', '145.342810', 'Shelter with seats, unshaded table and large grassy area with football posts.'),
(109, 'Kendall Drive Reserve Playground', 'Narre Warren VIC 3805, Australia', 'Melbourne North East Region', '-37.997561', '145.300590', 'Between the two areas are four unshaded tables and log steps. Tennis wall and large grassy area well away from roads. The whole area is attractively arranged.'),
(110, 'Golden Sun Moth Park', 'Craigieburn VIC 3064, Australia', 'Melbourne North West Region', '-37.576485', '144.918138', 'The playground has excellent All Abilities access since there are soft surfaces around all the equipment. There are unshaded seats scattered about the playground area, toilets and water tap. Next to the playground in a grassy area is a big shelter with four tables and BBQs and there are unshaded tables scattered about the surrounding grassy area. Next to a bike path. Toilets and water tap.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sensory_park_and_playground`
--
ALTER TABLE `sensory_park_and_playground`
  ADD PRIMARY KEY (`facility_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sensory_park_and_playground`
--
ALTER TABLE `sensory_park_and_playground`
  MODIFY `facility_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
