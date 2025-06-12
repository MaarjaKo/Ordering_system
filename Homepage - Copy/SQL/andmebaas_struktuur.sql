-- Andmebaas: tellimusveeb

CREATE TABLE kliendid (
  klient_id INT AUTO_INCREMENT PRIMARY KEY,
  eesnimi VARCHAR(30),
  perenimi VARCHAR(30),
  email VARCHAR(100) UNIQUE,
  parool VARCHAR(255),
  telefon VARCHAR(20),
  ettevote VARCHAR(100),
  reg_nr VARCHAR(20),
  kmkr_nr VARCHAR(20),
  aadress_et VARCHAR(150),
  aadress_tarne VARCHAR(150),
  postiindeks VARCHAR(10),
  maakond VARCHAR(50),
  noustunud BOOLEAN DEFAULT 0,
  uudiskiri BOOLEAN DEFAULT 0,
  date_created DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tooted (
  tootekood INT AUTO_INCREMENT PRIMARY KEY,
  nimetus VARCHAR(100),
  maht INT,
  hind_kmta DECIMAL(10,2),
  kirjeldus TEXT,
  pilt VARCHAR(255),
  kogus INT,
  date_created DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tellimused (
  tellimus_id INT AUTO_INCREMENT PRIMARY KEY,
  klient_id INT,
  kuupaev DATETIME DEFAULT CURRENT_TIMESTAMP,
  lopetatud BOOLEAN DEFAULT 0,
  FOREIGN KEY (klient_id) REFERENCES kliendid(klient_id)
);

CREATE TABLE tellimuse_read (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tellimus_id INT,
  tootekood INT,
  kogus INT,
  hind DECIMAL(10,2),
  FOREIGN KEY (tellimus_id) REFERENCES tellimused(tellimus_id),
  FOREIGN KEY (tootekood) REFERENCES tooted(tootekood)
);
