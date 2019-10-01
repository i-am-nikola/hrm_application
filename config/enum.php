<?php

return [

  'status' => [
    t('status.inactive'),
    t('status.active')
  ],

  'boolean' => [
    t('boolean.false'),
    t('boolean.true')
  ],

  'worker_status' => [
    -1 => t('worker.off'),
    0 => t('worker.probationary'),
    1 => t('worker.official')
  ],

  'gender' => [
    t('gender.female'),
    t('gender.male')
  ],

  'contract_status' => [
    t('contract.not_signed'),
    t('contract.signed')
  ]

];
