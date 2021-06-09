DELIMITER $$

CREATE OR REPLACE FUNCTION sprawdz_MAX_ID(
    
) RETURNS integer
BEGIN

    declare result integer;
    set result = -1;

    SELECT MAX(Zamów_ID) INTO result FROM zamów;

    IF(result > 0) THEN
        RETURN result;
    ELSE
        RETURN 0;
    END IF;
	

END $$
DELIMITER ;