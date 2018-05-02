<?php
// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "digital_signature");

$host       = 'localhost';
$username   = 'root';
$password   = '';
$dbName     = 'digital_signature';
$dbEmp      = 'service_request';
//$dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password);
try{
 $dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password);

 $dbEmpCon = new PDO("mysql:host=".$host.";dbname=".$dbEmp, $username, $password);
}
catch(PDOException $e){
 echo $e->getMessage();
}

class login{

    public function loginAccount($username, $password){
        global $dbCon, $dbEmpCon;
        $adServer = "ldap://petsvr1100.petcad1100";

        $ldap = ldap_connect($adServer);
        $ldaprdn = 'petcad1100' . "\\" . $username;

        ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
        $bind = @ldap_bind($ldap, $ldaprdn, $password);
        if ($bind) {
            $filter="(sAMAccountName=$username)";
            $result = ldap_search($ldap,"dc=petcad1100",$filter);
            ldap_sort($ldap,$result,"sn");
            $info = ldap_get_entries($ldap, $result);

            for ($i=0; $i<$info["count"]; $i++){
                $cn	= $info[$i]["cn"][0];
                $firstname = $info[$i]["givenname"][0];
                $middlename = isset($info[$i]["initials"][0]);
                $lastname = $info[$i]["sn"][0];
                $ldap_displayname = $info[$i]["displayname"][0];
                //$ldap_derpartment = isset($info[$i]["department"][0]);
                //@ldap_close($ldap);
                //
                }

                $employee_query = $dbEmpCon->prepare("Select * from employees where pet_id=:pet_id");
                $employee_query->bindparam(':pet_id', $username);
                $employee_query->execute();

                if($employee_query->rowCount() > 0){
                    while($row = $employee_query->FETCH(PDO::FETCH_ASSOC)){
                        $fullname      = $row['full_name'];
                        $role          = $row['role'];
                        $position      = $row['position'];
                        $department    = $row['department'];
                        $id            = $row['id'];
                    }
                    //header("Location:index.php");
                    include 'stamp-config.php';
                    /*
                    echo $lastvisited;
                    header("Location:".$lastvisited);
                    */

                }else{
                    echo"<script>
                            alert('Your account is not register, please inform supervisor/manager to contact MIS');
                            window.location.href = 'logout.php';
                        </script>";
                }



            session_start();
            $_SESSION['login_user']     = $username;
            $_SESSION['login_pass']     = $password;
            $_SESSION['fullname']       = $fullname;
            $_SESSION['firstname']      = $firstname;
            $_SESSION['middlename']     = $middlename;
            $_SESSION['lastname']       = $lastname;
            $_SESSION['displayname']    = $ldap_displayname;
            $_SESSION['department']     = $department;
            $_SESSION['position']       = $position;
            $_SESSION['role']           = $role;

            $_SESSION['id']             = $id;

            $_SESSION['ldap'] = $ldap;
            $_SESSION['bind'] = $bind;

            }else {
                echo"<script>alert('Invalid username or password')</script>";
                //$msg = "Invalid email address / password";
                //echo $msg;
            }

    }

    public function checkEmployee($username){
        global $dbCon;

        $employee_query = $dbCon->prepare("Select * from employees where pet_id=:pet_id");
        $employee_query->bindparam(':pet_id', $username);
        $employee_query->execute();

        return $employee_query->rowCount();

        /*
        if($employee_query->rowCount() > 0){
            while($row = $employee_query->FETCH(PDO::FETCH_ASSOC)){
                $this->position     = $row['position'];
            }
        }
        */
    }

}

class eSign{

    private $host      = DB_HOST;
    private $user      = DB_USER;
    private $pass      = DB_PASS;
    private $dbname    = DB_NAME;

    private $dbh;
    private $error;

    private $stmt;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }



    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){

        if (is_null($type)) {
          switch (true) {
            case is_int($value):
              $type = PDO::PARAM_INT;
              break;
            case is_bool($value):
              $type = PDO::PARAM_BOOL;
              break;
            case is_null($value):
              $type = PDO::PARAM_NULL;
              break;
            default:
              $type = PDO::PARAM_STR;
          }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultset(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction(){
        return $this->dbh->beginTransaction();
    }

    public function endTransaction(){
        return $this->dbh->commit();
    }

    public function cancelTransaction(){
        return $this->dbh->rollBack();
    }

    public function debugDumpParams(){
        return $this->stmt->debugDumpParams();
    }

}

?>
