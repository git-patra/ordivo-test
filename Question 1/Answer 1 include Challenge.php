<?php


class SumDeep
{
    private int $result = 0;

    public function get(array $array, string $str)
    {
        $result = 0;

        foreach (str_split($str) as $key => $val) {
            foreach ($array as $value) {
                if (is_array($value)) {
                    $this->recursiveNodeLevel($value, $val, 2);
                } else if (strpos($value, $val) !== false) {
                    $this->result += 1;
                }
            }

            $result += ($this->result * ($key + 1));
            $this->result = 0;
        }

        return $result;
    }

    private function recursiveNodeLevel(array $array, string $str, int $node)
    {
        foreach ($array as $value) {
            if (is_array($value)) {
                $this->recursiveNodeLevel($value, $str, $node + 1);
            } else if (strpos($value, $str) !== false) {
                $this->result += $node;
            }
        }
    }
}

// ~ Test Case
// A
print_r(
    (new SumDeep())->get(['AB', ['XY'], ['YP']], 'Y')
);
print_r(' ');

// B
print_r(
    (new SumDeep())->get(['', ['', ['XXXX']]], 'X')
);
print_r(' ');

// C
print_r(
    (new SumDeep())->get(['X'], 'X')
);
print_r(' ');

// D
print_r(
    (new SumDeep())->get([''], 'X')
);
print_r(' ');

// E
print_r(
    (new SumDeep())->get(['X', ['', ['', ['Y'], ['X']]], ['X', ['', ['Y'], ['Z']]]], 'X')
);
print_r(' ');

// F
print_r(
    (new SumDeep())->get(['X', [''], ['X'], ['X'], ['Y', ['']], ['X']], 'X')
);
print_r(' ');

// Challenge
print_r(
    (new SumDeep())->get(['ABAH', ['CIRCA'], ['CRUMP', ['IRA']], ['ALI']], 'ACI')
);