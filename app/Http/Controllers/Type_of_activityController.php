<?php

namespace App\Http\Controllers;

use App\Models\Type_of_activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\validation;

class Type_of_activityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('types_of_activity', [
            'types_of_activity' => Type_of_activity::paginate($perpage)->withQueryString()
            // 'types_of_activity' => Type_of_activity::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_of_activity_create_new', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_name' => 'required|unique:types_of_activity|max:255',
            'maximum_score' => 'required|integer',
            'user_id' => 'integer'
        ]);
        $type_of_activity = new Type_of_activity($validated);
        $type_of_activity->save();
        return redirect('/types_of_activity')->withErrors([
            'success' => 'Вы создали вид активности: '. $request->activity_name
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (!Gate::allows('edit-type_of_activity', Type_of_activity::all()->where('id', $id)->first())) {
            return back()->withErrors(['error'=> 'У вас нет доступа к изменению данного вида активности, так как он не является вашим ' . $id]);
        }
        return view('type_of_activity_edit', [
           'type_of_activity' => Type_of_activity::all()->where('id', $id)->first(),
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'activity_name' => 'unique:types_of_activity|max:255',
            'maximum_score' => 'required|integer',
            'user_id' => 'integer'
        ]);
        $type_of_activity = Type_of_activity::all()->where('id', $id)->first();
        $type_of_activity->activity_name = $validated['activity_name'];
        $type_of_activity->maximum_score = $validated['maximum_score'];
        $type_of_activity->user_id = $validated['user_id'];
        $type_of_activity->save();
        return redirect('/types_of_activity')->withErrors([
            'success' => 'Вы успешно изменили вид активности под id: '. $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('destroy-type_of_activity', Type_of_activity::all()->where('id', $id)->first())) {
            return back()->withErrors(['error'=> 'У вас нет доступа к удалению данного вида активности, так как он не является вашим ' . $id]);
        }
        $type_of_activity = Type_of_activity::findOrFail($id);
        Type_of_activity::destroy($id);
        return back()->withErrors([
            'success' => 'Вы удалили вид активности: '. $type_of_activity->activity_name
        ]);
    }
}
