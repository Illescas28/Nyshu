
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
    `idcategory` INTEGER NOT NULL AUTO_INCREMENT,
    `category_name` VARCHAR(255) NOT NULL,
    `category_icon` VARCHAR(45),
    PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- contact
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact`
(
    `idcontact` INTEGER NOT NULL AUTO_INCREMENT,
    `contact_name` VARCHAR(255) NOT NULL,
    `contact_email` VARCHAR(255) NOT NULL,
    `contact_phone` VARCHAR(255),
    `contact_message` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idcontact`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- elementimg
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elementimg`;

CREATE TABLE `elementimg`
(
    `idelementimg` INTEGER NOT NULL AUTO_INCREMENT,
    `elementimg_img` TEXT NOT NULL,
    `elementimg_type` enum('img_top') NOT NULL,
    PRIMARY KEY (`idelementimg`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- elementtext
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elementtext`;

CREATE TABLE `elementtext`
(
    `idelementtext` INTEGER NOT NULL AUTO_INCREMENT,
    `elementtext_description` TEXT NOT NULL,
    `elementtext_icon` TEXT,
    `elementtext_type` enum('text_botton') NOT NULL,
    PRIMARY KEY (`idelementtext`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- elementtitle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `elementtitle`;

CREATE TABLE `elementtitle`
(
    `idelementtitle` INTEGER NOT NULL AUTO_INCREMENT,
    `elementtitle_title` VARCHAR(45),
    `elementtitle_type` enum('text_top'),
    PRIMARY KEY (`idelementtitle`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `idproduct` INTEGER NOT NULL AUTO_INCREMENT,
    `idcategory` INTEGER NOT NULL,
    `product_name` VARCHAR(255) NOT NULL,
    `product_description` VARCHAR(45) NOT NULL,
    `product_img` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idproduct`),
    INDEX `idcategory` (`idcategory`),
    CONSTRAINT `idcategory_product`
        FOREIGN KEY (`idcategory`)
        REFERENCES `category` (`idcategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productphoto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productphoto`;

CREATE TABLE `productphoto`
(
    `idproductphoto` INTEGER NOT NULL AUTO_INCREMENT,
    `idproduct` INTEGER NOT NULL,
    `productphoto_img` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idproductphoto`),
    INDEX `idproduct` (`idproduct`),
    CONSTRAINT `idproduct_productphoto`
        FOREIGN KEY (`idproduct`)
        REFERENCES `product` (`idproduct`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- service
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `service`;

CREATE TABLE `service`
(
    `idservice` INTEGER NOT NULL AUTO_INCREMENT,
    `service_name` VARCHAR(45) NOT NULL,
    `service_description` TEXT NOT NULL,
    `service_img` TEXT NOT NULL,
    `service_background_img` TEXT,
    PRIMARY KEY (`idservice`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- slides
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `slides`;

CREATE TABLE `slides`
(
    `idslides` INTEGER NOT NULL AUTO_INCREMENT,
    `slides_title` TEXT,
    `slides_description` TEXT,
    `slides_img` TEXT NOT NULL,
    PRIMARY KEY (`idslides`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `iduser` INTEGER NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(45) NOT NULL,
    `user_password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`iduser`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
