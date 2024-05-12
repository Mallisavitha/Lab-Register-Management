CREATE database lab_reg;
use  lab_reg;

CREATE TABLE student_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    registerNumber VARCHAR(255),
    name VARCHAR(255),
    departmentYear VARCHAR(255),
    subjectName VARCHAR(255),
    systemnumber varchar(3),
    laptop VARCHAR(3),
     date_in DATE,
    time_in TIME,
    time_out TIME
    
);

drop database lab_reg;
drop table student_data;
drop database lab_reg;
select * from student_data;
TRUNCATE TABLE student_data;



CREATE TABLE staff_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    regno VARCHAR(255),
    name VARCHAR(60),
    departmentYear VARCHAR(255),
    purpose VARCHAR(255),
    systemnumber VARCHAR(255),
    date_in DATE,
    time_in TIME,
    time_out TIME
);


truncate table staff_data;

drop table staff_data;
select * from staff_data;


CREATE TABLE help_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    systemnumber VARCHAR(255) NOT NULL,
    technical_issue TEXT NOT NULL,
    
	feedback TEXT
);

select * from help_data;
drop table help_data;

create table admin(
username varchar (100),
password varchar (100)
);
insert into admin values("2k21it47@kiot.ac.in","123");
select * from admin;