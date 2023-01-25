<?php

namespace Tobya\BCS\Shared\Media\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tobya\BCS\Shared\Media\Converters\Vimeo;


class Medialink extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    /**
     * Returns an iframe string
     * @return string
     */
    public function getembedhtmlAttribute(){
        try {
          return Vimeo::RecordingToEmbediFrame($this->url);
        } catch (\Exception $e){
            return "Unable to Load Video - $this->url";
        }

    }

    public function getembedlinkattribute(){
        try {

        return Vimeo::RecordingToEmbedLink($this->url);
        } catch (\Exception $e){
            return "https://ballymaloecookeryschool.ie";
        }
    }
}
