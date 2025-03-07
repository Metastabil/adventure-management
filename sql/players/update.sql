UPDATE `players` SET `username` = :username,
                     `password` = :password,
                     `level`    = :level,
                     `active`   = :active,
                     `deleted`  = :deleted
                 WHERE `id` = :id;