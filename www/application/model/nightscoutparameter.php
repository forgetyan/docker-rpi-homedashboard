<?php
class NightscoutParameter implements JsonSerializable
{
	private $siteUrl;
	
	public function __construct($siteUrl)
	{
		$this->$siteUrl = $siteUrl;
	}
        
        public static function jsonDeserialize($text)
        {
            $decode = json_decode($text, true);
            $parameters = new NightscoutParameter($decode["siteUrl"]);
        }
	
	public function getSiteUrl()
	{
		return $this->siteUrl;
	}
	
	public function jsonSerialize()
	{
		return [
				'NightscoutParameter' => [
						'siteUrl' => $this->siteUrl
				]
		];
	}
}
/*
 * usage:
$customer = new Customer('customer@sitepoint.com', 'Joe');

echo json_encode($customer);
*/