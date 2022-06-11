create table large_area(
    name varchar(20),
    prefecture_name char(20),
    prefecture_id int
);
create table prefecture(
    prefecture_id int,
    name char(20)
);
create table city(
    name varchar(20),
    citycode int(7) zerofill,
    prefecture_id int
);
