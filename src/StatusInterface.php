<?php

namespace Indigoram89\Status;

interface StatusInterface
{
    /**
     * Get a status names (translated).
     * Example: ['en' => 'Enghlish name', 'ru' => 'Русское название']
     *
     * @return array
     */
    public function getName() : array;
}
