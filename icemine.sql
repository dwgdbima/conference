-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2020 pada 03.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icemine`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `abstract`
--

CREATE TABLE `abstract` (
  `id` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `author` varchar(512) NOT NULL,
  `institution` varchar(512) NOT NULL,
  `content` text NOT NULL,
  `keyword` varchar(512) NOT NULL,
  `topic` varchar(256) NOT NULL,
  `presenter` varchar(256) NOT NULL,
  `type` varchar(128) NOT NULL,
  `info` varchar(256) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `last_update` datetime NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `abstract`
--

INSERT INTO `abstract` (`id`, `title`, `author`, `institution`, `content`, `keyword`, `topic`, `presenter`, `type`, `info`, `id_user`, `date_created`, `status`, `payment`, `last_update`, `email`) VALUES
(9, 'Identification of ground motion prone areas triggering earthquakes based on microtremor data in Jati Agung District, South Lampung Regency, Lampung, Indonesia', 'Rizqi Prastowo (a), Akhmad Zamroni (a), Vico Luthfi Ipmawan (*b), Rahmat nawi siregar (b), Ikah Ning Prasetiowati Permanasari (b), Rofiqul Umam', '(a) Institut Teknologi Naisonal Yogyakarta, Jalan Babarsari, Caturtunggal, Depok, Sleman, Yogyakarta (b) Institut Teknologi Sumatera, Ryacudu Bypass, Way Hui, Jati Agung, South Lampung, Indonesia (c) Kwansei Gakuin University, japan', 'Jati Agung District is an area planned by the Lampung government to become a new city of the central government in Lampung. Aspects of city planning include aesthetics and safety. The geophysical study is conducted as disaster mitigation efforts to make the city have a good level of safety. The purpose of this study is to measure earthquake activities in the research areas that could be developed as data in disaster mitigation. The geophysical study was conducted by measuring the microtremor at 15 points. The microtremor signal is processed by the HVSR method to obtain information on natural frequency and amplitude. Natural frequencies and amplifications were analyzed to obtain the Peak Ground Acceleration (PGA) and Ground Shear Strain values. The results of PGA values and Ground Shear Strains indicate indications of soil fracture-prone areas. The results showed that the PGA value was 12.34638 gal to 22.18974 gal, while the Ground Shear Strain value was 53.34322x10-6 to 729.6847x10-6.', 'Earthquake; geophysics; PGA; Ground Shear Strain; microtremor', 'Geophysics, Geomatics and Geochemistry', 'Dewa Gede Bima Prabawa', 'Oral Presentation', '', 58, '2020-02-13 22:42:53', 0, 1, '2020-03-01 13:15:58', '*vico.luthfi@fi.itera.ac.id '),
(11, 'ENVIRONMENTAL ISSUES WITH VIRTUAL MICROSCOPIC SIMULATION (VMS) OF MOOCS FOR STUDENT’S MODEL OF UNDERSTANDING', 'Suherman (a), Firmanul Catur Wibowo* (b), Rizaldi Firdaus Wijaya (a), Cecep Fathurohman (a), Dina Rahmi Darman (a), Wasis Wuyung Wisnu Brata (c)', '(a)Department of Physics Education, Universitas Sultan Ageng Tirtayasa Jl. Raya Jakarta Km 04, Serang, Banten 14212, Indonesia (b)Department of Physics Education, Universitas Negeri Jakarta Jl. Pemuda 10, Rawamangaun, Jakarta 13220, Indonesia (c)Department of Biology Education, Universitas Negeri Medan Jl. Pasar V Timur , Banten Timur, Medan Kota, 20224 Medan , Sumatera Utara, Indonesia', 'The aim of this research is to develop a design of MOOCS with Virtual Microscopic Simulation (VMS) for students model of understanding. The research method used was Experimental Design with the subjects of the study were 80 students in one of the Senior High Schools in Banten Province, Indonesia. The results showed that the highest understanding is Optimal Model (OM) is 75.56%, Non-Creative Model (NCM) is 7.78%, Theoretical Model (TM) is 4.44 Practical Model (PM) is 4.44% , Memorizing Model is (MM) 10%, and Has No Model (TKM) is 0 %. It was concluded that the average understanding model experienced a significant increase with learning through MOOCS with VMA on the concept of Heat Transfer in the environment.', 'Environmental Issues; Virtual Microscopic Simulation (VMS); MOOCS; Student’s Model of Understanding.', 'Disaster Management and Environmental Issues', 'Dewa Gede Bima Prabawa', 'Oral Presentation', '', 60, '2020-02-28 12:46:11', 1, 0, '2020-02-28 12:46:11', 'suherman@gmail.com'),
(12, 'Identification of ground motion prone areas triggering earthquakes based on microtremor data in Jati Agung District, South Lampung Regency, Lampung, Indonesia', 'Rizqi Prastowo (a), Akhmad Zamroni (a), Vico Luthfi Ipmawan (*b), Rahmat nawi siregar (b), Ikah Ning Prasetiowati Permanasari (b), Rofiqul Umam', '(a) Institut Teknologi Naisonal Yogyakarta, Jalan Babarsari, Caturtunggal, Depok, Sleman, Yogyakarta (b) Institut Teknologi Sumatera, Ryacudu Bypass, Way Hui, Jati Agung, South Lampung, Indonesia *vico.luthfi@fi.itera.ac.id (c) Kwansei Gakuin University, japan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci, nulla, consequuntur obcaecati non dicta amet rem. Quae, maiores dignissimos modi veniam tempora ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci, nulla, consequuntur obcaecati non dicta amet rem. Quae, maiores dignissimos modi veniam tempora ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci, nulla, consequuntur obcaecati non dicta amet rem. Quae, maiores dignissimos modi veniam tempora ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci, nulla, consequuntur obcaecati non dicta amet rem. Quae, maiores dignissimos modi veniam tempora ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci, nulla, consequuntur obcaecati non dicta amet rem. Quae, maiores dignissimos modi veniam tempora ducimus.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe eius assumenda fugit reprehenderit quas eaque adipisci,', 'Earthquake; geophysics; PGA; Ground Shear Strain; microtremor', 'Disaster Management and Environmental Issues', 'Dewa Gede Bima Prabawa', 'Oral Presentation', '', 60, '2020-03-02 03:57:52', 1, 0, '2020-03-02 03:57:52', 'dewagedebima@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$iGgtOkEtE5B5VEpTKZ4xV.cdOajH9Q3Zi5RsmfMzEBVDqwXQIBGe.', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `file` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abs_id` int(11) NOT NULL,
  `info` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paper`
--

INSERT INTO `paper` (`id`, `date`, `file`, `user_id`, `abs_id`, `info`) VALUES
(9, '2020-03-04 19:55:47', 'ABS-12_full_paper.doc', 60, 12, ''),
(10, '2020-03-04 20:00:06', 'ABS-11_full_paper.docx', 60, 11, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `reviewers_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reviewers`
--

INSERT INTO `reviewers` (`id`, `email`, `password`, `date_created`, `active`, `name`) VALUES
(4, 'dewagedebima@gmail.com', '$2y$10$4fhGJDv0sknY5YkNjGaSTeMpXGbOWp/m5cIhFbeOno2yhTnYHn9Ke', '2020-03-12 13:28:25', 1, 'Dewa Gede Bima Prabawa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review_paper`
--

