<?php  

CREATE TABLE `wp_my_authors` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) DEFAULT NULL,
 `fb_link` varchar(250) DEFAULT NULL,
 `about` varchar(250) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

====================================================================
CREATE TABLE `wp_my_students` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `name` varchar(250) DEFAULT NULL,
 `email` varchar(250) DEFAULT NULL,
 `user_login_id` varchar(250) DEFAULT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
====================================================================
CREATE TABLE `wp_my_enrol` (
 `id` int(50) NOT NULL AUTO_INCREMENT,
 `student_id` int(50) NOT NULL,
 `book_id` int(50) NOT NULL,
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

====================================================================

