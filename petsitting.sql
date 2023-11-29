CREATE TABLE Animals (
	animal_id SERIAL PRIMARY KEY,
	name VARCHAR(20) NOT NULL,
	owner SERIAL NOT NULL REFERENCES Customers ON DELETE CASCADE,
	weight INT,
	animal_type VARCHAR(15),
	age INT,
	weight INT
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
    user_id SERIAL PRIMARY KEY REFERENCES users ON DELETE CASCADE,
    zipcode CHAR(5),
    available_days VARCHAR(70),
    available_times VARCHAR(30),
    size_pref VARCHAR(60),
    type_pref VARCHAR(30)
);

CREATE TABLE Customers (
    user_id SERIAL PRIMARY KEY REFERENCES Users ON DELETE CASCADE
	email VARCHAR(50) NOT NULL 
);

CREATE TABLE Service (
    service_id SERIAL PRIMARY KEY,
    booker_id SERIAL REFERENCES Customers ON DELETE CASCADE,
    sitter_id SERIAL REFERENCES Sitters ON DELETE CASCADE,
    pet SERIAL REFERENCES Animals ON DELETE CASCADE,
    service_date DATE,
    start_time TIME(0), 
    end_time TIME(0), 
    rate REAL
);

CREATE TABLE Users (
    user_id SERIAL PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    pwd VARCHAR(50) NOT NULL,
    user_type VARCHAR(10)
);

CREATE VIEW BookingDisplay AS
SELECT service_id, owner_name, booker_id, sitter_name, sitter_id, pet_name, service_date, start_time, end_time, S.rate AS price
FROM Service S
NATURAL JOIN (SELECT service_id, U.name as owner_name FROM Service S JOIN Users U ON S.booker_id = U.user_id)
NATURAL JOIN (SELECT service_id, U.name as sitter_name FROM Service S JOIN Users U ON S.sitter_id = U.user_id)
NATURAL JOIN (SELECT service_id, A.name as pet_name FROM Service S JOIN Animals A ON S.pet = A.animal_id);