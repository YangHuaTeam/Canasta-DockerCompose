<?php

# 自定义命名空间 疑似与MintyDocs 冲突的选项先注释掉
// define("NS_DRAFT", 3000);
// define("NS_DRAFT_TALK", 3001);

// $wgExtraNamespaces[NS_DRAFT] = "草稿";
// $wgExtraNamespaces[NS_DRAFT_TALK] = "草稿讨论";
// $wgNamespaceAliases["Draft"] = NS_DRAFT;
// $wgNamespaceAliases["Draft Talk"] = NS_DRAFT_TALK;

$wgVisualEditorAvailableNamespaces = [
    "MediaWiki" => true,
    "File" => false,
    "Draft" => true,
    "Template" => true,
    "Help" => true,
    "Project" => true,
];

$wgContentNamespaces = [NS_MAIN, NS_PROJECT, NS_USER, NS_HELP];
$wgNamespacesWithSubpages[NS_MAIN] = true;
$wgNamespacesWithSubpages[NS_TEMPLATE] = true;
$wgNamespacesWithSubpages[NS_DRAFT] = true;
$wgNamespacesWithSubpages[NS_HELP] = true;
$wgAdvancedSearchHighlighting = true;