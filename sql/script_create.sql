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
('TA0001', 'Epée'),
('TA0002', 'Hache'),
('TA0003', 'Arc'),
('TA0004', 'Lance'),
('TA0005', 'Marteau'),
('TA0006', 'Dual Blades');

-- Insertion des utilisateurs
INSERT INTO Utilisateur (U_id, U_Mail, U_Pseudo, U_MotDePasse) VALUES
('U0001', 'hunter1@example.com', 'HunterOne', 'password123'),
('U0002', 'hunter2@example.com', 'HunterTwo', 'password456'),
('U0003', 'hunter3@example.com', 'HunterThree', 'password789');

-- Insertion des images
INSERT INTO Image (Im_id, I_Nom, Im_Chemin) VALUES
('IM0001', 'Rathalos Image', 'img.png'),
('IM0002', 'Epée Longue', 'img.png'),
('IM0003', 'Armure de Tigrex', 'img.png'),
('IM0004', 'Arc du Rathalos', 'images.png'),
('IM0005', 'Potion de soin', 'img.png');

INSERT INTO Monstre (M_id, M_Nom, M_Type, M_Taille, M_Poids, M_Faiblesse, M_description, M_Element, Im_id, T_Id) VALUES
('M0001', 'Rathalos', 'Dragon', 12.5, '2000 kg', 'Eau', 'Un dragon volant redouté, connu pour ses flammes dévastatrices', 'Feu', 'IM0001', 'TM001'),
('M0002', 'Tigrex', 'Dragon', 10.0, '1300 kg', 'Glace', 'Un dragon féroce et puissant, avec une grande agilité.', 'Dragon', 'IM0003', 'TM001'),
('M0003', 'Diablos', 'Dragon', 15.0, '2000 kg', 'Foudre', 'Un énorme dragon souterrain, réputé pour sa force brute.', 'Terre', 'IM0001', 'TM001'),
('M0004', 'Zinogre', 'Canin', 8.0, '800 kg', 'Glace', 'Un monstre rapide qui utilise l’électricité pour augmenter sa vitesse.', 'Foudre', 'IM0001', 'TM003'),
('M0005', 'Anjanath', 'Dragon', 12.0, '1500 kg', 'Eau', 'Un dinosaure préhistorique aux mâchoires puissantes.', 'Feu', 'IM0001', 'TM001'),
('M0006', 'Kulu-Ya-Ku', 'Rapace', 4.0, '120 kg', 'Eau', 'Un oiseau rapace qui utilise des objets comme des armes.', 'Glace', 'IM0001', 'TM006');

-- Insertion des armures
INSERT INTO Armure (Eq_Id, Armu_EmplacementCorps, Armu_pointResistancePhysique, Im_id) VALUES
('EQ0002', 'Torse', 150, 'IM0003'),
('EQ0006', 'Torse', 200, 'IM0001');

-- Insertion des items
INSERT INTO Item (Eq_Id, I_Consomable, I_Effet, Im_id) VALUES
('EQ0003', TRUE, 'Soigne 50 HP', 'IM0005'),
('EQ0004', TRUE, 'Restaure 100 HP', 'IM0005');

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
