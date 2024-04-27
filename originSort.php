<?php
class originSort
{
    /**
     * main
     * @param $in
     * @return array
     */
    public function main($in): array
    {
        $answerData = [];
        foreach ($in as $key => $value) {
            if (is_int($key)) {
                foreach ($value as $key2 => $value2) {
                    $answerData += $this->getAlignment($key2, $value2);
                }
            } else {
                $answerData += $this->getAlignment($key, $value);
            }
        }
        //ソート
        uksort($answerData, array($this, 'getSort'));
        return $answerData;
    }

    /**
     * 連想配列を置き換え
     * @param $key
     * @param $value
     * @return array
     */
    function getAlignment($key, $value): array
    {
        if (!(int)$key) {
            return [$value => $key];
        }
        return [$key => $value];
    }

    /**
     * ソート
     * @param $a 
     * @param $b
     * @return bool
     */
    function getSort($a, $b): bool
    {
        return (int)$a > (int)$b;
    }
}

$in = [
    ['2nd' => 'two', 'four' => '4th'],
    'three' => '3rd',
    ['one' => '1st'],
    '10th' => 'ten',
    ['6th' => 'six'],
    '5th' => 'five',
    'seven' => '7th',
    ['fourteen' => '14th', '11th' => 'eleven'],
    ['8th' => 'eight'],
    'thirteen' => '13th',
    '12th' => 'twelve',
    'nine' => '9th',
    ['15th' => 'fifteen'],
];

$answerData = (new originSort)->main($in);
//表示とアンサーデータ
foreach ($answerData as $key => $value) {
    printf('%s => %s <br>', $key, $value);
}
var_dump($answerData);
