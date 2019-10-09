<?php

class Color
{
    public static $verbose = false;

    public $red = 0;

    public $green = 0;

    public $blue = 0;

    public function __construct(array $color_input)
    {
        if (array_key_exists("rgb", $color_input))
        {
            $this->red = (int)($color_input["rgb"] / 256 / 256 % 256);
            $this->green = (int)($color_input["rgb"] / 256 % 256);
            $this->blue = (int)($color_input["rgb"] % 256);
        }

        if (array_key_exists("red", $color_input))
        {
            $this->red = (int)$color_input["red"];
        }

        if (array_key_exists("green", $color_input))
        {
            $this->green = (int)$color_input["green"];
        }

        if (array_key_exists("blue", $color_input)) 
        {
            $this->blue = (int)$color_input["blue"];
        }

        if (self::$verbose === true)
        {
            echo ("$this constructed.\n");
        }
    }


    public static function doc()
    {
        $str = file_get_contents("Color.doc.txt");
        
        if (!$str)
        {
            return "";
        }

        return ($str);
    }
    
    public function add(Color $rhs)
    {
        if ($rhs == NULL)
        {
            return NULL;
        }

        return (new Color(array("red" => $this->red + $rhs->red, "green" => $this->green + $rhs->green, "blue" => $this->blue + $rhs->blue)));
    }

    public function sub(Color $rhs)
    {
        if ($rhs == NULL)
        {
            return NULL;
        }

        return (new Color(array("red" => $this->red - $rhs->red, "green" => $this->green - $rhs->green, "blue" => $this->blue - $rhs->blue)));
    }

    public function mult($f)
    {
        if ($f == NULL)
        {
            return NULL;
        }
        return (new Color(array("red" => $this->red * $f, "green" => $this->green * $f, "blue" => $this->blue * $f)));
    }

    public function __toString()
    {
        return (sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue));
    }

    public function __destruct()
    {
        if (self::$verbose === true)
        {
            echo("$this destructed.\n");
        }
    }
}