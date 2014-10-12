-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.1.68-community-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              7.0.0.4381
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Дамп данных таблицы spieler.site_sblog_is: 2 rows
DELETE FROM `site_sblog_is`;
/*!40000 ALTER TABLE `site_sblog_is` DISABLE KEYS */;
INSERT INTO `site_sblog_is` (`id_entry`, `item_id`, `section_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 1, 2);
/*!40000 ALTER TABLE `site_sblog_is` ENABLE KEYS */;

-- Дамп данных таблицы spieler.site_sblog_items: 2 rows
DELETE FROM `site_sblog_items`;
/*!40000 ALTER TABLE `site_sblog_items` DISABLE KEYS */;
INSERT INTO `site_sblog_items` (`id_item`, `item_title`, `item_url`, `item_text`, `item_text_full`, `item_picture`, `item_picture_dir`, `item_tags`, `item_publish_date`, `item_unpublish_date`, `item_main`, `item_status`) VALUES
	(1, 'Запись1', 'item1', 'текст записи', 'полный текст записи', NULL, NULL, 'запись, тест', '2014-02-02 00:20:00', '0000-00-00 00:00:00', 0, 1),
	(2, 'Запись 2', 'item2', 'Текст 2', 'Полный текст 2', NULL, NULL, '', '2014-02-02 12:20:00', '0000-00-00 00:00:00', 0, 1);
/*!40000 ALTER TABLE `site_sblog_items` ENABLE KEYS */;

-- Дамп данных таблицы spieler.site_sblog_sections: 2 rows
DELETE FROM `site_sblog_sections`;
/*!40000 ALTER TABLE `site_sblog_sections` DISABLE KEYS */;
INSERT INTO `site_sblog_sections` (`id_section`, `section_title`, `section_url`, `section_text`, `section_count`, `section_status`) VALUES
	(1, 'Раздел 1', 'section1', 'Описание 1', 2, 1),
	(2, 'Раздел 2', 'section2', 'Описание 2', 0, 1);
/*!40000 ALTER TABLE `site_sblog_sections` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
