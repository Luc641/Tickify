insert into administrator
	values
		('admin@admin.com', '@Administrator'),
		('admin1@admin.com','@Administrator1');

insert into customer
values ('customer1@gmail.com', '@Customer1', true, 'john', '0031123456789', 'Venlo', '1950-01-20'),
       ('customer2@hotmail.com', '@Customer2', false, 'andrew', '0041123456789', 'Spencer street 11 ', '2000-12-12'),
       ('customer3@fontys.nl', '@Customer3', true, 'maria', '0049123456789', 'my house', '1994-04-27'),
       ('customer4@fontys.nl', '@Customer4', true, 'mathew', '0034987654321', 'AMSTERDAM', '2002-08-20'),
       ('customer5@fontys.nl', '@Customer5', true, 'john', '0049984635178', 'Barcelona', '2001-07-16'),
       ('customer6@gmail.com', '@Customer6', true, 'tom', '0049985744365', 'Miami', '2001-06-15'),
       ('customer7@web.de', '@Customer7', true, 'max', '0049094735292', 'New York', '1975-06-15'),
       ('customer8@gmx.de', '@Customer8', false, 'carl', '0049947362354', 'Yorkshire', '1999-11-19'),
       ('customer9@hotmail.com', '@Customer9', true, 'tim', '0049587858750', 'Cologne', '1997-12-12'),
       ('customer10@outlook.com', '@Customer10', false, 'Lucas', '0049968652365', 'Berlin', '1998-09-29'),
       ('customer11@pocketail.com', '@Customer11', true, 'Hans', '004954215478', 'Alicante', '1990-10-22'),
       ('customer12@yahoo.com', '@Customer12', false, 'Günther', '0049256369856', 'Guatemala', '1996-09-14'),
       ('customer13@yahoo.com', '@Customer13', true, 'Yannik', '004958748745', 'Nigeria', '1990-02-15'),
       ('customer14@fontys.nl', '@Customer14', true, 'Jens', '0049587458742', 'Dubai', '1991-06-15'),
       ('customer15@gmail.com', '@Customer15', true, 'Florian', '0049125412369', 'Japan', '1992-07-15');

insert into organizer
	values
		('rocknrollevents@gmail.com', 'mypassword', 'Rock and Roll Events', '00492399874', 'Amsterdam'),
		('samoni@events.com', 'samoni123', 'Samoni', '0033738109', 'Venlo'),
		('carlton@mail.com', 'creative_', 'Carlton', '003491885', 'Roermond'),
		('ticketing@outlook.com', 'Tick-/_.', 'Ticketing', '0048192801', 'Frankfurt'),
		('sport2@yahoo.com', 'sportingE', 'Sport 2', '007322910', 'Dresden'),
		('rain0@gmail.com', 'k9j6ac61', 'Rain Festival', '00871827', 'London'),
		('4hiphop@mail.com', '9simv1ma0', 'Four - HipHop Shows', '00658876', 'Utrecht'),
		('monstert@hotmail.com', 'ha6ym8._', 'Monster Truck Events', '009265102', 'Rotterdam'),
		('musi_call@yahoo.com', '12345pass', 'Musi-call', '0043105701', 'Cologne'),
		('gorg_c@yandex.ru', '1a2b3c4d-/', 'Gorg Concerts', '0031019842', 'Moscow');

