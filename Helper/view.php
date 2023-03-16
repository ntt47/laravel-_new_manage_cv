<?php 

function asset($path)
{
    return BASE_PATH.'public/'.$path;
}

function url($url, $queryStrings = [])
{
    if (count($queryStrings) > 0) {
        $queryString = http_build_query($queryStrings);
        return BASE_PATH.$url."?".$queryString;
    }
    return BASE_PATH.$url;
}