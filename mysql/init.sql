CREATE DATABASE IF NOT EXISTS playstation;
USE playstation;

DROP TABLE IF EXISTS tournament_participants;
DROP TABLE IF EXISTS contact;
DROP TABLE IF EXISTS tournament;
DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS console;
DROP TABLE IF EXISTS user;

CREATE TABLE user (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone VARCHAR(15),
    Role ENUM('user','admin') DEFAULT 'user'
) ENGINE=InnoDB;

CREATE TABLE console (
    ConsoleID INT AUTO_INCREMENT PRIMARY KEY,
    ConsoleName VARCHAR(50) NOT NULL,
    PricePerHour DECIMAL(10,2) NOT NULL,
    Availability VARCHAR(20) DEFAULT 'Available'
) ENGINE=InnoDB;



CREATE TABLE tournament (
    TournamentID INT AUTO_INCREMENT PRIMARY KEY,
    TournamentName VARCHAR(100) NOT NULL,
    GameName VARCHAR(100) NOT NULL,
    TournamentDate DATE NOT NULL,
    PrizePool DECIMAL(10,2),
    EntryFee DECIMAL(10,2) DEFAULT 250,
    MaxPlayers INT DEFAULT 32,
    Status VARCHAR(20) DEFAULT 'Upcoming',
    StartTime TIME,
    TournamentVideo VARCHAR(255)
) ENGINE=InnoDB;

CREATE TABLE tournament_participants(
    ParticipantID INT AUTO_INCREMENT PRIMARY KEY,
    TournamentID INT NOT NULL,
    UserID INT NOT NULL,

    FOREIGN KEY (TournamentID)
        REFERENCES tournament(TournamentID)
        ON DELETE CASCADE,

    FOREIGN KEY (UserID)
        REFERENCES user(UserID)
        ON DELETE CASCADE
) ENGINE=InnoDB;
CREATE TABLE booking (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
    ConsoleID INT NOT NULL,
    BookingDate DATE NOT NULL,
    StartTime TIME NOT NULL,
    Duration INT NOT NULL,
    Status ENUM('Pending','Approved','Cancelled') DEFAULT 'Pending',

    FOREIGN KEY (UserID)
        REFERENCES user(UserID)
        ON DELETE CASCADE,

    FOREIGN KEY (ConsoleID)
        REFERENCES console(ConsoleID)
        ON DELETE CASCADE
) ENGINE=InnoDB;
CREATE TABLE contact (
    ContactID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Message TEXT NOT NULL
) ENGINE=InnoDB;

INSERT INTO user (FullName, Email, Password, Phone, Role)
VALUES (
    'Admin',
    'admin@namuz.com',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    '9800000000',
    'admin'
);

INSERT INTO console (ConsoleName, PricePerHour, Availability) VALUES
('PlayStation 5 - 1', 200, 'Available'),
('PlayStation 5 - 2', 200, 'Available'),
('PlayStation 5 - 3', 200, 'Available');

INSERT INTO tournament
(
 TournamentName,
 GameName,
 TournamentDate,
 PrizePool,
 EntryFee,
 MaxPlayers,
 Status,
 StartTime,
 TournamentVideo
)
VALUES
(
 'FIFA Championship 2026',
 'EA FC 26',
 '2026-12-20',
 10000,
 250,
 32,
 'Upcoming',
 '14:00:00',
 ''
);