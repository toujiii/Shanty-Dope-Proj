# Shanty-Dope-Proj.
ITELEC 4100

Notes:
--------------------------------------------------------------------------
Font Style: Ubuntu
Pallete:
    #1B3C53
    #456882
    #D2C1B6
    #F9F3EF


SQL

CREATE TABLE charity_request (
    request_id INT(11) NOT NULL AUTO_INCREMENT,
    description TEXT NOT NULL,
    datetime DATETIME NOT NULL,
    approved_datetime DATETIME NULL,
    fund_limit INT(6) NOT NULL,
    duration INT(2) NOT NULL,
    id_type_used ENUM('Passport', 'Driver''s License', 'National ID') NOT NULL,
    id_number VARCHAR(50) NOT NULL,
    id_att_link VARCHAR(255) NOT NULL,
    front_face_link VARCHAR(255) NOT NULL,
    side_face_link VARCHAR(255) NOT NULL,
    request_status ENUM('Pending', 'Approved', 'Rejected') NOT NULL,
    user_id INT(11) NOT NULL,
    PRIMARY KEY (request_id),
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) 
        ON DELETE NO ACTION 
        ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE charity (
    charity_id INT(11) NOT NULL AUTO_INCREMENT,
    request_id INT(11) NOT NULL,
    raised INT(6) NOT NULL,
    charity_status ENUM('Ongoing', 'Finished') NOT NULL,
    PRIMARY KEY (charity_id),
    FOREIGN KEY (request_id) REFERENCES charity_requests(request_id)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE donators (
    donation_id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    charity_id INT(11) NOT NULL,
    amount INT(6) NOT NULL,
    datetime DATETIME NOT NULL,
    payment_method ENUM('GCash') NOT NULL,
    PRIMARY KEY (donation_id)
);
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50) NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gcash_number VARCHAR(11),
    status ENUM('Active', 'Offline', 'Pending') NOT NULL
);

