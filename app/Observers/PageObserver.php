<?php

namespace App\Observers;

use App\Models\Page;
use Str;

class PageObserver
{

    public function creating(Page $page) {
        $page->slug = Str::slug($page->title);
    }

    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        //dd($page);
    }

    /**
     * Handle the Page "updated" event.
     */
    public function updated(Page $page): void
    {
        if ($page->isDirty("title")) {
            $page->slug = Str::slug($page->title);
        }
    }

    /**
     * Handle the Page "deleted" event.
     */
    public function deleted(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "restored" event.
     */
    public function restored(Page $page): void
    {
        //
    }

    /**
     * Handle the Page "force deleted" event.
     */
    public function forceDeleted(Page $page): void
    {
        //
    }
}
