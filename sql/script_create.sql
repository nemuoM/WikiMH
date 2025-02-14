CREATE TABLE Elements(
   E_id VARCHAR(5),
   E_Nom VARCHAR(50),
   PRIMARY KEY(E_id)
);

CREATE TABLE Equipement(
   Eq_Id VARCHAR(5),
   Eq_Nom VARCHAR(50),
   Eq_Rarete VARCHAR(50),
   Eq_Prix VARCHAR(50),
   PRIMARY KEY(Eq_Id)
);

CREATE TABLE TypeMonstre(
   T_Id INT,
   T_Nom VARCHAR(255),
   PRIMARY KEY(T_Id)
);

CREATE TABLE Type_Arme(
   TA_id VARCHAR(5),
   Ta_Nom VARCHAR(50),
   PRIMARY KEY(TA_id)
);

CREATE TABLE Utilisateur(
   U_id VARCHAR(5),
   U_Mail VARCHAR(255),
   U_Pseudo VARCHAR(50),
   U_MotDePasse VARCHAR(255),
   PRIMARY KEY(U_id)
);

CREATE TABLE Favoris(
   F_id VARCHAR(5),
   F_Type VARCHAR(50),
   F_IdObjet INT,
   PRIMARY KEY(F_id)
);

CREATE TABLE Image(
   Im_id VARCHAR(5),
   I_Nom VARCHAR(50),
   Im_Chemin VARCHAR(255),
   PRIMARY KEY(Im_id)
);

CREATE TABLE Monstre(
   M_id INT,
   M_Nom VARCHAR(50) NOT NULL,
   M_Type VARCHAR(50),
   M_Taille DECIMAL(15,2),
   M_Poids VARCHAR(50),
   M_Faiblesse VARCHAR(50) NOT NULL,
   M_description VARCHAR(255),
   M_Element VARCHAR(50),
   Im_id VARCHAR(5) NOT NULL,
   T_Id INT NOT NULL,
   PRIMARY KEY(M_id),
   FOREIGN KEY(Im_id) REFERENCES Image(Im_id),
   FOREIGN KEY(T_Id) REFERENCES TypeMonstre(T_Id)
);

CREATE TABLE Arme(
   Eq_Id VARCHAR(5),
   A_Type VARCHAR(50),
   A_tranchant INT,
   A_Element VARCHAR(50),
   A_DegatPhysique INT,
   Im_id VARCHAR(5) NOT NULL,
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id),
   FOREIGN KEY(Im_id) REFERENCES Image(Im_id)
);

CREATE TABLE Armure(
   Eq_Id VARCHAR(5),
   Armu_EmplacementCorps VARCHAR(50),
   Armu_pointResistancePhysique INT,
   Im_id VARCHAR(5) NOT NULL,
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id),
   FOREIGN KEY(Im_id) REFERENCES Image(Im_id)
);

CREATE TABLE Item(
   Eq_Id VARCHAR(5),
   I_Consomable BOOLEAN,
   I_Effet VARCHAR(50),
   Im_id VARCHAR(5) NOT NULL,
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id),
   FOREIGN KEY(Im_id) REFERENCES Image(Im_id)
);

CREATE TABLE Posseder(
   M_id INT,
   E_id VARCHAR(5),
   PRIMARY KEY(M_id, E_id),
   FOREIGN KEY(M_id) REFERENCES Monstre(M_id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id)
);

CREATE TABLE detenir(
   Eq_Id VARCHAR(5),
   TA_id VARCHAR(5),
   PRIMARY KEY(Eq_Id, TA_id),
   FOREIGN KEY(Eq_Id) REFERENCES Arme(Eq_Id),
   FOREIGN KEY(TA_id) REFERENCES Type_Arme(TA_id)
);

CREATE TABLE infliger(
   E_id VARCHAR(5),
   Eq_Id VARCHAR(5),
   DegatsElementaire INT,
   PRIMARY KEY(E_id, Eq_Id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id),
   FOREIGN KEY(Eq_Id) REFERENCES Arme(Eq_Id)
);

