<?php

# 自动确认设置
$wgAutopromote = [
    "autoconfirmed" => [
        "&",
        [APCOND_EDITCOUNT, 10],
        [APCOND_AGE, 259200],
        APCOND_EMAILCONFIRMED,
    ],
];