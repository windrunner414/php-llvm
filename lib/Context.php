<?php declare(strict_types=1);

namespace PHPLLVM;

interface Context {

    public function dispose(): void;

    public function moduleCreateWithName(string $name): Module;

    public function builderCreate(): Builder;

    public function int1Type(): Type;

    public function int8Type(): Type;

    public function int16Type(): Type;

    public function int32Type(): Type;

    public function int64Type(): Type;

    public function int128Type(): Type;

    public function intType(int $numBits): Type;

    public function halfType(): Type;

    public function floatType(): Type;

    public function doubleType(): Type;

    public function fp80Type(): Type;

    public function fp128Type(): Type;

    public function ppcfp128Type(): Type;

    public function functionType(Type $returnType, bool $isVarArgs, Type ... $parameters): Type\Function_;

    public function structType(bool $packed, Type ... $elements): Type;

    public function namedStructType(string $name): Type;

    public function voidType(): Type;

    public function labelType(): Type;

    public function mmxType(): Type;

    public function constString(string $string, bool $dontNullTerminate): Value;

    public function createEnumAttribute(int $kind, int $value): Attribute;

    public function createStringAttribute(string $kind, string $value): Attribute;

    public function parseIR(MemoryBuffer $buffer, string &$message): Module;

    public function getEnumAttributeKindForName(string $kind): int;

}