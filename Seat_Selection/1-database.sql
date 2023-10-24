-- (A) SEATS
CREATE TABLE `seats` (
  `seat_id` varchar(16) NOT NULL,
  `flight_id` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `seats`
  ADD PRIMARY KEY (`seat_id`,`flight_id`);

-- (C) RESERVATIONS
CREATE TABLE `reservations` (
  `flight_id` varchar(20) NOT NULL,
  `seat_id` varchar(16) NOT NULL,
  `booking_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`flight_id`,`seat_id`,`booking_id`);

-- (D) DUMMY DATA
-- (D1) DUMMY SEATS
INSERT INTO `seats` (`seat_id`, `flight_id`) VALUES
('1A', 'CX881'),
('1A', 'EK201'),
('1B', 'CX881'),
('1B', 'EK201'),
('1C', 'CX881'),
('1C', 'EK201'),
('1D', 'CX881'),
('1D', 'EK201'),
('1E', 'CX881'),
('1E', 'EK201'),
('1F', 'CX881'),
('1F', 'EK201'),
('2A', 'CX881'),
('2A', 'EK201'),
('2B', 'CX881'),
('2B', 'EK201'),
('2C', 'CX881'),
('2C', 'EK201'),
('2D', 'CX881'),
('2D', 'EK201'),
('2E', 'CX881'),
('2E', 'EK201'),
('2F', 'CX881'),
('2F', 'EK201'),
('3A', 'CX881'),
('3A', 'EK201'),
('3B', 'CX881'),
('3B', 'EK201'),
('3C', 'CX881'),
('3C', 'EK201'),
('3D', 'CX881'),
('3D', 'EK201'),
('3E', 'CX881'),
('3E', 'EK201'),
('3F', 'CX881'),
('3F', 'EK201'),
('4A', 'CX881'),
('4A', 'EK201'),
('4B', 'CX881'),
('4B', 'EK201'),
('4C', 'CX881'),
('4C', 'EK201'),
('4D', 'CX881'),
('4D', 'EK201'),
('4E', 'CX881'),
('4E', 'EK201'),
('4F', 'CX881'),
('4F', 'EK201'),
('5A', 'CX881'),
('5A', 'EK201'),
('5B', 'CX881'),
('5B', 'EK201'),
('5C', 'CX881'),
('5C', 'EK201'),
('5D', 'CX881'),
('5D', 'EK201'),
('5E', 'CX881'),
('5E', 'EK201'),
('5F', 'CX881'),
('5F', 'EK201'),
('6A', 'CX881'),
('6A', 'EK201'),
('6B', 'CX881'),
('6B', 'EK201'),
('6C', 'CX881'),
('6C', 'EK201'),
('6D', 'CX881'),
('6D', 'EK201'),
('6E', 'CX881'),
('6E', 'EK201'),
('6F', 'CX881'),
('6F', 'EK201');

-- (D3) DUMMY RESERVATION
INSERT INTO `reservations` (`flight_id`, `seat_id`, `booking_id`) VALUES
('CX881', '2B', '555'),
('CX881', '4A', '888'),
('EK201', '3B', '656'),
('EK201', '4A', '778');