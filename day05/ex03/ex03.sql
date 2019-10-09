<<<<<<< HEAD
INSERT INTO ft_table(login, groupe, creation_date)
=======
INSERT INTO ft_table(`login`, `group`, `creation_date`)
>>>>>>> aa3999d52cff0c344becc33a1fd831e3bd0b5cb3
SELECT last_name,
       'other',
       birthdate
FROM user_card
WHERE LENGTH(last_name) < 9
  AND last_name LIKE '%a%'
ORDER BY last_name ASC
LIMIT 10;