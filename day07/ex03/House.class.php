<?php

class House
{
	public abstract function getHouseName();
	public abstract function getHouseSeat();
	public abstract function getHouseMotto();

	public function	introduce()
	{
		echo ('House '.$this->getHouseName().
				' of '.$this->getHouseSeat().
				' : "'.$this->getHouseMotto().
				'"'."\n");
	}
}
