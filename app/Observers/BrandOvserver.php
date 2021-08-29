<?php

namespace App\Observers;

use App\Models\Brand;
use Illuminate\Support\Str;

class BrandOvserver
{
    /**
     * Handle the Brand "created" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function creating(Brand $brand){
        $brand->slug = Str::slug($brand->name);
    }
    public function created(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "updated" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function updated(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function deleted(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "restored" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function restored(Brand $brand)
    {
        //
    }

    /**
     * Handle the Brand "force deleted" event.
     *
     * @param  \App\Models\Brand  $brand
     * @return void
     */
    public function forceDeleted(Brand $brand)
    {
        //
    }
}
