/**
 * Author:  Sonia Antón Llanes
 * Created: 3 nov. 2021
 */


    /* Pongo en uso la base de datos creada en script creaDAW2SALDBDepartamentos */
        use DAW219DBDepartamentos;  

    /* Creo la tabla Departamentos si no existe */
        INSERT INTO Departamento(CodDepartamento,DescDepartamento,FechaBaja,VolumenNegocio) VALUES
            ('INF', 'Departamento de informatica',null,1),
            ('VEN', 'Departamento de ventas',null,2),
            ('CON', 'Departamento de contabilidad',null,3),
            ('COC', 'Departamento de cocina',null,4),
            ('MEC', 'Departamento de mecanica',null,5),
            ('MAT', 'Departamento de matematicas',null,6);