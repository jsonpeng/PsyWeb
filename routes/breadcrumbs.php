<?php
// Home
Breadcrumbs::register('index', function($breadcrumbs)
{
    $breadcrumbs->push('首页', route('index'));
});

// Home > Blog

Breadcrumbs::register('category', function($breadcrumbs, $category)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push($category->name, route('category', $category));
});


Breadcrumbs::register('page', function($breadcrumbs, $page)
{
    $breadcrumbs->parent('index');
    $breadcrumbs->push($page->name, route('page', $page));
});

Breadcrumbs::register('post', function($breadcrumbs, $post)
{
	$cat = $post->cats()->first();
    if ($cat) {
    	$breadcrumbs->parent('category', $cat);
    }else{
    	$breadcrumbs->parent('index');
    }
    $breadcrumbs->push($post->name, route('post', $post));
});


/*
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('index');
    $breadcrumbs->push($category->name, route('cat', $category->id));
});
*/