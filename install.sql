SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `oc_product_partner`;

CREATE TABLE `oc_product_partner` (
  `product_id` int(11) NOT NULL,
  `html` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `oc_product_partner` ADD PRIMARY KEY (`product_id`);

COMMIT;
