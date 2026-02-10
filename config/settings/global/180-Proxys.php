<?php


// 启用 CDN 支持以处理 X-Forwarded-For 头部
$wgUseCdn = true;

# 处理 CloudFlare 和代理 IP
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
// 信任 Docker 内部常用网段以及 localhost
// 这样 MediaWiki 就会剥离代理 IP，获取真实的客户端 IP
$wgCdnServersNoPurge = [
    '127.0.0.1',
    '10.0.0.0/8',
    '172.16.0.0/12',
    '192.168.0.0/16',
];
