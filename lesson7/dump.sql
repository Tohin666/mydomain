-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица myShopDB.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) DEFAULT NULL,
  `url_big` varchar(2038) DEFAULT NULL,
  `url_small` varchar(2038) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы myShopDB.photos: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `name`, `size`, `url_big`, `url_small`, `view_count`) VALUES
	(6, 'PR_4642_P4_H_red_standard.jpg', 590225, 'img/big/PR_4642_P4_H_red_standard.jpg', 'img/small/PR_4642_P4_H_red_standard_small.jpg', 0),
	(7, 'PR_4913_P4_H_green.jpg', 36621, 'img/big/PR_4913_P4_H_green.jpg', 'img/small/PR_4913_P4_H_green_small.jpg', 1),
	(8, 'PR_4927_black_standard.jpg', 663368, 'img/big/PR_4927_black_standard.jpg', 'img/small/PR_4927_black_standard_small.jpg', 0),
	(9, 'PR_5215_Eco.jpg', 392886, 'img/big/PR_5215_Eco.jpg', 'img/small/PR_5215_Eco_small.jpg', 1),
	(10, 'PR_46025_blue_open_closed.jpg', 43110, 'img/big/PR_46025_blue_open_closed.jpg', 'img/small/PR_46025_blue_open_closed_small.jpg', 0),
	(14, 'PR_5215_Eco.jpg', 392886, 'img/big/PR_5215_Eco.jpg', 'img/small/PR_5215_Eco_small.jpg', 3),
	(16, 'PR_4642_P4_H_red_standard.jpg', 590225, 'img/big/PR_4642_P4_H_red_standard.jpg', 'img/small/PR_4642_P4_H_red_standard_small.jpg', 4),
	(17, 'PR_4913_P4_H_green.jpg', 36621, 'img/big/PR_4913_P4_H_green.jpg', 'img/small/PR_4913_P4_H_green_small.jpg', 1),
	(18, 'PR_4927_black_standard.jpg', 663368, 'img/big/PR_4927_black_standard.jpg', 'img/small/PR_4927_black_standard_small.jpg', 0),
	(19, 'PR_46025_blue_open_closed.jpg', 43110, 'img/big/PR_46025_blue_open_closed.jpg', 'img/small/PR_46025_blue_open_closed_small.jpg', 1);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;

-- Дамп структуры для таблица myShopDB.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы myShopDB.products: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `description`, `price`, `photo`) VALUES
	(1, 'Trodat 4642', 'Печать автоматическая Trodat 4642 с крышкой Д=40-42мм пластик. Новая оснастка от австрийской фирмы Trodat - лидера мирового штемпельного рынка. Новая печать сочетает в себе все преимущества появившихся раньше штампов, которые уже давно полюбили пользователи. На сегодняшний день аналогов на российском да и мировом рынке штемпельной продукции просто не существует.', 598.00, 'PR_4642_P4_H_red_standard.jpg'),
	(2, 'Trodat 4913', 'Штамп автоматический Trodat 4913 58х22мм пластик', 784.00, 'PR_4913_P4_H_green.jpg'),
	(3, 'Trodat 4927', 'Штамп автоматический Trodat 4927 60х40мм пластик', 879.00, 'PR_4927_black_standard.jpg'),
	(4, 'Trodat 5215', 'Печать автоматическая Trodat 5215 Д=45мм металл', 1737.00, 'PR_5215_Eco.jpg'),
	(5, 'Trodat 46025', 'Печать автоматическая Trodat 46025 с крышкой Д=25мм пластик', 676.00, 'PR_46025_blue_open_closed.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Дамп структуры для таблица myShopDB.testimonials
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `testimonial` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы myShopDB.testimonials: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` (`id`, `name`, `testimonial`) VALUES
	(1, 'Tohin', 'Это мой первый отзыв'),
	(6, 'User', 'А это мой второй отзыв.'),
	(7, 'Вася', 'Офисный компьютер не просто работает, можно сказать "летает". Если где то и есть тормоза то все упирается в жесткий диск а не процессор. '),
	(8, 'aleks28rus', 'Не дорогой, цена более чем оптимальная, хватает для офиса, с типовым набором приложений.'),
	(9, 'Петя', 'выдающегося ждать не стоит, а на домашнем компе, c linux opensuse никаких тормозов. инет, фильмы, музыка, закачка на телефон, фотки с фото-аппарата, офис, с этим справляется на ура, и не греется\r\n');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

-- Дамп структуры для таблица myShopDB.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы myShopDB.users: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES
	(1, 'Админ', 'admin', 'admin'),
	(2, 'Юзверь', 'user', 'qwerty');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
