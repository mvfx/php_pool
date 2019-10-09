<?php

class NightsWatch implements IFighter
{
	private $fighters = array();

	public function recruit($fighter) {
		$this->fighters[] = $fighter;
	}

	function fight()
	{
		foreach ($this->fighters as $fighter)
		{
			if (method_exists($fighter, 'fight'))
			{
				$fighter->fight();
			}
		}
	}
}