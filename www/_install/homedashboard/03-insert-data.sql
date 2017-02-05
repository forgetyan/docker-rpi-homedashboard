INSERT INTO homedashboard.menu (position, icon, text) VALUES 
(1, 'block layout', 'Dashboard'),
(2, 'alarm outline', 'Timers'),
(3, 'game', 'Jeux vidéos'),
(4, 'unordered list', 'Listes');


INSERT INTO homedashboard.dashboardtype (name, controller) VALUES 
('Nightscout','nightscout/index'),
('Meteo','meteo/index'),
('Timer','timer/index'),
('Liste','list/index'),
('Calendar','calendar/index');

INSERT INTO homedashboard.dashboard (menuId, type, position, sizeMobile, sizeComputer, color, title, configuration) VALUES
(1, 1, 1, 8, 4, 'green', 'Glycémie Jérémy', '{  "siteUrl": "//jay-t1d.azurewebsites.net" }'),
(1, 2, 2, 8, 4, 'yellow', 'Météo', '{  "siteUrl": "//weather.gc.ca/wxlink/wxlink.html?cityCode=qc-13&amp;lang=f" }'),
(1, 1, 3, 8, 4, 'orange', 'Glycémie Maxime', '{  "siteUrl": "//max-t1d.azurewebsites.net" }'),
(1, 5, 4, 8, 4, 'blue', 'Événements à venir');

insert into dashboard(id, menuId, type, position, sizeMobile, sizeComputer, color, title) values(4, 1, 5, 4, 8, 4, 'blue', 'Événements à venir');