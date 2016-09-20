<?php

/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/11/16
 * Time: 10:05 AM
 */
class Discuss
{
    protected $id;
    protected $content;
    protected $writer;
    protected static $dbc;

    function __construct($dbc,$id,$writer)
    {
        self::setDbc($dbc);
        $this->setId($id);
        $this->fetchContentById();
        if(!isset($writer)){
            $this->fetchWriter();
        }
    }


    public function fetchWriter(){
        $q="SELECT user_name FROM UND WHERE d_id='".$this->getId()."'";
        $r=mysqli_query(self::getDbc(),$q);
        if(mysqli_num_rows($r)>0){
            $row=mysqli_fetch_row($r);
            $this->setWriter($row[0]);
        }
    }

    /**
     * @param mixed $dbc
     */
    public static function setDbc($dbc)
    {
        self::$dbc = $dbc;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
    public function displayContent(){
        echo '<div class="discussAreaItem">
                <pre class="discussContent">'.$this->getContent().'</pre>
                <p class="writerName indiscuss">'.$this->getWriter().'</p></div>';
    }
    protected function fetchContentById(){
        $q="SELECT d_content FROM Discuss WHERE d_id='".$this->getId()."'";
        $r=mysqli_query(self::getDbc(),$q);
        if(mysqli_num_rows($r)>0){
            $row = mysqli_fetch_array($r,MYSQLI_ASSOC);
            $this->setContent($row['d_content']);
        }
    }

    /**
     * @return mixed
     */
    public static function getDbc()
    {
        return self::$dbc;
    }
    public static function generateNewOne($content,$writer){
        if(!get_magic_quotes_gpc()){
            $content=addslashes($content);
        }
        $q="INSERT INTO Discuss VALUES (null,'".$content."')";
        mysqli_query(self::getDbc(),$q);
        $insertDiscussId = mysqli_insert_id(self::getDbc());
        $q="INSERT INTO UND VALUES('".$writer."','".$insertDiscussId."')";
        mysqli_query(self::getDbc(),$q);
        return $insertDiscussId;
    }

    /**
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }

    /**
     * @param mixed $writer
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
    }

}
