# garrageparrot
Un site de vente de voiture, avec un petit back office


Les insert pour créer l'admin, quelques voitures et des Horaires de base

Voitures : 
INSERT INTO `cars` (`id`, `name`, `price`, `kilometer`, `setting`, `year`, `gear`, `image`, `description`, `car_condition`, `type`) VALUES
(1, 'AodrenA', 82000, 13000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(2, 'AodrenB', 45000, 37000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(3, 'AodrenC', 10000, 543000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(4, 'AodrenD', 32000, 3000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(5, 'AodrenE', 12000, 73000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(6, 'AodrenF', 120000, 33000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence'),
(7, 'AodrenG', 54000, 43000, 'Phares bleus,Vitre teintées,Climatisation', '2023', 'Allume-cigare', 'uploads/AodrenA3396767_modern_car_sport_car_red_8k_18b2576e-aeb0-4e78-91d2-385445eda1fa.png', '', 'Neuf', 'Essence');


Horaires :
INSERT INTO `schedules` (`id`, `current`, `name`, `monday_mor_start`, `monday_mor_end`, `monday_eve_start`, `monday_eve_end`, `tuesday_mor_start`, `tuesday_mor_end`, `tuesday_eve_start`, `tuesday_eve_end`, `wednesday_mor_start`, `wednesday_mor_end`, `wednesday_eve_start`, `wednesday_eve_end`, `thursday_mor_start`, `thursday_mor_end`, `thursday_eve_start`, `thursday_eve_end`, `friday_mor_start`, `friday_mor_end`, `friday_eve_start`, `friday_eve_end`, `saturday_mor_start`, `saturday_mor_end`, `saturday_eve_start`, `saturday_eve_end`, `sunday_mor_start`, `sunday_mor_end`, `sunday_eve_start`, `sunday_eve_end`) VALUES
(1, 'true', 'Horaire habituelles', '08:30:00.000000', '12:30:00.000000', '13:00:00.000000', '17:00:00.000000', '08:30:00.000000', '12:30:00.000000', '13:00:00.000000', '17:00:00.000000', '08:30:00.000000', '12:30:00.000000', '13:00:00.000000', '17:00:00.000000', '08:30:00.000000', '12:30:00.000000', '13:00:00.000000', '17:00:00.000000', '08:30:00.000000', '12:30:00.000000', '13:00:00.000000', '17:00:00.000000', '08:30:00.000000', '12:30:00.000000', '10:00:00.000000', '12:30:00.000000', '13:00:00.000000', '15:00:00.000000', '10:00:00.000000', '12:30:00.000000', '13:00:00.000000', '15:00:00.000000');


Admin :
INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `role`) VALUES
(1, 'Parrot', 'Vincent', 'v.parrot@garageparrot.fr', '0f8d21e44195054ded7d0ec7983f37e8b33c1b3f4d156f0c17a44cadc204d303', 'admin');
