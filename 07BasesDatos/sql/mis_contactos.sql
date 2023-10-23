/*
comentario SQL
SQL: Structure Query Language (Lenguaje Estructurado de Consulta)

Base de Datos: Una coleccion de datos organizados.

Gestores o manejadores de BD (Base de Datos) son los programas que nos permiten administrar los datos

Ejemplos:
Microsoft Access, Microsoft SQL Server, ORACLE, Informix, DBASE, SQL Lite, PostgresSQL, MySQL.

Una Sentencia SQL es una linea de código para trabajar con la DB

Existen dos tipo de sentencias SQL:

1) Estructurales: Nos permiten crear, modificar o eliminar objetos, usuarios y propiedade de la BD

2) Datos: Nos permiten insertar, eliminar, modificar y buscar información en nuestra BD

En MySQL existen dos tipos de engine para tablas:
1)MyISAM - Tablas Planas (como Excel)
2)InnoDB - Tablas Relacionales (como Access)
 */
CREATE DATABASE mis_contactos;

USE mis_contactos;

CREATE TABLE
    contactos (
        email VARCHAR(50) NOT NULL,
        nombre VARCHAR(50) NOT NULL,
        sexo CHAR(1),
        nacimiento DATE,
        telefono VARCHAR(13),
        pais VARCHAR(50) NOT NULL,
        imagen VARCHAR(50),
        PRIMARY KEY (email),
        FULLTEXT KEY buscador (email, nombre, sexo, telefono, pais)
    ) ENGINE = MyISAM DEFAULT CHARSET = latin1;

CREATE TABLE
    pais (
        id_pais INT NOT NULL AUTO_INCREMENT,
        pais VARCHAR(50) NOT NULL,
        PRIMARY KEY (id_pais)
    ) ENGINE = MyISAM DEFAULT CHARSET = latin1;

INSERT INTO
    pais (id_pais, pais)
VALUES
    (1, "México"),
    (2, "Argentina"),
    (3, "Bolivia"),
    (4, "Brasil"),
    (5, "Chile"),
    (6, "Colombia"),
    (7, "Costa Rica"),
    (8, "Cuba"),
    (9, "Ecuador"),
    (10, "El Salvador"),
    (11, "Guatemala"),
    (12, "Haití"),
    (13, "Honduras"),
    (15, "Nicaragua"),
    (16, "Panamá"),
    (17, "Paraguay"),
    (18, "Perú"),
    (19, "República Dominica"),
    (20, "Uruguay"),
    (21, "Venezuela"),
    (22, "España"),
    (23, "Canadá"),
    (24, "Estados Unidos"),
    (25, "Groenlandia"),
    (26, "Inglaterra"),
    (27, "Francia"),
    (28, "Alemania"),
    (29, "Italia"),
    (30, "Japón"),
    (31, "China"),
    (32, "Egipto"),
    (33, "Sudáfrica"),
    (34, "Australia"),
    (35, "Nueva Zelanda");