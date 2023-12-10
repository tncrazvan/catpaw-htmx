<?php

use function CatPaw\HTMX\builder;

function main():void {
    builder()
        // ajax
        ->ajax()
        ->forPath("/")
        ->next()
        //triggers
        ->trigger()
        ->click()
        ->next()
        //build
        ->build();
}