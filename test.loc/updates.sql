CREATE TABLE `cart_products` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_date` date  DEFAULT NULL,
  PRIMARY KEY (`cart_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL, AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY  `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `products` ADD COLUMN `image` VARCHAR(255) DEFAULT NULL;

ALTER TABLE `users` ADD COLUMN `type` VARCHAR(255) DEFAULT 'user';

ALTER TABLE `users` ADD COLUMN `status` VARCHAR(255) DEFAULT 'active';