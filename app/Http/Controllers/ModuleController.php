<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller {

  /**
   * Display a listing of the resource.
   */
  public function index(Request $request) {
    $request->validate([
      'search' => 'nullable|string|max:255',
      'sort'   => 'nullable|string|in:id,name,hours,created_at',
      'order'  => 'nullable|string|in:asc,desc',
      'page'   => 'nullable|integer|min:1',
      'limit'  => 'nullable|integer|in:5,10,25,50,100',
    ]);

    $search = $request->search ?? '';
    $sort   = $request->sort   ?? 'created_at';
    $order  = $request->order  ?? 'desc';
    $page   = $request->page   ?? 1;
    $limit  = $request->limit  ?? 5;

    $modules = Module::where('name', 'like', "%$search%")
                     ->orderBy($sort, $order)
                     ->paginate($limit);

    if ($message = session('message'))
      $message = [
        'type' => session('message_type') ?? 'info',
        'content' => $message,
      ];

    return view('modules.index', compact('modules', 'search', 'sort', 'order', 'page', 'limit', 'message'));
  }

  public function factory(Request $request) {
    $count = $request->count ?? 10;
    Module::factory()->count($count)->create();

    session()->flash('message', "$count modules generated successfully");
    session()->flash('message_type', 'success');

    return redirect()->route('modules.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create() {
    return view('modules.create_edit', [
      'title' => 'Create Module',
      'action' => route('modules.store'),
      'module' => null,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request) {
    $request->validate([
      'name'  => 'required|string|max:255|unique:modules',
      'hours' => 'required|integer|min:0',
    ]);

    $module = Module::create([
      'name'  => $request->name,
      'hours' => $request->hours,
    ]);

    session()->flash('message', "Module $module->name created successfully");
    session()->flash('message_type', 'success');

    return redirect()->route('modules.index');
  }

  /**
   * Display the specified resource.
   */
  public function show(Module $module) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Module $module) {
    return view('modules.create_edit', [
      'title' => "Edit Module $module->name",
      'action' => route('modules.update', $module),
      'module' => $module,
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Module $module) {
    $request->validate([
      'name'  => "required|string|max:255|unique:modules,name,$module->id",
      'hours' => 'required|integer|min:0',
    ]);

    $module->update([
      'name'  => $request->name,
      'hours' => $request->hours,
    ]);

    session()->flash('message', "Module $module->name updated successfully");
    session()->flash('message_type', 'success');

    return redirect()->route('modules.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Module $module) {
    $module->delete();

    session()->flash('message', "Module $module->name deleted successfully");
    session()->flash('message_type', 'success');

    return redirect()->route('modules.index');
  }

  /**
   * Remove all resources from the storage.
   */
  public function delete(Request $request) {
    Module::truncate();

    session()->flash('message', 'All modules deleted successfully');
    session()->flash('message_type', 'success');

    return redirect()->route('modules.index');
  }

}
