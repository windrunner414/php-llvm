<?php declare(strict_types=1);
namespace PHPLLVM\LLVM4\Attribute;

use PHPLLVM\Attribute as CoreAttribute;
use PHPLLVM\LLVM4\Attribute;

class Enum extends Attribute implements CoreAttribute\Enum {

    public function getKind(): int {
        return $this->llvm->lib->LLVMGetEnumAttributeKind($this->attribute);
    }

    public function getValue(): int {
        return $this->llvm->lib->LLVMGetEnumAttributeValue($this->attribute);
    }

    public function isEnumAttribute(): bool {
        return true;
    }

    public function isStringAttribute(): bool {
        return false;
    }
    
}
