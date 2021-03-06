<?php

namespace App\Enums;

final class UtilEnum {

    /**
     * The constants used by the class.
     *
     * @var mixed
     */
    public static $ARR_ROLES = [
        '' => 'Seleccione un elemento de la lista',
        1  => 'Administrador',
        2  => 'Socio',
        3  => 'Vendedor'
    ];

    /**
     * The constants used by the class.
     *
     * @var mixed
     */
    public static $ARR_CATEGORIES = [
        '' => 'Seleccione un elemento de la lista',
        1  => 'Economía',
        2  => 'Polítca',
        3  => 'Literatura',
        4  => 'Cocina',
        5  => 'Tecnología',
    ];
}
