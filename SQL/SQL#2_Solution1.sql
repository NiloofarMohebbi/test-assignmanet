SET @weekday = WEEKDAY(CURRENT_DATE);

SELECT contract.title, client.title,
CASE
    WHEN @weekday = 0 AND contract.daily_cap_1 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_1)
    WHEN @weekday = 0 AND contract.daily_cap_1 = -1 THEN 0

	WHEN @weekday = 1 AND contract.daily_cap_2 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_2)
    WHEN @weekday = 1 AND contract.daily_cap_2 = -1 THEN 0

	WHEN @weekday = 2 AND contract.daily_cap_3 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_3)
    WHEN @weekday = 2 AND contract.daily_cap_3 = -1 THEN 0

    WHEN @weekday = 3 AND contract.daily_cap_4 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_4)
    WHEN @weekday = 3 AND contract.daily_cap_4 = -1 THEN 0

	WHEN @weekday = 4 AND contract.daily_cap_5 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_5)
    WHEN @weekday = 4 AND contract.daily_cap_5 = -1 THEN 0

	WHEN @weekday = 5 AND contract.daily_cap_6 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_6)
    WHEN @weekday = 5 AND contract.daily_cap_6 = -1 THEN 0

	WHEN @weekday = 6 AND contract.daily_cap_7 > 0 THEN 100 *(contract.daily_cap_count/contract.daily_cap_7)
    WHEN @weekday = 6 AND contract.daily_cap_7 = -1 THEN 0

    ELSE 'UNDEFINED'
    END AS daily_cap_completion
FROM contract
JOIN client ON client.id = contract.client_id
WHERE contract.status = "active" AND (client.manager_id = 1 OR client.manager_id = 3)

#Note: 0=Monday, 1=Tuesday, 2=Wednesday, 3=Thursday, 4=Friday, 5=Saturday, 6=Sunday.