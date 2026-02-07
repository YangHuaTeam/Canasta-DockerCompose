<?php

if (!defined("MEDIAWIKI")) {
    exit();
}

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

## 邮件设置 - 保留自定义值
$wgEnableEmail = true;
$wgEnableUserEmail = false;
$wgEmergencyContact = "mediawiki@noreply.seekstar.org";
$wgPasswordSender = "mediawiki@noreply.seekstar.org";

$wgEmailAuthentication = true;
$wgUseEnotif = true;
$wgEnotifWatchlist = true;
$wgEnotifUserTalk = true;
$wgEnotifFromEditor = true;

## 数据库设置 - 保留自定义连接信息
$wgDBtype = "mysql";
$wgDBserver = getenv('MW_DB_SERVER') ?: "localhost";
$wgDBname = "seekstar_mediawiki";
$wgDBuser = "seekstar_mediawiki";

# MySQL 特定设置
$wgDBprefix = "seekstar";

# 共享数据库表
$wgSharedTables[] = "actor";

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

# Pingback - Canasta 已设置为 false，保持一致

# 语言和时区 - 保留自定义值
$wgLanguageCode = "zh-cn";
$wgLocaltimezone = "Asia/Shanghai";

## 缓存设置 - Canasta 已配置 $wgMainCacheType = CACHE_ACCEL 和 $wgMemCachedServers = []
// $wgUseGzip = true;
$wgCacheEpoch = 20260207090535;

## 安全密钥
$wgSecretKey = getenv('MW_SECRET_KEY');


## 版权信息 - 保留自定义值
$wgRightsPage = "寻星:版权";
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/3.0/cn/legalcode";
$wgRightsText = "知识共享署名-相同方式共享 3.0 中国大陆(CC BY-SA 3.0 CN)许可协议";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-sa.png";

# 扩展加载 - 根据 contents.yaml 清单配置
wfLoadExtension("AdminLinks");
wfLoadExtension("AJAXPoll");
wfLoadExtension("Cargo");
wfLoadExtension("CategoryTree");
wfLoadExtension("CharInsert");
wfLoadExtension("Cite");
wfLoadExtension("CiteThisPage");
wfLoadExtension("CodeEditor");
wfLoadExtension("CodeMirror");
wfLoadExtension("Collection");
wfLoadExtension("CommentStreams");
wfLoadExtension("ConfirmEdit");
wfLoadExtension("Disambiguator");
wfLoadExtension("DisplayTitle");
wfLoadExtension("Echo");
wfLoadExtension("EmbedVideo");
wfLoadExtension("ExternalData");
wfLoadExtension("FlexDiagrams");
wfLoadExtension("Gadgets");
wfLoadExtension("ImageMap");
wfLoadExtension("GlobalNotice");
wfLoadExtension("HeaderTabs");
wfLoadExtension("InlineComments");
wfLoadExtension("InputBox");
wfLoadExtension("Interwiki");
wfLoadExtension("Linter");
wfLoadExtension("LoginNotify");
wfLoadExtension("Maps");
wfLoadExtension("Math");
wfLoadExtension("MediaUploader");
wfLoadExtension("MintyDocs");
wfLoadExtension("MsUpload");
wfLoadExtension("MultimediaViewer");
wfLoadExtension("Nuke");
wfLoadExtension("PageForms");
wfLoadExtension("PageImages");
wfLoadExtension("PageSchemas");
wfLoadExtension("ParserFunctions");
wfLoadExtension("PdfHandler");
wfLoadExtension("Poem");
wfLoadExtension("Popups");
wfLoadExtension("RelatedArticles");
wfLoadExtension("ReplaceText");
wfLoadExtension("RevisionSlider");
wfLoadExtension("RottenLinks");
wfLoadExtension("RSS");
wfLoadExtension("Scribunto");
wfLoadExtension("SimpleChanges");
wfLoadExtension("TemplateData");
wfLoadExtension("TemplateSandbox");
wfLoadExtension("TemplateStyles");
wfLoadExtension("TemplateStylesExtender");
wfLoadExtension("TemplateWizard");
wfLoadExtension("TextExtracts");
wfLoadExtension("Thanks");
wfLoadExtension("TimedMediaHandler");
wfLoadExtension("TitleIcon");
wfLoadExtension("TwoColConflict");
wfLoadExtension("Variables");
wfLoadExtension("VisualEditor");
wfLoadExtension("VEForAll");
wfLoadExtension("WikiEditor");
wfLoadExtension("DiscussionTools");
wfLoadExtension("SimpleBatchUpload");
wfLoadExtension("UserPageEditProtection");
wfLoadExtension("ShortDescription");
wfLoadExtension("SecureLinkFixer");
wfLoadExtension("WikiSEO");
wfLoadExtension("SyntaxHighlight");

