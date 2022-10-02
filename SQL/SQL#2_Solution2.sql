SET @columnName = CONCAT('contract.daily_cap_', WEEKDAY(CURRENT_DATE)+1);

SET @query = CONCAT('SELECT contract.title, client.title,
CASE
	WHEN ',@columnName,' = -1 THEN 0
	WHEN ',@columnName,' = 0 THEN "UNDEFINED"
    ELSE 100 * (contract.daily_cap_count / ', @columnName, ')
END AS daily_cap_completion
FROM contract
JOIN client ON client.id = contract.client_id
WHERE contract.status = "active" AND (client.manager_id = 1 OR client.manager_id = 3)');

PREPARE stmt FROM @query;

EXECUTE stmt;

#Note: 1=Sunday, 2=Monday, 3=Tuesday, 4=Wednesday, 5=Thursday, 6=Friday, 7=Saturday.
