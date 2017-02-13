<?php

namespace Indigoram89\Status;

class Completed extends Status implements StatusInterface
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
            'en' => 'Completed',
            'ru' => 'Завершено',
        ];
    }
}
