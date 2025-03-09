SELECT `id`, `player_id`, `deleted`, `created`, `updated`
FROM `inventories`
WHERE `deleted` = :deleted
  AND `player_id` = :player_id;
