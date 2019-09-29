<?php

use Carbon\Carbon;

function formatDateToYmd($dateValue)
{
  return ($dateValue !== null) ? Carbon::createFromFormat('d/m/Y', $dateValue)->format('Y-m-d') : null;
}
