DROP DATABASE car_rental_system;
CREATE DATABASE car_rental_system;

CREATE TABLE location_details
( location_id int auto_increment,
  city varchar(50) not null,
  street varchar(50) not null,
  zipcode char(5) not null,

  CONSTRAINT LocationPk
  PRIMARY KEY (location_id),
  CONSTRAINT LocationUnique
  unique(city, street, zipcode)
);

CREATE TABLE customer(
  customer_id int auto_increment,
  fname varchar(255) not null,
  lname varchar(255),
  email varchar(255) not null unique,
  password varchar(255) not null,
  city varchar(50) not null,
  street varchar(50) not null,
  zipcode char(5) not null,
  gender char(1),

  CONSTRAINT CustomerPk PRIMARY KEY(customer_id)

);

CREATE TABLE car_branch(
  branch_id int,
  branch_name varchar(30) not null,
  branch_location int not null,

  CONSTRAINT BranchPk
  PRIMARY KEY (branch_id),
  CONSTRAINT BranchFk FOREIGN KEY (branch_location)
  REFERENCES location_details(location_id)

);

CREATE TABLE car
( model_name varchar(50) not null,
  branch_id int not null,
  availability boolean not null default TRUE,
  car_status varchar(20) not null,
  license_plate char(10),
  manufacturing_year int(4) not null,
  rental_price float not null,
  color varchar(10) not null,

  CONSTRAINT CarPk
  PRIMARY KEY (license_plate),
  CONSTRAINT CarFk1 FOREIGN KEY (branch_id)
  REFERENCES car_branch(branch_id)
);

CREATE TABLE booking_details(
  reservation_id int unique auto_increment,
  reservation_date timestamp default current_timestamp,
  pickup_date date not null,
  return_date date not null,
  pickup_location int not null,
  customer_id int not null,
  license_plate char(10) not null,

  CONSTRAINT BookingPk PRIMARY KEY(customer_id,license_plate),
  CONSTRAINT BookingFk1 FOREIGN KEY (pickup_location)
  REFERENCES car_branch(branch_id),
  CONSTRAINT BookingFk2 FOREIGN KEY (customer_id)
  REFERENCES customer(customer_id),
  CONSTRAINT BookingFk3 FOREIGN KEY (license_plate)
  REFERENCES car(license_plate)
);

CREATE TABLE invoice_details(
  invoice_id int auto_increment,
  payment_date date not null,
  late_fees float not null default 0,
  payment_method char(5) not null,
  normal_amount float not null,
  total_amount float not null,
  reservation_id int not null,

  CONSTRAINT InvoicePk PRIMARY KEY(invoice_id),
  CONSTRAINT InvoiceFk1 FOREIGN KEY (reservation_id)
  REFERENCES booking_details(reservation_id)
);