CREATE TABLE Resister(
   E_id VARCHAR(5),
   Eq_Id VARCHAR(5),
   ResistanceElementaire INT,
   PRIMARY KEY(E_id, Eq_Id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id),
   FOREIGN KEY(Eq_Id) REFERENCES Armure(Eq_Id)
);

CREATE TABLE preferer(
   U_id VARCHAR(5),
   F_id VARCHAR(5),
   PRIMARY KEY(U_id, F_id),
   FOREIGN KEY(U_id) REFERENCES Utilisateur(U_id),
   FOREIGN KEY(F_id) REFERENCES Favoris(F_id)
);

-- Insertion des éléments
INSERT INTO Elements (E_id, E_Nom) VALUES
('E0001', 'Feu'),
('E0002', 'Eau'),
('E0003', 'Foudre'),
('E0004', 'Glace'),
('E0005', 'Dragon'),
('E0006', 'Terre');

-- Insertion des équipements
INSERT INTO Equipement (Eq_Id, Eq_Nom, Eq_Rarete, Eq_Prix) VALUES
('EQ0001', 'Epée Longue', 'Rare', '30000'),
('EQ0002', 'Armure de Tigrex', 'Très Rare', '50000'),
('EQ0003', 'Potion de soin', 'Commune', '50'),
('EQ0004', 'Arc du Rathalos', 'Légendaire', '80000'),
('EQ0005', 'Hache du Diablos', 'Très Rare', '60000'),
('EQ0006', 'Armure de Rathalos', 'Rare', '35000');

INSERT INTO TypeMonstre (T_Id, T_Nom) VALUES
('TM001', 'Dragon'),
('TM002', 'Insecte'),
('TM003', 'Canin'),
('TM004', 'Félidé'),
('TM005', 'Lézard'),
('TM006', 'Rapace');

-- Insertion des types d'arme
INSERT INTO Type_Arme (TA_id, Ta_Nom) VALUES
('TA0001', 'Grande épée'),
('TA0002', 'Épée longue'),
('TA0003', 'Épée & bouclier'),
('TA0004', 'Lames doubles'),
('TA0005', 'Marteau'),
('TA0006', 'Corne de chasse');
('TA0007', 'Lance');
('TA0008', 'Lancecanon');
('TA0009', 'Morpho-hache');
('TA0010', 'Volto-hache');
('TA0011', 'Insectoglaive');
('TA0012', 'Fusarbalète léger');
('TA0013', 'Fusarbalète lourd');
('TA0014', 'Arc');

-- Insertion des utilisateurs
INSERT INTO Utilisateur (U_id, U_Mail, U_Pseudo, U_MotDePasse) VALUES
('U0001', 'hunter1@example.com', 'HunterOne', 'password123'),
('U0002', 'hunter2@example.com', 'HunterTwo', 'password456'),
('U0003', 'hunter3@example.com', 'HunterThree', 'password789');

-- Insertion des images
INSERT INTO Image (Im_id, I_Nom, Im_Chemin) VALUES
('IM0001', 'img Grande épée', 'img.png'),
('IM0002', 'img Epée Longue', 'img.png'),
('IM0003', 'img Épée & bouclier', 'img.png'),
('IM0004', 'img Lames doubles', 'images.png'),
('IM0005', 'img Marteau', 'img.png');
('IM0006', 'img Corne de chasse', 'img.png');
('IM0007', 'img Lance', 'img.png');
('IM0008', 'img Lancecanon', 'img.png');
('IM0009', 'img Morpho-hache', 'img.png');
('IM0010', 'img Volto-hache', 'img.png');
('IM0011', 'img Insectoglaive', 'img.png');
('IM0012', 'img Fusarbalète léger', 'img.png');
('IM0013', 'img Fusarbalète lourd', 'img.png');
('IM0014', 'img Arc', 'img.png');
('IM0015', 'img Chatacabra', 'img.png');
('IM0016', 'img Balahara', 'img.png');
('IM0017', 'img Doshaguma', 'img.png');
('IM0018', 'img Gypceros', 'img.png');
('IM0019', 'img Rey Dau', 'img.png');
('IM0020', 'img Arkveld', 'img.png');




