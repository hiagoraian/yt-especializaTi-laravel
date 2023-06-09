<?php

namespace App\Http\Controllers\Admin;

use App\DTO\createSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller{

    public function __construct(
        protected SupportService $service
    ) {}


    public function index(Request $request){

        $supports = $this->service->getAll($request->filter);
       
        return view('admin.supports.index', compact('supports'));
    }

    public function create(){

        return view('admin.supports.create');
    }

    public function store(StoreUpdateSupportRequest $request, Support $support){

        $this->service->new(
            createSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');

    }

    public function update(StoreUpdateSupportRequest $request, Support $support){

       $support =  $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );
        
        if(!$support){
            return back();
        }
        
        return redirect()->route('supports.index');

    }

    public function show(string $id){

        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));


    }

    public function edit(string $id ){
   
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function destroy (string $id){
         $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
}