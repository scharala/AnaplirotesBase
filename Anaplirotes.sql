DROP TABLE IF EXISTS `Anaplirotes`;

CREATE TABLE `anaplirotes` (
  `a/a` int(11) NOT NULL,
  `Surname` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Name` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Father` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `afm` int(9) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Eidikotita` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `StartDate` date NOT NULL,
  `Hours` int(11) NOT NULL,
  `Praksi` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `Schools` text COLLATE utf32_unicode_ci NOT NULL,
  `ypoyrgiki` varchar(200) COLLATE utf32_unicode_ci DEFAULT NULL,
  `OrismouDie` varchar(200) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;