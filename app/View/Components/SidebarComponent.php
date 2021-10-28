<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarComponent extends Component
{
    public $latestPosts;
    public $categories;
    public $tags;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($latestPosts, $categories, $tags)
    {
        $this->latestPosts = $latestPosts;
        $this->categories = $categories;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar-component');
    }
}
