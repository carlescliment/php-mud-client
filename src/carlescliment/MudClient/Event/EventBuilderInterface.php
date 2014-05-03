<?php

namespace carlescliment\MudClient\Event;

interface EventBuilderInterface
{
	public function buildFor($message);
}