INSERT INTO Monstre (M_id, M_Nom, M_Type, M_Taille, M_Poids, M_Faiblesse, M_description, M_Element, Im_id, T_Id) VALUES
('M0001', 'Chatacabra', 'Amphibien', '?', '? kg', '?', "Une espèce d'amphibiens géants qui utilisent leur salive gluante pour armer de pierres leurs membres supérieurs afin de renforcer leurs attaques.", '?', 'IM0015', 'TM001'),
('M0002', 'Balahara', 'Léviathan', '?', '? kg', '?', "Les léviathans du désert utilisent leur corps serpentin agile pour prendre au piège les imprudents dans le sable mouvant.", 'Eau', 'IM0016', 'TM002'),
('M0003', 'Doshaguma', 'Bête à crocs', '?', '? kg', 'Foudre', "Coriaces et territoriales, les bêtes à crocs sont des créatures agressives qui peuplent des habitats très divers. On les a parfois vues se réunir en grandes meutes. ", 'Aucun', 'IM0017', 'TM003'),
('M0004', 'Gypceros', 'Wyverne rapace', 831.2, '? kg', 'Feu', "Le Gypceros est l'une des plus grandes et des plus lourdes wyvernes rapaces connues.", 'Aucun', 'IM0018', 'TM004'),
('M0005', 'Rey Dau', 'Wyverne volante', '?', '? kg', '?', 'Une Wyverne volante qui règne sur les Plaines venteuses en tant que prédateur ultime.', 'Foudre', 'IM0019', 'TM005'),
('M0006', 'Arkveld', '?', '?', '? kg', '?', "L'Arkveld est un monstre de classe inconnue", '?', 'IM0020', 'TM006');

-- Insertion des armures
INSERT INTO Armure (Eq_Id, Armu_EmplacementCorps, Armu_pointResistancePhysique, Im_id) VALUES
('EQ0002', 'Torse', 150, 'IM0003'),
('EQ0006', 'Torse', 200, 'IM0001');

-- Insertion des items
INSERT INTO Item (Eq_Id, I_Consomable, I_Effet, Im_id) VALUES
INSERT INTO Item (Eq_Id, I_Consomable, I_Effet, Im_id) VALUES
('EQ0001', TRUE, 'Antidote', 'IM0021'),
('EQ0002', TRUE, 'Armorskin', 'IM0022'),
('EQ0003', TRUE, 'Barrel Bomb', 'IM0023'),
('EQ0004', TRUE, 'Demon Powder', 'IM0024'),
('EQ0005', TRUE, 'Demondrug', 'IM0025'),
('EQ0006', TRUE, 'Drugged Meat', 'IM0026'),
('EQ0007', TRUE, 'Energy Drink', 'IM0027'),
('EQ0008', TRUE, 'Hardshell Powder', 'IM0028'),
('EQ0009', TRUE, 'Herbal Medicine', 'IM0029'),
('EQ0010', TRUE, 'Herbal Powder', 'IM0030'),
('EQ0011', TRUE, 'Immunizer Material', 'IM0031'),
('EQ0012', TRUE, 'Large Barrel Bomb', 'IM0032'),
('EQ0013', TRUE, 'Lifepowder', 'IM0033'),
('EQ0014', TRUE, 'Mega Potion', 'IM0034'),
('EQ0015', TRUE, 'Nulberry', 'IM0035'),
('EQ0016', TRUE, 'Pitfall Trap', 'IM0036'),
('EQ0017', TRUE, 'Poison Smoke Bomb', 'IM0037'),
('EQ0018', TRUE, 'Poisoned Meat', 'IM0038'),
('EQ0019', TRUE, 'Potion', 'IM0039'),
('EQ0020', TRUE, 'Ration', 'IM0040'),
('EQ0021', TRUE, 'Raw Meat', 'IM0041'),
('EQ0022', TRUE, 'Shock Trap', 'IM0042'),
('EQ0023', TRUE, 'Smoke Bomb', 'IM0043'),
('EQ0024', TRUE, 'Tinged Meat', 'IM0044'),
('EQ0025', TRUE, 'Tranq Bomb', 'IM0045'),
('EQ0026', TRUE, 'Well-Done Steak', 'IM0046');
('EQ0027', TRUE, 'Bitterbug Broth', 'IM0047'),
('EQ0028', TRUE, 'Catalyst', 'IM0048'),
('EQ0029', TRUE, 'Flowfern', 'IM0049'),
('EQ0030', TRUE, 'Gunpowder', 'IM0050'),
('EQ0031', TRUE, 'Herb', 'IM0051'),
('EQ0032', TRUE, 'Honey', 'IM0052'),
('EQ0033', TRUE, 'Large Barrel', 'IM0053'),
('EQ0034', TRUE, 'Net Items', 'IM0054'),
('EQ0035', TRUE, 'Nitroshroom', 'IM0055'),
('EQ0036', TRUE, 'Small Barrel', 'IM0056'),
('EQ0037', TRUE, 'Thunderbug Capacitor', 'IM0057'),
('EQ0038', TRUE, 'Trap Tool', 'IM0058'),
('EQ0039', TRUE, 'Antidote Herb Items', 'IM0059'),
('EQ0040', TRUE, 'Blue Mushroom', 'IM0060'),
('EQ0041', TRUE, 'Droolshroom', 'IM0061'),
('EQ0042', TRUE, 'Eastern Honey', 'IM0062'),
('EQ0043', TRUE, 'Godbug Essence', 'IM0063'),
('EQ0044', TRUE, 'Monster Chili', 'IM0064'),
('EQ0045', TRUE, 'Mud Shrimp', 'IM0065'),
('EQ0046', TRUE, 'Parashroom', 'IM0066'),
('EQ0047', TRUE, 'Sleep Herb', 'IM0067'),
('EQ0048', TRUE, 'Wild Herb', 'IM0068'),
('EQ0049', TRUE, 'Dung Pod', 'IM0069'),
('EQ0050', TRUE, 'Flash Pod', 'IM0070'),
('EQ0051', TRUE, 'Large Dung Pod', 'IM0071'),
('EQ0052', TRUE, 'Luring Pod', 'IM0072'),
('EQ0053', TRUE, 'Screamer Pod', 'IM0073'),
('EQ0054', TRUE, 'Tranq Blade', 'IM0074');

