<?php
include '../lib/database.php';
include '../helpers/format.php';
?>
<?php
class category
{
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db=new Database();
        $this->fm=new Format();
    }
    public function insert_category($catName){
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);


        if (empty($catName)){
            $alert = "<span class='error'>Category must be to empty</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_categoty (catName) VALUE ('$catName')";
            $result = $this->db->select($query);
            if ($result ) {
                $alert = "<span class='success'>Insert Category Successfully</span>";
                return $alert;
            }else{
                $alert = "<span class='error'>Insert Category Not Success</span>";
                return $alert;
            }
        }

    }
}

?>