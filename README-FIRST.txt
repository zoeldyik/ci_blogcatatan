di buat dengan 2 tabel table data dan admin


CREATE TABLE data(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    judul varchar(255),
    teks text,
    kategori varchar(255)
)


CREATE TABLE admin(
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nama varchar(255),
    password text
)


