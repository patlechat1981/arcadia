CREATE TABLE IF NOT EXISTS zoohabitats (
  id_habitat int NOT NULL AUTO_INCREMENT,
  nom_habitat varchar(25) NOT NULL,
  images_habitat varchar(2000) NOT NULL,
  description_habitat varchar(1000) NOT NULL,
  color varchar(100) NOT NULL,
  PRIMARY KEY (id_habitat)
);
CREATE TABLE IF NOT EXISTS service_zoo (
  id_service int NOT NULL AUTO_INCREMENT,
  nom_service varchar(30) NOT NULL,
  description_service varchar(3000) NOT NULL,
  images_services varchar(1000) NOT NULL,
  horaires_services varchar(2000) NOT NULL,
  prix_tour text NOT NULL,
  PRIMARY KEY (id_service)
);
CREATE TABLE tous_les_animaux (
  id_animal int NOT NULL AUTO_INCREMENT,
  nom_animal varchar(30) NOT NULL,
  race_animal varchar(30) NOT NULL,
  images_animal varchar(500) NOT NULL,
  video_animal varchar(500) NOT NULL,
  description_animal varchar(3000) NOT NULL,
  id_habitat int UNSIGNED DEFAULT NULL,
  moyenne_age varchar(30) NOT NULL,
  poids_moyen varchar(30) NOT NULL,
  video_galleries varchar(2000) NOT NULL,
  etat_animal varchar(500) NOT NULL,
  nourriture_animal varchar(500) NOT NULL,
  quantité_nourriture text NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  vet_nourriture_quantite text NOT NULL,
  vet_habitatAnimaux text NOT NULL,
  vet_gestionHabitat text NOT NULL,
  PRIMARY KEY (id_animal),
  FOREIGN KEY id_habitat REFERENCES zoohabitats(id_habitat)
);
INSERT INTO
  tous_les_animaux (
    nom_animal,race_animal,images_animal,
    video_animal, description_animal,
    id_habitat, moyenne_age,poids_moyen,
    video_galleries,etat_animal,
    nourriture_animal, quantité_nourriture,
    date,
    vet_nourriture_quantite,
    vet_habitatAnimaux,vet_gestionHabitat
  )
VALUES
CREATE TABLE useradmin (
  id int NOT NULL AUTO_INCREMENT,
  pseudo text NOT NULL,
  email text NOT NULL,
  role text NOT NULL,
  password text NOT NULL,
  date_de_creation datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  secret text NOT NULL,
  images_operateur text NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS avis (
  id_avis int NOT NULL AUTO_INCREMENT,
  id_animal varchar(30) NOT NULL,
  visiteur_nickname varchar(30) NOT NULL,
  avis_commentaire varchar(1500) NOT NULL,
  etat varchar(10) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (id_avis),
  FOREIGN KEY id_animal REFERENCES tous_les_animaux(id_animal)
);
