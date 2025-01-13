-- Table Users
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);



-- Table Admin (hérite de Users)
CREATE TABLE Admin (
    admin_id INT PRIMARY KEY,
    FOREIGN KEY (admin_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Table Jeu
CREATE TABLE jeu (
    jeu_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    type VARCHAR(50),
    rating VARCHAR(10),
    temps TIME,
    version VARCHAR(20),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    image text NOT NULL
);

ALTER TABLE jeu ADD COLUMN screenshot_1 text NOT NULL;
ALTER TABLE jeu ADD COLUMN screenshot_2 text NOT NULL;
ALTER TABLE jeu ADD COLUMN screenshot_3 text NOT NULL;

-- Table Chat **********
CREATE TABLE chat (
    chat_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    jeu_id INT, 
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (jeu_id) REFERENCES jeu(jeu_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

-- Table Bannes
CREATE TABLE Bannes (
    banne_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    bannet_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    admin_id INT,
    FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
    FOREIGN KEY (admin_id) REFERENCES Admin(admin_id) ON DELETE SET NULL
);


CREATE TABLE bibliotheque (
    bib_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    jeu_id INT,
    date_achat DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (jeu_id) REFERENCES jeu(jeu_id) ON DELETE CASCADE
);
ALTER TABLE bibliotheque ADD COLUMN status ENUM('In progress', 'Completed', 'Abandoned') DEFAULT 'In progress';
;

-- Table Notation
CREATE TABLE notation (
    notation_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    jeu_id INT,
    rating INT CHECK (rating between 1 AND 5),
    review TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (jeu_id) REFERENCES jeu(jeu_id) ON DELETE CASCADE
);


-- Table Favoris
CREATE TABLE Favoris( 
    favoris_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    jeu_id INT, 
    add_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (jeu_id) REFERENCES jeu(jeu_id) ON DELETE CASCADE
);




-- Table Historique
CREATE TABLE historique (
    his_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    jeu_id INT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (jeu_id) REFERENCES jeu(jeu_id) ON DELETE CASCADE
);

