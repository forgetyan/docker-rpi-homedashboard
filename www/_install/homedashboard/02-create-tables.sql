CREATE TABLE homedashboard.menu (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  position int,
  icon varchar(20) NOT NULL,
  text varchar(40) NOT NULL
);
CREATE TABLE homedashboard.dashboardtype (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL,
  controller VARCHAR(30) NOT NULL
);
CREATE TABLE homedashboard.dashboard (
  id int NOT NULL AUTO_INCREMENT,
  type int NOT NULL,
  position int NOT NULL,
  sizemobile INT NOT NULL,
  sizecomputer INT NOT NULL,
  color VARCHAR(20) NOT NULL,
  title VARCHAR(20) NOT NULL,
  configuration TEXT,
  PRIMARY KEY(id),
  FOREIGN KEY (type) 
  	REFERENCES dashboardtype(id)
);