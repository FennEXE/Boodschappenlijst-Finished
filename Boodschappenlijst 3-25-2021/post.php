<?php
//require 'views/partials/nav.php';
class post
{
	public $title;

	public $published;

	public function __construct($title, $published)
	{
		$this->title = $title;
		$this->published = $published;

	}
}

$posts = [
	new post('First Post', true),
	new post('Second Post', false),
	new post('Third Post', true),
	new post('Fourth Post', true)
];

/*
var_dump($posts);

//Filters arrays based on boolean, gets only the false results
$unpublishedPosts = array_filter($posts, function($post){
	return ! $post->published;
});

var_dump($unpublishedPosts);

//Filters arrays based on boolean, gets only the true results
$publishedPosts = array_filter($posts, function($post){
	return $post->published;
});

var_dump($publishedPosts);

//Changes all results in an array into foobar
$mod = array_map(function($post)
{
	return 'foobar';
}, $posts);

var_dump($mod);
*/

//posts only the fourth title 
$column = array_column($posts, 'title');

var_dump($column[3]);


//Posts each array as a nested array
/*
foreach ($posts as $index => $post)
{
	$posts[$index] = (array) $post;
}

var_dump($posts);


//maps arrays
$posts = array_map(function($post) {
	return (array)$post;
}, $posts);

//Shows only the titles of the arrays
$columnd = array_column($posts, 'title');
var_dump($columnd);

