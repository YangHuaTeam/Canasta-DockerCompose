<?php

## 上传设置 - Canasta 已有 $wgEnableUploads = true 和 ImageMagick 配置
## 但 $wgFileExtensions 是自定义的，需要保留
$wgFileExtensions = array_merge($wgFileExtensions, [
    "doc",
    "docx",
    "xls",
    "mpp",
    "pdf",
    "ppt",
    "xlsx",
    "jpg",
    "tif",
    "odt",
    "odg",
    "ods",
    "odp",
    "mp3",
    "wav",
    "svg",
]);

# SVG 渲染设置
$wgSVGNativeRendering = true;

# InstantCommons 覆盖 Canasta 默认的 false
$wgUseInstantCommons = true;