create table CUSTOMER (
	C_MAIL varchar(30) primary key,
	PhoneNr varchar(15),
	C_Password varchar(30),
	Status boolean,
	Address varchar(100),
	C_Name varchar(50),
	Birthdate date
);

create table ORGANIZER (
	O_Mail varchar(30) primary key,
	PhoneNr varchar(15),
	O_Password varchar(30),
	Address varchar(100),
	O_Name varchar(50),
);

create table ADMINISTRATOR (
	A_Mail varchar(30) primary key,
	A_Password varchar(30),
);

create table ORDERS (
	OrderNumber int primary key,
	O_Date date,
	PaymentStatus varchar(10),
	PaymentType varchar(30),
	C_Mail varchar(30),
	foreign key (C_Mail) references CUSTOMER(C_Mail)
);

create table EVENTS(
	EventNr int primary key,
	Category varchar(30),
	Description varchar(6000),
	E_Name varchar (30),
	E_Location varchar (100),
	E_Date date,
	O_Mail varchar(30),
	foreign key (O_Mail) references ORGANIZER(O_Mail)
);

create table TICKET(
	ID int primary key,
	Price double,
	Category varchar(30),
	O_Number int,
	EventNr int,
	C_Mail varchar(30)
	foreign key (C_Mail) references CUSTOMER(C_Mail),
	foreign key (EventNr) references EVENTS(EventNr),
	foreign key (OrderNumber) references ORDERS(OrderNumber)
);

alter table CUSTOMER
	

