<?php
namespace Blog\DB;

class DB {

  public $manager = null; //DB manager | @var object
  public $dbname = ''; //DB name | @var string
  public $bulk = null;
  public $writeConcern = null;
  public $limit = 5; //Result limit | @var integer

  public function __construct($config) {
    $this->connect($config);
  }

  //connect MongoDB
  public function connect($config) {
		try{
			// if (!class_exists('MongoDB')){
	    //         print_r ("T he MongoDB PECL extension has not been installed or enabled");
	    //         return false;
	    //     }
      $this->manager = new \MongoDB\Driver\Manager($config['connection_string']);
      $this->dbname = $config['dbname'];
      $this->bulk = new \MongoDB\Driver\BulkWrite;
      $this->writeConcern = new \MongoDB\Driver\WriteConcern(\MongoDB\Driver\WriteConcern::MAJORITY, 100);
      return $this->manager;
		}catch(Exception $e) {
			return false;
		}
	}

  //get one article by id | @var array
  public function getById($id, $collection) {
    if(strlen($id) == 24) {
      $id = new \MongoDB\BSON\ObjectId("$id"); // Convert strings to MongoID
    }
    $query = new \MongoDB\Driver\Query(['_id' => $id]);
    $cursor = $this->manager->executeQuery($this->dbname.'.'.$collection, $query);
    $cursorArray = $cursor->toArray();
    $article = json_decode(json_encode($cursorArray[0]), True);
    if (!$article ){
			return false ;
		}
		return $article;
  }

  //get all data in collection and paginator | multi array
  public function get($page, $collection) {
    $currentPage = $page;
		$articlesPerPage = $this->limit;

    $skip = ($currentPage - 1) * $articlesPerPage; //number of article to skip from beginning
    $filter = [];
    $options = [
        'sort' => ['time' => -1]
    ];
    $query = new \MongoDB\Driver\Query($filter,$options);
    $cursor = $this->manager->executeQuery($this->dbname.'.'.$collection, $query);
    $cursorArray = $cursor->toArray();
    $totalArticles = count($cursorArray); //total number of articles in database
    $totalPages = (int) ceil($totalArticles / $articlesPerPage); //total number of pages to display

    //$cursor->sort(array('time' => -1))->skip($skip)->limit($articlesPerPage);
    $cursor = array_slice($cursorArray,$skip,$articlesPerPage);
    $data = array($currentPage,$totalPages,$cursor);
    return $data;
  }

  //create article | @var boolean
  public function create($collection,$article) {
    $this->bulk->insert($article);
    $res = $this->manager->executeBulkWrite($this->dbname.'.'.$collection, $this->bulk, $this->writeConcern);
    return $retVal = ($res->getInsertedCount() == 1) ? true : false;
  }

  //delete article via id | @var boolean
  public function delete($id,$collection) {
    if(strlen($id) == 24) {
      $id = new \MongoDB\BSON\ObjectId($id); // Convert strings to MongoID
    }
    $this->bulk->delete(['_id' => $id]);
    $res = $this->manager->executeBulkWrite($this->dbname.'.'.$collection, $this->bulk, $this->writeConcern);
    return $retVal = ($res->getDeletedCount() == 1) ? true : false;
  }

  //update article via id | @var boolean
  public function update($id,$collection,$article) {
    if(strlen($id) == 24) {
      $id = new \MongoDB\BSON\ObjectId($id); // Convert strings to MongoID
    }
    $this->bulk->update(['_id' => $id],['$set' => $article]);
    $res = $this->manager->executeBulkWrite($this->dbname.'.'.$collection, $this->bulk, $this->writeConcern);
    return $retVal = ($res->getModifiedCount() == 1) ? true : false;
  }

  //create and update comment via id | @var boolean
   public function commentId($id,$collection,$comment) {
     if(strlen($id) == 24) {
       $id = new \MongoDB\BSON\ObjectId($id); // Convert strings to MongoID
     }
     $query = new \MongoDB\Driver\Query(['_id' => $id],['limit' => 1]);
     $cursor = $this->manager->executeQuery($this->dbname.'.'.$collection, $query);
     if(!$cursor) {
       return false;
     }
     foreach($cursor as $document) {
       $post = $document;
     }
     $post = json_decode(json_encode($post), True);
     if (isset($post['comments'])) {
       $comments = $post['comments'];
     }else{
       $comments = array();
     }
     array_push($comments, $comment);
     $this->bulk->update(['_id' => $id],['$set' => ['comments' => $comments]]);
     $res = $this->manager->executeBulkWrite($this->dbname.'.'.$collection, $this->bulk, $this->writeConcern);
     return $retVal = ($res->getModifiedCount() == 1) ? true : false;
   }

   //
}
?>
