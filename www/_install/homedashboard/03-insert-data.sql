INSERT INTO homedashboard.menu (position, icon, text)
VALUES (1, 'block layout', 'Dashboard'),
VALUES (2, 'alarm outline', 'Timers'),
VALUES (3, 'game', 'Jeux vidéos'),
VALUES (4, 'unordered list', 'Listes');


INSERT INTO homedashboard.dashboardtype (name, controller) VALUES 
('Nightscout','nightscout/index'),
('Meteo','meteo/index'),
('Timer','timer/index'),
('Liste','list/index');

INSERT INTO homedashboard.dashboard (type, position, sizemobile, sizecomputer, color, title, configuration TEXT) VALUES
(1, 1, 8, 4, 'green', 'Glycémie Jérémy', '{  "siteUrl": "//jay-t1d.azurewebsites.net" }'),
(2, 2, 8, 4, 'yellow', 'Météo', '{  "siteUrl": "//weather.gc.ca/wxlink/wxlink.html?cityCode=qc-13&amp;lang=f" }'),
(1, 2, 8, 4, 'yellow', 'Glycémie Maxime', '{  "siteUrl": "//max-t1d.azurewebsites.net" }'),
);