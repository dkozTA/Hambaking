CREATE DATABASE fastfood;

USE fastfood;

-- Tao bang cac hang muc
CREATE TABLE Categories (
    CategoryID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Featured VARCHAR(10) NOT NULL,
    active VARCHAR(10) NOT NULL,
    image_name VARCHAR(255)
);

-- -- them vao ca hang muc do an
-- INSERT INTO Categories (Name) VALUES
--     ('Burgers'),
--     ('Pizza'),
--     ('Chicken'),
--     ('Sides'),
--     ('Beverages');


-- Tao bang Menu cu the
CREATE TABLE MenuDetail (
    FoodID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    CategoryID INT UNSIGNED,
    image_name VARCHAR(255),
    Featured VARCHAR(10),
    active VARCHAR(10)
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

-- -- them vao menu
-- INSERT INTO MenuDetail (Name, Description, Price, CategoryID) VALUES
--     ('Classic Cheeseburger', 'Delicious cheeseburger with all the fixings.', 5.99, 1),
--     ('Pepperoni Pizza', 'Tasty pepperoni pizza with a crispy crust.', 8.99, 2),
--     ('Fried Chicken Bucket', 'Crispy fried chicken, 8 pieces.', 12.99, 3),
--     ('French Fries', 'Golden and crispy french fries.', 4.99, 4),
--     ('Soda', 'Refreshing soda in various flavors.', 1.99, 5);


-- tao bang admin
CREATE TABLE admin (
    id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
);


-- Tao bang khach hang
CREATE TABLE Customers (
    CustomerID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Phone VARCHAR(20),
    Address TEXT
);

-- Tao bang don hang
CREATE TABLE Orders (
    OrderID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT UNSIGNED,
    CustomerName VARCHAR(255) NOT NULL,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- Tao bang don hang cu the
CREATE TABLE OrderDetail (
    OrderFoodID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    OrderID INT UNSIGNED,
    FoodID INT UNSIGNED,
    Quantity INT NOT NULL,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (FoodID) REFERENCES MenuDetail(FoodID)
);

-- Tao bang thanh toan
CREATE TABLE Payments (
    PaymentNumber INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT UNSIGNED,
    PaymentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PaymentMethod VARCHAR(50),
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);