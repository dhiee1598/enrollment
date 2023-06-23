<?php
class myDataBase
{

    private $hostname;         // localhost
    private $username;         // dhiee15
    private $password;         // 0c/aD*6-urN.t(K_
    private $database;         // myDB_sample
    private $con;


    // CONSTRUCTOR FOR MY DATABASE OBJECT
    public function __construct($hostname, $username, $password, $database)
    {
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    // DATABASE CONNECTION FUNCTION
    public function connection()
    {
        try {
            if (!$this->con) {
                $this->con = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
                if ($this->con) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } catch (mysqli_sql_exception $e) {
            echo $e;
        }
    }
      
    //  DATABASE DISCONNECTION FUNCTION
    public function disconnect()
    {
        if ($this->con) {
            if (mysqli_close($this->con)) {
                $this->con = false;
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }


    //ENCRPYT PASSWORD
    public function encrypt($password)
    {
        return  sha1($password);
    }

    // RANDOM STUDENT ID
    public function generateStudentID()
    {
        $lower = "abcdefghijklmnopqrstuvwxyz";
        $upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $num = "1234567890";

        $combination = $lower . $upper . $num;
        $rand = "";

        for ($i = 0; $i < 10; $i++) {
            $rand = $rand . $combination[rand(0, strlen($combination) - 1)];
        }
        return $rand;
    }

    // RANDOM TEACHER ID
    public function generateTeacherID()
    {
        $num = "1234567890";
        $rand = "";

        for ($i = 0; $i < 9; $i++) {
            $rand = $rand . $num[rand(0, strlen($num) - 1)];
            if ($i == 2) {
                $rand .= "-";
            }
            if ($i == 5) {
                $rand .= "-";
            }
        }

        return $rand;
    }

    // RANDOM GRADE ID
    public function generateGradeID()
    {
        $num = "1234567890";
        $rand = "";

        for ($i = 0; $i < 6; $i++) {
            if ($i == 0) {
                $rand = "GR-";
            }
            $rand = $rand . $num[rand(0, strlen($num) - 1)];
        }
        return $rand;
    }

    // RANDOM SUBJECT ID
    public function generateSubjectID()
    {
        $num = "1234567890";
        $rand = "";

        for ($i = 0; $i < 5; $i++) {
            if ($i == 0) {
                $rand = "SUB-";
            }
            $rand = $rand . $num[rand(0, strlen($num) - 1)];
        }
        return $rand;
    }



    // COUNT THE NUMBER OF ROWS IN TABLE
    public function checkRowCount($table, $row = null, $value = null)
    {
        if ($row != null &&  $value != null) {
            $sql = "SELECT * FROM `$table` WHERE `$row` = '$value'";
        } else {
            $sql = "SELECT * FROM `$table`";
        }

        $result = mysqli_num_rows($this->con->query($sql));

        return $result;
    }


    public function checkUserLogin($username, $password)
    {
        $sql = "SELECT * FROM `USERS` WHERE `user_name` = '$username' AND `user_password` = '$password'";
        $result = $this->con->query($sql);

        if (mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //  GET STUDENT LIST 
    public function getStudent($row = null, $value = null)
    {
        if ($row != null &&  $value != null) {

            $sql = "SELECT * FROM `STUDENT` WHERE `$row` = '$value'";
            $stored = ($this->con->query($sql))->fetch_assoc();
            return $stored;
        } else {

            $sql = "SELECT * FROM `STUDENT` ORDER BY `STUDENT_LNAME`";
            $stored = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);
            return $stored;
        }
    }

    // GET STUDENT SUBJECTS
    public function getStudentSub($gradeid)
    {
        $sql = "SELECT SUBJECT_NAME, SUBJECT_DESCRIPTION, SUBJECT_TIME, CONCAT(TEACHER_FNAME, ' ', TEACHER_INIT,' ', TEACHER_LNAME) AS TEACHER
        FROM GRADELEVEL
        INNER JOIN SUBJECTS
        ON GRADELEVEL.GRADE_ID = SUBJECTS.GRADE_ID
        INNER JOIN TEACHER
        ON SUBJECTS.TEACHER_ID = TEACHER.TEACHER_ID
        WHERE GRADELEVEL.GRADE_ID = '$gradeid'";

        $result = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    // UPDATE STUDENT
    public function updateStudent($row, $value, $where)
    {
        $value = mysqli_real_escape_string($this->con, $value);
        if (is_string($value)) {
            $value = "'" . $value . "'";
        }
        $sql = "UPDATE `STUDENT` SET `$row` =  $value WHERE `STUDENT_ID` = '$where'";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // SEARCH STUDENT TABLE
    public function searchStudent($value)
    {
        $value = mysqli_real_escape_string($this->con, $value);

        $sql = "SELECT * FROM `STUDENT` WHERE `STUDENT_LNAME` LIKE '$value%' ORDER BY `STUDENT_LNAME`";
        $result = $this->con->query($sql);

        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    //  GET TEACHER LIST 
    public function getTeacher($row = null, $value = null)
    {
        if ($row != null &&  $value != null) {

            $sql = "SELECT * FROM `TEACHER` WHERE `$row` = '$value'";
            $stored = ($this->con->query($sql))->fetch_assoc();
            return $stored;
        } else {

            $sql = "SELECT * FROM `TEACHER` ORDER BY `TEACHER_FNAME`";
            $stored = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);

            return $stored;
        }
    }

    // GET TEACHER SUBJECTS
    public function getTeacherSub($teacherid)
    {
        $sql = "SELECT SUBJECT_NAME, SUBJECT_DESCRIPTION, SUBJECT_TIME
        FROM SUBJECTS
        INNER JOIN TEACHER
        ON SUBJECTS.TEACHER_ID = TEACHER.TEACHER_ID
        WHERE SUBJECTS.TEACHER_ID = '$teacherid'";

        $result = $this->con->query($sql)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    // SEARCH TEACHER TABLE
    public function searchTeacher($value)
    {
        $value = mysqli_real_escape_string($this->con, $value);

        $sql = "SELECT * FROM `TEACHER` WHERE `TEACHER_LNAME` LIKE '$value%' ORDER BY `TEACHER_LNAME`";
        $result = $this->con->query($sql);

        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    // UPDATE TEACHER
    public function updateFaculty($row, $value, $where)
    {
        $value = mysqli_real_escape_string($this->con, $value);
        if (is_string($value)) {
            $value = "'" . $value . "'";
        }
        $sql = "UPDATE `TEACHER` SET `$row` =  $value WHERE `TEACHER_ID` = '$where'";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    //  GET GRADELEVEL LIST 
    public function getGradelevel($row = null, $value = null)
    {
        if ($row != null &&  $value != null) {

            $sql = "SELECT `GRADE_ID`, GRADELEVEL.TEACHER_ID, `GRADE_NAME`, CONCAT(`TEACHER_FNAME`, ' ',`TEACHER_INIT`, ' ', `TEACHER_LNAME`) AS ADVISOR 
            FROM `GRADELEVEL` LEFT JOIN `TEACHER`
            ON GRADELEVEL.TEACHER_ID = TEACHER.TEACHER_ID
            WHERE `$row` = '$value'";
            $stored = ($this->con->query($sql))->fetch_assoc();
            return $stored;
        } else {

            $sql = "SELECT `GRADE_ID`, `GRADE_NAME`, CONCAT(`TEACHER_FNAME`, ' ',`TEACHER_INIT`, ' ', `TEACHER_LNAME`) AS ADVISOR 
            FROM `GRADELEVEL` LEFT JOIN `TEACHER`
            ON GRADELEVEL.TEACHER_ID = TEACHER.TEACHER_ID
            ORDER BY GRADELEVEL.GRADE_NAME";
            $stored = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);

            return $stored;
        }
    }

    // SEARCH GRADELEVEL TABLE
    public function searchGradelevel($value)
    {
        $value = mysqli_real_escape_string($this->con, $value);

        $sql = "SELECT `GRADE_ID`, `GRADE_NAME`, CONCAT(`TEACHER_FNAME`, ' ',`TEACHER_INIT`, ' ', `TEACHER_LNAME`) AS ADVISOR 
        FROM `GRADELEVEL` LEFT JOIN `TEACHER`
        ON GRADELEVEL.TEACHER_ID = TEACHER.TEACHER_ID
        WHERE GRADELEVEL.GRADE_NAME LIKE '$value%'
        ORDER BY GRADELEVEL.GRADE_NAME";
        $result = $this->con->query($sql);

        if (mysqli_num_rows($result) > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        }
    }

    // UPDATE GRADELEVEL
    public function updateGradelvl($row, $value, $where)
    {
        $value = mysqli_real_escape_string($this->con, $value);
        if (is_string($value)) {
            $value = "'" . $value . "'";
        }
        $sql = "UPDATE `GRADELEVEL` SET `$row` =  $value WHERE `GRADE_ID` = '$where'";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    //  GET GRADELEVEL LIST 
    public function getEnroll($id)
    {
        $sql = "SELECT *
        FROM `ENROLL` INNER JOIN `GRADELEVEL`
        ON ENROLL.GRADE_ID = GRADELEVEL.GRADE_ID
        WHERE ENROLL.STUDENT_ID = '$id'";
        $result = ($this->con->query($sql))->fetch_assoc();

        return $result;
    }

    //  GET SUBJECTS LIST 
    public function getSubjects($row = null, $value = null)
    {
        if ($row != null && $value != null) {
            $sql = "SELECT `SUBJECT_ID`, `SUBJECT_NAME` , `SUBJECT_DESCRIPTION` , `SUBJECT_TIME`,
             `GRADE_NAME`, SUBJECTS.TEACHER_ID, SUBJECTS.GRADE_ID, SUBJECTS.TEACHER_ID,
            CONCAT(`TEACHER_FNAME`,' ', `TEACHER_INIT`, ' ', `TEACHER_LNAME`)AS TEACHER FROM `SUBJECTS`
            INNER JOIN `GRADELEVEL`
            ON SUBJECTS.GRADE_ID = GRADELEVEL.GRADE_ID
            LEFT JOIN `TEACHER`
            ON SUBJECTS.TEACHER_ID = TEACHER.TEACHER_ID
            WHERE SUBJECTS.$row = '$value'";

            $stored = ($this->con->query($sql))->fetch_assoc();

            return $stored;
        } else {
            $sql = "SELECT `SUBJECT_ID`, `SUBJECT_NAME` , `SUBJECT_DESCRIPTION` , `SUBJECT_TIME`, `GRADE_NAME`,
            CONCAT(`TEACHER_FNAME`,' ', `TEACHER_INIT`, ' ', `TEACHER_LNAME`)AS TEACHER FROM `SUBJECTS`
            INNER JOIN `GRADELEVEL`
            ON SUBJECTS.GRADE_ID = GRADELEVEL.GRADE_ID
            LEFT JOIN `TEACHER`
            ON SUBJECTS.TEACHER_ID = TEACHER.TEACHER_ID
            ORDER BY SUBJECTS.SUBJECT_NAME";

            $stored = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);

            return $stored;
        }
    }


    // UPDATE STUDENT
    public function updateSubject($row, $value, $where)
    {
        $value = mysqli_real_escape_string($this->con, $value);
        if (is_string($value)) {
            $value = "'" . $value . "'";
        }
        $sql = "UPDATE `SUBJECTS` SET `$row` =  $value WHERE `SUBJECT_ID` = '$where'";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    // SEARCH GRADELEVEL TABLE
    public function searchSubject($value)
    {
        $value = mysqli_real_escape_string($this->con, $value);

        $sql = "SELECT `SUBJECT_ID`, `SUBJECT_NAME` , `SUBJECT_DESCRIPTION` , `SUBJECT_TIME`, `GRADE_NAME`,
        CONCAT(`TEACHER_FNAME`,' ', `TEACHER_INIT`, ' ', `TEACHER_LNAME`)AS TEACHER FROM `SUBJECTS`
        INNER JOIN `GRADELEVEL`
        ON SUBJECTS.GRADE_ID = GRADELEVEL.GRADE_ID
        INNER JOIN `TEACHER`
        ON SUBJECTS.TEACHER_ID = TEACHER.TEACHER_ID
        WHERE SUBJECTS.SUBJECT_NAME LIKE '$value%'
        ORDER BY SUBJECTS.SUBJECT_NAME";
        $stored = ($this->con->query($sql))->fetch_all(MYSQLI_ASSOC);

        return $stored;
    }


    // INSERT INTO TABLE 
    public function insert($table, $values)
    {
        for ($i = 0; $i < count($values); $i++) {
            $values[$i] = mysqli_real_escape_string($this->con, $values[$i]);

            if (is_string($values[$i])) {
                $values[$i] = "'" . $values[$i] . "'";
            }
        }
        $values = implode(",", $values);

        $sql = "INSERT INTO `$table` VALUES ($values)";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    // DELETEE FUNCTION
    public function delete($table, $row, $value) // REFER TO THE PRIMARY KEY TO DELETE
    {
        $sql = "DELETE FROM `$table` WHERE `$row` = '$value'";
        $result = $this->con->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getSchool()
    {
        $sql = "SELECT * FROM `SCHOOL`";
        $stored = ($this->con->query($sql))->fetch_assoc();
        return $stored;
    }

    public function updateSchool($column, $value)
    {
        $value = mysqli_real_escape_string($this->con, $value);
        $sql = "UPDATE `SCHOOL` SET `$column` = '$value'";
        $result = $this->con->query($sql);
        return $result;
    }
}
