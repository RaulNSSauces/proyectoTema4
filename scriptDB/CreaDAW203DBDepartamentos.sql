-- CREACIÓN DE LA BASE DE DATOS: DAW203DBDepartamentos --

CREATE DATABASE IF NOT EXISTS DAW203DBDepartamentos;

-- CREACIÓN DE USUARIO ADMINISTRADOR DE LA BASE DE DATOS: usuarioDAW203DBDepartamentos / CONTRASEÑA: P@ssw0rd --

CREATE USER IF NOT EXISTS 'usuarioDAW203DBDepartamentos'@'%' IDENTIFIED BY 'P@ssw0rd';

-- UTILIZAMOS LA BASE DE DATOS: DAW203DBDepartamentos --

USE DAW203DBDepartamentos;

-- CREACIÓN DE LAS TABLAS DE LA BASE DE DATOS: DAW203DBDepartamentos --

CREATE TABLE Departamento (
CodDepartamento VARCHAR(3),
DescDepartamento VARCHAR(255),
FechaBaja DATE,
VolumenNegocio FLOAT,
PRIMARY KEY(CodDepartamento)
);

-- OTORGAR PERMISOS A LA TABLA: Departamento --

GRANT ALL PRIVILEGES ON DAW203DBDepartamentos.* TO 'usuarioDAW203DBDepartamentos'@'%';