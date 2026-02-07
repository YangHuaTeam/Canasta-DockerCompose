<?php

## 站点基本设置 - 保留自定义值
$wgSitename = "寻星";
$wgMetaNamespace = "寻星";

## URL 设置 
$wgUsePathInfo = true;
$wgExtensionAssetsPath = "$wgScriptPath/extensions";

## 服务器和资源路径 - 保留自定义值
$wgServer = "https://www.seekstar.org";
$wgResourceBasePath = $wgScriptPath;

$seekstar128logo = "$wgResourceBasePath/resources/assets/seekstar-128.png";

## Logo 设置 - 保留自定义值
$wgLogos = [
    "1x" => $seekstar128logo,
    "icon" => $seekstar128logo,
];