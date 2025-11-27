INSERT INTO school_years (name, starts_at, ends_at, is_current_year)
VALUES ('2025-2026', '2025-09-15', '2026-06-30', TRUE);


INSERT INTO teachers (first_name, last_name, email)
VALUES ('Maud', 'Wera', 'maude.wera@hepl.be'),
       ('Nathalie', 'Nicolay', 'nathalie.nicolay@hepl.be'),
       ('Carine', 'Geradon', 'carine.geradon@hepl.be'),
       ('Veronique', 'Etienne', 'veronique.etienne@hepl.be'),
       ('Cedric', 'Muller', 'cedric.muller@hepl.be'),
       ('Eric', 'Delayen', 'eric.delayen@hepl.be'),
       ('Julie', 'Danguy', 'julie.danguy@hepl.be'),
       ('Anne', 'Lussardi', 'anne.lussardi@hepl.be'),
       ('Xavier', 'Spirlet', 'xavier.spirlet@hepl.be'),
       ('Nicolas', 'Claisse', 'nicolas.claisse@hepl.be'),
       ('Mariama', 'BounaFaa', 'mariama.bounafaa@hepl.be'),
       ('Thomas', 'Boudron', 'thomas.boudron@hepl.be'),
       ('Louise', 'Zilles', 'louise.zilles@hepl.be'),
       ('Maelle', 'Vivegnis', 'maelle.vivegnis@hepl.be'),
       ('Olivier', 'Borremans', 'olivier.borremans@hepl.be'),
       ('Dylan', 'Jacquet', 'dylan.jacquet@hepl.be'),
       ('Daniel', 'Schreurs', 'daniel.schreurs@hepl.be'),
       ('Myriam', 'Dupont', 'myriam.dupont@hepl.be'),
       ('Francois', 'Muller', 'francois.muller@hepl.be'),
       ('Jerome', 'Ponente', 'jerome.ponente@hepl.be'),
       ('Maxime', 'Fitoussi', 'maxime.fitoussi@hepl.be'),
       ('Peter', 'Langer', 'peter.langer@hepl.be'),
       ('Dominique', 'Vilain', 'dominique.vilain@hepl.be'),
       ('Francois', 'Parmentier', 'francois.parmentier@hepl.be');


