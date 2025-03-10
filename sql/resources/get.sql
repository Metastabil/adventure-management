SELECT `id`, `name`, `description`, `deleted`, `created`, `updated`
FROM `resources`
WHERE `deleted` = :deleted;