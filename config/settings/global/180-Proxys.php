<?php


// 启用 CDN 支持以处理 X-Forwarded-For 头部
$wgUseCdn = true;

# 处理 CloudFlare 和代理 IP
// if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
//     $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
// } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
//     $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_X_FORWARDED_FOR"];
// }

$wgCdnServers = [ gethostbyname( 'varnish' ) ];
