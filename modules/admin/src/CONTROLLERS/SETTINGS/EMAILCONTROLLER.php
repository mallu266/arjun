<?php

namespace ARJUN\ADMIN\CONTROLLERS\SETTINGS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Auth;

class EMAILCONTROLLER extends Controller {

    protected $package;

    public function __construct() {
        $this->package = 'admin';
        // $this->ftpbase = Storage::disk('ftp');
    }

    public function index() {
        return view($this->package . '::email/index');
    }

}
