<?php

// Нарушение принципа

class SqlDataViolation {

    public function readSql()
    {
        return ["data"];
    }
}

class FileDataViolation {

    public function readFile()
    {
        return ["data"];
    }
}

class InteractionBad {

    public function getData($member)
    {
        if ($member instanceof SqlDataViolation) {
            return $member->readSql();
        } elseif ($member instanceof FileDataViolation) {
            return $member->readFile();
        }
        throw new InvalidArgumentException('Invalid input member');
    }
}

// Соблюдение принципа

interface Data {
    public function read();
}
class SqlData implements Data {

    public function read()
    {
        return ["data"];
    }
}

class FileData implements Data {

    public function read() : array
    {
        return ["data"];
    }
}

class InteractionGood {

    public function getData(Data $data)
    {
        return $data->read();
    }
}
