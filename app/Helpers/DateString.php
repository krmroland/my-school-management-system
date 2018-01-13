<?php

namespace App\Helpers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DateString implements Arrayable
{
    /**
     * the raw date string.
     *
     * @var string
     */
    protected $raw;
    /**
     * the parsed from date.
     *
     * @var string
     */
    protected $from;
    /**
     * determines if the date string is a range.
     *
     * @var bool
     */
    protected $isRange = false;

    /**
     * the single date vale.
     *
     * @var null|\Illuminate\Support\Carbon
     */
    protected $single;

    /**
     * the to of the range string.
     *
     * @var null|\Illuminate\Support\Carbon
     */
    protected $to;

    /**
     * creates an instance of the class.
     *
     * @param string $raw
     */
    public function __construct($raw)
    {
        $this->raw = $raw;

        $this->parseRaw();
    }

    public static function makeFrom($raw)
    {
        return new static($raw);
    }

    /**
     * parses the raw string.
     *
     * @return self
     */
    protected function parseRaw()
    {
        return  Str::contains($this->raw, 'to')
            ? $this->parseRange() :
            $this->parseSingle();
    }

    /**
     * parses the range dates.
     *
     * @return self
     */
    protected function parseRange()
    {
        $parts = explode('to', $this->raw);

        $this->from = $this->asCarbon($parts[0]);

        $this->to = $this->asCarbon($parts[1]);

        $this->isRange = true;

        return $this;
    }

    /**
     * parses the single date.
     *
     * @return self
     */
    protected function parseSingle()
    {
        $this->isRange = false;
        $this->single = $this->asCarbon($this->raw);

        return $this;
    }

    public function from()
    {
        return $this->from;
    }

    public function to()
    {
        return $this->to;
    }

    public function single()
    {
        return $this->single;
    }

    /**
     * converts the raw date to a carbon instance.
     *
     * @param string $date
     *
     * @return \Illuminate\Support\Carbon
     */
    protected function asCarbon($date)
    {
        return Carbon::createFromFormat('Y-m-d', trim($date));
    }

    protected function isRange()
    {
        return $this->isRange;
    }

    /**
     * Returns a array representation of the object.
     *
     * @return array
     */
    public function toArray($fromLabel = 'from', $toLabel = 'to')
    {
        if ($this->isRange()) {
            return [
                $fromLabel => $this->from,
                $toLabel => $this->to,
            ];
        }

        return ['single' => $this->single];
    }
}
