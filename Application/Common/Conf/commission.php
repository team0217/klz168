<?php 
 return array (
  'COMMISSION_ISOPEN' => '1',
  'COMMISSION_NAME' => '闪电佣金',
  'COMMISSION_TYPE' => 'array (
  \'pc\' => \'1\',
  \'mobile\' => \'2\',
)',
  'SELLER_JOIN_CONDITION' => 'array (
  \'information\' => \'6\',
)',
  'SELLER_CHECK_TIME' => '1',
  'SELLER_PAY_TIME' => '2',
  'CONFIG' => 
  array (
    'commission' => 
    array (
      'commission_price' => 
      array (
        0 => 
        array (
          'min' => '1',
          'max' => '49',
          'commission' => '0.1',
        ),
        1 => 
        array (
          'min' => '50',
          'max' => '99',
          'commission' => '5',
        ),
        2 => 
        array (
          'min' => '100',
          'max' => '500',
          'commission' => '10',
        ),
        3 => 
        array (
          'min' => '500',
          'max' => '1500',
          'commission' => '50',
        ),
        4 => 
        array (
          'min' => '1500',
          'max' => '3000',
          'commission' => '150',
        ),
      ),
    ),
  ),
  'SELLER_DETAIL_DESC' => '<p>佣金规则设置的佣金 用于返还给会员的佣金。</p>',
  'BUYER_JOIN_CONDITION' => 'array (
  \'num_trial\' => \'7\',
  \'num_trial_art\' => \'0\',
)',
  'BUYER_WRITE_ORDER_TIME' => '60',
  'BUYER_CHECK_UPDATE_ORDER_SN' => '48',
  'COMMISSION_PRICE' => 'array (
  \'commission\' => 
  array (
    \'commission_price\' => 
    array (
      0 => 
      array (
        \'min\' => \'1\',
        \'max\' => \'49\',
        \'commission\' => \'0.1\',
      ),
      1 => 
      array (
        \'min\' => \'50\',
        \'max\' => \'99\',
        \'commission\' => \'5\',
      ),
      2 => 
      array (
        \'min\' => \'100\',
        \'max\' => \'500\',
        \'commission\' => \'10\',
      ),
      3 => 
      array (
        \'min\' => \'500\',
        \'max\' => \'1500\',
        \'commission\' => \'50\',
      ),
      4 => 
      array (
        \'min\' => \'1500\',
        \'max\' => \'3000\',
        \'commission\' => \'150\',
      ),
    ),
  ),
)',
);
?>