<?php

namespace App\Http\Controllers\Admin;

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

        $data = $request->validated();
        $data['status'] = 'ativo';

        $support->create($data);

        return redirect()->route('supports.index');

    }

    public function show(string $id){

        if(!$support = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));


    }

    public function edit(string $id ){
       // if(!$support = $support->where('id',$id)->first()){
        if(!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request, string|int $id, Support $support){

        if(!$support = $support->where('id',$id)->first()){
            return back();
        }

        # support->subject = $request->subject;
        # $support->body = $request->body;
        # $support->save();

        // $support->update($request->only([
        //    'subject', 'body'
        //]));

        $support->update($request->validated());
        
        return redirect()->route('supports.index');

    }

    public function destroy (string $id){
         $this->service->delete($id);
        
        return redirect()->route('supports.index');
    }
}