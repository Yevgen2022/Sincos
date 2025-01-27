<?php

namespace App\Http\Controllers\CardDetail;

use Illuminate\Http\Request;

class CardDetailIndexController
{
    public function __invoke(Request $request, $id)
    {


        return view('CardDetail.index', compact('id'));
    }


}