-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2017 at 12:04 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `X_Med`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucement`
--

CREATE TABLE IF NOT EXISTS `annoucement` (
  `annoucement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `annoucement`
--

INSERT INTO `annoucement` (`annoucement`) VALUES
('trump is president, we gona die\r\n\r\nblabh balh\r\n\r\nblahhhhh\r\n\r\ns of jQuery 3.0, only the first syntax is recommended; the other syntaxes still work but are deprecated. This is because the selection has no bearing on the behavior');

-- --------------------------------------------------------

--
-- Table structure for table `buisness_info`
--

CREATE TABLE IF NOT EXISTS `buisness_info` (
  `type` varchar(128) NOT NULL,
  `info` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buisness_info`
--

INSERT INTO `buisness_info` (`type`, `info`, `ID`) VALUES
('office', '795 Folsom Ave, Suite 600\nSan Francisco, CA 94107\nP: (+65) 9709 3827', 1),
('email', 'support.xmed@xmed.com', 2),
('what', 'X-MED is a free to edit user database for medicine. Users can view and contribute to X-Med growing databases for educational purposes. We provide easy-to-read, in-depth, authoritative medical information for consumers via its robust, user-friendly, interactive website.', 3),
('who', 'X-Med is created by three students, Charles, KK and Charlotte', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(150) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `last_post_date` datetime NOT NULL,
  `last_user_posted` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_title`, `category_description`, `last_post_date`, `last_user_posted`) VALUES
(1, 'The category one', 'This is the first test category. ', '2017-02-05 21:25:39', 'potato'),
(2, 'Forum Medicine', 'Forum about medicines.', '2017-02-06 16:42:19', 'potato');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  `ID` varchar(16) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `type`, `message`, `ID`) VALUES
('Start', 'asdc', 'suggestions', 'Im so lonely because i have no friends and everybody have their own friends so they no need me anymore', '0'),
('charles xavier', 'jogn@appleseed.com', 'suggestions', 'I wish that life will be equal among men and that nobody will ever have to be sad again\r\n', '1'),
('google', 'google@gmail.com', 'service', 'Hi, I love trump.', '3'),
('charles', 'milselarch@gmail.com', 'suggestions', 'blah blah blah', '4');

-- --------------------------------------------------------

--
-- Table structure for table `imagePaths`
--

