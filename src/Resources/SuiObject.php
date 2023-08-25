<?php

namespace Sui\Resources;

class SuiObject
{
  protected ?string $type;
  protected string $digest;
  protected string $version;
  protected string $objectId;
  protected ?string $storageRebate;
  protected ?SuiObjectOwner $owner;
  protected ?SuiObjectContent $content;
  protected ?string $previousTransaction;

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

  public function toArray()
  {
    $props = get_object_vars($this);

    if ($props['owner'] || !empty($props['owner'])) {
      $props['owner'] = $this->owner->toArray();
    }

    return array_filter($props, function ($value) {
      return $value != null;
    });
  }
}
