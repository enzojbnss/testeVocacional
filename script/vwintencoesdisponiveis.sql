CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `testevocacional`.`vwintencoesdisponiveis` AS
    SELECT 
        `testevocacional`.`intencao`.`idIntencao` AS `id`,
        `testevocacional`.`intencao`.`texto` AS `texto`,
        `testevocacional`.`intencao`.`ativo` AS `ativo`,
        `testevocacional`.`respostaintencao`.`idResposta` AS `idResposta`,
        `testevocacional`.`respostaintencao`.`idRespostaIntencao` AS `idRespostaIntencao`,
        `testevocacional`.`respotaquestionario`.`idrespotaquestionario` AS `idrespotaquestionario`,
        `testevocacional`.`respotaquestionario`.`idQuestionario` AS `idQuestionario`
    FROM
        ((`testevocacional`.`intencao`
        JOIN `testevocacional`.`respostaintencao` ON ((`testevocacional`.`intencao`.`idIntencao` = `testevocacional`.`respostaintencao`.`idIntencao`)))
        JOIN `testevocacional`.`respotaquestionario` ON ((`testevocacional`.`respostaintencao`.`idResposta` = `testevocacional`.`respotaquestionario`.`idResposta`)))