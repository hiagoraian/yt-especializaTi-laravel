<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller{
    public function index(Support $support){

        $supports = $support->all();
        # dd($supports); Var_dump

        return view('admin.supports.index', compact('supports'));
    }

    public function create(){

        return view('admin.supports.create');
    }

    public function store(Request $request, Support $support){

        $data = $request->all();
        $data['status'] = 'ativo';

        $support->create($data);

        return redirect()->route('supports.index');

    }

    public function show(string|int $id){

        if(!$support = Support::find($id)){
            return redirect()->back();
        }

        return view('admin.supports.show', compact('support'));


    }

    public function edit(Support $support ,string|int $id ){
        if(!$support = $support->where('id',$id)->first()){
            return back();
        }
        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, string|int $id, Support $support){

        if(!$support = $support->where('id',$id)->first()){
            return back();
        }

        # support->subject = $request->subject;
        # $support->body = $request->body;
        # $support->save();

        $support->update($request->only([
            'subject', 'body'
        ]));
        
        return redirect()->route('supports.index');

    }
}