<?php
namespace CatPaw\Htmx;

interface ContractInterface {
    /**
     * Append the modifier to the builder and return it back.
     * @return Builder
     */
    public function next(): Builder;
    /**
     * Create a new modifier.
     * @param  Appender          $appender
     * @return ContractInterface
     */
    public static function create(Appender $appender):self ;
}