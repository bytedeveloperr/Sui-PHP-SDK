<?php

namespace Sui\Providers;

use Sui\Resources\SuiObject;
use Sui\Rpc\Client;
use Sui\Rpc\Connection;

class JsonRpcProvider
{
  protected Client $rpcClient;

  protected Connection $connection;

  public function __construct(Connection $connection, array $options = [])
  {
    $this->connection = $connection;
    $this->rpcClient = $options['rpcClient'] ?: new Client($connection->getFullnode());
  }

  public function getRpcApiVersion()
  {
    $response = $this->rpcClient->request('rpc.discover');
    return $response['info']['version'];
  }

  public function getObject(string $id, array $options = [])
  {
    if (empty($options)) {
      $options['showType'] = true;
    }

    $response = $this->rpcClient->request('sui_getObject', null, [$id, $options]);
    var_dump($response['data']);
    return new SuiObject($response['data']);
  }
}
