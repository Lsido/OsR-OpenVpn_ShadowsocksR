<?php 

class FastPDO {
    
    private $config = array(
        'host' => 'localhost',
        'user' => 'root', 
        'pass' => 'root',
        'charset' => 'utf8',
        'db_name' => 'opssr'
    );
    private static $instance; 
    private $dbh;
    
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        
        return self::$instance; 
    }
    
    private function __construct() 
    {
        $config = $this->config;
        try {
            $dbh = new PDO('mysql:dbname='.$config['db_name'].';host='.$config['host'], $config['user'], $config['pass']);
            $dbh->exec('set names '.$config['charset']);
            $this->dbh = $dbh; 
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
 
    //读取单行记录 
    public function getOne($sql, $params = array()) 
    {
        $pdo = $this->dbh->prepare($sql);
        $pdo->execute($params);
        //读取关联数组 
        $data = $pdo->fetch(PDO::FETCH_ASSOC);
        return $data; 
    }
    
	
    //读取多行记录 
    public function getSome($sql, $params = array()) 
    {
        $pdo = $this->dbh->prepare($sql);
        $pdo->execute($params);
        //读取关联数组 
        $data = $pdo->fetchAll(PDO::FETCH_ASSOC); 
        return $data;
    }
    
    //写入数据 
    public function insert($sql, $params = array())
    {
        $pdo = $this->dbh->prepare($sql);
        $result = $pdo->execute($params);
        $count = $this->dbh->lastInsertId();
        return $count; 
    }
    
    /**
     * 更新、删除数据
     * @params $sql string 参数用 ? 代替 
     * @params $params array 参数   
     * @return 成功则返回受影响的行数 失败返回false
     */
    public function query($sql, $params = array()) 
    {
        $pdo = $this->dbh->prepare($sql);
        $result = $pdo->execute($params);
        if ($result) {
            return $pdo->rowCount();
        }
        
        return false; 
    }
    
	
    //开始事务 
    public function beginTransaction()
    {
        $this->dbh->beginTransaction();
    }
    
    //提交事务 
    public function commit()
    {
        $this->dbh->commit();
    }
    
    //回滚事务 
    public function rollBack()
    {
        $this->dbh->rollBack();
    }
}


?>