-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 02:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_art_gallery_database_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_work`
--

CREATE TABLE `art_work` (
  `ART_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_TITLE` varchar(50) NOT NULL,
  `ART_DESCRIPTION` mediumtext DEFAULT NULL,
  `ART_PRICE` int(11) NOT NULL,
  `ART_DATE` date NOT NULL,
  `ART_WIDTH` int(11) NOT NULL,
  `ART_HEIGHT` int(11) NOT NULL,
  `ART_THICKNESS` int(11) NOT NULL,
  `ART_CATEGORY` varchar(20) NOT NULL,
  `ART_MEDIA` varchar(20) NOT NULL,
  `ART_STATUS` varchar(20) NOT NULL,
  `art_stock` int(50) NOT NULL,
  `COMMENT_ID` int(11) DEFAULT NULL,
  `ART_IMAGEPATH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art_work`
--

INSERT INTO `art_work` (`ART_ID`, `USER_ID`, `ART_TITLE`, `ART_DESCRIPTION`, `ART_PRICE`, `ART_DATE`, `ART_WIDTH`, `ART_HEIGHT`, `ART_THICKNESS`, `ART_CATEGORY`, `ART_MEDIA`, `ART_STATUS`, `art_stock`, `COMMENT_ID`, `ART_IMAGEPATH`) VALUES
(15, 13, 'The Count of Monte Cristo', 'The Count of Monte Cristo', 2500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'AlexenderDumas_TheCountOfMonteCristo.jpg'),
(16, 13, 'TheThreeMusketeer', 'TheThreeMusketeer', 1500, '2023-06-05', 6, 9, 3, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'AlexenderDumas_TheThreeMusketeer.jpg'),
(17, 23, 'The Judge\'s House', 'The Judge\'s House', 1500, '2023-06-05', 6, 9, 3, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'BramStoke_TheJudgesHouse.jpg'),
(18, 23, 'Dracula', 'Dracula is a novel by Bram Stoker, published in 1897. An epistolary novel, the narrative is related through letters, diary entries, and newspaper articles. It has no single protagonist, but opens with solicitor Jonathan Harker taking a business trip to stay at the castle of a Transylvanian nobleman, Count Dracula', 370, '2023-06-05', 6, 9, 2, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'BramStoker_Dracula.jpg'),
(19, 23, 'Dracula\'s Guest and Other Weird Stories', 'Dracula\'s Guest and Other Weird Stories is a collection of short stories by Bram Stoker, first published in 1914, two years after Stoker\'s death, at the behest of his widow Florence Balcombe. The same collection has been issued under short titles including simply Dracula\'s Guest.', 300, '2023-06-05', 6, 9, 3, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'BramStoker_DraculasGuestAndOtherWeirdTales.jpg'),
(20, 24, 'Chain Of Gold', 'Chain Of Gold', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CassandraClare_ChainOfGold.jpg'),
(21, 24, 'Chain Of Iron', 'Chain Of Iron', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CassandraClare_ChainOfIron.jpg'),
(22, 24, 'Chain Of Thorns', 'Chain Of Thorns', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CassandraClare_ChainOfThorns.jpg'),
(23, 25, 'Great Expectations', 'Great Expectations', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CharlesDickens_GreatExpectations.jpg'),
(24, 25, 'Oliver Twist', 'Oliver Twist', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CharlesDickens_OliverTwist.jpg'),
(25, 25, 'The Mystery of Edwin DroodThe Mystery of Edwin Dro', 'The Mystery of Edwin Drood', 1400, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'CharlesDickens_TheMysteryOfEdwinDrood.jpg'),
(27, 26, 'The Fall of the House of Usher', 'The Fall of the House of Usher', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'EdgarAllanPoe_TheFallOfTheHouseOfUsher.jpg'),
(28, 26, 'The Murders in the Rue Morgue', 'The Murders in the Rue Morgue', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'EdgarAllanPoe_TheMurdersInTheRueMorgue.jpg'),
(29, 26, 'The Raven', 'The Raven', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'EdgarAllanPoe_TheRaven.jpg'),
(30, 27, 'Chapterhouse: Dune', 'Chapterhouse: Dune', 2500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_ChapterhouseDune.jpg'),
(31, 27, 'Children of Dune', 'Children of Dune', 2500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_ChildrenOfDune.jpg'),
(32, 27, 'Dune', 'Dune', 2500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_Dune.jpg'),
(33, 27, 'Dune Messiah', 'Dune Messiah', 2400, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_DuneMessiah.jpg'),
(34, 27, 'God Emperor of Dune', 'God Emperor of Dune', 2900, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_GodEmperorOfDune.jpg'),
(35, 27, 'Heretics Of Dune', 'Heretics Of Dune', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FrankHerbert_HereticsOfDune.jpg'),
(36, 28, 'The Gambler', 'The Gambler', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoevsky_TheGambler.png'),
(37, 28, 'The House Of The Dead', 'The House Of The Dead', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoevsky_TheHouseOfTheDead.jpg'),
(38, 28, 'The Idot', 'The Idot', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoevsky_TheIdot.jpg'),
(39, 28, 'Crime And Punishment', 'Crime And Punishment', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoyevsky_CrimeAndPunishment.jpg'),
(40, 28, 'Notes From Underground', 'Notes From Underground', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoyevsky_NotesFromUnderground.jpg'),
(41, 28, 'The Brothers Karamazov', 'The Brothers Karamazov', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'FyodorDostoyevsky_TheBrothersKaramazov.jpg'),
(42, 29, 'A Clash Of Kings', 'A Clash Of Kings', 25000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_AClashOfKings.jpg'),
(43, 29, 'A Dance With Dragons', 'A Dance With Dragons', 25000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_ADanceWithDragons.jpg'),
(44, 29, 'A Feast For Crows', 'A Feast For Crows', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_AFeastForCrows.jpg'),
(45, 29, 'A Game Of Thrones', 'A Game Of Thrones', 1900, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_AGameOfThrones.jpg'),
(46, 29, 'A Knight Of The Seven Kingdoms', 'A Knight Of The Seven Kingdoms', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_AKnightOfTheSevenKingdoms.jpeg'),
(47, 29, 'A Storm Of Swords', 'A Storm Of Swords', 2000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_AStormOfSwords.jpg'),
(48, 29, 'Fire & Blood', 'Fire & Blood', 2050, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GeorgeRRMartin_Fire_&_Blood.jpg'),
(51, 30, 'Animal Farm', 'Animal Farm', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GorgeOrwell_AnimalFarm.jpeg'),
(52, 30, '1984', '1984', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'GorgeOrwell_1984.jpg'),
(53, 31, 'Go Set A Watchman', 'Go Set A Watchman', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'HarperLee_GoSetAWatchman.jpg'),
(54, 31, 'To Kill A Mockingbird', 'To Kill A Mockingbird', 2500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'HarperLee_ToKillAMockingbird.jpg'),
(55, 32, 'Illiad And Odyssey', 'Illiad And Odyssey', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'Homer_IlliadAndOdyssey.jpg'),
(56, 33, 'Emma', 'Emma', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JaneAusten_Emma.jpg'),
(57, 33, 'Persuasion', 'Persuasion', 1500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JaneAusten_Persuasion.jpg'),
(58, 33, 'Pride And Prejudice', 'Pride And Prejudice', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JaneAusten_PrideAndPrejudice.jpg'),
(59, 34, 'Fantastic Beasts AndWhere To Find Them', 'Fantastic Beasts AndWhere To Find Them', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JKRowling_FantasticBeastsAndWhereToFindThem.jpg'),
(60, 34, 'Harry Potter', 'Harry Potter', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JKRowling_HarryPotter.jpg'),
(61, 34, 'The Ickabog', 'The Ickabog', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JKRowling_TheIckabog.jpg'),
(62, 35, 'The Fellowship Of The Ring', 'The Fellowship Of The Ring', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JRRTolkien_TheFellowshipOfTheRing.jpg'),
(63, 35, 'The Hobbit Part: 1', 'The Hobbit Part: 1', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JRRTolkien_TheHobbit_1.jpg'),
(64, 35, 'The Hobbit Part: 2', 'The Hobbit Part: 2', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JRRTolkien_TheHobbit_2.jpg'),
(65, 35, 'The Return Of The King', 'The Return Of The King', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JRRTolkien_TheReturnOfTheKing.jpg'),
(66, 35, 'The Two Towers', 'The Two Towers', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'JRRTolkien_TheTwoTowers.jpg'),
(67, 36, 'A Hunger Artist', 'A Hunger Artist', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'Kafka_AHungerArtist.png'),
(68, 36, 'Metamorphosis', 'Metamorphosis', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'Kafka_Metamorphosis.jpeg'),
(69, 36, 'The Castle', 'The Castle', 3500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'Kafka_TheCastle.jpg'),
(70, 37, 'Confession', 'Confession', 3000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'LeoTolstoy_Confession.png'),
(71, 37, 'Resurrection', 'Resurrection', 3800, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'LeoTolstoy_Resurrection.jpeg'),
(72, 37, 'War And Peace', 'War And Peace', 4500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'LeoTolstoy_WarAndPeace.jpg'),
(73, 38, 'Frankenstein', 'Frankenstein', 4500, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'MaryShelley_Frankenstein.jpg'),
(74, 39, 'Eleven Minutes', 'Eleven Minutes', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'PauloCoelho_ElevenMinutes.jpg'),
(75, 39, 'The Alchemist', 'The Alchemist', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'PauloCoelho_TheAlchemist.jpg'),
(76, 39, 'The Pilgrimage', 'The Pilgrimage', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'PauloCoelho_ThePilgrimage.jpg'),
(77, 40, 'Fahrenheit 451', 'Fahrenheit 451', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'RayBradbury_Fahrenheit451.png'),
(79, 43, 'Midnights Children', 'MidnightsChildren', 1000, '2023-06-05', 6, 9, 4, 'Painting', 'Airbrush', 'AVAILABLE', 10, NULL, 'SalmanRushdie_MidnightsChildren.jpg'),
(82, 45, 'Lord Of The Flies', 'Lord Of The Flies', 2500, '2023-06-05', 6, 9, 3, 'Painting', 'Airbrush', 'AVAILABLE', 1, NULL, 'WilliamGolding_LordOfTheFlies.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buy_transaction`
--

