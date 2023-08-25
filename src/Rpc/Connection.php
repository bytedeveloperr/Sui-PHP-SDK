<?php

namespace Sui\Rpc;

use Exception;

class Connection
{
  protected string $fullnode;

  protected ?string $websocket;

  public function __construct(array $options)
  {
    if (!$options['fullnode']) {
      throw new Exception('Fullnode URL must be provided');
    }

    $this->fullnode = $options['fullnode'];
    $this->websocket = $options['websocket'];
  }

  public function getFullnode()
  {
    return $this->fullnode;
  }

  public static function local()
  {
    return new Connection(['fullnode' => 'http://127.0.0.1:9000']);
  }

  public static function devnet()
  {
    return new Connection(['fullnode' => 'https://fullnode.devnet.sui.io:443']);
  }

  public static function testnet()
  {
    return new Connection(['fullnode' => 'https://fullnode.testnet.sui.io:443']);
  }

  public static function mainnet()
  {
    return new Connection(['fullnode' => 'https://fullnode.mainnet.sui.io:443']);
  }
}