INSERT INTO ues (school_year_id, code, title, description, credits, responsible_teacher_id)
VALUES (1, 'UE201', '(W) Design Web', '', 14, (SELECT id FROM teachers WHERE last_name LIKE 'dupont')),
       (1, 'UE202', '(W) Design d''applications mobiles', '', 2,
        (SELECT id FROM teachers WHERE last_name LIKE 'Parmentier')),
       (1, 'UE203', '(W) Développement côté client', '', 6, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (1, 'UE204', '(W) Développement côté serveur', '', 6, (SELECT id FROM teachers WHERE last_name LIKE 'vilain')),
       (1, 'UE205', '(W) Multimédia', '', 6, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (1, 'UE206', '(W) Systèmes de gestion de contenu', '', 4,
        (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (1, 'UE207', 'Anglais  - 3', '', 2, (SELECT id FROM teachers WHERE last_name LIKE 'nicolay')),
       (1, 'UE208', 'Anglais  - 4', '', 2, (SELECT id FROM teachers WHERE last_name LIKE 'nicolay')),
       (1, 'UE209', 'Communication', '', 3, (SELECT id FROM teachers WHERE last_name LIKE 'spirlet')),
       (1, 'UE2010', 'Culture artistique - 2', '', 2, (SELECT id FROM teachers WHERE last_name LIKE 'spirlet')),
       (1, 'UE2011', 'Entreprise', '', 2, (SELECT id FROM teachers WHERE last_name LIKE 'etienne')),
       (1, 'UE2012', 'Graphisme - 3', '', 4, (SELECT id FROM teachers WHERE last_name LIKE 'lussardi')),
       (1, 'UE2013', 'Graphisme - 4', '', 4, (SELECT id FROM teachers WHERE last_name LIKE 'lussardi'));


INSERT INTO aas (school_year_id, ue_id, code, title, quadrimester, hours_per_year)
VALUES (1, 1, 'AA201', 'Design Web - 1 (30)', 1, 30),
       (1, 1, 'AA202', 'Design Web - 2 (30)', 1, 30),
       (1, 1, 'AA203', 'Design Web - 3 (15)', 2, 15),
       (1, 1, 'AA204', 'Design Web - 4 (30)', 2, 30),
       (1, 1, 'AA205', 'Design Web - 5 (30)', 2, 30),
       (1, 1, 'AA206', 'Design Web - 6 (30)', 2, 30),

       (1, 2, 'AA207', 'Design d''applications mobiles (30)', 2, 30),
       (1, 3, 'AA208', 'Développement côté client - 1 (30)', 1, 30),
       (1, 3, 'AA209', 'Développement côté client - 2 (45)', 1, 45),

       (1, 4, 'AA2010', 'Développement côté serveur (60)', 2, 60),
       (1, 5, 'AA2011', 'Multimédia (60)', 2, 60),
       (1, 6, 'AA2012', 'Systèmes de gestion de contenu (45)', 2, 45),
       (1, 7, 'AA2013', 'Anglais  3 (30)', 1, 30),
       (1, 8, 'AA2014', 'Anglais  4 (30)', 2, 30),
       (1, 9, 'AA2015', 'Communication (60)', 1, 30),
       (1, 10, 'AA2016', 'Culture artistique - 2 (30)', 2, 30),
       (1, 11, 'AA2017', 'Entreprise (30)', 2, 30),
       (1, 12, 'AA2018', 'Graphisme - 3 (45)', 1, 30),
       (1, 13, 'AA2019', 'Graphisme - 4 (45)', 1, 30);


INSERT INTO aa_teacher (aa_id, teacher_id)
VALUES (1, (SELECT id FROM teachers WHERE last_name LIKE 'dupont')),
       (2, (SELECT id FROM teachers WHERE last_name LIKE 'dupont')),
       (3, (SELECT id FROM teachers WHERE last_name LIKE 'wera')),
       (4, (SELECT id FROM teachers WHERE last_name LIKE 'wera')),
       (5, (SELECT id FROM teachers WHERE last_name LIKE 'jacquet')),
       (6, (SELECT id FROM teachers WHERE last_name LIKE 'jacquet')),

       (7, (SELECT id FROM teachers WHERE last_name LIKE 'Parmentier')),
       (8, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (9, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),

       (10, (SELECT id FROM teachers WHERE last_name LIKE 'vilain')),
       (11, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (12, (SELECT id FROM teachers WHERE last_name LIKE 'schreurs')),
       (13, (SELECT id FROM teachers WHERE last_name LIKE 'nicolay')),
       (14, (SELECT id FROM teachers WHERE last_name LIKE 'nicolay')),
       (15, (SELECT id FROM teachers WHERE last_name LIKE 'spirlet')),
       (16, (SELECT id FROM teachers WHERE last_name LIKE 'spirlet')),
       (17, (SELECT id FROM teachers WHERE last_name LIKE 'etienne')),
       (18, (SELECT id FROM teachers WHERE last_name LIKE 'lussardi')),
       (19, (SELECT id FROM teachers WHERE last_name LIKE 'lussardi'));

INSERT INTO `groups` (code, school_year_id)
VALUES ('TECG2 W201', 1),
       ('TECG2 W202', 1);


INSERT INTO classrooms (name)
VALUES ('L20'),
       ('L21'),
       ('L22'),
       ('L23'),
       ('L24'),
       ('L25'),
       ('L26'),
       ('L01'),
       ('L02'),
       ('L03'),
       ('L04'),
       ('L05'),
       ('Léo'),
       ('LPO1'),
       ('LPO2'),
       ('LPO3'),
       ('LPO4'),
       ('LPO5');


INSERT INTO students (matricule, last_name, first_name, email)
VALUES ('7340109162', 'Baaroun', 'Alyssa', 'alyssa.baaroun@student.hepl.be'),
       ('7340132062', 'Bibbiano', 'Chiara', 'chiara.bibbiano@student.hepl.be'),
       ('7340136767', 'Brohée', 'Maé', 'mae.brohee@student.hepl.be'),
       ('7340131981', 'Cakir', 'Sükeyne-Havin', 'sukeyna.cakir@student.hepl.be'),
       ('7340072103', 'Claes', 'Samantha', 'samantha.claes@student.hepl.be'),
       ('7340106511', 'Coban', 'Seren', 'seren.coban@student.hepl.be'),
       ('7340108069', 'de Freitas', 'Isabella', 'isabella.defreitas@student.hepl.be'),
       ('7340112347', 'Dida', 'Amina', 'amina.dida@student.hepl.be'),
       ('7340093429', 'Gaspar', 'Julien', 'julien.gaspar@student.hepl.be'),
       ('7340091657', 'Gerard', 'Dimitri', 'dimitri.gerard@student.hepl.be'),
       ('7340068167', 'Gurrera', 'Laura', 'laura.gurrera@student.hepl.be'),
       ('7340112354', 'Haddaji', 'Maroia', 'maroia.haddaji@student.hepl.be'),
       ('7340108376', 'Jacquemin-Fanti', 'Marie', 'marie.jacquemin-fanti@student.hepl.be'),
       ('7340068554', 'Keza', 'Jennifer', 'jennifer.keza@student.hepl.be'),
       ('7340124049', 'Ledina', 'Gabriel', 'gabriel.ledina@student.hepl.be'),
       ('7340128873', 'Lèbre', 'Eliott', 'eliott.lebre@student.hepl.be'),
       ('7340127414', 'Malchair', 'Laurine', 'laurine.malchair@student.hepl.be'),
       ('7340091814', 'Meex', 'Valentin', 'valentin.meex@student.hepl.be'),
       ('7340046321', 'Meziani', 'Wassila', 'wassila.meziani@student.hepl.be'),
       ('7340115392', 'Okulska', 'Edyta', 'edyta.okulska@student.hepl.be'),
       ('7340083324', 'Onysiak', 'Aleksander', 'aleksander.onysiak@student.hepl.be'),
       ('7340108491', 'Pennartz', 'Dorian', 'dorian.pennartz@student.hepl.be'),
       ('7340111263', 'Perpète', 'Noah', 'noah.perpete@student.hepl.be'),
       ('7340135849', 'Rabhioui', 'Assia', 'assia.rabhioui@student.hepl.be'),
       ('7340106269', 'Schmitz', 'Eline', 'eline.schmitz@student.hepl.be');


INSERT INTO sessions (aa_id, title, teacher_id, starts_at, ends_at, classroom_id)
VALUES (8, 'Séance 1', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-17 08:30:00', '2025-09-17 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 1', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-17 13:30:00', '2025-09-17 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 1', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-19 08:30:00', '2025-09-19 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 1', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-19 13:30:00', '2025-09-19 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 2', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-24 08:30:00', '2025-09-24 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 2', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-24 13:30:00', '2025-09-24 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 2', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-26 08:30:00', '2025-09-26 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 2', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-09-26 13:30:00', '2025-09-26 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 3', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-01 08:30:00', '2025-10-01 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 3', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-01 13:30:00', '2025-10-01 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 3', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-03 08:30:00', '2025-10-03 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 3', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-03 13:30:00', '2025-10-03 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 4', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-08 08:30:00', '2025-10-08 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 4', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-08 13:30:00', '2025-10-08 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 4', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-10 08:30:00', '2025-10-10 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 4', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-10 13:30:00', '2025-10-10 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 5', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-15 08:30:00', '2025-10-15 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 5', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-15 13:30:00', '2025-10-15 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 5', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-17 08:30:00', '2025-10-17 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 5', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-17 13:30:00', '2025-10-17 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 6', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-22 08:30:00', '2025-10-22 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 6', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-22 13:30:00', '2025-10-22 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 6', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-24 08:30:00', '2025-10-24 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 6', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-10-24 13:30:00', '2025-10-24 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 7', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-05 08:30:00', '2025-11-05 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 7', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-05 13:30:00', '2025-11-05 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 7', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-07 08:30:00', '2025-11-07 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 7', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-07 13:30:00', '2025-11-07 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 8', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-12 08:30:00', '2025-11-12 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 8', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-12 13:30:00', '2025-11-12 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 8', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-14 08:30:00', '2025-11-14 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 8', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-14 13:30:00', '2025-11-14 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 9', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-19 08:30:00', '2025-11-19 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 9', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-19 13:30:00', '2025-11-19 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 9', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-21 08:30:00', '2025-11-21 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 9', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-21 13:30:00', '2025-11-21 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 10', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-26 08:30:00', '2025-11-26 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 10', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-26 13:30:00', '2025-11-26 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 10', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-28 08:30:00', '2025-11-28 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 10', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-11-28 13:30:00', '2025-11-28 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 11', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-03 08:30:00', '2025-12-03 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 11', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-03 13:30:00', '2025-12-03 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 11', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-05 08:30:00', '2025-12-05 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 11', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-05 13:30:00', '2025-12-05 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 12', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-10 08:30:00', '2025-12-10 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 12', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-10 13:30:00', '2025-12-10 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 12', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-02 08:30:00', '2025-12-02 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 12', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-02 13:30:00', '2025-12-02 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),

       (8, 'Séance 13', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-17 08:30:00', '2025-12-17 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (8, 'Séance 13', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-17 13:30:00', '2025-12-17 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 13', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-19 08:30:00', '2025-12-19 12:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo')),
       (12, 'Séance 13', (SELECT id FROM teachers WHERE last_name LIKE 'schreurs'),
        '2025-12-19 13:30:00', '2025-12-19 17:30:00', (SELECT id FROM classrooms WHERE name LIKE 'Léo'));


INSERT INTO session_group (session_id, group_id)
VALUES (1, (select id from `groups` where code like '%w201%')),
       (2, (select id from `groups` where code like '%w202%')),
       (3, (select id from `groups` where code like '%w201%')),
       (4, (select id from `groups` where code like '%w202%')),

       (5, (select id from `groups` where code like '%w201%')),
       (6, (select id from `groups` where code like '%w202%')),
       (7, (select id from `groups` where code like '%w201%')),
       (8, (select id from `groups` where code like '%w202%')),

       (9, (select id from `groups` where code like '%w201%')),
       (10, (select id from `groups` where code like '%w202%')),
       (11, (select id from `groups` where code like '%w201%')),
       (12, (select id from `groups` where code like '%w202%')),

       (13, (select id from `groups` where code like '%w201%')),
       (14, (select id from `groups` where code like '%w202%')),
       (15, (select id from `groups` where code like '%w201%')),
       (16, (select id from `groups` where code like '%w202%')),

       (17, (select id from `groups` where code like '%w201%')),
       (18, (select id from `groups` where code like '%w202%')),
       (19, (select id from `groups` where code like '%w201%')),
       (20, (select id from `groups` where code like '%w202%')),

       (20, (select id from `groups` where code like '%w201%')),
       (21, (select id from `groups` where code like '%w202%')),
       (22, (select id from `groups` where code like '%w201%')),
       (23, (select id from `groups` where code like '%w202%')),

       (24, (select id from `groups` where code like '%w201%')),
       (25, (select id from `groups` where code like '%w202%')),
       (26, (select id from `groups` where code like '%w201%')),
       (27, (select id from `groups` where code like '%w202%')),

       (28, (select id from `groups` where code like '%w201%')),
       (29, (select id from `groups` where code like '%w202%')),
       (30, (select id from `groups` where code like '%w201%')),
       (31, (select id from `groups` where code like '%w202%')),

       (32, (select id from `groups` where code like '%w201%')),
       (33, (select id from `groups` where code like '%w202%')),
       (34, (select id from `groups` where code like '%w201%')),
       (35, (select id from `groups` where code like '%w202%')),

       (36, (select id from `groups` where code like '%w201%')),
       (37, (select id from `groups` where code like '%w202%')),
       (38, (select id from `groups` where code like '%w201%')),
       (39, (select id from `groups` where code like '%w202%')),

       (40, (select id from `groups` where code like '%w201%')),
       (41, (select id from `groups` where code like '%w202%')),
       (42, (select id from `groups` where code like '%w201%')),
       (43, (select id from `groups` where code like '%w202%')),

       (44, (select id from `groups` where code like '%w201%')),
       (45, (select id from `groups` where code like '%w202%')),
       (46, (select id from `groups` where code like '%w201%')),
       (47, (select id from `groups` where code like '%w202%')),

       (48, (select id from `groups` where code like '%w201%')),
       (49, (select id from `groups` where code like '%w202%')),
       (50, (select id from `groups` where code like '%w201%')),
       (51, (select id from `groups` where code like '%w202%'));

COMMIT;

