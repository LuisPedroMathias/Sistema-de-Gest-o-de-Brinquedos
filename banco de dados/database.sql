CREATE DATABASE sistema_brinquedos_lp;
use sistema_brinquedos_lp;

create table brinquedos (
    id_brinquedo int primary key auto_increment,
    nome varchar(100) not null,
    categoria varchar(100) not null,
    faixa_etaria varchar(50) not null,
    preco decimal(10,2) not null,
    quantidade_estoque int not null
);