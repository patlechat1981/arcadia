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


CREATE TABLE IF NOT EXISTS tous_les_animaux (
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
  etat_animal varchar(500),
  nourriture_animal varchar(500),
  quantité_nourriture text,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  vet_nourriture_quantite text,
  vet_habitatAnimaux text,
  vet_gestionHabitat text,
  PRIMARY KEY (id_animal),
  FOREIGN KEY (id_habitat) REFERENCES zoohabitats(id_habitat)
);


CREATE TABLE IF NOT EXISTS useradmin (
  id int NOT NULL AUTO_INCREMENT,
  pseudo text NOT NULL,
  email text NOT NULL,
  role text NOT NULL,
  password text NOT NULL,
  date_de_creation datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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





INSERT INTO
  service_zoo (
    nom_service,
    description_service,
    images_services,
    horaires_services,
    prix_tour
  )
VALUES
  (
    'Les Maitres des Airs  ',
    ' durant l’hiver 2011 que l’équipe du Parc Arcadia des Alpes a transformé l’ancien espace des macaques (magots) en une aire de spectacle pour les oiseaux.\r\n\r\nL’objectif de ce spectacle unique est de présenter des rapaces mais aussi des oiseaux rares, peu connus et rarement visibles dans les spectacles. Bien sûr cette représentation se veut pédagogique, elle est donc animée par l’un de nos fauconniers qui vous présentera naturellement le comportement de nos oiseaux, leurs techniques de chasse, de vols ou encore leur alimentation.\r\n\r\nAujourd’hui, c’est plus de 4 espèces d’oiseaux qui évoluent autour de vous lors de ce spectacle. Un véritable festival de couleurs avec un final époustouflant, de quoi vous laisser des souvenir inoubliables.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n',
    'https://cdn-images.zoobeauval.com/P40JeDUVgpQxkExeaFr3fNhCu0Q=/1400x831/https%3A%2F%2Fs3.eu-west-3.amazonaws.com%2Fimages.zoobeauval.com%2F2020%2F05%2F01-maitresdesairs-header-5ed0d74c93d85.jpg',
    'TOUS LES JOURS\r\n\r\n(selon conditions météo et selon affluence)\r\n\r\nDu 30/03 au  05/07/2024 :  à 16h15\r\n\r\nDu 06/07 au 01/09/2024 : à 14h25 et 16h15\r\n\r\nDu 02/09 au 06/10/2024 : à 15h\r\n\r\n\r\n35 minutes\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n',
    ''
  ),
  (
    'Les Activités ludiques ',
    'Vos enfants ont envie de devenir de véritables spécialistes de la biodiversité ? Des livrets de jeux adaptés à tous les âges sont disponibles à la Maison Beauval Nature et dans nos boutiques.\n\nLe prix d’un carnet est intégralement reversé à l’association Beauval Nature. Une façon ludique de soutenir l’association ! Une fois leur carnet complété, les enfants pourront recevoir des récompenses !\n\nVenez en apprendre plus sur le rôle de l’association Beauval Nature et découvrir les programmes de conservation qu’elle soutient.',
    'https://cdn-images.zoobeauval.com/e09t5n00gf8c25SMJh61DJeW_IY=/800x600/https%3A%2F%2Fs3.eu-west-3.amazonaws.com%2Fimages.zoobeauval.com%2F2024%2F03%2Factivites-maison-bn-02-65faa81fcee9c.jpg',
    '',
    ''
  ),
  (
    'Mappe du Zoo',
    'votre Zoo au bout d une Mppe pour une experience plus agreable..',
    'https://img.freepik.com/vector-gratis/ilustracion-mapa-parque-zoologico_53876-26944.jpg?t=st=1717603420~exp=1717607020~hmac=b31a3c454325e1d02b4eda2b88929ae2a87acc9798ee04931a4e404f7ee206ed&w=996',
    'tous les jours de 8h - 20h',
    ''
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
  (
    'Eclair',
    ' le Guepard',
    'https://th.bing.com/th/id/OIP.ZlMDsv3kDQIRsq7kliKwzgHaD5?w=328&h=180&c=7&r=0&o=5&pid=1.7',
    '',
    'Description physique\r\nGrand mammifère carnassier de la famille des félins, le guépard est 
    un animal qui présente une fourrure de couleur jaune tachetée de noir. Ses pattes avant sont
     moins longues que ses pattes arrière. Il a une petite tête, un cou allongé, des petites
     oreilles rondes et est caractérisé par une raie noire qui commence au coin de l’œil 
     et finit sur le bord de la bouche.\r\n\r\nContrairement aux autres félins, 
     ses griffes ne se rétractent pas. Elles accrochent le sol quand il court mais 
     elles ne lui permettent pas de bien grimper aux arbres parce qu’elles s\'usent vite.
      Le guépard a une colonne vertébrale qui est très flexible : elle se détend ou s\'arrondit
       pour lui permettre de faire des bonds de 6 à 8 mètres.\r\n\r\nSon lieu de vie\r\nOn retrouve
        le guépard en Afrique, dans les savanes d’Éthiopie, de Somalie, du nord de l’Afrique du Sud,
         ainsi que du sud du Sahara. Il est également présent au Moyen-Orient (Inde, Iran notamment),
          mais dans une moindre mesure.\r\n\r\nSon alimentation\r\nLe guépard est carnivore. Il se nourrit 
          entre autres de lièvres, de zèbres, de gnous et surtout de gazelles. Il mange près de 3 kg de viande
           fraîche par jour. S’il ne se trouve pas une source d\'eau à proximité, il peut rester 10 jours sans
            boire.\r\n\r\nSa reproduction\r\nVers l’âge de 15 mois, le guépard peut commencer à se reproduire.
             La période de reproduction dure toute l’année tandis que la gestation dure environ 3 mois. 
             Les femelles peuvent mettre bas jusqu\'à 8 jeunes, mais la moyenne se situe entre 
             3 et 5 petits. A la naissance, les petits guépards pèsent entre 150 et 300 g et mesurent 
             environ 30 cm. Ils sont aveugles jusqu’à l’âge de 10 jours. Les petits sont sevrés entre 3 
             et 6 mois, mais restent avec leur mère jusqu’à 20 mois, pour apprendre à chasser.\r\n\r\nSon
              espérance de vie\r\nL’espérance de vie du guépard est d’environ 13 ans lorsqu’il vit en liberté
              . Il peut cependant vivre jusqu’à l’âge de 21 ans s’il est en captivité.\r\n\r\nLe cri du 
              guépard\r\nLe guépard feule. Son cri peut faire penser à un miaulement ou à un cri d’oiseau
              .\r\n\r\nSignes particuliers\r\nLe guépard est l\'animal terrestre le plus rapide, avec une
               vitesse de course pouvant atteindre 115 km/h. Cependant, il est incapable de maintenir cet
               te vitesse sur plus de 400 mètres.',
    1,
    '17 à 21 ans',
    '80kg',
    'https://www.youtube.com/embed/LSHezdMSw-0?si=fiu6l3-XH0qAbysz',
    'etat correct',
    'poulet frais',
    '4kg',
    '2024-09-10 21:24:06',
    '7kg',
    'savane et jungle',
    'la savane soon habitat et il doit etre libre'
  );

-- CREATION DU SUPER ADMIN
INSERT INTO
  useradmin (
    pseudo,
    email,
    role,
    password,
    date_de_creation,
    secret,
    images_operateur
  )
VALUES
  (
    'patrice',
    'patrice@gmail.com',
    'administrateur',
    'aq1b6a9d72046de2afa59b59046a765c9ea67c4d26125',
    '2024-09-10 14:30:22',
    '',
    'http://www.sosveterinaires.be/wp-content/uploads/2015/03/zoo1-soigneur.jpg'
  );



INSERT INTO
  zoohabitats (
    nom_habitat,
    images_habitat,
    description_habitat,
    color
  )
VALUES
  (
    'Savane',
    'https://www.exoticca.com/fr/blog/wp-content/uploads/2018/07/safaris-en-afrique.jpg',
    'animal de la savane',
    '#ffc032'
  ),
  (
    'Jungle',
    '\r\nhttps://wallpaperaccess.com/full/328473.jpg',
    'animaux de la jungle',
    'green'
  ),
  (
    'Marais',
    'https://s3-eu-west-1.amazonaws.com/iya-news-prod.inyourarea.co.uk/2020/12/JS220029866.jpg',
    'animaux de marais',
    'blue'
  );