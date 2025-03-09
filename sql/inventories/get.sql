SELECT `id`, `player_id`, `deleted`, `created`, `updated`, `username`
FROM `v_inventories`
WHERE `deleted` = :deleted;