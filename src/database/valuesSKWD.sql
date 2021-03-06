


USE SKWD;


insert into Address(country, city, zip, street)
values
('Australia', 'Mornington', 'VIC 3931', 'St. Barkly 5' ),
('France', 'Paris', '75002', '62 Square de la Couronne'),
('France', 'Bagneux', '92220', '34 Rue Joseph Vernet'),
('Germany', 'Erfurt', '99105', 'Nordhauser Straße 63'),
('Italy', 'Musocco', '20151', 'Via San Cosmo fuori Porta Nolana 25'),
('Spain', 'Fene', '15500', 'Quevedo 68');
-- ---------------------------------------------------------

insert into Vendor(name, description, phoneNumber, email, addressID)
values
('Florence Voo', null, '098372618','froe@gmail.com', 2),
('Fransua Filk', null, '654346688', 'frasua@gmail.com', 1),
('Gloun Meis',   null, '0123456765','gloun@gmail.com', 4),
('Mavretti Long', null, '087646764', 'mavretti@gmail.com',6),
('Adrian Tram', null, '0876789067','adr@gmail.com', 5),
('Munloc Fred', null, '0984832618','mun@gmail.com', 3)
;

-- ---------------------------------------------------------

insert into Product(prodName, description, standardPrice, productType, vendorID, discount)
values
('Simonsvlei Zenzela Charming Red', 'A well rounded, medium-bodied, easy drinking wine with spicy/smoky aromas.', 74.00, 'Drink',2, 10),
('Plaimont Fleur de d`Artagnan Saint Mont La Réserve', 'Wine with intense purple color with aromas resembling fruit such as blueberries, blackberries.', 12.20, 'Drink',3, 50 ),
('Gouguenheim Estaciones del Valle Cabernet Sauvignon', 'Deep ruby colour with purple hints. ', 8.50, 'Drink',1, 15),
('Pierre Jourdan Brut', 'The lime characteristics of the Chardonnay are leading and are well backed up by the Pinot Noir. ', 16.20, 'Drink',4, 75),
('Casa Valduga Brut Rosé', ' It presents a fine and fascinating perlage with unforgettable bouquet of tropical fruit and almonds.',14.20, 'Drink',4, 20),
('Ferrari Brut', 'This wine embodies the entire history of the Ferrari Estate', 24.20, 'Drink',2 , 40),
('Messias Vinho Verde', 'Pale citrus colour. Intense and fresh aroma. Medium sweet and a fresh acidity in mouth.', 5.25, 'Drink',3 , 90),
('Château Pesquié Terrasses Blanc', 'This word comes from the Latin terras, meaning "lump of earth".', 1000, 'Drink',6, 55),
('Marisco The Kings Desire Pinot Rosé', 'A delicate, pale pink hue. Crunchy red summer berries.', 18.95, 'Drink',4, 50),
('Heumann Rosé', 'Fresh raspberries and cherries on the palate with a hint of vanilla.', 1000, 'Drink',2, null ),
('Stilo Set 2 pieces', 'Stilo Set', 43.99, 'Accessory',5, null),
('Bottle Packaging Pro', null, 3.20, 'Accessory',5, null);



-- Picture

INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_1_.jpg',1,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_2_.jpg',2,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_3_.jpg',3,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_4_.jpg',4,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_5_.jpg',5,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_6_.jpg',6,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_7_.jpg',7,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_8_.jpg',8,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_9_.jpg',9,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_10_.jpg',10,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/product_11_.jpg',11,NULL,NULL);
INSERT INTO `picture` (`id`,`path`,`productID`,`createdAt`,`updatedAt`) VALUES (NULL,'assets/images/products/packge1_.jpg',12,NULL,NULL);

-- ---------------------------------------------------------

/*
-- Query: 
-- Date: 2019-11-30 21:16
*/
-- Types of categories: Red Wine,  White Wine, Rose Wine, Sparkling Wine, Accessory
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'category',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'year',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'alcoholPercentage',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'residualSugar',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'bottleSize',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'color',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'country',NULL,NULL);

INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'material',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'height',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'width',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'weight',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'package dimension',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'ocassion',NULL,NULL);
INSERT INTO `Property` (`id`,`name`,`createdAt`,`updatedAt`) VALUES (NULL,'manufacturer',NULL,NULL);

-- ---------------------------------------------------------

/*
-- Query: 
-- Date: 2019-11-30 21:22
*/
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,1,'Red Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,2,'2000',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,3,'14,50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,4,'dry',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,6,'red',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,1,7,'Germany',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,1,'White Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,2,'2015',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,3,'13.00',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,4,'medium-sweet',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,6,'White',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,2,7,'Italy',NULL,NULL);


INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,1,'Sparkling Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,2,'2013',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,4,'8.5',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,5,7,'Sweden',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,1,'Sparkling Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,2,'2015',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,4,'brut',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,6,7,'Spain',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,1,'White Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,2,'2013',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,4,'9.6',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,7,7,'USA',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,1,'White Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,2,'2015',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,4,'9.6',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,8,7,'Italy',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,1,'Rose Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,2,'2017',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,4,'9.6',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,6,'rose',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,9,7,'Norway',NULL,NULL);


INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,1,'Rose Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,2,'1999',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,4,'9.6',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,6,'rose',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,10,7,'Finland',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,1,'Rose Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,2,'2019',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,3,'12.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,4,'9.6',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,6,'red',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,3,7,'Malta',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,1,'Sparkling Wine',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,2,'2020',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,3,'5.50',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,4,'brut',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,5,'0.75',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,6,'white',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,4,7,'Austria',NULL,NULL);

INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11,1,'Accessory',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 8,'steel',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 9,'12 cm',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 10,'55 g',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 11,'brut',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 12,'15.4 x 60.4 x 10.6 inches',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,11, 13,'every day',NULL,NULL);





INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12,1,'Accessory',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 8,'carton',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 9,'12 cm',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 10,'55 g',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 11,'brut',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 12,'15.4 x 60.4 x 10.6 inches',NULL,NULL);
INSERT INTO `PropertyProProduct` (`id`,`productID`,`propertyID`,`value`,`createdAt`,`updatedAt`) VALUES (NULL,12, 13,'every day',NULL,NULL);



-- Benutzer
insert into Customer(firstName, lastName,gender, dateOfBirth, phoneNumber, addressID)
values
('Abraham', 'Lincoln','m', '1809-02-12', null, 1);

insert into Account(email, password, customerID)
values
('lincoln@abraham.com', '$2y$10$eYEFo2/axTPuQvMEbYvtT.DQCPglYd6Q1IfvS7fKMGKu2qfqWG5ES', 1);-- Password:11111111a

insert into ShoppingCart(accountId)
values
(1);























