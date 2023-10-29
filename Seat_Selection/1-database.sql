-- (A) SEATS
CREATE TABLE `seats` (
  `seat_id` varchar(16) NOT NULL,
  `flight_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`flight_id`);

-- (B) RESERVATIONS
CREATE TABLE `reservations` (
  `flight_id` varchar(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `booking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`flight_id`,`seat_id`,`booking_id`);