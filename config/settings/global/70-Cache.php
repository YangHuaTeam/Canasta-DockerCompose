<?php

## 缓存设置 - Canasta 已配置 $wgMainCacheType = CACHE_ACCEL 和 $wgMemCachedServers = []
// $wgUseGzip = true;
$wgCacheEpoch = 20260207090535;

## 安全密钥
$wgSecretKey = getenv('MW_SECRET_KEY');