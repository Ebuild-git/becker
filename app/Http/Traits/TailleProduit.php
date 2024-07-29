<?php

namespace App\Http\Traits;

trait TailleProduit
{

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function getListTailleProduit()
    {
        // Les couleurs et leurs codes correspondants
        $tailles = [
           'XXL',
           'XXM',
           'XL',
           'L',
           'M',
           'S',
           'XS',
        ];

        return collect($tailles);
    }
}