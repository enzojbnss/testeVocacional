set sql_safe_updates = 0;
delete from questionariointencao;
alter table questionariointencao auto_increment = 1;
delete from testevocacional.respotaquestionario;
alter table testevocacional.respotaquestionario auto_increment = 1;
delete from testevocacional.questionario;
alter table testevocacional.questionario auto_increment = 1;
set sql_safe_updates = 1;
select * from testevocacional.questionario;