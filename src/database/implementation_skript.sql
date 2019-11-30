

DROP DATABASE IF EXISTS SKWD;
CREATE DATABASE IF NOT EXISTS SKWD;
USE SKWD;

-- 

DROP TABLE IF EXISTS Address;
CREATE TABLE IF NOT EXISTS Address(
addressID			int			NOT NULL	AUTO_INCREMENT,
country				varchar(50)	NOT NULL,
city				varchar(50)	NOT NULL,
zip					varchar(15)	NOT NULL,
street				varchar(50)	NOT NULL,

CONSTRAINT Address_PK PRIMARY KEY (addressID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Customer;
CREATE TABLE IF NOT EXISTS Customer(
customerID			int			NOT NULL	AUTO_INCREMENT,
firstName			varchar(50)	NOT NULL,
lastName			varchar(50)	NOT NULL,
dateOfBirth			varchar(50)		NOT NULL,
phoneNumber			varchar(20)		NULL,
addressID			int			NOT NULL,

CONSTRAINT Customer_PK PRIMARY KEY (customerID),
CONSTRAINT Customer_FK FOREIGN KEY (addressID) REFERENCES Address (addressID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Account;
CREATE TABLE IF NOT EXISTS Account(
accountID			int			NOT NULL	AUTO_INCREMENT,
email				varchar(50)	NOT NULL,
password			varchar(20)	NOT NULL,
customerID			int			NOT NULL,

CONSTRAINT Account_PK PRIMARY KEY (accountID),
CONSTRAINT Account_FK FOREIGN KEY (customerID) REFERENCES Customer (customerID),
CONSTRAINT Customer_UQ unique (email)
-- CONSTRAINT Account_UQ_password unique (password)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Vendor;
CREATE TABLE IF NOT EXISTS Vendor(
vendorID			int			NOT NULL	AUTO_INCREMENT,
name				varchar(50)	NOT NULL,
description			varchar(100)	NULL,
phoneNumber			varchar(20) NOT NULL,
email				varchar(50) NOT NULL,
addressID			int			NOT NULL,

CONSTRAINT Vendor_PK PRIMARY KEY (vendorID),
CONSTRAINT Vendor_FK FOREIGN KEY (addressID) REFERENCES Address (addressID),
CONSTRAINT Vendor_UQ unique (email)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Product;
CREATE TABLE IF NOT EXISTS Product(
productID			int			NOT NULL	AUTO_INCREMENT,
name				varchar(100)NOT NULL,
description			varchar(200)	NULL,
standartPrice		decimal(7,2)NOT NULL,
productType			enum('Drink','Accessory') NOT NULL,	
vendorID			int			NOT NULL,

CONSTRAINT Product_PK PRIMARY KEY (productID),
CONSTRAINT Product_FK FOREIGN KEY (vendorID) REFERENCES Vendor (vendorID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Picture;
CREATE TABLE IF NOT EXISTS Picture(
pictureID			int			NOT NULL	AUTO_INCREMENT,
path				varchar(200)NOT NULL,
productID			int			NOT NULL,

CONSTRAINT Pictur_PK PRIMARY KEY (pictureID),
CONSTRAINT Picture_FK FOREIGN KEY (productID) REFERENCES Product (productID)
);

-- ---------------------------------------------------------

--



DROP TABLE IF EXISTS Property;
CREATE TABLE IF NOT EXISTS Property(
propertyID			int			NOT NULL	AUTO_INCREMENT,
name				varchar(50)not null,
CONSTRAINT Property_PK PRIMARY KEY (propertyID)
);
-- ---------------------------------------------------------

 DROP TABLE IF EXISTS PropertyProProduct;
CREATE TABLE IF NOT EXISTS PropertyProProduct(
pppID			int			NOT NULL	AUTO_INCREMENT,
productID		int			not null,
propertyID		int 		not null,
value			varchar(60)	not null,
CONSTRAINT ppp_PK PRIMARY KEY (pppID),
CONSTRAINT product_FKK FOREIGN KEY(productID) references Product(productID),
CONSTRAINT property_FKK FOREIGN KEY(propertyID) references Property(propertyID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Orders;
CREATE TABLE IF NOT EXISTS Orders(
orderID				int			NOT NULL	AUTO_INCREMENT,
orderDate			date		NOT NULL,
shipDate			date			NULL,
payStatus			enum('unpaid','paid')	NOT NULL,	
payMethod			enum('transfer','cash on delivery','paypal')	NOT NULL,	
payDate				date 			NULL,
customerID			int			NOT NULL,
addressID			int			    NULL,

CONSTRAINT Order_PK PRIMARY KEY (orderID),
CONSTRAINT Basket_FK_Customer FOREIGN KEY (customerID) REFERENCES Customer (customerID),
CONSTRAINT Basket_FK_Address FOREIGN KEY (addressID) REFERENCES Address (addressID)
);

-- ---------------------------------------------------------

--

DROP TABLE IF EXISTS Basket;
CREATE TABLE IF NOT EXISTS Basket(
basketID			int			NOT NULL	AUTO_INCREMENT,
actualPrice			decimal(9,2)NOT NULL,
qty					int(5)		NOT NULL,
productID			int			NOT NULL,		
orderID				int			NOT NULL,

CONSTRAINT Basket_PK PRIMARY KEY (basketID),
CONSTRAINT Basket_FK_Product FOREIGN KEY (productID) REFERENCES Product (productID),
CONSTRAINT Basket_FK_Order FOREIGN KEY (orderID) REFERENCES Orders (orderID)
);





















