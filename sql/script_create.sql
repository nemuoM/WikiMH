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
