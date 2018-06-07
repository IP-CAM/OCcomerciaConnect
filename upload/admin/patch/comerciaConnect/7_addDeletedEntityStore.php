<?php
use comercia\Util;

return function () {
    Util::db()->query("CREATE TRIGGER ccDeleteProductStore AFTER DELETE ON `" . DB_PREFIX . "product_to_store` FOR EACH ROW BEGIN INSERT INTO `" . DB_PREFIX . "ccDeletedEntities` SET `type` = 'prodductStore', `entityId` = concat(old.product_id,'_',old.store_id), `isCleaned` = 0; END");
    Util::db()->query("CREATE TRIGGER ccDeleteCategoryStore AFTER DELETE ON `" . DB_PREFIX . "category_to_store` FOR EACH ROW BEGIN INSERT INTO `" . DB_PREFIX . "ccDeletedEntities` SET `type` = 'categoryStore', `entityId` = concat(old.category_id,'_',old.store_id), `isCleaned` = 0; END");
};