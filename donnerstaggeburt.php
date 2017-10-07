<?php

if (date('l') !== 'Thursday') {
	exit;
}

$cfg = require __DIR__ . '/cfg.php';

require __DIR__ . '/vendor/autoload.php';

Codebird\Codebird::setConsumerKey($cfg['consumer_key'], $cfg['consumer_secret']);

$cb = Codebird\Codebird::setInstance();

$cb->setToken($cfg['access_token'], $cfg['access_token_secret']);

$str = date('j. M Y');

$str = str_replace([
	'Jan',
	'Feb',
	'Mar',
	'Apr',
	'May',
	'Jun',
	'Jul',
	'Aug',
	'Sep',
	'Oct',
	'Nov',
	'Dec',
], [
	'Januar',
	'Februar',
	'März',
	'April',
	'Mai',
	'Juni',
	'Juli',
	'August',
	'September',
	'Oktober',
	'November',
	'Dezember',
], $str);

$cb->statuses_update([
	'status' => 'Fröhlichen Donnerstag, den ' . $str . '!',
]);
