<?php
namespace Levelab\Model\Thematic\Repository;

use Levelab\Model\Thematic\Entity\Thematic;
use Levelab\Model\Thematic\Values\ThematicId;

interface ThematicRepository {
    public function find(ThematicId $thematicId);

    public function findAll();

    public function add(Thematic $thematic);

    public function remove(Thematic $thematic);

    public function findByName($name);
} 