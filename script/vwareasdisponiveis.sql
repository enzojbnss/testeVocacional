CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `testevocacional`.`vwareasdisponiveis` AS
    SELECT 
        `testevocacional`.`area`.`idArea` AS `idArea`,
        `testevocacional`.`area`.`descricao` AS `descricao`,
        `testevocacional`.`area`.`ativo` AS `ativo`,
        `testevocacional`.`intencaoarea`.`idIntencao` AS `idIntencao`,
        `testevocacional`.`intencaoarea`.`idIntencaoArea` AS `idIntencaoArea`,
        `testevocacional`.`questionariointencao`.`peso` AS `peso`,
        `testevocacional`.`questionariointencao`.`idQuestionarioIntencao` AS `idQuestionarioIntencao`,
        `testevocacional`.`questionariointencao`.`idQuestionario` AS `idQuestionario`
    FROM
        ((`testevocacional`.`area`
        JOIN `testevocacional`.`intencaoarea` ON ((`testevocacional`.`area`.`idArea` = `testevocacional`.`intencaoarea`.`idArea`)))
        JOIN `testevocacional`.`questionariointencao` ON ((`testevocacional`.`intencaoarea`.`idIntencao` = `testevocacional`.`questionariointencao`.`idIntencao`)))