<?php

if (!function_exists('successMessage')) {

    function successMessage($item, $action = 'created')
    {
        $messages = [

            'created' => "{$item} added successfully.",

            'updated' => "{$item} updated successfully.",

            'deleted' => "{$item} deleted successfully.",

        ];

        return $messages[$action] ?? "{$item} action completed successfully.";
    }
}