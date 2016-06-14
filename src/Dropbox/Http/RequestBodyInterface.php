<?php
namespace Kunnu\Dropbox\Http;

interface RequestBodyInterface
{
    /**
     * Get the Body of the Request
     *
     * @return string
     */
    public function getBody();
}