set sql_safe_updates = 0;
delete from questionariointencao;
alter table questionariointencao auto_increment = 1;
set sql_safe_updates = 1;
select * from questionariointencao;