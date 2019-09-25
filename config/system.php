<?php

return [
  'roles_structure' => [
    'superadministrator' => [
      'users' => 'c,r,u,d',
      'dashboard' => 'r',
      'workers' => 'c,r,u,d',
      'contracts' => 'c,r,u,d',
      'decisions' => 'c,r,u,d',
      'departments' => 'c,r,u,d',
      'roles' => 'c,r,u,d',
      'profile' => 'r,u'
    ],
    'administrator' => [
      'dashboard' => 'r',
      'workers' => 'c,r,u',
      'contracts' => 'c,r,u,d',
      'decisions' => 'c,r,u,d',
      'departments' => 'c,r,u,d',
      'profile' => 'r,u'
    ],
    'user' => [
      'dashboard' => 'r',
      'workers' => 'r',
      'contracts' => 'r',
      'decisions' => 'r',
      'departments' => 'r',
      'profile' => 'r,u'
    ]
  ],
  
  'permission_map' => [
    'c' => 'create',
    'r' => 'read',
    'u' => 'update',
    'd' => 'delete'
  ]
];
