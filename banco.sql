create database login;

use login ;

create table if not exists cliente(
    id int not null AUTO_INCREMENT,
    email varchar(60) not null unique,
    senha varchar(30) not null,
    primary key (id)
)

drop database login;