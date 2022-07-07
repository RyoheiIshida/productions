create table users (
    id integer not null primary key auto_increment,
    email char(255) not null,
    password char(255) not null,
    authority char(255) not null,    -- 在庫発注管理者、在庫発注社員、在庫受注社員の三種類
    created DATETIME DEFAULT CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

create table stocks(
    id integer not null primary key auto_increment,
    name char(30) not null,    -- 名称
    stock_quantity integer not null default 0,    -- 財語数
    order_quantity integer not null default 0,    -- 発注数
    price integer not null default 0,    -- 価格
    status char(8) not null default '初期ステータス',    -- ステータス
    created DATETIME default CURRENT_TIMESTAMP,
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 以下stocksのサンプルデータ
insert into
    stocks (name, price)
values
    ("りんご", 120);

insert into
    stocks (name, price)
values
    ("オレンジ", 110);

insert into
    stocks (name, price)
values
    ("ぶどう", 180);

insert into
    stocks (name, price)
values
    ("パイナップル", 200);