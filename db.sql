CREATE TABLE `__prefix__simple_setting` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `is_hidden` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `is_disabled` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
  `is_require` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '是否必填',
  `sort` int unsigned NOT NULL DEFAULT '0' COMMENT '排序：从大到小',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '备注',
  `input_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT '输入控件类型',
  `value_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '值类型',
  `key_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT '键名（全局唯一）',
  `key_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT '键值',
  `default_value` text COMMENT '默认值',
  `options` text COMMENT '可选项',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='简单设置';