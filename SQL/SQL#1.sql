SELECT JSON_VALUE(data, '$.PropertyType') as PropertyType,
       COUNT(JSON_VALUE(data, '$.PropertyType'))
       FROM lead
       GROUP BY JSON_VALUE(data, '$.PropertyType')