<?php
return [
        'success' => [
            'create' => 'New :object has been created.',
            'update' => ':object has been updated',
            'delete' => [
                'basic' => ':object has been deleted',
                'selected' => 'Selected :object has been deleted',
                'temporary' => ':object has been deleted temporary',
                'permanent' => ':object has been deleted permanently',
            ],
        ],
        'failed' => [
            'create' => 'Failed to create new :object',
            'update' => 'Failed to update :object',
            'delete' => 'Failed to delete :object',
            'upload' => 'Failed to upload :object.',
            'import'=> 'Failed to import :object',
        ],
        'notfound' => [
            'url' => 'We could not find the url that you looking for',
            'page' => 'We coult not find page that you looking for',
            'db' => 'We could not find data or record that you looking for :object',
            'file' => 'We could not find file that you looking for',
            'admin-client' => 'This Client does not have any ADMIN'
        ],
    ];
