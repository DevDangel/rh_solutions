CREATE TABLE solicitud_certificado(
    id_solicitud INT PRIMARY KEY NOT NULL,
    id_contrato INT NOT NULL COMMENT 'Este id es fundamental para traerme todos los campos de las demas tablas, doc_usuario, nombrecompleto, tipo_decontrato',
    motivo TEXT NOT NULL COMMENT 'motivo por el cual solicita el certificado',
    FOREIGN KEY (id_contrato) REFERENCES contrato(id_contrato)
);

INSERT INTO usuarios (
    doc_usuario, tip_documento, pri_nombre, seg_nombre, pri_apellido, seg_apellido,
    fec_nacimiento, tip_sangre, sex_usuario, estado_civil, dir_usuario, cel_usuario,
    cel_emer_usuario, correo_usuario, registro_profesional, contraseña,
    id_departamento, id_municipio, id_estado, id_cargo, id_eps, id_pension, id_arl,
    id_caj_compen, id_profesion
) VALUES
('1012345678', 'CC', 'Andrés', 'Felipe', 'Ramírez', 'Gómez', '1990-05-15', 'A+', 'Masculino', 'Soltero(a)', 'Calle 23 #45', '3101234567', '3107654321', 'andres.ramirez@mail.com', 'REG1234', 'passAnd123', 23, 959, 7, 14, 5, 3, 8, 19, 3),
('1012345679', 'CC', 'María', 'Isabel', 'López', 'Martínez', '1988-11-20', 'O+', 'Femenino', 'Casado(a)', 'Carrera 15 #7-10', '3109876543', '3103456789', 'maria.lopez@mail.com', 'REG5678', 'passMari456', 23, 959, 2, 22, 2, 4, 5, 11, 7),
('1012345680', 'CC', 'Juan', 'Carlos', 'Pérez', 'Rodríguez', '1992-07-08', 'B-', 'Masculino', 'Divorciado(a)', 'Av. Las Flores #9', '3112345678', '3118765432', 'juan.perez@mail.com', 'REG9101', 'passJuan789', 23, 959, 9, 19, 1, 5, 7, 2, 4),
('1012345681', 'CC', 'Catalina', 'María', 'González', 'Suárez', '1995-01-10', 'AB+', 'Femenino', 'Soltero(a)', 'Calle 45 #22', '3102223333', '3104445555', 'catalina.gonzalez@mail.com', 'REG1121', 'passCat234', 23, 959, 3, 7, 6, 2, 4, 25, 1),
('1012345682', 'CC', 'Luis', 'Fernando', 'Morales', 'Castro', '1987-09-30', 'A-', 'Masculino', 'Casado(a)', 'Cra 10 #5-15', '3111112222', '3113334444', 'luis.morales@mail.com', 'REG3141', 'passLuis567', 23, 959, 6, 10, 9, 1, 3, 9, 5),
('1012345683', 'CC', 'Valentina', 'Sofía', 'Ramírez', 'Vargas', '1993-03-25', 'O-', 'Femenino', 'Divorciado(a)', 'Calle 7 #33', '3105556666', '3107778888', 'valentina.ramirez@mail.com', 'REG5161', 'passVal890', 23, 959, 8, 16, 4, 3, 2, 14, 6),
('1012345684', 'CC', 'David', 'Alejandro', 'Hernández', 'Salazar', '1991-12-12', 'B+', 'Masculino', 'Soltero(a)', 'Av. 20 #8', '3119990000', '3118887777', 'david.hernandez@mail.com', 'REG7181', 'passDav123', 23, 959, 5, 23, 7, 5, 9, 5, 2),
('1012345685', 'CC', 'Juliana', 'Fernanda', 'Torres', 'Ramírez', '1989-08-08', 'AB-', 'Femenino', 'Casado(a)', 'Carrera 11 #3-20', '3103332222', '3104443333', 'juliana.torres@mail.com', 'REG9202', 'passJul456', 23, 959, 1, 25, 3, 4, 6, 12, 8),
('1012345686', 'CC', 'Santiago', 'Andrés', 'Castillo', 'Mendoza', '1994-06-18', 'A+', 'Masculino', 'Soltero(a)', 'Calle 30 #14', '3111212121', '3113434343', 'santiago.castillo@mail.com', 'REG1222', 'passSan789', 23, 959, 4, 21, 8, 1, 1, 1, 7),
('1012345687', 'CC', 'Laura', 'Beatriz', 'Ruiz', 'Ochoa', '1990-10-05', 'O+', 'Femenino', 'Divorciado(a)', 'Av. Central #10', '3104545454', '3106767676', 'laura.ruiz@mail.com', 'REG3242', 'passLau012', 23, 959, 10, 12, 10, 2, 10, 24, 4);
