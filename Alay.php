<?php
/**
 * PHP Alay Converter
 * A simple class to convert normal text to "annoying" alay text 
 * Ported from Alay Text Generator <http://alay.tk/s.js>
 *
 * @author 	Azhari Harahap <azhari@harahap.us>
 * @link	
 */
class Alay {

	/**
	* @var string  Collection of available letters
	*/
	private $letter = "AEGIOSZ";

	/**
	* @var string  Collection of available numbers
	*/
	private $number = "4361052";

	/**
	* @var string  Collection of vowels
	*/
	private $vowel = "AIUEO";

	/**
	* @var string  The text to be converted
	*/
	private $text;

	/**
	 * Constructor
	 *
	 * @param string
	 * @return void
	 */
	public function __construct($text = "")
	{
		if (!empty($text))
		{
			$this->setText($text);	
		}
	}

	/**
	 * Set text to be converted
	 *
	 * @param string
	 * @return void
	 */	
	public function setText($text = "")
	{
		$this->text = $text;
	}

	/**
	 * Convert normal text to alay text
	 *
	 * @param string
	 * @return string
	 */	
	public function makeAlay($text = "")
	{
		// big and small letter combination
		$retText = "";
		for($i=0; $i<=strlen($this->text); $i++)
		{
			if($this->getRandom())
			{
				$retText .= strtoupper($this->text[$i]);
			}
			else
			{
				$retText .= strtolower($this->text[$i]);
			}
		}
		
		// using number
		for($i=0; $i<=strlen($this->text); $i++)
		{
			if($this->getRandom())
			{
				for($j=0; $j<=strlen($this->letter); $j++)
				{
					if(strtoupper($this->text[$i]) == strtoupper($this->letter[$j]))
					{
						$retText[$i] = $this->number[$j];
						break;
					}
				}
			}
		}
		
		// decrease vowel
		$tmpText = "";
		for($i=0; $i<=strlen($this->text); $i++)
		{
			$terganti = FALSE;
			if($this->getRandom())
			{
				for($j=0; $j<=strlen($this->letter); $j++)
				{
					if(strtoupper($this->text[$i]) == strtoupper($this->vowel[$j]))
					{
						if($this->text[$i-1] != " " AND $i>0)
						{
							$terganti = TRUE;
						}
						break;
					}
				}
			}
			
			if(!$terganti)
			{
				$tmpText .= $retText[$i];
			}
		}
		$retText = $tmpText;
		
		return $retText;
	}

	/**
	 * Convert alay text to normal text
	 *
	 * @param string
	 * @return string
	 */	
	public function unAlay($text = "")
	{
		return "";
	}
	
	/**
	 * Get random boolean (TRUE or FALSE).
	 *
	 * @return boolean
	 */	
	private function getRandom()
	{
		return rand(0, 1);	
	}
}