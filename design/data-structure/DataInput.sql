insert into administrator 
	values 
		('admin@admin.com', '@Administrator1'),
		('admin1@admin.com','@Administrator1');

insert into customer
	values
		('customer1@gmail.com', '+31123456789', '@Customer1', 'REGISTERED', 'VENLO', 'john', '1950-01-20' ),
		('customer2@hotmail.com', '+41123456789', '@Customer2', 'DISABLED', 'Spencer street 11 1234AA Venlo', 'andrew', '2000-12-12'),
		('customer3@fontys.nl', '+49123456789', '@Customer3', 'REGISTERED', 'my house', 'maria', '1994-04-27'),
		('customer4@fontys.nl', '+34987654321', '@Customer4', 'DISABLED', 'AMSTERDAM', 'mathew', '2002-08-20'),
		('customer5@fontys.nl', null, '@Customer5', 'REGISTERED', null, 'lia mathius', '1975-06-15');

insert into organizer
	values
		('organizer1@events.com', '+49111111111', '@Organizer1', 'venlo', 'samoni'),
		('organizer2@events.com', '+31222222222', '@Organizer2', 'roermond', 'carlton'),
		('organizer3@events.nl', '+31999999999', '@Organizer', 'my office', 'ticketing'),
		('organizer4@events.nl', '+31888888888', '{Organizer4', 'world', 'name');
		
insert into events 
	values
		(1, 'CINEMA & THEATRE', 'new film about end of the world', 'The end of the world', 'cinema', '2020-11-01', 'organizer1@events.com'),
		(2, 'FAMILY', 'aaaaa', '1, 2, 3...', 'city harbour', '2021-01-01', 'organizer1@events.com'),
		(3, 'EXPOSITIONS', null, 'Modern art', 'museum', '2020-12-31', 'organizer3@events.nl'),
		(4, 'MUSICALS & SHOWS', 'opera about Romeo and Julieta', 'Romea and Julieta', 'City Opera', '2021-10-19', 'organizer4@events.nl'),
		(5, 'SPORTS', 'UCL match', ' Football match', 'stadium', '2020-10-27', 'organizer4@events.nl');
	
insert into orders 
	values
		(1, '2020-10-10', 'PAID', 'MAESTRO', 'customer1@gmail.com'),
		(2, '2020-10-20', 'PENDING', 'BANK TRANSFER', 'customer1@gmail.com'),
		(3, '2020-01-01', 'NOT PAID', 'VISA', 'customer5@fontys.nl'),
		(4, '1999-01-25', 'PAID', 'PAYPAL', 'customer4@fontys.nl');
		
insert into ticket
	values
		(1, 1234.10, 'Group ticket', 1, 2),
		(2, 10.25, 'Single ticket', null, 5),
		(3, 9.99, null, 3, 1),
		(4, 9.99, null, null, 1),
		(5, 9.99, null, null, 1);