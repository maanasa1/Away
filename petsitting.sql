CREATE TABLE Animals (
	PetID CHAR(9) PRIMARY KEY,
	Name VARCHAR(20) NOT NULL,
	Owner SERIAL NOT NULL REFERENCES Customers ON DELETE CASCADE,
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
    user_id SERIAL PRIMARY KEY REFERENCES Users,
    zipcode CHAR(5),
    available_days VARCHAR(70),
    available_times VARCHAR(30),
    size_pref VARCHAR(60),
    type_pref VARCHAR(30)
);

CREATE TABLE Customers (
    user_id SERIAL PRIMARY KEY REFERENCES Users
);

CREATE TABLE Service (
    ServiceID CHAR(9) PRIMARY KEY,
    StartDate DATE,
    EndDate DATE,
    Rate REAL
);

CREATE TABLE Users (
    user_id SERIAL PRIMARY KEY,
    email VARCHAR(30) NOT NULL,
    pwd VARCHAR(50) NOT NULL,
    user_type VARCHAR(10)
);

