<?php

  namespace Tobya\Shared\Media\Converters;

  namespace Spatie\Url;

  class Vimeo
  {
    public function RecordingToEmbedLink($RecordingURLLink){

        //https://vimeo.com/446845241/e26670f95a
       // now updated to
       //https://player.vimeo.com/video/612765724?h=037df12d4f&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479
       // New vimeo code needs a hash parameter h to embed.



       $url = Url::fromString($RecordingURLLink);
        $h = $url->getQueryParameter('h');
        if ($h !== null){
            $this->url = $RecordingURLLink;
            return $this->url;
        }

        if (is_null($RecordingURLLink)){
            return null;
        }

        // Normal url can now be written from new url, using 2nd param as hash.
        $blocks = explode('/',parse_url($RecordingURLLink,PHP_URL_PATH ));
        $videoid = $blocks[1];
        $videohash = $blocks[2];
        $this->url = "https://player.vimeo.com/video/$videoid?h=$videohash&badge=0&autopause=0&player_id=0&app_id=58479" ;
        return $this->url;

   }
  }