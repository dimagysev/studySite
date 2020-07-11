<?php


namespace App\Traits\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

/**
 * Trait StoreImages
 * @package App\Traits\Services
 * @property UploadedFile $image
 * @property int $minHeight
 * @property int $minWidth
 * @property int $maxHeight
 * @property int $maxWidth
 * @property Model $model
 */
trait StoreImages
{
    protected $minHeight;
    protected $minWidth;
    protected $maxHeight;
    protected $maxWidth;
    protected $image;
    protected $model;

    /**
     * @return string
     */
    public function storeMin() : string
    {
        return $this->storeImg($this->minWidth, $this->minHeight);
    }

    public function storeMax() :string
    {
        return $this->storeImg($this->maxWidth, $this->maxHeight);
    }

    public function storeOriginal() :string
    {
        return $this->storeImg();
    }

    public function saveJsonImg()
    {
        return json_encode([
            'mini'  => $this->storeMin(),
            'max'   => $this->storeMax(),
            'path'  => $this->storeOriginal()
        ]);
    }

    protected function storeImg(?int $width = null, ?int $height = null) : string
    {
        $imageName = ($width && $height)
            ? $width. 'x' . $height . '-' . $this->image->getClientOriginalName()
            : $this->image->getClientOriginalName();
        $path = $this->image->storeAs('images/'.$this->model->getTable(), $imageName, 'public');
        if($width && $height) {
            Image::make(public_path('storage/' . $path))->fit($width, $height)->save();
        }
        return $imageName;
    }

}
