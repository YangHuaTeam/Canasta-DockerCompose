<?php

# AWS S3 配置 - 全部保留（自定义存储后端）
wfLoadExtension("AWS");
$wgAWSLocalCacheDirectory = false;
$wgAWSBucketName = "seekstar";
$wgAWSRegion = "cn-hongkong";
$wgFileBackends["s3"]["endpoint"] = "https://oss-cn-hongkong-internal.aliyuncs.com";
$wgAWSBucketDomain = "s3.seekstar.org";
$wgAWSRepoHashLevels = "2";
$wgAWSRepoDeletedHashLevels = "3";
$wgAWSCredentials = [
    "key" => getenv("SEEKSTAR_ALIYUN_KEY"),
    "secret" => getenv("SEEKSTAR_ALIYUN_SECRET"),
    "token" => false,
];