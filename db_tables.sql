create table user_account (
    name varchar(50) not null,
    email varchar(100) primary key,
    password varchar(500) not null,
    postal_code numeric not null
)

create table tasks (
    task_type varchar(50) primary key
)

-- can only reference primary key of the referenced table
create table performs (
    email varchar(100),
    task_type varchar(50),
    price numeric,
    foreign key (email) references taskers(email),
    foreign key (task_type) references tasks(task_type),
    primary key (email, task_type)
)

create table taskAvailableDatetime (
    email varchar(100),
    task_type varchar(50),
    availableDate date,
    availableTime time,
    foreign key (email, task_type) references performs (email, task_type),
    primary key (email, task_type, availableDate)
)

create table taskers (
    email varchar(100) primary key,
    name varchar(50) not null,
    phone numeric,
    address varchar(200),
    foreign key (email) references user_account (email)
)
