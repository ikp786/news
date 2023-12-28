<?php
$env = env('APP_ENV');

$roles = [
    1 => "SUPER_ADMIN",
    2 => "SUB_ADMIN"
];

$layouts = [
    1 => 'layout 1',
    2 => 'layout 2',
    3 => 'layout 3',
    4 => 'layout 4',
];
return [
    'ROLE' => $roles,
    'LAYOUT' => 'layout',
    'LAYOUTS' => $layouts,
];
