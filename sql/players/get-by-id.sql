SELECT `id`,
       `username`,
       `password`,
       `level`,
       `active`,
       `deleted`,
       `created`,
       `updated`
FROM   `players`
WHERE  `deleted` = :deleted
   AND `id`      = :id;
