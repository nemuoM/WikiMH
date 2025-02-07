CREATE TABLE Elements(
   E_id VARCHAR(50),
   E_Nom VARCHAR(50),
   PRIMARY KEY(E_id)
);

CREATE TABLE Equipement(
   Eq_Id INT,
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

CREATE TABLE Arme(
   Eq_Id INT,
   A_Type VARCHAR(50),
   A_tranchant INT,
   A_Element VARCHAR(50),
   A_DegatPhysique INT,
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id)
);

CREATE TABLE Armure(
   Eq_Id INT,
   Armu_EmplacementCorps VARCHAR(50),
   Armu_pointResistancePhysique INT,
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id)
);

CREATE TABLE Type_Arme(
   TA_id INT,
   Ta_Nom VARCHAR(50),
   PRIMARY KEY(TA_id)
);

CREATE TABLE Item(
   Eq_Id INT,
   I_Consomable BOOLEAN,
   I_Effet VARCHAR(50),
   PRIMARY KEY(Eq_Id),
   FOREIGN KEY(Eq_Id) REFERENCES Equipement(Eq_Id)
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
   T_Id INT NOT NULL,
   PRIMARY KEY(M_id),
   FOREIGN KEY(T_Id) REFERENCES TypeMonstre(T_Id)
);

CREATE TABLE Posseder(
   M_id INT,
   E_id VARCHAR(50),
   PRIMARY KEY(M_id, E_id),
   FOREIGN KEY(M_id) REFERENCES Monstre(M_id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id)
);

CREATE TABLE detenir(
   Eq_Id INT,
   TA_id INT,
   PRIMARY KEY(Eq_Id, TA_id),
   FOREIGN KEY(Eq_Id) REFERENCES Arme(Eq_Id),
   FOREIGN KEY(TA_id) REFERENCES Type_Arme(TA_id)
);

CREATE TABLE infliger(
   E_id VARCHAR(50),
   Eq_Id INT,
   DegatsElementaire INT,
   PRIMARY KEY(E_id, Eq_Id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id),
   FOREIGN KEY(Eq_Id) REFERENCES Arme(Eq_Id)
);

CREATE TABLE Resister(
   E_id VARCHAR(50),
   Eq_Id INT,
   ResistanceElementaire INT,
   PRIMARY KEY(E_id, Eq_Id),
   FOREIGN KEY(E_id) REFERENCES Elements(E_id),
   FOREIGN KEY(Eq_Id) REFERENCES Armure(Eq_Id)
);