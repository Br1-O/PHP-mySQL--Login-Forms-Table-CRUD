-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ DB CREATE INSTRUCTION ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    create database panama;

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ NEW TABLE USERS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    create table users (
        id auto_increment PRIMARY KEY,    
        'user' VARCHAR(50), 
        'password' VARCHAR(100), 
        'role' INT(3), 
        'name' VARCHAR(50), 
        lastName VARCHAR(50), 
        birthDate date, 
        gender VARCHAR(30), 
        company VARCHAR(100), 
        email VARCHAR(100), 
        phone VARCHAR(20), 
        country VARCHAR(50), 
        city VARCHAR(50), 
        socialMedia VARCHAR(50), 
        -- picture VARCHAR(255), 
        validatedEmail BOOLEAN, 
        registrationDate DATE, 
        lastLogin TIMESTAMP, 
        isActive BOOLEAN, 
        activationToken VARCHAR(100), 
        resetPasswordToken VARCHAR(100)
    );

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ NEW TABLE COMPANIES ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    CREATE TABLE IF NOT EXISTS companies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        `name` VARCHAR(50),
        `status` VARCHAR(50),
        opportunityLevel VARCHAR(20),
        nextAction VARCHAR(50),
        industry VARCHAR(50),
        services VARCHAR(200),
        phone VARCHAR(50),
        email VARCHAR(100),
        website VARCHAR(50),
        socialMedia VARCHAR(255),
        responsable VARCHAR(50),
        phoneResponsable VARCHAR(50),
        emailResponsable VARCHAR(100),
        extraInfoResponsable VARCHAR(255),
        extraInfoCompany VARCHAR(255),
        `address` VARCHAR(50),
        city VARCHAR(50),
        country VARCHAR(50),
        commentsSales1 VARCHAR(255),
        commentsSales2 VARCHAR(255),
        openingDate DATE,
        lastCheckDate DATE,
        closingContactDate DATE,
        closingDate DATE,
        nextDateForContact DATE,
        nextDateForClosing DATE,
        isInterested TINYINT(1),
        salesState VARCHAR(50),
        isClient TINYINT(1),
        salesmanAdder int(10),
        salesmanContacter int(10),
        salesmanCloser int(10),
        typeOfContract VARCHAR(100),
        companyFiles VARCHAR(255)
    )

-- ■■■■■■■■■■■■■■■■■■■■■■■■■ INSERT NEW REGISTER INTO USERS TABLE FOR ADAM ADMIN ■■■■■■■■■■■■■■■■■■■■■■■■ --

    insert into users (
        user, 
        password, 
        role, 
        name, 
        lastName, 
        birthDate, 
        gender, 
        company, 
        email, 
        phone, 
        country, 
        city, 
        socialMedia, 
        picture, 
        validatedEmail, 
        registrationDate, 
        lastLogin, 
        isActive, 
        activationToken, 
        resetPasswordToken)
        values
        ('admin',
        'admin',
        999,
        'Bruno',
        'Ortuño',
        '1990-09-20',
        'Hombre',
        'Freelancer',
        'bruno.ortuno2@gmail.com',
        '005492234376321',
        'Argentina',
        'Mar del Plata',
        '["www.facebook.com"]',
        'C:\xampp\htdocs\Proyecto_panama\public\images\default-profile-picture.png',
        '0',
        '2023-06-09',
        '0000-00-00',
        0,
        'dsfdfddsf',
        'dsfsdffdsdfs'
    );

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    SELECT *
    FROM activity
    WHERE user_id=1;




    SELECT *
    FROM users
    ORDER BY `name` DESC;

    SELECT *
    FROM users
    ORDER BY `name` ASC;

    (works with numbers or letters)

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Activity tables user-company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    -- table to record activity of users 

        create table user_activity(
            id int auto_increment PRIMARY KEY, 
            user_id int(20), 
            `action` int(10), 
            company_id int(20), 
            receiving_user_id int(20), 
            `date` datetime default current_timestamp(), 
            FOREIGN KEY (`action`) REFERENCES actions(id)
        );

    -- table to join action id to actual action

        create table actions(
            id int auto_increment PRIMARY KEY, action VARCHAR(50)
        );

        INSERT INTO actions(action) VALUES 
        ('Insertado'),
        ('Editado'),
        ('Borrado'),
        ('Mensaje leido'),
        ('Mensaje escrito'),
        ('Mensaje editado'),
        ('Mensaje borrado')
        ;

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Correlation tables user-company ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    --table to register relationship between users and companies

        create table correlation_user_company(
            id int auto_increment PRIMARY KEY, 
            company_id int(10),
            user_id int(10),
            relation int(10),
            `date` datetime default current_timestamp(), 
            FOREIGN KEY (relation) REFERENCES relations(id)
        );

    -- table to join relation id to actual relation

        create table relations(
        id int auto_increment PRIMARY KEY, relation VARCHAR(50)
        );

        INSERT INTO relations(relation) VALUES 
        ('Empleado'),
        ('Asignado para adición'),
        ('Asignado para primer contacto'),
        ('Concretó primer contacto'),
        ('Asignado para cierre'),
        ('Concretó cierre')
        ;

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ Trigger to change user-company correlation & update user activity on action ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    --on insert company

        DELIMITER @
        CREATE TRIGGER update_users_on_insert_company
        AFTER INSERT ON companies
        FOR EACH ROW 
        BEGIN

            INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES(
                NEW.id,NEW.salesmanAdder, 2);

                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES(
                    NEW.id,(SELECT id FROM users WHERE role=2 ORDER BY RAND() LIMIT 1), 3);

            INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                NEW.salesmanAdder, 1, NEW.id, 1);

        END@

    --on insert company (tira error porque la tabla que triggerea no puede ser updateada en ese trigger para evitar loops infinitos)

        DELIMITER @
        CREATE TRIGGER update_salesmanContacter_on_insert
        AFTER INSERT ON correlation_user_company
        FOR EACH ROW 
        BEGIN

            UPDATE companies SET salesmanContacter = 
            (SELECT user_id FROM correlation_user_company WHERE id = company_id AND relation = 3) WHERE id = company_id;

        END@

        DELIMITER ;


