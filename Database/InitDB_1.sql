Create database Registration;

CREATE TABLE Person (
  PersonID int NOT NULL,
  FirstName VARCHAR(255),
  LastName VARCHAR(255),
  Address VARCHAR(255),
  Email VARCHAR(255),
  PhoneNumber VARCHAR(255),
  DateOfBirth date,
  Primary Key (PersonID)
) ;


CREATE TABLE Administrator (
  employmentID int NOT NULL,
  PersonID  int,
  Primary key (employmentID),
  Foreign key (PersonID)
  REFERENCES Person (PersonID)
) ;

CREATE TABLE Student (
  StudentID int NOT NULL,
  PersonID int,
  RegisterID int,
  Primary Key (studentID),
  foreign key (PersonID)
  REFERENCES Person (PersonID),
  foreign key (RegisterID)
  REFERENCES Registered (RegisterID)
) ;

CREATE TABLE Registered (
  RegisterID int NOT NULL,
  StudentID int NOT NULL,
  CourseCode VARCHAR(255),
  Primary key (RegisterID)
) ;

CREATE TABLE Course (
  CourseCode VARCHAR(255) NOT NULL,
  Title VARCHAR (255),
  Semester VARCHAR(255),
  Days VARCHAR(255),
  CourseTime time,
  Instructor VARCHAR (255),
  Room int ,
  StartDate Date ,
  EndDate Date,
  RegisterID int, 
  Primary KEy (CourseCode),
  Foreign key (RegisterID)
  REFERENCES Registered (RegisterID)
) ;

insert into Person (PersonID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth) values (1, 'Shandie', 'MacCaughen', '8625 Talisman Trail', 'smaccaughen0@blogs.com', '724-550-5464', '1981-03-14');
insert into Person (PersonID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth) values (2, 'Mimi', 'Bardnam', '4122 Kropf Point', 'mbardnam1@feedburner.com', '303-523-3763', '2004-08-31');
insert into Person (PersonID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth) values (3, 'Goldie', 'Bendon', '0581 Gina Crossing', 'gbendon2@google.ru', '191-118-1617', '1998-08-28');
insert into Person (PersonID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth) values (4, 'Ransell', 'Ruggier', '1688 Vahlen Court', 'rruggier3@army.mil', '865-801-9406', '1988-07-04');
insert into Person (PersonID, FirstName, LastName, Address, Email, PhoneNumber, DateOfBirth) values (5, 'Alanah', 'Barczynski', '0996 Erie Street', 'abarczynski4@mozilla.com', '690-199-8607', '1986-10-04');

insert into Administrator (employmentID, PersonID) values (1, 1);
insert into Administrator (employmentID, PersonID) values (2, 2);
insert into Administrator (employmentID, PersonID) values (3, 3);
insert into Administrator (employmentID, PersonID) values (4, 4);
insert into Administrator (employmentID, PersonID) values (5, 5);

insert into Registered (RegisterID, StudentID, CourseCode) values (1, 1, 'Comp333');
insert into Registered (RegisterID, StudentID, CourseCode) values (2, 2, 'Comp354');
insert into Registered (RegisterID, StudentID, CourseCode) values (3, 3, 'Soen378');
insert into Registered (RegisterID, StudentID, CourseCode) values (4, 4, 'Comp345');
insert into Registered (RegisterID, StudentID, CourseCode) values (5, 5, 'Soen287');


insert into Student (StudentID, PersonID, RegisterID) values (1, 1, 1);
insert into Student (StudentID, PersonID, RegisterID) values (2, 2, 2);
insert into Student (StudentID, PersonID, RegisterID) values (3, 3, 3);
insert into Student (StudentID, PersonID, RegisterID) values (4, 4, 4);
insert into Student (StudentID, PersonID, RegisterID) values (5, 5, 5);

insert into Course (CourseCode, Title, Semester, Days, CourseTime, Instructor, Room, StartDate, EndDate) values (1, 'Comp333', 'winter', '2021-12-27', '12:30', 'Libbey Stockill', 74, '2022-09-25', '2022-08-08');
insert into Course (CourseCode, Title, Semester, Days, CourseTime, Instructor, Room, StartDate, EndDate) values (2, 'Soen287', 'summer1', '2022-09-13', '7:17', 'Gordon Sirmon', 63, '2022-09-07', '2022-05-21');
insert into Course (CourseCode, Title, Semester, Days, CourseTime, Instructor, Room, StartDate, EndDate) values (3, 'Comp353', 'fall', '2021-10-27', '14:48', 'Jemimah Wyllcocks', 26, '2021-10-26', '2021-11-14');
insert into Course (CourseCode, Title, Semester, Days, CourseTime, Instructor, Room, StartDate, EndDate) values (4, 'Comp346', 'winter', '2022-05-14', '16:30', 'Tish Sleite', 100, '2022-05-10', '2022-03-11');
insert into Course (CourseCode, Title, Semester, Days, CourseTime, Instructor, Room, StartDate, EndDate) values (5, 'Comp232', 'fall', '2021-11-21', '10:25', 'Titus Norridge', 57, '2022-01-06', '2022-05-21');

