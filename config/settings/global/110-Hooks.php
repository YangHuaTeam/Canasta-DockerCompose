<?php

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
