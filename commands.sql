create database customer;

use customer;

grant all on customer.* to testuser@localhost identified by '9999';

create table customer (
  id int primary key auto_increment,
  first_name varchar(255),
  last_name varchar(255),
  email varchar(255),
  telephone_number varchar(11),
  created_at datetime,
  updated_at datetime
);

