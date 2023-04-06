<?php

use Illuminate\Database\Seeder;

use App\Gallery;
use App\GalleryImage;

class GalleryImagePositionFixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Gallery::all() as $gallery) {
            $i = 0;

            foreach ($gallery->galleryImages as $galleryImage) {
                $galleryImage->position = $i;
                $galleryImage->save();
                $i++;
            }
        }
    }
}