--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--

    --on update company
        DELIMITER @
        CREATE TRIGGER update_users_on_update_company
        BEFORE UPDATE ON companies
        FOR EACH ROW 
        BEGIN

            IF NEW.status != OLD.status THEN

                IF NEW.status = 'Primer contacto finalizado' THEN

                    SET NEW.status = 'Venta iniciada';
                    SET NEW.salesState = 'Presentación';
                    SET NEW.closingContactDate = CURRENT_TIMESTAMP();

                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES (
                        NEW.id, NEW.salesmanContacter, 4
                    );

                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES (
                        NEW.id, (SELECT id FROM users WHERE role = 3 ORDER BY RAND() LIMIT 1), 5
                    );

                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES (
                        NEW.id, (SELECT id FROM users WHERE role = 3 ORDER BY RAND() LIMIT 1), 5
                    );

                    SET NEW.salesmanCloser = (
                        SELECT user_id FROM correlation_user_company WHERE company_id = NEW.id AND relation = 5
                    );

                ELSEIF NEW.status = 'Venta finalizada' THEN

                    SET NEW.closingDate = CURRENT_TIMESTAMP();
                    SET NEW.salesState = 'Cerrado';

                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES (
                        NEW.id, NEW.salesmanCloser, 6
                    );

                END IF;

            END IF;

            SET NEW.lastCheckDate = CURRENT_TIMESTAMP();

        END@
        DELIMITER ;

        --(status: //No iniciado / Primer contacto iniciado / 'Primer contacto finalizado' - Venta iniciada / Venta finalizada)
        --(salesState: // Presentación // Negociación inicial // Negociación avanzada // Fase de cierre // Cerrado )




DELIMITER @
CREATE PROCEDURE ''()
BEGIN
    DECLARE `rollback` BOOL DEFAULT 0;
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `rollback` = 1;
    START TRANSACTION;

    INSERT INTO `tablea` (`date`) VALUES (NOW());
    INSERT INTO `tableb` (`date`) VALUES (NOW());
    INSERT INTO `tablec` (`date`) VALUES (NOW()); -- FAIL
    
    IF `rollback` THEN
        ROLLBACK;
    ELSE
        COMMIT;
    END IF;
END@

DELIMITER ;


DELIMITER @
CREATE TRIGGER update_users_on_insert_company
AFTER INSERT ON companies
FOR EACH ROW 
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK; -- Rollback on exception
        RESIGNAL; -- Rethrow the exception
    END;

    START TRANSACTION;
    
    -- Insert into correlation_user_company table
    INSERT INTO correlation_user_company (company_id, user_id, relation)
    VALUES (NEW.id, NEW.salesmanAdder, 2);
    
    -- Insert into user_activity table
    INSERT INTO user_activity (user_id, `action`, company_id, receiving_user_id)
    VALUES (NEW.salesmanAdder, 1, NEW.id, 0);
    
    COMMIT; -- Commit the transaction
END@
DELIMITER ;



START TRANSACTION;
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
        START TRANSACTION
            ROLLBACK TO SAVEPOINT my_savepoint;
            RESIGNAL;
        END;
    UPDATE accounts SET balance = 5000 WHERE user_id = 1;
    UPDATE accounts SET balance = 1000 WHERE user_id = 2;
    IF (SELECT balance FROM accounts WHERE user_id = 1) < 0 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Insufficient balance';
    END IF;
COMMIT;





