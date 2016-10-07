<?php

/**
 * Created by PhpStorm.
 * User: hao
 * Date: 9/10/16
 * Time: 8:42 AM
 */
class Post
{
    protected $title;
    protected $detail;
    protected $id;
    protected static $dbc;
    protected $writer;
    function __construct($dbc,$ii,$tt,$dt,$rt)
    {
        self::setDbc($dbc);
        $this->id=$ii;
        if(isset($tt)&&isset($dt)) {
            $this->title = $tt;
            $this->detail = $dt;
        }else{
            $this->fetchTitleNDetailById();
        }
        if(!isset($rt)){
            $this->fetchWriter();
        }
    }
    public function fetchWriter(){
        $q="SELECT user_name FROM UNP WHERE p_id='".$this->getId()."'";
        $r=mysqli_query(self::getDbc(),$q);
        if(mysqli_num_rows($r)>0){
            $row=mysqli_fetch_row($r);
            $this->setWriter($row[0]);
        }
    }
    public function displayTitle(){
        echo '<p class="postTitle"><a href="index.php?id='.$this->id.'&title='.$this->title.'">';
        echo $this->title.'</a>';
        echo '</p>';
    }
    public function displayWriter(){
        echo '<p class="writerName">By '.$this->getWriter().'</p>';
    }
    public function displayTitleNDetail(){
        echo '<div class="postView"><h3 class="postTitle">'.$this->title.'</h3>';
        $this->displayWriter();
        echo '<pre class="postDetail">'.$this->detail.'</pre></div>';
    }
    public function displayTitleNDetailForPreview(){
        echo '<a href="index.php?id='.$this->id.'&title='.$this->title.'"><div class="postPreview"><h3 class="postTitle">'.$this->title.'</h3>';
        $this->displayWriter();
        echo '<p class="postDetail">'.$this->detail.'</p>
        <p class="moredetail">More</p>
        </div></a>';
    }
    public function setTitle($tt){
        $this->title = $tt;
    }
    public function setDetail($dt){
        $this->detail = $dt;
    }
    public function setId($ii){
        $this->id = $ii;
    }
    public function fetchTitleNDetailById(){
        $q = "select * from Post WHERE p_id ='".$this->id."'";
        $r=mysqli_query(self::getDbc(),$q);
        $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $this->setTitle($row['p_title']);
        $this->setDetail($row['p_detail']);
    }

    /**
     * @param mixed $dbc
     */
    public static function setDbc($dbc)
    {
        self::$dbc = $dbc;
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }
    public function displayAllDiscuss(){
        require_once ("classes/Discuss.php");
        $q="SELECT d_id FROM PND WHERE p_id='".$this->getId()."'";
        $r=mysqli_query(self::getDbc(),$q);
        echo '<div class="discussArea">';
        if(mysqli_num_rows($r)>0){
            while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)){
                $discussId = $row['d_id'];
                $thisDiscuss=new Discuss(self::getDbc(),$discussId);
                $thisDiscuss->displayContent();
            }
        }
        echo '</div>';
    }

    /**
     * @return mixed
     */
    public static function getDbc()
    {
        return self::$dbc;
    }
/*  Do not know why. When the form is posted, all info lost..
    public function displayMakeCommentArea(){
        include ("../includes/makeComment.html");

    }
*/
/*    public function displayFullPage(){
        $this->displayTitleNDetail();
        $this->displayMakeCommentArea();
        $this->displayAllDiscuss();
    }
*/
    public function addNewDiscuss($content,$writer){
        require_once ("classes/Discuss.php");
        Discuss::setDbc(self::getDbc());
        $lastId=Discuss::generateNewOne($content,$writer);
        $q='INSERT INTO PND VALUES ("'.$this->getId().'","'.$lastId.'")';
        mysqli_query(self::getDbc(),$q);
        $q='INSERT INTO UND VALUES ("'.$writer.'","'.$lastId.'")';
        mysqli_query(self::getDbc(),$q);
    }

    /**
     * @param mixed $writer
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
    }

    /**
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }
    public static function generateNewOne($title,$content,$writer){
        if(!get_magic_quotes_gpc()){
            $title=addslashes($title);
            $content=addslashes($content);
        }
        $q="INSERT INTO Post VALUES (NULL,'".$title."','".$content."')";
        $r=mysqli_query(self::getDbc(),$q);
        if($r){
            $insetId=mysqli_insert_id(self::getDbc());
            $q="INSERT INTO UNP VALUES ('".$writer."','".$insetId."')";
            $r=mysqli_query(self::getDbc(),$q);
            if($r){
                return $insetId;
            }
        }
        return 0;
    }
}