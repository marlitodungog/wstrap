CREATE TABLE `other_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `other_page_group` varchar(180) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `is_publish` int(11) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1