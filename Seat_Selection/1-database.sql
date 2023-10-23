-- (A) SEATS
CREATE TABLE `seats` (
  `seat_id` varchar(16) NOT NULL,
  `flight_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`flight_id`);

-- (B) SESSIONS
CREATE TABLE `trips` (
  `trip_id` bigint(20) NOT NULL,
  `flight_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `flight_id` (`flight_id`);

ALTER TABLE `trips`
  MODIFY `trip_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- (C) RESERVATIONS
CREATE TABLE `reservations` (
  `trip_id` bigint(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `booking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`trip_id`,`seat_id`,`booking_id`);

-- (D) DUMMY DATA
-- (D1) DUMMY SEATS
INSERT INTO `seats` (`seat_id`, `flight_id`) VALUES
('1A', 'CX881'),
('1B', 'CX881'),
('1C', 'CX881'),
('1D', 'CX881'),
('1E', 'CX881'),
('1F', 'CX881'),
('2A', 'CX881'),
('2B', 'CX881'),
('2C', 'CX881'),
('2D', 'CX881'),
('2E', 'CX881'),
('2F', 'CX881'),
('3A', 'CX881'),
('3B', 'CX881'),
('3C', 'CX881'),
('3D', 'CX881'),
('3E', 'CX881'),
('3F', 'CX881'),
('4A', 'CX881'),
('4B', 'CX881'),
('4C', 'CX881'),
('4D', 'CX881'),
('4E', 'CX881'),
('4F', 'CX881'),
('5A', 'CX881'),
('5B', 'CX881'),
('5C', 'CX881'),
('5D', 'CX881'),
('5E', 'CX881'),
('5F', 'CX881'),
('6A', 'CX881'),
('6B', 'CX881'),
('6C', 'CX881'),
('6D', 'CX881'),
('6E', 'CX881'),
('6F', 'CX881');

-- (D2) DUMMY SESSION
INSERT INTO `trips` (`trip_id`, `flight_id`) VALUES
(1, 'CX881');

-- (D3) DUMMY RESERVATION
INSERT INTO `reservations` (`trip_id`, `seat_id`, `booking_id`) VALUES
('1', '2B', '555'),
('1', '4A', '888');