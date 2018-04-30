CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `testevocacional`.`vwquetionariointencao` AS
    SELECT 
        `testevocacional`.`intencao`.`idIntencao` AS `idIntencao`,
        `testevocacional`.`perguntarespota`.`idPergunta` AS `idPergunta`,
        `testevocacional`.`perguntarespota`.`idResposta` AS `idresposta`,
        `testevocacional`.`respotaquestionario`.`idQuestionario` AS `idQuestionario`
    FROM
        (((`testevocacional`.`intencao`
        JOIN `testevocacional`.`respostaintencao` ON ((`testevocacional`.`intencao`.`idIntencao` = `testevocacional`.`respostaintencao`.`idIntencao`)))
        JOIN `testevocacional`.`perguntarespota` ON ((`testevocacional`.`respostaintencao`.`idPerguntaRespota` = `testevocacional`.`perguntarespota`.`idPerguntaRespota`)))
        JOIN `testevocacional`.`respotaquestionario` ON ((`testevocacional`.`respostaintencao`.`idPerguntaRespota` = `testevocacional`.`respotaquestionario`.`idPerguntaRespota`)))