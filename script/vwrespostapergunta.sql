CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `testevocacional`.`vwrespostapergunta` AS
    SELECT 
        `testevocacional`.`perguntarespota`.`idResposta` AS `id`,
        `testevocacional`.`pergunta`.`texto` AS `texto`,
        `testevocacional`.`pergunta`.`ativo` AS `ativo`,
        `testevocacional`.`perguntarespota`.`idPergunta` AS `idPergunta`,
        `testevocacional`.`perguntarespota`.`idPerguntaRespota` AS `idPerguntaRespota`
    FROM
        (`testevocacional`.`perguntarespota`
        JOIN `testevocacional`.`pergunta` ON ((`testevocacional`.`perguntarespota`.`idPergunta` = `testevocacional`.`pergunta`.`idPergunta`)))