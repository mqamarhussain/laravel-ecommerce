<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\PageRequest;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{

    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        $this->authorize('access_page
        ');
        $pages = $this->page->all();

        return view('backend.pages.index', compact('pages'));
    }

    public function show(Page $page)
    {
        $this->authorize('show_page');

        return view('backend.pages.show', compact('page'));
    }

    public function create()
    {
        $this->authorize('create_page');
        return view('backend.pages.create');
    }

    public function store(PageRequest $request)
    {
        $this->authorize('create_page');

        $this->page->create($request->validated());

        Cache::forget('pages_menu');
        Cache::forget('posts_menu');

        return redirect()->route('admin.pages.index')->with(['message' => 'Page added successfully', 'alert-type' => 'success',]);
    }

    public function edit(Page $page)
    {
        $this->authorize('edit_page');

        return view('backend.pages.edit', compact('page'));
    }

    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());

        Cache::forget('pages_menu');
        Cache::forget('posts_menu');

        return redirect()->route('admin.pages.index')->with(['message' => 'Page updated successfully', 'alert-type' => 'success',]);
    }

    public function destroy(Page $page)
    {
        $this->authorize('delete_page');

        $page->delete();

        return redirect()->back()->with(['message' => 'Page deleted successfully', 'alert-type' => 'success',]);
    }
}
