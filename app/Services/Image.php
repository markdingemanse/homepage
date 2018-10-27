<?php

namespace App\Services;

use Illuminate\Support\Collection;

class image
{
    protected $publicPath = "../public/img";
        
    protected $blackList = [
        '.',
        '..',
        'blur.svg',
        'loader.gif',
        'mailgif.gif',
        'pomf.png',
    ];

    function recursiveRadomSelection(Collection $files)
    {
        $random = $files->random();

        if ($this->endsWith($random, '.jpg') | $this->endsWith($random, '.png')) {
            return $random;
        }

        return $this->recursiveRadomSelection($files);
    }

    function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        if ($length == 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    function blacklistFiles(Collection $files)
    {
        $blacklist = $this->getBlackList();

        $files->filter(function ($file) use ($blacklist) {
            return !in_array($file, $blacklist);
        });

        return $files;
    }

    function getBlackList()
    {
        return $this->blackList;
    }

    function getPublicPath()
    {
        return $this->publicPath;
    }
}
