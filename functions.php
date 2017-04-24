<?php

/**
 * @param array $array
 * @param int $copies
 * @return array
 */
function repeat(array $array, $copies = 3)
{
    $merge = [];

    for ($i = 0; $i < $copies; $i++) {
        $merge = array_merge($merge, $array);
    }

    return $merge;
}

/**
 * @param string $text
 * @return string
 */
function remove_vowels(string $text)
{
    $vowels = ["a", "e", "i", "o", "u"];
    return str_ireplace($vowels, "", $text);
}

/**
 * Removes vowels, uppercase first letter of text and lowercase rest
 *
 * @param string $text
 * @return string
 */
function reformat(string $text)
{
    $string = ucfirst(strtolower($text));
    return remove_vowels($string);
}

/**
 * @param int $a
 * @param int $b
 * @return array[0 -> value, 1 -> carry]
 */
function binary_add(int $a, int $b)
{
    if ($a === 0 && $b === 0) {
        return [0, 0];
    } else if (($a === 1 && $b === 0) || ($a === 0 && $b === 1)) {
        return [1, 0];
    } else {
        return [0, 1];
    }
}

/**
 * @param array $number
 * @return array
 */
function next_binary_number(array $number)
{
    $nextBin = [];
    $carry = 0;
    $size = count($number);
    for($i = ($size - 1); $i >= 0; $i--) {
        list($result, $carry) = ($i == $size - 1) ? binary_add($number[$i], 1) : binary_add($number[$i], $carry);
        $nextBin[] = $result;
    }

    if ($carry == 1) {
        $nextBin[] = $carry;
    }

    return array_reverse($nextBin);
}

