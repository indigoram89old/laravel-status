<?php

namespace Indigoram89\Status;

class Cancelled extends Status implements StatusInterface
{
    /**
     * Get a status names (translated).
     * Example: ['en' => 'Enghlish name', 'ru' => 'Русское название']
     *
     * @return array
     */
    public function getName() : array
    {
        return [
            'en' => 'Cancelled',
            'ru' => 'Отменено',
        ];
    }
}
