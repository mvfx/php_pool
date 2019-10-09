<?php

class Tyrion extends Lannister {
		function sleepWith($inst) {
			if ($inst instanceof Jaime)
			{
				print("Not even if I'm drunk !" . PHP_EOL);
			}
			elseif ($inst instanceof Sansa)
			{
				print("Let's do this." . PHP_EOL);
			}
			elseif ($inst instanceof Cersei)
			{
				print("Not even if I'm drunk !" . PHP_EOL);
			}
		}
	}