CREATE TABLE Animals (
	PetID CHAR(9) PRIMARY KEY,
	Name VARCHAR(20) NOT NULL,
	Owner CHAR(5) NOT NULL REFERENCES Customers ON DELETE CASCADE,
	Weight INT,
	Gender CHAR(1),
	Age INT,
	Breed VARCHAR(20),
	FeedingSchedule TEXT,
	VetInfo TEXT,
	MedsSchedule TEXT
);

CREATE TABLE Reptile (
	PetID CHAR(9) PRIMARY KEY REFERENCES Animals ON DELETE CASCADE,
	HumidityLevels INT,
	TempLevels INT
);

CREATE TABLE Cats (
	PetID CHAR(9) PRIMARY KEY REFERENCES Animals ON DELETE CASCADE,
	IsVaccinated CHAR(1),
IsNeutered CHAR(1),
IsMicrochipped CHAR(1),
IsFriendly_w_dogs CHAR(1),
IsFriendly_w_cats CHAR(1),
IsFriendly_w_kids CHAR(1),
EnergyLevels TEXT
);

CREATE TABLE Dogs (
	PetID CHAR(9) PRIMARY KEY REFERENCES Animals ON DELETE CASCADE,
	IsVaccinated CHAR(1),
IsNeutered CHAR(1),
IsMicrochipped CHAR(1),
IsFriendly_w_dogs CHAR(1),
IsFriendly_w_cats CHAR(1),
IsFriendly_w_kids CHAR(1),
PottyBreak_Schedule TEXT,
EnergyLevels TEXT
);
 
CREATE TABLE Sitters (
SitterID CHAR(9) PRIMARY KEY,
Address VARCHAR(100),
Availability TIME,
PhoneNumber CHAR(10)
);

CREATE TABLE Customers (
CustomerID CHAR(9) PRIMARY KEY
);

CREATE TABLE Service (
ServiceID CHAR(9) PRIMARY KEY,
StartDate DATE,
EndDate DATE,
Rate REAL
);

CREATE TABLE Accounts (
EmailAddress VARCHAR(50) PRIMARY KEY,
ZipCode VARCHAR(10),
FirstName VARCHAR(30) NOT NULL,
LastName VARCHAR(30) NOT NULL,
CustomerID CHAR(9) REFERENCES Customers,
SitterID CHAR(9) REFERENCES Sitters
);
