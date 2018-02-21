<?php

namespace EmojiFlag;

use \Exception;

/**
 * Class EmojiFlag
 * @package EmojiFlag
 */
class EmojiFlag
{
    /**
     * @param $char
     * @return string
     *
     * @throws Exception
     */
    private static function enclosedUnicode($char)
    {
        $arr = [
            'a' => '1F1E6',
            'b' => '1F1E7',
            'c' => '1F1E8',
            'd' => '1F1E9',
            'e' => '1F1EA',
            'f' => '1F1EB',
            'g' => '1F1EC',
            'h' => '1F1ED',
            'i' => '1F1EE',
            'j' => '1F1EF',
            'k' => '1F1F0',
            'l' => '1F1F1',
            'm' => '1F1F2',
            'n' => '1F1F3',
            'o' => '1F1F4',
            'p' => '1F1F5',
            'q' => '1F1F6',
            'r' => '1F1F7',
            's' => '1F1F8',
            't' => '1F1F9',
            'u' => '1F1FA',
            'v' => '1F1FB',
            'w' => '1F1FC',
            'x' => '1F1FD',
            'y' => '1F1FE',
            'z' => '1F1FF'
        ];

        $char = strtolower($char);
        if (array_key_exists($char, $arr)) {
            return mb_convert_encoding('&#x' . $arr[$char] . ';', 'UTF-8', 'HTML-ENTITIES');
        }

        throw new Exception('Invalid character ' . $char);
    }


    /**
     * Converts country code to emoji flag.
     *
     * @param $code (2-letter code)
     * @return string
     * @throws Exception
     */
    private static function code2unicode(string $code): string
    {
        $arr = str_split($code);
        $str = '';
        foreach ($arr as $char) {
            $str .= self::enclosedUnicode($char);
        }

        return $str;
    }

    /**
     * @param string $code
     * @return string (one or more 2-letter codes)
     *
     * @throws Exception
     */
    public static function emojiFlag(string $code = null): string
    {
        $code = strtolower($code);
        if (substr($code, 0, 1) == '_') {
            $flag = [
                '_tibet' => '🇨🇳',
                '_basque-country' => '🇪🇸',
                '_northern-cyprus' => '🇨🇾',
                '_south-ossetia' => '🇷🇺',
                '_scotland' => '🇬🇧',
                '_wales' => '🇬🇧',
                '_england' => '🇬🇧',
                '_commonwealth' => '🇬🇧',
                '_british-antarctic-territory' => '🇬🇧',
            ];

            if (array_key_exists($code, $flag)) {
                return $flag[$code];
            }

            return '🏴';
        } elseif (empty($code)) {
            return '🏴';
        }

        $map = [
            'uk' => 'gb',
            'an' => 'nl',
        ];

        $arr = [];
        $result = '';

        while (strlen($code) > 0) {
            $arr[] = substr($code, 0, 2);
            $code = substr($code, 2);
        }

        foreach ($arr as $k => $val) {
            if (array_key_exists($val, $map)) {
                $arr[$k] = $map[$val];
                $val = $map[$val];
            }

            if (in_array($val, ['ap', 'un'])) {
                $result .= '🏴';
            } else {
                $result .= self::code2unicode($val);
            }
        }
        return $result;
    }
}
