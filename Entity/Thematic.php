<?php
namespace Levelab\Model\Thematic\Entity;

use Levelab\Model\Core\Types\Container;
use Levelab\Model\Thematic\Types\ThematicContainer;
use Levelab\Model\Thematic\Values\ThematicId;

class Thematic implements Container, ThematicContainer {
    /**
     * @var ThematicId
     */
    private $id;
    private $name;
    /**
     * @var ThematicContainer
     */
    private $parent;

    /**
     * @param ThematicId $id
     * @param $name
     * @param ThematicContainer $parent
     */
    public function __construct(ThematicId $id, $name, ThematicContainer $parent) {
        $this->id = $id;
        $this->name = $name;
        $this->parent = $parent;
    }

    /**
     * @return ThematicId
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return ThematicContainer
     */
    public function getParent() {
        return $this->parent;
    }

    /**
     * @return ArrayCollection
     */
    public function getContents() {
        return $this->contents;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }
}