<?php

interface IReadable {
    public function read();
}


class Book implements IReadable {
    public function read() {
        return 'Hello World!';
    }
}

function read(IReadable $r) {
    echo 'The Readable says ' . $r->read();
}

read(new Book());


