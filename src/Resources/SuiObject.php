<?php

namespace Sui\Resources;

class SuiObject
{
  public ?string $type;
  public string $digest;
  public string $version;
  public string $objectId;
  public ?string $storageRebate;
  public ?SuiObjectOwner $owner;
  public ?SuiObjectContent $content;
  public ?string $previousTransaction;

  public function __construct(array $data)
  {
    $this->type = $data['type'];
    $this->digest = $data['digest'];
    $this->version = $data['version'];
    $this->objectId = $data['objectId'];
    $this->storageRebate = $data['storageRebate'];
    $this->previousTransaction = $data['previousTransaction'];
    $this->owner = $data['owner'] ? new SuiObjectOwner($data['owner']) : null;
    $this->content = $data['content'] ? new SuiObjectContent($data['content']) : null;
  }
}
