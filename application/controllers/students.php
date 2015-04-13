<?php

/**
 * Description of users
 *
 * @author Faizan Ayubi
 */
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Students extends Users {
    
    /**
     * Does three important things, first is retrieving the posted form data, second is checking each form field’s value
     * third thing it does is to create a new user row in the database
     */
    public function register() {
        $this->seo(array(
            "title"         => "Get Internship | Student Register",
            "keywords"      => "get internship, student register",
            "description"   => "Register with us to get internship from top companies in india and various startups in Delhi, Mumbai, Bangalore, Chennai, hyderabad etc",
            "view"          => $this->getLayoutView()
        ));
        
        include APP_PATH . '/public/datalist.php';
        $view = $this->getActionView();

        $view->set("alldegrees", $alldegrees);
        $view->set("allmajors", $allmajors);
        $view->set("alllocations", $alllocations);

        $view->set("errors", array());

        if (RequestMethods::post("register")) {
            $user = new User(array(
                "first" => RequestMethods::post("first"),
                "last" => RequestMethods::post("last"),
                "email" => RequestMethods::post("email"),
                "password" => RequestMethods::post("password")
            ));

            if ($user->validate()) {
                $user->save();
                $this->_upload("photo", $user->id);
                $view->set("success", true);
            }

            $view->set("errors", $user->getErrors());
        }
    }

    /**
     * @before _secure
     */
    public function profile() {
        $this->changeLayout();
        
        $this->seo(array(
            "title"         => "Profile",
            "keywords"      => "user profile",
            "description"   => "Your Profile Page",
            "view"          => $this->getLayoutView()
        ));

        $view = $this->getActionView();
        
        $session = Registry::get("session");
        $user = $this->user;
        $student = $session->get("student");

        $qualifications = Qualification::all(
            array(
                "student_id = ?" => $student->id
            ),
            array("id", "degree", "major", "organization_id", "gpa", "passing_year")
        );
        
        $works = Work::all(
            array(
                "student_id = ?" => $student->id
            ),
            array("id", "designation", "responsibility", "organization_id", "duration")
        );

        $view->set("student", $student);
        $view->set("qualifications", $qualifications);
        $view->set("works", $works);
    }

    /**
     * @before _secure
     */
    public function messages() {
        $this->changeLayout();
        $seo = Registry::get("seo");

        $seo->setTitle("Messages");
        $seo->setKeywords("user messages");
        $seo->setDescription("Your Inbox/Outbox");

        $this->getLayoutView()->set("seo", $seo);
        $view = $this->getActionView();
        
        $user = $this->user;

        $inboxs = Message::all(
            array(
                "to_user_id = ?" => $user->id,
                "validity = ?" => true
            ),
            array("id", "from_user_id", "message", "created")
        );
        
        $outboxs = Message::all(
            array(
                "from_user_id = ?" => $user->id,
                "validity = ?" => true
            ),
            array("id", "to_user_id", "message", "created")
        );

        $view->set("inboxs", $inboxs);
        $view->set("outboxs", $outboxs);
    }
    
    /**
     * @before _secure
     */
    public function applications() {
        $this->defaultLayout = "layouts/student";
        $this->setLayout();
        $seo = Registry::get("seo");

        $seo->setTitle("Applications");
        $seo->setKeywords("student opportunity applications");
        $seo->setDescription("Your Application and its status");

        $this->getLayoutView()->set("seo", $seo);
        $view = $this->getActionView();
        
        $session = Registry::get("session");
        $student = $session->get("student");

        $applications = Application::all(
            array(
                "student_id = ?" => $student->id
            ),
            array("id", "opportunity_id", "status", "created", "updated")
        );

        $view->set("applications", $applications);
    }
    
    /**
     * @before _secure
     */
    public function recommended() {
        $this->defaultLayout = "layouts/student";
        $this->setLayout();
        $seo = Registry::get("seo");

        $seo->setTitle("Matching Opportunity with your profile");
        $seo->setKeywords("opportunity matching with you profile");
        $seo->setDescription("opportunity matching with you profile");

        $this->getLayoutView()->set("seo", $seo);
        $view = $this->getActionView();
        
        $session = Registry::get("session");
        $student = $session->get("student");

        $opportunities = Opportunity::all(
            array(
                "eligibility = ?" => $student->skills
            ),
            array("id", "title", "organization_id", "eligibility", "last_date", "location")
        );

        $view->set("opportunities", $opportunities);
        $view->set("student", $student);
    }
    
    /**
     * @before _secure
     */
    public function resumes() {
        $this->defaultLayout = "layouts/student";
        $this->setLayout();
        $seo = Registry::get("seo");

        $seo->setTitle("Resumes");
        $seo->setKeywords("Resume of Student");
        $seo->setDescription("resume of student");

        $this->getLayoutView()->set("seo", $seo);
        $view = $this->getActionView();
        
        $session = Registry::get("session");
        $student = $session->get("student");

        $resumes = Resume::all(
            array(
                "student_id = ?" => $student->id
            ),
            array("id", "type")
        );

        $view->set("resumes", $resumes);
        $view->set("student", $student);
    }
    
    public function changeLayout() {
        $this->defaultLayout = "layouts/student";
        $this->setLayout();
    }

}