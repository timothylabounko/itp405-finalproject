<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    /**
     * Display a listing of the marks for the authenticated viewer.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $viewer = Auth::user();

        $marks = $viewer->marks()->with('entity')->get();

        return view('marks.index', compact('marks'));
    }

    /**
     * Store a newly created mark for the authenticated viewer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'entity_id' => 'required|exists:entities,id',
        ]);

        $viewer = Auth::user();

        $mark = new Mark();
        $mark->viewer_id = $viewer->id;
        $mark->comment_id = $request->input('entity_id');
        $mark->save();

        return redirect()->back()->with('success', 'Mark added successfully!');
    }

    /**
     * Add a mark to a specific entity.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $entityId
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $entityId)
    {
        $viewer = Auth::user();

        $mark = new Mark();
        $mark->viewer_id = $viewer->id;
        $mark->comment_id = $entityId;
        $mark->save();

        return redirect()->back()->with('success', 'Mark added successfully!');
    }

    /**
     * Remove the specified mark for the authenticated viewer.
     *
     * @param  \App\Models\Mark  $mark
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mark $mark)
    {
        if ($mark->viewer_id === Auth::id()) {
            // Delete the mark
            $mark->delete();

            return redirect()->back()->with('success', 'Mark removed successfully!');
        } else {
            return redirect()->back()->with('error', 'Unauthorized action!');
        }
    }
}
