CREATE TABLE `admin_contact_details` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `cd_address` varchar(50) NOT NULL,
 `cd_map` varchar(100) NOT NULL,
 `phone_no_1` bigint(20) NOT NULL,
 `phone_no_2` bigint(20) NOT NULL,
 `cd_email` varchar(100) NOT NULL,
 `cd_fb` varchar(100) NOT NULL,
 `cd_insta` varchar(100) NOT NULL,
 `cd_tw` varchar(100) NOT NULL,
 `cd_iframe` varchar(300) NOT NULL,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `admin_details` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `admin_username` varchar(150) NOT NULL,
 `admin_password` varchar(150) NOT NULL,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `admin_settings` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `site_title` varchar(50) NOT NULL,
 `site_about` varchar(250) NOT NULL,
 `shutdown` tinyint(1) NOT NULL,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE `carousel_images` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `img` varchar(200) NOT NULL,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `hotel_features` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `management_team_details` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `picture` varchar(200) NOT NULL,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE `user_reviews` (
 `sl_no` int(11) NOT NULL AUTO_INCREMENT,
 `ur_name` varchar(50) NOT NULL,
 `ur_email` varchar(150) NOT NULL,
 `ur_subject` varchar(200) NOT NULL,
 `ur_message` varchar(500) NOT NULL,
 `ur_date` date NOT NULL DEFAULT current_timestamp(),
 `ur_seen` tinyint(4) NOT NULL DEFAULT 0,
 PRIMARY KEY (`sl_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `hotel_facilities` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `icon` varchar(100) NOT NULL,
 `name` varchar(50) NOT NULL,
 `description` varchar(250) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci