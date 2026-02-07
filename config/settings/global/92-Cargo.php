<?php

# https://www.mediawiki.org/wiki/Extension:Cargo/Download_and_installation/zh
$wgCargoDBserver=getenv('MW_CARGO_DB_SERVER');
$wgCargoDBname="mediawiki_cargo";
$wgCargoDBuser="mediawiki_cargo";
$wgCargoDBpassword=getenv('MW_CARGO_DB_PASSWORD') ;