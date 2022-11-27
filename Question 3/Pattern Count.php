<?php

function patternCount(string $characters, $pattern): int
{
    $pattern_length = strlen($pattern);
    $pattern_split = str_split($pattern);
    $currentPattern = "";
    $result = 0;

    foreach (str_split($characters) as $character) {
        $currentPattern .= $character;

        // checking current pattern (for debug)
        // print_r($currentPattern);
        // print_r(" ");
        if ($currentPattern == $pattern) {
            $result += 1;

            if ($pattern_length > 1) {
                // cek current chara looping sesuai dgn awalan pattern?
                if ($character == $pattern_split[0]) {
                    $currentPattern = $character;
                } else {
                    $currentPattern = "";
                }
            } else {
                $currentPattern = "";
            }
            // reset kalo length current nya sama dgn pattern tpi str ttep ga matching
        } else if (strlen($currentPattern) >= $pattern_length) {
            $currentPattern = "";
        }
    }

    return $result;
}

print_r(patternCount("palindrom", "ind"));
print_r(" ");
print_r(patternCount("abakadabra", "ab"));
print_r(" ");
print_r(patternCount("hello", ""));
print_r(" ");
print_r(patternCount("ababab", "aba"));
print_r(" ");
print_r(patternCount("aaaaaa", "aa"));
print_r(" ");
print_r(patternCount("hell", "hello"));
