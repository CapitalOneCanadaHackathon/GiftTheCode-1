-- Gift The Code -- SampleData.sql
-- Jody Kirton
-- Insert sample table records for demo display purposes.



INSERT INTO gtc_volunteers (`name`, `phone`, `email`, `password`)
VALUES('Jody Kirton', '416-255-5940', 'jody@hotmail.com', 'password123');

INSERT INTO gtc_volunteers (`name`, `phone`, `email`, `password`)
VALUES('Feier Lai', '416-123-3434', 'feier@hotmail.com', 'password123');

INSERT INTO gtc_volunteers (`name`, `phone`, `email`, `password`)
VALUES('Tanaka Ruzvidzo', '416-255-5940', 'jody@hotmail.com', 'password123');

INSERT INTO gtc_volunteers (`name`, `phone`, `email`, `password`)
VALUES('Saeed Alam', '416-255-5940', 'jody@hotmail.com', 'password123');


INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Clothing', 'clothing.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Toiletries', 'toiletries.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Home', 'home.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Feminine Products', 'feminineproducts.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('First Aid', 'firstaid.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Food', 'food.svg');

INSERT INTO gtc_item_categories (`name`,`img`)
VALUES('Miscellaneous', 'miscellaneous.svg');


INSERT INTO gtc_items (`id_item_category`,`name`,`size`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 1, 'Shoes', '6', 1, '2017-01-20 01:01:00', 0, 'High', 'Running low in supplies, one pair size 6 in stock');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-01-20 01:01:00', 1, 1, 'Running low in supplies, one pair size 6 in stock', 'Item removed');


INSERT INTO gtc_items (`id_item_category`,`name`,`size`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 1, 'Winter Hat', 'sm', 2, '2017-02-22 02:02:00', 0, 'Low', 'Full box of hats currently avaliable');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-02-22 02:02:00', 2, 2, 'Full box of hats currently avaliable', 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`size`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 1, 'Socks', 'md', 3, '2017-03-23 03:02:00', 1, 'High', 'Sally Hansen needs 3 new pairs of socks');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-03-23 03:02:00', 3, 3, 'Sally Hansen needs 3 new pairs of socks', 'Item requested');


INSERT INTO gtc_items (`id_item_category`,`name`,`size`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 1, 'Shirt', 'xs', 4, '2017-04-23 03:02:00', 0, 'Medium', 'Red dress shirt added to inventory');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-04-23 03:02:00', 4, 4, 'Red dress shirt added to inventory', 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 2, 'Soap', 1, '2017-05-20 01:05:00', 0, 'Med', '5 bars of soap donated');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-05-20 01:05:00', 1, 5, '5 bars of soap donated', 'Item Added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 2, 'Tiolet tissue', 2, '2017-05-22 02:02:00', 0, 'High', 'only two rolls left in stock');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-05-22 02:02:00', 2, 6, 'only two rolls left in stock', 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 2, 'Shampoo', 3, '2017-05-25 03:02:00', 1, 'High', 'John from next door is running low on shampoo');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-05-25 03:02:00', 3, 7, 'John from next door is running low on shampoo', 'Item requested');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 2, 'Body lotion', 4, '2017-05-27 03:02:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`, `description`)
VALUES('2017-05-27 03:02:00', 4, 8, 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 3, 'Pillow cases', 1, '2017-06-20 01:05:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`description`)
VALUES('2017-06-20 01:05:00', 1, 9, 'Item Added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 3, 'Curtains', 2, '2017-06-22 02:02:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`description`)
VALUES('2017-06-22 02:02:00', 2, 10, 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 3, 'Broom', 3, '2017-06-25 03:02:00', 1, 'High', 'Jenny asked for a new broom');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-06-25 03:02:00', 3, 11, 'Jenny asked for a new broom', 'Item requested');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 3, 'Oven mittens', 4, '2017-06-27 03:02:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`, `description`)
VALUES('2017-06-27 03:02:00', 4, 12, 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 4, 'Pads', 1, '2017-07-20 01:05:00', 0, 'Medium');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`description`)
VALUES('2017-07-20 01:05:00', 1, 13, 'Item Added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 5, 'Bandages', 2, '2017-08-22 02:02:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`description`)
VALUES('2017-08-22 02:02:00', 2, 14, 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`, `Memo`)
VALUES( 5, 'First Aid Kit', 3, '2017-09-25 03:02:00', 1, 'High', 'Kevin is in need of a First Aid Kit');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`memo`,`description`)
VALUES('2017-09-25 03:02:00', 3, 15, 'Kevin is in need of a First Aid Kit', 'Item requested');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 6, 'Pasta', 4, '2017-10-27 03:02:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`, `description`)
VALUES('2017-10-27 03:02:00', 4, 16, 'Item added');


INSERT INTO gtc_items (`id_item_category`,`name`,`updated_by`, `update_date`, `requested`,`priority`)
VALUES( 7, 'Books', 1, '2017-11-01 01:05:00', 0, 'Low');

INSERT INTO gtc_items_timestamp (`time`, `id_volunteer`,`id_item`,`description`)
VALUES('2017-06-20 01:05:00', 1, 17, 'Item Added');
