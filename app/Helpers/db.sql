CREATE TABLE banner (
    id INT AUTO_INCREMENT NOT NULL,
    titulo VARCHAR(126),
    texto VARCHAR(252),
    imagemUrl VARCHAR(252),
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    deleted_at TIMESTAMP,
    PRIMARY KEY (id)
);