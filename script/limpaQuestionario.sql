set sql_safe_updates = 0;
delete from questionariointencao;
alter table questionariointencao auto_increment = 1;
delete from respotaquestionario;
alter table respotaquestionario auto_increment = 1;
delete from questionario;
alter table questionario auto_increment = 1;
delete from pessoa;
alter table pessoa auto_increment = 1;
delete from intencaoarea;
alter table intencaoarea auto_increment = 1;
delete from respostaintencao;
alter table respostaintencao auto_increment = 1;
set sql_safe_updates = 1;
select * from questionario;