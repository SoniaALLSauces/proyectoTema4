/**
 * Author:  Sonia Antón Llanes
 * Created: 3 nov. 2021
 */


    /* Creo la base de datos DAW2xxxDBDepartamentos */
        create database if not exists DAW219DBDepartamentos;

    /* Creo el usuario */
        create user if not exists 'usuarioDAW219DBDepartamentos'@'%' identified by 'P@ssw0rd';

    /* Damos permisos al usuarioDAW219DBDepartamentos */
        grant all privileges on DAW219DBDepartamentos.* to 'usuarioDAW219DBDepartamentos'@'%';

    /* Pongo en uso la base de datos creada en script creaDAW2SALDBDepartamentos */
        use DAW219DBDepartamentos;  

    /* Creo la tabla Departamentos si no existe */
        create table if not exists Departamento(  
            codDepartamento varchar(3) primary key not null,
            descDepartamento varchar(255),
            fechaBaja date,
            volumenNegocio float) engine=innodb;