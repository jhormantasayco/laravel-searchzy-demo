<?php

if (! function_exists('class_active')) {

    /**
     * Verifica sí la variable es nullable, retorna un string de clase.
     *
     * @param  mixed $value
     * @param  mixed $default
     * @return mixed
     */
    function class_active($value, $class = 'control-active', $default = '') {

        return $value ? $class : $default;
    }
}
