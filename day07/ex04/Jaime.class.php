<?php

class Jaime extends Lannister
{
	public function		sleepWith ( $inst )
	{
		if ($inst instanceof Cersei)
		{
			echo ("With pleasure, but only in a tower in Winterfell, then.\n");
		}
		else if ($inst instanceof Tyrion)
		{
			echo ("Not even if I'm drunk !\n");
		}
		else
		{
			echo ("Let's do this.\n");
		}
	}
}
