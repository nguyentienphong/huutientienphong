ALTER TABLE `recruitment` ADD `rec_title_ko` VARCHAR(255) NOT NULL AFTER `rec_detail_en`, ADD `rec_summary_ko` TEXT NOT NULL AFTER `rec_title_ko`, ADD `rec_detail_ko` TEXT NOT NULL AFTER `rec_summary_ko`;