USE `metex_cucumber`;
CREATE TABLE IF NOT EXISTS `interchanges` (`id` int(11) NOT NULL AUTO_INCREMENT, `name` tinytext, PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9;
INSERT INTO `interchanges` (`id`, `name`) VALUES (1, 'Haussmann Saint-Lazare'), (2, 'Madeleine'), (3, 'Bercy'), (4, 'Gambetta'), (5, 'La Motte Picquet Grenelle'), (6, 'Pasteur'), (7, 'Montparnasse Bienvenüe'), (8, 'Sèvres Babylone');
CREATE TABLE IF NOT EXISTS `lines` (`id` int(11) NOT NULL AUTO_INCREMENT, `name` varchar(5) NOT NULL, `colour` char(6) NOT NULL, `stock_id` int(11) NOT NULL, `description` text, `active` tinyint(1) NOT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17;
INSERT INTO `lines` (`id`, `name`, `colour`, `stock_id`, `description`, `active`) VALUES (1, '1', '000000', 0, NULL, 0), (2, '2', '000000', 0, NULL, 0), (3, '3', 'A18D3E', 0, 'Line 3 was opened in 1904, from Villiers to Père Lachaise. It was also the first line to incorporate new safety features designed after the Couronnes Fire on Line 2. Nowadays it crosses the city from left to right, from Pont de Levallois to Gallieni. It currently uses refurbished MF67 stock.', 1), (4, '3bis', '57BFCD', 0, 'Line 3bis used to be part of Line 3 before 1971. It was then decided to cut Line 3bis into a small branch line to improve the overall performance of Line 3. It is the shortest line on the network, just over 1km long, and requires just two trains of MF67 stock in off-peak duty.', 1), (5, '4', '000000', 0, NULL, 0), (6, '5', '000000', 0, NULL, 0), (7, '6', '70BB8D', 0, 'Line 6 is probably one of the network''s most interesting lines. Much of it is overground, and there is a lot that can be seen from its imposing viaducts. Line 6 was envisaged to be a circular line along with Line 2 - which is why they start and end at the same stations. It was in fact originally called Line 2 Sud. Line 6 also uses rubber-tyred MP73 stock, which gives improved grip and noise reduction on the open-air section.', 1), (8, '7', '000000', 0, NULL, 0), (9, '7bis', '70BB8D', 0, 'Line 7bis was originally part of Line 7 before 1967, to improve service on the main line. It is the second-shortest line after Line 3bis, but it is also one of the most interesting. It cuts through the Buttes-Chaumont area of Paris deep underground, passing through enormous caverns left behind by old gypsum mines. It currently uses MF88 stock, which is strangely more modern than the stock used on most other lines.', 1), (10, '8', '000000', 0, NULL, 0), (11, '9', '000000', 0, NULL, 0), (12, '10', 'DAA53C', 0, 'Line 10 is the only "main" line that does not have Automatic Train Operation (ATO) fitted. This is because it has always been an under-used line, so such an expense has never been thought plausible. It does however serve an important role in connecting Gare d''Austerlitz to several RER stations, and does feature some very interesting stations. It now uses MF67 stock.', 1), (13, '11', '000000', 0, NULL, 0), (14, '12', '138B5C', 0, 'Line 12 was not originally owned by the CMP (Compagnie du chemin de fer Métropolitain de Paris), but by the Nord-Sud company, who had their own separate style from the CMP. This line therefore presents some very different and unique stations along its long route. It is an important line because it connect Montmartre in the north with Montparnasse in the south. It now uses MF67 stock.', 1), (15, '13', '000000', 0, NULL, 0), (16, '14', '5F3590', 0, 'Line 14 was also known as Météor (MÉTro Est-Ouest Rapide) during its recent construction. Originally planned to open in 1998 for the World Cup, it did open in 1998 - but in October. It is the most modern line on the network, and possibly the most technologically advanced in Europe. All MP89-stock trains are totally automatic, and no staff is needed anywhere on the train or on the platforms. The architecture on this line is also stunning.', 1);
CREATE TABLE IF NOT EXISTS `movements` (`id` int(11) NOT NULL AUTO_INCREMENT, `up_station_id` int(11) DEFAULT NULL, `down_station_id` int(11) DEFAULT NULL, `up_allowed` tinyint(1) NOT NULL, `down_allowed` tinyint(1) NOT NULL, `length` tinyint(3) unsigned DEFAULT NULL, PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104;
INSERT INTO `movements` (`id`, `up_station_id`, `down_station_id`, `up_allowed`, `down_allowed`, `length`) VALUES (1, 0, 1, 0, 0, NULL), (2, 1, 2, 1, 1, NULL), (3, 2, 3, 1, 1, NULL), (4, 3, 4, 1, 1, NULL), (5, 4, 5, 1, 1, NULL), (6, 5, 6, 1, 1, NULL), (7, 6, 7, 1, 1, NULL), (8, 7, 8, 1, 1, NULL), (9, 8, NULL, 0, 0, NULL), (10, NULL, 9, 0, 0, NULL), (11, 9, 10, 1, 1, NULL), (12, 10, 11, 1, 1, NULL), (13, 11, 12, 1, 1, NULL), (14, 12, NULL, 0, 0, NULL), (15, NULL, 13, 0, 0, NULL), (16, 13, 14, 1, 1, NULL), (17, 14, 15, 1, 1, NULL), (18, 15, 16, 1, 1, NULL), (19, 16, 17, 1, 1, NULL), (20, 17, 18, 0, 1, NULL), (21, 18, 19, 0, 1, NULL), (22, 19, 20, 1, 0, NULL), (23, 20, 17, 1, 0, NULL);
CREATE TABLE IF NOT EXISTS `stations` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` tinytext NOT NULL, `line_id` int(11) NOT NULL, `description` text, `interchange_id` int(11) DEFAULT NULL, `active` tinyint(1) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125;
INSERT INTO `stations` (`id`, `name`, `line_id`, `description`, `interchange_id`, `active`) VALUES (1, 'Saint-Lazare', 16, 'The Line 14 extension of Saint-Lazare opened to the public on the 16th of December, 2003. By providing a direct link from Gare de Lyon and Châtelet-Les Halles, it has helped to relieve traffic elsewhere on the network. This is currently the northern terminus, but plans are underway to expand northwards, replacing part of the current Line 13.', 1, 1), (2, 'Madeleine', 16, 'Madeleine was the original terminus of Line 14 when it first opened, as financial constraints meant the extension had to be delayed. As with most other stations on this line, Madeleine is a busy interchange station serving the famous church, designed to celebrate Napoleon''s army.', 2, 1), (3, 'Pyramides', 16, 'Situated halfway between the Opéra and the Louvre. Pyramide''s design is almost identical to the other stations on Line 14, but here we can take a closer look at the general design. It seems that "curves" are the order of the day, with the tracks concealed within large metal hoops, and the lighting following the direction of the stairs.', 0, 1), (4, 'Châtelet', 16, 'Combined with the RER station of Châtelet-Les Halles, this is the biggest station on the network. Châtelet is already home to lines 1, 4, 7 and 11, and the vast underground complex is daunting for even the most seasoned traveller. Thankfully the Line 14 platforms are modern, new, and clean - unlike most of the rest of the station! Also note the taller ceiling and overall grander scale of the station.', 0, 1), (5, 'Gare de Lyon', 16, 'The only station on Line 14 to feature a 9m-wide island platform, instead of two 6m-wide platforms for each direction. Because of this, this station has a very different air. It feels a lot busier since there are more people on the same platform. Also, this station is unique in the sense that it sports its own rainforest, just by the southbound side of the platform. Tropical storms are even programmed every two hours, making this a very pleasant and green station!', 0, 1), (6, 'Bercy', 16, 'Bercy is a rather important station in that is serves not only the nearby train station, but also the Palais Omnisports de Paris - a very large and important stadium. One interesting feature of this station is the bare rock platform-ends - almost like Roman ruins showcased inside a metro station!', 3, 1), (7, 'Cour Saint-Émilion', 16, 'This station''s original name was Dijon during the planning stages, and is the only station on the line to not offer any connections to any other line. This station serves the nearby Bercy Village.', 0, 1), (8, 'Bibliothèque François Mitterrand', 16, 'This station was built concurrently with the redevelopment of the area (the ZAC de Tolbiac) and the nearby National Library, and as such it was built to impress. The station''s vault can only be described as "grand", with huge pillars supporting the roof. All along the Platform Edge Doors are short excerpts and quotations from famous books and authors, to further reinforce the links with the Library. This station also serves as an interchange to RER Line C, and the entrance to this area is something similar to an ancient Roman ampitheatre. In essence, there is not one thing about this station that is not grand!', 0, 1), (9, 'Porte des Lilas', 4, 'When this station opened on the 27th of November 1921, it became the new terminus of Line 3, the previous one being Gambetta. The current station was however rebuilt, and only one of the lines leaving the station passes my the old station. This line is the "Voie des Fêtes", connecting Line 3bis to Line 7bis via the never-opened station Haxo.', 0, 1), (10, 'Saint-Fargeau', 4, 'Built deep underground, this is one of the few stations with lift-only access to the surface.', 0, 1), (11, 'Pelleport', 4, 'This section of line was turned into a new line because of very low usage - it was therefore decided to create a through service to Gallieni. Even now, Line 3bis is the shortest and least-used line on the network.', 0, 1), (12, 'Gambetta', 4, 'The tunnel-like nature of this station is a give-away as to its old use: the running tunnels for the old Line 3 when it ran through Gambetta to Porte des Lilas. You can read more on the evolution of this station on the Line 3 page for Gambetta.', 4, 1), (13, 'Louis Blanc', 9, 'Much like Line 3bis, this station used to provide a through service to Pré Saint-Gervais. Line 7bis became a line unto itself in 1967, and when this happened, the platform arrangement changed in a radical way. One set of platforms caters for Line 7 Eastbound and Line 7bis Departures, the other for Line 7 Westbound and Line 7bis Arrivals. Once a train arrives at the Arrival platform, it reverses onto the "Z" siding, then runs into the Departure platform to pick up passengers. The driver at the other end then takes the train out towards Pré Saint-Gervais.', 0, 1), (14, 'Jaurès', 9, 'This station remains in original CMP condition, and as can be seen, it is in a rather sorry state. Although the station itself has not been modernised, it has received a name change: before 1914 this station was known as Rue d''Allemagne.', 0, 1), (15, 'Bolivar', 9, 'Bolivar is one of the many "Cultural" stations on the Paris network. This one is dedicated to the life and work of Simon Bolivar.', 0, 1), (16, 'Buttes Chaumont', 9, 'This is one of the deepest stations on the network, with the platforms being 28.7 metres below surface level. This section of line was quite difficult to construct, as this area was used for gypsum excavations, and the tunnels had to be constructed in the huge caverns left behind.', 0, 1), (17, 'Botzaris', 9, 'This station divides the line and marks the start of the Pré Saint-Gervais loop.', 0, 1), (18, 'Place des Fêtes', 9, 'Although this station is on the loop, it has two platforms - why? It was originally planned for there to be a through service from Louis Blanc on Line 7bis to Gambetta on Line 3bis. The connection between these two lines was made via a single-track line leaving from this station, through the unopened station of Haxo, and onwards to Porte des Lilas. This idea was abandoned in 1921 and the line is nowadays used to stable trains.', 0, 1), (19, 'Pré Saint-Gervais', 9, 'This station also has two platforms, one of which is always occupied by stabled trains. This platform was also part of the plan to connect Line 3bis and Line 7bis, and the right-hand platform is connected directly to Porte des Lilas. This line is also called the "Navette" line, since it was used from 1952 to 1956 to test the Pneumatic stock on a limited-availability shuttle from Porte des Lilas to Pré Saint-Gervais.', 0, 1), (20, 'Danube', 9, 'As with most of the stations on this line, this was built in the huge caverns left behind by the gypsum excavations. Solid ground is in fact 30m below the platforms - the entire station is built on 30m-high columns, with nothing but void beneath the rails! This station also has another platform on the right, but access to it has been closed to the public. It is connected to the Pré Saint-Gervais "Navette" line.', 0, 1);
CREATE TABLE IF NOT EXISTS `stations_movements` ( `station_id` int(11) NOT NULL, `movement_id` int(11) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `stations_movements` (`station_id`, `movement_id`) VALUES (1, 1), (1, 2), (2, 2), (2, 3), (3, 3), (3, 4), (4, 4), (4, 5), (5, 5), (5, 6), (6, 6), (6, 7), (7, 7), (7, 8), (8, 8), (8, 9), (9, 10), (9, 11), (10, 11), (10, 12), (11, 12), (11, 13), (12, 13), (12, 14), (13, 15), (13, 16), (14, 16), (14, 17), (15, 17), (15, 18), (16, 18), (16, 19), (17, 19), (17, 20), (18, 20), (18, 21), (19, 21), (19, 22), (20, 22), (17, 23), (20, 23);
CREATE TABLE IF NOT EXISTS `stocks` ( `id` int(11) NOT NULL AUTO_INCREMENT, `name` tinytext NOT NULL, `year` year(4) DEFAULT NULL, `description` text, `pneumatic` tinyint(1) NOT NULL, `automatic` tinyint(1) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;