<?php
namespace CatPaw\Htmx;

use CatPaw\LinkedList;

class Trigger implements ContractInterface {
    public static function create(Appender $appender):self {
        return new self($appender);
    }
    
    private string $event = 'click';
    private float $delay  = 0;
    private bool $once    = false;
    private bool $changed = false;
    /** @var LinkedList<string> */
    private LinkedList $modifiers;
    private function __construct(
        private Appender $appender,
    ) {
        $this->modifiers = LinkedList::create();
    }

    /**
     * Trigger only when the `ctrl` key is also pressed.
     * @return Trigger
     */
    public function withCtrlKey():self {
        $this->modifiers->push("ctrlKey");
        return $this;
    }

    /**
     * Trigger only when the `shift` key is also pressed.
     * @return Trigger
     */
    public function withShiftKey():self {
        $this->modifiers->push("shiftKey");
        return $this;
    }
        
    /**
     * Trigger only when the `alt` key is also pressed.
     * @return Trigger
     */
    public function withAltKey():self {
        $this->modifiers->push("altKey");
        return $this;
    }

    /**
     * Fires once when the element is first loaded.
     * @return Trigger
     */
    public function load():self {
        $this->event = 'load';
        return $this;
    }

    /**
     * Fires once when an element first scrolls into the viewport.
     * @return Trigger
     */
    public function revealed():self {
        $this->event = 'revealed';
        return $this;
    }

    /**
     * Fires once when an element first intersects the viewport.
     * @return Trigger
     */
    public function intersects():self {
        $this->event = 'intersects';
        return $this;
    }

    public function click():self {
        $this->event = 'click';
        return $this;
    }

    public function mouseenter():self {
        $this->event = 'mouseenter';
        return $this;
    }

    public function mouseleave():self {
        $this->event = 'mouseleave';
        return $this;
    }

    public function mousedown():self {
        $this->event = 'mousedown';
        return $this;
    }

    public function mouseup():self {
        $this->event = 'mouseup';
        return $this;
    }

    public function mouseover():self {
        $this->event = 'mouseover';
        return $this;
    }

    public function mouseout():self {
        $this->event = 'mouseout';
        return $this;
    }

    public function focus():self {
        $this->event = 'focus';
        return $this;
    }

    public function blur():self {
        $this->event = 'blur';
        return $this;
    }

    public function keyup():self {
        $this->event = 'keyup';
        return $this;
    }

    public function keydown():self {
        $this->event = 'keydown';
        return $this;
    }

    public function change():self {
        $this->event = 'change';
        return $this;
    }

    /**
     * Delay the event by `$seconds` seconds.
     * @param  float   $seconds
     * @return Trigger
     */
    public function delay(float $seconds):self {
        $this->delay = $seconds;
        return $this;
    }

    /**
     * Delay the event by `$seconds` seconds.\
     * If the event is issued again before expiration, reset and wait again.
     * @param  float   $seconds
     * @return Trigger
     */
    public function throttle(float $seconds):self {
        $this->delay = $seconds;
        return $this;
    }

    /**
     * Trigger only when the value has changed.
     * @return Trigger
     */
    public function onlyWhenChanged():self {
        $this->changed = true;
        return $this;
    }

    /**
     * Trigger only one time.
     * @return Trigger
     */
    public function onlyOnce():self {
        $this->once = true;
        return $this;
    }

    /**
     * 
     * @return Builder
     */
    public function next(): Builder {
        $this->appender->push("");
        return $this->appender->getBuilder();
    }
}