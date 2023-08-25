<?php

namespace Sui\Resources;

class SuiObjectContent
{
  public ?string $type;
  public ?array $fields;
  public string $dataType;
  public ?array $disassembled;
  public ?bool $hasPublicTransfer;

  public function __construct(array $data)
  {
    $this->type = $data['type'];
    $this->fields = $data['fields'];
    $this->dataType = $data['dataType'];
    $this->disassembled = $data['disassembled'];
    $this->hasPublicTransfer = $data['hasPublicTransfer'];
  }
}
