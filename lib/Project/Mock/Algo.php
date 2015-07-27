<?php
namespace Project\Mock;


class Algo
{
    public function process($capital, $interet, $mensualite)
    {
        return array(
            array(
                'mois' => 1,
                'restant' => $capital,
                'interet' => $interet,
                'rembourse' => $mensualite,
            ),
            array(
                'mois' => 1,
                'restant' => $capital,
                'interet' => $interet,
                'rembourse' => $mensualite,
            ),
        );
    }
}