<?php
declare(strict_types = 1);

namespace AdventCalendar\Models;

/**
 * Class Day
 * 
 * @package AdventCalendar\Models
 */
class Day {
    /**
     * Day's constructor
     * 
     * @param int    $id 
     * @param string $title 
     * @param string $description 
     * @param string $solution 
     * @param array  $hints 
     * @return void 
     */
    public function __construct(
        protected int    $id,
        protected string $title,
        protected string $content,
        protected array  $hints = [],
    ) {}

    /**
     * Method getId
     * 
     * @return int 
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Method getTitle
     * 
     * @return string 
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Method getDescription
     * 
     * @return string 
     */
    public function getContent(): string
    {
        return $this->content;
    }
    
    /**
     * Method getHint
     * 
     * @param int $id 
     * @return string 
     */
    public function getHint(int $id): string
    {
        return $this->hints[$id];
    }

    /**
     * Method getHints
     * 
     * @return array 
     */
    public function getHints(): array
    {
        return $this->hints;
    }

    /**
     * Method addHints
     * 
     * @param string $hints 
     * @return Day 
     */
    public function addHints(string ...$hints): self
    {
        $this->hints = array_merge($this->hints, $hints);
        return $this;
    }

    /**
     * Method removeHint
     * 
     * @param int $id 
     * @return Day 
     */
    public function removeHint(int $id): self
    {
        unset($this->hints[$id]);
        return $this;
    }
}
