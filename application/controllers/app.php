<?php

/**
 * Main Controller to respond to all apps(android, ios, windows) request
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class App extends Users {

    public function index() {
        $this->noview();
        echo 'HW';
    }

    public function student() {
        $view = $this->getActionView();
        if (RequestMethods::post("email")) {
            $user = $this->read(array(
                "model" => "user",
                "where" => array("email = ?" => RequestMethods::post("email"))
            ));
            if ($user) {
                $student = Student::first(array("user_id = ?" => $user->id));
            } else {
                $user = new User(array(
                    "name" => RequestMethods::post("name"),
                    "email" => RequestMethods::post("email"),
                    "phone" => RequestMethods::post("phone", ""),
                    "password" => rand(100000, 99999999),
                    "access_token" => rand(100000, 99999999),
                    "type" => "student",
                    "validity" => "1",
                    "last_ip" => $_SERVER['REMOTE_ADDR'],
                    "last_login" => "1",
                    "updated" => ""
                ));
                $user->save();
                $this->notify(array(
                    "template" => "studentRegister",
                    "subject" => "Getting Started on Swiftintern.com",
                    "user" => $user
                ));

                $student = new Student(array(
                    "user_id" => $user->id,
                    "about" => "",
                    "city" => RequestMethods::post("city", ""),
                    "skills" => "",
                    "updated" => ""
                ));
                $student->save();
            }
            $view->set("success", true);
        } else {
            $view->set("success", false);
        }
    }

}
