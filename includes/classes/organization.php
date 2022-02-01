<?php

require_once('database.php');

class Organization
{
    private $id;
    private $name;
    private $phone;
    private $password;
    private $city;
    private $address;
    private $description;
    private $mission_statement;

    public function init($id, $name, $phone, $city, $address, $description,$mission_statement)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->city = $city;
        $this->address = $address;
        $this->description = $description;
        $this->mission_statement = $mission_statement;
    }

    public static function fetch_organizations()
    {
        global $database;
        $result = $database->query("select * from organizations");
        $organizations = null;
        if ($result) {
            $i = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user = new Organization();
                    $user->instantation($row);
                    $organizations[$i] = $user;
                    $i += 1;
                }
            }
        }
        return $organizations;
    }

    private function has_attribute($attribute)
    {
        $object_properties = get_object_vars($this);
        return array_key_exists($attribute, $object_properties);
    }

    private function instantation($user_array)
    {
        foreach ($user_array as $attribute => $value) {
            if ($this->has_attribute($attribute))
                $this->$attribute = $value;
        }
    }
//
//    public function find_user_by_id($id)
//    {
//        global $database;
//        $error = null;
//        $result = $database->query("select * from users where id='" . $id . "'");
//
//        if (!$result)
//            $error = 'Can not find the user.  Error is:' . $database->get_connection()->error;
//        elseif ($result->num_rows > 0) {
//            $found_user = $result->fetch_assoc();
//            $this->instantation($found_user);
//        } else
//            $error = "Can no find user by this id";
//
//        return $error;
//    }
//
//    public function find_user_by_name($email, $password)
//    {
//        global $database;
//        $error = null;
//        $result = $database->query("select * from users where email='" . $email . "' and pass='" . $password . "'");
//
//        if (!$result)
//            $error = 'Can not find the user.  Error is:' . $database->get_connection()->error;
//        elseif ($result->num_rows > 0) {
//            $found_user = $result->fetch_assoc();
//            $this->instantation($found_user);
//        } else
//            $error = "Can no find user by this name";
//
//        return $error;
//    }

    public static function add_organization($organization)
    {
        global $database;
        $error = null;
        $sql = "INSERT INTO users(email ,firstname ,lastname ,phone ,city, pass) VALUES ('{$user->email}','{$user->firstname}','{$user->lastname}',{$user->phone},'{$user->city}','{$user->password}')";

        $result = $database->query($sql);
        if (!$result)
            $error = 'Can not add user.  Error is:' . $database->get_connection()->error;
        return $error;
    }


    public function __get($property)
    {
        if (property_exists($this, $property))
            return $this->$property;
    }

}

?>