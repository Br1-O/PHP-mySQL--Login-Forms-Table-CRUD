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
        resetPasswordToken VARCHAR(100),
        lastUpdatedBy INT(10)
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
        companyFiles VARCHAR(255),
        lastUpdatedBy INT(10)
    );

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ PRE-PERMADELETE TABLES ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    -- tables to save last 50 deleted companies/users

        CREATE TABLE IF NOT EXISTS deletedUsers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            idUser INT(10),
            user VARCHAR(50),
            `name` VARCHAR(50),
            lastName VARCHAR(50),
            email VARCHAR(50),
            lastUpdatedBy INT(10),
            deletedDate datetime default current_timestamp()
            );

        CREATE TABLE IF NOT EXISTS deletedCompanies (
            id INT AUTO_INCREMENT PRIMARY KEY,
            idCompany INT(10),
            `name` VARCHAR(50),
            salesmanAdder INT(10),
            salesmanContacter INT(10),
            salesmanCloser INT(10),
            lastUpdatedBy INT(10),
            deletedDate datetime default current_timestamp()
            );

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
        resetPasswordToken,
        lastUpdatedBy)
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
        'dsfsdffdsdfs',
        0
    );

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ TO USE WITH ALL FIELDS IN ADVANCE SEARCH OPTIONS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    SELECT *
    FROM users
    ORDER BY `name` DESC;

    SELECT *
    FROM users
    ORDER BY `name` ASC;



-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ User Activity tables ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

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

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ COMPANY PROCEDURES AND TRANSACTIONS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

    SHOW PROCEDURE STATUS WHERE db = 'panama' AND name = 'deleteUser';

    --on insert company

        DELIMITER $$

        CREATE PROCEDURE insertCompany(IN `name` VARCHAR(50),IN `status` VARCHAR(50),IN opportunityLevel VARCHAR(20),
                    IN nextAction VARCHAR(50),IN industry VARCHAR(50), 
                    IN services varchar(200),IN phone VARCHAR(50),IN email VARCHAR(100),IN website VARCHAR(50),IN socialMedia VARCHAR(255), 
                    IN responsable VARCHAR(50),IN phoneResponsable VARCHAR(50),IN emailResponsable VARCHAR(100),IN extraInfoResponsable VARCHAR(255), 
                    IN extraInfoCompany VARCHAR(255),IN `address` VARCHAR(50),IN city VARCHAR(50),IN country VARCHAR(50),
                    IN commentsSales1 VARCHAR(255),IN commentsSales2 VARCHAR(255),
                    IN openingDate DATE,IN lastCheckDate DATE,IN closingContactDate DATE,IN closingDate DATE,IN nextDateForContact DATE,IN nextDateForClosing DATE, 
                    IN isInterested TINYINT(1),IN salesState VARCHAR(50),IN isClient TINYINT(1),
                    IN salesmanAdder INT(10),IN salesmanContacter INT(10),IN salesmanCloser INT(10),IN typeOfContract VARCHAR(100),IN companyFiles VARCHAR(255),IN lastUpdatedBy INT(10))
        BEGIN
            DECLARE lastInsertedCompanyID INT(100);
            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;
            
            START TRANSACTION;
                --insert statement, prepare with placeholders and execute
                SET @sql = 'INSERT INTO companies (`name`, `status`, opportunityLevel, 
                            nextAction,industry,services,
                            phone,email,website,socialMedia,
                            responsable,phoneResponsable,emailResponsable,extraInfoResponsable,
                            extraInfoCompany,`address`,city,country,
                            commentsSales1,commentsSales2,
                            openingDate,lastCheckDate,closingContactDate,closingDate,nextDateForContact,nextDateForClosing,
                            isInterested,salesState,isClient,
                            salesmanAdder,salesmanContacter,salesmanCloser,typeOfContract,companyFiles,lastUpdatedBy) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    
                PREPARE stmt FROM @sql;
                
                EXECUTE stmt USING `name`, `status`, opportunityLevel, nextAction, industry, services, phone, email, website, socialMedia, 
                responsable, phoneResponsable, emailResponsable, extraInfoResponsable,
                extraInfoCompany, `address`, city, country, 
                commentsSales1, commentsSales2, 
                openingDate, lastCheckDate, closingContactDate, closingDate, nextDateForContact, nextDateForClosing, 
                isInterested, salesState, isClient,
                salesmanAdder, salesmanContacter, salesmanCloser, typeOfContract, companyFiles, lastUpdatedBy;

                --get last ID from companies table
                SET lastInsertedCompanyID = LAST_INSERT_ID();

                --deallocate the prepared statement
                DEALLOCATE PREPARE stmt;

                --this registers the correlation between the user that added the company and the company
                INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES(
                lastInsertedCompanyID,salesmanAdder, 2);

                    --this selects randomly one user with 'first contact' role to assign the company for first contact to it
                    INSERT INTO correlation_user_company(company_id,user_id,relation) VALUES(
                    lastInsertedCompanyID,(SELECT id FROM users WHERE role=2 ORDER BY RAND() LIMIT 1), 3);

                --this registers the user activity, which is 1, insert, and the company that was inserted
                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                salesmanAdder, 1, lastInsertedCompanyID, 1);

                --this sets the salesmanContacter for that company into the companies table
                UPDATE companies SET salesmanContacter = (SELECT user_id FROM correlation_user_company WHERE company_id=lastInsertedCompanyID AND relation = 3)
                WHERE id=lastInsertedCompanyID;
                
                IF is_error THEN
                        ROLLBACK;
                    ELSE
                    COMMIT;
                END IF;
        END$$

        DELIMITER ;
 
