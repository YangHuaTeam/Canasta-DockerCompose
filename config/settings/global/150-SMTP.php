<?php

# SMTP 邮件配置
$wgSMTP = [
    "host" => "ssl://smtpdm.aliyun.com",
    "IDHost" => "noreply.seekstar.org",
    "port" => 465,
    "auth" => true,
    "username" => "mediawiki@noreply.seekstar.org",
    "password" => getenv("SEEKSTAR_SMTP_PWD"),
];