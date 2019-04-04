<?php declare(strict_types=1);

namespace PHPLLVM\LLVM4\Value;

use PHPLLVM\BasicBlock as CoreBasicBlock;
use PHPLLVM\Value as CoreValue;

use PHPLLVM\LLVM4\BasicBlock;
use PHPLLVM\LLVM4\Value;


class Global_ extends Value implements CoreValue\Global_ {

    public function getNext(): ?Value {
        $value = $this->llvm->lib->LLVMGetNextGlobal($this->value);
        if ($value === null) {
            return null;
        }
        return Value::value($this->llvm, $this->context, $value);
    }

    public function getPrevious(): ?Value {
        $value = $this->llvm->lib->LLVMGetPreviousGlobal($this->value);
        if ($value === null) {
            return null;
        }
        return Value::value($this->llvm, $this->context, $value);
    }

    public function delete(): void {
        $this->llvm->lib->LLVMDeleteGlobal($this->value);
    }

    public function getInitializer(): Value {
        return Value::value($this->llvm, $this->context, $this->llvm->lib->LLVMGetInitializer($this->value));
    }

    public function setInitializer(Value $value): void {
        $this->llvm->lib->LLVMSetInitializer($this->value, $value->value);
    }

    public function isThreadLocal(): bool {
        return $this->llvm->fromBool($this->llvm->lib->LLVMIsThreadLocal($this->value));
    }

    public function setThreadLocal(bool $value): void {
        $this->llvm->lib->LLVMSetThreadLocal($this->value, $this->toBool($value));
    }

    public function isGlobalConstant(): bool {
        return $this->llvm->fromBool($this->llvm->lib->LLVMIsGlobalConstant($this->value));
    }

    public function setGlobalConstant(bool $value): void {
        $this->llvm->lib->LLVMSetGlobalConstant($this->value, $this->toBool($value));
    }

    public function getThreadLocalMode(): int {
        return $this->llvm->lib->LLVMGetThreadLocalMode($this->value);
    }

    public function setThreadLocalMode(int $mode): void {
        $this->llvm->lib->LLVMSetThreadLocalMode($this->value, $mode);
    }
}