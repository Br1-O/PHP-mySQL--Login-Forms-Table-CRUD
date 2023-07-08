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
        closingDate DATE,
        nextDateForContact DATE,
        nextDateForClosing DATE,
        isInterested TINYINT(1),
        salesState VARCHAR(50),
        isClient TINYINT(1),
        salesmanContacter VARCHAR(50),
        salesmanCloser VARCHAR(50),
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

-- ■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■■ --

SELECT *
FROM activity
WHERE user_id=1;




SELECT *
FROM users
ORDER BY birth_date DESC;

SELECT *
FROM users
ORDER BY birth_date ASC;

(works with numbers or letters)


-- table to record activity of users 

    create table user_activity(
        id int auto_increment PRIMARY KEY, 
        user_id VARCHAR(20), 
        `action` int(10), 
        company_id int(20), 
        receving_user_id int(20), 
        `date` datetime default current_timestamp(), 
        FOREIGN KEY (user_id) REFERENCES users(id), 
        FOREIGN KEY (company_id) REFERENCES companies(id), 
        FOREIGN KEY (receiving_user_id) REFERENCES users(id)
    );

-- table to switch action id to actual action

create table actions(
    id int auto_increment PRIMARY KEY, action VARCHAR(50)
;)

INSERT INTO actions(action) VALUES 
('insert'),
('edit'),
('delete'),
('write_PM'),
('read_PM'),
('edit_PM'),
('delete_PM')
;

create table company_actions(
    id int auto_increment PRIMARY KEY, 


)

--table to register relationship between users and companies

    create table correlation_user_company(
        id int auto_increment PRIMARY KEY, 
        company_id int(10),
        user_id int(10),
        relation int(10),
        `date` datetime default current_timestamp(), 
        FOREIGN KEY (company_id) REFERENCES companies(id),
        FOREIGN KEY (user_id) REFERENCES users(id),
    );

    (relation:
    0_employee of that company,
    1_assigned for adding/added by,
    2_assigned for 1st contact to,
    3_closed 1st contact by,
    4_assigned for sales to,
    5_closed sale by
    )



CREATE 









