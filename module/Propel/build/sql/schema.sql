
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
    PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- contact
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `contact`;

CREATE TABLE `contact`
(
    `idcontact` INTEGER NOT NULL AUTO_INCREMENT,
    `contact_name` VARCHAR(45) NOT NULL,
    `contact_email` VARCHAR(45) NOT NULL,
    `contact_phone` VARCHAR(45),
    `contact_message` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idcontact`)
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
    `product_price` DECIMAL(10,2) NOT NULL,
    `product_long` DECIMAL(10,2),
    `product_high` DECIMAL(10,2),
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
