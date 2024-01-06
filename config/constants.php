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

$newsType = [
    1 => 'Latest News',
    2 => 'Category News',
    3 => 'Recent News'    
];

$viewType = [
    1 => 'Scroll View',
    2 => 'Card View',
    3 => 'List View'    
];

return [
    'ROLE' => $roles,
    'LAYOUT' => 'layout',
    'LAYOUTS' => $layouts,
    'NEWS_TYPE' => $newsType,
    'VIEW_TYPE' => $viewType
];
