<?php

namespace Kunnu\Dropbox\Tests\Util;

/**
 * Utility class containing data provider methods.
 *
 * @author Cristiano Cinotti <cristianocinotti@gmail.com>
 */
trait DataProviderTrait
{
    public function providerRoots()
    {
        return [['/'], ['']];
    }

    public function providerWrongResponse()
    {
        $response[] = [new Response200("{\".tag\": \"folder\", \"name\": \"fake_dir\", }")];
        $response[] = [new Response200("{\"metadata\": \"foo_bar\"}")];

        return $response;
    }
}