--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--
    
    --on update company

        DELIMITER $$

        CREATE PROCEDURE updateCompany(
            IN `name` VARCHAR(50),
            IN `status` VARCHAR(50),
            IN opportunityLevel VARCHAR(20),
            IN nextAction VARCHAR(50),
            IN industry VARCHAR(50),
            IN services VARCHAR(200),
            IN phone VARCHAR(50),
            IN email VARCHAR(100),
            IN website VARCHAR(50),
            IN socialMedia VARCHAR(255),
            IN responsable VARCHAR(50),
            IN phoneResponsable VARCHAR(50),
            IN emailResponsable VARCHAR(100),
            IN extraInfoResponsable VARCHAR(255),
            IN extraInfoCompany VARCHAR(255),
            IN `address` VARCHAR(50),
            IN city VARCHAR(50),
            IN country VARCHAR(50),
            IN commentsSales1 VARCHAR(255),
            IN commentsSales2 VARCHAR(255),
            IN openingDate DATE,
            IN lastCheckDate DATE,
            IN closingDate DATE,
            IN closingContactDate DATE,
            IN nextDateForContact DATE,
            IN nextDateForClosing DATE,
            IN isInterested TINYINT(1),
            IN salesState VARCHAR(50),
            IN isClient TINYINT(1),
            IN salesmanContacter INT(10),
            IN salesmanCloser INT(10),
            IN typeOfContract VARCHAR(100),
            IN lastUpdatedBy INT(10),
            IN companyId INT(10)
        )
        BEGIN
            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;

            START TRANSACTION;

                SET lastCheckDate = CURRENT_TIMESTAMP();

                SET @sql = 'UPDATE companies SET `name` = ?, `status` = ?, opportunityLevel = ?, 
                            nextAction = ?, industry = ?, services = ?, 
                            phone = ?, email = ?, website = ?, socialMedia = ?, 
                            responsable = ?, phoneResponsable = ?, emailResponsable = ?, 
                            extraInfoResponsable = ?, extraInfoCompany = ?, 
                            `address` = ?, city = ?, country = ?, 
                            commentsSales1 = ?, commentsSales2 = ?, 
                            openingDate = ?, lastCheckDate = ?, closingContactDate = ?, closingDate = ?, 
                            nextDateForContact = ?, nextDateForClosing = ?, 
                            isInterested = ?, salesState = ?, isClient = ?, 
                            salesmanContacter = ?, salesmanCloser = ?, typeOfContract = ?, lastUpdatedBy = ? 
                            WHERE id = ?';

                PREPARE stmt FROM @sql;

                EXECUTE stmt USING `name`, `status`, opportunityLevel, nextAction, industry, services, 
                    phone, email, website, socialMedia, responsable, phoneResponsable, emailResponsable, 
                    extraInfoResponsable, extraInfoCompany, `address`, city, country, 
                    commentsSales1, commentsSales2, openingDate, lastCheckDate, closingContactDate, closingDate, 
                    nextDateForContact, nextDateForClosing, isInterested, salesState, isClient, 
                    salesmanContacter, salesmanCloser, typeOfContract, lastUpdatedBy, companyId;

                DEALLOCATE PREPARE stmt;

                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                    lastUpdatedBy, 2, companyId, 1);

                IF is_error THEN
                    ROLLBACK;
                ELSE
                    COMMIT;
                END IF;

        END$$

        DELIMITER ;

    --(status: //No iniciado / Primer contacto iniciado / 'Primer contacto finalizado' - Venta iniciada / Venta finalizada)
    --(salesState: // Presentación // Negociación inicial // Negociación avanzada // Fase de cierre // Cerrado )

--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--

    --on delete company

        DELIMITER $$

        CREATE PROCEDURE deleteCompany(IN companyId INT(100), IN LastUpdatedBy INT(100))
            
        BEGIN
            DECLARE companyName VARCHAR(50);
            DECLARE companyAdder INT(10);
            DECLARE companyContacter INT(10);
            DECLARE companyCloser INT(10);

            DECLARE totalDeletedCompanies INT(3);

            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;

            START TRANSACTION;

                UPDATE companies set lastCheckDate = CURRENT_TIMESTAMP(), lastUpdatedBy = LastUpdatedBy WHERE id=companyId;

                SET companyName = (SELECT `name` from companies WHERE id=companyId);
                SET companyAdder= (SELECT salesmanAdder from companies WHERE id=companyId);
                SET companyContacter= (SELECT salesmanContacter from companies WHERE id=companyId);
                SET companyCloser= (SELECT salesmanCloser from companies WHERE id=companyId);

                INSERT INTO deletedCompanies(idCompany,`name`,salesmanAdder,salesmanContacter,salesmanCloser,lastUpdatedBy)VALUES
                (companyId,companyName,companyAdder,salesmanContacter,salesmanCloser,LastUpdatedBy);

                SET totalDeletedCompanies = (SELECT COUNT(*) FROM deletedCompanies);

                IF totalDeletedCompanies > 50 THEN
                    DELETE FROM deletedCompanies
                    ORDER BY id
                    LIMIT 1;
                END IF;

                DELETE from companies WHERE id = companyId;

                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                    LastUpdatedBy, 3, companyId, 1);

                IF is_error THEN
                    ROLLBACK;
                ELSE
                    COMMIT;
                END IF;

        END$$

        DELIMITER ;

--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ USER TRIGGERS, PROCEDURES AND TRANSACTIONS ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--

    --on insert user

        DELIMITER $$

        CREATE PROCEDURE insertUser(
            IN user VARCHAR(50),IN `password` VARCHAR(100),IN `role` INT(3),IN `name` VARCHAR(50),IN lastName VARCHAR(50), 
            IN birthDate DATE,IN gender VARCHAR(30),IN company VARCHAR(100),IN email VARCHAR(100),IN phone VARCHAR(20), 
            IN country VARCHAR(50),IN city VARCHAR(50),IN picture VARCHAR(50),IN validatedEmail BOOLEAN, 
            IN registrationDate DATE,IN lastLogin TIMESTAMP,IN isActive BOOLEAN,IN activationToken VARCHAR(100),IN resetPasswordToken VARCHAR(100),IN lastUpdatedBy INT(10)
            )

        BEGIN
            DECLARE lastInsertedUserID INT(20);
            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;
            
            START TRANSACTION;
            
                SET @sql = 'INSERT INTO users 
                            (user, `password`, `role`, `name`, lastName, 
                            birthDate, gender, company, email, phone, 
                            country, city, picture, validatedEmail, 
                            registrationDate, lastLogin, isActive, activationToken, resetPasswordToken, lastUpdatedBy)
                            VALUES 
                            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    
                PREPARE stmt FROM @sql;
                
                EXECUTE stmt USING user, `password`, `role`, `name`, lastName, 
                                    birthDate, gender, company, email, phone, 
                                    country, city, picture, validatedEmail, 
                                    registrationDate, lastLogin, isActive, activationToken, resetPasswordToken, lastUpdatedBy;

                SET lastInsertedUserID = LAST_INSERT_ID();

                DEALLOCATE PREPARE stmt;

                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                lastUpdatedBy, 1, 1, lastInsertedUserID);
                
                IF is_error THEN
                        ROLLBACK;
                    ELSE
                    COMMIT;
                END IF;
        END$$

        DELIMITER ;

