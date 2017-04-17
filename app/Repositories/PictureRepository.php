<?php
namespace App\Repositories;


use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
/**
 * Class PictureRepository
 * @package App\Repositories
 */
class PictureRepository
{
    /**
     * @param Request $request
     * @return array
     */
    public function save(Request $request)
    {
        $picture = new Picture;
        return $this->update($request, $picture);
    }

    /**
     * @param Request $request
     * @param Picture $picture
     * @return array
     */
    public function update(Request $request, Picture $picture)
    {
        try {
            $filename = '';
            if ( ($request->file('file') !== null) && ($request->file('file')->isValid()) ) {
                $extension = $request->file('file')->getClientOriginalExtension();
                $filename = rand(11111, 99999).'.'.$extension;
                Image::make($request->file('file'))->save(storage_path('app/images/'.$filename));
                $picture->filename = $filename;
                $picture->name = $filename;
            } elseif ( $request->input('local_image') !== null ) {
                $localImage = Picture::find($request->input('local_image'));
                $picture->file = $localImage->file;
            }
            $picture->save();
            return ['success' => true, 'errors' => '', 'picture_id' => $picture->id ];
        } catch(\Exception $exception) {
            return ['success' => false, 'errors' => $exception->getMessage(), 'entity' => var_export($picture)];
        }
    }
}
