<?php

  namespace Tobya\BCS\Shared\Media\Converters;

use Spatie\Url\Url;

  class Vimeo
  {
    public static function  RecordingToEmbedLink($RecordingURLLink){

        //https://vimeo.com/446845241/e26670f95a
       // now updated to
       //https://player.vimeo.com/video/612765724?h=037df12d4f&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479
       // New vimeo code needs a hash parameter h to embed.



       $url = Url::fromString($RecordingURLLink);
        $h = $url->getQueryParameter('h');
        if ($h !== null){
            return $RecordingURLLink;

        }

        if (is_null($RecordingURLLink)){
            return null;
        }

        // Normal url can now be written from new url, using 2nd param as hash.
        $blocks = explode('/',parse_url($RecordingURLLink,PHP_URL_PATH ));
        if (isset($blocks[2])){
            // https://vimeo.com/411510118/cf828bf6d6
            $videoid = $blocks[1];
            $videohash = $blocks[2];
            return "https://player.vimeo.com/video/$videoid?h=$videohash&badge=0&autopause=0&player_id=0&app_id=58479" ;
        } else {  // public video
            // https://vimeo.com/638718929
            $videoid = $blocks[1];
            return "https://player.vimeo.com/video/$videoid" . "?badge=0&autopause=0&player_id=0&app_id=58479";

        }


   }


    public static function  RecordingToEmbediFrame($RecordingURLLink){
        $modifiedurl = Self::RecordingToEmbedLink($RecordingURLLink);
        return " <iframe src=\"$modifiedurl\"  width=\"100%\" frameborder=\"0\" allow=\"autoplay; fullscreen\" allowfullscreen></iframe>";
    }
  }
