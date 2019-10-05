<?php

return [
  'roles_structure' => [
    'superadministrator' => [
      'user' => 'c,r,u,d',
      'dashboard' => 'r',
      'worker' => 'c,r,u,d',
      'contract' => 'c,r,u,d',
      'decision' => 'c,r,u,d',
      'department' => 'c,r,u,d',
      'role' => 'c,r,u,d',
      'permission' => 'r,u'
    ],
    'administrator' => [
      'dashboard' => 'r',
      'worker' => 'c,r,u,d',
      'contract' => 'c,r,u,d',
      'decision' => 'c,r,u,d',
      'department' => 'c,r,u,d',
    ],
    'user' => [
      'dashboard' => 'r',
      'worker' => 'r',
      'contract' => 'r',
      'decision' => 'r',
      'department' => 'r',
    ]
  ],

  'permission_map' => [
    'c' => 'create',
    'r' => 'read',
    'u' => 'update',
    'd' => 'delete'
  ]
];
