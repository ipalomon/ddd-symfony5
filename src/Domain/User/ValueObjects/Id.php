<?php
declare(strict_types=1);

namespace App\Domain\User\ValueObjects;

class Id
{
    /**
     * @var int
     */
    private int $id;

    public function __construct(int $id){
        if($id < 0){
            throw new \InvalidArgumentException("The id should be not negative: {$id}.");
        }
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}