insert into events
	values
		(1, 'The end of the world', 'CINEMA & THEATRE', 'New movie about the events leading to the end of the world', 'CineStar Metropolis', '2021-02-01 00:30:00', 'ticketing@outlook.com'),
		(2, 'Halestorm again in Amsterdam!', 'CONCERTS AND FESTIVALS', 'Halestorm is coming to the Netherlands! The American rock band will be on stage at Ziggo Dome in Amsterdam in the winter of 2021. When we saw them for last time it was at a performance in Poppodium 013 Tilburg. The heavy rock of the American group showed to be not heavy enough. Nevertheless - or perhaps precisely because of this - the band is playing in an even bigger hall almost two years later. With little frills, a solid rock show will be given away in Ziggo Dome in Amsterdam in January 2021.', 'Ziggo Dome, Amsterdam', '2021-09-25 18:00:00', 'samoni@events.com'),
		(3, 'Arsenal FC vs Tottenham Hotspur FC', 'SPORTS', 'Do not miss out on the North London derby - Arsenal FC vs Tottenham Hotspur FC - get your tickets to this classic football match here. By the way, the next clash available on stadium for the supporters will happen during the next season. From your point of view, who is going to beat the other? Will the Gunners take the lead this time? Or will the Spurs follow the same path? At 1st sight, this new season will be very exciting! The North London Derby will be on fire! You must not miss these epic clashes if you are a real fan!' , 'Emirates Stadium, London', '2021-09-31 20:45:00', 'sport2@yahoo.com'),
		(4, 'MONSTER TRUCKS in Rotterdam', 'FAMILY', 'Our MONSTER TRUCK events can give an adrenaline rush for the whole family. They are full of action and spectacular stunts that challenge gravity. World famous trucks participate in combination with our world-class drivers they push the insane Monster Trucks to the limit in freestyle and racing competitions. The whole family will be on the edge of their seats during this surprising, stunning and unforgettable event.', 'Stadion Feijenoord - De Kuip Rotterdam', '2021-04-10 13:00:00', 'monstert@hotmail.com'),
		(5, 'Kwebbel & Sjnebbel', 'CINEMA AND THEATRE', null, 'Forum Theatre, Engelenkampstraat 3468, 6131ER Sittard', '2021-06-16 19:30:00', 'carlton@mail.com');

insert into orders
	values
		(1, '2018-10-10 15:27:53', true , 'MAESTRO', 'customer1@gmail.com'),
		(2, '2018-11-20 21:46:05', false, 'BANK TRANSFER', 'customer12@yahoo.com'),
		(3, '2018-12-01 09:16:29', true, 'VISA', 'customer5@fontys.nl'),
		(4, '2018-12-01 09:17:01', true, 'PAYPAL', 'customer10@outlook.com'),
		(5, '2019-01-25 18:17:16', true, 'MASTERCARD', 'customer8@gmx.de'),
		(6, '2019-01-27 17:55:51', true, 'PAYPAL', 'customer15@gmail.com'),
		(7, '2019-03-01 03:19:27', false, 'BANK TRANSFER', 'customer10@outlook.com'),
		(8, '2019-03-14 13:13:13', true, 'AMERICAN EXPRESS', 'customer7@web.de'),
		(9, '2019-03-14 16:21:53', true, 'PAYPAL', 'customer8@gmx.de'),
		(10, '2019-09-18 12:00:12', true, 'PAYPAL', 'customer4@fontys.nl'),
		(11, '2019-09-19 20:37:42', false, 'BANK TRANSFER', 'customer2@hotmail.com'),
		(12, '2019-10-05 07:59:24', true, 'VISA', 'customer4@fontys.nl'),
		(13, '2019-10-21 11:11:44', true, 'MAESTRO', 'customer9@hotmail.com'),
		(14, '2020-01-05 23:59:59', true, 'BANK TRANSFER', 'customer13@yahoo.com'),
		(15, '2020-01-31 18:36:42', false, 'BANK TRANSFER', 'customer8@gmx.de');

INSERT INTO TICKET (ID, EventNumber, Price, TicketCategory, Order_Number) 
    Values 
        (101, 3, 59.0, 'c', 1)
	    (102, 3, 35.0, 'a', 2)
	    (103, 4, 26.0, 'c', 3)
	    (104, 3, 48.0, 'b', 3)
	    (105, 1, 48.0, 'd', 4)
	    (106, 4, 28.0, 'c', 4)
	    (107, 3, 35.0, 'a', 5)
	    (108, 1, 71.0, 'c', 6)
	    (109, 4, 32.0, 'c', 7)
	    (110, 3, 26.0, 'd', 8)
	    (111, 4, 51.0, 'b', 8)
	    (112, 4, 51.0, 'a', 9)
	    (113, 5, 80.0, 'b', 10)
	    (114, 5, 63.0, 'a', 11)
	    (115, 2, 73.0, 'c', 12)
	    (116, 4, 26.0, 'b', 12)
	    (117, 4, 70.0, 'b', 13)
	    (118, 5, 80.0, 'a', 14)
	    (119, 4, 28.0, 'a', 14)
	    (120, 5, 22.0, 'd', 15);
