<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $page = Page::create($request->validated());
        if ($request->hasFile('image')) {
            /*
            $page->addMediaFromRequest('image')
                ->preservingOriginal()
                ->toMediaCollection('image');
            */
            $page->addMediaFromRequest('image')
                ->toMediaCollection('main');
        }

        return redirect(route('pages.index'))
            ->with('success','Pagina creata con successo');
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
    public function edit(Page $page)
    {
        return view('pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $page->update($request->validated());
        if ($request->hasFile('image')) {
            $page->clearMediaCollection();
            /*
            $page->addMediaFromRequest('image')
                ->preservingOriginal()
                ->toMediaCollection('image');
            */
            $page->addMediaFromRequest('image')
                ->toMediaCollection('main');
        }
        return redirect(route('pages.index'))
            ->with('success','Pagina aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect(route('pages.index'));
    }
}