CREATE TABLE IF NOT EXISTS `imagePaths` (
  `name` varchar(128) NOT NULL,
  `id` varchar(512) NOT NULL,
  `ext` varchar(32) NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `id_3` (`id`),
  UNIQUE KEY `id_4` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagePaths`
--

INSERT INTO `imagePaths` (`name`, `id`, `ext`) VALUES
('Acetaminophen', 'images/97198abd27bbd8d48da4943d96d2c727161e1230', 'jpg'),
('asdas', 'images/5877c03ae6a72f7613e43303f2b70bc6a8099c98', 'jpg'),
('blob', 'images/ccc8d82d7da747b4f5300029a1e0d5273041ba22', 'gif'),
('Codeine', 'images/ac2ad55d7d144486b141da0e593f9411385a95e3', 'jpg'),
('Donepezil', 'images/60e20bbdb6b5f27a9feb4442861ad915773999eb', 'gif'),
('Lexapro', 'images/1190f3cce585dbe92168deecbf2f37be1925d056', 'jpg'),
('Meloxicam', 'images/2f4933bd137839e25d860b3c7faabe3ae5f43a0e', 'jpg'),
('nachos', 'images/972552675ba85bbce0d6e6074669a01625fd57a2', 'gif'),
('nihilism', 'images/13859f2edbb456ec370aa541481dc67c3a190573', 'jpg'),
('Oxycodone', 'images/f0b4aae77aa407d77e814d26f8fb4bfcc740ef69', 'jpg'),
('pinn', 'images/d0116aeb100ae9ee49755cb0df573a2e69cee57f', 'gif'),
('pop', 'images/cc590885e34d7cb8765675d220bb35a4b03c03ff', 'png'),
('potato', 'images/73320299f79b130c89172044d653a932d456cb96', 'gif'),
('potato chips', 'images/1aece81dd38b101f465d725a6d292e22c71a0f3c', 'png'),
('sleeping pills', 'images/5409a0998a7ee36cd878361dc620db03e12a8694', 'gif'),
('water', 'images/5a0a7defda79f5cdd120f0853728bcdb600e1468', 'gif'),
('Xanax', 'images/e4dcc83c9b36402e601c3e532fad14e17f823f3f', 'jpg'),
('Yellow snow', 'images/1da275b2fdda24de8a126cf9853e36b322f98ae7', 'gif');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `name` varchar(128) NOT NULL,
  `instructions` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`name`, `instructions`, `timestamp`) VALUES
('Acetaminophen', 'What is acetaminophen?\n\nAcetaminophen is a pain reliever and a fever reducer.\n\nAcetaminophen is used to treat many conditions such as headache, muscle aches, arthritis, backache, toothaches, colds, and fevers.\n\nYou should not use acetaminophen if you have severe liver disease.\n\nThere are many brands and forms of acetaminophen available and not all brands are listed on this leaflet.\nDo not take more of this medication than is recommended. An overdose of acetaminophen can damage your liver or cause death. Call your doctor at once if you have nausea, pain in your upper stomach, itching, loss of appetite, dark urine, clay-colored stools, or jaundice (yellowing of your skin or eyes).\n\nDo not take this medication without a doctor&#039;s advice if you have ever had alcoholic liver disease (cirrhosis) or if you drink more than 3 alcoholic beverages per day. You may not be able to take this medicine. Avoid drinking alcohol. It may increase your risk of liver damage while taking acetaminophen.\n\nIn rare cases, acetaminophen may cause a severe skin reaction. Stop taking this medicine and call your doctor right away if you have skin redness or a rash that spreads and causes blistering and peeling.\nBefore taking this medicine\n\nYou should not take acetaminophen if you are allergic to it, or if you have severe liver disease.\n\nDo not take this medication without a doctor&#039;s advice if you have ever had alcoholic liver disease (cirrhosis) or if you drink more than 3 alcoholic beverages per day. You may not be able to take acetaminophen.\n\nYour doctor will determine whether acetaminophen is safe for you to use during pregnancy. Do not use this medicine without the advice of your doctor if you are pregnant.\n\nAcetaminophen can pass into breast milk and may harm a nursing baby. Tell your doctor if you are breast-feeding a baby.\n\nDo not give this medicine to a child younger than 2 years old without the advice of a doctor.\nHow should I take acetaminophen?\n\nUse acetaminophen exactly as directed on the label, or as prescribed by your doctor. Do not use in larger or smaller amounts or for longer than recommended.\n\nDo not take more of this medication than is recommended. An overdose of acetaminophen can damage your liver or cause death.\n\nMeasure liquid medicine with a special dose-measuring spoon or medicine cup, not with a regular table spoon. If you do not have a dose-measuring device, ask your pharmacist for one.\n\nIf you are treating a child, use a pediatric form of acetaminophen. Use only the special dose-measuring dropper or oral syringe that comes with the specific pediatric form you are using. Carefully follow the dosing directions on the medicine label.\n\nAcetaminophen made for infants is available in two different dose concentrations, and each concentration comes with its own medicine dropper or oral syringe. These dosing devices are not equal between the different concentrations. Using the wrong device may cause you to give your child an overdose of acetaminophen. Never mix and match dosing devices between infant formulations of acetaminophen.\n\nYou may need to shake the liquid before each use. Follow the directions on the medicine label.\n\nThe chewable tablet must be chewed thoroughly before you swallow it.\n\nMake sure your hands are dry when handling the acetaminophen disintegrating tablet. Place the tablet on your tongue. It will begin to dissolve right away. Do not swallow the tablet whole. Allow it to dissolve in your mouth without chewing.\n\nTo use the acetaminophen effervescent granules, dissolve one packet of the granules in at least 4 ounces of water. Stir this mixture and drink all of it right away. To make sure you get the entire dose, add a little more water to the same glass, swirl gently and drink right away.\n\nStop taking acetaminophen and call your doctor if:\n\n    you still have a fever after 3 days of use;\n\n    you still have pain after 7 days of use (or 5 days if treating a child);\n\n    you have a skin rash, ongoing headache, or any redness or swelling; or\n\n    if your symptoms get worse, or if you have any new symptoms.\n\nThis medication can cause unusual results with certain lab tests for glucose (sugar) in the urine. Tell any doctor who treats you that you are using acetaminophen.\n\nStore at room temperature away from heat and moisture.', '2017-02-05 14:01:32'),
('asdas', 'asdasdsdasd', '0000-00-00 00:00:00'),
('blob', 'The Blob is a 1958 American independent science-fiction horror film directed by Irvin Yeaworth. In the style of American International Pictures, Paramount ...', '0000-00-00 00:00:00'),
('Codeine', 'Follow all directions on your prescription label. Codeine can slow or stop your breathing. Never use this medicine in larger amounts, or for longer than prescribed. Tell your doctor if the medicine seems to stop working as well in relieving your pain.\n\nCodeine may be habit-forming, even at regular doses. Never share this medicine with another person, especially someone with a history of drug abuse or addiction. MISUSE OF NARCOTIC MEDICINE CAN CAUSE ADDICTION, OVERDOSE, OR DEATH, especially in a child or other person using the medicine without a prescription. Selling or giving away codeine is against the law.\n\nTake codeine with food or milk if it upsets your stomach.\n\nMeasure liquid medicine with a special dose-measuring spoon or medicine cup. If you do not have a dose-measuring device, ask your pharmacist for one.\n\nDrink 6 to 8 full glasses of water daily to help prevent constipation while you are taking codeine. Do not use a stool softener (laxative) without first asking your doctor.\n\nDo not stop using codeine suddenly after long-term use, or you could have unpleasant withdrawal symptoms. Ask your doctor how to safely stop using this medicine.\n\nStore at room temperature away from moisture and heat.\n\nKeep track of the amount of medicine used from each new bottle. Codeine is a drug of abuse and you should be aware if anyone is using your medicine improperly or without a prescription.\n\nAfter you have stopped using this medication, flush any unused pills down the toilet. Disposal of medicines by flushing is recommended to reduce the danger of accidental overdose causing death. This advice applies to a very small number of medicines only. The FDA, working with the manufacturer, has determined this method to be the most appropriate route of disposal and presents the least risk to human safety.', '2017-02-05 14:04:10'),
('Donepezil', ') in patients with Alzheimer disease. Donepezil is a cholinesterase inhibitor. It works by increasing the amount of a certain substance (acetylcholine) in the brain, which may help reduce the symptoms of da asd asd asd as', '0000-00-00 00:00:00'),
('Lexapro', 'Take Lexapro exactly as prescribed by your doctor. Follow all directions on your prescription label. Your doctor may occasionally change your dose to make sure you get the best results. Do not take this medicine in larger or smaller amounts or for longer than recommended.\n\nTry to take Lexapro at the same time each day. Follow the directions on your prescription label.\n\nMeasure liquid medicine with the dosing syringe provided, or with a special dose-measuring spoon or medicine cup. If you do not have a dose-measuring device, ask your pharmacist for one.\n\nIt may take up to 4 weeks or longer before your symptoms improve. Keep using the medication as directed and tell your doctor if your symptoms do not improve.\n\nDo not stop using Lexapro suddenly, or you could have unpleasant withdrawal symptoms. Follow your doctor&#039;s instructions about tapering your dose.\n\nStore at room temperature away from moisture and heat.', '2017-02-05 14:06:55'),
('Meloxicam', 'Take meloxicam exactly as prescribed by your doctor. Follow all directions on your prescription label. Your doctor may occasionally change your dose to make sure you get the best results. Do not take this medicine in larger amounts or for longer than recommended. Use the lowest dose that is effective in treating your condition.\n\nYou may take meloxicam with or without food.\n\nShake the oral suspension (liquid) well just before you measure a dose. Measure liquid medicine with the dosing syringe provided, or with a special dose-measuring spoon or medicine cup. If you do not have a dose-measuring device, ask your pharmacist for one.\n\nIf a child is taking this medication, tell your doctor if the child has any changes in weight. Meloxicam doses are based on weight in children.\n\nIf you use this medicine long-term, you may need frequent medical tests.\n\nStore at room temperature, away from moisture and heat. Keep the bottle tightly closed when not in use.\n\nRead all patient information, medication guides, and instruction sheets provided to you. Ask your doctor or pharmacist if you have any questions.', '2017-02-05 14:10:36'),
('nachos', 'Nachos is a snack food[1][2] dish from northern Mexico.[1][2] The dish is composed of tortilla chips (totopos) covered with cheese or cheese-based sauce, and is often served as a snack. More elaborate versions add more ingredients and can be served as a main dish, although the core definition of Nachos is just melted cheese and chips served together. First created in about 1943 by Ignacio &quot;Nacho&quot; Anaya, the original nachos consisted of fried corn tortillas covered with cheddar cheese and sliced jalapeÃ±o peppers.', '0000-00-00 00:00:00'),
('nihilism', 'Therapeutic nihilism is a contention that curing people, or societies, of their ills by treatment is impossible.\n\nIn medicine, it was connected to the idea that many &quot;cures&quot; do more harm than good, and that one should instead encourage the body to heal itself. Michel de Montaigne espoused this view in his Essais in 1580. This position was later popular, among other places, in France in the 1820s and 1830s, but has mostly faded away in the modern era due to the development of provably effective medicines such as antibiotics, starting with the release of sulfonamide in 1936.', '0000-00-00 00:00:00'),
('Oxycodone', 'Take oxycodone exactly as prescribed. Follow all directions on your prescription label. Oxycodone can slow or stop your breathing, especially when you start using this medicine or whenever your dose is changed. Never take in larger amounts, or for longer than prescribed. Tell your doctor if the medicine seems to stop working as well in relieving your pain.\n\nOxycodone may be habit-forming, even at regular doses. Take this medicine exactly as prescribed by your doctor. MISUSE CAN CAUSE ADDICTION, OVERDOSE, OR DEATH,especially in a child or other person using the medicine without a prescription. Selling or giving away oxycodone to any other person is against the law.\n\nStop taking all other around-the-clock narcotic pain medications when you start taking extended-release oxycodone (Oxycontin).\n\nTake oxycodone with food.\n\nDo not crush, break, or open an extended-release tablet. Swallow it whole to avoid exposure to a potentially fatal dose.\n\nIf your doctor has told you to take two or more oxycodone tablets per dose, take the tablets one at a time. Do not wet, presoak, or lick the tablet before placing it in your mouth. Drink plenty of water to make swallowing easier and to prevent choking.\n\nMeasure liquid medicine with the dosing syringe provided, or with a special dose-measuring spoon or medicine cup. If you do not have a dose-measuring device, ask your pharmacist for one.\n\nDo not stop using oxycodone suddenly after long-term use, or you could have unpleasant withdrawal symptoms. Ask your doctor how to safely stop using this medicine.\n\nNever crush or break a pill to inhale the powder or mix it into a liquid to inject the drug into your vein. This practice has resulted in death with the misuse of oxycodone and similar prescription drugs.\n\nStore at room temperature, away from heat, moisture, and light.\n\nAlways check your bottle to make sure you have received the correct pills (same brand and type) of medicine prescribed by your doctor.\n\nKeep track of the amount of medicine used from each new bottle. Oxycodone is a drug of abuse and you should be aware if anyone is using your medicine improperly or without a prescription.', '2017-02-05 14:09:32'),
('pinn', 'asfafasf', '0000-00-00 00:00:00'),
('pop', 'pop', '0000-00-00 00:00:00'),
('potato', 'like potato chips but uncooked', '2017-02-05 11:14:20'),
('potato chips', 'A potato chip (American English) or crisp (British English) is a thin slice of potato that has been deep fried, baked, kettle-cooked, or popped until crunchy. Potato chips are commonly served as a snack, side dish, or appetizer. The basic chips are cooked and salted; additional varieties are manufactured using various flavorings and ingredients including herbs, spices, cheeses, and additives.\n\nMore generally, crisps and chips include savory snack products made from not just potato, but also corn, tapioca, banana, or other cereals, root vegetables, and fruits.\n\nPotato chips are a predominant part of the snack food market in Western countries. The global potato chip market generated total revenues of US$16.49 billion in 2005. This accounted for 35.5% of the total savory snacks market in that year ($46.1 billion).[1]', '0000-00-00 00:00:00'),
('prozac', 'happy pills', '2017-02-06 06:59:43'),
('sleeping pills', 'for sleeping DUH', '2017-02-05 13:41:47'),
('water', 'for not dying', '0000-00-00 00:00:00'),
('Xanax', 'Take Xanax exactly as prescribed by your doctor. Follow all directions on your prescription label. Never use alprazolam in larger amounts, or for longer than prescribed. Tell your doctor if the medicine seems to stop working as well in treating your symptoms.\n\nAlprazolam may be habit-forming. Never share Xanax with another person, especially someone with a history of drug abuse or addiction. Keep the medication in a place where others cannot get to it.\n\nMisuse of habit-forming medicine can cause addiction, overdose, or death. Selling or giving away this medicine is against the law.\n\nDo not crush, chew, or break a Xanax extended-release tablet. Swallow the tablet whole.\n\nCall your doctor if this medicine seems to stop working as well in treating your panic or anxiety symptoms.\n\nDo not stop using Xanax suddenly, or you could have unpleasant withdrawal symptoms. Ask your doctor how to safely stop using this medicine.\n\nIf you use this medicine long-term, you may need frequent medical tests.\n\nStore Xanax at room temperature away from moisture and heat.\n\nKeep track of the amount of medicine used from each new bottle. Xanax is a drug of abuse and you should be aware if anyone is using your medicine improperly or without a prescription.', '2017-02-05 14:08:01'),
('Yellow snow', 'It is a great yellow thing that is edible', '2017-02-05 13:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`time`, `title`, `data`) VALUES
('2017-02-07 12:27:37', 'potato', 'potato BETTER BE WORKING'),
('2017-02-07 12:27:43', 'potato', 'potato BETTER BE WORKING'),
('2017-02-07 12:28:10', 'potato', 'potato BETTER BE WORKING'),
('2017-02-07 12:36:59', 'a', 'a'),
('2017-02-07 12:37:08', 'potato', 'cheap'),
('2017-02-07 14:00:43', 'news', 'I like news'),
('2017-02-07 15:33:24', 'hi guys', 'blah blahh blahhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `post_creator` varchar(16) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `topic_id`, `post_creator`, `post_content`, `post_date`) VALUES
(1, 2, 3, 'potato', 'All that we see or seems is but a dream within a dream.', '2017-02-03 14:46:59'),
(2, 1, 4, 'potato', 'Prozac is awesome.', '2017-02-03 14:59:20'),
(3, 1, 5, 'potato', 'Prozac is awesome.', '2017-02-03 14:59:58'),
(4, 2, 6, 'potato', 'Tiger, tiger burning bright.', '2017-02-03 20:33:49'),
(5, 2, 6, 'potato', 'Dope.', '2017-02-03 21:05:03'),
(6, 2, 6, 'potato', 'Dope.', '2017-02-03 21:07:51'),
(7, 2, 6, 'potato', 'Dope.', '2017-02-03 21:08:14'),
(8, 2, 6, 'potato', 'I like potato chips', '2017-02-05 09:55:32'),
(9, 2, 7, 'potato', 'Log in to Forum\r\n\r\nCreating login functionality\r\n\r\nYou are logged in a', '2017-02-05 10:40:06'),
(11, 2, 8, 'milselarch', 'for testing the forum', '2017-02-05 12:31:40'),
(12, 2, 6, 'milselarch', 'this website sucks dude', '2017-02-05 12:32:10'),
(13, 1, 9, 'potato', 'meh', '2017-02-05 13:28:18'),
(14, 1, 9, 'potato', 'ing out what he is reall', '2017-02-05 14:11:16'),
(15, 2, 6, 'potato', 'xx', '2017-02-05 14:36:29'),
(16, 2, 6, 'potato', '$db = new PDO("mysql:host=localhost;dbname=X_Med", "webuser", "password");\r\n$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line', '2017-02-05 14:37:14'),
(17, 2, 6, 'potato', 'sadsadasd', '2017-02-05 14:41:44'),
(18, 2, 6, 'potato', 'No description, website, or topics provided.', '2017-02-05 14:45:29'),
(19, 1, 9, 'Deunitato', 'Passing variables with data between pages using URL\r\nThere are different ways by which values of variables can be passed between pages. One of the ways is to use the URL to pass the values or data. Here the biggest advantage is we can pass data to a different site even running at different servers. Any scripting language like ASP, JSP, PHP or Perl running at receiving end can process and collect the value from the query string or from the URL.\r\n', '2017-02-05 14:46:43'),
(20, 2, 10, 'Deunitato', 's', '2017-02-05 15:05:19'),
(21, 2, 10, 'Deunitato', '', '2017-02-05 15:05:25'),
(22, 2, 10, 'Deunitato', '$cid = $_POST[''cid''];$cid = $_POST[''cid''];$cid = $_POST[''cid''];$cid = $_POST[''cid''];$cid = $_POST[''cid''];', '2017-02-05 15:05:34'),
(23, 2, 6, 'potato', ' the staff app got 4 components \r\n1. Menu - for restaurant owners to put in their menu which is optional for the restaurant owners. They can own self add in the name price and description of the food. So that when customers come, they can just show customers the menu through their iPad/ tablet etc \r\n2. Bill - is connected to the cash register. Restaurant owners can choose which table then press ', '2017-02-05 16:33:17'),
(24, 1, 4, 'Deunitato', 'GREETINGS,\r\nPermit me to inform you of my desire of going into business relationship with you. I got your contact from the International web site directory. I prayed over it and selected your name among other names due to itâ€™s esteeming nature and the recommendations given to me as a reputable and trust worthy person I can do business with and by the recommendations I must not hesitate to confide in you for this simple and sincere business.I am Wumi Abdul; the only Daughter of late Mr and Mrs George Abdul. My father was a very wealthy cocoa merchant in Abidjan,the economic capital of Ivory Coast before he was poisoned to death by his business associates on one of their outing to discus on a business deal. When my mother died on the 21st October 1984, my father took me and my younger brother HASSAN special because we are motherless. Before the death of my father on 30th June 2002 in a private hospital here in Abidjan. He secretly called me on his bedside and told me that he has a sum of $12.500.000 (Twelve Million, five hundred thousand dollars) left in a suspense account in a local Bank here in Abidjan, that he used my name as his first Daughter for the next of kin in deposit of the fund.He also explained to me that it was because of this wealth and some huge amount of money his business associates supposed to balance his from the deal they had that he was poisoned by his business associates, that I should seek for a God fearing foreign partner in a country of my choice where I will transfer this money and use it for investment purpose, (such as real estate management).\r\nSir, we are honourably seeking your assistance in the following ways.\r\n1) To provide a Bank account where this money would be transferred to.\r\n2) To serve as the guardian of this since I am a girl of 26 years.\r\nMoreover Sir, we are willing to offer you 15% of the sum as compensation for effort input after the successful transfer of this fund to your designate account overseas. please feel free to contact ,me via this email address\r\nwumi1000abdul@yahoo.comAnticipating to hear from you soon.Thanks and God Bless.\r\nBest regards.\r\nMiss Wumi Abdul\r\n\r\nPLEASE FOR PRIVATE AND SECURITY REASONS,REPLY ME VIA EMAIL:\r\nwumi1000abdul@yahoo.com', '2017-02-05 16:42:06'),
(25, 2, 6, 'potato', 'This sucks where my news databse', '2017-02-05 20:49:49'),
(26, 2, 6, 'blobuser', 'I know right', '2017-02-05 21:05:48'),
(27, 1, 9, 'blobuser', 'well this sucks\r\n', '2017-02-05 21:06:32'),
(28, 1, 4, 'potato', 'meh', '2017-02-05 21:25:39'),
(29, 2, 11, 'trump', 'Deporting people? Building walls? Making people pay for it? Thats what we are gonna discuss.. Everything should be all trump', '2017-02-05 21:32:02'),
(30, 2, 11, 'potato', 'Orange is the new black', '2017-02-05 22:29:13'),
(31, 2, 6, 'milselarch', 'OI I took time to work on the other stuff okay?\r\nBE GRATEFUL RUABBABAA', '2017-02-05 22:32:46'),
(32, 2, 6, 'potato', 'meh', '2017-02-06 16:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating` int(11) NOT NULL,
  `Username` varchar(16) NOT NULL,
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rating`, `Username`) VALUES
(5, 'a'),
(4, 'adasd'),
(5, 'blobuser'),
(5, 'Deunitato'),
(4, 'Hillary Clinton'),
(5, 'john'),
(3, 'kanna'),
(5, 'milselarch'),
(4, 'potato'),
(1, 'shimakaze'),
(4, 'Trump');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(4) NOT NULL,
  `topic_title` varchar(150) NOT NULL,
  `topic_creator` varchar(16) NOT NULL,
  `topic_last_user` varchar(16) NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_reply_date` datetime NOT NULL,
  `topic_views` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `topic_title`, `topic_creator`, `topic_last_user`, `topic_date`, `topic_reply_date`, `topic_views`) VALUES
