UPDATE `inventories` SET `player_id` = :player_id,
                         `deleted` = :deleted
WHERE `id` = :id;