<?php

namespace App\Http\Controllers;

use App\Http\Resources\DocumentResource;
use App\Http\Resources\RentalResource;
use App\Models\Document;
use App\Models\Rental;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(){
        $document=Document::all();

        return $this->successResponse('documents retrieved succesfully',DocumentResource::collection($document));
    }

    public function rentOut(Document $document,Request $request){
        $discount=0;

        if($document->discount == true){
            $discount = 0.2;
        }else{
            $discount=0;
        }

        $rental= Rental::create($request->validated());

        return $this->successResponse('book rented successfully',new RentalResource($rental));
    }
}
