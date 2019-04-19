-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2019 at 04:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toyavite_dbkistler`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `ExtractNumber` (`in_string` VARCHAR(50)) RETURNS INT(11) NO SQL
BEGIN
    DECLARE ctrNumber VARCHAR(50);
    DECLARE finNumber VARCHAR(50) DEFAULT '';
    DECLARE sChar VARCHAR(1);
    DECLARE inti INTEGER DEFAULT 1;
    IF LENGTH(in_string) > 0 THEN
        WHILE(inti <= LENGTH(in_string)) DO
            SET sChar = SUBSTRING(in_string, inti, 1);
            SET ctrNumber = FIND_IN_SET(sChar, '0,1,2,3,4,5,6,7,8,9'); 
            IF ctrNumber > 0 THEN
                SET finNumber = CONCAT(finNumber, sChar);
            END IF;
            SET inti = inti + 1;
        END WHILE;
        RETURN CAST(finNumber AS UNSIGNED);
    ELSE
        RETURN 0;
    END IF;    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `klr_applicationtype`
--

CREATE TABLE `klr_applicationtype` (
  `id` int(11) NOT NULL,
  `division` varchar(200) NOT NULL,
  `sbf` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_applicationtype`
--

INSERT INTO `klr_applicationtype` (`id`, `division`, `sbf`, `name`, `status`, `timestamp`) VALUES
(1, 'ART', '1100', '111', 1, '2018-03-14 19:51:41'),
(2, 'ART', '1100', '112', 1, '2018-03-14 19:51:41'),
(3, 'ART', '1100', '113', 1, '2018-03-14 19:51:41'),
(4, 'ART', '1100', '114', 1, '2018-03-14 19:51:41'),
(5, 'ART', '1200', '121', 1, '2018-03-14 19:51:41'),
(6, 'ART', '1200', '122', 1, '2018-03-14 19:51:41'),
(7, 'ART', '1300', '131', 1, '2018-03-14 19:51:41'),
(8, 'ART', '1300', '132', 1, '2018-03-14 19:51:41'),
(9, 'ART', '1300', '133', 1, '2018-03-14 19:51:41'),
(10, 'ART', '1300', '134', 1, '2018-03-14 19:51:41'),
(11, 'ART', '1400', '141', 1, '2018-03-14 19:51:41'),
(12, 'ART', '1400', '142', 1, '2018-03-14 19:51:41'),
(13, 'IPC', '2100', '211', 1, '2018-03-14 19:51:41'),
(14, 'IPC', '2100', '212', 1, '2018-03-14 19:51:41'),
(15, 'IPC', '2100', '213', 1, '2018-03-14 19:51:41'),
(16, 'IPC', '2200', '221', 1, '2018-03-14 19:51:41'),
(17, 'IPC', '2300', '231', 1, '2018-03-14 19:51:41'),
(18, 'IPC', '2300', '233', 1, '2018-03-14 19:51:41'),
(19, 'IPC', '2400', '244', 1, '2018-03-14 19:51:41'),
(20, 'IPC', '2400', '245', 1, '2018-03-14 19:51:41'),
(21, 'IPC', '2400', '246', 1, '2018-03-14 19:51:41'),
(22, 'IPC', '2400', '247', 1, '2018-03-14 19:51:41'),
(23, 'IPC', '2400', '248', 1, '2018-03-14 19:51:41'),
(24, 'IPC', '2400', '249', 1, '2018-03-14 19:51:41'),
(25, 'IPC', '2400', '250', 1, '2018-03-14 19:51:41'),
(26, 'IPC', '2400', '251', 1, '2018-03-14 19:51:41'),
(27, 'IPC', '2400', '252', 1, '2018-03-14 19:51:41'),
(28, 'IPC', '2400', '253', 1, '2018-03-14 19:51:41'),
(29, 'IPC', '2400', '254', 1, '2018-03-14 19:51:41'),
(30, 'IPC', '2700', '270', 1, '2018-03-14 19:51:41'),
(31, 'IPC', '2800', '281', 1, '2018-03-14 19:51:41'),
(32, 'IPC', '2800', '282', 1, '2018-03-14 19:51:41'),
(33, 'IPC', '2800', '283', 1, '2018-03-14 19:51:41'),
(34, 'IPC', '2800', '284', 1, '2018-03-14 19:51:41'),
(35, 'ST', '3100', '312', 1, '2018-03-14 19:51:41'),
(36, 'ST', '3100', '314', 1, '2018-03-14 19:51:41'),
(37, 'ST', '3100', '315', 1, '2018-03-14 19:51:41'),
(38, 'ST', '3200', '323', 1, '2018-03-14 19:51:41'),
(39, 'ST', '3200', '324', 1, '2018-03-14 19:51:41'),
(40, 'ST', '3200', '325', 1, '2018-03-14 19:51:41'),
(41, 'ST', '3200', '326', 1, '2018-03-14 19:51:41'),
(42, 'ST', '3200', '327', 1, '2018-03-14 19:51:41'),
(43, 'ST', '3300', '331', 1, '2018-03-14 19:51:41'),
(44, 'ST', '3300', '332', 1, '2018-03-14 19:51:41'),
(45, 'ST', '3300', '333', 1, '2018-03-14 19:51:41'),
(46, 'ST', '3400', '340', 1, '2018-03-14 19:51:41'),
(47, 'ST', '3500', '353', 1, '2018-03-14 19:51:41'),
(48, 'ST', '3700', '370', 1, '2018-03-14 19:51:41'),
(49, 'ST', '3900', '391', 1, '2018-03-14 19:51:41'),
(50, 'ST', '3900', '399', 1, '2018-03-14 19:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `klr_basic_info`
--

CREATE TABLE `klr_basic_info` (
  `id` int(11) NOT NULL,
  `institute_name` text,
  `address_line_one` text,
  `address_line_two` text,
  `address_line_three` text,
  `phone_one` text,
  `phone_two` text,
  `email_one` text,
  `email_two` text,
  `contact_person_one` text,
  `contact_person_two` text,
  `about_us` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_basic_info`
--

INSERT INTO `klr_basic_info` (`id`, `institute_name`, `address_line_one`, `address_line_two`, `address_line_three`, `phone_one`, `phone_two`, `email_one`, `email_two`, `contact_person_one`, `contact_person_two`, `about_us`) VALUES
(1, 'Some Institute Name', '47/58 Address line 1', 'Address line row', 'there', '1234567890', '212121212', 'mail@test.com', 'secondmail@test.com', 'Test person', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum pariatur fuga eveniet soluta aspernatur rem, nam voluptatibus voluptate voluptates sapiente, inventore. Voluptatem, maiores esse molestiae.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit.\r\nSaepe a minima quod iste libero rerum dicta!\r\nVoluptas obcaecati, iste porro fugit soluta consequuntur. Veritatis?\r\nIpsam deserunt numquam ad error rem unde, omnis.\r\nRepellat assumenda adipisci pariatur ipsam eos similique, explicabo.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quaerat harum facilis excepturi et? Mollitia!');

-- --------------------------------------------------------

--
-- Table structure for table `klr_customertype`
--

CREATE TABLE `klr_customertype` (
  `id` int(11) NOT NULL,
  `typenum` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_customertype`
--

INSERT INTO `klr_customertype` (`id`, `typenum`, `name`, `timestamp`) VALUES
(1, '1', 'Research', '2018-03-14 19:51:22'),
(2, '2', 'OEM', '2018-03-14 19:51:22'),
(3, '3', 'Production', '2018-03-14 19:51:22'),
(4, '4', 'Reseller', '2018-03-14 19:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `klr_forms`
--

CREATE TABLE `klr_forms` (
  `id` int(11) NOT NULL,
  `formJson` longtext NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_forms`
--

INSERT INTO `klr_forms` (`id`, `formJson`, `createdAt`, `updatedAt`) VALUES
(8, '{"text-1553945121104-preview":"","required":"on","description":"","placeholder":"","className":"form-control","name":"text-1553945121104","value":"","subtype":"text","maxlength":"","submit":""}', '2019-03-30 11:25:39', NULL),
(9, '{"text-1553945317583-preview":"","description":"","placeholder":"","className":"form-control","name":"text-1553945317583","value":"","subtype":"text","maxlength":"1","submit":""}', '2019-03-30 11:28:56', NULL),
(10, '{"subtype":"p","className":"form-control","select-1553946683664-preview":"option-2","description":"","placeholder":"","name":"select-1553946683664","select-1553946683664-option":"option-3","submit":""}', '2019-03-30 11:51:29', NULL),
(11, '{"subtype":"text","className":"form-control","text-1553946714839-preview":"","description":"","placeholder":"","name":"text-1553946714839","value":"","maxlength":"","submit":""}', '2019-03-30 11:51:57', NULL),
(12, '{"subtype":"button","className":"form-control","name":"date-1553948433514","value":"","checkbox-group-1553948432092-preview":["option-1"],"description":"","checkbox-group-1553948432092-option":"option-1","date-1553948433514-preview":"","placeholder":"","submit":""}', '2019-03-30 12:20:42', NULL),
(13, '{"text-1553950375875-preview":"","description":"","placeholder":"","className":"btn-default btn","name":"button-1553950380041","value":"","subtype":"button","maxlength":"","submit":""}', '2019-03-30 12:53:02', NULL),
(14, '{"text-1553950471189-preview":"","description":"","placeholder":"","className":"form-control","name":"text-1553950471189","value":"","subtype":"text","maxlength":"","submit":""}', '2019-03-30 12:54:33', NULL),
(15, '{"text-1553953225136-preview":"","description":"","placeholder":"","className":"form-control","name":"date-1553953238286","value":"","subtype":"text","maxlength":"","date-1553953238286-preview":"","submit":""}', '2019-03-30 13:40:48', NULL),
(16, '"[\\r\\n  {\\r\\n    \\"type\\": \\"checkbox-group\\",\\r\\n    \\"label\\": \\"Checkbox Group\\",\\r\\n    \\"name\\": \\"checkbox-group-1553955461577\\",\\r\\n    \\"values\\": [\\r\\n      {\\r\\n        \\"label\\": \\"Option 1\\",\\r\\n        \\"value\\": \\"option-1\\",\\r\\n        \\"selected\\": true\\r\\n      }\\r\\n    ]\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553955462151\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"header\\",\\r\\n    \\"subtype\\": \\"h1\\",\\r\\n    \\"label\\": \\"Header\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"number\\",\\r\\n    \\"label\\": \\"Number\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"number-1553955463807\\"\\r\\n  }\\r\\n]"', '2019-03-30 14:18:46', NULL),
(17, '"[\\r\\n  {\\r\\n    \\"type\\": \\"button\\",\\r\\n    \\"label\\": \\"Button\\",\\r\\n    \\"subtype\\": \\"button\\",\\r\\n    \\"className\\": \\"btn-default btn\\",\\r\\n    \\"name\\": \\"button-1553955626912\\",\\r\\n    \\"style\\": \\"default\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553955627505\\"\\r\\n  }\\r\\n]"', '2019-03-30 14:20:29', NULL),
(18, '"[\n  {\n    "type": "checkbox-group",\n    "label": "Checkbox Group",\n    "name": "checkbox-group-1553955719431",\n    "values": [\n      {\n        "label": "Option 1",\n        "value": "option-1",\n        "selected": true\n      }\n    ]\n  },\n  {\n    "type": "file",\n    "label": "File Upload",\n    "className": "form-control",\n    "name": "file-1553955720029",\n    "subtype": "file"\n  },\n  {\n    "type": "hidden",\n    "name": "hidden-1553955720613"\n  },\n  {\n    "type": "number",\n    "label": "Number",\n    "className": "form-control",\n    "name": "number-1553955721086"\n  }\n]"', '2019-03-30 14:22:02', NULL),
(19, '"[\\r\\n  {\\r\\n    \\"type\\": \\"checkbox-group\\",\\r\\n    \\"label\\": \\"Checkbox Group\\",\\r\\n    \\"name\\": \\"checkbox-group-1553955781077\\",\\r\\n    \\"values\\": [\\r\\n      {\\r\\n        \\"label\\": \\"Option 1\\",\\r\\n        \\"value\\": \\"option-1\\",\\r\\n        \\"selected\\": true\\r\\n      }\\r\\n    ]\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553955781704\\"\\r\\n  }\\r\\n]"', '2019-03-30 14:23:03', NULL),
(20, '"[\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553956982815\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"file\\",\\r\\n    \\"label\\": \\"File Upload\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"file-1553956983601\\",\\r\\n    \\"subtype\\": \\"file\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"number\\",\\r\\n    \\"label\\": \\"Number\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"number-1553956984897\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"paragraph\\",\\r\\n    \\"subtype\\": \\"p\\",\\r\\n    \\"label\\": \\"Paragraph\\"\\r\\n  }\\r\\n]"', '2019-03-30 14:43:07', NULL),
(21, '"[\\r\\n  {\\r\\n    \\"type\\": \\"hidden\\",\\r\\n    \\"name\\": \\"hidden-1553957522724\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"number\\",\\r\\n    \\"label\\": \\"Number\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"number-1553957523419\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"paragraph\\",\\r\\n    \\"subtype\\": \\"p\\",\\r\\n    \\"label\\": \\"Paragraph\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553957524680\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"checkbox-group\\",\\r\\n    \\"label\\": \\"Checkbox Group\\",\\r\\n    \\"name\\": \\"checkbox-group-1553957525352\\",\\r\\n    \\"values\\": [\\r\\n      {\\r\\n        \\"label\\": \\"Option 1\\",\\r\\n        \\"value\\": \\"option-1\\",\\r\\n        \\"selected\\": true\\r\\n      }\\r\\n    ]\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"button\\",\\r\\n    \\"label\\": \\"Button\\",\\r\\n    \\"subtype\\": \\"button\\",\\r\\n    \\"className\\": \\"btn-default btn\\",\\r\\n    \\"name\\": \\"button-1553957526121\\",\\r\\n    \\"style\\": \\"default\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"textarea\\",\\r\\n    \\"label\\": \\"Text Area\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"textarea-1553957527177\\",\\r\\n    \\"subtype\\": \\"textarea\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"text\\",\\r\\n    \\"label\\": \\"Text Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"text-1553957527981\\",\\r\\n    \\"subtype\\": \\"text\\"\\r\\n  }\\r\\n]"', '2019-03-30 14:52:09', NULL),
(22, '"[\\r\\n  {\\r\\n    \\"type\\": \\"date\\",\\r\\n    \\"label\\": \\"Date Field\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"date-1553958113259\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"file\\",\\r\\n    \\"label\\": \\"File Upload\\",\\r\\n    \\"className\\": \\"form-control\\",\\r\\n    \\"name\\": \\"file-1553958113804\\",\\r\\n    \\"subtype\\": \\"file\\"\\r\\n  },\\r\\n  {\\r\\n    \\"type\\": \\"header\\",\\r\\n    \\"subtype\\": \\"h1\\",\\r\\n    \\"label\\": \\"Header\\"\\r\\n  }\\r\\n]"', '2019-03-30 15:01:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klr_service_box`
--

CREATE TABLE `klr_service_box` (
  `id` int(11) NOT NULL,
  `box_head` text,
  `box_description` text,
  `is_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_service_box`
--

INSERT INTO `klr_service_box` (`id`, `box_head`, `box_description`, `is_active`) VALUES
(1, 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1),
(2, 'Tet3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 1),
(3, 'Test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klr_slider`
--

CREATE TABLE `klr_slider` (
  `id` int(11) NOT NULL,
  `image_link` text,
  `h_four` text,
  `h_two` text,
  `description` text,
  `link` text,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_slider`
--

INSERT INTO `klr_slider` (`id`, `image_link`, `h_four`, `h_two`, `description`, `link`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '1920X500-1.jpg', 'This is test slide ', 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 'https://google.in', 1, '2019-04-14 12:20:50', NULL),
(3, 'shutterstock_1251541876-2-1920x500.jpg', 'Heading 4', 'Heading 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet error eius reiciendis eum sint unde eveniet deserunt est debitis corporis temporibus recusandae accusamus.', 'https://google.in', 1, '2019-04-14 12:30:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `klr_user`
--

CREATE TABLE `klr_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `type` enum('A','U','C') NOT NULL COMMENT 'A->admin,U->user,C->client',
  `status` tinyint(1) NOT NULL,
  `registerdate` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klr_usermeta`
--

CREATE TABLE `klr_usermeta` (
  `id` int(11) NOT NULL,
  `metasourcekey` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `keyname` varchar(250) NOT NULL,
  `keyval` varchar(250) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_usermeta`
--

INSERT INTO `klr_usermeta` (`id`, `metasourcekey`, `userid`, `keyname`, `keyval`) VALUES
(1, 'adminmeta', 1, 'userfullname', 'vikas sharma'),
(2, 'clientmeta', 2, 'customername', 'SKF India ltd'),
(3, 'clientmeta', 2, 'customeremail', 'Snehal.Khurge@skf.com'),
(4, 'clientmeta', 2, 'billingaddress', 'Chichwad,Pune'),
(5, 'clientmeta', 2, 'billingaddress2', 'abcd'),
(6, 'clientmeta', 2, 'billingaddress3', ''),
(7, 'clientmeta', 2, 'billingcustomercity', 'Pune'),
(8, 'clientmeta', 2, 'billingcustomerstate', 'Maharashtra'),
(9, 'clientmeta', 2, 'billingcustomerzip', '411033'),
(10, 'clientmeta', 2, 'shippingaddress1', 'Chichwad,Pune'),
(11, 'clientmeta', 2, 'shippingaddress2', ''),
(12, 'clientmeta', 2, 'shippingaddress3', ''),
(13, 'clientmeta', 2, 'shippingcustomercity', 'Pune'),
(14, 'clientmeta', 2, 'shippingcustomerstate', 'Maharashtra'),
(15, 'clientmeta', 2, 'shippingcustomerzip', '411033'),
(16, 'clientmeta', 2, 'customercontactperson', 'Snehal Khurge'),
(17, 'clientmeta', 2, 'customercontactnumber', '+91 20 66112711'),
(18, 'clientmeta', 2, 'customerfaxnumber', ''),
(19, 'clientmeta', 2, 'customermobilenumber', ''),
(20, 'clientmeta', 2, 'customerfreightforwarder', ''),
(21, 'clientmeta', 3, 'customername', 'INA Bearings India Private Limited'),
(22, 'clientmeta', 3, 'customeremail', 'dalwasap@schaeffler.com'),
(23, 'clientmeta', 3, 'billingadda', 'Plot No. A-3'),
(24, 'clientmeta', 3, 'billingaddress2', 'Talegaon Industrial & Floriculture Park'),
(25, 'clientmeta', 3, 'billingaddress3', 'TALEGAON DHABADE, PUNE 410507'),
(26, 'clientmeta', 3, 'billingcustomercity', 'Pune'),
(27, 'clientmeta', 3, 'billingcustomerstate', 'Maharashtra'),
(28, 'clientmeta', 3, 'billingcustomerzip', '410507'),
(29, 'clientmeta', 3, 'shippingaddress1', 'Plot No. A-3'),
(30, 'clientmeta', 3, 'shippingaddress2', 'Talegaon Industrial & Floriculture Park'),
(31, 'clientmeta', 3, 'shippingaddress3', 'TALEGAON DHABADE,'),
(32, 'clientmeta', 3, 'shippingcustomercity', ' PUNE'),
(33, 'clientmeta', 3, 'shippingcustomerstate', 'Maharashtra'),
(34, 'clientmeta', 3, 'shippingcustomerzip', '410507'),
(35, 'clientmeta', 3, 'customercontactperson', 'Swapnil Dalwale.'),
(36, 'clientmeta', 3, 'customercontactnumber', '+91 2114 33 4462'),
(37, 'clientmeta', 3, 'customerfaxnumber', ''),
(38, 'clientmeta', 3, 'customermobilenumber', ''),
(39, 'clientmeta', 3, 'customerfreightforwarder', ''),
(40, 'clientmeta', 4, 'customername', 'Schaeffler India Limited'),
(41, 'clientmeta', 4, 'customeremail', 'bhattjge@schaeffler.com'),
(42, 'clientmeta', 4, 'billingadda', 'Plant 0296 - SMB Division'),
(43, 'clientmeta', 4, 'billingaddress2', 'VADODARA 390013'),
(44, 'clientmeta', 4, 'billingaddress3', 'abc'),
(45, 'clientmeta', 4, 'billingcustomercity', 'VADODARA'),
(46, 'clientmeta', 4, 'billingcustomerstate', 'Gujarat'),
(47, 'clientmeta', 4, 'billingcustomerzip', '390013'),
(48, 'clientmeta', 4, 'shippingaddress1', '(Plant 0296 - SMB Division)'),
(49, 'clientmeta', 4, 'shippingaddress2', 'VADODARA 390013,'),
(50, 'clientmeta', 4, 'shippingaddress3', ''),
(51, 'clientmeta', 4, 'shippingcustomercity', 'VADODARA'),
(52, 'clientmeta', 4, 'shippingcustomerstate', 'Gujarat'),
(53, 'clientmeta', 4, 'shippingcustomerzip', '390013'),
(54, 'clientmeta', 4, 'customercontactperson', 'Jogen Bhatt'),
(55, 'clientmeta', 4, 'customercontactnumber', '+91 265-6602958'),
(56, 'clientmeta', 4, 'customerfaxnumber', ''),
(57, 'clientmeta', 4, 'customermobilenumber', ''),
(58, 'clientmeta', 4, 'customerfreightforwarder', ''),
(59, 'clientmeta', 5, 'customername', 'Advanced Systems Laboratory'),
(60, 'clientmeta', 5, 'customeremail', 'headmmg.buildup@asl.drdo.in'),
(61, 'clientmeta', 5, 'billingadda', 'Defence Research & Development Organisation'),
(62, 'clientmeta', 5, 'billingaddress2', 'PO Kanchanbagh'),
(63, 'clientmeta', 5, 'billingaddress3', ''),
(64, 'clientmeta', 5, 'billingcustomercity', 'Hyderabad-'),
(65, 'clientmeta', 5, 'billingcustomerstate', 'AP'),
(66, 'clientmeta', 5, 'billingcustomerzip', '500058'),
(67, 'clientmeta', 5, 'shippingaddress1', 'Defence Research & Development Organisation'),
(68, 'clientmeta', 5, 'shippingaddress2', 'PO Kanchanbagh'),
(69, 'clientmeta', 5, 'shippingaddress3', ''),
(70, 'clientmeta', 5, 'shippingcustomercity', 'Hyderabad-'),
(71, 'clientmeta', 5, 'shippingcustomerstate', 'AP'),
(72, 'clientmeta', 5, 'shippingcustomerzip', '500058'),
(73, 'clientmeta', 5, 'customercontactperson', 'The Director,ASL'),
(74, 'clientmeta', 5, 'customercontactnumber', '''+91 40 24188075'),
(75, 'clientmeta', 5, 'customerfaxnumber', ''),
(76, 'clientmeta', 5, 'customermobilenumber', ''),
(77, 'clientmeta', 5, 'customerfreightforwarder', ''),
(78, 'clientmeta', 6, 'customername', 'TE Connectivity India Pvt Ltd'),
(79, 'clientmeta', 6, 'customeremail', 'divyani.bawake@te.com'),
(80, 'clientmeta', 6, 'billingadda', 'Survey No. 166/3, GUt No. 95,'),
(81, 'clientmeta', 6, 'billingaddress2', ''),
(82, 'clientmeta', 6, 'billingaddress3', ''),
(83, 'clientmeta', 6, 'billingcustomercity', ' PUNE'),
(84, 'clientmeta', 6, 'billingcustomerstate', 'Maharashtra'),
(85, 'clientmeta', 6, 'billingcustomerzip', '412207'),
(86, 'clientmeta', 6, 'shippingaddress1', ''),
(87, 'clientmeta', 6, 'shippingaddress2', ''),
(88, 'clientmeta', 6, 'shippingaddress3', ''),
(89, 'clientmeta', 6, 'shippingcustomercity', ' PUNE'),
(90, 'clientmeta', 6, 'shippingcustomerstate', 'Maharashtra'),
(91, 'clientmeta', 6, 'shippingcustomerzip', '412207'),
(92, 'clientmeta', 6, 'customercontactperson', 'Divyani Bawake'),
(93, 'clientmeta', 6, 'customercontactnumber', ''),
(94, 'clientmeta', 6, 'customerfaxnumber', ''),
(95, 'clientmeta', 6, 'customermobilenumber', '+91 9921001292'),
(96, 'clientmeta', 6, 'customerfreightforwarder', ''),
(97, 'clientmeta', 7, 'customername', 'KSPG Automotive India Pvt Ltd.'),
(98, 'clientmeta', 7, 'customeremail', 'deepak.sable@in.kspg.com'),
(99, 'clientmeta', 7, 'billingadda', 'Gat No 380, Village-Takwe Budruk,Taluka Maval'),
(100, 'clientmeta', 7, 'billingaddress2', ''),
(101, 'clientmeta', 7, 'billingaddress3', ''),
(102, 'clientmeta', 7, 'billingcustomercity', 'Pune'),
(103, 'clientmeta', 7, 'billingcustomerstate', 'Maharashtra'),
(104, 'clientmeta', 7, 'billingcustomerzip', '412106'),
(105, 'clientmeta', 7, 'shippingaddress1', 'Gat No 380, Village-Takwe Budruk,Taluka Maval'),
(106, 'clientmeta', 7, 'shippingaddress2', ''),
(107, 'clientmeta', 7, 'shippingaddress3', ''),
(108, 'clientmeta', 7, 'shippingcustomercity', 'Pune'),
(109, 'clientmeta', 7, 'shippingcustomerstate', 'Maharashtra'),
(110, 'clientmeta', 7, 'shippingcustomerzip', '412106'),
(111, 'clientmeta', 7, 'customercontactperson', 'Deepak Sable'),
(112, 'clientmeta', 7, 'customercontactnumber', '+91 2114-668 574'),
(113, 'clientmeta', 7, 'customerfaxnumber', '+91 2114-307 510'),
(114, 'clientmeta', 7, 'customermobilenumber', ''),
(115, 'clientmeta', 7, 'customerfreightforwarder', ''),
(116, 'clientmeta', 8, 'customername', 'Siemens Ltd.'),
(117, 'clientmeta', 8, 'customeremail', 'rajendra.pol@siemens.com'),
(118, 'clientmeta', 8, 'billingadda', 'KW SGR'),
(119, 'clientmeta', 8, 'billingaddress2', 'Thane-Belapur Road'),
(120, 'clientmeta', 8, 'billingaddress3', ''),
(121, 'clientmeta', 8, 'billingcustomercity', 'THANE'),
(122, 'clientmeta', 8, 'billingcustomerstate', 'Maharashtra'),
(123, 'clientmeta', 8, 'billingcustomerzip', '400601'),
(124, 'clientmeta', 8, 'shippingaddress1', 'KW SGR'),
(125, 'clientmeta', 8, 'shippingaddress2', 'Thane-Belapur Road'),
(126, 'clientmeta', 8, 'shippingaddress3', ''),
(127, 'clientmeta', 8, 'shippingcustomercity', 'THANE'),
(128, 'clientmeta', 8, 'shippingcustomerstate', 'Maharashtra'),
(129, 'clientmeta', 8, 'shippingcustomerzip', '400601'),
(130, 'clientmeta', 8, 'customercontactperson', 'Mr. Rajendra Pol'),
(131, 'clientmeta', 8, 'customercontactnumber', '+91 22 39663314'),
(132, 'clientmeta', 8, 'customerfaxnumber', '+91 22 39663707'),
(133, 'clientmeta', 8, 'customermobilenumber', ''),
(134, 'clientmeta', 8, 'customerfreightforwarder', ''),
(135, 'clientmeta', 9, 'customername', 'SANSERA ENGINEERING PVT LTD.'),
(136, 'clientmeta', 9, 'customeremail', 'purchase1_p2@sansera.in'),
(137, 'clientmeta', 9, 'billingadda', 'No.102, Jigani Link Road,'),
(138, 'clientmeta', 9, 'billingaddress2', ''),
(139, 'clientmeta', 9, 'billingaddress3', ''),
(140, 'clientmeta', 9, 'billingcustomercity', 'Bangalore'),
(141, 'clientmeta', 9, 'billingcustomerstate', 'Karnataka'),
(142, 'clientmeta', 9, 'billingcustomerzip', '560105'),
(143, 'clientmeta', 9, 'shippingaddress1', 'No.102, Jigani Link Road,'),
(144, 'clientmeta', 9, 'shippingaddress2', ''),
(145, 'clientmeta', 9, 'shippingaddress3', ''),
(146, 'clientmeta', 9, 'shippingcustomercity', 'Bangalore'),
(147, 'clientmeta', 9, 'shippingcustomerstate', 'Karnataka'),
(148, 'clientmeta', 9, 'shippingcustomerzip', '560105'),
(149, 'clientmeta', 9, 'customercontactperson', 'Mr. Janardhan'),
(150, 'clientmeta', 9, 'customercontactnumber', '+91 80 27839081'),
(151, 'clientmeta', 9, 'customerfaxnumber', '+91 80 27839309.'),
(152, 'clientmeta', 9, 'customermobilenumber', ''),
(153, 'clientmeta', 9, 'customerfreightforwarder', ''),
(154, 'clientmeta', 10, 'customername', 'Thyssenkrupp System Engineering India Pvt. Ltd.'),
(155, 'clientmeta', 10, 'customeremail', 'Mangesh.Bhosale@thyssenkrupp.com'),
(156, 'clientmeta', 10, 'billingadda', 'D1 Block, Plot No 18/1,'),
(157, 'clientmeta', 10, 'billingaddress2', ' Kinetic Innovation Park, MIDC Chinchwad'),
(158, 'clientmeta', 10, 'billingaddress3', ''),
(159, 'clientmeta', 10, 'billingcustomercity', 'Pune'),
(160, 'clientmeta', 10, 'billingcustomerstate', 'Maharashtra'),
(161, 'clientmeta', 10, 'billingcustomerzip', '411019'),
(162, 'clientmeta', 10, 'shippingaddress1', 'D1 Block, Plot No 18/1,'),
(163, 'clientmeta', 10, 'shippingaddress2', ' Kinetic Innovation Park, MIDC Chinchwad'),
(164, 'clientmeta', 10, 'shippingaddress3', ''),
(165, 'clientmeta', 10, 'shippingcustomercity', 'Pune'),
(166, 'clientmeta', 10, 'shippingcustomerstate', 'Maharashtra'),
(167, 'clientmeta', 10, 'shippingcustomerzip', '411019'),
(168, 'clientmeta', 10, 'customercontactperson', 'Mangesh Bhosale'),
(169, 'clientmeta', 10, 'customercontactnumber', '+91 2067307600'),
(170, 'clientmeta', 10, 'customerfaxnumber', ''),
(171, 'clientmeta', 10, 'customermobilenumber', ''),
(172, 'clientmeta', 10, 'customerfreightforwarder', ''),
(173, 'clientmeta', 11, 'customername', 'ABB India Limited'),
(174, 'clientmeta', 11, 'customeremail', 'elektromeasurements@vsnl.com'),
(175, 'clientmeta', 11, 'billingadda', 'B''LORE PLANT'),
(176, 'clientmeta', 11, 'billingaddress2', 'Plot No.4A,5 & 6,'),
(177, 'clientmeta', 11, 'billingaddress3', 'Peenya Industrial Area'),
(178, 'clientmeta', 11, 'billingcustomercity', 'Bangalore'),
(179, 'clientmeta', 11, 'billingcustomerstate', 'Karnataka'),
(180, 'clientmeta', 11, 'billingcustomerzip', '560058'),
(181, 'clientmeta', 11, 'shippingaddress1', 'B''LORE PLANT'),
(182, 'clientmeta', 11, 'shippingaddress2', 'Plot No.4A,5 & 6,'),
(183, 'clientmeta', 11, 'shippingaddress3', 'Peenya Industrial Area'),
(184, 'clientmeta', 11, 'shippingcustomercity', 'Bangalore'),
(185, 'clientmeta', 11, 'shippingcustomerstate', 'Karnataka'),
(186, 'clientmeta', 11, 'shippingcustomerzip', '560058'),
(187, 'clientmeta', 11, 'customercontactperson', 'Mr.V.Arun Kumar'),
(188, 'clientmeta', 11, 'customercontactnumber', '+91 80 2294 915054'),
(189, 'clientmeta', 11, 'customerfaxnumber', '+91 80 2294 9148'),
(190, 'clientmeta', 11, 'customermobilenumber', ''),
(191, 'clientmeta', 11, 'customerfreightforwarder', ''),
(192, 'clientmeta', 12, 'customername', 'FEV India Pvt. Ltd.'),
(193, 'clientmeta', 12, 'customeremail', 'fev-india@fev.com'),
(194, 'clientmeta', 12, 'billingadda', 'Plot No. A-21'),
(195, 'clientmeta', 12, 'billingaddress2', 'Talegaon MIDC Dist: Pune,Taluka-Maval'),
(196, 'clientmeta', 12, 'billingaddress3', ''),
(197, 'clientmeta', 12, 'billingcustomercity', 'Pune'),
(198, 'clientmeta', 12, 'billingcustomerstate', 'Maharashtra'),
(199, 'clientmeta', 12, 'billingcustomerzip', '410507'),
(200, 'clientmeta', 12, 'shippingaddress1', 'Talegaon MIDC Dist: Pune,Taluka-Maval'),
(201, 'clientmeta', 12, 'shippingaddress2', ''),
(202, 'clientmeta', 12, 'shippingaddress3', ''),
(203, 'clientmeta', 12, 'shippingcustomercity', 'Pune'),
(204, 'clientmeta', 12, 'shippingcustomerstate', 'Maharashtra'),
(205, 'clientmeta', 12, 'shippingcustomerzip', '410507'),
(206, 'clientmeta', 12, 'customercontactperson', 'Ms. Charu'),
(207, 'clientmeta', 12, 'customercontactnumber', '+91 2114666000'),
(208, 'clientmeta', 12, 'customerfaxnumber', ''),
(209, 'clientmeta', 12, 'customermobilenumber', ''),
(210, 'clientmeta', 12, 'customerfreightforwarder', ''),
(211, 'clientmeta', 13, 'customername', 'DELPHI-TVS Diesel Systems Limited'),
(212, 'clientmeta', 13, 'customeremail', 'tv.ped@delphitvs.com'),
(213, 'clientmeta', 13, 'billingadda', 'Sriperumbudur Taluk'),
(214, 'clientmeta', 13, 'billingaddress2', 'Kanchipuram District'),
(215, 'clientmeta', 13, 'billingaddress3', 'Mannur, Thodukadu Post'),
(216, 'clientmeta', 13, 'billingcustomercity', 'Kanchipuram'),
(217, 'clientmeta', 13, 'billingcustomerstate', 'TAMIL NADU'),
(218, 'clientmeta', 13, 'billingcustomerzip', '602105'),
(219, 'clientmeta', 13, 'shippingaddress1', 'Sriperumbudur Taluk'),
(220, 'clientmeta', 13, 'shippingaddress2', 'Kanchipuram District'),
(221, 'clientmeta', 13, 'shippingaddress3', 'Mannur, Thodukadu Post'),
(222, 'clientmeta', 13, 'shippingcustomercity', 'Kanchipuram'),
(223, 'clientmeta', 13, 'shippingcustomerstate', 'TAMIL NADU'),
(224, 'clientmeta', 13, 'shippingcustomerzip', '602105'),
(225, 'clientmeta', 13, 'customercontactperson', 'Tamilarasu.V-'),
(226, 'clientmeta', 13, 'customercontactnumber', '+91 44  2765 8661'),
(227, 'clientmeta', 13, 'customerfaxnumber', ''),
(228, 'clientmeta', 13, 'customermobilenumber', ''),
(229, 'clientmeta', 13, 'customerfreightforwarder', ''),
(230, 'clientmeta', 14, 'customername', 'Bosch Limited'),
(231, 'clientmeta', 14, 'customeremail', 'Sudhakara.S@in.bosch.com'),
(232, 'clientmeta', 14, 'billingadda', 'Dept:RBIN/BSV, No:42'),
(233, 'clientmeta', 14, 'billingaddress2', '2nd Phase , Sector 2, Bidadi Industrial area'),
(234, 'clientmeta', 14, 'billingaddress3', 'Ramanagara Taluk'),
(235, 'clientmeta', 14, 'billingcustomercity', 'Bangalore'),
(236, 'clientmeta', 14, 'billingcustomerstate', 'Karnataka'),
(237, 'clientmeta', 14, 'billingcustomerzip', '562109'),
(238, 'clientmeta', 14, 'shippingaddress1', 'Dept:BanP/CLP4, PBox No:3000'),
(239, 'clientmeta', 14, 'shippingaddress2', 'Hosur Road,'),
(240, 'clientmeta', 14, 'shippingaddress3', ' Adugodi post,'),
(241, 'clientmeta', 14, 'shippingcustomercity', 'Bangalore'),
(242, 'clientmeta', 14, 'shippingcustomerstate', 'Karnataka'),
(243, 'clientmeta', 14, 'shippingcustomerzip', '560030'),
(244, 'clientmeta', 14, 'customercontactperson', 'Sudhakara S'),
(245, 'clientmeta', 14, 'customercontactnumber', '+91 97391-36703'),
(246, 'clientmeta', 14, 'customerfaxnumber', ''),
(247, 'clientmeta', 14, 'customermobilenumber', ''),
(248, 'clientmeta', 14, 'customerfreightforwarder', ''),
(249, 'clientmeta', 15, 'customername', 'Mekhos Technology Services Pvt Ltd'),
(250, 'clientmeta', 15, 'customeremail', 'purchase@mekhos.in'),
(251, 'clientmeta', 15, 'billingadda', '#199/1,Survey No 57/3'),
(252, 'clientmeta', 15, 'billingaddress2', 'Off Hosur Road,Garvebhavipalya'),
(253, 'clientmeta', 15, 'billingaddress3', 'Hongasandra Road'),
(254, 'clientmeta', 15, 'billingcustomercity', 'Bangalore'),
(255, 'clientmeta', 15, 'billingcustomerstate', 'Karnataka'),
(256, 'clientmeta', 15, 'billingcustomerzip', '560068'),
(257, 'clientmeta', 15, 'shippingaddress1', 'purchase@mekhos.in'),
(258, 'clientmeta', 15, 'shippingaddress2', '#199/1,Survey No 57/3'),
(259, 'clientmeta', 15, 'shippingaddress3', 'Off Hosur Road,Garvebhavipalya, Hongasandra Road'),
(260, 'clientmeta', 15, 'shippingcustomercity', 'Bangalore'),
(261, 'clientmeta', 15, 'shippingcustomerstate', 'Karnataka'),
(262, 'clientmeta', 15, 'shippingcustomerzip', '560068'),
(263, 'clientmeta', 15, 'customercontactperson', 'Silambarasan. M'),
(264, 'clientmeta', 15, 'customercontactnumber', '+91 9844446792'),
(265, 'clientmeta', 15, 'customerfaxnumber', '+91'),
(266, 'clientmeta', 15, 'customermobilenumber', ''),
(267, 'clientmeta', 15, 'customerfreightforwarder', ''),
(268, 'clientmeta', 16, 'customername', 'Mekhos Technology Services Pvt Ltd'),
(269, 'clientmeta', 16, 'customeremail', 'purchase@mekhos.in'),
(270, 'clientmeta', 16, 'billingadda', '#199/1,Survey No 57/3'),
(271, 'clientmeta', 16, 'billingaddress2', 'Off Hosur Road,Garvebhavipalya'),
(272, 'clientmeta', 16, 'billingaddress3', 'Hongasandra Road'),
(273, 'clientmeta', 16, 'billingcustomercity', 'Bangalore'),
(274, 'clientmeta', 16, 'billingcustomerstate', 'Karnataka'),
(275, 'clientmeta', 16, 'billingcustomerzip', '560068'),
(276, 'clientmeta', 16, 'shippingaddress1', 'purchase@mekhos.in'),
(277, 'clientmeta', 16, 'shippingaddress2', '#199/1,Survey No 57/3'),
(278, 'clientmeta', 16, 'shippingaddress3', 'Off Hosur Road,Garvebhavipalya, Hongasandra Road'),
(279, 'clientmeta', 16, 'shippingcustomercity', 'Bangalore'),
(280, 'clientmeta', 16, 'shippingcustomerstate', 'Karnataka'),
(281, 'clientmeta', 16, 'shippingcustomerzip', '560068'),
(282, 'clientmeta', 16, 'customercontactperson', 'Silambarasan. M'),
(283, 'clientmeta', 16, 'customercontactnumber', '+91 9844446792'),
(284, 'clientmeta', 16, 'customerfaxnumber', '+91'),
(285, 'clientmeta', 16, 'customermobilenumber', ''),
(286, 'clientmeta', 16, 'customerfreightforwarder', ''),
(287, 'clientmeta', 17, 'customername', 'Mekhos Technology Services Pvt Ltd'),
(288, 'clientmeta', 17, 'customeremail', 'purchase@mekhos.in'),
(289, 'clientmeta', 17, 'billingadda', '#199/1,Survey No 57/3'),
(290, 'clientmeta', 17, 'billingaddress2', 'Off Hosur Road,Garvebhavipalya'),
(291, 'clientmeta', 17, 'billingaddress3', 'Hongasandra Road'),
(292, 'clientmeta', 17, 'billingcustomercity', 'Bangalore'),
(293, 'clientmeta', 17, 'billingcustomerstate', 'Karnataka'),
(294, 'clientmeta', 17, 'billingcustomerzip', '560068'),
(295, 'clientmeta', 17, 'shippingaddress1', 'purchase@mekhos.in'),
(296, 'clientmeta', 17, 'shippingaddress2', '#199/1,Survey No 57/3'),
(297, 'clientmeta', 17, 'shippingaddress3', 'Off Hosur Road,Garvebhavipalya, Hongasandra Road'),
(298, 'clientmeta', 17, 'shippingcustomercity', 'Bangalore'),
(299, 'clientmeta', 17, 'shippingcustomerstate', 'Karnataka'),
(300, 'clientmeta', 17, 'shippingcustomerzip', '560068'),
(301, 'clientmeta', 17, 'customercontactperson', 'Silambarasan. M'),
(302, 'clientmeta', 17, 'customercontactnumber', '+91 9844446792'),
(303, 'clientmeta', 17, 'customerfaxnumber', '+91'),
(304, 'clientmeta', 17, 'customermobilenumber', ''),
(305, 'clientmeta', 17, 'customerfreightforwarder', ''),
(306, 'clientmeta', 18, 'customername', 'Vellore Institute of Technology (VIT),'),
(307, 'clientmeta', 18, 'customeremail', 'k.revathi@vit.ac.in'),
(308, 'clientmeta', 18, 'billingadda', 'KATPADI - THIRUVALAM ROAD'),
(309, 'clientmeta', 18, 'billingaddress2', ''),
(310, 'clientmeta', 18, 'billingaddress3', ''),
(311, 'clientmeta', 18, 'billingcustomercity', 'VELLORE'),
(312, 'clientmeta', 18, 'billingcustomerstate', 'TAMILNADU'),
(313, 'clientmeta', 18, 'billingcustomerzip', '632014'),
(314, 'clientmeta', 18, 'shippingaddress1', 'KATPADI - THIRUVALAM ROAD'),
(315, 'clientmeta', 18, 'shippingaddress2', ''),
(316, 'clientmeta', 18, 'shippingaddress3', ''),
(317, 'clientmeta', 18, 'shippingcustomercity', 'VELLORE'),
(318, 'clientmeta', 18, 'shippingcustomerstate', 'TAMILNADU'),
(319, 'clientmeta', 18, 'shippingcustomerzip', '632014'),
(320, 'clientmeta', 18, 'customercontactperson', 'Revathi K'),
(321, 'clientmeta', 18, 'customercontactnumber', '+91 416 2202176'),
(322, 'clientmeta', 18, 'customerfaxnumber', ''),
(323, 'clientmeta', 18, 'customermobilenumber', ''),
(324, 'clientmeta', 18, 'customerfreightforwarder', ''),
(325, 'clientmeta', 19, 'customername', 'TVS Motor Company Limited'),
(326, 'clientmeta', 19, 'customeremail', 'V.Anand@tvsmotor.com'),
(327, 'clientmeta', 19, 'billingadda', 'P.B.No.4,'),
(328, 'clientmeta', 19, 'billingaddress2', 'HARITA'),
(329, 'clientmeta', 19, 'billingaddress3', ''),
(330, 'clientmeta', 19, 'billingcustomercity', 'Hosur'),
(331, 'clientmeta', 19, 'billingcustomerstate', 'Tamil Nadu'),
(332, 'clientmeta', 19, 'billingcustomerzip', '635109'),
(333, 'clientmeta', 19, 'shippingaddress1', 'P.B.No.4,'),
(334, 'clientmeta', 19, 'shippingaddress2', 'HARITA'),
(335, 'clientmeta', 19, 'shippingaddress3', ''),
(336, 'clientmeta', 19, 'shippingcustomercity', 'Hosur'),
(337, 'clientmeta', 19, 'shippingcustomerstate', 'Tamil Nadu'),
(338, 'clientmeta', 19, 'shippingcustomerzip', '635109'),
(339, 'clientmeta', 19, 'customercontactperson', 'G Chandramouli'),
(340, 'clientmeta', 19, 'customercontactnumber', '+91 4344 276780'),
(341, 'clientmeta', 19, 'customerfaxnumber', '+91 4344 277322'),
(342, 'clientmeta', 19, 'customermobilenumber', ''),
(343, 'clientmeta', 19, 'customerfreightforwarder', 'TNT Courier'),
(344, 'clientmeta', 20, 'customername', 'CEAT Limited - Halol'),
(345, 'clientmeta', 20, 'customeremail', 'halol.purchase8@ceat.com'),
(346, 'clientmeta', 20, 'billingadda', 'VILLAGE - MUVALA, TALUKA - HALOL'),
(347, 'clientmeta', 20, 'billingaddress2', 'At&Po.GetMuwala,'),
(348, 'clientmeta', 20, 'billingaddress3', 'Ta-Halol,Panchmahal'),
(349, 'clientmeta', 20, 'billingcustomercity', 'Baroda'),
(350, 'clientmeta', 20, 'billingcustomerstate', 'Gujarat'),
(351, 'clientmeta', 20, 'billingcustomerzip', '389350'),
(352, 'clientmeta', 20, 'shippingaddress1', 'Village - Gat Muvala, Taluka - Halol ,'),
(353, 'clientmeta', 20, 'shippingaddress2', 'District - Panchmahal ,'),
(354, 'clientmeta', 20, 'shippingaddress3', ''),
(355, 'clientmeta', 20, 'shippingcustomercity', 'Baroda'),
(356, 'clientmeta', 20, 'shippingcustomerstate', 'Gujarat'),
(357, 'clientmeta', 20, 'shippingcustomerzip', '389350'),
(358, 'clientmeta', 20, 'customercontactperson', 'Vaibhav Shah'),
(359, 'clientmeta', 20, 'customercontactnumber', '+91 22 24930621'),
(360, 'clientmeta', 20, 'customerfaxnumber', ''),
(361, 'clientmeta', 20, 'customermobilenumber', ''),
(362, 'clientmeta', 20, 'customerfreightforwarder', ''),
(363, 'clientmeta', 21, 'customername', 'Molex India Private Ltd'),
(364, 'clientmeta', 21, 'customeremail', 'Maheshkumar.Hiremath@molex.com'),
(365, 'clientmeta', 21, 'billingadda', 'No 6A,'),
(366, 'clientmeta', 21, 'billingaddress2', 'Sadaramangala Industrial Area,'),
(367, 'clientmeta', 21, 'billingaddress3', 'Kadugodi, Whitefield,'),
(368, 'clientmeta', 21, 'billingcustomercity', 'Bangalore'),
(369, 'clientmeta', 21, 'billingcustomerstate', 'Karnataka'),
(370, 'clientmeta', 21, 'billingcustomerzip', '560067'),
(371, 'clientmeta', 21, 'shippingaddress1', 'No 6A,'),
(372, 'clientmeta', 21, 'shippingaddress2', 'Sadaramangala Industrial Area,'),
(373, 'clientmeta', 21, 'shippingaddress3', 'Kadugodi, Whitefield,'),
(374, 'clientmeta', 21, 'shippingcustomercity', 'Bangalore'),
(375, 'clientmeta', 21, 'shippingcustomerstate', 'Karnataka'),
(376, 'clientmeta', 21, 'shippingcustomerzip', '560067'),
(377, 'clientmeta', 21, 'customercontactperson', 'Mahesh Kumar'),
(378, 'clientmeta', 21, 'customercontactnumber', '+91 80 41293500'),
(379, 'clientmeta', 21, 'customerfaxnumber', '+91 80 41293602'),
(380, 'clientmeta', 21, 'customermobilenumber', ''),
(381, 'clientmeta', 21, 'customerfreightforwarder', ''),
(382, 'clientmeta', 22, 'customername', 'PRECISION AUTOMATION & ROBOTICS INDIA LIMITED'),
(383, 'clientmeta', 22, 'customeremail', 'pramodd@parirobotics.com'),
(384, 'clientmeta', 22, 'billingadda', 'Gat No. 463A, 463B, 464,'),
(385, 'clientmeta', 22, 'billingaddress2', 'Village Dhangarwadi, (Shirwal),Off Pune Satara Highway'),
(386, 'clientmeta', 22, 'billingaddress3', 'Dist. Satara, Taluka - Khandala,'),
(387, 'clientmeta', 22, 'billingcustomercity', 'Shirwal'),
(388, 'clientmeta', 22, 'billingcustomerstate', 'Maharashtra'),
(389, 'clientmeta', 22, 'billingcustomerzip', '412801'),
(390, 'clientmeta', 22, 'shippingaddress1', 'Gat No. 463A, 463B, 464,'),
(391, 'clientmeta', 22, 'shippingaddress2', 'Village Dhangarwadi, (Shirwal),Off Pune Satara Highway'),
(392, 'clientmeta', 22, 'shippingaddress3', 'Dist. Satara, Taluka - Khandala,'),
(393, 'clientmeta', 22, 'shippingcustomercity', 'Shirwal'),
(394, 'clientmeta', 22, 'shippingcustomerstate', 'Maharashtra'),
(395, 'clientmeta', 22, 'shippingcustomerzip', '412801'),
(396, 'clientmeta', 22, 'customercontactperson', 'Pramod Deshpande'),
(397, 'clientmeta', 22, 'customercontactnumber', '+91 2169 246300'),
(398, 'clientmeta', 22, 'customerfaxnumber', ''),
(399, 'clientmeta', 22, 'customermobilenumber', ''),
(400, 'clientmeta', 22, 'customerfreightforwarder', ''),
(401, 'clientmeta', 23, 'customername', 'JTEKT INDIA LIMITED'),
(402, 'clientmeta', 23, 'customeremail', 'vikas.jadhav@jtekt.co.in'),
(403, 'clientmeta', 23, 'billingadda', '38/6 Delhi Jaipur Highway'),
(404, 'clientmeta', 23, 'billingaddress2', 'P.Box No 18,'),
(405, 'clientmeta', 23, 'billingaddress3', ''),
(406, 'clientmeta', 23, 'billingcustomercity', 'Gurugram'),
(407, 'clientmeta', 23, 'billingcustomerstate', 'Haryaya'),
(408, 'clientmeta', 23, 'billingcustomerzip', '122001'),
(409, 'clientmeta', 23, 'shippingaddress1', '38/6 Delhi Jaipur Highway'),
(410, 'clientmeta', 23, 'shippingaddress2', 'P.Box No 18,'),
(411, 'clientmeta', 23, 'shippingaddress3', ''),
(412, 'clientmeta', 23, 'shippingcustomercity', 'Gurugram'),
(413, 'clientmeta', 23, 'shippingcustomerstate', 'Haryaya'),
(414, 'clientmeta', 23, 'shippingcustomerzip', '122001'),
(415, 'clientmeta', 23, 'customercontactperson', 'Vikas Jadhav'),
(416, 'clientmeta', 23, 'customercontactnumber', '+91 124 468 5000'),
(417, 'clientmeta', 23, 'customerfaxnumber', ''),
(418, 'clientmeta', 23, 'customermobilenumber', '+91 9953488946'),
(419, 'clientmeta', 23, 'customerfreightforwarder', ''),
(420, 'clientmeta', 24, 'customername', 'HCL TECHNOLOGIES LIMITED'),
(421, 'clientmeta', 24, 'customeremail', ''),
(422, 'clientmeta', 24, 'billingadda', 'SEZ Unit-I, SDB/Tower-1 ,'),
(423, 'clientmeta', 24, 'billingaddress2', 'Ground - 3rd Floor, Plot No 129'),
(424, 'clientmeta', 24, 'billingaddress3', 'Jigani Industrial Area, Attibele Taluk,'),
(425, 'clientmeta', 24, 'billingcustomercity', 'Bangalore'),
(426, 'clientmeta', 24, 'billingcustomerstate', 'Karnataka'),
(427, 'clientmeta', 24, 'billingcustomerzip', '562106'),
(428, 'clientmeta', 24, 'shippingaddress1', 'SEZ Unit-I, SDB/Tower-1 ,'),
(429, 'clientmeta', 24, 'shippingaddress2', 'Ground - 3rd Floor, Plot No 129'),
(430, 'clientmeta', 24, 'shippingaddress3', 'Jigani Industrial Area, Attibele Taluk,'),
(431, 'clientmeta', 24, 'shippingcustomercity', 'Bangalore'),
(432, 'clientmeta', 24, 'shippingcustomerstate', 'Karnataka'),
(433, 'clientmeta', 24, 'shippingcustomerzip', '562106'),
(434, 'clientmeta', 24, 'customercontactperson', 'RANGARADDI HOSAMANI'),
(435, 'clientmeta', 24, 'customercontactnumber', ''),
(436, 'clientmeta', 24, 'customerfaxnumber', ''),
(437, 'clientmeta', 24, 'customermobilenumber', ''),
(438, 'clientmeta', 24, 'customerfreightforwarder', ''),
(439, 'clientmeta', 25, 'customername', 'FORD INDIA PRIVATE LIMITED'),
(440, 'clientmeta', 25, 'customeremail', 'sashwins@ford.com'),
(441, 'clientmeta', 25, 'billingadda', 'MARAIMALAI NAGAR'),
(442, 'clientmeta', 25, 'billingaddress2', 'VIA S.P .KOIL POST 1'),
(443, 'clientmeta', 25, 'billingaddress3', ''),
(444, 'clientmeta', 25, 'billingcustomercity', 'CHENGALPATTU'),
(445, 'clientmeta', 25, 'billingcustomerstate', 'Tamil Nadu'),
(446, 'clientmeta', 25, 'billingcustomerzip', '603204'),
(447, 'clientmeta', 25, 'shippingaddress1', 'ATTN: POWERTRAIN STORES - T31'),
(448, 'clientmeta', 25, 'shippingaddress2', 'S.P.KOIL POST,GST ROAD'),
(449, 'clientmeta', 25, 'shippingaddress3', 'MARAIMALAR NAGAR'),
(450, 'clientmeta', 25, 'shippingcustomercity', 'CHENGALPATTU'),
(451, 'clientmeta', 25, 'shippingcustomerstate', 'Tamil Nadu'),
(452, 'clientmeta', 25, 'shippingcustomerzip', '603204'),
(453, 'clientmeta', 25, 'customercontactperson', 'Ashwin Sathyam'),
(454, 'clientmeta', 25, 'customercontactnumber', '044-66107817'),
(455, 'clientmeta', 25, 'customerfaxnumber', ''),
(456, 'clientmeta', 25, 'customermobilenumber', ''),
(457, 'clientmeta', 25, 'customerfreightforwarder', ''),
(458, 'clientmeta', 26, 'customername', 'Robert Bosch Engineering and Business Solutions Pvt. Ltd.'),
(459, 'clientmeta', 26, 'customeremail', 'Bharathi.Babu@in.bosch.com'),
(460, 'clientmeta', 26, 'billingadda', '123 Industrial Layout'),
(461, 'clientmeta', 26, 'billingaddress2', 'Hosur Road,'),
(462, 'clientmeta', 26, 'billingaddress3', 'koramangla'),
(463, 'clientmeta', 26, 'billingcustomercity', 'Bangalore'),
(464, 'clientmeta', 26, 'billingcustomerstate', 'Karnataka'),
(465, 'clientmeta', 26, 'billingcustomerzip', '560095'),
(466, 'clientmeta', 26, 'shippingaddress1', 'Ban 601,602'),
(467, 'clientmeta', 26, 'shippingaddress2', 'PO Box No 3000,'),
(468, 'clientmeta', 26, 'shippingaddress3', 'Hosur Road'),
(469, 'clientmeta', 26, 'shippingcustomercity', 'Bangalore'),
(470, 'clientmeta', 26, 'shippingcustomerstate', 'Karnataka'),
(471, 'clientmeta', 26, 'shippingcustomerzip', '560095'),
(472, 'clientmeta', 26, 'customercontactperson', 'Mr.Bharathi'),
(473, 'clientmeta', 26, 'customercontactnumber', '+91 80 6657-1144'),
(474, 'clientmeta', 26, 'customerfaxnumber', ''),
(475, 'clientmeta', 26, 'customermobilenumber', ''),
(476, 'clientmeta', 26, 'customerfreightforwarder', ''),
(477, 'clientmeta', 27, 'customername', 'Helvoet Rubber & Plastic Technologies India Pvt Ltd (DTA)'),
(478, 'clientmeta', 27, 'customeremail', 'mangesh.garge@helvoet.nl'),
(479, 'clientmeta', 27, 'billingadda', 'Loni Kalbhor'),
(480, 'clientmeta', 27, 'billingaddress2', 'Near Railway Station'),
(481, 'clientmeta', 27, 'billingaddress3', ''),
(482, 'clientmeta', 27, 'billingcustomercity', 'Pune'),
(483, 'clientmeta', 27, 'billingcustomerstate', 'Maharashtra'),
(484, 'clientmeta', 27, 'billingcustomerzip', '412201'),
(485, 'clientmeta', 27, 'shippingaddress1', 'Loni Kalbhor'),
(486, 'clientmeta', 27, 'shippingaddress2', 'Near Railway Station'),
(487, 'clientmeta', 27, 'shippingaddress3', ''),
(488, 'clientmeta', 27, 'shippingcustomercity', 'Pune'),
(489, 'clientmeta', 27, 'shippingcustomerstate', 'Maharashtra'),
(490, 'clientmeta', 27, 'shippingcustomerzip', '412201'),
(491, 'clientmeta', 27, 'customercontactperson', 'Mangesh Garge'),
(492, 'clientmeta', 27, 'customercontactnumber', '+91 20 39284000'),
(493, 'clientmeta', 27, 'customerfaxnumber', '+91 20 30284404'),
(494, 'clientmeta', 27, 'customermobilenumber', '+91 9850038703'),
(495, 'clientmeta', 27, 'customerfreightforwarder', ''),
(496, 'clientmeta', 28, 'customername', 'Dynamc Test and Measurement Systems'),
(497, 'clientmeta', 28, 'customeremail', 'sivakumar@dynamic-tm.com'),
(498, 'clientmeta', 28, 'billingadda', 'First Floor,New No. 5\r\nOld No. 3,7th Street\r\n\r\n'),
(499, 'clientmeta', 28, 'billingaddress2', 'First Floor,New No. 5\r\nOld No. 3,7th Street'),
(500, 'clientmeta', 28, 'billingaddress3', 'Sourashtra Nagar,Choolaimedu'),
(501, 'clientmeta', 28, 'billingcustomercity', 'Chennai'),
(502, 'clientmeta', 28, 'billingcustomerstate', 'Tamil Nadu'),
(503, 'clientmeta', 28, 'billingcustomerzip', '600094'),
(504, 'clientmeta', 28, 'shippingaddress1', 'First Floor,New No. 5\r\nOld No. 3,7th Street\r\n\r\n'),
(505, 'clientmeta', 28, 'shippingaddress2', 'First Floor,New No. 5\r\nOld No. 3,7th Street'),
(506, 'clientmeta', 28, 'shippingaddress3', 'Sourashtra Nagar,Choolaimedu'),
(507, 'clientmeta', 28, 'shippingcustomercity', 'Chennai'),
(508, 'clientmeta', 28, 'shippingcustomerstate', 'Tamil Nadu'),
(509, 'clientmeta', 28, 'shippingcustomerzip', '600094'),
(510, 'clientmeta', 28, 'customercontactperson', 'E.Sivakumar'),
(511, 'clientmeta', 28, 'customercontactnumber', 'E.Sivakumar'),
(512, 'clientmeta', 28, 'customerfaxnumber', ''),
(513, 'clientmeta', 28, 'customermobilenumber', '+91 98403 87703'),
(514, 'clientmeta', 28, 'customerfreightforwarder', 'To be nominaed by consignee'),
(515, 'clientmeta', 29, 'customername', 'Dynamc Test and Measurement Systems'),
(516, 'clientmeta', 29, 'customeremail', 'sivakumar@dynamic-tm.com'),
(517, 'clientmeta', 29, 'billingadda', 'First Floor,New No. 5\r\nOld No. 3,7th Street\r\n\r\n'),
(518, 'clientmeta', 29, 'billingaddress2', 'First Floor,New No. 5\r\nOld No. 3,7th Street'),
(519, 'clientmeta', 29, 'billingaddress3', 'Sourashtra Nagar,Choolaimedu'),
(520, 'clientmeta', 29, 'billingcustomercity', 'Chennai'),
(521, 'clientmeta', 29, 'billingcustomerstate', 'Tamil Nadu'),
(522, 'clientmeta', 29, 'billingcustomerzip', '600094'),
(523, 'clientmeta', 29, 'shippingaddress1', 'First Floor,New No. 5\r\nOld No. 3,7th Street\r\n\r\n'),
(524, 'clientmeta', 29, 'shippingaddress2', 'First Floor,New No. 5\r\nOld No. 3,7th Street'),
(525, 'clientmeta', 29, 'shippingaddress3', 'Sourashtra Nagar,Choolaimedu'),
(526, 'clientmeta', 29, 'shippingcustomercity', 'Chennai'),
(527, 'clientmeta', 29, 'shippingcustomerstate', 'Tamil Nadu'),
(528, 'clientmeta', 29, 'shippingcustomerzip', '600094'),
(529, 'clientmeta', 29, 'customercontactperson', 'E.Sivakumar'),
(530, 'clientmeta', 29, 'customercontactnumber', 'E.Sivakumar'),
(531, 'clientmeta', 29, 'customerfaxnumber', ''),
(532, 'clientmeta', 29, 'customermobilenumber', '+91 98403 87703'),
(533, 'clientmeta', 29, 'customerfreightforwarder', 'To be nominaed by consignee'),
(534, 'clientmeta', 30, 'customername', 'MECHATRON SOLUTIONS'),
(535, 'clientmeta', 30, 'customeremail', 'kvk@mechatronsolutions.com'),
(536, 'clientmeta', 30, 'billingadda', '35/15,9TH STREET EXTENSION\r\n'),
(537, 'clientmeta', 30, 'billingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(538, 'clientmeta', 30, 'billingaddress3', '-'),
(539, 'clientmeta', 30, 'billingcustomercity', 'COIMBATORE'),
(540, 'clientmeta', 30, 'billingcustomerstate', 'TAMIL NADU'),
(541, 'clientmeta', 30, 'billingcustomerzip', '641006'),
(542, 'clientmeta', 30, 'shippingaddress1', '35/15,9TH STREET EXTENSION\r\n'),
(543, 'clientmeta', 30, 'shippingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(544, 'clientmeta', 30, 'shippingaddress3', '-'),
(545, 'clientmeta', 30, 'shippingcustomercity', 'COIMBATORE'),
(546, 'clientmeta', 30, 'shippingcustomerstate', 'TAMIL NADU'),
(547, 'clientmeta', 30, 'shippingcustomerzip', ''),
(548, 'clientmeta', 30, 'customercontactperson', 'K.Vijayakumar'),
(549, 'clientmeta', 30, 'customercontactnumber', '''+91 9626667772'),
(550, 'clientmeta', 30, 'customerfaxnumber', ''),
(551, 'clientmeta', 30, 'customermobilenumber', '''+91 9626667772'),
(552, 'clientmeta', 30, 'customerfreightforwarder', 'To be nominaed by consignor'),
(553, 'clientmeta', 31, 'customername', 'MECHATRON SOLUTIONS'),
(554, 'clientmeta', 31, 'customeremail', 'kvk@mechatronsolutions.com'),
(555, 'clientmeta', 31, 'billingadda', '35/15,9TH STREET EXTENSION\r\n'),
(556, 'clientmeta', 31, 'billingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(557, 'clientmeta', 31, 'billingaddress3', '-'),
(558, 'clientmeta', 31, 'billingcustomercity', 'COIMBATORE'),
(559, 'clientmeta', 31, 'billingcustomerstate', 'TAMIL NADU'),
(560, 'clientmeta', 31, 'billingcustomerzip', '641006'),
(561, 'clientmeta', 31, 'shippingaddress1', '35/15,9TH STREET EXTENSION\r\n'),
(562, 'clientmeta', 31, 'shippingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(563, 'clientmeta', 31, 'shippingaddress3', '-'),
(564, 'clientmeta', 31, 'shippingcustomercity', 'COIMBATORE'),
(565, 'clientmeta', 31, 'shippingcustomerstate', 'TAMIL NADU'),
(566, 'clientmeta', 31, 'shippingcustomerzip', ''),
(567, 'clientmeta', 31, 'customercontactperson', 'K.Vijayakumar'),
(568, 'clientmeta', 31, 'customercontactnumber', '''+91 9626667772'),
(569, 'clientmeta', 31, 'customerfaxnumber', ''),
(570, 'clientmeta', 31, 'customermobilenumber', '''+91 9626667772'),
(571, 'clientmeta', 31, 'customerfreightforwarder', 'To be nominaed by consignor'),
(572, 'clientmeta', 32, 'customername', 'MECHATRON SOLUTIONS'),
(573, 'clientmeta', 32, 'customeremail', 'kvk@mechatronsolutions.com'),
(574, 'clientmeta', 32, 'billingadda', '35/15,9TH STREET EXTENSION\r\n'),
(575, 'clientmeta', 32, 'billingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(576, 'clientmeta', 32, 'billingaddress3', '-'),
(577, 'clientmeta', 32, 'billingcustomercity', 'COIMBATORE'),
(578, 'clientmeta', 32, 'billingcustomerstate', 'TAMIL NADU'),
(579, 'clientmeta', 32, 'billingcustomerzip', '641006'),
(580, 'clientmeta', 32, 'shippingaddress1', '35/15,9TH STREET EXTENSION\r\n'),
(581, 'clientmeta', 32, 'shippingaddress2', 'GANESH LAYOUT,GANPATHY POST\r\n\r\n\r\nCOIMBATORE-641006'),
(582, 'clientmeta', 32, 'shippingaddress3', '-'),
(583, 'clientmeta', 32, 'shippingcustomercity', 'COIMBATORE'),
(584, 'clientmeta', 32, 'shippingcustomerstate', 'TAMIL NADU'),
(585, 'clientmeta', 32, 'shippingcustomerzip', ''),
(586, 'clientmeta', 32, 'customercontactperson', 'K.Vijayakumar'),
(587, 'clientmeta', 32, 'customercontactnumber', '''+91 9626667772'),
(588, 'clientmeta', 32, 'customerfaxnumber', ''),
(589, 'clientmeta', 32, 'customermobilenumber', '''+91 9626667772'),
(590, 'clientmeta', 32, 'customerfreightforwarder', 'To be nominaed by consignor'),
(591, 'clientmeta', 33, 'customername', 'test'),
(592, 'clientmeta', 33, 'customeremail', 'test12@gmail.com'),
(593, 'clientmeta', 33, 'billingadda', 'add1'),
(594, 'clientmeta', 33, 'billingaddress2', 'add2'),
(595, 'clientmeta', 33, 'billingaddress3', 'add3'),
(596, 'clientmeta', 33, 'billingcustomercity', 'faridabad'),
(597, 'clientmeta', 33, 'billingcustomerstate', 'Haryana'),
(598, 'clientmeta', 33, 'billingcustomerzip', '121008'),
(599, 'clientmeta', 33, 'shippingaddress1', 'add1'),
(600, 'clientmeta', 33, 'shippingaddress2', 'add2'),
(601, 'clientmeta', 33, 'shippingaddress3', 'add3'),
(602, 'clientmeta', 33, 'shippingcustomercity', 'faridabad'),
(603, 'clientmeta', 33, 'shippingcustomerstate', 'Haryana'),
(604, 'clientmeta', 33, 'shippingcustomerzip', '121008'),
(605, 'clientmeta', 33, 'customercontactperson', 'pp'),
(606, 'clientmeta', 33, 'customercontactnumber', '123'),
(607, 'clientmeta', 33, 'customerfaxnumber', '123'),
(608, 'clientmeta', 33, 'customermobilenumber', '+919136097859'),
(609, 'clientmeta', 33, 'customerfreightforwarder', '2312');

-- --------------------------------------------------------

--
-- Table structure for table `klr_zones`
--

CREATE TABLE `klr_zones` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klr_zones`
--

INSERT INTO `klr_zones` (`id`, `name`, `timestamp`) VALUES
(1, 'South', '2018-03-14 19:51:33'),
(2, 'West', '2018-03-14 19:51:33'),
(3, 'North', '2018-03-14 19:51:33'),
(4, 'EM', '2018-03-14 19:51:33'),
(5, 'NKI', '2018-03-14 19:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `youtube` text,
  `facebook` text,
  `twitter` text,
  `google` text,
  `linkedin` text,
  `is_active` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klr_applicationtype`
--
ALTER TABLE `klr_applicationtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_basic_info`
--
ALTER TABLE `klr_basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_customertype`
--
ALTER TABLE `klr_customertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_forms`
--
ALTER TABLE `klr_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_service_box`
--
ALTER TABLE `klr_service_box`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_slider`
--
ALTER TABLE `klr_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klr_user`
--
ALTER TABLE `klr_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `klr_usermeta`
--
ALTER TABLE `klr_usermeta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `metasourcekey` (`metasourcekey`,`userid`,`keyname`);

--
-- Indexes for table `klr_zones`
--
ALTER TABLE `klr_zones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klr_applicationtype`
--
ALTER TABLE `klr_applicationtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `klr_basic_info`
--
ALTER TABLE `klr_basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `klr_customertype`
--
ALTER TABLE `klr_customertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `klr_forms`
--
ALTER TABLE `klr_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `klr_service_box`
--
ALTER TABLE `klr_service_box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `klr_slider`
--
ALTER TABLE `klr_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `klr_user`
--
ALTER TABLE `klr_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `klr_usermeta`
--
ALTER TABLE `klr_usermeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;
--
-- AUTO_INCREMENT for table `klr_zones`
--
ALTER TABLE `klr_zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
