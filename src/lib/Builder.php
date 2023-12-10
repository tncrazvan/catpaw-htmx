<?php
namespace CatPaw\Htmx;

class Builder {
    /**
     * Create a new builder.
     * @return Builder
     */
    public static function create():self {
        return new self();
    }

    private Appender $appender;
    private function __construct() {
        $this->appender = Appender::create($this);
    }

    public function ajax() {
        return new Ajax($this->appender);
    }

    public function trigger() {
        return new Trigger($this->appender);
    }

    public function build(): string {
        $list   = $this->appender->getList();
        $result = '';
        $i      = 0;
        for ($list->rewind(); $list->valid(); $list->next()) {
            $item = $list->current();
            $result .= ' '.$item;
            $i++;
        }

        return substr($result, 1);
    }
}