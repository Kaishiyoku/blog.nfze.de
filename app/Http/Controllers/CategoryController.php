<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * @var string
     */
    private $redirectRoute = 'categories.index';

    /**
     * @var array
     */
    private $validationRules = [
        'title' => ['required'],
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('title');

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();

        return view('category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRulesWithTitleUniqueness());

        $category = new Category($request->all());
        $category->save();

        flash(__('category.create.success'))->success();

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->getValidationRulesWithTitleUniqueness($category));

        $category->fill($request->all());
        $category->save();

        flash(__('category.edit.success'))->success();

        return redirect()->route($this->redirectRoute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->articles->count() > 0) {
            flash(__('category.destroy.articles_exist'))->error();
        } else {
            $category->delete();

            flash(__('category.destroy.success'))->success();
        }

        return redirect()->route($this->redirectRoute);
    }

    private function getValidationRulesWithTitleUniqueness(Category $category = null)
    {
        $titleUniquessRule = Rule::unique('categories', 'title');

        if ($category != null) {
            $titleUniquessRule = $titleUniquessRule->ignore($category->id);
        }

        $validationRules = $this->validationRules;
        $validationRules['title'][] = $titleUniquessRule;

        return $validationRules;
    }
}
