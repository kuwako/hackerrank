/*
Enter your query here.
*/
(
  SELECT
    CONCAT(Name, "(", LEFT(Occupation, 1), ")")
  FROM OCCUPATIONS
  ORDER BY Name
  LIMIT 0,18446744073709551615
 )
UNION ALL
(
  SELECT
    CONCAT("There are a total of ", count(1), " ", LOWER(Occupation), "s.")
  FROM OCCUPATIONS
  GROUP BY Occupation
  ORDER BY
    count(1)
    , Occupation
  LIMIT 0,18446744073709551615
  )
