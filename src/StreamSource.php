<?php

namespace iio\libmergepdf;

use setasign\Fpdi\PdfParser\StreamReader;

class StreamSource implements SourceInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var resource
     */
    private $stream;

    /**
     * @var Pages
     */
    private $pages;

    public function __construct($stream, $name, Pages $pages = null)
    {
        if (!is_resource($stream)) {
            throw new \RuntimeException('First argument must be a stream');
        }
        $this->stream = $stream;
        $this->name = $name;
        $this->pages = $pages ?: new Pages;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStreamReader()
    {
        return new StreamReader($this->stream, true);
    }

    public function getPages()
    {
        return $this->pages;
    }
}