--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--

    --on delete user

        DELIMITER $$

        CREATE PROCEDURE deleteUser(IN userId INT(100), IN LastUpdatedBy INT(100))
            
        BEGIN
            DECLARE user VARCHAR(50);
            DECLARE `name` VARCHAR(50);
            DECLARE lastName VARCHAR(50);
            DECLARE email VARCHAR(50);
            DECLARE deletedDate DATE;

            DECLARE totalDeletedUsers INT(3);

            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;

            START TRANSACTION;

                UPDATE users set lastUpdatedBy = LastUpdatedBy WHERE id=userId;

                SET user = (SELECT user from users WHERE id=userId);
                SET `name`= (SELECT `name` from users WHERE id=userId);
                SET lastName= (SELECT lastName from users WHERE id=userId);
                SET email= (SELECT email from users WHERE id=userId);

                INSERT INTO deletedUsers(idUser,user,`name`,lastName,email,lastUpdatedBy)VALUES
                (userId,user,`name`,lastName,email,LastUpdatedBy);

                SET totalDeletedUsers = (SELECT COUNT(*) FROM deletedUsers);

                IF totalDeletedUsers > 50 THEN
                    DELETE FROM deletedUsers
                    ORDER BY id
                    LIMIT 1;
                END IF;

                DELETE from users WHERE id = userId;

                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                    LastUpdatedBy, 3, 1, userId);

                IF is_error THEN
                    ROLLBACK;
                ELSE
                    COMMIT;
                END IF;

        END$$

        DELIMITER ;

