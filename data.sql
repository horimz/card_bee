CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
);

--  card_company
CREATE TABLE `card_company` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `card_company` VALUES (1, 'KB', '02-889-5559'), (2, '신한', '02-885-7799'), (3, '우리', '02-887-9757');

-- card
CREATE TABLE `card` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `benefit_id` int(3) DEFAULT NULL,
  `company_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk1_id` FOREIGN KEY (`benefit_id`) REFERENCES `benefits` (`id`),
  CONSTRAINT `fk2_id` FOREIGN KEY (`company_id`) REFERENCES `card_company` (`id`)
);
INSERT INTO `card` (name, type, benefit_id, company_id) VALUES ('TheFull', '신용카드', 3, 3);

-- benefits
CREATE TABLE `benefits` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `detail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `benefits` VALUES (1, '혜택 1'), (2, '혜택 2'), (3, '혜택 3');

-- franchise
CREATE TABLE `franchise` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
INSERT INTO `franchise` VALUES (1,'EverLand', 'Culture'),(2,'Starbucks', 'Cafe'), (3, "McDonald's", 'Food'), (4, 'CGV', 'Culture');

-- franchisee
CREATE TABLE `franchisee` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `branch` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `franchise_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_id` FOREIGN KEY (`franchise_id`) REFERENCES `franchise` (`id`)
);
INSERT INTO `franchisee` (branch, address, phone_number, franchise_id) 
VALUES ('EverLand', '199 Everland-ro, Pogog-eup, Cheoin-gu, Yongin-si, Gyeonggi-do', '031-320-5000', 1),
(2,'Samseong', 'Seoul, Gangnam-gu, Samseong-dong, Teheran-ro, 443', '02-6002-3467', 2),
(3,'Gwangnaru', '329-1 Gwangjang-dong,Gwangjin-gu', '02-758-8648', 2),
(4,'Sinnae', '194 Bonghwasan-ro, Sinnae 2(i)-dong, Jungnang-gu, Seoul', '070-7017-0531', 3),
(5,'Jungnang', '202 Mangu-ro, Sangbong 2(i)-dong, Jungnang-gu, Seoul', '070-7017-0417', 3),
(6,'Gangnam', '438 Gangnam-daero, Yeoksam-dong, Seocho-gu, Seoul', '1544-1122', 4),
(7,'Sangbong', '79-3 Sangbong 2(i)-dong, Jungnang-gu, Seoul', '1544-1123', 4);


-- affiliate
CREATE TABLE `affiliate` (
  `franchise_id` int(3) NOT NULL,
  `card_id` varchar(30) NOT NULL,
  PRIMARY KEY (`franchise_id`, `card_id`)
);
INSERT INTO `affiliate` VALUES (1, 3), (1, 4), (1, 6), (2, 1), (2, 2), (3, 5), (4, 1);



SELECT detail FROM benefits WHERE