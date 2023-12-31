<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class BookRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'title' => 'required',
        ];
    }

    public function storeRules(): array
    {
        return [
            'description' => 'required|in:draft,review',
            'category_id' => 'required|numeric'
        ];
    }
}
