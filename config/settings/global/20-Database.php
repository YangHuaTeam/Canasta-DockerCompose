<?php

## 数据库设置 - 保留自定义连接信息
$wgDBtype = "mysql";
$wgDBserver = getenv('MW_DB_SERVER') ?: "localhost";
$wgDBname = "seekstar_mediawiki";
$wgDBuser = "seekstar_mediawiki";

# MySQL 特定设置
$wgDBprefix = "seekstar";

# 共享数据库表
$wgSharedTables[] = "actor";