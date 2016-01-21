
<?php

class model2 {

	static $dsn = 'sqlite:sql/baza.db' ;
	protected static $db ;
	private $sth ;
	protected $objJson;
	function __construct(){
		self::$db = new PDO ( self::$dsn ) ;
		self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) ;
	}

	public function listAll(){
		$this->sth = self::$db->prepare('SELECT * FROM ksiazki') ;
		$this->sth->execute() ;
      		$result = $this->sth->fetchAll() ;
      		return $result ;
	}

   	public function saveRec($obj){
      		$this->sth = self::$db->prepare('INSERT INTO ksiazki VALUES ( :tytul, :nazwisko, :imie, :wydawnictwo, :rok) ') ;
      		$this->sth->bindValue(':tytul',$obj->tyt,PDO::PARAM_STR) ;
      		$this->sth->bindValue(':nazwisko',$obj->autn,PDO::PARAM_STR) ;
                $this->sth->bindValue(':imie',$obj->auti,PDO::PARAM_STR) ;
                $this->sth->bindValue(':wydawnictwo',$obj->wyd,PDO::PARAM_STR) ;
      		$this->sth->bindValue(':rok',$obj->rok,PDO::PARAM_INT) ;
      		$resp = ( $this->sth->execute() ? 'true' : 'false' ) ;
      		return $resp ; 
   	}

   	public function clearDB(){
    		try{
			$this->sth = self::$db->prepare('DELETE FROM ksiazki ') ;
			$this->sth->execute() ;
	  	}catch (Exception $e) {
  			echo 'Blad w model2: [' . $e->getCode() . '] ' . $e->getMessage() ;
		}
   	}
}

?>
