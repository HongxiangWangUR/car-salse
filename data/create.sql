DROP TABLE IF EXISTS Storage;
DROP TABLE IF EXISTS Sales;
DROP table if EXISTS Warehouse;
DROP table if EXISTS Product;
DROP table if EXISTS Customer;

CREATE TABLE Warehouse(
	Location VARCHAR(100) PRIMARY KEY
);

CREATE TABLE Product(
	Product_name VARCHAR(50),
	Brand VARCHAR(100),
	Total_quantity int NOT NULL,
	Cost float NOT NULL,
	Sales_price float NOT NULL,
	PRIMARY KEY (Product_name, Brand)
);

create table Customer(
	Email VARCHAR(200),
	Username VARCHAR(100),
	Password VARCHAR(100),
	Address VARCHAR(200),
	PRIMARY KEY (Email)
);

CREATE TABLE Storage (
	Location VARCHAR(100),
	Product_name VARCHAR(50),
	Brand VARCHAR(100),
	Quantity int NOT NULL DEFAULT 0,
	CONSTRAINT Storage_FK_Loc
		FOREIGN KEY(Location) REFERENCES Warehouse(Location)
			ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT Storage_FK_Pro
		FOREIGN KEY(Product_name, Brand) REFERENCES Product(Product_name, Brand)
			ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT Storage_PK
		PRIMARY KEY(Location, Product_name, Brand)	
);

CREATE TABLE Sales (
	Email VARCHAR(200),
	Product_name VARCHAR(50),
	Brand VARCHAR(100),
	Quantity int NOT NULL,
	Sale_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT Sales_FK_Cus
		FOREIGN KEY(Email) REFERENCES Customer(Email)
			ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT Sales_FK_Pro
		FOREIGN KEY(Product_name, Brand) REFERENCES Product(Product_name, Brand)
			ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT Sales_PK
		PRIMARY KEY(Email, Product_name, Brand, Sale_date)
);
