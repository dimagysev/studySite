<?php


namespace App\Traits\Models;


/**
 * Trait GetImgAccessor
 * @package App\Traits

 */
trait ImgAccessor
{
    public function getImgAttribute($value)
    {
        if (!is_string($value)) {
             throw new \Exception('Field img must be string');
        }
        if (is_object(json_decode($value)) && (json_last_error() == JSON_ERROR_NONE)) {
            $value = json_decode($value);
            foreach ($value as $k => &$img) {
                $img = $this->table . '/' . $img;
            }
            unset($img);
            return $value;
        }
        $value = $this->table . '/' . $value;
        return $value;
    }
}
