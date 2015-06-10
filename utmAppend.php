<?php

class utmAppend
{
    /**
     * gets url as a string
     * verify if string has ? or #
     * return "hasQuestion", "hasHash" or false
     * @param  string     $url [description]
     * @return string|bol      [description]
     */
    private static function parseUrl($url)
    {
        if (strpos($url, "?") !== false )
        {
            return "hasQuestion";
        } elseif(strpos($url, "#") !== false)
        {
            return "hasHash";
        }

        return false;
    }

    /**
     * parse the arguments
     * check if args string start with ? or #
     * return "hasQuestion", "hasHash" or false
     * @param  string   $args [description]
     * @return  string|bol [description]
     */
    private static function parseArgs($args)
    {
        if ("?" === $args[0])
        {
            return "hasQuestion";
        } elseif ("#" === $args[0])
        {
            return "hasHash";
        }
        return false;

    }

    /**
     * builds the url with tracking arguments
     * 
     * @param  string $url  e.g. http://example.tld/ OR http://example.tld/?already=there
     * @param  string $args e.g. ?utm=something OR #utm=something
     * @return string       e.g. http://example.tld/?utm=something OR http://example.tld/?utm=something OR http://example.tld/?already=there&utm=something
     */
    public static function build($url, $args)
    {
        if ("hasQuestion" === self::parseArgs($args))
        {

            if ("hasQuestion" === self::parseUrl($url))
            {
                // remove leading question mark from Arguments
                $args = substr($args, 1);
                return sprintf("%s%s%s", $url, "&", $args);
            }
            elseif ("hasHash" === self::parseUrl($url))
            {
                // remove leading question mark from Arguments
                $args = substr($args, 1);
                return sprintf("%s%s%s", $url, "&", $args);

            } else {
                return sprintf("%s%s%s", $url, "", $args);
            }
        }
        elseif ("hasHash" === self::parseArgs($args)) {
            if ("hasQuestion" === self::parseUrl($url))
            {
                return sprintf("%s%s%s", $url, "", $args);
            } elseif ("hasHash" === self::parseUrl($url)) {
                // remove leading Hash from Arguments
                $args = substr($args, 1);
                return sprintf("%s%s%s", $url, "&", $args);
            }
            else {
                return sprintf("%s%s%s", $url, "", $args);
            }
        }
        else
        {
            if ("hasQuestion" === self::parseUrl($url) && "hasHash" === self::parseUrl($url)) {
                return sprintf("%s%s%s", $url, "&", $args);
            }
            elseif (false === self::parseUrl($url)){
                return sprintf("%s%s%s", $url, "?", $args);
            }
            elseif ("hasQuestion" === self::parseUrl($url)) {
                return sprintf("%s%s%s", $url, "&", $args);
            }
            elseif ("hasHash" === self::parseUrl($url))
            {
                return sprintf("%s%s%s", $url, "&", $args);
            }
        }
    }
}