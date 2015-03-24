
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
    `category_dependency` INTEGER,
    PRIMARY KEY (`idcategory`),
    INDEX `category_dependency` (`category_dependency`),
    CONSTRAINT `category_dependency_category`
        FOREIGN KEY (`category_dependency`)
        REFERENCES `category` (`idcategory`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- material
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `material`;

CREATE TABLE `material`
(
    `idmaterial` INTEGER NOT NULL AUTO_INCREMENT,
    `idproduct` INTEGER NOT NULL,
    `material_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idmaterial`),
    INDEX `idproduct` (`idproduct`),
    CONSTRAINT `idproduct_material`
        FOREIGN KEY (`idproduct`)
        REFERENCES `product` (`idproduct`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- materialcolor
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `materialcolor`;

CREATE TABLE `materialcolor`
(
    `idmaterialcolor` INTEGER NOT NULL AUTO_INCREMENT,
    `idmaterial` INTEGER NOT NULL,
    `materialcolor_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idmaterialcolor`),
    INDEX `idmaterial` (`idmaterial`),
    CONSTRAINT `idmaterial_materialcolor`
        FOREIGN KEY (`idmaterial`)
        REFERENCES `material` (`idmaterial`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
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
    `product_long` VARCHAR(255),
    `product_high` VARCHAR(255),
    `product_depth` VARCHAR(255),
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
    `productphoto_name` VARCHAR(255) NOT NULL,
    `productphoto_url` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idproductphoto`),
    INDEX `idproduct` (`idproduct`),
    CONSTRAINT `idproduct_productphoto`
        FOREIGN KEY (`idproduct`)
        REFERENCES `product` (`idproduct`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- productquestion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `productquestion`;

CREATE TABLE `productquestion`
(
    `idproductquestion` INTEGER NOT NULL AUTO_INCREMENT,
    `idproduct` INTEGER NOT NULL,
    `productquestion_requester_name` VARCHAR(255) NOT NULL,
    `productquestion_requester_email` VARCHAR(255) NOT NULL,
    `productquestion_requester_message` VARCHAR(255) NOT NULL,
    `productquestion_requester_date` DATETIME NOT NULL,
    `productquestion_reply` VARCHAR(45),
    `productquestion_reply_date` DATETIME,
    PRIMARY KEY (`idproductquestion`),
    INDEX `idproduct` (`idproduct`),
    CONSTRAINT `idproduct_productquestion`
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
