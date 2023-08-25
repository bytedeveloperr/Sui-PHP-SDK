<?php

namespace Sui\Resources;

class SuiObjectOwner
{
  protected string $type;
  protected string | int $value;

  public function __construct(mixed $data)
  {
    if ($data == 'Immutable') {
      $this->type = $data;
    } else {
      $ownerType = array_key_first($data);
      $this->type = $ownerType;

      if ($ownerType == 'AddressOwner' || $ownerType == 'ObjectOwner') {
        $this->value = $data[$ownerType];
      } else {
        $this->value = (int) $data[$ownerType]['initial_shared_version'];
      }
    }
  }

  public function toArray(): string | array
  {
    if ($this->type == 'Immutable') {
      return $this->type;
    }

    if ($this->type == 'AddressOwner' || $this->type == 'ObjectOwner') {
      return [$this->type => $this->value];
    }

    return [$this->type => ['initial_shared_version' => $this->value]];
  }
}
