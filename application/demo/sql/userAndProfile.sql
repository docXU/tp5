DROP TABLE IF EXISTS `think_user`;
CREATE TABLE IF NOT EXISTS `think_user` (
  `id`          INT(6) UNSIGNED  NOT NULL AUTO_INCREMENT,
  `nickname`    VARCHAR(25)      NOT NULL,
  `name`        VARCHAR(25)      NOT NULL,
  `password`    VARCHAR(50)      NOT NULL,
  `create_time` INT(11) UNSIGNED NOT NULL,
  `update_time` INT(11) UNSIGNED NOT NULL,
  `status`      TINYINT(1)                DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `think_profile`;
CREATE TABLE IF NOT EXISTS `think_profile` (
  `id`       INT(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `truename` VARCHAR(25)     NOT NULL,
  `birthday` INT(11)         NOT NULL,
  `address`  VARCHAR(255)             DEFAULT NULL,
  `email`    VARCHAR(255)             DEFAULT NULL,
  `user_id`  INT(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `think_book`;
CREATE TABLE IF NOT EXISTS `think_book` (
  `id`           INT(8) UNSIGNED  NOT NULL  AUTO_INCREMENT,
  `title`        VARCHAR(255)     NOT NULL,
  `publish_time` INT(11) UNSIGNED           DEFAULT NULL,
  `create_time`  INT(11) UNSIGNED NOT NULL,
  `update_time`  INT(11) UNSIGNED NOT NULL,
  `status`       TINYINT(1)       NOT NULL,
  `user_id`      INT(6) UNSIGNED  NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `think_role`;
CREATE TABLE IF NOT EXISTS `think_role` (
  `id`    INT(5) UNSIGNED NOT NULL  AUTO_INCREMENT,
  `name`  VARCHAR(25)     NOT NULL,
  `title` VARCHAR(50)     NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `think_access`;
CREATE TABLE IF NOT EXISTS `think_access` (
  `user_id` INT(6) UNSIGNED NOT NULL,
  `role_id` INT(5) UNSIGNED NOT NULL
)
  ENGINE = MyISAM
  DEFAULT CHARSET = utf8;


