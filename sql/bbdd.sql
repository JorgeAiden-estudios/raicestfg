CREATE DATABASE RAICES_TFG;

USE RAICES_TFG;

CREATE TABLE alumnos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    DNI VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE profesores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    DNI VARCHAR(10) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE alumnos_profesores (
    centro VARCHAR(255) NOT NULL,
    id_alumno INT,
    id_profesor INT,
    CONSTRAINT REL_ALU_PK PRIMARY KEY (id_alumno, id_profesor),
    CONSTRAINT fk_alumno
        FOREIGN KEY (id_alumno) REFERENCES alumnos(id) ON DELETE CASCADE,
    CONSTRAINT fk_profesor
        FOREIGN KEY (id_profesor) REFERENCES profesores(id) ON DELETE CASCADE
);

CREATE TABLE faltas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    hora ENUM('Primera', 'Segunda', 'Tercera', 'Cuarta'),
    motivo VARCHAR(255) NOT NULL,
    alumno_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (alumno_id) REFERENCES alumnos(id) ON DELETE CASCADE
);

CREATE TABLE asignaturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    num_horas VARCHAR(255)
);

CREATE TABLE profesores_asignaturas (
    id_asignatura INT,
    id_profesor INT,
    CONSTRAINT REL_ASIG_PK PRIMARY KEY (id_asignatura, id_profesor),
    CONSTRAINT fk_asignatura
        FOREIGN KEY (id_asignatura) REFERENCES asignaturas(id) ON DELETE CASCADE,
    CONSTRAINT fk_profesor_asi
        FOREIGN KEY (id_profesor) REFERENCES profesores(id) ON DELETE CASCADE 
);


CREATE USER tfg_DWES_jb IDENTIFIED BY "abc123.";
GRANT ALL ON RAICES_TFG.* TO tfg_DWES_jb;