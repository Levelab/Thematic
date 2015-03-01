<?php
namespace Levelab\Model\Thematic\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Levelab\Model\Core\Types\Container;
use Levelab\Model\Core\Types\Content;
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
     * @var ArrayCollection
     */
    private $contents;

    /**
     * @param ThematicId $id
     * @param $name
     * @param ThematicContainer $parent
     */
    public function __construct(ThematicId $id, $name, ThematicContainer $parent) {
        $this->id = $id;
        $this->name = $name;
        $this->parent = $parent;
        $this->contents = new ArrayCollection();
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
     * @param Content $content
     */
    public function addContent(Content $content) {
        $this->contents->add($content);
    }

    /**
     * @param Content $content
     * @throws \Exception
     */
    function removeContent(Content $content) {
        $contentFound = $this->contents->filter(function(Content $existingContent) use($content) {
            return $existingContent->getId()->compareAgainst($content->getId());
        })->first();

        if(!$contentFound) {
            throw new \Exception;
        }
        else {
            $this->contents->removeElement($contentFound);
        }
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }
}