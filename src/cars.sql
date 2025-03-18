-- Create Database
CREATE DATABASE CarInventory;

-- Use Database
USE CarInventory;

-- Create Cars Table
CREATE TABLE Cars (
    CarID INT AUTO_INCREMENT PRIMARY KEY,
    Make VARCHAR(50) NOT NULL,
    Model VARCHAR(50) NOT NULL,
    Year INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    Color VARCHAR(30),
    Mileage INT,
    VIN VARCHAR(17) UNIQUE NOT NULL
);

-- Create Customers Table
CREATE TABLE Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) UNIQUE NOT NULL,
    Phone VARCHAR(15),
    Address VARCHAR(255)
);

-- Create Sales Table
CREATE TABLE Sales (
    SaleID INT AUTO_INCREMENT PRIMARY KEY,
    CarID INT,
    CustomerID INT,
    SaleDate DATE NOT NULL,
    SalePrice DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (CarID) REFERENCES Cars(CarID),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- CRUD Operations

-- Insert Data (CREATE)
INSERT INTO Cars (Make, Model, Year, Price, Color, Mileage, VIN) 
VALUES ('Toyota', 'Camry', 2022, 25000.00, 'Blue', 5000, '1HGCM82633A123456');

INSERT INTO Customers (FirstName, LastName, Email, Phone, Address) 
VALUES ('John', 'Doe', 'johndoe@example.com', '123-456-7890', '123 Elm St, City, State');

INSERT INTO Sales (CarID, CustomerID, SaleDate, SalePrice) 
VALUES (1, 1, '2025-03-17', 24000.00);

-- Retrieve Data (READ)
SELECT * FROM Cars;
SELECT * FROM Customers;
SELECT * FROM Sales;

-- Update Data (UPDATE)
UPDATE Cars SET Price = 23000.00 WHERE CarID = 1;
UPDATE Customers SET Phone = '987-654-3210' WHERE CustomerID = 1;
UPDATE Sales SET SalePrice = 23500.00 WHERE SaleID = 1;

-- Delete Data (DELETE)
DELETE FROM Cars WHERE CarID = 1;
DELETE FROM Customers WHERE CustomerID = 1;
DELETE FROM Sales WHERE SaleID = 1;
