<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\merchant;
use App\Models\notify;
use App\Models\userDetalis;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
class ProductHomeController extends Controller
{
    public function index(Request $request){


        // get notifactions


        return view('store.index');
    }
}
