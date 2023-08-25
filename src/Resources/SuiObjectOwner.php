<?php

namespace Sui\Resources;

class SuiObjectOwner
{
  public string $type;
  public string | int $value;

  public function __construct(mixed $data)
  {
    if ($data == 'Immutable') {
      $this->type = $data;
    } else if (array_key_exists('AddressOwner', $data)) {
      $this->type = 'AddressOwner';
      $this->value = $data['AddressOwner'];
    } else if (array_key_exists('ObjectOwner', $data)) {
      $this->type = 'ObjectOwner';
      $this->value = $data['ObjectOwner'];
    } else {
      $this->type = 'Shared';
      $this->value = $data['Shared']['initial_shared_version'];
    }
  }
}
