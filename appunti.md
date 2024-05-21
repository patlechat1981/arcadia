
ALTER TABLE tous_les_animaux ADD id_habitat SMALLINT UNSIGNED NOT NULL DEFAULT 0;

ALTER TABLE tous_les_animaux ADD CONSTRAINT fk_id_habitat FOREIGN KEY (id_habitat) REFERENCES zoohabitats(id_habitat);

SELECT * FROM tous_les_animaux WHERE id_habitat = 1;