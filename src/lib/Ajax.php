<?php
namespace CatPaw\Htmx;

class Ajax implements ContractInterface {
    public static function create(Appender $appender):self {
        return new self($appender);
    }
    private string $method = 'get';
    private string $path   = '?';
    private function __construct(
        private Appender $appender,
    ) {
    }

    /**
     * Specify the path for the http request.\
     * Default path is `?`.
     * @param  string $path
     * @return Ajax
     */
    public function forPath(string $path):self {
        $this->path = addslashes($path);
        return $this;
    }

    /**
     * 
     * @return Ajax
     */
    public function get():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function post():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function update():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function delete():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function put():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function head():self {
        $this->method = 'get';
        return $this;
    }


    /**
     * 
     * @return Ajax
     */
    public function options():self {
        $this->method = 'get';
        return $this;
    }

    /**
     * 
     * @return Builder
     */
    public function next(): Builder {
        $this->appender->push("hx-$this->method=\"$this->path\"");
        return $this->appender->getBuilder();
    }
}