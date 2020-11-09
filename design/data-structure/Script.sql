create table CUSTOMER (
	C_Mail varchar(30) not null primary key,
	C_PhoneNr varchar(15) not null,
	C_Password varchar(30) not null,
	Status varchar(30) not null default 'ACTIVE',
	C_Address varchar(100) not null,
	C_Name varchar(50) not null,
	C_Birthdate date not null
);

create table ORGANIZER (
	O_Mail varchar(30) not null primary key,
	O_PhoneNr varchar(15) not null,
	O_Password varchar(30) not null,
	O_Address varchar(100) not null,
	O_Name varchar(50) not null
);

create table ADMINISTRATOR (
	A_Mail varchar(30) not null primary key,
	A_Password varchar(30) not null
);

create table ORDERS (
	OrderNumber int not null primary key,
	OrderDate timestamp not null,
	PaymentStatus varchar(10) default 'PENDING',
	PaymentType varchar(30) default 'BANK TRANSFER',
	CustomerMail varchar(30) not null,
	foreign key (CustomerMail) references CUSTOMER(C_Mail)
);

create table EVENTS(
	EventNr int not null primary key,
	EventCategory varchar(30) not null,
	Description varchar(6000),
	E_Name varchar (30) not null,
	E_Location varchar (150) not null,
	E_Date timestamp not null,
	OrganizerMail varchar(30) not null,
	filePath varchar(100) default null,
	foreign key (OrganizerMail) references ORGANIZER(O_Mail)
);

create table TICKET(
	ID int not null primary key,
	Price decimal(9,2) not null,
	TicketCategory varchar(30) default 'A',
	Order_Number int default null,
	EventNumber int not null,
	foreign key (EventNumber) references EVENTS(EventNr),
	foreign key (Order_Number) references ORDERS(OrderNumber)
);

ALTER TABLE customer
	ADD CONSTRAINT C_Email_Format CHECK (C_Mail LIKE '%@%.%'),
	ADD CONSTRAINT C_PhoneNr_Format CHECK (C_PhoneNr LIKE '+%'),
	ADD CONSTRAINT C_Password_Format CHECK (LENGTH(C_Password) >= 8),
	ADD CONSTRAINT Status_Values CHECK (Status IN ('ACTIVE', 'DISABLED')),
	ADD CONSTRAINT C_Birthdate_check CHECK (C_Birthdate >= '1900-01-01' AND C_Birthdate < CURRENT_DATE);
	
ALTER TABLE organizer
	ADD CONSTRAINT O_Email_Format CHECK (O_Mail LIKE '%@%.%'), 
	ADD CONSTRAINT O_PhoneNr_Format CHECK (O_PhoneNr LIKE '+%'),
	ADD CONSTRAINT O_Password_Format CHECK (LENGTH(O_Password) >= 8);
	
ALTER TABLE administrator
	ADD CONSTRAINT A_Email_Format CHECK (A_mail LIKE '%@%.%'),
	ADD CONSTRAINT A_Password_Format CHECK (LENGTH(A_Password) >= 8);
	
ALTER TABLE orders
	add constraint OrderNumber_value check (OrderNumber >= 0),
	ADD CONSTRAINT OrderDate_value CHECK (OrderDate <= CURRENT_TIMESTAMP),
	ADD CONSTRAINT PaymentStatus_value CHECK (PaymentStatus IN ('PAID', 'PENDING', 'NOT PAID')),
	ADD CONSTRAINT PaymentType_value CHECK (PaymentType IN ('BANK TRANSFER', 'PAYPAL', 'VISA', 'MAESTRO', 'AMERICAN EXPRESS', 'MASTERCARD'));
	
ALTER TABLE ticket
	ADD CONSTRAINT Price_value CHECK (Price >= 0.00),
	add constraint ID_value check (ID >= 0);
	
ALTER TABLE events
	add constraint EventNr_value check (EventNr >= 0),
	ADD CONSTRAINT Category_value CHECK (EventCategory IN ('CINEMA & THEATRE', 'MUSICALS & SHOWS', 'SPORTS', 'FAMILY', 'EXPOSITIONS')),
	ADD CONSTRAINT E_Date_value CHECK (E_date >= CURRENT_TIMESTAMP);
	
	
	   