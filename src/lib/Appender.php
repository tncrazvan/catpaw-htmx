<?php
namespace CatPaw\Htmx;

use CatPaw\LinkedList;

class Appender {
    public static function create(Builder $builder) {
        return new self($builder);
    }
    
    /** @var LinkedList<string> */
    private LinkedList $list;
    private function __construct(
        private Builder $builder,
    ) {
        $this->list = LinkedList::create();
    }

    public function push(string $content) {
        $this->list->push($content);
    }

    public function getList():LinkedList {
        return $this->list;
    }

    public function getBuilder():Builder {
        return $this->builder;
    }
}