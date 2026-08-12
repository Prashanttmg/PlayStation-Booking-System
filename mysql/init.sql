CREATE DATABASE playstation;
USE playstation;

CREATE TABLE user (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FullName VARCHAR(100) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Phone VARCHAR(15)
);

CREATE TABLE console (
    ConsoleID INT AUTO_INCREMENT PRIMARY KEY,
    ConsoleName VARCHAR(50) NOT NULL,
    PricePerHour DECIMAL(10,2) NOT NULL,
    Availability VARCHAR(20) DEFAULT 'Available'
);

CREATE TABLE booking (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    ConsoleID INT,
    BookingDate DATE NOT NULL,
    StartTime TIME NOT NULL,
    Duration INT NOT NULL,
    Status VARCHAR(20) DEFAULT 'Booked',

    FOREIGN KEY (UserID) REFERENCES user(UserID),
    FOREIGN KEY (ConsoleID) REFERENCES console(ConsoleID)
);

CREATE TABLE tournament (
    TournamentID INT AUTO_INCREMENT PRIMARY KEY,
    TournamentName VARCHAR(100) NOT NULL,
    GameName VARCHAR(100) NOT NULL,
    TournamentDate DATE NOT NULL,
    PrizePool DECIMAL(10,2)
);

CREATE TABLE contact (
    ContactID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Message TEXT NOT NULL
);