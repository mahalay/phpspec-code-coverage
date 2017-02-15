<?php

assert_options(
    ASSERT_CALLBACK,
    function ($file, $line, $code, $desc = null) {
        echo "Assertion failed at {$file}:{$line}: {$code}";
        if ($desc) {
            echo ": {$desc}";
        }
        echo "\n";
    }
);
