CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kilometer` int(11) NOT NULL,
  `setting` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `gear` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `car_condition` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `current` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `monday_mor_start` time(6) NOT NULL,
  `monday_mor_end` time(6) NOT NULL,
  `monday_eve_start` time(6) NOT NULL,
  `monday_eve_end` time(6) NOT NULL,
  `tuesday_mor_start` time(6) NOT NULL,
  `tuesday_mor_end` time(6) NOT NULL,
  `tuesday_eve_start` time(6) NOT NULL,
  `tuesday_eve_end` time(6) NOT NULL,
  `wednesday_mor_start` time(6) NOT NULL,
  `wednesday_mor_end` time(6) NOT NULL,
  `wednesday_eve_start` time(6) NOT NULL,
  `wednesday_eve_end` time(6) NOT NULL,
  `thursday_mor_start` time(6) NOT NULL,
  `thursday_mor_end` time(6) NOT NULL,
  `thursday_eve_start` time(6) NOT NULL,
  `thursday_eve_end` time(6) NOT NULL,
  `friday_mor_start` time(6) NOT NULL,
  `friday_mor_end` time(6) NOT NULL,
  `friday_eve_start` time(6) NOT NULL,
  `friday_eve_end` time(6) NOT NULL,
  `saturday_mor_start` time(6) NOT NULL,
  `saturday_mor_end` time(6) NOT NULL,
  `saturday_eve_start` time(6) NOT NULL,
  `saturday_eve_end` time(6) NOT NULL,
  `sunday_mor_start` time(6) NOT NULL,
  `sunday_mor_end` time(6) NOT NULL,
  `sunday_eve_start` time(6) NOT NULL,
  `sunday_eve_end` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description1` varchar(255) NOT NULL,
  `description2` varchar(255) DEFAULT NULL,
  `description3` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `status` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO `status` (`id`, `name`, `status`) VALUES
(1, 'OUVERT', 1);

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `current` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
