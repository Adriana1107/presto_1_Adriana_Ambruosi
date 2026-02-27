<?php

namespace App\Jobs;

use App\Models\Image;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Image as SpatieImage;
use Spatie\Image\Enums\Fit;

class RemoveFaces implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, SerializesModels, Queueable;

    private $article_image_id;
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }
    

  
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if(!$i){
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->FacesDetection($image);
        $faces = $response->getFaceAnnotation();

        foreach($faces as $face){
            $vertices = $face->getBoundIngPoly()->getVertices();

            $bounds = [];

            foreach ($vertices as $vertex){
                $bounds[] = [$vertex->getX(), $vertex->getY()];
            }

            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];

            $image = SpatieImage::load($srcPath);

            $image->watermark(
                base_path('public/images...'),
                AlignPosition::TopLeft,
                paddingX: $bounds[0][0],
                paddingY: $bounds[0][1],
                width: $w,
                height: $h,
                fit: Fit::Stretch,
            );

            $image->save($srcPath);

        }

        $imageAnnotator->close();
    }
}