CREATE TABLE `buy_transaction` (
  `TRANSACTION_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `Courier_Name` varchar(50) NOT NULL,
  `Courier_Contact` bigint(20) NOT NULL,
  `ordered_date` date NOT NULL,
  `DELIVERY_DATE` date DEFAULT NULL,
  `ordered_no` int(10) NOT NULL,
  `total_price` int(50) NOT NULL,
  `shipping_area` varchar(50) NOT NULL,
  `shipping_municipal` varchar(50) NOT NULL,
  `shipping_province` varchar(50) NOT NULL,
  `shipping_zipcode` varchar(10) NOT NULL,
  `shipping_brgy` varchar(50) NOT NULL,
  `shipping_street` varchar(50) NOT NULL,
  `shipping_house_num` varchar(50) NOT NULL,
  `SHIPPING_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `COMMENT_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `COMMENT_DATE` date NOT NULL,
  `COMMENT_CONTENT` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RATING_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `ART_ID` int(11) NOT NULL,
  `RATING_VALUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `USER_FNAME` varchar(30) NOT NULL,
  `USER_MNAME` varchar(30) DEFAULT NULL,
  `USER_LNAME` varchar(30) NOT NULL,
  `USER_GENDER` varchar(10) NOT NULL,
  `USER_AGE` int(11) NOT NULL,
  `USER_BDAY` date NOT NULL,
  `USER_CONTACT` bigint(11) NOT NULL,
  `USER_MUNICIPAL` varchar(50) DEFAULT NULL,
  `USER_PROVINCE` varchar(50) DEFAULT NULL,
  `USER_ZIPCODE` varchar(10) DEFAULT NULL,
  `USER_BRGY` varchar(50) DEFAULT NULL,
  `USER_STREET` varchar(50) DEFAULT NULL,
  `USER_HOUSE_NUMBER` varchar(10) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `USER_TYPE` varchar(20) NOT NULL,
  `User_imagepath` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `username`, `password`, `USER_FNAME`, `USER_MNAME`, `USER_LNAME`, `USER_GENDER`, `USER_AGE`, `USER_BDAY`, `USER_CONTACT`, `USER_MUNICIPAL`, `USER_PROVINCE`, `USER_ZIPCODE`, `USER_BRGY`, `USER_STREET`, `USER_HOUSE_NUMBER`, `user_email`, `USER_TYPE`, `User_imagepath`) VALUES
