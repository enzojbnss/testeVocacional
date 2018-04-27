CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `testevocacional`.`cursosdisponiveis` AS
    SELECT 
        `testevocacional`.`intencaoarea`.`idIntencao` AS `idIntencao`,
        `testevocacional`.`cursoarea`.`idArea` AS `idArea`,
        `testevocacional`.`curso`.`idCurso` AS `idCurso`,
        `testevocacional`.`curso`.`idTipoCurso` AS `idTipoCurso`,
        `testevocacional`.`curso`.`nome` AS `nome`,
        `testevocacional`.`tipocurso`.`descricao` AS `descricao`,
        `testevocacional`.`tipocurso`.`ativo` AS `ativo`,
        `testevocacional`.`cursoarea`.`idCursoArea` AS `idCursoArea`,
        `testevocacional`.`intencaoarea`.`idIntencaoArea` AS `idIntencaoArea`,
        `testevocacional`.`questionariointencao`.`peso` AS `peso`,
        `testevocacional`.`questionariointencao`.`idQuestionarioIntencao` AS `idQuestionarioIntencao`,
        `testevocacional`.`questionariointencao`.`idQuestionario` AS `idQuestionario`
    FROM
        ((((`testevocacional`.`curso`
        JOIN `testevocacional`.`tipocurso` ON ((`testevocacional`.`curso`.`idTipoCurso` = `testevocacional`.`tipocurso`.`idTipoCurso`)))
        JOIN `testevocacional`.`cursoarea` ON ((`testevocacional`.`curso`.`idCurso` = `testevocacional`.`cursoarea`.`idCurso`)))
        JOIN `testevocacional`.`intencaoarea` ON ((`testevocacional`.`cursoarea`.`idArea` = `testevocacional`.`intencaoarea`.`idArea`)))
        JOIN `testevocacional`.`questionariointencao` ON ((`testevocacional`.`intencaoarea`.`idIntencao` = `testevocacional`.`questionariointencao`.`idIntencao`)))