create table CUSTOMER (
	C_Mail varchar(30) primary key,
	C_PhoneNr varchar(15),
	C_Password varchar(30) NOT NULL,
	Status varchar(30),
	C_Address varchar(100),
	C_Name varchar(50) NOT NULL,
	C_Birthdate date NOT NULL
);

create table ORGANIZER (
	O_Mail varchar(30) primary key,
	O_PhoneNr varchar(15),
	O_Password varchar(30) NOT NULL,
	O_Address varchar(100),
	O_Name varchar(50) NOT NULL
);

create table ADMINISTRATOR (
	A_Mail varchar(30) primary key,
	A_Password varchar(30) NOT NULL
);

create table ORDERS (
	OrderNumber int primary key,
	OrderDate date,
	PaymentStatus varchar(10),
	PaymentType varchar(30),
	CustomerMail varchar(30),
	foreign key (CustomerMail) references CUSTOMER(C_Mail)
);

create table EVENTS(
	EventNr int primary key,
	EventCategory varchar(30),
	Description varchar(6000),
	E_Name varchar (30) NOT NULL,
	E_Location varchar (150) NOT NULL,
	E_Date date NOT NULL,
	OrganizerMail varchar(30),
	foreign key (OrganizerMail) references ORGANIZER(O_Mail)
);

create table TICKET(
	ID int primary key,
	Price decimal(9,2) NOT NULL,
	TicketCategory varchar(30),
	Order_Number int,
	EventNumber int,
	CMail varchar(30),
	foreign key (CMail) references CUSTOMER(C_Mail),
	foreign key (EventNumber) references EVENTS(EventNr),
	foreign key (Order_Number) references ORDERS(OrderNumber)
);

ALTER TABLE customer
	ADD CONSTRAINT C_Email_Format CHECK (C_Mail LIKE '%@%.%'),
	ADD CONSTRAINT C_PhoneNr_Format CHECK (C_PhoneNr LIKE '+%' AND C_PhoneNr LIKE '_%^[0-9]%'),
	ADD CONSTRAINT C_Password_Format CHECK (LENGTH(C_Password) >= 8 AND C_Password LIKE '%[!@#$%^&]%' AND C_Password LIKE '%[0-9]%'),
	ADD CONSTRAINT Status_Values CHECK (Status IN ('REGISTERED', 'DISABLED', 'UNREGISTERED')),
	ADD CONSTRAINT C_Birthdate_check CHECK (C_Birthdate >= '1900-01-01' AND C_Birthdate < CURRENT_DATE);
	
ALTER TABLE organizer
	ADD CONSTRAINT O_Email_Format CHECK (O_Mail LIKE '%@%.%'), 
	ADD CONSTRAINT O_PhoneNr_Format CHECK (O_PhoneNr LIKE '+%' AND O_PhoneNr LIKE '_%^[0-9]%'),
	ADD CONSTRAINT O_Password_Format CHECK (LENGTH(O_Password) >= 8 AND O_Password LIKE '%[!@#$%^&]%' AND O_Password LIKE '%[0-9]%');
	
ALTER TABLE administrator
	ADD CONSTRAINT A_Email_Format CHECK (A_mail LIKE '%@%.%'),
	ADD CONSTRAINT A_Password_Format CHECK (LENGTH(A_Password) >= 8 AND A_Password LIKE '%[!@#$%^&]%' AND A_Password LIKE '%[0-9]%');
	
ALTER TABLE orders
	ADD CONSTRAINT OrderDate_value CHECK (OrderDate <= CURRENT_DATE),
	ADD CONSTRAINT PaymentStatus_value CHECK (PaymentStatus IN ('PAID', 'PENDING', 'NOT PAID')),
	ADD CONSTRAINT PaymentType_value CHECK (PaymentType IN ('BANK TRANSFER', 'PAYPAL', 'VISA', 'MAESTRO'));
	
/*ALTER TABLE ticket
	ADD CONSTRAINT Price_format CHECK (Price '%€')*/
	
ALTER TABLE events
	ADD CONSTRAINT Category_value CHECK (EventCategory IN ('CINEMA & THEATRE', 'MUSICALS & SHOWS', 'SPORTS', 'FAMILY', 'EXPOSITIONS')),
	ADD CONSTRAINT E_Date_value CHECK (E_date >= CURRENT_DATE);
	
	
	   