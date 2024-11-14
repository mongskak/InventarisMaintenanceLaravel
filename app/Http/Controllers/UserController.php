<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getInitials($name)
    {
        // Memecah nama berdasarkan spasi dan mengambil dua huruf pertama dari setiap kata
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            // Ambil huruf pertama dari setiap kata dan konversi ke huruf kapital
            $initials .= strtoupper(substr($word, 0, 1));
        }

        return $initials;
    }
}
