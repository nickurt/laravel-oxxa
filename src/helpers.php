<?php

use nickurt\Oxxa\Oxxa;

if (! function_exists('oxxa')) {
    function oxxa()
    {
        return app(Oxxa::class);
    }
}
