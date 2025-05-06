CREATE DATABASE evaluacion;

USE evaluacion;

CREATE TABLE docentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    asignatura VARCHAR(100)
);

CREATE TABLE evaluaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    docente_id INT,
    calificacion INT,
    comentario TEXT,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (docente_id) REFERENCES docentes(id)
);