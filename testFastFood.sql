CREATE DATABASE fastfood;

USE fastfood;

-- Tao bang cac hang muc
CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL
);

-- them vao ca hang muc do an
INSERT INTO Categories (Name) VALUES
    ('Burgers'),
    ('Pizza'),
    ('Chicken'),
    ('Sides'),
    ('Beverages');


-- Tao bang Menu cu the
CREATE TABLE MenuDetail (
    ItemID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);

-- them vao menu
INSERT INTO MenuDetail (Name, Description, Price, CategoryID) VALUES
    ('Classic Cheeseburger', 'Delicious cheeseburger with all the fixings.', 5.99, 1),
    ('Pepperoni Pizza', 'Tasty pepperoni pizza with a crispy crust.', 8.99, 2),
    ('Fried Chicken Bucket', 'Crispy fried chicken, 8 pieces.', 12.99, 3),
    ('French Fries', 'Golden and crispy french fries.', 4.99, 4),
    ('Soda', 'Refreshing soda in various flavors.', 1.99, 5);


-- Tao bang khach hang
CREATE TABLE Customers (
    CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Phone VARCHAR(20),
    Address TEXT
);

-- Tao bang don hang
CREATE TABLE Orders (
    OrderID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    CustomerName VARCHAR(255) NOT NULL,
    OrderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    TotalCost DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
);

-- Tao bang don hang cu the
CREATE TABLE OrderDetail (
    OrderItemID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    ItemID INT,
    Quantity INT NOT NULL,
    Customization TEXT,
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
    FOREIGN KEY (ItemID) REFERENCES MenuDetail(ItemID)
);

-- Tao bang thanh toan
CREATE TABLE Payments (
    PaymentID INT AUTO_INCREMENT PRIMARY KEY,
    OrderID INT,
    PaymentDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PaymentMethod VARCHAR(50),
    FOREIGN KEY (OrderID) REFERENCES Orders(OrderID)
);





-- May cai nay chay sau, chay may cai tren trc
SELECT * FROM categories;
SELECT * FROM menudetail;
SELECT * FROM customers;
SELECT * FROM orders;
SELECT * FROM orderDetail;
SELECT * FROM payments;

DESCRIBE categories;
DESCRIBE customers;
DESCRIBE menudetail;
DESCRIBE orders;
DESCRIBE orderDetail;
DESCRIBE payments;