# https://www.mediawiki.org/wiki/Extension:Cargo/Download_and_installation/zh
$wgCargoDBserver=getenv('MW_CARGO_DB_SERVER');
$wgCargoDBname="mediawiki_cargo";
$wgCargoDBuser="mediawiki_cargo";
$wgCargoDBpassword=getenv('MW_CARGO_DB_PASSWORD') ;

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

# Job 设置 - 保留自定义值
$wgJobRunRate = 0;

# 其他设置
$wgMaxCredits = 20;
$wgPopupsReferencePreviewsBetaFeature = false;
$wgWikiSeoDefaultImage = "https://www.seekstar.org/w/resources/assets/seekstar-128.png";
$wgWikiSeoEnableAutoDescription = true;
$wgWikiSeoEnableSocialImages = true;

# CookieWarning 现在没必要
// $wgCookieWarningEnabled = true;

# 页脚链接钩子 - 保留自定义功能
$wgHooks["SkinAddFooterLinks"][] = function (
    Skin $skin,
    string $key,
    array &$footerlinks,
) {
    if ($key === "places") {
        $footerlinks["copyright"] = Html::rawElement(
            "a",
            [
                "href" => Title::newFromText(
                    $skin
                        ->msg("footer-copyright-url")
                        ->inContentLanguage()
                        ->text(),
                ),
            ],
            $skin->msg("footer-copyright"),
        );
    }
};

$wgHooks["SkinAddFooterLinks"][] = function (
    Skin $skin,
    string $key,
    array &$footerlinks,
) {
    if ($key === "places") {
        $footerlinks["contact"] = Html::rawElement(
            "a",
            [
                "href" => Title::newFromText(
                    $skin
                        ->msg("footer-contact-url")
                        ->inContentLanguage()
                        ->text(),
                ),
            ],
            $skin->msg("footer-contact"),
        );
    }
};

$wgHooks["SkinAddFooterLinks"][] = function (
    Skin $skin,
    string $key,
    array &$footerlinks,
) {
    if ($key === "places") {
        $footerlinks["statistics"] = Html::rawElement(
            "a",
            [
                "href" => Title::newFromText(
                    $skin
                        ->msg("footer-statistics-url")
                        ->inContentLanguage()
                        ->text(),
                ),
            ],
            $skin->msg("footer-statistics"),
        );
    }
};

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

# Math 设置
$wgMathValidModes = ["native", "mathjax", "latexml", "source"];
$wgDefaultUserOptions["math"] = "native";
$wgSmjExtraInlineMath = [["$$", "$$"], ["\\((", "\\))"]];

# 权限设置
// $wgGroupPermissions["user"]["move"] = false;
$wgGroupPermissions["suppress"]["patrol"] = true;
$wgOnlyUserEditUserPage = true;

# SMTP 邮件配置
$wgSMTP = [
    "host" => "ssl://smtpdm.aliyun.com",
    "IDHost" => "noreply.seekstar.org",
    "port" => 465,
    "auth" => true,
    "username" => "mediawiki@noreply.seekstar.org",
    "password" => getenv("SEEKSTAR_SMTP_PWD"),
];

# 自动确认设置
$wgAutopromote = [
    "autoconfirmed" => [
        "&",
        [APCOND_EDITCOUNT, 10],
        [APCOND_AGE, 259200],
        APCOND_EMAILCONFIRMED,
    ],
];

$wgEchoUseJobQueue = true;

# 处理 CloudFlare 和代理 IP
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_CF_CONNECTING_IP"];
} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $_SERVER["REMOTE_ADDR"] = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
