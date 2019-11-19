


USE KSWD;


insert into Address(country, city, zip, street)
values
('Australia', 'Mornington', 'VIC 3931', 'St. Barkly 5' ),
('France', 'Paris', '75002', '62 Square de la Couronne'),
('France', 'Bagneux', '92220', '34 Rue Joseph Vernet'),
('Germany', 'Erfurt', '99105', 'Nordhauser Straße 63'),
('Italy', 'Musocco', '20151', 'Via San Cosmo fuori Porta Nolana 25'),
('Spain', 'Fene', '15500', 'Quevedo 68');
-- ---------------------------------------------------------


insert into Customer(firstName, lastName, dateOfBirth, phoneNumber, email, addressID)
values
('Antonio', 'Buendia', '1980-03-04', null, 'r.bing@gmail.com', 6),
('Jennifer', 'Nord', '1955-04-05', null, 'nord@gmail.com', 4),
('Ralf', 'Vesco', '1995-12-12', '8382929745', 'vesko95@gmail.com', 5),
('Justine', 'Lanissia', '1971-08-09', null, 'lanissia@gmail.com', 1),
('Junga', 'Jungali', '2000-03-04', null, 'jungali@gmail.com', 6);

-- ---------------------------------------------------------

insert into Account(username, password, customerID)
values
('bunda', '1234', 1),
('jenn', '1234', 2),
('ralf', '1234', 3),
('jus', '1234', 4),
('junga', '1234', 5);
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

insert into Product(name, description, standartPrice, productType, vendorID)
values
('Simonsvlei Zenzela Charming Red', 'A well rounded, medium-bodied, easy drinking wine with spicy/smoky aromas.', 5.20, 'Drink',2 ),
('Plaimont Fleur de d`Artagnan Saint Mont La Réserve', 'Wine with intense purple color with aromas resembling fruit such as blueberries, blackberries.', 12.20, 'Drink',3 ),
('Gouguenheim Estaciones del Valle Cabernet Sauvignon', 'Deep ruby colour with purple hints. ', 8.50, 'Drink',1),
('Pierre Jourdan Brut', 'The lime characteristics of the Chardonnay are leading and are well backed up by the Pinot Noir. ', 16.20, 'Drink',4),
('Casa Valduga Brut Rosé', ' It presents a fine and fascinating perlage with unforgettable bouquet of tropical fruit and almonds.',14.20, 'Drink',4),
('Ferrari Brut', 'This wine embodies the entire history of the Ferrari Estate', 24.20, 'Drink',2 ),
('Messias Vinho Verde', 'Pale citrus colour. Intense and fresh aroma. Medium sweet and a fresh acidity in mouth.', 5.25, 'Drink',3 ),
('Château Pesquié Terrasses Blanc', 'This word comes from the Latin terras, meaning "lump of earth".', 8.50, 'Drink',6),
('Marisco The Kings Desire Pinot Rosé', 'A delicate, pale pink hue. Crunchy red summer berries.', 18.95, 'Drink',4),
('Heumann Rosé', 'Fresh raspberries and cherries on the palate with a hint of vanilla.', 7.57, 'Drink',2 ),
('Stilo Set 2 pieces', 'Stilo Set', 43.99, 'Accessory',5),
('Bottle Packaging Pro', null, 3.20, 'Accessory',5);
-- ---------------------------------------------------------

insert into Drink(category, year, alcoholPercentage, residualSugar, bottleSize, color, ProductID)
values
('wine', 2017, 14.50, 'dry', 0.75, 'red', 1),
('wine', 2015, 13.00, 'medium-sweet', 0.75, 'rosé', 2),
('wine', 2016, 12.21, 'sweet', 0.50, 'red', 3),
('wine', 2014, 13.54, 'off-dry', 0.75, 'white', 4),
('wine', 2015, 14.00, 'dry', 1.00, 'rosé', 5),
('wine', 2012, 13.78, 'bone dry', 0.75, 'red', 6),
('wine', 2017, 12.56, 'medium-sweet', 0.75, 'white', 7),
('wine', 2016, 14.37, 'bone dry', 0.75, 'red', 8),
('wine', 2017, 13.00, 'sweet', 0.75, 'rosé', 9),
('sparkling wine', 2016, 13.64, 'medium-sweet', 1.00, 'rosé', 10);

-- ---------------------------------------------------------

insert into Accessory(category, material, productID)
values
('pack', ' ', 11),
('pack', ' ', 12);