--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--

    --on update user

        DELIMITER $$

        CREATE PROCEDURE updateUser(
            IN id VARCHAR(100),
            IN user VARCHAR(50),
            IN `password` VARCHAR(100),
            IN `role` INT(3),
            IN  `name` VARCHAR(50),
            IN lastName VARCHAR(50),
            IN birthDate date,
            IN gender VARCHAR(30),
            IN company VARCHAR(100),
            IN email VARCHAR(100),
            IN phone VARCHAR(20),
            IN country VARCHAR(50),
            IN city VARCHAR(50),
            IN validatedEmail BOOLEAN,
            IN LastUpdatedBy INT(10)
        )
        BEGIN
            DECLARE is_error INT DEFAULT 0;
            DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET is_error = 1;

            START TRANSACTION;

                SET @sql = 'UPDATE users SET user = ?, `password` = ?, `role` = ?,
                            `name` = ?, lastName = ?, birthDate = ?, 
                            gender = ?, company = ?, email = ?, phone = ?,
                            country = ?, city = ?, validatedEmail = ?
                            WHERE id = ?';

                PREPARE stmt FROM @sql;

                EXECUTE stmt USING user, `password`, `role`, `name`, lastName, birthDate, 
                    gender, company, email, phone, country, city, validatedEmail, id;

                DEALLOCATE PREPARE stmt;

                INSERT INTO user_activity(user_id,`action`,company_id,receiving_user_id) VALUES(
                LastUpdatedBy, 2, 1, id);

                IF is_error THEN
                    ROLLBACK;
                ELSE
                    COMMIT;
                END IF;
        END$$

        DELIMITER ;

--■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■--
