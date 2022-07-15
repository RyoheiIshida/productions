create table users (
    id integer not null primary key auto_increment,
    email char(255) not null,
    password char(255) not null,
    authority char(255) not null,    -- 在庫発注管理者、在庫発注社員、在庫受注社員の三種類
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table productions(
    id integer not null primary key auto_increment,
    name char(30) not null,    -- 名称
    price integer not null default 0,    -- 価格
    created DATETIME default CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
create table stocks(
    id integer not null primary key auto_increment,
    productions_id integer not null,
    stock_quantity integer not null default 0,    -- 在庫数
    created DATETIME default CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key(productions_id) references productions(id)
);
create table orders(
    id integer not null primary key auto_increment,
    stocks_id integer not null,
    productions_id integer not null,
    order_quantity integer not null default 0,    -- 発注数
    status char(8) not null default '発注確認',    -- ステータス
    created DATETIME default CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    foreign key(stocks_id) references stocks(id),
    foreign key(productions_id) references productions(id)
);

-- 以下stocksのサンプルデータ
insert into productions (name, price)values ("ブートジョロキア", 120);
insert into productions (name, price)values ("チョコレートジョロキア", 150);
insert into productions (name, price)values ("ハラペーニョ", 180);
insert into productions (name, price)values ("ハバネロ", 200);