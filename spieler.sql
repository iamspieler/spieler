--
-- MySQL 5.1.68
-- Mon, 16 Jun 2014 06:25:01 +0000
--

CREATE TABLE `site_pages` (
   `id_page` int(11) not null auto_increment,
   `lft` int(11) not null,
   `rgt` int(11) not null,
   `level` int(4) not null,
   `name` varchar(200) not null,
   `description` text,
   PRIMARY KEY (`id_page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

INSERT INTO `site_pages` (`id_page`, `lft`, `rgt`, `level`, `name`, `description`) VALUES 
('1', '1', '10', '0', 'Root', 'Root node of categories tree1'),
('2', '2', '5', '1', 'Пункт 1', 'Описание пункта 1'),
('3', '6', '7', '1', 'Пункт 2', 'Описание пункта 2'),
('4', '3', '4', '2', 'Пункт 3 - дочерний 1', 'Описание дочернего пункта 1-3'),
('6', '8', '9', '1', 'Пункт 2', 'Описание 2');

CREATE TABLE `site_sblog_is` (
   `id_entry` int(10) not null auto_increment,
   `item_id` int(11) default '0',
   `section_id` int(1) not null default '0',
   PRIMARY KEY (`id_entry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

INSERT INTO `site_sblog_is` (`id_entry`, `item_id`, `section_id`) VALUES 
('1', '1', '1'),
('2', '2', '1'),
('3', '1', '2');

CREATE TABLE `site_sblog_items` (
   `id_item` int(10) not null auto_increment,
   `item_title_ru` varchar(250) not null,
   `item_title_en` varchar(255),
   `item_url` varchar(250) not null,
   `item_text_ru` text not null,
   `item_text_en` text,
   `item_text_full_ru` text not null,
   `item_text_full_en` text,
   `item_picture` varchar(255),
   `item_picture_dir` varchar(255),
   `item_tags` text not null,
   `item_publish_date` datetime default '0000-00-00 00:00:00',
   `item_unpublish_date` datetime default '0000-00-00 00:00:00',
   `item_is_ru` int(1) default '0',
   `item_is_en` int(1) default '0',
   `item_main` int(1) default '0',
   `item_status` int(1) not null default '0',
   PRIMARY KEY (`id_item`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `site_sblog_items` (`id_item`, `item_title_ru`, `item_title_en`, `item_url`, `item_text_ru`, `item_text_en`, `item_text_full_ru`, `item_text_full_en`, `item_picture`, `item_picture_dir`, `item_tags`, `item_publish_date`, `item_unpublish_date`, `item_is_ru`, `item_is_en`, `item_main`, `item_status`) VALUES 
('1', 'Запись1', '', 'item1', 'текст записи', '', 'полный текст записи', '', '975.jpg', '', 'запись, тест', '2014-01-02 00:20:00', '0000-00-00 00:00:00', '1', '0', '0', '1'),
('2', 'Запись 2', '', 'item2', 'Текст 2', '', 'Полный текст 2', '', '976.jpg', '', '', '2014-02-02 12:20:00', '0000-00-00 00:00:00', '1', '0', '0', '1');

CREATE TABLE `site_sblog_sections` (
   `id_section` int(10) not null auto_increment,
   `section_title_ru` varchar(250) not null,
   `section_title_en` varchar(250),
   `section_url` varchar(250) not null,
   `section_text_ru` text not null,
   `section_text_en` text,
   `section_count` int(11) default '0',
   `section_status` int(1) not null default '0',
   PRIMARY KEY (`id_section`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `site_sblog_sections` (`id_section`, `section_title_ru`, `section_title_en`, `section_url`, `section_text_ru`, `section_text_en`, `section_count`, `section_status`) VALUES 
('1', 'Раздел 1', 'Section 1', 'section1', 'Описание 1', '', '2', '1'),
('2', 'Раздел 2', 'Section 2', 'section2', 'Описание 2', '', '0', '1');

CREATE TABLE `site_sblog_tags` (
   `id_tag` int(10) not null auto_increment,
   `tag_title_ru` varchar(250) not null,
   `tag_title_en` varchar(250),
   `tag_url` varchar(250) not null,
   `tag_status` int(1) not null default '0',
   PRIMARY KEY (`id_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `site_sblog_tags` (`id_tag`, `tag_title_ru`, `tag_title_en`, `tag_url`, `tag_status`) VALUES 
('1', 'Тэг 1', 'Tag 1', 'tag1', '1'),
('2', 'Тэг 2', 'Tag 2', 'tag2', '1');

CREATE TABLE `site_tags_items` (
   `id_entry` int(10) not null auto_increment,
   `item_id` int(11) default '0',
   `tag_id` int(1) not null default '0',
   `ctrl` varchar(20) not null default 'blog',
   PRIMARY KEY (`id_entry`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO `site_tags_items` (`id_entry`, `item_id`, `tag_id`, `ctrl`) VALUES 
('1', '1', '1', 'blog'),
('2', '1', '2', 'blog');