SELECT `id`,
       `email`,
       `password`,
       `deleted`,
       `created`,
       `updated`
FROM   `users`
WHERE  `deleted` = :deleted
  AND  `email`   = :email;