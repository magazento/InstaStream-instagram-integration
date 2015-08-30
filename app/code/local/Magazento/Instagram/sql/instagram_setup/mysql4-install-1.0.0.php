<?php
/*
* Created on Dec 16, 2012
*  Author Ivan Proskuryakov - volgodark@gmail.com - Magazento.com
*  Copyright Proskuryakov Ivan. Magazento.com © 2012. All Rights Reserved.
*  Single Use, Limited Licence and Single Use No Resale Licence ["Single Use"]
*/
?>
<?php

$installer = $this;
$installer->startSetup();
$installer->run("


--

CREATE TABLE IF NOT EXISTS `{$this->getTable('magazento_instagram_item')}` (
  `item_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(10) NOT NULL,
  `meta_text_color` varchar(10) NOT NULL,
  `layout` varchar(50) NOT NULL,
  `order` varchar(50) NOT NULL,
  `user` text NOT NULL,
  `tag` text NOT NULL,
  `items_count` int(11) NOT NULL,
  `url` text NOT NULL,
  `height` varchar(50) NOT NULL DEFAULT '500px',
  `from_time` datetime DEFAULT NULL,
  `to_time` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `links` smallint(1) NOT NULL DEFAULT '1',
  `content_top` text NOT NULL,
  `content_bottom` text NOT NULL,
  `assign_categories` tinyint(4) NOT NULL,
  `assign_pages` tinyint(4) NOT NULL,
  `assign_products` tinyint(4) NOT NULL,
  `caption_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `caption_color` varchar(10) NOT NULL,
  `comments_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `comments_text_color` varchar(10) NOT NULL,
  `comments_border_color` varchar(10) NOT NULL,
  `comments_user_images` tinyint(4) NOT NULL DEFAULT '1',
  `container_padding` varchar(10) NOT NULL,
  `container_border_radius` varchar(10) NOT NULL,
  `container_border_color` varchar(10) NOT NULL,
  `container_background_color` varchar(10) NOT NULL,
  `container_background_image` varchar(20) NOT NULL,
  `item_size` varchar(10) NOT NULL,
  `item_spacing` varchar(10) NOT NULL,
  `item_border_radius` varchar(10) NOT NULL,
  `item_background_color` varchar(10) NOT NULL,
  `item_background_image` varchar(20) NOT NULL,
  `meta_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `meta_background_color` varchar(10) NOT NULL,
  `meta_likes_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `meta_likes_icon_color` varchar(10) NOT NULL,
  `meta_comments_enabled` tinyint(4) NOT NULL,
  `meta_comments_icon_color` varchar(10) NOT NULL,
  `meta_timestamp_enabled` tinyint(4) NOT NULL,
  `meta_timestamp_icon_color` varchar(10) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `magazento_instagram_item`
--

INSERT INTO `{$this->getTable('magazento_instagram_item')}` (`item_id`, `item_type`, `meta_text_color`, `layout`, `order`, `user`, `tag`, `items_count`, `url`, `height`, `from_time`, `to_time`, `is_active`, `links`, `content_top`, `content_bottom`, `assign_categories`, `assign_pages`, `assign_products`, `caption_enabled`, `caption_color`, `comments_enabled`, `comments_text_color`, `comments_border_color`, `comments_user_images`, `container_padding`, `container_border_radius`, `container_border_color`, `container_background_color`, `container_background_image`, `item_size`, `item_spacing`, `item_border_radius`, `item_background_color`, `item_background_image`, `meta_enabled`, `meta_background_color`, `meta_likes_enabled`, `meta_likes_icon_color`, `meta_comments_enabled`, `meta_comments_icon_color`, `meta_timestamp_enabled`, `meta_timestamp_icon_color`) VALUES
(48, 'user', '#454545', 'content', 'after', 'sony', '', 20, '', '500px', '2012-12-14 19:10:19', NULL, 1, 1, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta vel sagittis ipsum ultrices. Vestibulum blandit odio at risus euismod adipiscing feugiat nunc suscipit. Proin id dui massa, eget rutrum quam. Pellentesque fringilla nulla ac sem dictum eget lobortis ante iaculis. Etiam aliquam molestie massa quis porta. Proin euismod ipsum sed augue ultrices viverra.</p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'small', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(49, 'tag', '#454545', 'content', 'after', '', 'cars', 10, '', '500px', '2012-12-14 20:26:37', NULL, 1, 1, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta vel sagittis ipsum ultrices. Vestibulum blandit odio at risus euismod adipiscing feugiat nunc suscipit. Proin id dui massa, eget rutrum quam. Pellentesque&nbsp;</p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'big', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(50, 'tag', '#454545', 'content', 'before', '', 'spain', 10, '', '500px', '2012-12-14 20:26:37', NULL, 1, 1, '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta vel sagittis ipsum ultrices. Vestibulum blandit odio at risus euismod adipiscing feugiat nunc suscipit. Proin id dui massa, eget rutrum quam. Pellentesque fr</p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-line-w', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-grid-w-2', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(51, 'tag', '#454545', 'content', 'before', '', 'wordpress', 10, '', '500px', '2012-12-14 20:26:37', NULL, 1, 1, '', '<p>nsectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta vel sagittis ipsum ultrices. Vestibulum blandit odio at risus euismod adipiscing feugiat nunc suscipit. Proin id dui massa, eget rutrum quam. Pellentesque frnsectetur adipisc</p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(52, 'tag', '#454545', 'right', 'before', '', 'cms', 10, '', '500px', '2012-12-14 20:12:34', NULL, 1, 1, '', '<p>nsectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta vel sagittis ipsum ultrices. Vestibulum blandit odio at risus euismod adipiscing feugiat nunc suscipit. Proin id dui massa, eget rutrum quam. Pellentesque fr</p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(53, 'tag', '#454545', 'content', 'before', '', 'cars', 10, '', '500px', '2012-12-14 20:12:48', NULL, 1, 1, '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis nisi tempus purus porta blandit. Maecenas condimentum ante nec mi sodales suscipit. Cras pharetra ullamcorper libero in fringilla. Quisque convallis leo vitae dolor luctus et elementum neque tempor. In quis sollicitudin metus. Vivamus id massa a risus tincidunt congue vitae eu dui. In elementum leo purus, a iaculis libero. Suspendisse pharetra lorem vel lorem adipiscing pellentesque. Duis iaculis porta sem, a tristique erat imperdiet quis. Vivamus risus dui, consectetur quis tincidunt ut, venenatis eget leo. Curabitur at arcu velit, non tempus libero. Aenean sit amet risus at quam varius aliquam vel suscipit tellus. Curabitur lacus velit, blandit quis semper id, aliquet sit amet dolor.</em></p>', '<p><em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum facilisis nisi tempus purus porta blandit. Maecenas condimentum ante nec mi sodales suscipit. Cras pharetra ullamcorper libero in fringilla. Quisque convallis leo vitae dolor luctus et elementum neque tempor. In quis sollicitudin metus. Vivamus id massa a risus tincidunt congue vitae eu dui. In elementum leo purus, a iaculis libero. Suspendisse pharetra lorem vel lorem adipiscing pellentesque. Duis iaculis porta sem, a tristique erat imperdiet quis. Vivamus risus dui, consectetur quis tincidunt ut, venenatis eget leo. Curabitur at arcu velit, non tempus libero. Aenean sit amet risus at quam varius aliquam vel suscipit tellus. Curabitur lacus velit, blandit quis semper id, aliquet sit amet dolor.</em></p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(54, 'tag', '#454545', 'content', 'before', '', 'world', 10, '', '500px', '2012-12-15 22:00:18', NULL, 0, 1, '<p>Item: #54 content top:&nbsp;<span>met, consectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta</span></p>', '<p>Item: #54 content bottom:&nbsp;<span>met, consectetur adipiscing elit. Integer euismod purus quis tellus pulvinar non tempor nisi scelerisque. Nunc vitae ligula ligula. Curabitur tincidunt arcu sed erat porta</span></p>', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 1, '#454545', 1, '#454545', 1, '#454545'),
(55, '', '#454545', 'content', 'after', '', 'money', 10, '', '500px', '2012-12-14 14:56:34', NULL, 1, 1, '', '', 0, 0, 0, 1, '#454545', 1, '#454545', '#f1f1f1', 1, '5px', 'none', '#e1e1e1', '#f1f1f1', 'pinst-bg-noise', 'normal', '4px', 'none', '#ffffff', 'pinst-bg-noise', 1, '#e5e5e5', 0, '#454545', 1, '#454545', 1, '#454545');

-- --------------------------------------------------------

--

CREATE TABLE IF NOT EXISTS `{$this->getTable('magazento_instagram_item_category')}` (
  `item_id` smallint(6) unsigned DEFAULT NULL,
  `category_id` smallint(6) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

INSERT INTO `{$this->getTable('magazento_instagram_item_category')}` (`item_id`, `category_id`) VALUES
(48, 19),
(53, 10),
(53, 13),
(53, 18);

-- --------------------------------------------------------

--

CREATE TABLE IF NOT EXISTS `{$this->getTable('magazento_instagram_item_page')}` (
  `item_id` smallint(6) unsigned DEFAULT NULL,
  `page_id` smallint(6) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

INSERT INTO `{$this->getTable('magazento_instagram_item_page')}` (`item_id`, `page_id`) VALUES
(55, 3),
(48, 2),
(48, 3),
(48, 5),
(52, 3),
(54, 2),
(49, 3),
(50, 3),
(51, 3);

-- --------------------------------------------------------

--

CREATE TABLE IF NOT EXISTS `{$this->getTable('magazento_instagram_item_product')}` (
  `item_id` smallint(6) unsigned DEFAULT NULL,
  `product_id` smallint(6) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

INSERT INTO `{$this->getTable('magazento_instagram_item_product')}` (`item_id`, `product_id`) VALUES
(48, 39);

-- --------------------------------------------------------

--

CREATE TABLE IF NOT EXISTS `{$this->getTable('magazento_instagram_item_store')}` (
  `item_id` smallint(6) unsigned DEFAULT NULL,
  `store_id` smallint(6) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--

INSERT INTO `{$this->getTable('magazento_instagram_item_store')}` (`item_id`, `store_id`) VALUES
(55, 0),
(48, 0),
(52, 0),
(53, 0),
(54, 0),
(49, 0),
(50, 0),
(51, 0);


");

$installer->endSetup();
?>