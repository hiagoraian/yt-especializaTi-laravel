<?php

namespace App\Repositories;

use APP\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use stdClass;

interface SupportRepositoryInterface{

    public function getAll(string $filter = null):array;
    public function findOne(String $id ): stdClass|null;
    public function delete(String $id ): void;
    public function new(CreateSupportDTO $dto ): stdClass;
    public function update(UpdateSupportDTO $dto ): stdClass|null;
}