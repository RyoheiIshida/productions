create table prefectures(
        id integer not null primary key auto_increment, 
        name char(20)
);
create table large_areas(
    id integer not null primary key auto_increment, 
    name char(20),
    prefecture_name char(20),
    prefecture_id int,
    foreign key (prefecture_id)
    references prefectures(id)
);

create table citys(
    id integer not null primary key auto_increment, 
    name char(20),
    citycode char(7),
    prefecture_id int,
    foreign key(prefecture_id)
    references prefectures(id)
);