(5, 'Tanzim', 'Tanzim', 'Tanzimul', '', 'Hasan', 'Male', 22, '2000-02-08', 9301959762, 'a', 'b', '1', '', '1', '10', 'tanzim@gmail.com', 'Admin', ''),
(13, 'dumas', 'dumas', 'Alexender', '', 'Dumas', 'Male', 0, '1802-07-24', 123456789, 'a', 'b', '1', '1', '1', '1', 'alexenderdumas@gmail.com', 'Artist', 'Alexander_Dumas_Père.jpg'),
(20, 'ar', '1234', 'Abdur', '', 'Rahman', 'Male', 0, '0000-00-00', 12987654, 'B', '1', '9999', 'k', '5', '5', 'ar@gmail.com', 'Customer', 'mushfiq.png'),
(21, 'ar4127', '1234', 'Abdur', '', 'Rahman', 'Male', 0, '0000-00-00', 23193429, '', 'Outside India', '', '', '', '', 'whoamiiammr.nobody@gmail.com', 'Customer', 'user-login-icon-14.png'),
(23, 'stoker', 'stoker', 'Bram', '', 'Stoker', 'Male', 0, '1847-11-08', 123456, '', '', '', '', '', '', 'bramstoker@gmail.com', 'Artist', 'BramStoker.jpg'),
(24, 'cassandra', 'clare', 'Cassandra', '', 'Clare', 'Male', 0, '0000-00-00', 12345, '', '', '', '', '', '', 'cassandraclare@gmail.com', 'Artist', 'CassandraClare.jpg'),
(25, 'dickens', 'dickens', 'Charles', '', ' Dickens', 'Male', 0, '0000-00-00', 1234356, '', '', '', '', '', '', 'charlesdickens@gmail.com', 'Artist', 'CharlesDickens.jpg'),
(26, 'poe', 'poe', 'Edger', 'Alan', 'Poe', 'Male', 0, '1809-01-19', 123456789, 'a', 'b', '1', '1', '1', '1', 'egderalanpoe@gmail.com', 'Artist', 'EdgerAlanPow.jpg'),
(27, 'herbert', 'herbert', 'Frank', '', 'Herbert', 'Male', 0, '1920-10-10', 123456789, 'a', 'b', '1', '1', '1', '1', 'frankherbert@gmail.com', 'Artist', 'FrankHerbert.jpg'),
(28, 'dostoevsky', 'dostoevsky', 'Fyodor', '', 'Dostoevsky', 'Male', 0, '1920-10-10', 123456789, 'a', 'b', '1', '1', '1', '1', 'fyodordostoevsky@gmail.com', 'Artist', 'FyodorDostoevsky.jpg'),
(29, 'grrm', 'grrm', 'George', 'R.R.', 'Martin', 'Male', 0, '1920-10-10', 123456789, 'a', 'b', '1', '1', '1', '1', 'g.r.r.martin@gmail.com', 'Artist', 'GeorgeRaymondRichardMartin.jpg'),
(30, 'orwell', 'orwell', 'George', '', 'Orwell', 'Male', 0, '1903-06-25', 123456789, 'a', 'b', '1', '1', '1', '1', 'georgeorwell@gmail.com', 'Artist', 'GeorgeOrwell.jpg'),
(31, 'harper', 'lee', 'Harper', '', 'Lee', 'Female', 0, '1926-04-28', 123456789, 'a', 'b', '1', '1', '1', '1', 'harperlee@gmail.com', 'Artist', 'HarperLee.jpg'),
(32, 'homer', 'homer', 'Homer', '', ' ', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'homer@gmail.com', 'Artist', 'Homer.jpg'),
(33, 'austen', 'austen', 'Jane', '', 'Austen', 'Female', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'janeausten@gmail.com', 'Artist', 'JaneAusten.jpg'),
(34, 'jkr', 'rowling', 'JK', '', 'Rowling', 'Female', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'jk.rowling@gmail.com', 'Artist', 'JKRowling.jpg'),
(35, 'jrrt', 'tolkien', 'JRR', '', 'Tolkien', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'jrr.tolkien@gmail.com', 'Artist', 'JRRTolkien.jpeg'),
(36, 'kafka', 'kafak', 'Franz', '', 'Kafka', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'franzkafka@gmail.com', 'Artist', 'FranzKafka.jpg'),
(37, 'tolstoy', 'tolstoy', 'Leo', '', 'Tolstoy', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'leotolstoy@gmail.com', 'Artist', 'LeoTolstoy.jpg'),
(38, 'shelley', 'shelley', 'Mary', '', 'Shelley', 'Female', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'maryshelley@gmail.com', 'Artist', 'MaryShelley.jpg'),
(39, 'coelho', 'coelho', 'Paulo', '', 'Coelho', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'paulocoelho@gmail.com', 'Artist', 'PauloCoelho.jpg'),
(40, 'bradbury', 'bradbury', 'Ray', '', 'Bradbury', 'Male', 0, '0000-00-00', 123456789, 'a', 'b', '1', '1', '1', '1', 'raybradbury@gmail.com', 'Artist', 'RayBradbury.jpg'),
(43, 'rushdie', 'rushdie', 'Salman', '', 'Rushdie', 'Male', 0, '0000-00-00', 12345, '', '', '', '', '', '', 'salmanrushdie@gmail.com', 'Artist', 'SalmanRushdie.jpg'),
(45, 'golding', 'golding', 'William', '', 'Golding', 'Male', 0, '0000-00-00', 1451223, '', '', '', '', '', '', 'williamgolding@gmail.com', 'Artist', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_work`
--
ALTER TABLE `art_work`
  ADD PRIMARY KEY (`ART_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `COMMENT_ID` (`COMMENT_ID`);

--
-- Indexes for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  ADD PRIMARY KEY (`TRANSACTION_ID`),
  ADD KEY `ART_ID` (`ART_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`COMMENT_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `ART_ID` (`ART_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RATING_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `ART_ID` (`ART_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_work`
--
ALTER TABLE `art_work`
  MODIFY `ART_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  MODIFY `TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RATING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art_work`
--
ALTER TABLE `art_work`
  ADD CONSTRAINT `art_work_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `art_work_ibfk_2` FOREIGN KEY (`COMMENT_ID`) REFERENCES `comment` (`COMMENT_ID`) ON DELETE CASCADE;

--
-- Constraints for table `buy_transaction`
--
ALTER TABLE `buy_transaction`
  ADD CONSTRAINT `buy_transaction_ibfk_1` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `buy_transaction_ibfk_2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ART_ID`) REFERENCES `art_work` (`ART_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
