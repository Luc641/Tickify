create table CUSTOMER (
	C_Mail varchar(30) not null primary key,
	C_Password varchar(30) not null,
	Status boolean not null default true,
	C_Name varchar(50) not null,
	C_PhoneNr varchar(20) not null,
	C_Address varchar(100) not null,
	C_Birthdate date not null
);

create table ORGANIZER (
	O_Mail varchar(30) not null primary key,
	O_Password varchar(30) not null,
	O_Name varchar(50) not null,
	O_PhoneNr varchar(20) not null,
	O_Address varchar(100) not null
);

create table ADMINISTRATOR (
	A_Mail varchar(30) not null primary key,
	A_Password varchar(30) not null
);

create table ORDERS (
	OrderNumber int not null primary key,
	OrderDate timestamp not null,
	PaymentStatus boolean default false,
	PaymentType varchar(30) default 'BANK TRANSFER',
	CustomerMail varchar(30) not null,
	foreign key (CustomerMail) references CUSTOMER(C_Mail)
);

create table EVENTS(
	EventNr int not null primary key,
	E_Name varchar (50) not null,
	EventCategory varchar(30) not null,
	Description varchar(6000),
	E_Location varchar (150) not null,
	E_Date timestamp not null,
	OrganizerMail varchar(30) not null,
	filePath varchar(100) default null,
	foreign key (OrganizerMail) references ORGANIZER(O_Mail)
);

create table TICKET(
	ID int not null primary key,
	EventNumber int not null,
	Price decimal(9,2) not null,
	TicketCategory varchar(30) default null,
	Order_Number int default null,
	foreign key (EventNumber) references EVENTS(EventNr),
	foreign key (Order_Number) references ORDERS(OrderNumber)
);

ALTER TABLE customer
	ADD CONSTRAINT C_Email_Format CHECK (C_Mail LIKE '%@%.%'),
	ADD CONSTRAINT C_PhoneNr_Format CHECK (C_PhoneNr LIKE '00%'),
	ADD CONSTRAINT C_Password_Format CHECK (LENGTH(C_Password) >= 8),
	ADD CONSTRAINT C_Birthdate_check CHECK (C_Birthdate >= '1900-01-01' AND C_Birthdate < CURRENT_DATE);
	
ALTER TABLE organizer
	ADD CONSTRAINT O_Email_Format CHECK (O_Mail LIKE '%@%.%'), 
	ADD CONSTRAINT O_PhoneNr_Format CHECK (O_PhoneNr LIKE '00%'),
	ADD CONSTRAINT O_Password_Format CHECK (LENGTH(O_Password) >= 8);
	
ALTER TABLE administrator
	ADD CONSTRAINT A_Email_Format CHECK (A_mail LIKE '%@%.%'),
	ADD CONSTRAINT A_Password_Format CHECK (LENGTH(A_Password) >= 8);
	
ALTER TABLE orders
	add constraint OrderNumber_value check (OrderNumber >= 0),
	ADD CONSTRAINT OrderDate_value CHECK (OrderDate <= CURRENT_TIMESTAMP),
	ADD CONSTRAINT PaymentType_value CHECK (PaymentType IN ('BANK TRANSFER', 'PAYPAL', 'VISA', 'MAESTRO', 'AMERICAN EXPRESS', 'MASTERCARD'));
	
ALTER TABLE ticket
	add constraint Price_value CHECK (Price >= 0.00),
	add constraint ID_value check (ID >= 0);
	
ALTER TABLE events
	add constraint EventNr_value check (EventNr >= 0),
	ADD CONSTRAINT Category_value CHECK (EventCategory IN ('CINEMA & THEATRE', 'CONCERTS & FESTIVALS', 'SPORTS', 'FAMILY', 'EXPOSITIONS')),
	ADD CONSTRAINT E_Date_value CHECK (E_date >= CURRENT_TIMESTAMP);
	
	
	   
