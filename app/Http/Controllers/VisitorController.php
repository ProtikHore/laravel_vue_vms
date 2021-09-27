<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function getVisitor() {
        return response()->json(Visitor::get());
    }
}
