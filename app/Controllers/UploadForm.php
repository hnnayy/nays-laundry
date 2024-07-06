<?php

namespace App\Controllers;

class UploadForm extends BaseController
{
    public function index(): string
    {
        return view('form_upload.html');
    
    }
}
