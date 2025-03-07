UPDATE `users` SET `email`    = :email,
                   `password` = :password,
                   `deleted`  = :deleted
               WHERE `id` = :id;