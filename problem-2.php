<?php

class VowelFinder
{
    static $vowels = [ "a", "e", "i", "o", "u", "y" ];

    public function findVowels($string)
    {
        $result = [];
        $formatted_string = strtolower($string);
        $exclude_y = $formatted_string[0] === "y" && strlen($formatted_string) > 1;

        for ($i = 0; $i < strlen($formatted_string); $i++)
        {
          if ($formatted_string[$i] === "y" && $exclude_y)
          {
            continue;
          }

          if (in_array($formatted_string[$i], $this::$vowels) && !in_array($formatted_string[$i], $result))
          {
            $result[] = $formatted_string[$i];
          }
        }

        return "Unique Vovels: " . implode($result, ", ");
    }
}

$test = new VowelFinder();

echo $test->findVowels("yuyeasdyigasgdpjiasnglasjgeololoy");
