<?php



class Dropbox_OAuth_Storage_Option implements Dropbox_OAuth_Storage_StorageInterface
{
	/**
	 * Session namespace
	 * @var string
	 */
	private $prefix = 'dropbox_api_';

	/**
	 * Encyption object
	 * @var Dropbox_OAuth_Storage_Encrypter|null
	 */
	private $encrypter = null;

	/**
	 * Check if a session has been started and if an instance
	 * of the encrypter is passed, set the encryption object
	 * @return void
	 */
	public function __construct(Dropbox_OAuth_Storage_Encrypter $encrypter = null)
	{
		//if($encrypter instanceof Dropbox_OAuth_Storage_Encrypter){
		//	$this->encrypter = $encrypter;
		//}
	}

	/**
	 * Get an OAuth token from the session
	 * If the encrpytion object is set then
	 * decrypt the token before returning
	 * @return array|bool
	 */
	public function get($type)
	{
		if($type != 'request_token' && $type != 'access_token'){
			throw new Dropbox_Exception("Expected a type of either 'request_token' or 'access_token', got '$type'");
		} else {
			$token = Option_Hash::get( $this->prefix. $type, '' );
                        
			//if($this->encrypter instanceof Dropbox_OAuth_Storage_Encrypter){
                          //      return $this->encrypter->decrypt($token);
			//}
                        return $token;
			
		}
	}

	/**
	 * Set an OAuth token in the session by type
	 * If the encryption object is set then
	 * encrypt the token before storing
	 * @return void
	 */
	public function set($token, $type)
	{
		if($type != 'request_token' && $type != 'access_token'){
			throw new Dropbox_Exception("Expected a type of either 'request_token' or 'access_token', got '$type'");
		} else {

			//if($this->encrypter instanceof Dropbox_OAuth_Storage_Encrypter){
                        //        Option_Hash::set( $this->prefix. $type, $this->encrypter->encrypt($token) );
			//} else {
                        if ( $token != '' ) Option_Hash::set( $this->prefix. $type, $token );
                        //}
		}
	}
}