-- Insertion des relations Posseder
INSERT INTO Posseder (M_id, E_id) VALUES
('M0001', 'E0001'),  -- Rathalos possède l'élément "Feu"
('M0002', 'E0005'),  -- Tigrex possède l'élément "Dragon"
('M0003', 'E0003'),  -- Diablos possède l'élément "Foudre"
('M0004', 'E0004'),  -- Zinogre possède l'élément "Glace"
('M0005', 'E0001'),  -- Anjanath possède l'élément "Feu"
('M0006', 'E0002');  -- Kulu-Ya-Ku possède l'élément "Eau"

-- Insertion des relations Detenir
INSERT INTO detenir (Eq_Id, TA_id) VALUES
('EQ0001', 'TA0001'),  -- Epée Longue est de type "Epée"
('EQ0004', 'TA0003'),  -- Arc est de type "Arc"
('EQ0005', 'TA0002');  -- Hache est de type "Hache"

-- Insertion des dégâts élémentaires infligés
INSERT INTO infliger (E_id, Eq_Id, DegatsElementaire) VALUES
('E0001', 'EQ0001', 100),  -- Epée Longue inflige 100 dégâts de Feu
('E0003', 'EQ0005', 150);  -- Hache inflige 150 dégâts de Terre

-- Insertion des résistances élémentaires
INSERT INTO Resister (E_id, Eq_Id, ResistanceElementaire) VALUES
('E0002', 'EQ0002', 80),  -- Armure de Tigrex résiste à 80% des dégâts d'Eau
('E0004', 'EQ0006', 100);  -- Armure de Rathalos résiste à 100% des dégâts de Glace

-- Insertion des préférences des utilisateurs
INSERT INTO preferer (U_id, F_id) VALUES
('U0001', 'F0001'),  -- Utilisateur 1 préfère le monstre "Rathalos"
('U0002', 'F0002'),  -- Utilisateur 2 préfère l'arme "Epée Longue"
('U0003', 'F0003');  -- Utilisateur 3 préfère l'arme "Arc du Rathalos"