(3, 2, 'Edgar Allen Poe', 'potato', 'potato', '2017-02-03 14:46:59', '2017-02-03 14:46:59', 18),
(4, 1, 'Medicines', 'potato', 'potato', '2017-02-03 14:59:20', '2017-02-05 21:25:39', 28),
(6, 2, 'William Blake', 'potato', 'potato', '2017-02-03 20:33:49', '2017-02-06 16:42:19', 92),
(7, 2, 'I like potatos', 'potato', 'potato', '2017-02-05 10:40:06', '2017-02-05 12:29:38', 13),
(8, 2, 'test', 'milselarch', '', '2017-02-05 12:31:40', '2017-02-05 12:31:40', 4),
(9, 1, 'do we like forums?', 'potato', 'blobuser', '2017-02-05 13:28:18', '2017-02-05 21:06:32', 46),
(10, 2, 's', 'Deunitato', 'Deunitato', '2017-02-05 15:05:19', '2017-02-05 15:05:34', 4),
(11, 2, 'Why we should make america great again', 'trump', 'potato', '2017-02-05 21:32:02', '2017-02-05 22:29:13', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `userType` varchar(64) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `name`, `email`, `address`, `userType`) VALUES
(1, 'Deunitato', 'meow', 'charlotte', 'charlotte.limwt@gmail.com', 'singapore', 'staff'),
(2, 'shimakaze', 'rip', 'meowcon', 'char@gmail.com', 'singapore', 'staff'),
(3, 'kanna', 'op', 'go', 'goodra@gmail.com', 'f', 'staff'),
(4, 'kingofthejungle', 'pop', 'kouhai', 'dw@gmail.com', 'lol', 'user'),
(5, 'milselarch', '111', 'milselarch', 'milselarch@gmail.com', 'potato', 'staff'),
(6, 'potato', 'potato', 'potato', 'potato@potato.com', 'potato ave', 'admin'),
(7, 'blobuser', 'blob', 'blob', 'blob@blob.com', 'blobland', 'user'),
(8, 'Trump', 'Trump', 'Donald Trump', 'trump@theDonald.com', 'white house', 'user'),
(9, 'hillary clinton', 'clinton', 'Hillary', 'hillary@hackableemail.com', 'jail', 'user'),
(10, 'adasd', '12345', 'charles', 'sdsad@gmail.com', 'sdadsa', 'user'),
(11, 'a', 'a', 'a', 'a@a.com', 'a', 'user'),
(12, 'john', 'hi', 'john', 'john@john.com', 'meh', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imagePaths`
--
ALTER TABLE `imagePaths`
  ADD CONSTRAINT `medicineImageConstraint` FOREIGN KEY (`name`) REFERENCES `medicine` (`name`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