CREATE TABLE `review_paper` (
  `id` int(11) NOT NULL,
  `content` varchar(512) NOT NULL,
  `file` varchar(128) NOT NULL,
  `reviewers_id` int(11) NOT NULL,
  `abs_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recomendation` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revised_paper`
--

CREATE TABLE `revised_paper` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `file` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `abs_id` int(11) NOT NULL,
  `info` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `participation` varchar(128) NOT NULL,
  `institution` varchar(265) NOT NULL,
  `research` varchar(128) NOT NULL,
  `fax` varchar(64) DEFAULT NULL,
  `gender` varchar(16) NOT NULL,
  `birth` date NOT NULL,
  `street` varchar(128) DEFAULT NULL,
  `city` varchar(128) NOT NULL,
  `zip_code` varchar(32) DEFAULT NULL,
  `country` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `info` varchar(265) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `is_active` int(1) NOT NULL,
  `confirm` int(1) NOT NULL,
  `salutation` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `participation`, `institution`, `research`, `fax`, `gender`, `birth`, `street`, `city`, `zip_code`, `country`, `image`, `info`, `date_created`, `is_active`, `confirm`, `salutation`) VALUES
(28, 'Kadek Ayu', 'Tia Puspasari', 'ayutiapuspasari@gmail.com', '$2y$10$1oOfl0hyYRS8DgqWLb0WHOFhGxFYuF35KqcIFt7uuyLfclIhuW.Ci', '082266563995', 'Presenter', 'Atma Jaya Yogyakarta', 'Law', '', 'Male', '1997-03-17', '', 'Tabanan', '82162', 'Indonesia', 'default.jpg', '', '2020-02-19 11:49:09', 1, 1, 'Prof. Dr.'),
(29, 'Gede Made', 'Oko Wirawan', 'okowirawan@gmail.com', '$2y$10$z/8Msk.RAEufNuDLka8zOev7LucYZH4/t1.JGvphFQ7zqnNn.0A82', '082266563995', 'Presenter', 'ITNY', 'MINING', '', 'Male', '1997-02-10', '', 'Kab. Tabanan', '82162', 'Indonesia', 'default.jpg', '', '2020-02-19 11:51:09', 1, 1, 'Prof. Dr.'),
(30, 'Putu', 'Bayu Bramasta', 'bayubramasta@gmail.com', '$2y$10$nLfal7mwNau94F1qsje0FubkFlVmUiKFv7RP5gpyaEXOnsOT.5Y0W', '081323213412', 'Presenter', 'STIE BANK', 'Business', '', 'Male', '1997-02-04', '', 'Tabanan', '92832', 'Indonesia', 'default.jpg', '', '2020-02-19 11:54:41', 1, 1, 'Prof. Dr.'),
(31, 'Gede', 'Eka Santika Putra', 'ekasantika@gmail.com', '$2y$10$OLHBKiTQqk61RXAdB8C2yevsQz.zyUmI0fMe3DlbeZiMi09lOfJ46', '082266563995', 'Presenter', 'UPN', 'MINING', '', 'Male', '1997-01-06', '', 'Karangasem', '98732', 'Indonesia', 'default.jpg', '', '2020-02-19 11:56:38', 0, 1, 'Prof. Dr.'),
(32, 'Wayan', 'Sastrawan', 'wayansastrawan@gmail.com', '$2y$10$71D7bioFcYKT4VPvCJEoW.SMQl3bl90g2Z67sWtnhh4UYK4JGBwwe', '082266563995', 'Presenter', 'AMIKOM', 'Artificial Intelegent', '', 'Male', '1997-03-27', '', 'Gianyar', '80561', 'Indonesia', 'default.jpg', '', '2020-02-19 11:58:02', 1, 1, 'Prof. Dr. dr.'),
(33, 'I Gusti Ayu', 'Hary Swandewi', 'ayuhary@gmail.com', '$2y$10$94GP89oC4Vj0Mu9UtIYZjOLvwuKgmdr6qDYVByonB55r4wVqxw5FW', '081323213412', 'Presenter', 'Atma Jaya', 'LAW', '', 'Male', '1997-04-07', '', 'Karangasem', '802938', 'Indonesia', 'default.jpg', '', '2020-02-19 11:59:55', 0, 1, 'Prof. Dr. dr.'),
(35, 'Fauzi', 'Irwan', 'fauziirwan@gmail.com', '$2y$10$GLZTL1pGLwkJ1b8f3Jv8F.oJP9vv/FDUtSxzLqnGpAXYlhL.B.5P2', '082266563995', 'Presenter', 'AMIKOM', 'Artificial Intelegent', '', 'Male', '2020-02-03', '', 'Makasar', '27832', 'Indonesia', 'default.jpg', '', '2020-02-20 10:59:36', 1, 1, 'Prof. Dr.'),
(36, 'I Ketut', 'Dody Suryawan', 'dodysuryawan@gmail.com', '$2y$10$tWy.PCfq/G4qQwXqxK3vs.CDnvG.05ioNVT9N5Bq88TFuAWqDWEsi', '082266563995', 'Presenter', 'Universitas Warmadewa', 'Economic', NULL, 'male', '1997-07-12', NULL, 'Gianyar', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:39', 0, 1, 'Prof. Dr.'),
(37, 'Dewa Gede', 'Krisna Adinatha', 'krisnaadinatha@gmail.com', '$2y$10$ESVwpsUlrXAYR35PhPu9ZOIT093ZbT637Bvk8yzJn9mUFE2SDCiLe', '082266563995', 'Presenter', 'Universitas Udayana', 'artificial intelegent', NULL, 'male', '1997-07-12', NULL, 'Gianyar', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:39', 1, 1, 'Prof. Dr.'),
(38, 'Dewa Gede', 'Yudi Astawa', 'yudiastawa@gmail.com', '$2y$10$9t3/mqRBv24bJeUboPD5GO0X1KOoET.pzXb2vQq.x4nDQs2UlsF0K', '082266563995', 'Presenter', 'Universitas Warmadewa', 'accountant', NULL, 'male', '1997-07-12', NULL, 'Gianyar', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:39', 1, 1, 'Prof. Dr.'),
(39, 'Dewa Gede', 'Wahyu', 'wahyu@gmail.com', '$2y$10$hosAALVNyGFRzq2LEV7hBOsKMEoSHXvxV9k63wZLTzxrEEc8aizUW', '082266563995', 'Non-Presenter', 'Universitas Atmajaya', 'accountant', NULL, 'male', '1997-07-12', NULL, 'Gianyar', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:39', 1, 1, 'Prof. Dr.'),
(40, 'Maria', 'Christina', 'mariachristina@gmail.com', '$2y$10$OI.yUw.gmfZpCXMHfxv5dOee8admDrHeIxawuEigy8nf78pei1nn.', '082266563995', 'Presenter', 'Universitas Atma Jaya Yogyakarta', 'law', NULL, 'female', '1997-01-13', NULL, 'Bengkulu', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:39', 1, 1, 'Prof. Dr.'),
(41, 'Tika', 'Yulita', 'tikayulita@gmail.com', '$2y$10$th.5KlSlgoMqZWdFKOol0.jze28dx8MHS22grFvXR2j6WTD5BsPKO', '082266563995', 'Presenter', 'Universitas Andalas', 'communication', NULL, 'female', '1997-07-15', NULL, 'Belitung', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:40', 1, 1, 'Prof. Dr.'),
(42, 'Agus Triwikrama', 'Putra', 'triwikrama@gmail.com', '$2y$10$B2CW55HaoCsaCLFnqPVa0u9QA4B7R5UsHhk/kQ220mDjCxmX/.agW', '082266563995', 'Non-Presenter', 'Universitas Wijaya Kusuma', 'medicine', NULL, 'male', '1997-08-13', NULL, 'Tabanan', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:40', 1, 1, 'Prof. Dr.'),
(43, 'Yoga Adi', 'Brata', 'yogaadibrata@gmail.com', '$2y$10$xiXtO5YaE/bGWP26O2pibuIbk7x3J1M8zXjcKZlN1/yK7CDCWxUl.', '082266563995', 'Non-Presenter', 'Universitas Mahasaraswati', 'pharmacy', NULL, 'male', '1997-07-12', NULL, 'Tabanan', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:40', 1, 1, 'Prof. Dr.'),
(44, 'Made Ayu', 'Kurniawati', 'kurniawati@gmail.com', '$2y$10$ntJvAs4OptH.HhNGcB.Y3uxqtOUQ.JqW5OnXiXknNV.GAwXw4xQhS', '082266563995', 'Nono-Presenter', 'Universitas Udayana', 'veterinary medicine', NULL, 'female', '1997-10-15', NULL, 'Tabanan', NULL, 'Indonesia', 'default.jpg', NULL, '2020-02-20 13:42:40', 1, 1, 'Prof. Dr.'),
(60, 'Dewa Gede', 'Bima Prabawa', 'dewagedebima@gmail.com', '$2y$10$idiHq.FxV5042BSXz9JyTOJz1YaALye3fFP/UWuxd2BLFLj9PjsA.', '082266563995', 'Presenter', 'AMIKOM', 'Artificial Intelegent', '', 'Male', '1997-08-10', 'Br. Triwangsa, Tegallalang', 'Gianyar', '80561', '', 'default.jpg', '', '2020-03-02 03:54:08', 1, 1, 'Prof. Dr.'),
(63, 'BIMA PRABAWA', 'DEWA GEDE', 'dewagedebima2@gmail.com', '$2y$10$3WYfSiHxbQ4Qz2M5BYZ0Ze0Qhhugbg.TK9TDVlwu3KuyIqB9Eyw0G', '082266563995', 'Presenter', 'AMIKOM', 'MINING', '', 'Male', '1997-08-10', 'Br. Triwangsa, Tegallalang', 'Gianyar', '80561', 'Indonesia', 'default.jpg', '', '2020-03-03 16:54:07', 0, 0, 'Prof. Dr.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(10, 'mgazalirachman@gmail.com', 'pghL6C9Ef2Lv0bYkmBz1GX8oJzALVcWyCfWzykTF3WI=', 1582532122),
(11, 'dewagedebima2@gmail.com', 't2dOFFdEgWFLBtWn3S/p2A7sj6guGHb1uYOOfrPIfG4=', 1582542351),
(12, 'test@gmail.com', 'VgXamC7EDNGVPmPgTgBRCiU/T85wQaGKoMRJdv+k2Ms=', 1582623318),
(13, 'dewagedebima3@gmail.com', 'nYSDxvcn74tNL48gFYABv9f2ULq+uztYtopJ6g6+cDM=', 1582623333),
(15, 'dewagedebima10@gmail.com', 'iW8zH156hkeawdZuRH40QDRsROK+OWIus4qL1LyPvaM=', 1582623387),
(16, 'dewagedebima21211@gmail.com', 'mRhdh90dRV9RezFf1enSwYZpZ8Qi3Bsnyghhi6ZREbE=', 1582623452),
(17, 'dewagedebima1444@gmail.com', 'mcSss4VBSNnIqSoRT6pelSkuq/wlm726q/VdXYJJR0w=', 1582623508),
(18, 'dewagedebima10000@gmail.com', 'mZPxQ8tJUnzKqhVKhBIjiNH3+7N2Q+/EfF7cBScUKzU=', 1582623574),
(22, 'dewagedebima@gmail.com', 'RBYuJQzxx/PBuxBnFKWOnB4PX7hrHnzbNtkBAQ/wbbQ=', 1583250559),
(23, 'dewagedebima@gmail.com', 'mCl9DXcWxvevsaJ27rwSa6vstgqB1Ksan0PtyTQ+15A=', 1583250580),
(24, 'dewagedebima2@gmail.com', 'TJ/p7fkOmt0LZlhnqfbxJuiKkPhE/GQwWhT3WFIANTo=', 1583250847);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `abstract`
--
ALTER TABLE `abstract`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviewers`
--
ALTER TABLE `reviewers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review_paper`
--
ALTER TABLE `review_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revised_paper`
--
ALTER TABLE `revised_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `abstract`
--
ALTER TABLE `abstract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT untuk tabel `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `review_paper`
--
ALTER TABLE `review_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revised_paper`
--
ALTER TABLE `revised_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
